<x-layouts.app>
    <x-slot name="title">Daftar - Gereja Modern</x-slot>

    <div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-slate-50">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-sm border border-slate-200">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-slate-900 font-['Outfit']">
                    Daftar Akun Baru
                </h2>
                <p class="mt-2 text-center text-sm text-slate-600">
                    Sudah punya akun? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:text-primary-500">Masuk di sini</a>
                </p>
            </div>
            <form class="mt-8 space-y-6" action="#" method="POST">
                <div class="rounded-md shadow-sm space-y-4">
                    <div>
                        <input name="name" type="text" required class="appearance-none rounded relative block w-full px-3 py-2 border border-slate-300 placeholder-slate-500 text-slate-900 focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm" placeholder="Nama Lengkap">
                    </div>
                    <div>
                        <input name="email" type="email" required class="appearance-none rounded relative block w-full px-3 py-2 border border-slate-300 placeholder-slate-500 text-slate-900 focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm" placeholder="Alamat Email">
                    </div>
                    <div>
                        <input name="password" type="password" required class="appearance-none rounded relative block w-full px-3 py-2 border border-slate-300 placeholder-slate-500 text-slate-900 focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm" placeholder="Password">
                    </div>
                </div>

                <div>
                    <button type="button" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-900 hover:bg-primary-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Daftar Akun
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
