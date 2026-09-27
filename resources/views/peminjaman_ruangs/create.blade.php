@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
    <div class="mb-6">
        <a href="{{ route('peminjaman-ruangs.index') }}" class="text-xs text-indigo-600 hover:underline flex items-center gap-1 mb-2">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Booking
        </a>
        <h1 class="text-xl font-bold text-slate-800">Form Pengajuan Booking Ruangan</h1>
    </div>

    <form action="{{ route('peminjaman-ruangs.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Nama Ruangan / Lab</label>
            <input type="text" name="nama_ruangan" value="{{ old('nama_ruangan') }}" placeholder="Contoh: Lab Komputer 1 / Ruang Microteaching" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
            @error('nama_ruangan') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Mahasiswa Peminjam</label>
                <select name="mahasiswa_id" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
                    <option value="">-- Pilih Mahasiswa --</option>
                    @foreach($mahasiswas as $mhs)
                        <option value="{{ $mhs->id }}" {{ old('mahasiswa_id') == $mhs->id ? 'selected' : '' }}>
                            {{ $mhs->nama }} ({{ $mhs->nim }})
                        </option>
                    @endforeach
                </select>
                @error('mahasiswa_id') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Dosen Penanggung Jawab</label>
                <select name="dosen_id" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
                    <option value="">-- Pilih Dosen PJ --</option>
                    @foreach($dosens as $dsn)
                        <option value="{{ $dsn->id }}" {{ old('dosen_id') == $dsn->id ? 'selected' : '' }}>
                            {{ $dsn->nama }}
                        </option>
                    @endforeach
                </select>
                @error('dosen_id') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Keperluan Mata Kuliah</label>
                <select name="matakuliah_id" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
                    <option value="">-- Pilih Mata Kuliah --</option>
                    @foreach($matakuliahs as $mk)
                        <option value="{{ $mk->id }}" {{ old('matakuliah_id') == $mk->id ? 'selected' : '' }}>
                            {{ $mk->kode_matkul }} - {{ $mk->nama_matkul }}
                        </option>
                    @endforeach
                </select>
                @error('matakuliah_id') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Tanggal Pemakaian</label>
                <input type="date" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', date('Y-m-d')) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
                @error('tanggal_pinjam') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Jam Mulai</label>
                <input type="time" name="jam_mulai" value="{{ old('jam_mulai', '08:00') }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
                @error('jam_mulai') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Jam Selesai</label>
                <input type="time" name="jam_selesai" value="{{ old('jam_selesai', '10:00') }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" required>
                @error('jam_selesai') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Status Booking Awal</label>
            <select name="status" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500">
                <option value="Menunggu">Menunggu</option>
                <option value="Disetujui">Disetujui</option>
                <option value="Selesai">Selesai</option>
                <option value="Dibatalkan">Dibatalkan</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Tujuan / Agenda Kegiatan</label>
            <textarea name="tujuan_kegiatan" rows="3" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" placeholder="Jelaskan kebutuhan pemakaian ruang (misal: Ujian Praktikum Modul 2)" required>{{ old('tujuan_kegiatan') }}</textarea>
            @error('tujuan_kegiatan') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="pt-4 flex justify-end gap-2">
            <a href="{{ route('peminjaman-ruangs.index') }}" class="px-4 py-2 border border-slate-300 text-slate-600 rounded-lg text-sm">Batal</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium">Ajukan Peminjaman</button>
        </div>
    </form>
</div>
@endsection