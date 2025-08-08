<?php

namespace App\Http\Controllers;

use App\Models\InfoKontak;
use Illuminate\Http\Request;

class InfoKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infoKontak = InfoKontak::latest();
        if (request('cari')) {
            $infoKontak = $infoKontak->where('informasi', 'like', '%' . request('cari') . '%');
        }
        $infoKontak = $infoKontak->paginate(10);
        return view('admin.footer.info_kontak.index', compact('infoKontak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.info_kontak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|max:255',
            'nama' => 'required|max:255',
            'informasi' => 'required||max:255',
        ], $this->feedback_validate);

        InfoKontak::create($validated);

        return redirect()->route('admin.info-kontak')->with('success', 'Info Kontak berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(InfoKontak $infoKontak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InfoKontak $infoKontak)
    {
        $data = $infoKontak;
        return view('admin.footer.info_kontak.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InfoKontak $infoKontak)
    {
        $validated = $request->validate([
            'icon' => 'required|max:255',
            'nama' => 'required|max:255',
            'informasi' => 'required|max:255',
        ], $this->feedback_validate);

        $infoKontak->update($validated);

        return redirect()->route('admin.info-kontak')->with('success', 'Info Kontak berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InfoKontak $infoKontak)
    {
        $infoKontak->delete();
        return redirect()->route('admin.info-kontak')->with('success', 'Info Kontak berhasil dihapus');
    }
}
