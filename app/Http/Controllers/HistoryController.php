<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = History::latest()->get();
        return view('admin.profile.histori.index', compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profile.histori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:10240',
            'nama' => 'required|max:255',
            'periode_awal' => 'required|max:255',
            'periode_akhir' => 'required|max:255',
        ], $this->feedback_validate);

        // simpan path
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '-' . $file->getClientOriginalName();
            $destinationPatch = public_path('assets/upload/gambar');
            $file->move($destinationPatch, $filename);
            $filePath = 'assets/upload/gambar/' . $filename;
        }

        History::create([
            'gambar' => $filePath,
            'nama' => $request->nama,
            'periode_awal' => $request->periode_awal,
            'periode_akhir' => $request->periode_akhir,
        ]);

        return redirect()->route('admin.histori')->with('success', 'Histori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history)
    {
        $data = $history;
        return view('admin.profile.histori.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, History $history)
    {
        $request->validate([
            'gambar' => 'image|mimes:png,jpg,jpeg|max:10240',
            'nama' => 'required|max:255',
            'periode_awal' => 'required|max:255',
            'periode_akhir' => 'required|max:255',
        ], $this->feedback_validate);

        if ($request->gambar) {
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = time() . '-' . $file->getClientOriginalName();
                $destinationPatch = public_path('assets/upload/gambar');
                $file->move($destinationPatch, $filename);
                $filePath = 'assets/upload/gambar/' . $filename;

                if ($history->gambar) {
                    $path = public_path($history->gambar);
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            }
        } else {
            $filePath = $history->gambar;
        }

        $history->update([
            'gambar' => $filePath,
            'nama' => $request->nama,
            'periode_awal' => $request->periode_awal,
            'periode_akhir' => $request->periode_akhir,
        ]);

        return redirect()->route('admin.histori')->with('success', 'Histori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history)
    {
        if ($history->gambar) {
            $path = public_path($history->gambar);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $history->delete();
        return redirect()->back()->with('success', 'Histori berhasil dihapus.');
    }
}
