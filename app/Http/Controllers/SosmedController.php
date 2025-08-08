<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use Illuminate\Http\Request;

class SosmedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sosmed = Sosmed::latest();
        if (request('cari')) {
            $sosmed = $sosmed->where('nama', 'like', '%' . request('cari') . '%');
        }
        $sosmed = $sosmed->paginate(10);
        return view('admin.footer.sosmed.index', compact('sosmed'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.sosmed.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'icon' => 'required|max:255',
            'type' => 'required|max:255|in:url,phone',
            'value' => 'max:255',
        ], $this->feedback_validate);

        Sosmed::create($validated);

        return redirect()->route('admin.sosmed')->with('success', 'Sosial Media berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sosmed $sosmed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sosmed $sosmed)
    {
        $data = $sosmed;
        return view('admin.footer.sosmed.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sosmed $sosmed)
    {

        // validate
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'icon' => 'required|max:255',
            'type' => 'required|max:255|in:url,phone',
            'value' => 'max:255',
        ], $this->feedback_validate);

        $sosmed->update($validated);

        return redirect()->route('admin.sosmed')->with('success', 'Sosial Media berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sosmed $sosmed)
    {
        $sosmed->delete();
        return redirect()->route('admin.sosmed')->with('success', 'Sosial Media berhasil dihapus');
    }
}
