<x-layouts.app>
    <x-home.hero />
    <x-home.welcome :sambutan="$sambutan" />
    <x-home.features />
    <x-home.upcoming-events :kegiatan="$upcomingKegiatan" />
    <x-home.steps />
    <x-home.banner-cta />
    <x-home.faq :faqs="$faqs" />
    <x-home.final-cta />
</x-layouts.app>
