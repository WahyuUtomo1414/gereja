<div class="rounded-[2rem] border border-slate-200/80 bg-white/90 p-2 shadow-sm shadow-slate-200/60 backdrop-blur">
    <div class="flex flex-wrap gap-2">
        <a href="{{ route('jamaat.dashboard') }}" class="{{ request()->routeIs('jamaat.dashboard') ? 'bg-primary-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-primary-900' }} rounded-[1.2rem] px-4 py-2.5 text-sm font-medium transition">Dashboard</a>
        <a href="{{ route('jamaat.upcoming') }}" class="{{ request()->routeIs('jamaat.upcoming') ? 'bg-primary-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-primary-900' }} rounded-[1.2rem] px-4 py-2.5 text-sm font-medium transition">Acara Mendatang</a>
        <a href="{{ route('jamaat.history') }}" class="{{ request()->routeIs('jamaat.history') ? 'bg-primary-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-primary-900' }} rounded-[1.2rem] px-4 py-2.5 text-sm font-medium transition">Riwayat</a>
        <a href="{{ route('jamaat.profile') }}" class="{{ request()->routeIs('jamaat.profile') ? 'bg-primary-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-primary-900' }} rounded-[1.2rem] px-4 py-2.5 text-sm font-medium transition">Profil</a>
        <a href="{{ route('jamaat.password') }}" class="{{ request()->routeIs('jamaat.password') ? 'bg-primary-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-primary-900' }} rounded-[1.2rem] px-4 py-2.5 text-sm font-medium transition">Password</a>
    </div>
</div>
