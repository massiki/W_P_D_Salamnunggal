<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Image;
use App\Models\Structure;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function profile()
    {
        $visiMisi = VisiMisi::get()->first();
        $struktur = Image::where('kategori', 'struktur')->get()->first();
        return view('user.about.profile', compact(['visiMisi', 'struktur']));
    }

    public function history()
    {
        $histories = History::all();
        return view('user.about.history', compact('histories'));
    }

    public function structure()
    {
        $structures = Structure::all();
        return view('user.about.struktur_pemerintahan', compact('structures'));
    }
}
