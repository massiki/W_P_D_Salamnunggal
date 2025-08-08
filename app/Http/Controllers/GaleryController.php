<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeries = Image::where('kategori', 'galeri')->latest()->paginate(10);
        return view('admin.galery.index', compact('galeries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:10240'
        ], $this->feedback_validate);

        // simpan file pach gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '-' . $file->getClientOriginalName();
            $destinationPatch = public_path('assets/upload/gambar');
            $file->move($destinationPatch, $filename);
            $filePath = 'assets/upload/gambar/' . $filename;
        }

        Image::create([
            'gambar' => $filePath,
            'kategori' => 'galeri',
        ]);

        return redirect()->route('admin.galeri')->with('success', 'Galeri berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        $data = $image;
        return view('admin.galery.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        // validation
        $request->validate([
            'gambar' => 'image|mimes:png,jpg,jpeg|max:10240',
        ], $this->feedback_validate);

        if ($request->gambar) {
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = time() . '-' . $file->getClientOriginalName();
                $destinationPatch = public_path('assets/upload/gambar');
                $file->move($destinationPatch, $filename);
                $filePath = 'assets/upload/gambar/' . $filename;

                if ($image->gambar) {
                    $path = public_path($image->gambar);
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            }
        } else {
            $filePath = $image->gambar;
        }

        $image->update([
            'gambar' =>  $filePath,
            'kategori' => $image->kategori
        ]);

        return redirect()->route('admin.galeri')->with('success', 'Galeri berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        if ($image->gambar) {
            $path = public_path($image->gambar);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $image->delete();

        return redirect()->route('admin.galeri')->with('success', 'Galeri berhasil dihapus');
    }

    public function front()
    {
        $galeries = Image::where('kategori', 'galeri')->latest()->paginate(9);
        return view('user.galeri', compact('galeries'));
    }
}
