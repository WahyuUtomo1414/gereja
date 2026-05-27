<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gereja;
use App\Models\StrukturOrganisasi;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function index(): View
    {
        $gereja = Gereja::query()
            ->where('active', true)
            ->latest('id')
            ->first();

        $fallbackDescriptions = [
            'ketua' => 'Memimpin arah pelayanan dan koordinasi utama dalam kehidupan berjemaat.',
            'wakil ketua (ex-officio)' => 'Mendampingi kepemimpinan utama dan memastikan kesinambungan pelayanan lintas bidang.',
            'sekretaris i' => 'Mengelola administrasi utama dan komunikasi pelayanan dengan tertib.',
            'sekretaris ii' => 'Mendukung pengelolaan administrasi serta dokumentasi kegiatan pelayanan.',
            'bendahara i' => 'Mengelola keuangan pelayanan dengan tertib, transparan, dan penuh tanggung jawab.',
            'bendahara ii' => 'Mendukung pencatatan serta pengawasan keuangan untuk pelayanan jemaat.',
            'ketua sie acara' => 'Mengatur susunan acara dan memastikan setiap kegiatan berjalan dengan baik.',
            'ketua sie usaha dana' => 'Menggerakkan dukungan pendanaan untuk menunjang pelayanan dan kegiatan gereja.',
            'ketua sie perlengkapan' => 'Menyiapkan kebutuhan perlengkapan agar seluruh kegiatan berjalan lancar.',
            'ketua sie konsumsi' => 'Mengelola kebutuhan konsumsi dan kenyamanan peserta dalam setiap kegiatan.',
        ];

        $struktur = StrukturOrganisasi::query()
            ->where('active', true)
            ->orderBy('order')
            ->get()
            ->map(function (StrukturOrganisasi $item) use ($fallbackDescriptions): array {
                $jabatan = trim((string) $item->jabatan);
                $description = $item->deskripsi ?: ($fallbackDescriptions[Str::lower($jabatan)] ?? null);

                return [
                    'nama' => $item->nama,
                    'jabatan' => $jabatan,
                    'foto_url' => $item->foto ? asset('storage/'.$item->foto) : null,
                    'deskripsi' => $description,
                ];
            })
            ->values();

        return view('pages.about', [
            'gereja' => $gereja,
            'firstMember' => $struktur->first(),
            'otherMembers' => $struktur->slice(1)->values(),
        ]);
    }
}
