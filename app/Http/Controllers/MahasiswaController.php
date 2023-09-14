<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|unique:21312071_mahasiswa', // Pastikan 'npm' diisi dan unik
            'nama' => 'required',
            'alamat' => 'required',
        ]);
    
        $mahasiswa = new Mahasiswa();
        $mahasiswa->npm = $request->npm; // Isi 'npm' dari input form
        $mahasiswa->nama = $request->nama;
        $mahasiswa->alamat = $request->alamat;
        // ...
    
        $mahasiswa->save();
    
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function show($npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit($npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $npm)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        Mahasiswa::where('npm', $npm)->update($request->only(['nama', 'alamat']));

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil diperbarui');
    }

    public function destroy($npm)
    {
        Mahasiswa::where('npm', $npm)->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil dihapus');
    }
}