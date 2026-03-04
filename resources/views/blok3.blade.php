<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Blok III - Kebutuhan Data</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans bg-gray-50">

<div class="min-h-screen flex items-center justify-center px-4 md:px-8 py-10">
  <div class="w-full max-w-5xl bg-white rounded-3xl shadow-xl overflow-hidden">
    
    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-500 to-green-500 text-white text-center py-6 px-6">
      <h2 class="text-3xl font-bold mb-1">Blok III - Kebutuhan Data</h2>
      <p class="text-white/80 text-sm">
        Diisi jika jenis layanan yang digunakan selain rekomendasi kegiatan statistik 
        (Blok I Rincian 11 berisi salah satu kode 1, 2, 4, 8)
      </p>
    </div>

    <!-- Form Body -->
    <div class="p-8 space-y-6">
      <form method="POST" action="{{ route('blok3.submit') }}" class="space-y-6">
        @csrf

        <!-- Data -->
        <div>
          <label class="block text-gray-700 font-medium mb-2">Data yang dibutuhkan/dikonsultasikan</label>
          <input type="text" name="data" class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition" required>
        </div>

        <!-- Perolehan Data -->
        <div>
          <label class="block text-gray-700 font-medium mb-2">Apakah data yang dibutuhkan sudah diperoleh?</label>
          <select name="perolehan" id="perolehan" class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition" required>
            <option value="">Pilih</option>
            <option value="1">Ya, sesuai</option>
            <option value="2">Ya, tidak sesuai</option>
            <option value="3">Tidak diperoleh</option>
            <option value="4">Belum diperoleh</option>
          </select>
        </div>

        <!-- Field tambahan (hidden jika perolehan != 1 atau 2) -->
        <div id="data_lainnya_box" class="hidden space-y-6 mt-4">

          <!-- Sumber Data -->
          <div>
            <label class="block text-gray-700 font-medium mb-2">Jenis sumber data?</label>
            <select name="sumber" id="sumber" class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
              <option value="">Pilih</option>
              <option value="1">Publikasi</option>
              <option value="2">Data Mikro</option>
              <option value="3">Peta Wilkerstat</option>
              <option value="4">Tabulasi Data</option>
              <option value="5">Tabel di Website</option>
            </select>
          </div>

          <!-- Judul Sumber Data -->
          <div>
            <label class="block text-gray-700 font-medium mb-2">Judul sumber data</label>
            <input type="text" name="judul" class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
          </div>

          <!-- Tahun Sumber Data -->
          <div>
            <label class="block text-gray-700 font-medium mb-2">Tahun Sumber Data</label>
            <input type="number" name="tahun" min="1900" max="2099" class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
          </div>

          <!-- Perencanaan Data -->
          <div>
            <label class="block text-gray-700 font-medium mb-2">
              Apakah data ini digunakan untuk perencanaan dan evaluasi pembangunan nasional/daerah?
            </label>
            <select name="perencanaan" id="perencanaan" class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
              <option value="">Pilih</option>
              <option value="1">Ya</option>
              <option value="2">Tidak</option>
            </select>
          </div>

          <!-- Tingkat Kepuasan -->
          <div>
            <label class="block text-gray-700 font-medium mb-2">Tingkat Kepuasan terhadap Kualitas Data</label>
            <div class="flex flex-wrap justify-between gap-2 mt-3">
              @for($i=1;$i<=10;$i++)
                <label class="flex flex-col items-center w-10">
                  <input type="radio" name="q17" value="{{ $i }}" class="peer sr-only">
                  <span class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-300 peer-checked:bg-green-400 peer-checked:text-white transition">
                    {{ $i }}
                  </span>
                </label>
              @endfor
            </div>
            <div class="flex justify-between text-gray-500 text-sm mt-1">
              <span>1 = Sangat Tidak Puas</span>
              <span>10 = Sangat Puas</span>
            </div>
          </div>

        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold rounded-xl py-3 transition-all">
          Lanjut ke Blok IV
        </button>

      </form>
    </div>
  </div>
</div>

<!-- JS Toggle Field tambahan -->
<script>
document.getElementById('perolehan').addEventListener('change', function() {
  const box = document.getElementById('data_lainnya_box');
  // tampilkan hanya jika value = 1 atau 2
  if(this.value === "1" || this.value === "2"){
    box.classList.remove('hidden');
    // set required pada input/select di dalamnya
    box.querySelectorAll('input, select').forEach(el => el.setAttribute('required','required'));
  } else {
    box.classList.add('hidden');
    box.querySelectorAll('input, select').forEach(el => el.removeAttribute('required'));
  }
});
</script>

</body>
</html>