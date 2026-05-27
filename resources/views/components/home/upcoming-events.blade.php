@props([
    'kegiatan' => collect(),
])

<div class="border-y border-tertiary bg-neutral py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-8 flex items-end justify-between">
            <div>
                <h2 class="font-serif text-3xl font-bold text-primary-800">Acara Mendatang</h2>
                <p class="mt-2 text-slate-600">Ikuti dan daftarkan diri Anda dalam berbagai kegiatan gereja.</p>
            </div>
            <a href="{{ route('events.index') }}" class="hidden font-medium text-secondary-600 hover:text-secondary-700 sm:inline-block">Lihat Semua &rarr;</a>
        </div>

        <div class="hidden overflow-hidden rounded-lg border border-tertiary bg-white shadow-sm md:block">
            <table class="min-w-full divide-y divide-tertiary">
                <thead class="bg-slate-50">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium tracking-wider text-slate-500 uppercase">Tanggal</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium tracking-wider text-slate-500 uppercase">Kegiatan</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium tracking-wider text-slate-500 uppercase">Lokasi</th>
                        <th scope="col" class="px-6 py-4 text-right text-xs font-medium tracking-wider text-slate-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-tertiary bg-white">
                    @forelse ($kegiatan as $item)
                        <tr class="transition hover:bg-slate-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center font-bold text-primary-800">{{ $item['tanggal_label'] }}</div>
                                <div class="text-sm text-slate-500">{{ $item['jam_label'] }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-primary-800">{{ $item['nama'] }}</div>
                                <div class="text-sm text-slate-500">Kategori: {{ $item['kategori'] }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm whitespace-nowrap text-slate-500">
                                {{ $item['lokasi'] }}
                            </td>
                            <td class="px-6 py-4 text-right text-sm font-medium whitespace-nowrap">
                                <a href="{{ $item['detail_url'] }}" class="rounded-md border border-secondary-600 px-4 py-2 text-secondary-600 transition hover:bg-secondary-50 hover:text-secondary-900">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-slate-500">
                                Belum ada kegiatan mendatang saat ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="space-y-4 md:hidden">
            @forelse ($kegiatan as $item)
                <div class="rounded-lg border border-tertiary bg-white p-5 shadow-sm">
                    <div class="mb-2 flex items-start justify-between gap-3">
                        <div class="font-bold text-primary-800">
                            {{ $item['tanggal_label'] }}
                            <span class="ml-1 text-sm font-normal text-slate-500">{{ $item['jam_label'] }}</span>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-secondary-100 px-2.5 py-0.5 text-xs font-medium text-secondary-800">
                            {{ $item['kategori'] }}
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800">{{ $item['nama'] }}</h3>
                    <p class="mt-1 text-sm text-slate-500">📍 {{ $item['lokasi'] }}</p>
                    <div class="mt-4">
                        <a href="{{ $item['detail_url'] }}" class="block w-full rounded-md border border-secondary-600 px-4 py-2 text-center text-secondary-600 hover:bg-secondary-50">Lihat Detail</a>
                    </div>
                </div>
            @empty
                <div class="rounded-lg border border-dashed border-slate-300 bg-white px-5 py-8 text-center text-slate-500">
                    Belum ada kegiatan mendatang saat ini.
                </div>
            @endforelse

            <div class="pt-4 text-center">
                <a href="{{ route('events.index') }}" class="inline-block w-full rounded-md border border-secondary-600 px-4 py-2 font-medium text-secondary-600">Lihat Semua Kegiatan</a>
            </div>
        </div>
    </div>
</div>
