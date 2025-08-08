<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\InfoKontak;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::latest();
        if (request('cari')) {
            $contacts = $contacts->where('nama', 'like', '%' . request('cari') . '%');
        }
        $contacts = $contacts->paginate(10);
        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd('ini create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|max:255',
            'saran' => 'required',
        ], $this->feedback_validate);

        Contact::create($validatedData);

        return redirect()->back()->with('success', 'Saran berhasil terkirim');
    }


    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        dd($contact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        dd($contact);
    }

    public function front()
    {
        $infoKontak = InfoKontak::take(4)->get();
        return view('user.contact', compact('infoKontak'));
    }
}
