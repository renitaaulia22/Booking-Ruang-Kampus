@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm border border-slate-200 p-6">
    <div class="mb-6">
        <a href="{{ route('matakuliahs.index') }}" class="text-xs text-indigo-600 hover:underline flex items-center gap-1 mb-2">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
        <h1 class="text-xl font-bold text-slate-800">Edit Mata Kuliah</h1>
    </div>

    <form action="{{ route('matakuliahs.update', $matakuliah->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Kode Mata Kuliah</label>
            <input type="text" name="kode_matkul" value="{{ old('kode_matkul', $matakuliah->kode_matkul) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
            @error('kode_matkul') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Nama Mata Kuliah</label>
            <input type="text" name="nama_matkul" value="{{ old('nama_matkul', $matakuliah->nama_matkul) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
            @error('nama_matkul') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Jumlah SKS</label>
                <input type="number" name="sks" value="{{ old('sks', $matakuliah->sks) }}" min="1" max="6" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
                @error('sks') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Semester</label>
                <input type="number" name="semester" value="{{ old('semester', $matakuliah->semester) }}" min="1" max="8" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
                @error('semester') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="pt-4 flex justify-end gap-2">
            <a href="{{ route('matakuliahs.index') }}" class="px-4 py-2 border border-slate-300 text-slate-600 rounded-lg text-sm">Batal</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium">Update Perubahan</button>
        </div>
    </form>
</div>
@endsection