<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Survei Kebutuhan Data - Blok III</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="icon" type="image/png" href="{{ asset('images/logo-bps.png') }}">
</head>

<body class="h-full font-sans bg-gradient-to-br from-blue-50 via-white to-green-50 text-gray-800">

<div class="min-h-screen flex items-center justify-center px-4 md:px-8 py-12">
  <div class="w-full max-w-5xl bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">

      <!-- Header -->
      <div class="bg-gradient-to-r from-blue-500/90 to-green-400/90 text-white text-center py-8 px-8">
        <h2 class="text-3xl font-bold mb-2 tracking-tight">Blok III</h2>
        <p class="text-white/90 text-sm">Kebutuhan Data</p>
      </div>

    <!-- Form Body -->
    <div class="p-8 space-y-6">
      <form method="POST" action="{{ route('blok3.submit') }}" class="space-y-6">
        @csrf

        <!-- Hidden instansi dari Blok I -->
        <input type="hidden" id="instansi_blok1" value="{{ session('blok1.instansi') }}">

        <!-- Data -->
        <div>
          <label class="block text-gray-700 font-medium mb-2">
            Data yang dibutuhkan/dikonsultasikan
          </label>
          <input type="text" name="data"
            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3
            focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition"
            required>
        </div>

        <!-- Perolehan -->
        <div>
          <label class="block text-gray-700 font-medium mb-2">
            Apakah data yang dibutuhkan sudah diperoleh?
          </label>
          <select name="perolehan" id="perolehan"
            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3
            focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition"
            required>
            <option value="">Pilih</option>
            <option value="1">Ya, sesuai</option>
            <option value="2">Ya, tidak sesuai</option>
            <option value="3">Tidak diperoleh</option>
            <option value="4">Belum diperoleh</option>
          </select>
        </div>

        <!-- Box tambahan -->
        <div id="data_lainnya_box" class="hidden space-y-6 mt-6">

          <!-- Sumber -->
          <div>
            <label class="block text-gray-700 font-medium mb-2">Jenis sumber data?</label>
            <select name="sumber"
              class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3
              focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition">
              <option value="">Pilih</option>
              <option value="1">Publikasi</option>
              <option value="2">Data Mikro</option>
              <option value="3">Peta Wilkerstat</option>
              <option value="4">Tabulasi Data</option>
              <option value="5">Tabel di Website</option>
            </select>
          </div>

          <!-- Judul -->
          <div>
            <label class="block text-gray-700 font-medium mb-2">Judul sumber data</label>
            <input type="text" name="judul"
              class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3
              focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition">
          </div>

          <!-- Tahun -->
          <div>
            <label class="block text-gray-700 font-medium mb-2">Tahun Sumber Data</label>
            <input type="number" name="tahun" min="1900" max="2099"
              class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3
              focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition">
          </div>

          <!-- PERENCANAAN (muncul hanya jika instansi 1-4) -->
          <div id="perencanaan_box" class="hidden">
            <label class="block text-gray-700 font-medium mb-2">
              Apakah data ini digunakan untuk perencanaan dan evaluasi pembangunan nasional/daerah?
            </label>
            <select name="perencanaan"
              class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3
              focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition">
              <option value="">Pilih</option>
              <option value="1">Ya</option>
              <option value="2">Tidak</option>
            </select>
          </div>

          <!-- Kepuasan -->
          <div>
            <label class="block text-gray-700 font-medium mb-3">
              Tingkat Kepuasan terhadap Kualitas Data
            </label>

            <div class="flex flex-wrap justify-between gap-2">
              @for($i=1;$i<=10;$i++)
              <label class="flex flex-col items-center w-10 cursor-pointer">
                <input type="radio" name="q17" value="{{ $i }}" class="peer sr-only">
                <span class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-300
                  peer-checked:bg-blue-500 peer-checked:text-white transition">
                  {{ $i }}
                </span>
              </label>
              @endfor
            </div>

            <div class="flex justify-between text-gray-500 text-sm mt-2">
              <span>1 = Sangat Tidak Puas</span>
              <span>10 = Sangat Puas</span>
            </div>
          </div>

        </div>

        <!-- Submit -->
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

<!-- SCRIPT LOGIC -->
<script>
document.addEventListener('DOMContentLoaded', function() {

  const instansiBlok1 = document.getElementById('instansi_blok1').value;
  const perolehan = document.getElementById('perolehan');
  const dataBox = document.getElementById('data_lainnya_box');
  const perencanaanBox = document.getElementById('perencanaan_box');
  const perencanaanSelect = perencanaanBox.querySelector('select');

  function updateRequiredAndVisibility() {

      // Tampilkan box tambahan jika perolehan 1 atau 2
      const showDataBox = perolehan.value === "1" || perolehan.value === "2";
      dataBox.classList.toggle('hidden', !showDataBox);

      dataBox.querySelectorAll('input, select').forEach(el => {
          // semua input/select di dataBox kecuali perencanaanBox
          if(el.closest('#perencanaan_box')) return;
          if(showDataBox) el.setAttribute('required', 'required');
          else el.removeAttribute('required');
      });

      // Perencanaan hanya jika instansi 1-4 dan dataBox ditampilkan
      const showPerencanaan = showDataBox && ["1","2","3","4"].includes(instansiBlok1);
      perencanaanBox.classList.toggle('hidden', !showPerencanaan);
      if(showPerencanaan) perencanaanSelect.setAttribute('required', 'required');
      else perencanaanSelect.removeAttribute('required');
  }

  // Jalankan sekali saat load agar kondisi awal benar
  updateRequiredAndVisibility();

  // Event listener saat user ubah pilihan
  perolehan.addEventListener('change', updateRequiredAndVisibility);

});
</script>

</body>
</html>