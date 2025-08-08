<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visiMisi = VisiMisi::get()->first();
        return view('admin.profile.visi_misi.index', compact('visiMisi'));
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
    public function show(VisiMisi $visiMisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisiMisi $visiMisi)
    {
        $data = $visiMisi;
        return view('admin.profile.visi_misi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VisiMisi $visiMisi)
    {
        $request->validate([
            'gambar' => 'image|mimes:png,jpg,jpeg|max:10240',
            'visi' => 'required',
            'misi' => 'required',
        ], $this->feedback_validate);

        if ($request->gambar) {
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = time() . '-' . $file->getClientOriginalName();
                $destinationPatch = public_path('assets/upload/gambar');
                $file->move($destinationPatch, $filename);
                $filePath = 'assets/upload/gambar/' . $filename;

                if ($visiMisi->gambar) {
                    $path = public_path($visiMisi->gambar);
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            }
        } else {
            $filePath = $visiMisi->gambar;
        }

        $visiMisi->update([
            'gambar' => $filePath,
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        return redirect()->route('admin.visi-misi')->with('success',  'Visi Misi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisiMisi $visiMisi)
    {
        //
    }
}
