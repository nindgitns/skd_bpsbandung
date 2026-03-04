<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survei Kebutuhan Data</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ asset('images/logo-bps.png') }}">
</head>

<body class="h-full bg-gradient-to-br from-indigo-100 via-white to-purple-100 font-sans">

@if ($errors->any())
<div id="errorToast"
     class="fixed top-5 right-5 z-50 bg-white border-l-4 border-red-500 shadow-xl rounded-xl px-6 py-4 w-80 transform translate-x-full opacity-0 transition-all duration-500">

    <div class="flex items-start justify-between">
        <div>
            <h4 class="font-semibold text-red-600">Login Gagal</h4>
            <p class="text-sm text-gray-600 mt-1">
                {{ $errors->first() }}
            </p>
        </div>

        <button onclick="closeToast()" class="text-gray-400 hover:text-gray-600 text-lg leading-none">
            &times;
        </button>
    </div>
</div>
@endif

<div class="flex min-h-full items-center justify-center px-6 py-12">

    <!-- Card -->
    <div class="w-full max-w-md">

        <div class="bg-white/80 backdrop-blur-lg shadow-xl rounded-3xl p-8 border border-gray-100">

            <!-- Title -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 tracking-tight">
                    Welcome Back 👋
                </h2>
                <p class="text-gray-500 text-sm mt-2">
                    Please sign in to your account
                </p>
            </div>

            <!-- Form -->
            <form action="{{ route('login.process') }}" method="POST" class="space-y-6">
              @csrf
                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email Address
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            ✉️
                        </span>
                        <input type="email" name="email" required
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 outline-none transition-all duration-200 bg-white text-gray-700 placeholder-gray-400"
                            placeholder="you@example.com">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            🔒
                        </span>
                        <input type="password" name="password" required
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 outline-none transition-all duration-200 bg-white text-gray-700 placeholder-gray-400"
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full py-3 rounded-xl bg-indigo-500 hover:bg-indigo-600 text-white font-semibold shadow-md hover:shadow-lg transition-all duration-300 active:scale-[0.98]">
                    Sign In
                </button>

            </form>

        </div>

        <!-- Footer -->
        <p class="text-center text-sm text-gray-500 mt-6">
            © 2026 BPS Kabupaten Bandung. All rights reserved.
        </p>

    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const toast = document.getElementById("errorToast");
    if (toast) {
        // Slide in
        setTimeout(() => {
            toast.classList.remove("translate-x-full", "opacity-0");
        }, 100);

        // Auto close after 4 seconds
        setTimeout(() => {
            closeToast();
        }, 4000);
    }
});

function closeToast() {
    const toast = document.getElementById("errorToast");
    if (toast) {
        toast.classList.add("translate-x-full", "opacity-0");
    }
}
</script>

</body>
</html>