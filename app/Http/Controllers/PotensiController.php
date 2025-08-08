<?php

namespace App\Http\Controllers;

use App\Models\Potensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PotensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $potensi = Potensi::latest();
        if (request('cari')) {
            $potensi = $potensi->where('judul', 'like', '%' . request('cari') . '%')
                ->orWhere('deskripsi', 'like', '%' . request('cari') . '%');
        }
        $potensi = $potensi->paginate(10);
        return view('admin.informasi.potensi.index', compact('potensi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.informasi.potensi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:10240',
            'judul' => 'required|max:255',
            'deskripsi' => 'required'
        ], $this->feedback_validate);

        // simpan file pach gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '-' . $file->getClientOriginalName();
            $destinationPatch = public_path('assets/upload/gambar');
            $file->move($destinationPatch, $filename);
            $filePath = 'assets/upload/gambar/' . $filename;
        }

        Potensi::create([
            'gambar' =>  $filePath,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.potensi')->with('success', 'Potensi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Potensi $potensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Potensi $potensi)
    {
        $data = $potensi;
        return view('admin.informasi.potensi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Potensi $potensi)
    {
        // validation
        $request->validate([
            'gambar' => 'image|mimes:png,jpg,jpeg|max:10240',
            'judul' => 'required|max:255',
            'deskripsi' => 'required'
        ], $this->feedback_validate);

        if ($request->gambar) {
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = time() . '-' . $file->getClientOriginalName();
                $destinationPatch = public_path('assets/upload/gambar');
                $file->move($destinationPatch, $filename);
                $filePath = 'assets/upload/gambar/' . $filename;

                if ($potensi->gambar) {
                    $path = public_path($potensi->gambar);
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            }
        } else {
            $filePath = $potensi->gambar;
        }

        $potensi->update([
            'gambar' => $filePath,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.potensi')->with('success', 'Potensi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Potensi $potensi)
    {
        if ($potensi->gambar) {
            $path = public_path($potensi->gambar);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $potensi->delete();

        return redirect()->route('admin.potensi')->with('success', 'Potensi berhasil dihapus');
    }
}
