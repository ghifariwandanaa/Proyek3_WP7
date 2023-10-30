<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('halaman', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('kontak');
            $table->text('dataDiri');
            $table->string('gambar');
            $table->timestamps();
        });

        Schema::create('portofolio', function (Blueprint $table) {
            $table->foreignId('halaman_id')->constrained('halaman');
            $table->string('portofolio');
            $table->timestamps();
        });

        Schema::create('riwayat_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('halaman_id')->constrained('halaman');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->string('namaPerusahaan');
            $table->string('domisilPerusahaan');
            $table->string('jabatan');
            $table->timestamps();
        });

        Schema::create('riwayat_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('halaman_id')->constrained('halaman');
            $table->string('thn_mulai');
            $table->string('thn_akhir');
            $table->string('namaSekolah');
            $table->timestamps();
        });

        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('halaman_id')->constrained('halaman');
            $table->string('namaSkill');
            $table->integer('tingkatanSkill'); 
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('halaman');
        Schema::dropIfExists('portofolio');
        Schema::dropIfExists('riwayat_pekerjaan');
        Schema::dropIfExists('riwayat_pendidikan');
        Schema::dropIfExists('skills');
    }
};
