<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::where('kategori', 'logo')->orWhere('kategori', 'banner')->latest()->get();
        return view('admin.image.index', compact('images'));
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
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        $data = $image;
        return view('admin.image.edit', compact('data'));
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
            'gambar' => $filePath,
            'kategori' => $image->kategori,
        ]);

        return redirect()->route('admin.image')->with('success', 'Image berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
