@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm border border-slate-200 p-6">
    <div class="mb-6">
        <a href="{{ route('dosens.index') }}" class="text-xs text-indigo-600 hover:underline flex items-center gap-1 mb-2">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Dosen
        </a>
        <h1 class="text-xl font-bold text-slate-800">Edit Data Dosen</h1>
    </div>

    <form action="{{ route('dosens.update', $dosen->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">NIP</label>
            <input type="text" name="nip" value="{{ old('nip', $dosen->nip) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            @error('nip') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ old('nama', $dosen->nama) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            @error('nama') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Email Kampus</label>
            <input type="email" name="email" value="{{ old('email', $dosen->email) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            @error('email') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Departemen / Prodi</label>
            <input type="text" name="departemen" value="{{ old('departemen', $dosen->departemen) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            @error('departemen') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="pt-4 flex justify-end gap-2">
            <a href="{{ route('dosens.index') }}" class="px-4 py-2 border border-slate-300 text-slate-600 rounded-lg text-sm hover:bg-slate-50 transition">Batal</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium transition">Update Perubahan</button>
        </div>
    </form>
</div>
@endsection