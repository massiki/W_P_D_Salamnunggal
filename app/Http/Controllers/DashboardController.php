<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Penduduk;
use App\Models\Potensi;
use App\Models\Sambutan;
use App\Models\Structure;
use App\Models\Umkm;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $countStructures = Structure::get()->count();
        $penduduk = Penduduk::first();
        $countPotensi = Potensi::get()->count();
        $countUmkm = Umkm::get()->count();
        $countNews = News::get()->count();
        return view('admin.dashboard', compact(['penduduk', 'countStructures', 'countPotensi', 'countUmkm', 'countNews']));
    }

    public function welcome()
    {
        $cards = Card::all();
        $sambutan = Sambutan::get()->first();
        $structures = Structure::take(5)->get();
        $news = News::latest()->take(3)->get();
        $umkm = Umkm::latest()->take(3)->get();
        $potensi = Potensi::latest()->take(6)->get();
        $penduduk = Penduduk::first();
        return view('user.welcome', compact(['sambutan', 'structures', 'news', 'umkm', 'potensi', 'penduduk',  'cards']));
    }
}
