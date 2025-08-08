<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penduduk = Penduduk::all();
        return view('admin.penduduk.index', compact('penduduk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk)
    {
        $data = $penduduk;
        return view('admin.penduduk.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        // validation
        $validated = $request->validate([
            'jumlah_penduduk' => 'required|numeric',
            'jumlah_rt' => 'required|numeric',
            'jumlah_rw' => 'required|numeric',
            'jumlah_dusun' => 'required|numeric',
        ]);

        $penduduk->update($validated);
        return redirect()->route('admin.penduduk')->with('success', 'Data penduduk berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        //
    }
}
