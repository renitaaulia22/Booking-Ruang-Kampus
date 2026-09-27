@extends('layouts.app')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Daftar Mata Kuliah</h1>
            <p class="text-sm text-slate-500">Kelola data mata kuliah untuk pemakaian ruang lab/kelas</p>
        </div>
        <a href="{{ route('matakuliahs.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium text-sm flex items-center gap-2 shadow-sm transition">
            <i class="fa-solid fa-plus"></i> Tambah Mata Kuliah
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-600 uppercase">
                    <th class="py-3 px-4">No</th>
                    <th class="py-3 px-4">Kode Matkul</th>
                    <th class="py-3 px-4">Nama Mata Kuliah</th>
                    <th class="py-3 px-4">SKS</th>
                    <th class="py-3 px-4">Semester</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse($matakuliahs as $index => $mk)
                <tr class="hover:bg-slate-50/70 transition">
                    <td class="py-3 px-4 text-slate-500">{{ $index + 1 }}</td>
                    <td class="py-3 px-4 font-mono font-medium text-slate-700">{{ $mk->kode_matkul }}</td>
                    <td class="py-3 px-4 font-semibold text-slate-800">{{ $mk->nama_matkul }}</td>
                    <td class="py-3 px-4 text-slate-600">{{ $mk->sks }} SKS</td>
                    <td class="py-3 px-4 text-slate-600">Semester {{ $mk->semester }}</td>
                    <td class="py-3 px-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('matakuliahs.show', $mk->id) }}" class="p-2 text-sky-600 hover:bg-sky-50 rounded-lg" title="Detail">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('matakuliahs.edit', $mk->id) }}" class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg" title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('matakuliahs.destroy', $mk->id) }}" method="POST" onsubmit="return confirm('Hapus mata kuliah ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-rose-600 hover:bg-rose-50 rounded-lg" title="Hapus">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-8 text-slate-400">Belum ada data mata kuliah.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection