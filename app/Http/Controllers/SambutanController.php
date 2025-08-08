<?php

namespace App\Http\Controllers;

use App\Models\Sambutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SambutanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sambutan = Sambutan::all();
        return view('admin.profile.sambutan.index', compact('sambutan'));
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
    public function show(Sambutan $sambutan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sambutan $sambutan)
    {
        $data = $sambutan;
        return view('admin.profile.sambutan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sambutan $sambutan)
    {

        $request->validate([
            'foto' => 'required|image|mimes:png,jpg,jpeg|max:10240',
            'sambutan' => 'required',
        ], $this->feedback_validate);

        // simpan file path foto
        if ($request->foto) {
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = time() . '-' . $file->getClientOriginalName();
                $destinationPatch = public_path('assets/upload/sambutan');
                $file->move($destinationPatch, $filename);
                $filePath = 'assets/upload/sambutan/' . $filename;

                if ($sambutan->foto) {
                    $path = public_path($sambutan->foto);
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            }
        } else {
            $filePath = $sambutan->gambar;
        }

        $sambutan->update([
            'foto' => $filePath,
            'sambutan' => $request->sambutan,
        ]);

        return redirect()->route('admin.sambutan')->with('success', 'Sambutan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sambutan $sambutan)
    {
        //
    }
}
