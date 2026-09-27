<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistem Booking Ruang Kampus' }}</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 text-slate-800 font-sans min-h-screen flex flex-col">

    <!-- Navbar -->
    <header class="bg-indigo-700 text-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <a href="/" class="flex items-center gap-3 text-lg font-bold tracking-wide">
                <i class="fa-solid fa-building-columns text-yellow-300 text-xl"></i>
                <span>RoomBooking<span class="text-indigo-200">Campus</span></span>
            </a>
            <nav class="flex gap-2 text-sm font-medium">
                <a href="{{ route('dosens.index') }}" class="px-3 py-2 rounded-lg hover:bg-indigo-600 transition">Dosen</a>
                <a href="{{ route('mahasiswas.index') }}" class="px-3 py-2 rounded-lg hover:bg-indigo-600 transition">Mahasiswa</a>
                <a href="{{ route('matakuliahs.index') }}" class="px-3 py-2 rounded-lg hover:bg-indigo-600 transition">Mata Kuliah</a>
                <a href="{{ route('peminjaman-ruangs.index') }}" class="px-3 py-2 rounded-lg bg-indigo-900 hover:bg-indigo-950 text-white font-semibold transition">Peminjaman Ruang</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Flash Alert Sukses -->
        @if(session('success'))
            <div class="mb-6 p-4 rounded-lg bg-emerald-100 border-l-4 border-emerald-500 text-emerald-800 flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-emerald-600 text-lg"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900 font-bold">&times;</button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 py-4 text-center text-xs text-slate-500">
        &copy; {{ date('Y') }} Sistem Booking Ruang Kampus &bull; Tugas Framework Pemrograman
    </footer>

</body>
</html>