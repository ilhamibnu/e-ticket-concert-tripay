<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use App\Models\Paket;
use App\Models\Pendaftaran;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class LandingController extends Controller
{
    public function index()
    {
        $paket = Paket::all();
        $pendaftaran = Pendaftaran::find(0);

        return view('landing.pages.index', [
            'paket' => $paket,
            'datatiket' => $pendaftaran,
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

        $pendaftaran = Pendaftaran::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'tiket' => '',
            'qris' => '',
            'status' => 'paid',
            'id_paket' => $request->id_paket,
        ]);

        $cekid = Pendaftaran::all()->last();
        $pendaftaran->update([
            'tiket' => $cekid->id,
        ]);



        return redirect('/')->with('create', 'Pendaftaran berhasil, silahkan cek email anda');

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
        if($pendaftaran){
            return view('landing.pages.index', [
                'datatiket' => $pendaftaran,
                'paket' => $paket
            ]);
        }else{
            return redirect('/')->with('error', 'Data tidak ditemukan');
        }
    }
}
