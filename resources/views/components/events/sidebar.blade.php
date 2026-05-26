<form action="{{ route('events.index') }}" method="GET" class="w-full lg:w-1/4 flex-shrink-0 space-y-8">
    <!-- Search Bar -->
    <div class="relative w-full">
        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
            search
        </span>
        <input type="text" 
               name="search"
               value="{{ request('search') }}"
               placeholder="Cari kegiatan..." 
               class="w-full bg-white border border-slate-200 rounded-2xl py-3.5 pl-12 pr-4 text-sm text-slate-800 focus:outline-none focus:border-secondary-500 focus:ring-1 focus:ring-secondary-500 transition-all shadow-sm" />
    </div>

    <!-- Kategori Filter -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <h3 class="text-lg font-bold font-serif text-primary-900 mb-4 border-b border-slate-100 pb-2">Kategori</h3>
        <ul class="space-y-3 text-sm text-slate-600 font-light">
            <li>
                <label class="flex items-center space-x-3 cursor-pointer group">
                    <input type="radio" name="kategori" value="" {{ request('kategori') == '' ? 'checked' : '' }} class="text-secondary-600 focus:ring-secondary-500 border-slate-300 h-4 w-4" />
                    <span class="group-hover:text-primary-900 transition-colors">Semua</span>
                </label>
            </li>
            <li>
                <label class="flex items-center space-x-3 cursor-pointer group">
                    <input type="radio" name="kategori" value="ibadah" {{ request('kategori') == 'ibadah' ? 'checked' : '' }} class="text-secondary-600 focus:ring-secondary-500 border-slate-300 h-4 w-4" />
                    <span class="group-hover:text-primary-900 transition-colors">Ibadah</span>
                </label>
            </li>
            <li>
                <label class="flex items-center space-x-3 cursor-pointer group">
                    <input type="radio" name="kategori" value="doa" {{ request('kategori') == 'doa' ? 'checked' : '' }} class="text-secondary-600 focus:ring-secondary-500 border-slate-300 h-4 w-4" />
                    <span class="group-hover:text-primary-900 transition-colors">Doa</span>
                </label>
            </li>
            <li>
                <label class="flex items-center space-x-3 cursor-pointer group">
                    <input type="radio" name="kategori" value="pemuda-remaja" {{ request('kategori') == 'pemuda-remaja' ? 'checked' : '' }} class="text-secondary-600 focus:ring-secondary-500 border-slate-300 h-4 w-4" />
                    <span class="group-hover:text-primary-900 transition-colors">Pemuda/Remaja</span>
                </label>
            </li>
            <li>
                <label class="flex items-center space-x-3 cursor-pointer group">
                    <input type="radio" name="kategori" value="anak" {{ request('kategori') == 'anak' ? 'checked' : '' }} class="text-secondary-600 focus:ring-secondary-500 border-slate-300 h-4 w-4" />
                    <span class="group-hover:text-primary-900 transition-colors">Anak</span>
                </label>
            </li>
            <li>
                <label class="flex items-center space-x-3 cursor-pointer group">
                    <input type="radio" name="kategori" value="keluarga" {{ request('kategori') == 'keluarga' ? 'checked' : '' }} class="text-secondary-600 focus:ring-secondary-500 border-slate-300 h-4 w-4" />
                    <span class="group-hover:text-primary-900 transition-colors">Keluarga</span>
                </label>
            </li>
        </ul>
    </div>

    <!-- Status Filter -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <h3 class="text-lg font-bold font-serif text-primary-900 mb-4 border-b border-slate-100 pb-2">Status</h3>
        <ul class="space-y-3 text-sm text-slate-600 font-light">
            @php
                $selectedStatuses = request('status', []);
                if (!is_array($selectedStatuses)) {
                    $selectedStatuses = [$selectedStatuses];
                }
            @endphp
            <li>
                <label class="flex items-center space-x-3 cursor-pointer group">
                    <input type="checkbox" name="status[]" value="buka" {{ in_array('buka', $selectedStatuses) || empty($selectedStatuses) ? 'checked' : '' }} class="text-secondary-600 focus:ring-secondary-500 border-slate-300 rounded h-4 w-4" />
                    <span class="group-hover:text-primary-900 transition-colors">Pendaftaran Dibuka</span>
                </label>
            </li>
            <li>
                <label class="flex items-center space-x-3 cursor-pointer group">
                    <input type="checkbox" name="status[]" value="segera" {{ in_array('segera', $selectedStatuses) ? 'checked' : '' }} class="text-secondary-600 focus:ring-secondary-500 border-slate-300 rounded h-4 w-4" />
                    <span class="group-hover:text-primary-900 transition-colors">Segera Hadir</span>
                </label>
            </li>
            <li>
                <label class="flex items-center space-x-3 cursor-pointer group">
                    <input type="checkbox" name="status[]" value="penuh" {{ in_array('penuh', $selectedStatuses) ? 'checked' : '' }} class="text-secondary-600 focus:ring-secondary-500 border-slate-300 rounded h-4 w-4" />
                    <span class="group-hover:text-primary-900 transition-colors">Kuota Penuh</span>
                </label>
            </li>
        </ul>
    </div>

    <!-- Apply Filter Button -->
    <button type="submit" class="w-full bg-primary-800 text-white text-center font-sans text-xs font-semibold py-3.5 rounded-2xl hover:bg-primary-900 active:scale-[0.98] transition-all shadow-sm flex items-center justify-center gap-2">
        <span class="material-symbols-outlined text-sm">tune</span>
        Terapkan Filter
    </button>
</form>
