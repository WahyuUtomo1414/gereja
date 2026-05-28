<nav x-data="{ mobileMenuOpen: false, scrolled: {{ request()->routeIs('home') ? 'false' : 'true' }} }" 
     @scroll.window="if('{{ request()->routeIs('home') ? '1' : '0' }}' == '1') { scrolled = (window.pageYOffset > 20) }"
     :class="{ 'bg-white shadow-sm': scrolled, 'bg-transparent': !scrolled }"
     class="fixed w-full top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" 
                   :class="scrolled ? 'text-primary-900' : 'text-white'"
                   class="flex items-center gap-3 text-xl font-bold font-serif hover:opacity-90 transition-colors duration-300">
                    <img src="{{ asset('assets/logo.png') }}" alt="Logo Gereja" class="h-10 w-auto transition-all duration-300">
                    <span>Gereja Protestan Maluku</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden sm:flex sm:items-center sm:space-x-8">
                <a href="{{ route('home') }}" 
                   :class="scrolled ? '{{ request()->routeIs('home') ? 'text-primary-900 font-semibold' : 'text-slate-600 hover:text-primary-900' }}' : 'text-slate-200 hover:text-white font-medium drop-shadow-md'"
                   class="transition-colors duration-300">Beranda</a>
                <a href="{{ route('events.index') }}" 
                   :class="scrolled ? '{{ request()->routeIs('events.*') ? 'text-primary-900 font-semibold' : 'text-slate-600 hover:text-primary-900' }}' : 'text-slate-200 hover:text-white font-medium drop-shadow-md'"
                   class="transition-colors duration-300">Jadwal Kegiatan</a>
                <a href="{{ route('about') }}" 
                   :class="scrolled ? '{{ request()->routeIs('about') ? 'text-primary-900 font-semibold' : 'text-slate-600 hover:text-primary-900' }}' : 'text-slate-200 hover:text-white font-medium drop-shadow-md'"
                   class="transition-colors duration-300">Tentang Kami</a>
                <a href="{{ route('docs.index') }}" 
                   :class="scrolled ? '{{ request()->routeIs('docs.*') ? 'text-primary-900 font-semibold' : 'text-slate-600 hover:text-primary-900' }}' : 'text-slate-200 hover:text-white font-medium drop-shadow-md'"
                   class="transition-colors duration-300">Laporan Kegiatan</a>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}" 
                       :class="scrolled ? 'bg-primary-900 text-white hover:bg-primary-800' : 'bg-white/20 text-white hover:bg-white/30 backdrop-blur-sm'"
                       class="px-4 py-2 rounded-lg font-medium transition-colors duration-300">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            type="submit"
                            :class="scrolled ? 'text-slate-600 hover:text-primary-900' : 'text-slate-200 hover:text-white drop-shadow-md'"
                            class="font-medium transition-colors duration-300"
                        >
                            Keluar
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" 
                       :class="scrolled ? 'text-slate-600 hover:text-primary-900' : 'text-slate-200 hover:text-white drop-shadow-md'"
                       class="font-medium transition-colors duration-300">Masuk</a>
                    <a href="{{ route('register') }}" 
                       :class="scrolled ? 'bg-primary-900 text-white hover:bg-primary-800' : 'bg-white/20 text-white hover:bg-white/30 backdrop-blur-sm'"
                       class="px-4 py-2 rounded-lg font-medium transition-colors duration-300">Daftar</a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center sm:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" 
                        :class="scrolled ? 'text-slate-500 hover:text-slate-700' : 'text-white hover:text-slate-200 drop-shadow-md'"
                        class="focus:outline-none transition-colors duration-300">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': mobileMenuOpen, 'inline-flex': !mobileMenuOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !mobileMenuOpen, 'inline-flex': mobileMenuOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="sm:hidden absolute top-16 left-0 w-full bg-white border-b border-slate-200 shadow-lg z-50" 
         style="display: none;">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('home') ? 'border-primary-900 text-primary-900 bg-primary-50' : 'border-transparent text-slate-600 hover:bg-slate-50 hover:border-slate-300 hover:text-slate-800' }}">Beranda</a>
            <a href="{{ route('events.index') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('events.*') ? 'border-primary-900 text-primary-900 bg-primary-50' : 'border-transparent text-slate-600 hover:bg-slate-50 hover:border-slate-300 hover:text-slate-800' }}">Jadwal Kegiatan</a>
            <a href="{{ route('about') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('about') ? 'border-primary-900 text-primary-900 bg-primary-50' : 'border-transparent text-slate-600 hover:bg-slate-50 hover:border-slate-300 hover:text-slate-800' }}">Tentang Kami</a>
            <a href="{{ route('docs.index') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('docs.*') ? 'border-primary-900 text-primary-900 bg-primary-50' : 'border-transparent text-slate-600 hover:bg-slate-50 hover:border-slate-300 hover:text-slate-800' }}">Laporan Kegiatan</a>
        </div>
        <div class="pt-4 pb-3 border-t border-slate-200">
            <div class="mt-3 space-y-1">
                @auth
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-base font-medium text-primary-900 hover:bg-slate-100">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" class="block">
                        @csrf
                        <button type="submit" class="block w-full px-4 py-2 text-left text-base font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-800">
                            Keluar
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-base font-medium text-slate-600 hover:text-slate-800 hover:bg-slate-100">Masuk</a>
                    <a href="{{ route('register') }}" class="block px-4 py-2 text-base font-medium text-primary-900 hover:bg-slate-100">Daftar</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
