<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survei Kebutuhan Data</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans bg-gray-50">

<header class="bg-blue-500 text-white shadow-md rounded-b-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
        <div class="font-bold text-lg tracking-wide">Survei Kebutuhan Data</div>
        <nav class="flex items-center gap-4">
            <a href="{{ route('login') }}" 
               class="bg-white text-blue-500 px-4 py-2 rounded-lg shadow hover:bg-gray-100 transition">
                Login
            </a>
        </nav>
    </div>
</header>

<!-- Modal -->
<div id="flashModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
  <div class="bg-white rounded-2xl p-8 max-w-md w-full text-center shadow-lg">
    <h3 class="text-2xl font-bold text-green-600 mb-2">Sukses!</h3>
    <p class="text-gray-700 mb-4">{{ session('success') }}</p>
    <button id="closeModal" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-xl font-semibold transition">
      Tutup
    </button>
  </div>
</div>

<main class="flex flex-col md:flex-row items-center justify-center min-h-screen max-w-7xl mx-auto px-6 gap-12">
    <!-- Kiri: Text -->
    <div class="md:w-1/2 text-center md:text-left">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-snug">
            Selamat Datang
        </h1>
        <p class="text-gray-700 text-lg mb-6 leading-relaxed">
            Sistem Informasi <strong class="font-semibold">Survei Kebutuhan Data</strong> BPS Kabupaten Bandung<br>
            Kuesioner kini bisa diisi dari mana saja, kapan saja, secara online, tanpa perlu kertas
        </p>
        <a href="{{ route('blok1') }}"
           class="inline-block bg-indigo-500 text-white px-6 py-3 rounded-2xl font-semibold shadow-md hover:bg-indigo-400 hover:shadow-lg transition-all">
            Isi Kuesioner Sekarang!
        </a>
    </div>

    <!-- Kanan: Ilustrasi (hanya tampil di md ke atas) -->
    <div class="md:w-1/2 flex justify-center hidden md:flex">
        <div class="rounded-3xl overflow-hidden">
            <img src="{{ asset('images/logo-bps.png') }}" 
                 alt="Ilustrasi" 
                 class="w-full max-w-md">
        </div>
    </div>
</main>

</body>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('flashModal');
    const closeBtn = document.getElementById('closeModal');

    // tampilkan modal jika ada pesan sukses
    @if(session('success'))
        modal.classList.remove('hidden');
    @endif

    closeBtn.addEventListener('click', function() {
        modal.classList.add('hidden');
    });
});
</script>
</html>