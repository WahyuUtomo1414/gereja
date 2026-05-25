<nav class="bg-white shadow-sm sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="text-xl font-bold text-primary-900 font-['Outfit']">
                    Gereja Modern
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden sm:flex sm:items-center sm:space-x-8">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-primary-900 font-semibold' : 'text-slate-600 hover:text-primary-900' }} transition">Beranda</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-primary-900 font-semibold' : 'text-slate-600 hover:text-primary-900' }} transition">Tentang Kami</a>
                <a href="{{ route('events.index') }}" class="{{ request()->routeIs('events.*') ? 'text-primary-900 font-semibold' : 'text-slate-600 hover:text-primary-900' }} transition">Kegiatan</a>
                <a href="{{ route('docs.index') }}" class="{{ request()->routeIs('docs.*') ? 'text-primary-900 font-semibold' : 'text-slate-600 hover:text-primary-900' }} transition">Dokumentasi</a>
                <a href="{{ route('events.propose') }}" class="{{ request()->routeIs('events.propose') ? 'text-primary-900 font-semibold' : 'text-slate-600 hover:text-primary-900' }} transition">Pengajuan Acara</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-primary-900 font-semibold' : 'text-slate-600 hover:text-primary-900' }} transition">Kontak</a>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                <a href="{{ route('login') }}" class="text-slate-600 hover:text-primary-900 font-medium transition">Masuk</a>
                <a href="{{ route('register') }}" class="bg-primary-900 text-white px-4 py-2 rounded-lg font-medium hover:bg-primary-800 transition">Daftar</a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center sm:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="text-slate-500 hover:text-slate-700 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': mobileMenuOpen, 'inline-flex': !mobileMenuOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !mobileMenuOpen, 'inline-flex': mobileMenuOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" class="sm:hidden" style="display: none;">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('home') ? 'border-primary-900 text-primary-900 bg-primary-50' : 'border-transparent text-slate-600 hover:bg-slate-50 hover:border-slate-300 hover:text-slate-800' }}">Beranda</a>
            <a href="{{ route('about') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('about') ? 'border-primary-900 text-primary-900 bg-primary-50' : 'border-transparent text-slate-600 hover:bg-slate-50 hover:border-slate-300 hover:text-slate-800' }}">Tentang Kami</a>
            <a href="{{ route('events.index') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('events.*') ? 'border-primary-900 text-primary-900 bg-primary-50' : 'border-transparent text-slate-600 hover:bg-slate-50 hover:border-slate-300 hover:text-slate-800' }}">Kegiatan</a>
            <a href="{{ route('docs.index') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('docs.*') ? 'border-primary-900 text-primary-900 bg-primary-50' : 'border-transparent text-slate-600 hover:bg-slate-50 hover:border-slate-300 hover:text-slate-800' }}">Dokumentasi</a>
            <a href="{{ route('events.propose') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('events.propose') ? 'border-primary-900 text-primary-900 bg-primary-50' : 'border-transparent text-slate-600 hover:bg-slate-50 hover:border-slate-300 hover:text-slate-800' }}">Pengajuan Acara</a>
            <a href="{{ route('contact') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('contact') ? 'border-primary-900 text-primary-900 bg-primary-50' : 'border-transparent text-slate-600 hover:bg-slate-50 hover:border-slate-300 hover:text-slate-800' }}">Kontak</a>
        </div>
        <div class="pt-4 pb-3 border-t border-slate-200">
            <div class="mt-3 space-y-1">
                <a href="{{ route('login') }}" class="block px-4 py-2 text-base font-medium text-slate-600 hover:text-slate-800 hover:bg-slate-100">Masuk</a>
                <a href="{{ route('register') }}" class="block px-4 py-2 text-base font-medium text-primary-900 hover:text-primary-800 hover:bg-slate-100">Daftar</a>
            </div>
        </div>
    </div>
</nav>
