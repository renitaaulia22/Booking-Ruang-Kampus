<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    // BROWSE: Menampilkan semua data dosen
    public function index()
    {
        $dosens = Dosen::latest()->get();
        return view('dosens.index', compact('dosens'));
    }

    // ADD (Form): Form input dosen baru
    public function create()
    {
        return view('dosens.create');
    }

    // ADD (Proses Simpan)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|unique:dosens,nip',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:dosens,email',
            'departemen' => 'required|string|max:255',
        ]);

        Dosen::create($validated);

        return redirect()->route('dosens.index')->with('success', 'Data dosen berhasil ditambahkan!');
    }

    // READ: Melihat detail satu dosen
    public function show(Dosen $dosen)
    {
        return view('dosens.show', compact('dosen'));
    }

    // EDIT (Form): Form ubah data dosen
    public function edit(Dosen $dosen)
    {
        return view('dosens.edit', compact('dosen'));
    }

    // EDIT (Proses Update)
    public function update(Request $request, Dosen $dosen)
    {
        $validated = $request->validate([
            'nip' => 'required|unique:dosens,nip,' . $dosen->id,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:dosens,email,' . $dosen->id,
            'departemen' => 'required|string|max:255',
        ]);

        $dosen->update($validated);

        return redirect()->route('dosens.index')->with('success', 'Data dosen berhasil diperbarui!');
    }

    // DELETE: Menghapus data dosen
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosens.index')->with('success', 'Data dosen berhasil dihapus!');
    }
}