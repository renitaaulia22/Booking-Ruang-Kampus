@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm border border-slate-200 p-6">
    <div class="mb-6">
        <a href="{{ route('mahasiswas.index') }}" class="text-xs text-indigo-600 hover:underline flex items-center gap-1 mb-2">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
        <h1 class="text-xl font-bold text-slate-800">Tambah Mahasiswa Baru</h1>
    </div>

    <form action="{{ route('mahasiswas.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">NIM</label>
            <input type="text" name="nim" value="{{ old('nim') }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
            @error('nim') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
            @error('nama') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Program Studi</label>
            <input type="text" name="prodi" value="{{ old('prodi') }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" placeholder="Pendidikan Komputer" required>
            @error('prodi') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Kontak WhatsApp</label>
            <input type="text" name="kontak_wa" value="{{ old('kontak_wa') }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" placeholder="08xxxxxxxxxx" required>
            @error('kontak_wa') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="pt-4 flex justify-end gap-2">
            <a href="{{ route('mahasiswas.index') }}" class="px-4 py-2 border border-slate-300 text-slate-600 rounded-lg text-sm">Batal</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium">Simpan Data</button>
        </div>
    </form>
</div>
@endsection