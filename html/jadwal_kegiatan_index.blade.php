<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Kegiatan Gereja - Digital Sanctuary</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&amp;family=Playfair+Display:wght@600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "inverse-primary": "#bcc7de",
                        "surface-tint": "#545f73",
                        "surface-dim": "#d8dadc",
                        "primary": "#091426",
                        "background": "#f7f9fb",
                        "surface-container": "#eceef0",
                        "primary-fixed": "#d8e3fb",
                        "on-secondary-fixed-variant": "#6e3900",
                        "tertiary": "#0e151a",
                        "surface-container-high": "#e6e8ea",
                        "tertiary-fixed": "#dde3eb",
                        "inverse-surface": "#2d3133",
                        "on-primary-container": "#8590a6",
                        "on-surface-variant": "#45474c",
                        "on-secondary": "#ffffff",
                        "primary-fixed-dim": "#bcc7de",
                        "outline-variant": "#c5c6cd",
                        "tertiary-fixed-dim": "#c1c7cf",
                        "outline": "#75777d",
                        "on-tertiary-container": "#8a9097",
                        "pending-muted": "#FFEDD5",
                        "on-primary": "#ffffff",
                        "surface-container-low": "#f2f4f6",
                        "on-secondary-container": "#663500",
                        "success-muted": "#DCF1E4",
                        "on-background": "#191c1e",
                        "secondary-fixed": "#ffdcc3",
                        "error-muted": "#FEE2E2",
                        "error-container": "#ffdad6",
                        "surface-container-lowest": "#ffffff",
                        "secondary": "#904d00",
                        "error": "#ba1a1a",
                        "on-surface": "#191c1e",
                        "surface-bright": "#f7f9fb",
                        "secondary-fixed-dim": "#ffb77d",
                        "surface": "#f7f9fb",
                        "secondary-container": "#fe932c",
                        "info-muted": "#DBEAFE",
                        "on-tertiary-fixed": "#161c22",
                        "on-primary-fixed": "#111c2d",
                        "on-primary-fixed-variant": "#3c475a",
                        "tertiary-container": "#23292f",
                        "surface-container-highest": "#e0e3e5",
                        "primary-container": "#1e293b",
                        "on-tertiary-fixed-variant": "#41474e",
                        "inverse-on-surface": "#eff1f3",
                        "on-error": "#ffffff",
                        "on-error-container": "#93000a",
                        "on-secondary-fixed": "#2f1500",
                        "on-tertiary": "#ffffff",
                        "surface-variant": "#e0e3e5",
                        "surface-white": "#FFFFFF"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "section-gap": "80px",
                        "container-max": "1280px",
                        "gutter": "24px",
                        "margin-mobile": "16px",
                        "margin-desktop": "48px"
                    },
                    "fontFamily": {
                        "body-md": ["Inter"],
                        "headline-md": ["Playfair Display"],
                        "label-md": ["Inter"],
                        "display-lg-mobile": ["Playfair Display"],
                        "label-sm-italic": ["Inter"],
                        "headline-sm": ["Inter"],
                        "display-lg": ["Playfair Display"],
                        "body-lg": ["Inter"]
                    },
                    "fontSize": {
                        "body-md": ["16px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "headline-md": ["32px", {
                            "lineHeight": "1.3",
                            "fontWeight": "600"
                        }],
                        "label-md": ["14px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "0.01em",
                            "fontWeight": "500"
                        }],
                        "display-lg-mobile": ["32px", {
                            "lineHeight": "1.2",
                            "fontWeight": "700"
                        }],
                        "label-sm-italic": ["12px", {
                            "lineHeight": "1.2",
                            "fontWeight": "400",
                            "fontStyle": "italic"
                        }],
                        "headline-sm": ["24px", {
                            "lineHeight": "1.4",
                            "fontWeight": "700"
                        }],
                        "display-lg": ["48px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }]
                    },
                    "boxShadow": {
                        'ambient': '0 20px 25px -5px rgba(30, 41, 59, 0.04)'
                    }
                },
            },
        }
    </script>
    <style>
        .glass-nav {
            background: rgba(247, 249, 251, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        body {
            background-color: #f7f9fb;
            /* Slate 50 equivalent */
        }
    </style>
</head>

<body class="font-body-md text-on-surface antialiased bg-background pt-20">
    <!-- TopNavBar -->
    <nav class="fixed top-0 w-full z-50 glass-nav shadow-sm bg-surface/80 dark:bg-primary/80 backdrop-blur-md">
        <div
            class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop flex items-center justify-between h-20">
            <!-- Brand -->
            <a class="font-headline-md text-headline-md font-bold text-primary dark:text-on-primary-fixed"
                href="#">
                Digital Sanctuary
            </a>
            <!-- Navigation Links (Desktop) -->
            <ul class="hidden md:flex space-x-8">
                <li><a class="text-on-surface-variant dark:text-on-primary-fixed-variant font-body-md hover:text-secondary dark:hover:text-secondary-fixed transition-colors duration-200"
                        href="#">Beranda</a></li>
                <li><a class="text-secondary dark:text-secondary-fixed font-bold border-b-2 border-secondary hover:text-secondary dark:hover:text-secondary-fixed transition-colors duration-200 scale-95 transition-transform duration-150 inline-block pb-1"
                        href="#">Kegiatan</a></li>
                <li><a class="text-on-surface-variant dark:text-on-primary-fixed-variant font-body-md hover:text-secondary dark:hover:text-secondary-fixed transition-colors duration-200"
                        href="#">Tentang Kami</a></li>
                <li><a class="text-on-surface-variant dark:text-on-primary-fixed-variant font-body-md hover:text-secondary dark:hover:text-secondary-fixed transition-colors duration-200"
                        href="#">Dokumentasi</a></li>
                <li><a class="text-on-surface-variant dark:text-on-primary-fixed-variant font-body-md hover:text-secondary dark:hover:text-secondary-fixed transition-colors duration-200"
                        href="#">Pengajuan Acara</a></li>
                <li><a class="text-on-surface-variant dark:text-on-primary-fixed-variant font-body-md hover:text-secondary dark:hover:text-secondary-fixed transition-colors duration-200"
                        href="#">Kontak</a></li>
            </ul>
            <!-- Trailing Action -->
            <div class="hidden md:block">
                <button
                    class="bg-secondary text-white font-label-md text-label-md px-6 py-3 rounded-2xl hover:bg-secondary-container transition-colors duration-200 active:scale-95">Give</button>
            </div>
            <!-- Mobile Menu Toggle -->
            <button class="md:hidden text-primary">
                <span class="material-symbols-outlined" data-icon="menu">menu</span>
            </button>
        </div>
    </nav>
    <!-- Main Content Layout -->
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-12">
        <!-- Header Section -->
        <header class="mb-12 text-center md:text-left">
            <h1
                class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-primary mb-4">
                Kegiatan Gereja</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">Temukan kegiatan, pelayanan, dan
                acara gereja yang dapat Anda ikuti untuk bertumbuh bersama dalam komunitas.</p>
        </header>
        <div class="flex flex-col lg:flex-row gap-gutter">
            <!-- Sidebar / Filters -->
            <aside class="w-full lg:w-1/4 flex-shrink-0 space-y-8">
                <!-- Search Bar (Mobile visually above filters, desktop in sidebar) -->
                <div class="relative w-full">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline"
                        data-icon="search">search</span>
                    <input
                        class="w-full bg-surface-white border border-outline-variant rounded-2xl py-3 pl-12 pr-4 font-body-md text-on-surface focus:outline-none focus:border-secondary focus:ring-1 focus:ring-secondary transition-all shadow-ambient"
                        placeholder="Cari kegiatan..." type="text" />
                </div>
                <!-- Kategori Filter -->
                <div class="bg-surface-white rounded-2xl p-6 shadow-ambient">
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-4">Kategori</h3>
                    <ul class="space-y-3 font-body-md text-on-surface-variant">
                        <li>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input checked=""
                                    class="text-secondary focus:ring-secondary border-outline-variant rounded-full h-5 w-5"
                                    name="category" type="radio" />
                                <span class="group-hover:text-primary transition-colors">Semua</span>
                            </label>
                        </li>
                        <li>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input
                                    class="text-secondary focus:ring-secondary border-outline-variant rounded-full h-5 w-5"
                                    name="category" type="radio" />
                                <span class="group-hover:text-primary transition-colors">Ibadah</span>
                            </label>
                        </li>
                        <li>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input
                                    class="text-secondary focus:ring-secondary border-outline-variant rounded-full h-5 w-5"
                                    name="category" type="radio" />
                                <span class="group-hover:text-primary transition-colors">Doa</span>
                            </label>
                        </li>
                        <li>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input
                                    class="text-secondary focus:ring-secondary border-outline-variant rounded-full h-5 w-5"
                                    name="category" type="radio" />
                                <span class="group-hover:text-primary transition-colors">Pemuda/Remaja</span>
                            </label>
                        </li>
                        <li>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input
                                    class="text-secondary focus:ring-secondary border-outline-variant rounded-full h-5 w-5"
                                    name="category" type="radio" />
                                <span class="group-hover:text-primary transition-colors">Anak</span>
                            </label>
                        </li>
                        <li>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input
                                    class="text-secondary focus:ring-secondary border-outline-variant rounded-full h-5 w-5"
                                    name="category" type="radio" />
                                <span class="group-hover:text-primary transition-colors">Keluarga</span>
                            </label>
                        </li>
                    </ul>
                </div>
                <!-- Status Filter -->
                <div class="bg-surface-white rounded-2xl p-6 shadow-ambient">
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-4">Status</h3>
                    <ul class="space-y-3 font-body-md text-on-surface-variant">
                        <li>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input checked=""
                                    class="text-secondary focus:ring-secondary border-outline-variant rounded h-5 w-5"
                                    type="checkbox" />
                                <span class="group-hover:text-primary transition-colors">Pendaftaran Dibuka</span>
                            </label>
                        </li>
                        <li>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input
                                    class="text-secondary focus:ring-secondary border-outline-variant rounded h-5 w-5"
                                    type="checkbox" />
                                <span class="group-hover:text-primary transition-colors">Segera Hadir</span>
                            </label>
                        </li>
                        <li>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input
                                    class="text-secondary focus:ring-secondary border-outline-variant rounded h-5 w-5"
                                    type="checkbox" />
                                <span class="group-hover:text-primary transition-colors">Kuota Penuh</span>
                            </label>
                        </li>
                    </ul>
                </div>
            </aside>
            <!-- Main Grid -->
            <main class="flex-1">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-gutter">
                    <!-- Event Card 1 -->
                    <article
                        class="bg-surface-white rounded-2xl shadow-ambient overflow-hidden flex flex-col h-full group hover:shadow-lg transition-shadow duration-300">
                        <div class="relative w-full aspect-video bg-surface-container-high overflow-hidden">
                            <img alt="Ibadah Raya"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="A modern worship service in a spacious, light-filled sanctuary. People are engaged in singing, with warm golden light illuminating the contemporary stage setup. The atmosphere is uplifting and communal, reflecting a welcoming church environment."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuC0SyV6_AD3OqBUbhxeaquqLeEQpqESYZ5wprk3v8qfUxTOu45P1WUgi9JWUisDQZizV0Th-uoECnkFDiof-IWCmXmEDIoiq_0XFDJAZopYvD6eTi3lBqiHiOGp8q7J9oftCOYcekaUI9P_eBKtbQLWn0pEWRj7QtfNxqHKqw1Z3DIFKloDShcCB94adUzJf8SDA4giNjRdOoW35lkvYrjhsLqgTyZ2x8AZxx4d5S6hzAVAmw0dRwsMlpbKDBZ27VqDNIS9yLP1LBc" />
                            <div class="absolute top-4 left-4">
                                <span
                                    class="bg-info-muted text-primary-container font-label-md text-label-md px-3 py-1 rounded-full">Ibadah</span>
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <div
                                class="flex items-center text-on-surface-variant mb-3 font-label-md text-label-md space-x-2">
                                <span class="material-symbols-outlined text-sm"
                                    data-icon="calendar_today">calendar_today</span>
                                <span>Minggu, 12 Nov • 09:00 WIB</span>
                            </div>
                            <h3 class="font-headline-md text-headline-md text-primary mb-2 line-clamp-2"
                                style="font-size: 24px;">Ibadah Raya Minggu Ke-2</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant mb-4 line-clamp-3 flex-1">
                                Ibadah mingguan bersama seluruh jemaat. Mari merayakan kebaikan Tuhan dengan pujian dan
                                penyembahan yang hangat.</p>
                            <div class="space-y-2 mb-6">
                                <div class="flex items-center text-on-surface-variant font-label-md text-label-md">
                                    <span class="material-symbols-outlined mr-2 text-[20px]"
                                        data-icon="location_on">location_on</span>
                                    <span>Main Sanctuary</span>
                                </div>
                                <div class="flex items-center text-on-surface-variant font-label-md text-label-md">
                                    <span class="material-symbols-outlined mr-2 text-[20px]"
                                        data-icon="group">group</span>
                                    <span class="text-secondary font-bold">Terbuka untuk umum</span>
                                </div>
                            </div>
                            <button
                                class="w-full bg-primary-container text-white font-label-md text-label-md py-3 rounded-2xl hover:bg-primary transition-colors duration-200 active:scale-[0.98]">
                                Lihat Detail
                            </button>
                        </div>
                    </article>
                    <!-- Event Card 2 -->
                    <article
                        class="bg-surface-white rounded-2xl shadow-ambient overflow-hidden flex flex-col h-full group hover:shadow-lg transition-shadow duration-300">
                        <div class="relative w-full aspect-video bg-surface-container-high overflow-hidden">
                            <img alt="Youth Gathering"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="A group of young adults engaged in a casual, intimate discussion in a warmly lit modern room. They are sitting in a circle, smiling, with open notebooks and coffee cups. The mood is supportive, friendly, and spiritually enriching."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBVtu4cC4HQJAVPLe5MiPpYjUrnG_MBdFQ2F4Dtml3JgLJnjzQYcaL-VNXv3UpsWkboUHqlW2XVPL0gXRQvTdl-GgZN8KrnaM4edgjJD8IHd1zNdsGWtXTCg2jkmgcNQv8xs0WaOCW6ijPyhTal9Cs7K32TcPs3jvri3QxiFuZXbMmnVHmNuJyh4ejkYwkzoaztMUDdwyrY9DLU-pEP1pH0GHPkzzFEE9xmYifO-gVCcQcfPafyxyXwWRzU2pAehwDACXq5UlKZkvU" />
                            <div class="absolute top-4 left-4">
                                <span
                                    class="bg-secondary-fixed text-on-secondary-fixed font-label-md text-label-md px-3 py-1 rounded-full">Pemuda</span>
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <div
                                class="flex items-center text-on-surface-variant mb-3 font-label-md text-label-md space-x-2">
                                <span class="material-symbols-outlined text-sm"
                                    data-icon="calendar_today">calendar_today</span>
                                <span>Jumat, 17 Nov • 19:00 WIB</span>
                            </div>
                            <h3 class="font-headline-md text-headline-md text-primary mb-2 line-clamp-2"
                                style="font-size: 24px;">Youth Revival Night</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant mb-4 line-clamp-3 flex-1">Malam
                                pujian, penyembahan, dan persekutuan khusus untuk kaum muda. Temukan komunitas yang
                                mendukung pertumbuhan imanmu.</p>
                            <div class="space-y-2 mb-6">
                                <div class="flex items-center text-on-surface-variant font-label-md text-label-md">
                                    <span class="material-symbols-outlined mr-2 text-[20px]"
                                        data-icon="location_on">location_on</span>
                                    <span>Youth Hall (Lantai 2)</span>
                                </div>
                                <div class="flex items-center text-on-surface-variant font-label-md text-label-md">
                                    <span class="material-symbols-outlined mr-2 text-[20px]"
                                        data-icon="person">person</span>
                                    <span>Sisa 24 Kuota</span>
                                </div>
                            </div>
                            <button
                                class="w-full border border-primary-container text-primary-container font-label-md text-label-md py-3 rounded-2xl hover:bg-surface-container-low transition-colors duration-200 active:scale-[0.98]">
                                Lihat Detail
                            </button>
                        </div>
                    </article>
                    <!-- Event Card 3 -->
                    <article
                        class="bg-surface-white rounded-2xl shadow-ambient overflow-hidden flex flex-col h-full group hover:shadow-lg transition-shadow duration-300">
                        <div class="relative w-full aspect-video bg-surface-container-high overflow-hidden">
                            <div
                                class="absolute inset-0 bg-primary/20 group-hover:bg-primary/10 transition-colors z-10">
                            </div>
                            <img alt="Bakti Sosial"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="People serving food at a community outreach event. The setting is bright and cheerful, showing volunteers in matching shirts interacting warmly with individuals receiving meals. The scene conveys compassion, service, and a strong sense of community."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuC-XAh6EcczWORb_EqVCjYvpJcVE7t9lkmBydKS7_VqtpP_dPZRDgRQZnnHIWC0fZz9Rw2zBg0cexWEFVZsdCT2cEYDDJBZL_n3SU0uf7LIHwHAmq2-4eWDjIMIykUdTiPCBOOoE0GNz9bwUCU4c_kksdKzi0q_ZZvbxo_EJFMEalAsKMwDN4vYVMLNPFtunvpC5V2cNjccz44DY1aQlBYsGGxlarkTx79Dvfp7km6FxjUArIoBCQEtKCGmVFYLzTUNQljtiiLa3HQ" />
                            <div class="absolute top-4 left-4 z-20">
                                <span
                                    class="bg-success-muted text-on-surface font-label-md text-label-md px-3 py-1 rounded-full">Sosial</span>
                            </div>
                            <div class="absolute top-4 right-4 z-20">
                                <span
                                    class="bg-surface/90 text-error font-label-md text-label-md px-3 py-1 rounded-full shadow-sm">Penuh</span>
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <div
                                class="flex items-center text-on-surface-variant mb-3 font-label-md text-label-md space-x-2">
                                <span class="material-symbols-outlined text-sm"
                                    data-icon="calendar_today">calendar_today</span>
                                <span>Sabtu, 18 Nov • 08:00 WIB</span>
                            </div>
                            <h3 class="font-headline-md text-headline-md text-primary mb-2 line-clamp-2"
                                style="font-size: 24px;">Bakti Sosial Desa Mekar</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant mb-4 line-clamp-3 flex-1">
                                Kegiatan pelayanan masyarakat membagikan sembako dan pelayanan kesehatan gratis untuk
                                warga sekitar.</p>
                            <div class="space-y-2 mb-6">
                                <div class="flex items-center text-on-surface-variant font-label-md text-label-md">
                                    <span class="material-symbols-outlined mr-2 text-[20px]"
                                        data-icon="location_on">location_on</span>
                                    <span>Desa Mekar Jaya</span>
                                </div>
                                <div class="flex items-center text-on-surface-variant font-label-md text-label-md">
                                    <span class="material-symbols-outlined mr-2 text-[20px]"
                                        data-icon="group_off">group_off</span>
                                    <span class="text-error opacity-80">Kuota Penuh</span>
                                </div>
                            </div>
                            <button
                                class="w-full bg-surface-container text-on-surface-variant font-label-md text-label-md py-3 rounded-2xl cursor-not-allowed">
                                Kuota Terpenuhi
                            </button>
                        </div>
                    </article>
                </div>
                <!-- Pagination / Load More -->
                <div class="mt-12 flex justify-center">
                    <button
                        class="border border-outline text-primary font-label-md text-label-md px-8 py-3 rounded-2xl hover:bg-surface-container-low transition-colors">
                        Muat Lebih Banyak
                    </button>
                </div>
            </main>
        </div>
    </div>
    <!-- Footer -->
    <footer class="w-full relative bg-primary dark:bg-tertiary-container mt-section-gap">
        <div
            class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-12 grid grid-cols-1 md:grid-cols-4 gap-gutter">
            <div class="col-span-1 md:col-span-1">
                <span class="font-headline-sm text-headline-sm font-bold text-white mb-4 block">Digital
                    Sanctuary</span>
                <p class="text-on-primary/80 font-body-md text-body-md mb-4">Membawa kedamaian dan koneksi spiritual ke
                    dalam ruang digital.</p>
            </div>
            <div class="col-span-1 md:col-span-2 flex flex-wrap gap-8 md:justify-center">
                <a class="text-on-primary/80 dark:text-on-tertiary-container/80 font-body-md text-body-md hover:text-white dark:hover:text-on-tertiary-fixed transition-colors"
                    href="#">Visi &amp; Misi</a>
                <a class="text-on-primary/80 dark:text-on-tertiary-container/80 font-body-md text-body-md hover:text-white dark:hover:text-on-tertiary-fixed transition-colors"
                    href="#">Kebijakan Privasi</a>
                <a class="text-on-primary/80 dark:text-on-tertiary-container/80 font-body-md text-body-md hover:text-white dark:hover:text-on-tertiary-fixed transition-colors"
                    href="#">Syarat &amp; Ketentuan</a>
                <a class="text-on-primary/80 dark:text-on-tertiary-container/80 font-body-md text-body-md hover:text-white dark:hover:text-on-tertiary-fixed transition-colors"
                    href="#">Lokasi Kami</a>
            </div>
            <div class="col-span-1 md:col-span-1 text-left md:text-right">
                <p class="text-on-primary/80 font-label-sm-italic text-label-sm-italic">© 2024 Digital Sanctuary. All
                    Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>
