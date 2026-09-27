@extends('layouts.app')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Daftar Peminjaman Ruangan Kampus</h1>
            <p class="text-sm text-slate-500">Monitoring pemakaian ruang lab, kelas, dan aula perkuliahan</p>
        </div>
        <a href="{{ route('peminjaman-ruangs.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium text-sm flex items-center gap-2 shadow-sm transition">
            <i class="fa-solid fa-calendar-plus"></i> Booking Ruangan
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-600 uppercase">
                    <th class="py-3 px-4">No</th>
                    <th class="py-3 px-4">Ruangan</th>
                    <th class="py-3 px-4">Peminjam (Mhs)</th>
                    <th class="py-3 px-4">Dosen PJ</th>
                    <th class="py-3 px-4">Mata Kuliah</th>
                    <th class="py-3 px-4">Jadwal Pinjam</th>
                    <th class="py-3 px-4 text-center">Status</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse($peminjamans as $index => $item)
                <tr class="hover:bg-slate-50/70 transition">
                    <td class="py-3 px-4 text-slate-500">{{ $index + 1 }}</td>
                    <td class="py-3 px-4 font-semibold text-indigo-900">{{ $item->nama_ruangan }}</td>
                    <td class="py-3 px-4">
                        <div class="font-medium text-slate-800">{{ $item->mahasiswa->nama }}</div>
                        <div class="text-xs text-slate-400 font-mono">{{ $item->mahasiswa->nim }}</div>
                    </td>
                    <td class="py-3 px-4 text-slate-700">{{ $item->dosen->nama }}</td>
                    <td class="py-3 px-4 text-slate-600">{{ $item->matakuliah->nama_matkul }}</td>
                    <td class="py-3 px-4 text-slate-600 text-xs">
                        <div class="font-semibold text-slate-700">{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->translatedFormat('d M Y') }}</div>
                        <div>{{ substr($item->jam_mulai, 0, 5) }} - {{ substr($item->jam_selesai, 0, 5) }} WITA</div>
                    </td>
                    <td class="py-3 px-4 text-center">
                        @if($item->status == 'Disetujui')
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-800">Disetujui</span>
                        @elseif($item->status == 'Menunggu')
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-amber-100 text-amber-800">Menunggu</span>
                        @elseif($item->status == 'Selesai')
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-slate-100 text-slate-700">Selesai</span>
                        @else
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-rose-100 text-rose-800">Dibatalkan</span>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('peminjaman-ruangs.show', $item->id) }}" class="p-2 text-sky-600 hover:bg-sky-50 rounded-lg" title="Detail">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('peminjaman-ruangs.edit', $item->id) }}" class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg" title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('peminjaman-ruangs.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus peminjaman ini?');">
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
                    <td colspan="8" class="text-center py-8 text-slate-400">
                        <i class="fa-regular fa-calendar-xmark text-3xl mb-2 block"></i>
                        Belum ada riwayat booking ruangan. Klik "Booking Ruangan" di atas.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection