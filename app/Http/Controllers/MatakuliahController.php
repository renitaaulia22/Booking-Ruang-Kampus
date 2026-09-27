<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliahs = Matakuliah::latest()->get();
        return view('matakuliahs.index', compact('matakuliahs'));
    }

    public function create()
    {
        return view('matakuliahs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_matkul' => 'required|unique:matakuliahs,kode_matkul',
            'nama_matkul' => 'required|string|max:255',
            'sks' => 'required|numeric|min:1|max:6',
            'semester' => 'required|numeric|min:1|max:8',
        ]);

        Matakuliah::create($validated);

        return redirect()->route('matakuliahs.index')->with('success', 'Data mata kuliah berhasil ditambahkan!');
    }

    public function show(Matakuliah $matakuliah)
    {
        return view('matakuliahs.show', compact('matakuliah'));
    }

    public function edit(Matakuliah $matakuliah)
    {
        return view('matakuliahs.edit', compact('matakuliah'));
    }

    public function update(Request $request, Matakuliah $matakuliah)
    {
        $validated = $request->validate([
            'kode_matkul' => 'required|unique:matakuliahs,kode_matkul,' . $matakuliah->id,
            'nama_matkul' => 'required|string|max:255',
            'sks' => 'required|numeric|min:1|max:6',
            'semester' => 'required|numeric|min:1|max:8',
        ]);

        $matakuliah->update($validated);

        return redirect()->route('matakuliahs.index')->with('success', 'Data mata kuliah berhasil diperbarui!');
    }

    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();
        return redirect()->route('matakuliahs.index')->with('success', 'Data mata kuliah berhasil dihapus!');
    }
}