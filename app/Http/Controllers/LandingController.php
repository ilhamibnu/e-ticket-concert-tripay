<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;


class LandingController extends Controller
{
    public function index()
    {
        $paket = Paket::where('status', '=', 'aktif')->get();

        // cek sisa paket
        // jumlah paket dikurangi jumlah pendaftaran dengan status paid dan pending

        foreach ($paket as $p) {
            $p->sisa = $p->jumlah - Pendaftaran::where('id_paket', $p->id)->where('status', '=', 'PAID')->count() - Pendaftaran::where('id_paket', $p->id)->where('status', '=', 'UNPAID')->count();
        }
        $pendaftaran = Pendaftaran::find(0);

        $apiKey       = 'DEV-doRbyZ4kDKF1zjSI7vyhc102PqRkZENKUChHG0xe';
        $privateKey   = 'A4v3H-1qYdq-jmCUh-PnH7H-92ckd';
        $merchantCode = 'T23311';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/payment-channel',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response);

        // mengambil data payment channel

        $paymentChannel = $response->data;

        return view('landing.pages.index', [
            'paket' => $paket,
            'datatiket' => $pendaftaran,
            'paymentChannel' => $paymentChannel,
        ]);
    }

    public function daftar(Request $request)
    {
        Session::flash('dname', $request->name);
        Session::flash('demail', $request->email);
        Session::flash('dphone', $request->phone);

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:tb_pendaftaran',
        //     'phone' => 'required|unique:tb_pendaftaran',
        //     'id_paket' => 'required',
        // ],
        // [
        //     'name.required' => 'Nama harus diisi',
        //     'email.required' => 'Email harus diisi',
        //     'email.email' => 'Email tidak valid',
        //     'email.unique' => 'Email sudah terdaftar',
        //     'phone.required' => 'Nomor telepon harus diisi',
        //     'phone.unique' => 'Nomor telepon sudah terdaftar',
        //     'id_paket.required' => 'Paket harus dipilih',
        // ]
        // );

        // cek email dan nomor telepon

        $cekemailphone = Pendaftaran::where('email', $request->email)->where('phone', $request->phone)->count();
        $cekemail = Pendaftaran::where('email', $request->email)->count();
        $cekphone = Pendaftaran::where('phone', $request->phone)->count();

        // cek status paket

        $cekstatuspaket = Paket::find($request->id_paket);

        if ($cekemailphone > 0) {
            return redirect('/')->with('sudahterdaftar', 'Email dan nomor telepon sudah terdaftar');
        } elseif ($cekemail > 0) {
            return redirect('/')->with('emailterdaftar', 'Email sudah terdaftar');
        } elseif ($cekphone > 0) {
            return redirect('/')->with('phoneterdaftar', 'Nomor telepon sudah terdaftar');
        } elseif ($request->id_paket == null) {
            return redirect('/')->with('paketkosong', 'Paket harus dipilih');
        } elseif ($cekstatuspaket->status != 'aktif') {
            return redirect('/')->with('paketnonaktif', 'Paket tidak aktif');
        } else {
            // cek persedian tiket
            $cek = Paket::find($request->id_paket);
            $cekpendaftaran = Pendaftaran::where('id_paket', $request->id_paket)->where('status', '=', 'PAID')->count() + Pendaftaran::where('id_paket', $request->id_paket)->where('status', '=', 'UNPAID')->count();
            if ($cek->jumlah <= $cekpendaftaran) {
                return redirect('/')->with('pakettidaktersedia', 'Paket sudah penuh');
            } elseif ($request->payment_method == null) {
                return redirect('/')->with('metodepembayarankosong', 'Metode pembayaran harus dipilih');
            } else {

                $pendaftaran = new Pendaftaran;
                $id = time() . random_int(100, 999);
                $idtiket = 'T' . date('Ymd') . Time() . rand(1000, 9999);
                $pendaftaran->id = $id;
                $pendaftaran->name = $request->name;
                $pendaftaran->email = $request->email;
                $pendaftaran->phone = $request->phone;
                $pendaftaran->tiket = $idtiket;
                $pendaftaran->checkout_url = '';
                $pendaftaran->status = '';
                $pendaftaran->checkin = 'belum';
                $pendaftaran->id_paket = $request->id_paket;
                $pendaftaran->save();

                $apiKey       = 'DEV-doRbyZ4kDKF1zjSI7vyhc102PqRkZENKUChHG0xe';
                $privateKey   = 'A4v3H-1qYdq-jmCUh-PnH7H-92ckd';
                $merchantCode = 'T23311';

                $amount       = $cek->harga;

                $data = [
                    'method'         => $request->payment_method,
                    'merchant_ref'   => $id,
                    'amount'         => $amount,
                    'customer_name'  => $request->name,
                    'customer_email' => $request->email,
                    'customer_phone' => $request->phone,
                    'order_items'    => [
                        [
                            'name'        => $cek->name,
                            'price'       => $amount,
                            'quantity'    => 1,
                        ],
                    ],
                    // expired_time 30 menit
                    'expired_time'   => (time() + (60 * 30)),
                    'signature'    => hash_hmac('sha256', $merchantCode . $id . $amount, $privateKey)
                ];

                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_FRESH_CONNECT  => true,
                    CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/create',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER         => false,
                    CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
                    CURLOPT_FAILONERROR    => false,
                    CURLOPT_POST           => true,
                    CURLOPT_POSTFIELDS     => http_build_query($data),
                    CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
                ]);

                $response = curl_exec($curl);
                // $error = curl_error($curl);

                // curl_close($curl);

                $response = json_decode($response);

                if ($response->success) {
                    $pendaftaran = Pendaftaran::find($id);
                    $pendaftaran->checkout_url = $response->data->checkout_url;
                    $pendaftaran->status = $response->data->status;
                    $pendaftaran->save();
                    return redirect($response->data->checkout_url);
                } else {
                    return redirect('/')->with('gagal', 'Pendaftaran gagal');
                }
            }
        }
    }


    public function caritiket(Request $request)
    {
        Session::flash('cemail', $request->email);
        Session::flash('cphone', $request->phone);

        $apiKey       = 'DEV-doRbyZ4kDKF1zjSI7vyhc102PqRkZENKUChHG0xe';
        $privateKey   = 'A4v3H-1qYdq-jmCUh-PnH7H-92ckd';
        $merchantCode = 'T23311';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/payment-channel',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response);

        // mengambil data payment channel

        $paymentChannel = $response->data;

        $paket = Paket::where('status', '=', 'aktif')->get();
        foreach ($paket as $p) {
            $p->sisa = $p->jumlah - Pendaftaran::where('id_paket', $p->id)->where('status', '=', 'PAID')->count() - Pendaftaran::where('id_paket', $p->id)->where('status', '=', 'UNPAID')->count();
        }
        $request->validate(
            [
                'email' => 'required|email',
                'phone' => 'required',
            ],
            [
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email tidak valid',
                'phone.required' => 'Nomor telepon harus diisi',
            ]
        );

        $pendaftaran = Pendaftaran::with('paket')->where('email', $request->email)->where('phone', $request->phone)->first();

        if ($pendaftaran) {
            return view('landing.pages.index', [
                'datatiket' => $pendaftaran,
                'paket' => $paket,
                'paymentChannel' => $paymentChannel,
            ]);
        } else {
            return redirect('/')->with('error', 'Data tidak ditemukan');
        }
    }
    public function bataltiket($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        $pendaftaran->delete();

        return redirect('/')->with('bataltiket', 'Pembatalan berhasil');
    }

    public function callback(Request $request)
    {
        $privateKey   = 'A4v3H-1qYdq-jmCUh-PnH7H-92ckd';
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $privateKey);

        if ($signature !== (string) $callbackSignature) {
            return Response()->json([
                'success' => false,
                'message' => 'Invalid signature',
            ]);
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return Response()->json([
                'success' => false,
                'message' => 'Invalid event provided',
            ]);
        }

        $data = json_decode($json);

        if (JSON_ERROR_NONE !== json_last_error()) {
            return Response()->json([
                'success' => false,
                'message' => 'Error parsing JSON message',
            ]);
        }

        $invoiceId = $data->merchant_ref;
        $status = $data->status;

        $order = Pendaftaran::find($invoiceId);
        $order->status = $status;
        $order->save();

        return Response()->json([
            'success' => true,
        ]);


        // $serverkey = config('midtrans.server_key');
        // $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverkey);

        // if ($hashed == $request->signature_key) {
        //     if ($request->transaction_status == 'settlement') {

        //         if ($request->permata_va_number != null) {

        //             $order = Pendaftaran::find($request->order_id);
        //             $order->bank = 'permata';
        //             $order->va = $request->permata_va_number;
        //             $order->kadaluarsa = $request->expiry_time;
        //             $order->status = 'paid';
        //             $order->save();
        //         } else {

        //             $order = Pendaftaran::find($request->order_id);
        //             $order->bank = $request->va_numbers[0]['bank'];
        //             $order->va = $request->va_numbers[0]['va_number'];
        //             $order->kadaluarsa = $request->expiry_time;
        //             $order->status = 'paid';
        //             $order->save();
        //         }
        //     } elseif ($request->transaction_status == 'pending') {

        //         if ($request->permata_va_number != null) {

        //             $order = Pendaftaran::find($request->order_id);
        //             $order->bank = 'permata';
        //             $order->va = $request->permata_va_number;
        //             $order->kadaluarsa = $request->expiry_time;
        //             $order->status = 'pending';
        //             $order->save();
        //         } else {

        //             $order = Pendaftaran::find($request->order_id);
        //             $order->bank = $request->va_numbers[0]['bank'];
        //             $order->va = $request->va_numbers[0]['va_number'];
        //             $order->kadaluarsa = $request->expiry_time;
        //             $order->status = 'pending';
        //             $order->save();
        //         }
        //     } else {

        //         if ($request->permata_va_number != null) {

        //             $order = Pendaftaran::find($request->order_id);
        //             $order->bank = 'permata';
        //             $order->va = $request->permata_va_number;
        //             $order->kadaluarsa = $request->expiry_time;
        //             $order->status = 'expire';
        //             $order->save();
        //         } else {

        //             $order = Pendaftaran::find($request->order_id);
        //             $order->bank = $request->va_numbers[0]['bank'];
        //             $order->va = $request->va_numbers[0]['va_number'];
        //             $order->kadaluarsa = $request->expiry_time;
        //             $order->status = 'expire';
        //             $order->save();
        //         }
        //     }
        // }
    }
}
