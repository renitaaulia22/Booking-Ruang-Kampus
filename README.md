# Sistem Booking Ruang Kampus (FKIP)

Aplikasi web manajemen peminjaman ruang perkuliahan dan laboratorium komputer berbasis Laravel, SQLite, dan Tailwind CSS.

## Anggota Kelompok

1. [RENITA AULIYAA WIDYA NINGRUM] - [ 2405176010]
2. [WEDELIA EGY AZZAHRA] - [2405176036]
3. [LAILA NUR FARISA] - [2405176036]

## Entitas & Skema Database (4 Tabel)

1. **Dosen**: Data penanggung jawab ruangan / dosen pengampu.
2. **Mahasiswa**: Data peminjam ruangan.
3. **Mata Kuliah**: Data mata kuliah / praktikum terkait pemakaian ruangan.
4. **Peminjaman Ruang**: Tabel transaksi relasi yang menghubungkan Dosen, Mahasiswa, dan Mata Kuliah beserta status peminjaman.

## Fitur BREAD

Setiap tabel telah dilengkapi fitur BREAD penuh:

- **Browse**: Menampilkan seluruh data dalam bentuk tabel responsif (Tailwind CSS).
- **Read**: Menampilkan rincian detail data.
- **Edit**: Memperbarui informasi data yang ada.
- **Add**: Menambahkan entitas baru dengan validasi form.
- **Delete**: Menghapus data dengan konfirmasi keamanan.

## Panduan Menjalankan Project

```bash
git clone [https://github.com/](https://github.com/)[username]/booking-ruang-kampus.git
cd booking-ruang-kampus
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
