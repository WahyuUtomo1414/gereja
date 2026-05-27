<?php

use App\Enums\StatusKegiatan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('kegiatan', function (Blueprint $table) {
            $table->text('catatan_review')->nullable()->after('status');
            $table->foreignId('reviewed_by')->nullable()->after('catatan_review')->constrained('users')->nullOnDelete();
            $table->dateTime('tanggal_review')->nullable()->after('reviewed_by');
            $table->text('laporan')->nullable()->after('tanggal_review');
            $table->unsignedInteger('jumlah_peserta_hadir')->nullable()->after('laporan');
            $table->text('catatan_laporan')->nullable()->after('jumlah_peserta_hadir');
            $table->dateTime('tanggal_laporan')->nullable()->after('catatan_laporan');
        });

        Schema::table('foto_kegiatan', function (Blueprint $table) {
            $table->string('caption')->nullable()->after('foto');
        });

        DB::table('kegiatan')
            ->where('status', 'Draft')
            ->update(['status' => StatusKegiatan::MENUNGGU_REVIEW->value]);

        DB::table('kegiatan')
            ->where('status', 'Pendaftaran Dibuka')
            ->update(['status' => StatusKegiatan::PENDAFTARAN_DIBUKA->value]);

        DB::table('kegiatan')
            ->where('status', 'Penuh')
            ->update(['status' => StatusKegiatan::PENDAFTARAN_DITUTUP->value]);

        DB::table('kegiatan')
            ->where('status', 'Selesai')
            ->update(['status' => StatusKegiatan::SELESAI->value]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('foto_kegiatan', function (Blueprint $table) {
            $table->dropColumn('caption');
        });

        Schema::table('kegiatan', function (Blueprint $table) {
            $table->dropConstrainedForeignId('reviewed_by');
            $table->dropColumn([
                'catatan_review',
                'tanggal_review',
                'laporan',
                'jumlah_peserta_hadir',
                'catatan_laporan',
                'tanggal_laporan',
            ]);
        });
    }
};
