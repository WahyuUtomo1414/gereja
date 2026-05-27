<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\StatusKegiatan;
use App\Http\Controllers\Controller;
use App\Models\JenisKegiatan;
use App\Models\Kegiatan;
use App\Services\KegiatanStatusService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;

class EventController extends Controller
{
    public function __construct(
        protected KegiatanStatusService $kegiatanStatusService,
    ) {}

    public function index(Request $request): View
    {
        $this->kegiatanStatusService->markExpiredActivitiesAsFinished();

        $query = Kegiatan::query()
            ->with('jenisKegiatan')
            ->withCount('peserta')
            ->where('active', true)
            ->whereIn('status', [
                StatusKegiatan::PENDAFTARAN_DIBUKA,
                StatusKegiatan::PENDAFTARAN_DITUTUP,
            ]);

        if ($request->filled('search')) {
            $search = $request->string('search')->trim()->toString();

            $query->where(function ($builder) use ($search): void {
                $builder
                    ->where('nama', 'like', '%'.$search.'%')
                    ->orWhere('ringkasan', 'like', '%'.$search.'%')
                    ->orWhere('lokasi', 'like', '%'.$search.'%');
            });
        }

        if ($request->filled('kategori')) {
            $query->where('jenis_kegiatan_id', $request->integer('kategori'));
        }

        $selectedStatuses = collect($request->input('status', []))
            ->filter()
            ->values();

        if ($selectedStatuses->isNotEmpty()) {
            $query->where(function ($builder) use ($selectedStatuses): void {
                if ($selectedStatuses->contains('pendaftaran_dibuka')) {
                    $builder->orWhere('status', StatusKegiatan::PENDAFTARAN_DIBUKA);
                }

                if ($selectedStatuses->contains('pendaftaran_ditutup')) {
                    $builder->orWhere('status', StatusKegiatan::PENDAFTARAN_DITUTUP);
                }
            });
        }

        /** @var LengthAwarePaginator $kegiatan */
        $kegiatan = $query
            ->orderBy('tanggal')
            ->orderBy('jam_mulai')
            ->paginate(6)
            ->withQueryString();

        $kegiatan->through(fn (Kegiatan $item): array => $this->mapListItem($item));

        if ($selectedStatuses->contains('kuota_penuh')) {
            $filteredItems = collect($kegiatan->items())
                ->filter(fn (array $item): bool => $item['is_full'])
                ->values()
                ->all();

            $kegiatan->setCollection(collect($filteredItems));
        }

        $kategori = JenisKegiatan::query()
            ->where('active', true)
            ->orderBy('nama')
            ->get(['id', 'nama']);

        return view('pages.events.index', [
            'kegiatan' => $kegiatan,
            'kategori' => $kategori,
            'filters' => [
                'search' => $request->string('search')->toString(),
                'kategori' => $request->integer('kategori') ?: null,
                'status' => $selectedStatuses->all(),
            ],
        ]);
    }

    public function show(string $idOrSlug): View
    {
        $this->kegiatanStatusService->markExpiredActivitiesAsFinished();

        $kegiatan = Kegiatan::query()
            ->with(['jenisKegiatan', 'pembicara'])
            ->withCount('peserta')
            ->where('active', true)
            ->whereIn('status', [
                StatusKegiatan::PENDAFTARAN_DIBUKA,
                StatusKegiatan::PENDAFTARAN_DITUTUP,
            ])
            ->where(fn ($query) => $query->where('id', $idOrSlug)->orWhere('slug', $idOrSlug))
            ->firstOrFail();

        return view('pages.events.show', [
            'event' => $this->mapDetailItem($kegiatan),
        ]);
    }

    protected function mapListItem(Kegiatan $item): array
    {
        $isFull = $this->isFull($item);

        return [
            'id' => $item->id,
            'slug' => $item->slug,
            'nama' => $item->nama,
            'ringkasan' => $item->ringkasan,
            'tanggal_label' => $item->tanggal?->translatedFormat('l, d M') ?? '-',
            'jam_label' => $item->jam_mulai ? Carbon::parse($item->jam_mulai)->format('H:i').' WIT' : '-',
            'lokasi' => $item->lokasi ?: 'Lokasi akan diumumkan',
            'kuota' => $item->kuota,
            'kuota_terisi' => $item->peserta_count,
            'is_full' => $isFull,
            'status' => $item->status->value,
            'thumbnail_url' => $item->thumbnail ? (str_starts_with($item->thumbnail, 'http') ? $item->thumbnail : asset('storage/'.$item->thumbnail)) : null,
            'kategori' => $item->jenisKegiatan?->nama ?? 'Kegiatan Gereja',
            'detail_url' => route('events.show', $item->slug ?: $item->id),
        ];
    }

    protected function mapDetailItem(Kegiatan $item): array
    {
        $isFull = $this->isFull($item);

        return [
            'id' => $item->id,
            'slug' => $item->slug,
            'nama' => $item->nama,
            'ringkasan' => $item->ringkasan,
            'deskripsi' => $item->deskripsi,
            'tanggal_label' => $item->tanggal?->translatedFormat('l, d F Y') ?? '-',
            'jam_label' => $item->jam_mulai
                ? Carbon::parse($item->jam_mulai)->format('H:i').($item->jam_selesai ? ' - '.Carbon::parse($item->jam_selesai)->format('H:i') : '').' WIT'
                : '-',
            'lokasi' => $item->lokasi ?: 'Lokasi akan diumumkan',
            'kuota' => $item->kuota,
            'kuota_terisi' => $item->peserta_count,
            'persen_kuota' => $item->kuota ? min(100, (int) round(($item->peserta_count / $item->kuota) * 100)) : 0,
            'is_full' => $isFull,
            'can_register' => $item->status === StatusKegiatan::PENDAFTARAN_DIBUKA && ! $isFull,
            'status' => $item->status->value,
            'status_label' => $isFull
                ? 'Kuota Penuh'
                : ($item->status === StatusKegiatan::PENDAFTARAN_DIBUKA ? 'Pendaftaran Dibuka' : 'Pendaftaran Ditutup'),
            'foto_url' => $item->thumbnail ? (str_starts_with($item->thumbnail, 'http') ? $item->thumbnail : asset('storage/'.$item->thumbnail)) : null,
            'kategori' => $item->jenisKegiatan?->nama ?? 'Kegiatan Gereja',
            'kebutuhan_kegiatan' => $item->kebutuhan_kegiatan,
            'pembicara' => $item->pembicara ? [[
                'nama' => $item->pembicara->nama,
                'jabatan' => $item->pembicara->jabatan ?: $item->pembicara->latar_belakang,
                'foto_url' => $item->pembicara->foto ? (str_starts_with($item->pembicara->foto, 'http') ? $item->pembicara->foto : asset('storage/'.$item->pembicara->foto)) : null,
            ]] : [],
        ];
    }

    protected function isFull(Kegiatan $item): bool
    {
        if (is_null($item->kuota)) {
            return false;
        }

        return $item->peserta_count >= $item->kuota;
    }
}
