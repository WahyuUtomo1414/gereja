<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Kegiatan;
use App\Models\Sambutan;
use App\Enums\StatusKegiatan;
use App\Services\KegiatanStatusService;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __construct(
        protected KegiatanStatusService $kegiatanStatusService,
    ) {}

    public function index(): View
    {
        $this->kegiatanStatusService->markExpiredActivitiesAsFinished();

        $sambutan = Sambutan::query()
            ->where('active', true)
            ->latest('id')
            ->first();

        $faqs = Faq::query()
            ->where('active', true)
            ->latest('id')
            ->get();

        $upcomingKegiatan = Kegiatan::query()
            ->with('jenisKegiatan')
            ->where('active', true)
            ->whereIn('status', [
                StatusKegiatan::PENDAFTARAN_DIBUKA,
                StatusKegiatan::PENDAFTARAN_DITUTUP,
            ])
            ->whereDate('tanggal', '>=', now()->toDateString())
            ->orderBy('tanggal')
            ->orderBy('jam_mulai')
            ->limit(3)
            ->get()
            ->map(function (Kegiatan $kegiatan): array {
                return [
                    'id' => $kegiatan->id,
                    'slug' => $kegiatan->slug,
                    'nama' => $kegiatan->nama,
                    'kategori' => $kegiatan->jenisKegiatan?->nama ?? 'Kegiatan Gereja',
                    'tanggal_label' => $kegiatan->tanggal?->translatedFormat('d M Y') ?? '-',
                    'jam_label' => $kegiatan->jam_mulai ? substr($kegiatan->jam_mulai, 0, 5).' WIT' : '-',
                    'lokasi' => $kegiatan->lokasi ?: 'Lokasi akan diumumkan',
                    'detail_url' => route('events.show', $kegiatan->slug ?: $kegiatan->id),
                ];
            });

        return view('pages.home', [
            'sambutan' => $sambutan,
            'faqs' => $faqs,
            'upcomingKegiatan' => $upcomingKegiatan,
        ]);
    }
}
