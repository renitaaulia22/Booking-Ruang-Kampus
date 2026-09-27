@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
    <div class="mb-6">
        <a href="{{ route('peminjaman-ruangs.index') }}" class="text-xs text-indigo-600 hover:underline flex items-center gap-1 mb-2">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Booking
        </a>
        <h1 class="text-xl font-bold text-slate-800">Edit Data Booking Ruangan</h1>
    </div>

    <form action="{{ route('peminjaman-ruangs.update', $peminjaman_ruang->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Nama Ruangan / Lab</label>
            <input type="text" name="nama_ruangan" value="{{ old('nama_ruangan', $peminjaman_ruang->nama_ruangan) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
            @error('nama_ruangan') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Mahasiswa Peminjam</label>
                <select name="mahasiswa_id" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
                    @foreach($mahasiswas as $mhs)
                        <option value="{{ $mhs->id }}" {{ old('mahasiswa_id', $peminjaman_ruang->mahasiswa_id) == $mhs->id ? 'selected' : '' }}>
                            {{ $mhs->nama }} ({{ $mhs->nim }})
                        </option>
                    @endforeach
                </select>
                @error('mahasiswa_id') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Dosen Penanggung Jawab</label>
                <select name="dosen_id" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
                    @foreach($dosens as $dsn)
                        <option value="{{ $dsn->id }}" {{ old('dosen_id', $peminjaman_ruang->dosen_id) == $dsn->id ? 'selected' : '' }}>
                            {{ $dsn->nama }}
                        </option>
                    @endforeach
                </select>
                @error('dosen_id') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Mata Kuliah Terkait</label>
                <select name="matakuliah_id" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
                    @foreach($matakuliahs as $mk)
                        <option value="{{ $mk->id }}" {{ old('matakuliah_id', $peminjaman_ruang->matakuliah_id) == $mk->id ? 'selected' : '' }}>
                            {{ $mk->kode_matkul }} - {{ $mk->nama_matkul }}
                        </option>
                    @endforeach
                </select>
                @error('matakuliah_id') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Tanggal Pemakaian</label>
                <input type="date" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', $peminjaman_ruang->tanggal_pinjam) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
                @error('tanggal_pinjam') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Jam Mulai</label>
                <input type="time" name="jam_mulai" value="{{ old('jam_mulai', substr($peminjaman_ruang->jam_mulai, 0, 5)) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
                @error('jam_mulai') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Jam Selesai</label>
                <input type="time" name="jam_selesai" value="{{ old('jam_selesai', substr($peminjaman_ruang->jam_selesai, 0, 5)) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
                @error('jam_selesai') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Update Status Peminjaman</label>
            <select name="status" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 font-semibold">
                <option value="Menunggu" {{ old('status', $peminjaman_ruang->status) == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="Disetujui" {{ old('status', $peminjaman_ruang->status) == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                <option value="Selesai" {{ old('status', $peminjaman_ruang->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="Dibatalkan" {{ old('status', $peminjaman_ruang->status) == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Tujuan / Agenda Kegiatan</label>
            <textarea name="tujuan_kegiatan" rows="3" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>{{ old('tujuan_kegiatan', $peminjaman_ruang->tujuan_kegiatan) }}</textarea>
            @error('tujuan_kegiatan') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="pt-4 flex justify-end gap-2">
            <a href="{{ route('peminjaman-ruangs.index') }}" class="px-4 py-2 border border-slate-300 text-slate-600 rounded-lg text-sm">Batal</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium">Update Perubahan</button>
        </div>
    </form>
</div>
@endsection