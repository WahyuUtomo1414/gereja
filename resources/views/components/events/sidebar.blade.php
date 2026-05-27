@props([
    'kategori' => collect(),
    'filters' => [
        'search' => '',
        'kategori' => null,
        'status' => [],
    ],
])

<form action="{{ route('events.index') }}" method="GET" class="w-full flex-shrink-0 space-y-8 lg:w-1/4">
    <div class="relative w-full">
        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
            search
        </span>
        <input type="text"
               name="search"
               value="{{ $filters['search'] }}"
               placeholder="Cari kegiatan..."
               class="w-full rounded-2xl border border-slate-200 bg-white py-3.5 pl-12 pr-4 text-sm text-slate-800 shadow-sm transition-all focus:border-secondary-500 focus:outline-none focus:ring-1 focus:ring-secondary-500" />
    </div>

    <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
        <h3 class="mb-4 border-b border-slate-100 pb-2 font-serif text-lg font-bold text-primary-900">Kategori</h3>
        <ul class="space-y-3 text-sm font-light text-slate-600">
            <li>
                <label class="group flex cursor-pointer items-center space-x-3">
                    <input type="radio" name="kategori" value="" {{ blank($filters['kategori']) ? 'checked' : '' }} class="h-4 w-4 border-slate-300 text-secondary-600 focus:ring-secondary-500" />
                    <span class="transition-colors group-hover:text-primary-900">Semua</span>
                </label>
            </li>
            @foreach ($kategori as $item)
                <li>
                    <label class="group flex cursor-pointer items-center space-x-3">
                        <input type="radio" name="kategori" value="{{ $item->id }}" {{ (string) $filters['kategori'] === (string) $item->id ? 'checked' : '' }} class="h-4 w-4 border-slate-300 text-secondary-600 focus:ring-secondary-500" />
                        <span class="transition-colors group-hover:text-primary-900">{{ $item->nama }}</span>
                    </label>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
        <h3 class="mb-4 border-b border-slate-100 pb-2 font-serif text-lg font-bold text-primary-900">Status</h3>
        <ul class="space-y-3 text-sm font-light text-slate-600">
            <li>
                <label class="group flex cursor-pointer items-center space-x-3">
                    <input type="checkbox" name="status[]" value="pendaftaran_dibuka" {{ in_array('pendaftaran_dibuka', $filters['status']) ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-secondary-600 focus:ring-secondary-500" />
                    <span class="transition-colors group-hover:text-primary-900">Pendaftaran Dibuka</span>
                </label>
            </li>
            <li>
                <label class="group flex cursor-pointer items-center space-x-3">
                    <input type="checkbox" name="status[]" value="pendaftaran_ditutup" {{ in_array('pendaftaran_ditutup', $filters['status']) ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-secondary-600 focus:ring-secondary-500" />
                    <span class="transition-colors group-hover:text-primary-900">Pendaftaran Ditutup</span>
                </label>
            </li>
            <li>
                <label class="group flex cursor-pointer items-center space-x-3">
                    <input type="checkbox" name="status[]" value="kuota_penuh" {{ in_array('kuota_penuh', $filters['status']) ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-secondary-600 focus:ring-secondary-500" />
                    <span class="transition-colors group-hover:text-primary-900">Kuota Penuh</span>
                </label>
            </li>
        </ul>
    </div>

    <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-2xl bg-primary-800 py-3.5 text-center font-sans text-xs font-semibold text-white shadow-sm transition-all hover:bg-primary-900 active:scale-[0.98]">
        <span class="material-symbols-outlined text-sm">tune</span>
        Terapkan Filter
    </button>
</form>
