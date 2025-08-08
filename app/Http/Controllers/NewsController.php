<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest();
        if (request('cari')) {
            $news = $news->where('judul', 'like', '%' . request('cari') . '%')
                ->orWhere('deskripsi', 'like', '%' . request('cari') . '%');
        }
        $news = $news->paginate(10);
        return view('admin.informasi.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.informasi.news.create');
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

        // membuat slug
        $count = 1;
        $slug = str($request->judul)->slug();
        while (News::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . $count;
            $count++;
        }

        // simpan file pach gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '-' . $file->getClientOriginalName();
            $destinationPatch = public_path('assets/upload/berita');
            $file->move($destinationPatch, $filename);
            $filePath = 'assets/upload/berita/' . $filename;
        }

        News::create([
            'gambar' =>  $filePath,
            'judul' => $request->judul,
            'slug' => $slug,
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::id(),
            'views' => 0
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambahkan');
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
    public function edit(News $news)
    {
        $data = $news;
        return view('admin.informasi.news.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        // validation
        $request->validate([
            'gambar' => 'image|mimes:png,jpg,jpeg|max:10240',
            'judul' => 'required|max:255',
            'deskripsi' => 'required'
        ], $this->feedback_validate);

        // membuat slug
        $count = 1;
        $slug = str($request->judul)->slug();
        while (News::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . $count;
            $count++;
        }

        $count = 1;
        $slug = str($request->judul)->slug();
        while (News::where('slug', $slug)
            ->where('id', '!=', $news->id)
            ->exists()
        ) {
            $slug = $slug . '-' . $count;
            $count++;
        }

        if ($request->gambar) {
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = time() . '-' . $file->getClientOriginalName();
                $destinationPatch = public_path('assets/upload/berita');
                $file->move($destinationPatch, $filename);
                $filePath = 'assets/upload/berita/' . $filename;

                if ($news->gambar) {
                    $path = public_path($news->gambar);
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            }
        } else {
            $filePath = $news->gambar;
        }

        $news->update([
            'gambar' =>  $filePath,
            'judul' => $request->judul,
            'slug' => $slug,
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::id(),
            'views' => 0
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        if ($news->gambar) {
            $path = public_path($news->gambar);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $news->delete();

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil dihapus');
    }

    public function front()
    {
        $news = News::latest();
        if (request('cari')) {
            $news = $news->where('judul', 'like', '%' . request('cari') . '%');
        }
        $news = $news->paginate(3);
        return view('user.news.berita', compact('news'));
    }

    public function detail(News $news)
    {
        $news->increment('views');
        $data = $news;
        return view('user.news.detail', compact('data'));
    }
}
