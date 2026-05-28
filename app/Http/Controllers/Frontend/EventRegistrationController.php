<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\StatusKegiatan;
use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Peserta;
use App\Services\KegiatanStatusService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EventRegistrationController extends Controller
{
    public function __construct(
        protected KegiatanStatusService $kegiatanStatusService,
    ) {}

    public function store(Request $request, string $idOrSlug): RedirectResponse
    {
        $this->kegiatanStatusService->markExpiredActivitiesAsFinished();

        $user = $request->user();
        $jemaat = $user?->jemaat;

        if (! $user?->isJamaat() || ! $jemaat) {
            return back()->with('registration_error', 'Hanya akun jemaat yang dapat mendaftar kegiatan.');
        }

        $kegiatan = Kegiatan::query()
            ->withCount('peserta')
            ->where('active', true)
            ->where('status', StatusKegiatan::PENDAFTARAN_DIBUKA)
            ->where(fn ($query) => $query->where('id', $idOrSlug)->orWhere('slug', $idOrSlug))
            ->firstOrFail();

        if (! $kegiatan->canRegister()) {
            return back()->with('registration_error', 'Pendaftaran untuk kegiatan ini sudah ditutup atau kuotanya penuh.');
        }

        $data = $request->validate([
            'catatan' => ['nullable', 'string', 'max:1000'],
            'consent' => ['accepted'],
        ], [
            'consent.accepted' => 'Anda harus menyetujui pernyataan pendaftaran terlebih dahulu.',
        ]);

        $existingPeserta = Peserta::withTrashed()
            ->where('kegiatan_id', $kegiatan->id)
            ->where('jemaat_id', $jemaat->id)
            ->first();

        if ($existingPeserta && ! $existingPeserta->trashed()) {
            return back()->with('registration_error', 'Anda sudah terdaftar pada kegiatan ini.');
        }

        if ($existingPeserta && $existingPeserta->trashed()) {
            $existingPeserta->restore();
            $existingPeserta->update([
                'catatan' => $data['catatan'] ?? null,
                'active' => true,
                'deleted_by' => null,
            ]);
        } else {
            Peserta::query()->create([
                'kegiatan_id' => $kegiatan->id,
                'jemaat_id' => $jemaat->id,
                'catatan' => $data['catatan'] ?? null,
                'active' => true,
            ]);
        }

        return back()->with('registration_success', 'Pendaftaran berhasil dikirim.');
    }
}
