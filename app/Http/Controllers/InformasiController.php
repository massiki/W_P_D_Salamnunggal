<?php

namespace App\Http\Controllers;

use App\Models\Potensi;
use App\Models\Umkm;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function umkm()
    {
        $umkm = Umkm::latest()->paginate(9);
        return view('user.informasi.produk_umkm', compact('umkm'));
    }

    public function potensi()
    {
        $potensi = Potensi::latest()->paginate(9);
        return view('user.informasi.potensi', compact('potensi'));
    }
}
