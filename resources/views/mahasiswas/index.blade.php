@extends('layouts.app')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Daftar Mahasiswa</h1>
            <p class="text-sm text-slate-500">Kelola data mahasiswa peminjam ruangan</p>
        </div>
        <a href="{{ route('mahasiswas.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium text-sm flex items-center gap-2 shadow-sm transition">
            <i class="fa-solid fa-plus"></i> Tambah Mahasiswa
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-600 uppercase">
                    <th class="py-3 px-4">No</th>
                    <th class="py-3 px-4">NIM</th>
                    <th class="py-3 px-4">Nama Lengkap</th>
                    <th class="py-3 px-4">Program Studi</th>
                    <th class="py-3 px-4">Kontak WhatsApp</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse($mahasiswas as $index => $mhs)
                <tr class="hover:bg-slate-50/70 transition">
                    <td class="py-3 px-4 text-slate-500">{{ $index + 1 }}</td>
                    <td class="py-3 px-4 font-mono font-medium text-slate-700">{{ $mhs->nim }}</td>
                    <td class="py-3 px-4 font-semibold text-slate-800">{{ $mhs->nama }}</td>
                    <td class="py-3 px-4 text-slate-600">{{ $mhs->prodi }}</td>
                    <td class="py-3 px-4 text-slate-600">{{ $mhs->kontak_wa }}</td>
                    <td class="py-3 px-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('mahasiswas.show', $mhs->id) }}" class="p-2 text-sky-600 hover:bg-sky-50 rounded-lg" title="Detail">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('mahasiswas.edit', $mhs->id) }}" class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg" title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('mahasiswas.destroy', $mhs->id) }}" method="POST" onsubmit="return confirm('Hapus mahasiswa ini?');">
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
                    <td colspan="6" class="text-center py-8 text-slate-400">Belum ada data mahasiswa.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection