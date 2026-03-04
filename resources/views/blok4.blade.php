<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Blok IV - Catatan</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans bg-gray-50">

<div class="min-h-screen flex items-center justify-center px-4 md:px-8 py-10">
  <div class="w-full max-w-5xl bg-white rounded-3xl shadow-xl overflow-hidden">
    
    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-500 to-green-500 text-white text-center py-6 px-6">
      <h2 class="text-3xl font-bold mb-1">Blok IV - Catatan</h2>
      <p class="text-white/80">Tuliskan kritik dan saran terhadap produk dan layanan data/informasi statistik yang disediakan oleh BPS</p>
    </div>

    <!-- Form Body -->
    <div class="p-8 space-y-6">
      <form method="POST" action="{{ route('blok4.submit') }}" class="space-y-6">
        @csrf
        <!-- Kritik dan Saran -->
        <div>
          <label class="block text-gray-700 font-medium mb-2">Kritik dan Saran</label>
          <textarea name="kritik_saran" rows="5" placeholder="Masukkan kritik dan saran anda" 
            class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition" required></textarea>
        </div>

        <!-- Tombol Kirim -->
        <button type="submit" 
          class="w-full bg-green-500 hover:bg-green-600 text-white font-bold rounded-xl py-3 transition-all">
          Kirim
        </button>

      </form>
    </div>
  </div>
</div>

</body>
</html>