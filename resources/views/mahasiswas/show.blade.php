@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-sm border border-slate-200 p-6">
    <div class="mb-6 flex justify-between items-center">
        <a href="{{ route('mahasiswas.index') }}" class="text-xs text-indigo-600 hover:underline flex items-center gap-1">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
        <a href="{{ route('mahasiswas.edit', $mahasiswa->id) }}" class="text-xs bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1.5 rounded-lg hover:bg-amber-100 flex items-center gap-1">
            <i class="fa-solid fa-pen-to-square"></i> Edit
        </a>
    </div>

    <div class="border-b border-slate-100 pb-4 mb-4">
        <span class="text-xs font-semibold px-2.5 py-0.5 rounded bg-sky-100 text-sky-800">Data Mahasiswa</span>
        <h1 class="text-2xl font-bold text-slate-800 mt-2">{{ $mahasiswa->nama }}</h1>
        <p class="text-sm font-mono text-slate-500">NIM: {{ $mahasiswa->nim }}</p>
    </div>

    <div class="space-y-3 text-sm">
        <div>
            <span class="text-slate-400 block text-xs">Program Studi</span>
            <span class="text-slate-700 font-medium">{{ $mahasiswa->prodi }}</span>
        </div>
        <div>
            <span class="text-slate-400 block text-xs">Nomor WhatsApp</span>
            <span class="text-slate-700 font-medium">{{ $mahasiswa->kontak_wa }}</span>
        </div>
    </div>
</div>
@endsection