<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::latest()->get();
        return view('mahasiswas.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'kontak_wa' => 'required|string|max:20',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswas.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswas.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswas.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'kontak_wa' => 'required|string|max:20',
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswas.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}