<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survei Kebutuhan Data</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans bg-gradient-to-br from-blue-50 via-white to-green-50 text-gray-800">

<div class="min-h-screen flex items-center justify-center px-4 md:px-8 py-12">
    <div class="w-full max-w-5xl bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">

        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-500/90 to-green-400/90 text-white text-center py-8 px-8">
            <h2 class="text-3xl font-bold mb-2 tracking-tight">Blok I - Keterangan Responden</h2>
            <p class="text-white/90 text-sm">Silakan isi data diri Anda dan layanan yang digunakan dengan benar</p>
        </div>

        <!-- Form -->
        <div class="p-8 space-y-6">
            <form method="POST" action="{{ route('blok1.submit') }}" class="space-y-5">
                @csrf

                <!-- Toggle Isi Sendiri -->
                <div class="flex items-center mb-4">
                    <span class="mr-3 text-gray-700 font-medium">Saya mengisi sendiri</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="isi_sendiri" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:ring-2 peer-focus:ring-green-400 rounded-full peer peer-checked:bg-green-500 transition-all"></div>
                        <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow-md peer-checked:translate-x-full transition-transform"></div>
                    </label>
                </div>

                <!-- Nama Pencacah -->
                <div id="pencacah_box" class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Nama Pencacah</label>
                    <input type="text" name="pencacah" placeholder="Masukkan nama pencacah"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
                </div>

                <!-- Nama -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" required placeholder="Masukkan nama lengkap"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" id="email" required placeholder="contoh@email.com"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
                </div>

                <!-- No HP -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">No Handphone</label>
                    <input type="text" name="no_hp" id="no_hp" required placeholder="0812xxxxxxx"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
                </div>

                <!-- Jenis Kelamin -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
                        <option value="">Pilih</option>
                        <option value="1">Laki-laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>

                <!-- Pendidikan -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Pendidikan Terakhir</label>
                    <select name="pendidikan" id="pendidikan" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
                        <option value="">Pilih</option>
                        <option value="1">SLTA/Sederajat</option>
                        <option value="2">D1/D2/D3</option>
                        <option value="3">D4/S1</option>
                        <option value="4">S2</option>
                        <option value="5">S3</option>
                    </select>
                </div>

                <!-- Umur -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Kategori Umur</label>
                    <select name="umur" id="umur" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
                        <option value="">Pilih</option>
                        <option value="1">&lt; 17 tahun</option>
                        <option value="2">17 - 25 tahun</option>
                        <option value="3">26 - 34 tahun</option>
                        <option value="4">35 - 44 tahun</option>
                        <option value="5">45 - 54 tahun</option>
                        <option value="6">55 - 65 tahun</option>
                        <option value="7">&gt; 65 tahun</option>
                    </select>
                </div>

                <!-- Disabilitas -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Apakah Anda penyandang disabilitas / pendamping?</label>
                    <select name="disabilitas_status" id="disabilitas_status" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
                        <option value="">Pilih</option>
                        <option value="1">Ya</option>
                        <option value="2">Tidak</option>
                    </select>
                </div>

                <div id="jenis_disabilitas_box" class="hidden">
                    <label class="block text-gray-700 font-medium mb-2">Jika Ya, jenis disabilitas</label>
                    <select name="jenis_disabilitas" id="jenis_disabilitas"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
                        <option value="">Pilih</option>
                        <option value="1">Disabilitas Fisik</option>
                        <option value="2">Disabilitas Intelektual</option>
                        <option value="3">Disabilitas Mental</option>
                        <option value="4">Disabilitas Sensorik</option>
                    </select>
                </div>

                <!-- Pekerjaan Utama -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Pekerjaan Utama</label>
                    <select name="pekerjaan" id="pekerjaan" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
                        <option value="">Pilih</option>
                        <option value="1">Pelajar/Mahasiswa</option>
                        <option value="2">Peneliti/Dosen</option>
                        <option value="3">ASN/TNI/Polri</option>
                        <option value="4">Pegawai BUMN/BUMD</option>
                        <option value="5">Pegawai Swasta</option>
                        <option value="6">Wiraswasta</option>
                        <option value="7">Lainnya</option>
                    </select>
                </div>

                <div id="pekerjaan_lainnya_box" class="hidden">
                    <label class="block text-gray-700 font-medium mb-2">Sebutkan pekerjaan</label>
                    <input type="text" name="pekerjaan_lainnya" id="pekerjaan_lainnya" placeholder="Masukkan pekerjaan Anda"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
                </div>

                <!-- Kategori Instansi -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Kategori Instansi</label>
                    <select name="instansi" id="instansi" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
                        <option value="">Pilih</option>
                        <option value="1">Lembaga Negara</option>
                        <option value="2">Kementerian & Lembaga Pemerintah</option>
                        <option value="3">TNI/Polri/BIN/Kejaksaan</option>
                        <option value="4">Pemerintah Daerah</option>
                        <option value="5">Lembaga Internasional</option>
                        <option value="6">Lembaga Penelitian & Pendidikan</option>
                        <option value="7">BUMN/BUMD</option>
                        <option value="8">Swasta</option>
                        <option value="9">Lainnya</option>
                    </select>
                </div>

                <div id="instansi_lainnya_box" class="hidden">
                    <label class="block text-gray-700 font-medium mb-2">Sebutkan Kategori Instansi</label>
                    <input type="text" name="instansi_lainnya" id="instansi_lainnya" placeholder="Masukkan kategori instansi Anda"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
                </div>

                <!-- Pemanfaatan Utama -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Pemanfaatan Utama Hasil Kunjungan dan/atau Akses Layanan</label>
                    <select name="pemanfaatan" id="pemanfaatan" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
                        <option value="">Pilih</option>
                        <option value="1">Tugas Sekolah/Tugas Kuliah</option>
                        <option value="2">Pemerintahan</option>
                        <option value="3">Komersial</option>
                        <option value="4">Penelitian</option>
                        <option value="5">Lainnya</option>
                    </select>
                </div>

                <div id="pemanfaatan_lainnya_box" class="hidden">
                    <label class="block text-gray-700 font-medium mb-2">Sebutkan Pemanfaatan Utama</label>
                    <input type="text" name="pemanfaatan_lainnya" id="pemanfaatan_lainnya" placeholder="Masukkan pemanfaatan utama Anda"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
                </div>

                <!-- Jenis Layanan -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">
                        Jenis layanan yang digunakan
                        <span class="font-normal italic text-gray-500 block">Boleh pilih lebih dari satu jawaban</span>
                    </label>
                    <div class="space-y-1">
                        <label class="flex justify-between items-center"><span>Perpustakaan</span><input type="checkbox" name="layanan[]" value="1" class="rounded border-gray-300 text-green-500 focus:ring-green-400"></label>
                        <label class="flex justify-between items-center"><span>Pembelian Produk Statistik Berbayar</span><input type="checkbox" name="layanan[]" value="2" class="rounded border-gray-300 text-green-500 focus:ring-green-400"></label>
                        <label class="flex justify-between items-center"><span>Akses produk statistik pada Website BPS</span><input type="checkbox" name="layanan[]" value="4" class="rounded border-gray-300 text-green-500 focus:ring-green-400"></label>
                        <label class="flex justify-between items-center"><span>Konsultasi Statistik</span><input type="checkbox" name="layanan[]" value="8" class="rounded border-gray-300 text-green-500 focus:ring-green-400"></label>
                        <label class="flex justify-between items-center"><span>Rekomendasi Kegiatan Statistik</span><input type="checkbox" name="layanan[]" value="16" class="rounded border-gray-300 text-green-500 focus:ring-green-400"></label>
                    </div>
                </div>

                <!-- Sarana -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">
                        Sarana yang digunakan untuk memperoleh layanan BPS
                        <span class="font-normal italic text-gray-500 block">Boleh pilih lebih dari satu jawaban</span>
                    </label>
                    <div class="space-y-1">
                        <label class="flex justify-between items-center"><span>PST datang langsung</span><input type="checkbox" name="sarana[]" value="1" class="rounded border-gray-300 text-green-500 focus:ring-green-400"></label>
                        <label class="flex justify-between items-center"><span>PST online (pst.bps.go.id)</span><input type="checkbox" name="sarana[]" value="2" class="rounded border-gray-300 text-green-500 focus:ring-green-400"></label>
                        <label class="flex justify-between items-center"><span>Website BPS / AllStats BPS</span><input type="checkbox" name="sarana[]" value="4" class="rounded border-gray-300 text-green-500 focus:ring-green-400"></label>
                        <label class="flex justify-between items-center"><span>Surat / E-mail</span><input type="checkbox" name="sarana[]" value="8" class="rounded border-gray-300 text-green-500 focus:ring-green-400"></label>
                        <label class="flex justify-between items-center"><span>Aplikasi chat (WhatsApp, Telegram, ChatUs, dll.)</span><input type="checkbox" name="sarana[]" value="16" class="rounded border-gray-300 text-green-500 focus:ring-green-400"></label>
                        <label class="flex justify-between items-center"><span>Lainnya</span><input type="checkbox" id="sarana_lain" name="sarana[]" value="32" class="rounded border-gray-300 text-green-500 focus:ring-green-400"></label>
                    </div>
                    <input type="text" name="sarana_lainnya" id="sarana_lain_input" placeholder="Sebutkan sarana lainnya"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 mt-2 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition" style="display:none;">
                </div>

                <!-- Tombol Submit -->
                <div>
                    <button type="submit"
                        class="w-full py-3 rounded-2xl bg-gradient-to-r from-blue-500 to-green-400
                        text-white font-semibold shadow-md hover:shadow-lg hover:scale-[1.01]
                        transition-all duration-300">
                        Selanjutnya →
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
// Toggle boxes
document.getElementById("disabilitas_status").addEventListener("change", function(){
    // 1 = Ya, 2 = Tidak
    document.getElementById("jenis_disabilitas_box").classList.toggle("hidden", this.value !== "1");
});

