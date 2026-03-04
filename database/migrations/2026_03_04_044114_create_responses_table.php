<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            
            // ===================
            // Blok I - Data Responden
            // ===================
            $table->string('pencacah')->nullable();
            $table->string('nama');
            $table->string('email');
            $table->string('no_hp');
            $table->tinyInteger('jenis_kelamin')->comment('1=Laki-laki,2=Perempuan');
            $table->tinyInteger('pendidikan')->comment('1=SLTA,2=D1/D2/D3,3=D4/S1,4=S2,5=S3');
            $table->tinyInteger('umur')->comment('1=<17,2=17-25,3=26-34,4=34-44,5=45-54,6=55-65,7=>65');

            // Disabilitas
            $table->tinyInteger('disabilitas_status')->comment('1=Ya,2=Tidak');
            $table->tinyInteger('jenis_disabilitas')->nullable()->comment('1=Fisik,2=Intelektual,3=Mental,4=Sensorik');

            // Pekerjaan
            $table->tinyInteger('pekerjaan')->comment('1=Pelajar/Mahasiswa,2=Peneliti/Dosen,3=ASN/TNI/Polri,4=Pegawai BUMN/BUMD,5=Pegawai Swasta,6=Wiraswasta,7=Lainnya');
            $table->string('pekerjaan_lainnya')->nullable();

            // Instansi
            $table->tinyInteger('instansi')->comment('1=Lembaga Negara,2=Kementerian & Lembaga Pemerintah,3=TNI/Polri/BIN/Kejaksaan,4=Pemerintah Daerah,5=Lembaga Internasional,6=Lembaga Penelitian & Pendidikan,7=BUMN/BUMD,8=Swasta,9=Lainnya');
            $table->string('instansi_lainnya')->nullable();

            // Pemanfaatan
            $table->tinyInteger('pemanfaatan')->comment('1=Tugas Sekolah/Kuliah,2=Pemerintahan,3=Komersial,4=Penelitian,5=Lainnya');
            $table->string('pemanfaatan_lainnya')->nullable();

            // Layanan dan Sarana (checkbox multiple -> JSON)
            $table->json('layanan')->nullable();
            $table->json('sarana')->nullable();
            $table->string('sarana_lainnya')->nullable();

            // ===================
            // Blok II - Kepuasan Pelayanan (q1-q13)
            // ===================
            for ($i = 1; $i <= 13; $i++) {
                $table->tinyInteger("q$i")->nullable()->comment("Skala 1-10 untuk pertanyaan $i Blok II");
            }

            // ===================
            // Blok III - Kebutuhan Data
            // ===================
            $table->string('data')->nullable();
            $table->tinyInteger('perolehan')->nullable()->comment('1=Ya sesuai,2=Ya tidak sesuai,3=Tidak diperoleh,4=Belum diperoleh');
            $table->tinyInteger('sumber')->nullable()->comment('1=Publikasi,2=Data Mikro,3=Peta Wilkerstat,4=Tabulasi Data,5=Tabel di Website');
            $table->string('judul')->nullable();
            $table->year('tahun')->nullable();
            $table->tinyInteger('perencanaan')->nullable()->comment('1=Ya,2=Tidak');
            $table->tinyInteger('q17')->nullable()->comment('Skala 1-10 tingkat kepuasan Blok III');

            // ===================
            // Blok IV - Catatan / Kritik & Saran
            // ===================
            $table->text('kritik_saran')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};