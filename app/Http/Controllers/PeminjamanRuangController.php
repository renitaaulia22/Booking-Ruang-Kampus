<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanRuang;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class PeminjamanRuangController extends Controller
{
    // BROWSE: Menampilkan daftar peminjaman beserta relasinya
    public function index()
    {
        $peminjamans = PeminjamanRuang::with(['dosen', 'mahasiswa', 'matakuliah'])->latest()->get();
        return view('peminjaman_ruangs.index', compact('peminjamans'));
    }

    // ADD (Form): Mengirim data mahasiswa, dosen, matkul untuk dropdown
    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        $matakuliahs = Matakuliah::all();

        return view('peminjaman_ruangs.create', compact('mahasiswas', 'dosens', 'matakuliahs'));
    }

    // ADD (Proses Simpan)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_ruangan'    => 'required|string|max:255',
            'mahasiswa_id'    => 'required|exists:mahasiswas,id',
            'dosen_id'        => 'required|exists:dosens,id',
            'matakuliah_id'   => 'required|exists:matakuliahs,id',
            'tanggal_pinjam'  => 'required|date',
            'jam_mulai'       => 'required',
            'jam_selesai'     => 'required|after:jam_mulai',
            'tujuan_kegiatan' => 'required|string',
            'status'          => 'required|in:Menunggu,Disetujui,Selesai,Dibatalkan',
        ]);

        PeminjamanRuang::create($validated);

        return redirect()->route('peminjaman-ruangs.index')->with('success', 'Booking ruangan berhasil diajukan!');
    }

    // READ: Rincian peminjaman
    public function show(PeminjamanRuang $peminjaman_ruang)
    {
        $peminjaman_ruang->load(['dosen', 'mahasiswa', 'matakuliah']);
        return view('peminjaman_ruangs.show', compact('peminjaman_ruang'));
    }

    // EDIT (Form): Menampilkan form ubah beserta data dropdown
    public function edit(PeminjamanRuang $peminjaman_ruang)
    {
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        $matakuliahs = Matakuliah::all();

        return view('peminjaman_ruangs.edit', compact('peminjaman_ruang', 'mahasiswas', 'dosens', 'matakuliahs'));
    }

    // EDIT (Proses Update)
    public function update(Request $request, PeminjamanRuang $peminjaman_ruang)
    {
        $validated = $request->validate([
            'nama_ruangan'    => 'required|string|max:255',
            'mahasiswa_id'    => 'required|exists:mahasiswas,id',
            'dosen_id'        => 'required|exists:dosens,id',
            'matakuliah_id'   => 'required|exists:matakuliahs,id',
            'tanggal_pinjam'  => 'required|date',
            'jam_mulai'       => 'required',
            'jam_selesai'     => 'required|after:jam_mulai',
            'tujuan_kegiatan' => 'required|string',
            'status'          => 'required|in:Menunggu,Disetujui,Selesai,Dibatalkan',
        ]);

        $peminjaman_ruang->update($validated);

        return redirect()->route('peminjaman-ruangs.index')->with('success', 'Data booking ruangan berhasil diperbarui!');
    }

    // DELETE: Menghapus data booking
    public function destroy(PeminjamanRuang $peminjaman_ruang)
    {
        $peminjaman_ruang->delete();
        return redirect()->route('peminjaman-ruangs.index')->with('success', 'Data booking berhasil dihapus!');
    }
}