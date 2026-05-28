<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\StatusKegiatan;
use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Services\KegiatanStatusService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    public function __construct(
        protected KegiatanStatusService $kegiatanStatusService,
    ) {}

    public function index(Request $request): View
    {
        $this->kegiatanStatusService->markExpiredActivitiesAsFinished();

        $search = trim((string) $request->string('search'));

        $laporan = Kegiatan::query()
            ->where('active', true)
            ->where('status', StatusKegiatan::LAPORAN)
            ->with(['jenisKegiatan', 'pembicara'])
            ->withCount('peserta')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery
                        ->where('nama', 'like', "%{$search}%")
                        ->orWhere('ringkasan', 'like', "%{$search}%")
                        ->orWhere('laporan', 'like', "%{$search}%")
                        ->orWhere('lokasi', 'like', "%{$search}%");
                });
            })
            ->orderByDesc('tanggal')
            ->paginate(6)
            ->withQueryString()
            ->through(fn (Kegiatan $kegiatan): array => [
                'id' => $kegiatan->id,
                'slug' => $kegiatan->slug,
                'nama' => $kegiatan->nama,
                'ringkasan' => $kegiatan->ringkasan,
                'tanggal_label' => $kegiatan->tanggal?->translatedFormat('l, d M Y'),
                'lokasi' => $kegiatan->lokasi,
                'thumbnail_url' => $this->resolveImageUrl($kegiatan->thumbnail),
                'kategori' => $kegiatan->jenisKegiatan?->nama ?? 'Umum',
                'detail_url' => route('docs.show', $kegiatan->slug ?: $kegiatan->id),
            ]);

        return view('pages.docs.index', [
            'laporan' => $laporan,
            'filters' => [
                'search' => $search,
            ],
        ]);
    }

    public function show(string $idOrSlug): View
    {
        $this->kegiatanStatusService->markExpiredActivitiesAsFinished();

        $kegiatan = Kegiatan::query()
            ->where('active', true)
            ->where('status', StatusKegiatan::LAPORAN)
            ->with([
                'jenisKegiatan',
                'pembicara',
                'fotoKegiatan' => fn ($query) => $query->where('active', true)->orderBy('id'),
            ])
            ->withCount('peserta')
            ->where(function ($query) use ($idOrSlug) {
                $query->where('id', $idOrSlug)
                    ->orWhere('slug', $idOrSlug);
            })
            ->firstOrFail();

        $laporan = [
            'id' => $kegiatan->id,
            'slug' => $kegiatan->slug,
            'nama' => $kegiatan->nama,
            'ringkasan' => $kegiatan->ringkasan,
            'laporan_html' => $kegiatan->laporan ?: $kegiatan->deskripsi,
            'tanggal_label' => $kegiatan->tanggal?->translatedFormat('l, d F Y'),
            'jam_label' => $this->formatTimeRange($kegiatan->jam_mulai, $kegiatan->jam_selesai),
            'lokasi' => $kegiatan->lokasi,
            'jumlah_peserta_hadir' => $kegiatan->jumlah_peserta_hadir,
            'jumlah_peserta_terdaftar' => $kegiatan->peserta_count,
            'tanggal_laporan_label' => $kegiatan->tanggal_laporan?->translatedFormat('d F Y H:i'),
            'thumbnail_url' => $this->resolveImageUrl($kegiatan->thumbnail),
            'kategori' => $kegiatan->jenisKegiatan?->nama ?? 'Umum',
            'pembicara' => $kegiatan->pembicara ? [
                'nama' => $kegiatan->pembicara->nama,
                'jabatan' => $kegiatan->pembicara->jabatan,
                'foto_url' => $this->resolveImageUrl($kegiatan->pembicara->foto),
                'latar_belakang' => $kegiatan->pembicara->latar_belakang,
            ] : null,
            'galeri' => $kegiatan->fotoKegiatan->map(fn ($foto): array => [
                'nama' => $foto->nama,
                'foto_url' => $this->resolveImageUrl($foto->foto),
            ])->all(),
        ];

        return view('pages.docs.show', [
            'laporan' => $laporan,
        ]);
    }

    protected function resolveImageUrl(?string $path): ?string
    {
        if (blank($path)) {
            return null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        return asset('storage/' . ltrim($path, '/'));
    }

    protected function formatTimeRange(?string $start, ?string $end): ?string
    {
        if (blank($start)) {
            return null;
        }

        $formatted = substr($start, 0, 5);

        if (filled($end)) {
            $formatted .= ' - ' . substr($end, 0, 5);
        }

        return $formatted . ' WIT';
    }
}