document.getElementById("pekerjaan").addEventListener("change", function(){
    const box = document.getElementById("pekerjaan_lainnya_box");
    const input = document.getElementById("pekerjaan_lainnya");
    // 7 = Lainnya
    if(this.value === "7"){ 
        box.classList.remove("hidden"); 
        input.setAttribute("required","required"); 
    } else { 
        box.classList.add("hidden"); 
        input.removeAttribute("required"); 
        input.value=""; 
    }
});

document.getElementById("instansi").addEventListener("change", function(){
    const box = document.getElementById("instansi_lainnya_box");
    const input = document.getElementById("instansi_lainnya");
    // 9 = Lainnya
    if(this.value === "9"){ 
        box.classList.remove("hidden"); 
        input.setAttribute("required","required"); 
    } else { 
        box.classList.add("hidden"); 
        input.removeAttribute("required"); 
        input.value=""; 
    }
});

document.getElementById("pemanfaatan").addEventListener("change", function(){
    const box = document.getElementById("pemanfaatan_lainnya_box");
    const input = document.getElementById("pemanfaatan_lainnya");
    // 5 = Lainnya
    if(this.value === "5"){ 
        box.classList.remove("hidden"); 
        input.setAttribute("required","required"); 
    } else { 
        box.classList.add("hidden"); 
        input.removeAttribute("required"); 
        input.value=""; 
    }
});

// Toggle Lainnya Sarana (checkbox sudah angka, 32 = Lainnya)
document.getElementById("sarana_lain").addEventListener("change", function(){
    const input = document.getElementById("sarana_lain_input");
    input.style.display = this.checked ? "block" : "none";
});

const isiSendiriCheckbox = document.getElementById("isi_sendiri");
const pencacahBox = document.getElementById("pencacah_box");

// tampilkan/hide pencacah sesuai checkbox
isiSendiriCheckbox.addEventListener("change", function() {
    if(this.checked){
        pencacahBox.classList.add("hidden");
    } else {
        pencacahBox.classList.remove("hidden");
    }
});

// default: pencacah muncul
pencacahBox.classList.remove("hidden");
</script>
</body>
</html>