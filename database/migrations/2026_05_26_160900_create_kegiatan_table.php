<?php

use App\Traits\BaseModelSoftDeleteDefault;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use BaseModelSoftDeleteDefault;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_kegiatan_id')->constrained('jenis_kegiatan');
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('ringkasan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai')->nullable();
            $table->text('lokasi')->nullable();
            $table->foreignId('pembicara_id')->nullable()->constrained('pembicara');
            $table->unsignedInteger('kuota')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('foto')->nullable();
            $table->text('kebutuhan_kegiatan')->nullable();
            $table->string('status', 128);
            $this->base($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
