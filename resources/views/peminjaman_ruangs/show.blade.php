@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
    <div class="mb-6 flex justify-between items-center">
        <a href="{{ route('peminjaman-ruangs.index') }}" class="text-xs text-indigo-600 hover:underline flex items-center gap-1">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
        <a href="{{ route('peminjaman-ruangs.edit', $peminjaman_ruang->id) }}" class="text-xs bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1.5 rounded-lg hover:bg-amber-100 flex items-center gap-1">
            <i class="fa-solid fa-pen-to-square"></i> Edit
        </a>
    </div>

    <div class="border-b border-slate-100 pb-4 mb-4 flex justify-between items-start">
        <div>
            <span class="text-xs font-semibold px-2.5 py-0.5 rounded bg-indigo-100 text-indigo-800">Detail Peminjaman Ruang</span>
            <h1 class="text-2xl font-bold text-slate-800 mt-2">{{ $peminjaman_ruang->nama_ruangan }}</h1>
        </div>
        <div>
            @if($peminjaman_ruang->status == 'Disetujui')
                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-800">Disetujui</span>
            @elseif($peminjaman_ruang->status == 'Menunggu')
                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-amber-100 text-amber-800">Menunggu</span>
            @elseif($peminjaman_ruang->status == 'Selesai')
                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-slate-100 text-slate-700">Selesai</span>
            @else
                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-rose-100 text-rose-800">Dibatalkan</span>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm mb-6">
        <div class="p-3 bg-slate-50 rounded-lg">
            <span class="text-xs text-slate-400 block font-medium">Mahasiswa Peminjam</span>
            <div class="font-semibold text-slate-800">{{ $peminjaman_ruang->mahasiswa->nama }}</div>
            <div class="text-xs text-slate-500 font-mono">{{ $peminjaman_ruang->mahasiswa->nim }} &bull; {{ $peminjaman_ruang->mahasiswa->kontak_wa }}</div>
        </div>
        <div class="p-3 bg-slate-50 rounded-lg">
            <span class="text-xs text-slate-400 block font-medium">Dosen Penanggung Jawab</span>
            <div class="font-semibold text-slate-800">{{ $peminjaman_ruang->dosen->nama }}</div>
            <div class="text-xs text-slate-500 font-mono">NIP: {{ $peminjaman_ruang->dosen->nip }}</div>
        </div>
    </div>

    <div class="space-y-3 text-sm">
        <div>
            <span class="text-slate-400 block text-xs">Mata Kuliah / Praktikum</span>
            <span class="text-slate-800 font-semibold">{{ $peminjaman_ruang->matakuliah->kode_matkul }} - {{ $peminjaman_ruang->matakuliah->nama_matkul }} ({{ $peminjaman_ruang->matakuliah->sks }} SKS)</span>
        </div>
        <div>
            <span class="text-slate-400 block text-xs">Waktu Pelaksanaan</span>
            <span class="text-slate-800 font-medium">{{ \Carbon\Carbon::parse($peminjaman_ruang->tanggal_pinjam)->translatedFormat('l, d F Y') }} (Pukul {{ substr($peminjaman_ruang->jam_mulai, 0, 5) }} - {{ substr($peminjaman_ruang->jam_selesai, 0, 5) }} WITA)</span>
        </div>
        <div>
            <span class="text-slate-400 block text-xs">Tujuan / Agenda</span>
            <p class="text-slate-700 bg-slate-50 p-3 rounded-lg border border-slate-100 mt-1">{{ $peminjaman_ruang->tujuan_kegiatan }}</p>
        </div>
    </div>
</div>
@endsection