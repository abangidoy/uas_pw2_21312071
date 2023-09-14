<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        // Menampilkan daftar profil
        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));
    }

    public function show($id)
    {
        // Menampilkan detail profil berdasarkan ID
        $profile = Profile::findOrFail($id);
        return view('profiles.show', compact('profile'));
    }

    public function create()
    {
        // Menampilkan formulir untuk membuat profil baru
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        // Menyimpan profil baru ke database
        $validatedData = $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required',
        ]);

        Profile::create($validatedData);

        return redirect('/profiles')->with('success', 'Profil berhasil dibuat!');
    }

    public function edit($id)
    {
        // Menampilkan formulir untuk mengedit profil
        $profile = Profile::findOrFail($id);
        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        // Memperbarui profil dalam database
        $validatedData = $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required',
        ]);

        Profile::whereId($id)->update($validatedData);

        return redirect('/profiles')->with('success', 'Profil berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Menghapus profil dari database
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return redirect('/profiles')->with('success', 'Profil berhasil dihapus!');
    }
}