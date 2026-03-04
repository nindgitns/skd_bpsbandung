<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survei Kebutuhan Data</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ asset('images/logo-bps.png') }}">
</head>

<body class="h-full bg-gradient-to-br from-blue-50 via-white to-indigo-100 font-sans text-gray-800">

<!-- HEADER -->
<header class="sticky top-0 z-40 backdrop-blur-lg bg-white/80 border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 h-16 flex justify-between items-center">

        <!-- Logo + Title -->
        <div class="flex items-center gap-4">
            <img src="{{ asset('images/logo-bps.png') }}" 
                 alt="Logo BPS"
                 class="h-10 w-auto object-contain">

            <div class="leading-tight">
                <div class="font-semibold text-gray-800 text-base">
                    Survei Kebutuhan Data
                </div>
                <div class="text-xs text-gray-500">
                    BPS Kabupaten Bandung
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="flex items-center gap-4">
            <a href="{{ route('login') }}"
               class="px-5 py-2 rounded-xl bg-blue-500 text-white font-medium shadow-md hover:bg-blue-600 hover:shadow-lg transition-all duration-300">
                Login
            </a>
        </div>

    </div>
</header>


<!-- FLASH MODAL -->
@if(session('success') || $errors->any())
<div id="flashModal"
     class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center opacity-0 pointer-events-none transition-all duration-300 z-50">

    <div id="modalContent"
         class="bg-white rounded-3xl p-8 max-w-md w-full text-center shadow-2xl
                transform scale-95 transition-all duration-300">

        <!-- ICON -->
        <div class="w-20 h-20 mx-auto mb-6 rounded-full flex items-center justify-center
            {{ session('success') ? 'bg-emerald-100' : 'bg-red-100' }}">

            @if(session('success'))
                <!-- SUCCESS ICON -->
                <svg class="w-10 h-10 text-emerald-600"
                     fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M5 13l4 4L19 7" />
                </svg>
            @else
                <!-- ERROR ICON -->
                <svg class="w-10 h-10 text-red-600"
                     fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            @endif
        </div>

        <!-- TITLE -->
        <h3 class="text-2xl font-bold text-gray-800 mb-2">
            {{ session('success') ? 'Berhasil!' : 'Terjadi Kesalahan!' }}
        </h3>

        <!-- MESSAGE -->
        <p class="text-gray-600 mb-8 leading-relaxed">
            {{ session('success') ?? $errors->first() }}
        </p>

        <!-- BUTTON -->
        <button id="closeModal"
            class="px-6 py-3 rounded-2xl font-semibold text-white
                   {{ session('success') 
                        ? 'bg-emerald-500 hover:bg-emerald-600' 
                        : 'bg-red-500 hover:bg-red-600' }}
                   shadow-md hover:shadow-lg transition-all duration-300">
            Tutup
        </button>

    </div>
</div>
@endif


<!-- MAIN -->
<main class="relative flex flex-col md:flex-row items-center justify-center min-h-[90vh] max-w-7xl mx-auto px-6 gap-16">

    <!-- LEFT CONTENT -->
    <div class="md:w-1/2 text-center md:text-left space-y-6">

        <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
            Sistem Informasi  
            <span class="text-blue-600">Survei Kebutuhan Data</span>
        </h1>

        <p class="text-lg text-gray-600 leading-relaxed max-w-xl mx-auto md:mx-0">
            BPS Kabupaten Bandung kini menyediakan pengisian kuesioner secara online.
            Lebih cepat, lebih praktis, dan dapat diakses kapan saja tanpa menggunakan kertas.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">

            <a href="{{ route('blok1') }}"
               class="px-8 py-3 rounded-2xl bg-indigo-500 text-white font-semibold shadow-lg hover:bg-indigo-600 hover:shadow-xl transition-all duration-300 active:scale-[0.98]">
                Isi Kuesioner
            </a>

            <a href="{{ route('login') }}"
               class="px-8 py-3 rounded-2xl border border-gray-300 text-gray-700 font-medium hover:bg-gray-100 transition">
                Login Admin
            </a>

        </div>
    </div>


    <!-- RIGHT IMAGE -->
    <div class="md:w-1/2 hidden md:flex justify-center">
        <div class="relative">
            <div class="absolute -top-6 -left-6 w-40 h-40 bg-blue-200 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute -bottom-6 -right-6 w-40 h-40 bg-indigo-200 rounded-full blur-3xl opacity-50"></div>

            <div class="relative bg-white/70 backdrop-blur-lg p-8 rounded-3xl shadow-xl border border-gray-100">
                <img src="{{ asset('images/logo-bps.png') }}"
                     alt="Logo BPS"
                     class="w-72">
            </div>
        </div>
    </div>

</main>


<!-- FOOTER -->
<footer class="text-center text-sm text-gray-500 py-6 border-t border-gray-200 bg-white/60 backdrop-blur">
    © {{ date('Y') }} BPS Kabupaten Bandung. All rights reserved.
</footer>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const modal = document.getElementById('flashModal');
    const content = document.getElementById('modalContent');
    const closeBtn = document.getElementById('closeModal');

    if (!modal) return;

    // SHOW MODAL (fade + scale)
    setTimeout(() => {
        modal.classList.remove('opacity-0', 'pointer-events-none');
        content.classList.remove('scale-95');
    }, 100);

    function closeModal() {
        modal.classList.add('opacity-0');
        content.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('pointer-events-none');
        }, 300);
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }

    // Klik luar modal untuk close
    modal.addEventListener('click', function(e){
        if (e.target === modal) {
            closeModal();
        }
    });

    // Auto close 4 detik
    setTimeout(closeModal, 4000);

});
</script>

</body>
</html>