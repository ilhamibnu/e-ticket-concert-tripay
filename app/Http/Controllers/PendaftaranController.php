<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = Pendaftaran::with('paket')->get();
        return view('admin.pages.pendaftaran',[
            'pendaftaran' => $pendaftaran,
        ]);
    }
}
