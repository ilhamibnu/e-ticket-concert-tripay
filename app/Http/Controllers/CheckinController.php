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
        $checkin = DB::table('tb_checkin')
            ->join('tb_pendaftaran', 'tb_checkin.id_pendaftaran', '=', 'tb_pendaftaran.id')
            ->join('tb_paket', 'tb_pendaftaran.id_paket', '=', 'tb_paket.id')
            ->select('tb_checkin.status', 'tb_checkin.id', 'tb_pendaftaran.name', 'tb_pendaftaran.email',  'tb_pendaftaran.phone', 'tb_paket.name as namepaket', 'tb_paket.harga')
            ->get();
        
        return view('admin.pages.checkin',[
            'checkin' => $checkin
        ]);
    }

    public function index2()
    {
        return view('admin.pages.checkin2');
    }

    public function checkin2(Request $request){

        $datapendaftaran = Pendaftaran::with('paket')->where('id', $request->pendaftaran_id)->first();

        if($datapendaftaran){

            $pendaftaran = Pendaftaran::find($request->pendaftaran_id);
            $paket = Paket::find($pendaftaran->id_paket);

            if($pendaftaran->status != 'paid'){
                return response()->json([
                    'pendaftaran' => $pendaftaran,
                    'paket' => $paket,
                    'success' => 'belumbayar',
                    'message' => 'Checkin Gagal, Belum Melakukan Pembayaran'
                ]);
            }elseif($pendaftaran->checkin == 'sudah'){
                return response()->json([
                    'pendaftaran' => $pendaftaran,
                    'paket' => $paket,
                    'success' => 'sudahcheckin',
                    'message' => 'Checkin Gagal, Sudah Melakukan Checkin'
                ]);
            }else{
                $pendaftaran->checkin = 'sudah';
                $pendaftaran->save();

                return response()->json([
                    'pendaftaran' => $pendaftaran,
                    'paket' => $paket,
                    'success' => 'berhasil',
                    'message' => 'Checkin Berhasil'
                ]);
            }
        }else{
            return response()->json([
                'success' => 'gagal',
                'message' => 'Checkin Gagal'
            ]);
        }

    }

    public function checkin(Request $request)
    {

        $checkin = DB::table('tb_checkin')
            ->where('id_pendaftaran', $request->pendaftaran_id)
            ->get();

        $cekpembayaranid = Pendaftaran::find($request->pendaftaran_id);

        if($cekpembayaranid == null){
            response()->json([
                'success' => false,
                'message' => 'Checkin Gagal'
            ]);
        }
        else{
            if (count($checkin) > 0) {
               response()->json([
                'success' => false,
                'message' => 'Checkin Gagal'
            ]);
            }else{
            $checkin = new Checkin;
            $checkin->id_pendaftaran = $request->pendaftaran_id;
            $checkin->status = 'Done';
            $checkin->save();

            response()->json([
                'success' => true,
                'message' => 'Checkin Berhasil'
            ]);
            }
        }
    }
}
