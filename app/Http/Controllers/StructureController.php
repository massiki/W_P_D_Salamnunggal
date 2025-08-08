<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('cari')) {
            $structures = Structure::where('nama', 'like', '%' . request('cari') . '%')
                ->orWhere('jabatan', 'like', '%' . request('cari') . '%')
                ->get();
        } else {
            $structures = Structure::all();
        }
        return view('admin.profile.struktur_pemerintahan.index', compact('structures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profile.struktur_pemerintahan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:10240',
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'facebook' => 'max:255',
            'whatsapp' => 'max:255',
            'tiktok' => 'max:255',
        ], $this->feedback_validate);

        // simpan file pach gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '-' . $file->getClientOriginalName();
            $destinationPatch = public_path('assets/upload/gambar');
            $file->move($destinationPatch, $filename);
            $filePath = 'assets/upload/gambar/' . $filename;
        }

        Structure::create([
            'gambar' => $filePath,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'facebook' => $request->facebook,
            'whatsapp' => $request->whatsapp,
            'tiktok' => $request->tiktok,
        ]);

        return redirect()->route('admin.struktur-pemerintahan')->with('success', 'Struktur behasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Structure $structure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Structure $structure)
    {
        $data = $structure;
        return view('admin.profile.struktur_pemerintahan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Structure $structure)
    {
        // validation
        $request->validate([
            'gambar' => 'image|mimes:png,jpg,jpeg|max:10240',
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'facebook' => 'max:255',
            'whatsapp' => 'max:255',
            'tiktok' => 'max:255',
        ], $this->feedback_validate);

        if ($request->gambar) {
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = time() . '-' . $file->getClientOriginalName();
                $destinationPatch = public_path('assets/upload/gambar');
                $file->move($destinationPatch, $filename);
                $filePath = 'assets/upload/gambar/' . $filename;

                if ($structure->gambar) {
                    $path = public_path($structure->gambar);
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            }
        } else {
            $filePath = $structure->gambar;
        }

        $structure->update([
            'gambar' =>  $filePath,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'facebook' => $request->facebook,
            'whatsapp' => $request->whatsapp,
            'tiktok' => $request->tiktok,
        ]);

        return redirect()->route('admin.struktur-pemerintahan')->with('success', 'Struktur Pemerintahan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Structure $structure)
    {
        if ($structure->gambar) {
            $path = public_path($structure->gambar);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $structure->delete();

        return redirect()->route('admin.struktur-pemerintahan')->with('success', 'Berita berhasil dihapus');
    }
}
