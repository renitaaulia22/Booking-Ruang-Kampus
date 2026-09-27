@extends('layouts.app')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Daftar Dosen</h1>
            <p class="text-sm text-slate-500">Kelola data dosen penanggung jawab ruangan</p>
        </div>
        <a href="{{ route('dosens.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium text-sm flex items-center gap-2 shadow-sm transition">
            <i class="fa-solid fa-plus"></i> Tambah Dosen
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase font-semibold text-slate-600">
                    <th class="py-3 px-4">No</th>
                    <th class="py-3 px-4">NIP</th>
                    <th class="py-3 px-4">Nama Lengkap</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Departemen</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse($dosens as $index => $dosen)
                <tr class="hover:bg-slate-50/70 transition">
                    <td class="py-3 px-4 text-slate-500">{{ $index + 1 }}</td>
                    <td class="py-3 px-4 font-mono font-medium text-slate-700">{{ $dosen->nip }}</td>
                    <td class="py-3 px-4 font-semibold text-slate-800">{{ $dosen->nama }}</td>
                    <td class="py-3 px-4 text-slate-600">{{ $dosen->email }}</td>
                    <td class="py-3 px-4 text-slate-600">{{ $dosen->departemen }}</td>
                    <td class="py-3 px-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <!-- READ -->
                            <a href="{{ route('dosens.show', $dosen->id) }}" class="p-2 text-sky-600 hover:bg-sky-50 rounded-lg" title="Detail">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <!-- EDIT -->
                            <a href="{{ route('dosens.edit', $dosen->id) }}" class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg" title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <!-- DELETE -->
                            <form action="{{ route('dosens.destroy', $dosen->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus dosen ini?');">
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
                    <td colspan="6" class="text-center py-8 text-slate-400">
                        <i class="fa-regular fa-folder-open text-3xl mb-2 block"></i>
                        Belum ada data dosen. Klik tombol "Tambah Dosen" di atas.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection