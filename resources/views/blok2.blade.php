<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">
<head>
  <meta charset="UTF-8">
  <title>Survei Kebutuhan Data</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="icon" type="image/png" href="{{ asset('images/logo-bps.png') }}">
</head>
<body class="h-full font-sans bg-gray-50">

<div class="min-h-screen flex items-center justify-center px-4 md:px-8 py-12">
  <div class="w-full max-w-5xl bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">

      <!-- Header -->
      <div class="bg-gradient-to-r from-blue-500/90 to-green-400/90 text-white text-center py-8 px-8">
        <h2 class="text-3xl font-bold mb-2 tracking-tight">Blok II</h2>
          <p class="text-white/90 text-sm">Kepuasan terhadap Pelayanan Data dan Informasi Statistik BPS</p>
      </div>

    <!-- Form Body -->
    <div class="p-8 space-y-6">
      <form method="POST" action="{{ route('blok2.submit') }}" class="space-y-8">
        @csrf

        @php
          $pertanyaan = [
            1 => 'Informasi pelayanan pada unit layanan ini tersedia melalui media elektronik maupun non elektronik.',
            2 => 'Persyaratan pelayanan yang ditetapkan mudah dipenuhi/disiapkan oleh konsumen.',
            3 => 'Prosedur/alur pelayanan yang ditetapkan mudah diikuti/dilakukan.',
            4 => 'Jangka waktu penyelesaian pelayanan yang diterima sesuai dengan yang ditetapkan.',
            5 => 'Biaya pelayanan yang dibayarkan sesuai dengan biaya yang ditetapkan.',
            6 => 'Produk pelayanan yang diterima sesuai dengan yang dijanjikan.',
            7 => 'Sarana dan prasarana pendukung pelayanan memberikan kenyamanan.',
            8 => 'Data BPS mudah diakses melalui sarana utama yang digunakan.',
            9 => 'Petugas pelayanan dan/atau aplikasi pelayanan online merespon dengan baik.',
            10 => 'Petugas pelayanan dan/atau aplikasi pelayanan online mampu memberikan informasi yang jelas.',
            11 => 'Fasilitas pengaduan PST mudah diakses.',
            12 => 'Tidak ada diskriminasi dalam pelayanan.',
            13 => 'Tidak ada pelayanan di luar prosedur/kecurangan pelayanan.',
            14 => 'Tidak ada penerimaan gratifikasi.',
            15 => 'Tidak ada pungutan liar (pungli) dalam pelayanan.',
            16 => 'Tidak ada praktik percaloan dalam pelayanan',
          ];
        @endphp

        @foreach($pertanyaan as $no => $text)
        <div class="space-y-3">
          <label class="block text-gray-700 font-medium">{{ $no }}. {{ $text }}</label>

          <!-- Skala 1-10 -->
          <div class="flex flex-wrap justify-between gap-2">
            @for($i = 1; $i <= 10; $i++)
            <label class="flex flex-col items-center w-10">
              <input type="radio" name="q{{ $no }}" value="{{ $i }}" class="peer sr-only" required>
              <span class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-300 peer-checked:bg-green-400 peer-checked:text-white transition">
                {{ $i }}
              </span>
            </label>
            @endfor
          </div>

          <!-- Keterangan skala -->
          <div class="flex justify-between text-gray-500 text-sm">
            <span>1 = Sangat Tidak Puas</span>
            <span>10 = Sangat Puas</span>
          </div>
        </div>
        @endforeach

        <!-- Tombol Submit -->
        <button type="submit"
          class="w-full py-3 rounded-2xl bg-gradient-to-r from-blue-500 to-green-400
          text-white font-semibold shadow-md hover:shadow-lg hover:scale-[1.01]
          transition-all duration-300">
          Selanjutnya →
        </button>
      </form>
    </div>
  </div>
</div>

</body>
</html>