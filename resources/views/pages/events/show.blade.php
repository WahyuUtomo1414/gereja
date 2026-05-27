<x-layouts.app>
    <x-slot name="title">{{ $event['nama'] }} - Gereja Protestan Maluku</x-slot>

    <x-events.detail.hero :event="$event" />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-12">
            <div class="space-y-12 lg:col-span-8">
                <x-events.detail.info :event="$event" />
                <x-events.detail.speakers :speakers="$event['pembicara']" />
                <x-events.detail.requirements :requirements="$event['kebutuhan_kegiatan']" />
            </div>

            <div class="relative lg:col-span-4">
                <x-events.detail.register :event="$event" />
            </div>
        </div>
    </div>

    <x-home.final-cta />
</x-layouts.app>
