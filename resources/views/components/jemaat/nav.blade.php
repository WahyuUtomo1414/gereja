<div class="rounded-[2rem] border border-slate-200/80 bg-white/90 p-2 shadow-sm shadow-slate-200/60 backdrop-blur">
    <div class="flex flex-wrap gap-2">
        @php
            $links = [
                ['label' => 'Dashboard', 'route' => 'jamaat.dashboard'],
                ['label' => 'Acara Mendatang', 'route' => 'jamaat.upcoming'],
                ['label' => 'Riwayat', 'route' => 'jamaat.history'],
                ['label' => 'Profil', 'route' => 'jamaat.profile'],
                ['label' => 'Password', 'route' => 'jamaat.password'],
            ];
        @endphp

        @foreach ($links as $link)
            <a
                href="{{ route($link['route']) }}"
                class="{{ request()->routeIs($link['route']) ? 'bg-primary-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-primary-900' }} rounded-[1.2rem] px-4 py-2.5 text-sm font-medium transition"
            >
                {{ $link['label'] }}
            </a>
        @endforeach
    </div>
</div>
