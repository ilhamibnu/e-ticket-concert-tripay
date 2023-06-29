<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Pendaftaran;


class LandingController extends Controller
{
    public function index()
    {
        $paket = Paket::all();
        $pendaftaran = Pendaftaran::find(0);

        return view('landing.pages.index', [
            'paket' => $paket,
            'datatiket' => $pendaftaran,
            'snapToken' => ''
        ]);
    }

    public function daftar(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:tb_pendaftaran',
            'phone' => 'required|unique:tb_pendaftaran',
            'id_paket' => 'required',
        ],[
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'phone.required' => 'Nomor telepon harus diisi',
            'phone.unique' => 'Nomor telepon sudah terdaftar',
            'id_paket.required' => 'Paket harus dipilih',
        ]
        );

        $pendaftaran = new Pendaftaran;
        // membuat id tiket dengan format tahun bulan tanggal + 1 digit angka berurut
        $idtiket = date('Ymd') . sprintf("%01s", Pendaftaran::count() + 1);
        $pendaftaran->id = $idtiket;
        $pendaftaran->name = $request->name;
        $pendaftaran->email = $request->email;
        $pendaftaran->phone = $request->phone;
        $pendaftaran->tiket = $idtiket;
        $pendaftaran->bank = '';
        $pendaftaran->va = '';
        $pendaftaran->kadaluarsa = '';
        $pendaftaran->status = 'pending';
        $pendaftaran->id_paket = $request->id_paket;
        $pendaftaran->save();

        return redirect('/')->with('create', 'Pendaftaran berhasil');
    }



    public function caritiket(Request $request)
    {
        $paket = Paket::all();
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
        ],[
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'phone.required' => 'Nomor telepon harus diisi',
        ]
        );

        $pendaftaran = Pendaftaran::with('paket')->where('email', $request->email)->where('phone', $request->phone)->first();
        $cariid = Pendaftaran::where('email', $request->email)->where('phone', $request->phone)->first();
        $id = $cariid->id;
        $datapendaftaran = Pendaftaran::find($id);
        $datapaket = Paket::find($datapendaftaran->id_paket);

        if($pendaftaran){

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
                    'order_id' => $datapendaftaran->id,
                    'gross_amount' => $datapaket->harga,
                ),
                'customer_details' => array(
                    'first_name' => $datapendaftaran->name,
                    'phone' => $datapendaftaran->phone,
                    'email' => $datapendaftaran->email,
                ),
            );
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            return view('landing.pages.index', [
                'snapToken' => $snapToken,
                'datatiket' => $pendaftaran,
                'paket' => $paket
            ]);
        }else{
            return redirect('/')->with('error', 'Data tidak ditemukan');
        }
    }
    public function bataltiket($id){
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
                $order = Pendaftaran::find($request->order_id);
                $order->bank = $request->va_numbers[0]['bank'];
                $order->va = $request->va_numbers[0]['va_number'];
                $order->kadaluarsa = $request->transaction_time;
                $order->status = 'paid';
                $order->save();
            }elseif ($request->transaction_status == 'pending') {
                $order = Pendaftaran::find($request->order_id);
                $order->bank = $request->va_numbers[0]['bank'];
                $order->va = $request->va_numbers[0]['va_number'];
                $order->kadaluarsa = $request->transaction_time;
                $order->status = 'pending';
                $order->save();
            }else{
                $order = Pendaftaran::find($request->order_id);
                $order->bank = $request->va_numbers[0]['bank'];
                $order->va = $request->va_numbers[0]['va_number'];
                $order->kadaluarsa = $request->transaction_time;
                $order->status = 'expire';
                $order->save();
            }
        }
    }
}
