<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin.user', compact('user'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // validation
        $request->validate([
            'gambar' => 'image|mimes:png,jpg,jpeg|max:10240',
            'name' => 'required|max:255',
        ], $this->feedback_validate);

        if ($request->gambar) {
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = time() . '-' . $file->getClientOriginalName();
                $destinationPatch = public_path('assets/upload/gambar');
                $file->move($destinationPatch, $filename);
                $filePath = 'assets/upload/gambar/' . $filename;

                if ($user->gambar) {
                    $path = public_path($user->gambar);
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            }
        } else {
            $filePath = $user->gambar;
        }

        $user->update([
            'gambar' =>  $filePath,
            'name' => $request->name,
            'email' => $user->email,
        ]);

        return redirect()->back()->with('success', 'Data User berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
