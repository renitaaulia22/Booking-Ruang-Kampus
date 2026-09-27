@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-sm border border-slate-200 p-6">
    <div class="mb-6 flex justify-between items-center">
        <a href="{{ route('dosens.index') }}" class="text-xs text-indigo-600 hover:underline flex items-center gap-1">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
        <a href="{{ route('dosens.edit', $dosen->id) }}" class="text-xs bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1.5 rounded-lg hover:bg-amber-100 flex items-center gap-1">
            <i class="fa-solid fa-pen-to-square"></i> Edit Data
        </a>
    </div>

    <div class="border-b border-slate-100 pb-4 mb-4">
        <span class="text-xs font-semibold px-2.5 py-0.5 rounded bg-indigo-100 text-indigo-800">Data Dosen</span>
        <h1 class="text-2xl font-bold text-slate-800 mt-2">{{ $dosen->nama }}</h1>
        <p class="text-sm font-mono text-slate-500">NIP: {{ $dosen->nip }}</p>
    </div>

    <div class="space-y-3 text-sm">
        <div>
            <span class="text-slate-400 block text-xs">Email Kampus</span>
            <span class="text-slate-700 font-medium">{{ $dosen->email }}</span>
        </div>
        <div>
            <span class="text-slate-400 block text-xs">Departemen / Prodi</span>
            <span class="text-slate-700 font-medium">{{ $dosen->departemen }}</span>
        </div>
        <div>
            <span class="text-slate-400 block text-xs">Terdaftar Sejak</span>
            <span class="text-slate-700 font-medium">{{ $dosen->created_at->format('d M Y, H:i') }} WITA</span>
        </div>
    </div>
</div>
@endsection