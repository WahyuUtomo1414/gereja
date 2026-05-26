<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Seminar Keluarga Bahagia - Digital Sanctuary</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&amp;display=swap"
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
                        "body-md": [
                            "Inter"
                        ],
                        "headline-md": [
                            "Playfair Display"
                        ],
                        "label-md": [
                            "Inter"
                        ],
                        "display-lg-mobile": [
                            "Playfair Display"
                        ],
                        "label-sm-italic": [
                            "Inter"
                        ],
                        "headline-sm": [
                            "Inter"
                        ],
                        "display-lg": [
                            "Playfair Display"
                        ],
                        "body-lg": [
                            "Inter"
                        ]
                    },
                    "fontSize": {
                        "body-md": [
                            "16px",
                            {
                                "lineHeight": "1.6",
                                "fontWeight": "400"
                            }
                        ],
                        "headline-md": [
                            "32px",
                            {
                                "lineHeight": "1.3",
                                "fontWeight": "600"
                            }
                        ],
                        "label-md": [
                            "14px",
                            {
                                "lineHeight": "1.2",
                                "letterSpacing": "0.01em",
                                "fontWeight": "500"
                            }
                        ],
                        "display-lg-mobile": [
                            "32px",
                            {
                                "lineHeight": "1.2",
                                "fontWeight": "700"
                            }
                        ],
                        "label-sm-italic": [
                            "12px",
                            {
                                "lineHeight": "1.2",
                                "fontWeight": "400"
                            }
                        ],
                        "headline-sm": [
                            "24px",
                            {
                                "lineHeight": "1.4",
                                "fontWeight": "700"
                            }
                        ],
                        "display-lg": [
                            "48px",
                            {
                                "lineHeight": "1.2",
                                "letterSpacing": "-0.02em",
                                "fontWeight": "700"
                            }
                        ],
                        "body-lg": [
                            "18px",
                            {
                                "lineHeight": "1.6",
                                "fontWeight": "400"
                            }
                        ]
                    }
                },
            },
        }
    </script>
    <style>
        .glass-nav {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .ambient-shadow {
            box-shadow: 0 20px 25px -5px rgba(30, 41, 59, 0.04), 0 8px 10px -6px rgba(30, 41, 59, 0.02);
        }
    </style>
</head>

<body class="bg-background text-on-background font-body-md min-h-screen flex flex-col">
    <!-- TopNavBar -->
    <header class="fixed top-0 w-full z-50 shadow-sm glass-nav bg-surface/80">
        <div
            class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop flex items-center justify-between h-20">
            <!-- Brand Logo -->
            <a class="font-headline-md text-headline-md font-bold text-primary" href="#">
                Digital Sanctuary
            </a>
            <!-- Navigation Links (Web) -->
            <nav class="hidden md:flex space-x-8">
                <a class="text-on-surface-variant font-body-md text-body-md hover:text-secondary transition-colors duration-200"
                    href="#">Beranda</a>
                <a class="text-secondary font-bold font-body-md text-body-md border-b-2 border-secondary hover:text-secondary transition-colors duration-200"
                    href="#">Kegiatan</a>
                <a class="text-on-surface-variant font-body-md text-body-md hover:text-secondary transition-colors duration-200"
                    href="#">Tentang Kami</a>
                <a class="text-on-surface-variant font-body-md text-body-md hover:text-secondary transition-colors duration-200"
                    href="#">Dokumentasi</a>
                <a class="text-on-surface-variant font-body-md text-body-md hover:text-secondary transition-colors duration-200"
                    href="#">Pengajuan Acara</a>
                <a class="text-on-surface-variant font-body-md text-body-md hover:text-secondary transition-colors duration-200"
                    href="#">Kontak</a>
            </nav>
            <!-- Trailing Action -->
            <button
                class="bg-secondary text-white font-label-md text-label-md px-6 py-2.5 rounded-full hover:bg-secondary-container transition-colors duration-200">
                Give
            </button>
        </div>
    </header>
    <!-- Main Content -->
    <main class="flex-grow pt-20">
        <!-- Hero Section -->
        <section class="relative w-full h-[512px] min-h-[400px] flex items-end">
            <div class="absolute inset-0 z-0">
                <img alt="Hero Banner" class="w-full h-full object-cover"
                    data-alt="A warm and inviting image of a diverse group of people sitting together in a circle, engaged in a meaningful discussion. The setting is a cozy, softly lit room with warm wooden accents and natural light filtering in, reflecting a sense of community and connection. The mood is calm and supportive, perfectly aligning with a 'Digital Sanctuary' theme. The lighting is soft and golden, creating a serene and welcoming atmosphere."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuA0blteT0-ACTbv-n-2knaG-TaEQN6qYj4ynrglvCbQHzdsJ1TaeCAHvQ0TIz909RK3vIduFxbswVnT6gmR-6TVf00fTh3paxFWHWCspRk5Sfsqm5RWzuQd3pn_L6SnHmsljuwMmBLT7ZEE2i9ujpykgsSf2wx3Uzv-9_uf1-BWWJee64QnAg4YUS3pe2MG3wDv5or0FXFKsrpeMpwj-SvT6dthraS1LNB1l6XpdywDAwgD1GhEeTynNV0_lW-lHQoWgbI2rbTf2_M" />
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 to-transparent"></div>
            </div>
            <div class="relative z-10 w-full max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop pb-12">
                <div class="flex flex-wrap gap-3 mb-4">
                    <span
                        class="bg-surface-white/20 backdrop-blur-sm text-white px-3 py-1 rounded-full font-label-md text-label-md border border-white/30">Pernikahan
                        &amp; Keluarga</span>
                    <span
                        class="bg-success-muted text-primary px-3 py-1 rounded-full font-label-md text-label-md flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px]">check_circle</span> Pendaftaran Buka
                    </span>
                </div>
                <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-white mb-4">Seminar Keluarga
                    Bahagia</h1>
                <p class="font-body-lg text-body-lg text-surface-container-highest max-w-2xl">Membangun fondasi kuat
                    untuk keluarga yang harmonis di era digital, dipandu oleh konselor keluarga berpengalaman.</p>
            </div>
        </section>
        <!-- Content Grid -->
        <section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-section-gap">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
                <!-- Left Column (Details) -->
                <div class="lg:col-span-8 space-y-12">
                    <!-- Description -->
                    <div class="bg-surface-white rounded-2xl p-8 ambient-shadow">
                        <h2 class="font-headline-md text-headline-md text-primary mb-6">Tentang Kegiatan</h2>
                        <div class="font-body-md text-body-md text-on-surface-variant space-y-4">
                            <p>Keluarga adalah inti dari komunitas yang sehat. Dalam seminar interaktif ini, kita akan
                                menjelajahi prinsip-prinsip komunikasi yang efektif, resolusi konflik, dan cara menjaga
                                keintiman di tengah kesibukan modern.</p>
                            <p>Sesi ini dirancang tidak hanya untuk pasangan suami istri, tetapi juga untuk individu
                                yang ingin mempersiapkan diri untuk pernikahan. Melalui diskusi terbuka, studi kasus,
                                dan latihan praktis, peserta akan dilengkapi dengan alat untuk membangun "sanctuary"
                                atau tempat perlindungan yang damai di dalam rumah mereka sendiri.</p>
                        </div>
                    </div>
                    <!-- Speakers -->
                    <div class="bg-surface-white rounded-2xl p-8 ambient-shadow">
                        <h2 class="font-headline-md text-headline-md text-primary mb-6">Pembicara / Pelayan</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 rounded-full overflow-hidden bg-surface-container">
                                    <img alt="Speaker 1" class="w-full h-full object-cover"
                                        data-alt="A portrait of a warm, smiling middle-aged man with short hair, wearing a casual but professional blazer. He is looking directly at the camera with a gentle expression. The background is a soft, blurred studio setting with warm lighting, conveying approachability and wisdom."
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuC6WNR7PLTMkfei3I40enMCxG8u0DWvePykYE9TCPqwXkxBwbulh-8rWqfNe-f_SJ9oRkzPkne_aOji6tzgo3qP6zYJAKaynevbB8kUixwZmG-2AbdoB4d0xI6Us61mgE3flCHGnElyxS7eTUp62BVcsVaNI46Ub5Iz-kMDnTq9_0rqCLpuhySRRB4HMQQnJEQqiPQxrbWns25jVwnbn3mOrvFpKkg2PRfv4r83ffUWdGOX-qF8g-cnVtNdiypUpzgK0rZ-Up6uhIM" />
                                </div>
                                <div>
                                    <h3 class="font-label-md text-label-md text-primary font-bold">Bpk. Andreas Susanto
                                    </h3>
                                    <p class="font-label-sm-italic text-label-sm-italic text-on-surface-variant">
                                        Konselor Keluarga Senior</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 rounded-full overflow-hidden bg-surface-container">
                                    <img alt="Speaker 2" class="w-full h-full object-cover"
                                        data-alt="A portrait of a serene, middle-aged woman with shoulder-length hair, smiling softly. She is dressed in elegant, modest attire. The lighting is soft and diffused, highlighting her calm and nurturing demeanor. The background is minimally detailed to keep the focus on her face."
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuApVjARNUP6QPx_WIxjWFLHpKpOG0Alz5t0DnTvkc2BHqBAitNQllJmo_-NVLOkTrmgf6t3Pz2zsDrI3JFaIq_ctKggsV5BCXRK1xjuvkH1Wp9Am4uhH6Sk8kxWu3yGIwOYQ7GC6SV90VHRLO0JLQXZyZ5zw4YcKnTm3BDufBZxthfZxo7B47pBYcn1cxoBKlpwXCgUnXIqOhHdGRWj3kwnzVlchw0zTHxz7fejYajyRCWmk_TtmI9iemj5Usod8m0EttF30iC-hxE" />
                                </div>
                                <div>
                                    <h3 class="font-label-md text-label-md text-primary font-bold">Ibu Maria Susanto
                                    </h3>
                                    <p class="font-label-sm-italic text-label-sm-italic text-on-surface-variant">
                                        Praktisi Psikologi Anak</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Requirements & Share -->
                    <div class="bg-surface-white rounded-2xl p-8 ambient-shadow">
                        <h2 class="font-headline-md text-headline-md text-primary mb-6">Syarat Mengikuti</h2>
                        <ul
                            class="font-body-md text-body-md text-on-surface-variant space-y-3 mb-8 list-disc list-inside">
                            <li>Terbuka untuk umum, pasangan menikah maupun lajang.</li>
                            <li>Wajib mendaftar sebelum H-2 acara.</li>
                            <li>Diharapkan hadir 15 menit sebelum acara dimulai.</li>
                            <li>Membawa alat tulis (opsional).</li>
                        </ul>
                        <button
                            class="flex items-center gap-2 border border-outline text-primary font-label-md text-label-md px-6 py-3 rounded-full hover:bg-surface-container-low transition-colors duration-200">
                            <span class="material-symbols-outlined">share</span> Bagikan Kegiatan
                        </button>
                    </div>
                </div>
                <!-- Right Column (Sidebar) -->
                <div class="lg:col-span-4 relative">
                    <div class="sticky top-28 space-y-6">
                        <!-- Registration Card -->
                        <div class="bg-surface-white rounded-2xl p-6 ambient-shadow border border-surface-container">
                            <h3
                                class="font-headline-sm text-headline-sm text-primary mb-6 border-b border-surface-container pb-4">
                                Ringkasan Kegiatan</h3>
                            <div class="space-y-4 mb-8">
                                <div class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-secondary mt-0.5">calendar_month</span>
                                    <div>
                                        <p class="font-label-md text-label-md text-on-surface-variant">Tanggal</p>
                                        <p class="font-body-md text-body-md text-primary font-medium">Sabtu, 24 Agustus
                                            2024</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-secondary mt-0.5">schedule</span>
                                    <div>
                                        <p class="font-label-md text-label-md text-on-surface-variant">Waktu</p>
                                        <p class="font-body-md text-body-md text-primary font-medium">09:00 - 15:00 WIB
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-secondary mt-0.5">location_on</span>
                                    <div>
                                        <p class="font-label-md text-label-md text-on-surface-variant">Lokasi</p>
                                        <p class="font-body-md text-body-md text-primary font-medium">Aula Utama Digital
                                            Sanctuary</p>
                                        <p
                                            class="font-label-sm-italic text-label-sm-italic text-on-surface-variant mt-1">
                                            Jl. Damai Sejahtera No. 12, Jakarta</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-secondary mt-0.5">group</span>
                                    <div>
                                        <p class="font-label-md text-label-md text-on-surface-variant">Kuota</p>
                                        <div class="flex items-center gap-2 mt-1">
                                            <div
                                                class="w-full bg-surface-container h-2 rounded-full overflow-hidden flex-grow">
                                                <div class="bg-secondary h-full rounded-full" style="width: 75%"></div>
                                            </div>
                                            <span
                                                class="font-label-sm-italic text-label-sm-italic text-primary font-medium">75/100</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button
                                class="w-full bg-primary text-white font-label-md text-label-md py-4 rounded-xl hover:bg-primary-container transition-transform duration-150 active:scale-95 shadow-md">
                                Daftar Sebagai Peserta
                            </button>
                        </div>
                        <!-- Registration Form (Simulated Visibility) -->
                        <div class="bg-surface-white rounded-2xl p-6 ambient-shadow border-t-4 border-t-secondary">
                            <h3 class="font-headline-sm text-headline-sm text-primary mb-2">Formulir Pendaftaran</h3>
                            <p class="font-label-sm-italic text-label-sm-italic text-on-surface-variant mb-6">Lengkapi
                                data di bawah ini untuk mengonfirmasi kehadiran Anda.</p>
                            <form class="space-y-4">
                                <div>
                                    <label class="block font-label-md text-label-md text-primary mb-1">Nama
                                        Lengkap</label>
                                    <input
                                        class="w-full bg-surface border border-outline-variant rounded-lg px-4 py-2 font-body-md text-body-md text-on-surface focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition-colors disabled:opacity-70"
                                        disabled="" type="text" value="Budi Santoso" />
                                </div>
                                <div>
                                    <label class="block font-label-md text-label-md text-primary mb-1">Nomor
                                        WhatsApp</label>
                                    <input
                                        class="w-full bg-surface-white border border-outline-variant rounded-lg px-4 py-2 font-body-md text-body-md text-on-surface focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition-colors"
                                        placeholder="0812xxxxxx" type="tel" />
                                </div>
                                <div>
                                    <label class="block font-label-md text-label-md text-primary mb-1">Catatan
                                        (Opsional)</label>
                                    <textarea
                                        class="w-full bg-surface-white border border-outline-variant rounded-lg px-4 py-2 font-body-md text-body-md text-on-surface focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition-colors resize-none"
                                        placeholder="Ada kebutuhan khusus?" rows="3"></textarea>
                                </div>
                                <div class="flex items-start gap-2 pt-2">
                                    <input
                                        class="mt-1 w-4 h-4 text-secondary border-outline-variant rounded focus:ring-secondary/50"
                                        id="consent" type="checkbox" />
                                    <label
                                        class="font-label-sm-italic text-label-sm-italic text-on-surface-variant cursor-pointer"
                                        for="consent">
                                        Saya bersedia mematuhi aturan kegiatan dan bersedia dihubungi terkait acara ini.
                                    </label>
                                </div>
                                <button
                                    class="w-full mt-4 bg-secondary text-white font-label-md text-label-md py-3 rounded-xl hover:bg-secondary-container transition-transform duration-150 active:scale-95 shadow-md"
                                    type="button">
                                    Kirim Pendaftaran
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="w-full relative bg-primary mt-section-gap">
        <div
            class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-12 grid grid-cols-1 md:grid-cols-4 gap-gutter">
            <div class="md:col-span-1">
                <div class="font-headline-sm text-headline-sm font-bold text-white mb-4">Digital Sanctuary</div>
                <p class="font-label-sm-italic text-label-sm-italic text-on-primary/80">© 2024 Digital Sanctuary. All
                    Rights Reserved.</p>
            </div>
            <div class="md:col-span-3 flex flex-wrap gap-x-8 gap-y-4 md:justify-end">
                <a class="font-label-md text-label-md text-on-primary/80 hover:text-white transition-colors"
                    href="#">Visi &amp; Misi</a>
                <a class="font-label-md text-label-md text-on-primary/80 hover:text-white transition-colors"
                    href="#">Kebijakan Privasi</a>
                <a class="font-label-md text-label-md text-on-primary/80 hover:text-white transition-colors"
                    href="#">Syarat &amp; Ketentuan</a>
                <a class="font-label-md text-label-md text-on-primary/80 hover:text-white transition-colors"
                    href="#">Lokasi Kami</a>
            </div>
        </div>
    </footer>
</body>

</html>
