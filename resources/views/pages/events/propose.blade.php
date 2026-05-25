<x-layouts.app>
    <x-slot name="title">Pengajuan Acara - Gereja Modern</x-slot>

    <!-- Header Kecil -->
    <div class="bg-primary-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-white font-['Outfit']">Pengajuan Acara</h1>
            <p class="mt-4 text-xl text-primary-100 max-w-2xl mx-auto">Ajukan kegiatan atau acara pelayanan Anda untuk ditinjau oleh tim gereja.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="max-w-2xl mx-auto bg-white p-8 border border-slate-200 rounded-lg shadow-sm">
            <h2 class="text-2xl font-bold text-slate-900 font-['Outfit'] mb-6 text-center">Formulir Pengajuan</h2>
            <p class="text-slate-500 text-center mb-8">Ini adalah kerangka form (belum berfungsi penuh). Nantinya jemaat mengisi detail acara di sini.</p>
            
            <form action="#" method="POST" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Nama Acara</label>
                    <input type="text" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm border p-2" placeholder="Contoh: Ibadah Padang">
                </div>
                <button type="button" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700">
                    Kirim Pengajuan
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
