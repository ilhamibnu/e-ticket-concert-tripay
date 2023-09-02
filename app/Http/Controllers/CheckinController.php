<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Checkin;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckinController extends Controller
{
    public function index()
    {
        return view('admin.pages.checkin');
    }

    public function checkin(Request $request)
    {

        $datapendaftaran = Pendaftaran::with('paket')->where('tiket', $request->pendaftaran_id)->first();

        if ($datapendaftaran) {

            $pendaftaran = Pendaftaran::where('tiket', $request->pendaftaran_id)->first();
            $paket = Paket::find($pendaftaran->id_paket);

            if ($pendaftaran->status != 'PAID') {
                return response()->json([
                    'pendaftaran' => $pendaftaran,
                    'paket' => $paket,
                    'success' => 'belumbayar',
                    'message' => 'Checkin Gagal, Belum Melakukan Pembayaran'
                ]);
            } elseif ($pendaftaran->checkin == 'sudah') {
                return response()->json([
                    'pendaftaran' => $pendaftaran,
                    'paket' => $paket,
                    'success' => 'sudahcheckin',
                    'message' => 'Checkin Gagal, Sudah Melakukan Checkin'
                ]);
            } else {
                $pendaftaran->checkin = 'sudah';
                $pendaftaran->save();

                return response()->json([
                    'pendaftaran' => $pendaftaran,
                    'paket' => $paket,
                    'success' => 'berhasil',
                    'message' => 'Checkin Berhasil'
                ]);
            }
        } else {
            return response()->json([
                'success' => 'gagal',
                'message' => 'Checkin Gagal'
            ]);
        }
    }
}
