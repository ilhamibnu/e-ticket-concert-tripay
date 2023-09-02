<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Pendaftaran;

class PaketController extends Controller
{
    public function index()
    {
        $paket = Paket::all();
        foreach ($paket as $p) {
            $p->sisa = $p->jumlah - Pendaftaran::where('id_paket', $p->id)->where('status', '=', 'paid')->count();
        }
        return view('admin.pages.paket', [
            'paket' => $paket,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'harga' => 'required|numeric|gte:0',
            'jumlah' => 'required|numeric|gte:0',
            'keterangan' => 'required',
            'status' => 'required'
        ], [
            'name.required' => 'Nama paket harus diisi',
            'harga.required' => 'Harga paket harus diisi',
            'harga.numeric' => 'Harga paket harus berupa angka',
            'harga.gte' => 'Harga paket harus lebih dari 0',
            'jumlah.required' => 'Jumlah paket harus diisi',
            'jumlah.numeric' => 'Jumlah paket harus berupa angka',
            'jumlah.gte' => 'Jumlah paket harus lebih dari 0',
            'keterangan.required' => 'Keterangan paket harus diisi',
            'status.required' => 'Status paket harus diisi',
        ]);

        $paket = new Paket;
        $paket->name = $request->name;
        $paket->harga = $request->harga;
        $paket->jumlah = $request->jumlah;
        $paket->keterangan = $request->keterangan;
        $paket->status = $request->status;
        $paket->save();
        return redirect('/paket')->with('create', 'Paket berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'harga' => 'required|numeric|gte:0',
            'jumlah' => 'required|numeric|gte:0',
            'keterangan' => 'required',
            'status' => 'required',
        ], [
            'name.required' => 'Nama paket harus diisi',
            'harga.required' => 'Harga paket harus diisi',
            'harga.numeric' => 'Harga paket harus berupa angka',
            'harga.gte' => 'Harga paket harus lebih dari 0',
            'jumlah.required' => 'Jumlah paket harus diisi',
            'jumlah.numeric' => 'Jumlah paket harus berupa angka',
            'jumlah.gte' => 'Jumlah paket harus lebih dari 0',
            'keterangan.required' => 'Keterangan paket harus diisi',
            'status.required' => 'Status paket harus diisi',
        ]);

        $jumlah_pendaftar = Pendaftaran::where('id_paket', $id)->where('status', '=', 'paid')->count() + Pendaftaran::where('id_paket', $id)->where('status', '=', 'unpaid')->count();
        if ($request->jumlah < $jumlah_pendaftar) {
            return redirect('/paket')->with('error-jumlah', 'Jumlah paket tidak boleh kurang dari jumlah terjual');
        } else {
            $paket = Paket::find($id);
            $paket->name = $request->name;
            $paket->harga = $request->harga;
            $paket->jumlah = $request->jumlah;
            $paket->keterangan = $request->keterangan;
            $paket->status = $request->status;
            $paket->save();
            return redirect('/paket')->with('update', 'Paket berhasil diubah');
        }
    }

    public function destroy($id)
    {

        $cek = Pendaftaran::where('id_paket', $id)->count();
        if ($cek > 0) {
            return redirect('/paket')->with('error-relasi', 'Paket tidak dapat dihapus karena sudah terdaftar');
        } else {

            $paket = Paket::find($id);
            $paket->delete();
            return redirect('/paket')->with('delete', 'Paket berhasil dihapus');
        }
    }

    public function detailpaket($id)
    {
        $pendaftaran = Pendaftaran::with('paket')->where('id_paket', $id)->get();
        return view('admin.pages.detail-paket', [
            'pendaftaran' => $pendaftaran,
        ]);
    }
}
