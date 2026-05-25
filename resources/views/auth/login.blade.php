<x-layouts.app>
    <x-slot name="title">Masuk - Gereja Modern</x-slot>

    <div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-slate-50">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-sm border border-slate-200">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-slate-900 font-['Outfit']">
                    Masuk ke Akun
                </h2>
                <p class="mt-2 text-center text-sm text-slate-600">
                    Atau <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:text-primary-500">daftar akun baru</a>
                </p>
            </div>
            <form class="mt-8 space-y-6" action="#" method="POST">
                <div class="rounded-md shadow-sm space-y-4">
                    <div>
                        <label for="email-address" class="sr-only">Alamat Email</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded relative block w-full px-3 py-2 border border-slate-300 placeholder-slate-500 text-slate-900 focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm" placeholder="Alamat Email">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded relative block w-full px-3 py-2 border border-slate-300 placeholder-slate-500 text-slate-900 focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm" placeholder="Password">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-slate-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-slate-900">
                            Ingat saya
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-primary-600 hover:text-primary-500">
                            Lupa password?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="button" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-900 hover:bg-primary-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
