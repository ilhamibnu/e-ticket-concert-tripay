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
            $p->sisa = $p->jumlah - Pendaftaran::where('id_paket', $p->id)->where('status', '=', 'paid')->count() - Pendaftaran::where('id_paket', $p->id)->where('status', '=', 'pending')->count();
        }
        $pendaftaran = Pendaftaran::find(0);

        return view('landing.pages.index', [
            'paket' => $paket,
            'datatiket' => $pendaftaran,
            'snapToken' => '',

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
            $cekpendaftaran = Pendaftaran::where('id_paket', $request->id_paket)->where('status', '=', 'paid')->count() - Pendaftaran::where('id_paket', $request->id_paket)->where('status', '=', 'pending')->count();
            if ($cek->jumlah <= $cekpendaftaran) {
                return redirect('/')->with('pakettidaktersedia', 'Paket sudah penuh');
            } else {

                $pendaftaran = new Pendaftaran;
                $id = date('Ymd') . rand(100, 999);
                $idtiket = 'T' . date('Ymd') . Time() . rand(100, 999);
                $pendaftaran->id = $id;
                $pendaftaran->name = $request->name;
                $pendaftaran->email = $request->email;
                $pendaftaran->phone = $request->phone;
                $pendaftaran->tiket = $idtiket;
                $pendaftaran->bank = '';
                $pendaftaran->va = '';
                $pendaftaran->kadaluarsa = '';
                $pendaftaran->status = 'belumpilihpembayaran';
                $pendaftaran->checkin = 'belum';
                $pendaftaran->id_paket = $request->id_paket;
                $pendaftaran->save();

                return redirect('/')->with('create', 'Pendaftaran berhasil');
            }
        }
    }


    public function caritiket(Request $request)
    {
        Session::flash('cemail', $request->email);
        Session::flash('cphone', $request->phone);

        $paket = Paket::where('status', '=', 'aktif')->get();
        foreach ($paket as $p) {
            $p->sisa = $p->jumlah - Pendaftaran::where('id_paket', $p->id)->where('status', '=', 'paid')->count() - Pendaftaran::where('id_paket', $p->id)->where('status', '=', 'pending')->count();
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

            $cariid = Pendaftaran::where('email', $request->email)->where('phone', $request->phone)->first();

            $datapaket = Paket::find($cariid->id_paket);

            if ($cariid->bank == null) {

                $agent = new Agent();

                // Deteksi User-Agent
                $userAgent = $agent->getUserAgent();

                // Periksa jika User-Agent mengindikasikan Android atau iOS
                if ($agent->isAndroidOS() || $agent->isiOS()) {
                    // Set User-Agent ke Windows
                    $agent->setUserAgent('Windows');
                }

                \Midtrans\Config::$serverKey = config('midtrans.server_key');
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                \Midtrans\Config::$isProduction = false;

                // \Midtrans\Config::$isProduction = true;
                // Set sanitization on (default)
                \Midtrans\Config::$isSanitized = true;
                // Set 3DS transaction for credit card to true
                \Midtrans\Config::$is3ds = true;

                $params = array(
                    'transaction_details' => array(
                        'order_id' => $cariid->id,
                        'gross_amount' => $datapaket->harga,
                    ),
                    'customer_details' => array(
                        'first_name' => $cariid->name,
                        'phone' => $cariid->phone,
                        'email' => $cariid->email,
                    ),
                    'item_details' => array(
                        array(
                            'id' => $datapaket->id,
                            'price' => $datapaket->harga,
                            'quantity' => 1,
                            'name' => $datapaket->name,
                        ),
                    ),
                );

                // cek persedian tiket

                $cekpendaftaran = Pendaftaran::where('id_paket', $cariid->id_paket)->where('status', '=', 'paid')->count() - Pendaftaran::where('id_paket', $cariid->id_paket)->where('status', '=', 'pending')->count();
                if ($datapaket->jumlah <= $cekpendaftaran) {
                    $cariid->delete();
                    return redirect('/')->with('pakethabis', 'Paket sudah penuh');
                } else {
                    $snapToken = \Midtrans\Snap::getSnapToken($params);
                    return view('landing.pages.index', [
                        'snapToken' => $snapToken,
                        'datatiket' => $pendaftaran,
                        'paket' => $paket,
                    ]);
                }
            } else {

                return view('landing.pages.index', [
                    'snapToken' => '',
                    'datatiket' => $pendaftaran,
                    'paket' => $paket,
                ]);
            }
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
        $serverkey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverkey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'settlement') {

                if ($request->permata_va_number != null) {

                    $order = Pendaftaran::find($request->order_id);
                    $order->bank = 'permata';
                    $order->va = $request->permata_va_number;
                    $order->kadaluarsa = $request->expiry_time;
                    $order->status = 'paid';
                    $order->save();
                } else {

                    $order = Pendaftaran::find($request->order_id);
                    $order->bank = $request->va_numbers[0]['bank'];
                    $order->va = $request->va_numbers[0]['va_number'];
                    $order->kadaluarsa = $request->expiry_time;
                    $order->status = 'paid';
                    $order->save();
                }
            } elseif ($request->transaction_status == 'pending') {

                if ($request->permata_va_number != null) {

                    $order = Pendaftaran::find($request->order_id);
                    $order->bank = 'permata';
                    $order->va = $request->permata_va_number;
                    $order->kadaluarsa = $request->expiry_time;
                    $order->status = 'pending';
                    $order->save();
                } else {

                    $order = Pendaftaran::find($request->order_id);
                    $order->bank = $request->va_numbers[0]['bank'];
                    $order->va = $request->va_numbers[0]['va_number'];
                    $order->kadaluarsa = $request->expiry_time;
                    $order->status = 'pending';
                    $order->save();
                }
            } else {

                if ($request->permata_va_number != null) {

                    $order = Pendaftaran::find($request->order_id);
                    $order->bank = 'permata';
                    $order->va = $request->permata_va_number;
                    $order->kadaluarsa = $request->expiry_time;
                    $order->status = 'expire';
                    $order->save();
                } else {

                    $order = Pendaftaran::find($request->order_id);
                    $order->bank = $request->va_numbers[0]['bank'];
                    $order->va = $request->va_numbers[0]['va_number'];
                    $order->kadaluarsa = $request->expiry_time;
                    $order->status = 'expire';
                    $order->save();
                }
            }
        }
    }
}
