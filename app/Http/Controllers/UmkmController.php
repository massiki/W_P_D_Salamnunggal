<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $umkm = Umkm::latest();
        if (request('cari')) {
            $umkm = $umkm->where('jenis_umkm', 'like', '%' . request('cari') . '%')
                ->orWhere('nama_pemilik', 'like', '%' . request('cari') . '%');
        }
        $umkm = $umkm->paginate(10);
        return view('admin.informasi.umkm.index', compact('umkm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.informasi.umkm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:10240',
            'nama_pemilik' => 'required|max:255',
            'jenis_umkm' => 'required|max:255',
            // 'harga' => 'numeric',
            'alamat' => 'required',
            // 'no_whatsapp' => 'numeric',
        ], $this->feedback_validate);

        // simpan file pach gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '-' . $file->getClientOriginalName();
            $destinationPatch = public_path('assets/upload/umkm');
            $file->move($destinationPatch, $filename);
            $filePath = 'assets/upload/umkm/' . $filename;
        }

        Umkm::create([
            'gambar' =>  $filePath,
            'nama_pemilik' => $request->nama_pemilik,
            'jenis_umkm' => $request->jenis_umkm,
            'harga' => $request->harga,
            'instagram' => $request->instagram,
            'shopee' => $request->shopee,
            'tiktok' => $request->tiktok,
            'alamat' => $request->alamat,
            'no_whatsapp' => $request->no_whatsapp,
        ]);

        return redirect()->route('admin.umkm')->with('success', 'UMKM berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Umkm $umkm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Umkm $umkm)
    {
        $data = $umkm;
        return view('admin.informasi.umkm.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Umkm $umkm)
    {
        // validation
        $request->validate([
            'gambar' => 'image|mimes:png,jpg,jpeg|max:10240',
            'nama_pemilik' => 'required|max:255',
            'jenis_umkm' => 'required|max:255',
            // 'harga' => 'numeric',
            'alamat' => 'required',
            // 'no_whatsapp' => 'numeric',
        ], $this->feedback_validate);

        if ($request->gambar) {
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = time() . '-' . $file->getClientOriginalName();
                $destinationPatch = public_path('assets/upload/umkm');
                $file->move($destinationPatch, $filename);
                $filePath = 'assets/upload/umkm/' . $filename;

                if ($umkm->gambar) {
                    $path = public_path($umkm->gambar);
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            }
        } else {
            $filePath = $umkm->gambar;
        }

        $umkm->update([
            'gambar' =>  $filePath,
            'nama_pemilik' => $request->nama_pemilik,
            'jenis_umkm' => $request->jenis_umkm,
            'harga' => $request->harga,
            'instagram' => $request->instagram,
            'shopee' => $request->shopee,
            'tiktok' => $request->tiktok,
            'alamat' => $request->alamat,
            'no_whatsapp' => $request->no_whatsapp,
        ]);

        return redirect()->route('admin.umkm')->with('success', 'UMKM berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Umkm $umkm)
    {
        if ($umkm->gambar) {
            $path = public_path($umkm->gambar);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $umkm->delete();

        return redirect()->route('admin.umkm')->with('success', 'UMKM berhasil dihapus');
    }
}
