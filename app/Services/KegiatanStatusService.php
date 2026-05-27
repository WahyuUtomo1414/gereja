<?php

namespace App\Services;

use App\Enums\StatusKegiatan;
use App\Models\Kegiatan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class KegiatanStatusService
{
    public function markExpiredActivitiesAsFinished(): int
    {
        if (! Schema::hasTable('kegiatan')) {
            return 0;
        }

        $updated = 0;

        Kegiatan::query()
            ->whereIn('status', [
                StatusKegiatan::PENDAFTARAN_DIBUKA,
                StatusKegiatan::PENDAFTARAN_DITUTUP,
            ])
            ->whereNotNull('jam_selesai')
            ->get()
            ->each(function (Kegiatan $kegiatan) use (&$updated): void {
                if (! $this->isExpired($kegiatan)) {
                    return;
                }

                $kegiatan->forceFill([
                    'status' => StatusKegiatan::SELESAI,
                ])->saveQuietly();

                $updated++;
            });

        return $updated;
    }

    protected function isExpired(Kegiatan $kegiatan): bool
    {
        if (! $kegiatan->tanggal || ! $kegiatan->jam_selesai) {
            return false;
        }

        $finishedAt = Carbon::parse(sprintf(
            '%s %s',
            $kegiatan->tanggal->format('Y-m-d'),
            $kegiatan->jam_selesai,
        ));

        return $finishedAt->isPast();
    }
}
