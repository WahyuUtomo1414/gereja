<?php

namespace Tests\Feature;

use App\Enums\StatusKegiatan;
use App\Models\Kegiatan;
use App\Services\KegiatanStatusService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class KegiatanFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_kegiatan_defaults_to_menunggu_review_on_create(): void
    {
        [$ownerId, $jenisKegiatanId, $pembicaraId] = $this->prepareDependencies();

        $kegiatan = Kegiatan::query()->create([
            'jenis_kegiatan_id' => $jenisKegiatanId,
            'nama' => 'Doa Syafaat',
            'slug' => 'doa-syafaat',
            'tanggal' => now()->addDay()->toDateString(),
            'jam_mulai' => '19:00:00',
            'jam_selesai' => '21:00:00',
            'pembicara_id' => $pembicaraId,
            'active' => true,
            'created_by' => $ownerId,
        ]);

        $this->assertSame(StatusKegiatan::MENUNGGU_REVIEW, $kegiatan->status);
    }

    public function test_service_marks_only_expired_open_or_closed_activities_as_finished(): void
    {
        [$ownerId, $jenisKegiatanId, $pembicaraId] = $this->prepareDependencies();

        $expired = Kegiatan::query()->create([
            'jenis_kegiatan_id' => $jenisKegiatanId,
            'nama' => 'Kegiatan Expired',
            'slug' => 'kegiatan-expired',
            'tanggal' => now()->subDay()->toDateString(),
            'jam_mulai' => '09:00:00',
            'jam_selesai' => '10:00:00',
            'pembicara_id' => $pembicaraId,
            'status' => StatusKegiatan::PENDAFTARAN_DIBUKA,
            'active' => true,
            'created_by' => $ownerId,
        ]);

        $future = Kegiatan::query()->create([
            'jenis_kegiatan_id' => $jenisKegiatanId,
            'nama' => 'Kegiatan Future',
            'slug' => 'kegiatan-future',
            'tanggal' => now()->addDay()->toDateString(),
            'jam_mulai' => '09:00:00',
            'jam_selesai' => '10:00:00',
            'pembicara_id' => $pembicaraId,
            'status' => StatusKegiatan::PENDAFTARAN_DIBUKA,
            'active' => true,
            'created_by' => $ownerId,
        ]);

        $rejected = Kegiatan::query()->create([
            'jenis_kegiatan_id' => $jenisKegiatanId,
            'nama' => 'Kegiatan Ditolak',
            'slug' => 'kegiatan-ditolak',
            'tanggal' => now()->subDay()->toDateString(),
            'jam_mulai' => '09:00:00',
            'jam_selesai' => '10:00:00',
            'pembicara_id' => $pembicaraId,
            'status' => StatusKegiatan::DITOLAK,
            'active' => true,
            'created_by' => $ownerId,
        ]);

        $updated = app(KegiatanStatusService::class)->markExpiredActivitiesAsFinished();

        $this->assertSame(1, $updated);
        $this->assertSame(StatusKegiatan::SELESAI, $expired->fresh()->status);
        $this->assertSame(StatusKegiatan::PENDAFTARAN_DIBUKA, $future->fresh()->status);
        $this->assertSame(StatusKegiatan::DITOLAK, $rejected->fresh()->status);
    }

    protected function prepareDependencies(): array
    {
        $ownerId = DB::table('users')->insertGetId([
            'name' => 'Ketua Panitia',
            'email' => 'ketua.panitia@example.test',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $jenisKegiatanId = DB::table('jenis_kegiatan')->insertGetId([
            'nama' => 'Pelayanan',
            'created_by' => $ownerId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $pembicaraId = DB::table('pembicara')->insertGetId([
            'nama' => 'Pdt. Yohanes',
            'created_by' => $ownerId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return [$ownerId, $jenisKegiatanId, $pembicaraId];
    }
}
