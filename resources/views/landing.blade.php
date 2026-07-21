<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Circle Suites adalah platform operasional digital terintegrasi untuk mengelola proyek, inventaris, keuangan, aktivitas lapangan, dan sumber daya manusia.">
    <meta name="theme-color" content="#071426">

    <title>Circle Suites — Digital Operations Platform</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        (() => {
            try {
                const savedTheme = localStorage.getItem('circle-suites-theme');
                const systemTheme = window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark';
                document.documentElement.dataset.theme = savedTheme || systemTheme;
            } catch (error) {
                document.documentElement.dataset.theme = 'dark';
            }
        })();
    </script>

    <script src="https://unpkg.com/lucide@latest" defer></script>

    <style>
        [data-cloak] { display: none !important; }

        .hero-grid {
            background-image:
                linear-gradient(rgba(148, 163, 184, 0.055) 1px, transparent 1px),
                linear-gradient(90deg, rgba(148, 163, 184, 0.055) 1px, transparent 1px);
            background-size: 48px 48px;
            mask-image: linear-gradient(to bottom, black 15%, transparent 90%);
        }

        .soft-glow {
            box-shadow:
                0 30px 90px rgba(37, 99, 235, 0.16),
                0 12px 30px rgba(15, 23, 42, 0.32);
        }

        .glass-card {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.095), rgba(255, 255, 255, 0.035));
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.08);
        }

        /* Theme switcher */
        html { color-scheme: dark; }
        html[data-theme="light"] { color-scheme: light; }

        body, header, section, footer, article, aside, nav, div, span, p, h1, h2, h3, h4, a, button {
            transition-property: color, background-color, border-color, box-shadow, opacity;
            transition-duration: 220ms;
            transition-timing-function: ease;
        }

        .theme-page-background {
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.17), transparent 34%),
                radial-gradient(circle at 85% 20%, rgba(14, 165, 233, 0.12), transparent 28%),
                linear-gradient(180deg, #071426 0%, #08111f 48%, #091321 100%);
        }

        html[data-theme="light"] .theme-page-background {
            background:
                radial-gradient(circle at top left, rgba(59, 130, 246, 0.14), transparent 34%),
                radial-gradient(circle at 85% 20%, rgba(14, 165, 233, 0.10), transparent 28%),
                linear-gradient(180deg, #f8fbff 0%, #f8fafc 52%, #eef5ff 100%);
        }

        html[data-theme="light"] body {
            background: #f8fafc !important;
            color: #0f172a !important;
        }

        html[data-theme="light"] .hero-grid {
            background-image:
                linear-gradient(rgba(71, 85, 105, 0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(71, 85, 105, 0.08) 1px, transparent 1px);
        }

        html[data-theme="light"] .soft-glow {
            box-shadow: 0 30px 90px rgba(37, 99, 235, 0.12), 0 12px 35px rgba(15, 23, 42, 0.10);
        }

        html[data-theme="light"] .glass-card {
            background: rgba(255, 255, 255, 0.90);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.9), 0 15px 35px rgba(15, 23, 42, 0.08);
        }

        /* Text utilities converted for light mode. Elements with .theme-keep-white remain white. */
        html[data-theme="light"] [class~="text-white"]:not(.theme-keep-white) { color: #0f172a !important; }
        html[data-theme="light"] [class~="text-slate-100"] { color: #1e293b !important; }
        html[data-theme="light"] [class~="text-slate-200"] { color: #334155 !important; }
        html[data-theme="light"] [class~="text-slate-300"] { color: #475569 !important; }
        html[data-theme="light"] [class~="text-slate-400"] { color: #64748b !important; }
        html[data-theme="light"] [class~="text-slate-500"] { color: #64748b !important; }
        html[data-theme="light"] [class~="hover:text-white"]:hover { color: #0f172a !important; }

        /* Borders */
        html[data-theme="light"] [class~="border-white/5"],
        html[data-theme="light"] [class~="border-white/10"],
        html[data-theme="light"] [class~="border-white/15"] { border-color: rgba(148, 163, 184, 0.28) !important; }

        /* Common translucent surfaces */
        html[data-theme="light"] [class~="bg-white/5"],
        html[data-theme="light"] [class~="bg-white/[0.035]"],
        html[data-theme="light"] [class~="bg-white/[0.045]"],
        html[data-theme="light"] [class~="bg-white/[0.055]"],
        html[data-theme="light"] [class~="bg-white/[0.065]"],
        html[data-theme="light"] [class~="bg-white/[0.07]"] {
            background-color: rgba(255, 255, 255, 0.82) !important;
        }

        html[data-theme="light"] [class~="bg-white/10"] { background-color: rgba(226, 232, 240, 0.72) !important; }
        html[data-theme="light"] [class~="hover:bg-white/5"]:hover,
        html[data-theme="light"] [class~="hover:bg-white/10"]:hover,
        html[data-theme="light"] [class~="hover:bg-white/[0.065]"]:hover,
        html[data-theme="light"] [class~="hover:bg-white/[0.07]"]:hover { background-color: #f1f5f9 !important; }

        /* Hard-coded dark surfaces */
        html[data-theme="light"] [class~="bg-[#071426]/70"],
        html[data-theme="light"] [class~="bg-[#071426]/90"],
        html[data-theme="light"] [class~="bg-[#081525]/95"],
        html[data-theme="light"] [class~="bg-[#0c1a2d]/90"] { background-color: rgba(255, 255, 255, 0.90) !important; }

        html[data-theme="light"] [class~="bg-[#0b1728]"],
        html[data-theme="light"] [class~="bg-[#0a1728]"] { background-color: #f8fafc !important; }

        html[data-theme="light"] [class~="bg-[#0a1728]/70"] { background-color: rgba(241, 245, 249, 0.82) !important; }
        html[data-theme="light"] [class~="bg-[#06101d]"] { background-color: #eef2f7 !important; }

        html[data-theme="light"] .theme-core-card {
            background: linear-gradient(135deg, #eff6ff 0%, #ffffff 55%, #f8fafc 100%) !important;
        }

        html[data-theme="light"] .theme-vision-card {
            background: linear-gradient(135deg, #dbeafe 0%, #f8fafc 55%, #e0e7ff 100%) !important;
        }

        html[data-theme="light"] #navbar.is-scrolled {
            background-color: rgba(255, 255, 255, 0.94) !important;
            box-shadow: 0 12px 32px rgba(15, 23, 42, 0.08);
        }

        html[data-theme="dark"] #navbar.is-scrolled {
            background-color: rgba(7, 20, 38, 0.90) !important;
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.10);
        }

        .theme-toggle-icon { display: none; }
        html[data-theme="dark"] .theme-icon-sun,
        html[data-theme="light"] .theme-icon-moon { display: inline-flex; }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                scroll-behavior: auto !important;
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>

<body class="min-h-screen overflow-x-hidden bg-[#07111f] font-sans text-slate-100 antialiased selection:bg-blue-500 selection:text-white">

    <!-- Decorative background -->
    <div aria-hidden="true" class="theme-page-background pointer-events-none fixed inset-0 -z-20"></div>

    <!-- Navbar -->
    <header id="navbar" class="fixed inset-x-0 top-0 z-50 border-b border-white/5 bg-[#071426]/70 backdrop-blur-xl transition-all duration-300">
        <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-5 sm:px-6 lg:px-8">
            <a href="#beranda" class="group flex items-center gap-3" aria-label="Circle Suites beranda">
                <span class="flex h-11 w-11 items-center justify-center rounded-2xl border border-blue-300/20 bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-700 shadow-lg shadow-blue-950/40 transition-transform duration-300 group-hover:scale-105">
                    <i data-lucide="orbit" class="theme-keep-white h-5 w-5 text-white"></i>
                </span>
                <span class="text-xl font-bold tracking-[-0.03em] text-white">
                    Circle<span class="text-sky-400">Suites</span>
                </span>
            </a>

            <nav class="hidden items-center gap-1 rounded-full border border-white/10 bg-white/[0.045] p-1.5 text-sm font-medium text-slate-300 md:flex" aria-label="Navigasi utama">
                <a href="#prinsip" class="rounded-full px-4 py-2 transition hover:bg-white/10 hover:text-white">Prinsip</a>
                <a href="#modul" class="rounded-full px-4 py-2 transition hover:bg-white/10 hover:text-white">Modul</a>
                <a href="#akses" class="rounded-full px-4 py-2 transition hover:bg-white/10 hover:text-white">Role Akses</a>
                <a href="#visi" class="rounded-full px-4 py-2 transition hover:bg-white/10 hover:text-white">Visi</a>
            </nav>

            <div class="flex items-center gap-2">
                <button
                    id="themeToggle"
                    type="button"
                    class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-white/10 bg-white/5 px-3 text-slate-200 shadow-sm transition hover:-translate-y-0.5 hover:bg-white/10 sm:px-4"
                    aria-label="Ubah tema tampilan"
                    title="Ubah tema tampilan"
                >
                    <span class="theme-toggle-icon theme-icon-sun" aria-hidden="true">
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="4"></circle>
                            <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"></path>
                        </svg>
                    </span>
                    <span class="theme-toggle-icon theme-icon-moon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z"></path>
                        </svg>
                    </span>
                    <span id="themeLabel" class="hidden text-sm font-semibold lg:inline">Tema terang</span>
                </button>

                <a href="{{ url('/login') }}" class="hidden items-center gap-2 rounded-xl bg-white px-5 py-2.5 text-sm font-semibold text-slate-900 shadow-lg shadow-black/10 transition hover:-translate-y-0.5 hover:bg-sky-50 sm:inline-flex">
                    Masuk Sistem
                    <i data-lucide="arrow-up-right" class="h-4 w-4"></i>
                </a>

                <button id="menuButton" type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-white transition hover:bg-white/10 md:hidden" aria-label="Buka menu" aria-expanded="false" aria-controls="mobileMenu">
                    <i data-lucide="menu" class="h-5 w-5"></i>
                </button>
            </div>
        </div>

        <div id="mobileMenu" data-cloak class="border-t border-white/10 bg-[#081525]/95 px-5 py-4 backdrop-blur-xl md:hidden">
            <nav class="mx-auto grid max-w-7xl gap-1 text-sm font-medium text-slate-300">
                <a href="#prinsip" class="rounded-xl px-4 py-3 hover:bg-white/5 hover:text-white">Prinsip Utama</a>
                <a href="#modul" class="rounded-xl px-4 py-3 hover:bg-white/5 hover:text-white">Modul Sistem</a>
                <a href="#akses" class="rounded-xl px-4 py-3 hover:bg-white/5 hover:text-white">Role Akses</a>
                <a href="#visi" class="rounded-xl px-4 py-3 hover:bg-white/5 hover:text-white">Visi Platform</a>
                <a href="{{ url('/login') }}" class="mt-2 flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 font-semibold text-slate-900">
                    Masuk Sistem
                    <i data-lucide="log-in" class="h-4 w-4"></i>
                </a>
            </nav>
        </div>
    </header>

    <main>
        <!-- Hero -->
        <section id="beranda" class="relative isolate overflow-hidden pb-24 pt-32 sm:pb-28 sm:pt-40 lg:pb-32 lg:pt-44">
            <div aria-hidden="true" class="hero-grid absolute inset-0 -z-10"></div>
            <div aria-hidden="true" class="absolute left-1/2 top-24 -z-10 h-80 w-80 -translate-x-1/2 rounded-full bg-blue-500/20 blur-[110px] sm:h-[30rem] sm:w-[30rem]"></div>

            <div class="mx-auto grid max-w-7xl items-center gap-14 px-5 sm:px-6 lg:grid-cols-[1.02fr_.98fr] lg:gap-16 lg:px-8">
                <div class="mx-auto max-w-2xl text-center lg:mx-0 lg:text-left">
                    <div class="mb-7 inline-flex items-center gap-2 rounded-full border border-sky-300/20 bg-sky-400/10 px-4 py-2 text-xs font-semibold tracking-wide text-sky-300 shadow-sm shadow-sky-950/20">
                        <span class="relative flex h-2.5 w-2.5">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-sky-400 opacity-60"></span>
                            <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-sky-300"></span>
                        </span>
                        Digital Operations Platform v1.1
                    </div>

                    <h1 class="text-4xl font-extrabold leading-[1.08] tracking-[-0.045em] text-white sm:text-6xl lg:text-7xl">
                        Operasional bisnis dalam
                        <span class="bg-gradient-to-r from-sky-300 via-blue-400 to-indigo-400 bg-clip-text text-transparent">satu ekosistem.</span>
                    </h1>

                    <p class="mx-auto mt-7 max-w-2xl text-base leading-8 text-slate-300 sm:text-lg lg:mx-0">
                        Satukan proyek, inventaris, keuangan, aktivitas lapangan, dan sumber daya manusia dalam alur kerja yang modern, terstruktur, serta mudah dipantau secara real-time.
                    </p>

                    <div class="mt-9 flex flex-col items-center justify-center gap-3 sm:flex-row lg:justify-start">
                        <a href="#modul" class="theme-keep-white group inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-blue-500 to-blue-600 px-7 py-3.5 text-sm font-semibold text-white shadow-xl shadow-blue-950/35 transition hover:-translate-y-0.5 hover:from-blue-400 hover:to-blue-500 sm:w-auto">
                            Jelajahi Modul
                            <i data-lucide="arrow-right" class="h-4 w-4 transition-transform group-hover:translate-x-1"></i>
                        </a>
                        <a href="#prinsip" class="inline-flex w-full items-center justify-center gap-2 rounded-2xl border border-white/15 bg-white/[0.065] px-7 py-3.5 text-sm font-semibold text-slate-100 backdrop-blur transition hover:-translate-y-0.5 hover:bg-white/10 sm:w-auto">
                            <i data-lucide="play-circle" class="h-4 w-4 text-sky-300"></i>
                            Pelajari Platform
                        </a>
                    </div>

                    <div class="mt-10 flex flex-wrap items-center justify-center gap-x-6 gap-y-3 text-xs font-medium text-slate-400 lg:justify-start">
                        <span class="inline-flex items-center gap-2"><i data-lucide="check-circle-2" class="h-4 w-4 text-emerald-400"></i> Modular Architecture</span>
                        <span class="inline-flex items-center gap-2"><i data-lucide="check-circle-2" class="h-4 w-4 text-emerald-400"></i> Role-Based Access</span>
                        <span class="inline-flex items-center gap-2"><i data-lucide="check-circle-2" class="h-4 w-4 text-emerald-400"></i> Audit Ready</span>
                    </div>
                </div>

                <!-- Dashboard preview -->
                <div class="relative mx-auto w-full max-w-2xl lg:mx-0">
                    <div aria-hidden="true" class="absolute -inset-5 rounded-[2rem] bg-gradient-to-r from-blue-500/20 via-sky-400/10 to-indigo-500/20 blur-2xl"></div>

                    <div class="soft-glow relative overflow-hidden rounded-[1.75rem] border border-white/15 bg-[#0c1a2d]/90 p-3 backdrop-blur-xl sm:p-4">
                        <div class="rounded-[1.35rem] border border-white/10 bg-[#0b1728]">
                            <div class="flex items-center justify-between border-b border-white/10 px-4 py-3 sm:px-5">
                                <div class="flex items-center gap-2">
                                    <span class="h-2.5 w-2.5 rounded-full bg-rose-400"></span>
                                    <span class="h-2.5 w-2.5 rounded-full bg-amber-300"></span>
                                    <span class="h-2.5 w-2.5 rounded-full bg-emerald-400"></span>
                                </div>
                                <div class="flex items-center gap-2 rounded-lg bg-white/5 px-3 py-1.5 text-[10px] text-slate-400">
                                    <i data-lucide="shield-check" class="h-3.5 w-3.5 text-emerald-400"></i>
                                    Secure Workspace
                                </div>
                            </div>

                            <div class="grid min-h-[380px] grid-cols-[68px_1fr] sm:grid-cols-[175px_1fr]">
                                <aside class="border-r border-white/10 p-3 sm:p-4">
                                    <div class="mb-6 flex items-center gap-2">
                                        <span class="theme-keep-white flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-blue-500 text-white">
                                            <i data-lucide="orbit" class="h-4 w-4"></i>
                                        </span>
                                        <span class="hidden text-xs font-bold text-white sm:block">Circle Suites</span>
                                    </div>

                                    <div class="space-y-2">
                                        <div class="flex items-center gap-2 rounded-xl bg-blue-500/15 p-2.5 text-blue-300">
                                            <i data-lucide="layout-dashboard" class="h-4 w-4 shrink-0"></i>
                                            <span class="hidden text-[11px] font-semibold sm:block">Dashboard</span>
                                        </div>
                                        <div class="flex items-center gap-2 rounded-xl p-2.5 text-slate-500">
                                            <i data-lucide="folder-kanban" class="h-4 w-4 shrink-0"></i>
                                            <span class="hidden text-[11px] sm:block">Projects</span>
                                        </div>
                                        <div class="flex items-center gap-2 rounded-xl p-2.5 text-slate-500">
                                            <i data-lucide="package" class="h-4 w-4 shrink-0"></i>
                                            <span class="hidden text-[11px] sm:block">Inventory</span>
                                        </div>
                                        <div class="flex items-center gap-2 rounded-xl p-2.5 text-slate-500">
                                            <i data-lucide="wallet-cards" class="h-4 w-4 shrink-0"></i>
                                            <span class="hidden text-[11px] sm:block">Finance</span>
                                        </div>
                                        <div class="flex items-center gap-2 rounded-xl p-2.5 text-slate-500">
                                            <i data-lucide="users" class="h-4 w-4 shrink-0"></i>
                                            <span class="hidden text-[11px] sm:block">Employees</span>
                                        </div>
                                    </div>
                                </aside>

                                <div class="min-w-0 p-4 sm:p-5">
                                    <div class="mb-5 flex items-start justify-between gap-3">
                                        <div>
                                            <p class="text-[10px] font-medium uppercase tracking-[0.16em] text-sky-400">Overview</p>
                                            <h2 class="mt-1 text-base font-bold text-white sm:text-lg">Operational Dashboard</h2>
                                        </div>
                                        <span class="hidden rounded-lg border border-white/10 bg-white/5 px-3 py-1.5 text-[10px] text-slate-400 sm:inline-flex">21 Jul 2026</span>
                                    </div>

                                    <div class="grid grid-cols-2 gap-3">
                                        <div class="rounded-2xl border border-white/10 bg-white/[0.055] p-3.5">
                                            <div class="flex items-center justify-between">
                                                <span class="text-[10px] text-slate-400">Active Projects</span>
                                                <i data-lucide="folder-kanban" class="h-3.5 w-3.5 text-sky-400"></i>
                                            </div>
                                            <p class="mt-3 text-2xl font-bold text-white">24</p>
                                            <p class="mt-1 text-[9px] text-emerald-400">+4 this month</p>
                                        </div>
                                        <div class="rounded-2xl border border-white/10 bg-white/[0.055] p-3.5">
                                            <div class="flex items-center justify-between">
                                                <span class="text-[10px] text-slate-400">Task Completion</span>
                                                <i data-lucide="circle-check-big" class="h-3.5 w-3.5 text-emerald-400"></i>
                                            </div>
                                            <p class="mt-3 text-2xl font-bold text-white">87%</p>
                                            <p class="mt-1 text-[9px] text-slate-500">Across all teams</p>
                                        </div>
                                    </div>

                                    <div class="mt-3 rounded-2xl border border-white/10 bg-white/[0.045] p-4">
                                        <div class="mb-4 flex items-center justify-between">
                                            <div>
                                                <p class="text-[10px] text-slate-400">Project Progress</p>
                                                <p class="mt-1 text-xs font-semibold text-white">Monthly performance</p>
                                            </div>
                                            <span class="rounded-lg bg-emerald-400/10 px-2 py-1 text-[9px] font-semibold text-emerald-400">On Track</span>
                                        </div>
                                        <div class="flex h-24 items-end gap-2">
                                            <span class="w-full rounded-t-md bg-blue-500/25" style="height: 38%"></span>
                                            <span class="w-full rounded-t-md bg-blue-500/35" style="height: 54%"></span>
                                            <span class="w-full rounded-t-md bg-blue-500/45" style="height: 43%"></span>
                                            <span class="w-full rounded-t-md bg-blue-500/60" style="height: 68%"></span>
                                            <span class="w-full rounded-t-md bg-blue-500/75" style="height: 78%"></span>
                                            <span class="w-full rounded-t-md bg-gradient-to-t from-blue-600 to-sky-400" style="height: 92%"></span>
                                        </div>
                                    </div>

                                    <div class="mt-3 flex items-center justify-between rounded-2xl border border-sky-400/15 bg-sky-400/[0.07] px-4 py-3">
                                        <div class="flex items-center gap-3">
                                            <span class="flex h-8 w-8 items-center justify-center rounded-xl bg-sky-400/10 text-sky-300">
                                                <i data-lucide="activity" class="h-4 w-4"></i>
                                            </span>
                                            <div>
                                                <p class="text-[10px] font-semibold text-white">Live Data Sync</p>
                                                <p class="text-[9px] text-slate-400">All modules connected</p>
                                            </div>
                                        </div>
                                        <span class="h-2 w-2 animate-pulse rounded-full bg-emerald-400"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="glass-card absolute -bottom-7 -left-3 hidden items-center gap-3 rounded-2xl border border-white/15 px-4 py-3 backdrop-blur-xl sm:flex lg:-left-8">
                        <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-400/15 text-emerald-300">
                            <i data-lucide="database-zap" class="h-4 w-4"></i>
                        </span>
                        <div>
                            <p class="text-xs font-semibold text-white">One Database</p>
                            <p class="text-[10px] text-slate-400">Data tersinkron otomatis</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Trust strip -->
        <section class="border-y border-white/10 bg-white/[0.035]">
            <div class="mx-auto grid max-w-7xl grid-cols-2 divide-x divide-y divide-white/10 px-5 sm:px-6 md:grid-cols-4 md:divide-y-0 lg:px-8">
                <div class="px-4 py-7 text-center">
                    <p class="text-xl font-bold text-white sm:text-2xl">One Platform</p>
                    <p class="mt-1 text-xs leading-5 text-slate-400">Seluruh aktivitas dalam satu aplikasi</p>
                </div>
                <div class="px-4 py-7 text-center">
                    <p class="text-xl font-bold text-white sm:text-2xl">One Database</p>
                    <p class="mt-1 text-xs leading-5 text-slate-400">Sumber data konsisten dan terpusat</p>
                </div>
                <div class="px-4 py-7 text-center">
                    <p class="text-xl font-bold text-white sm:text-2xl">One Workflow</p>
                    <p class="mt-1 text-xs leading-5 text-slate-400">Alur kerja jelas dan saling terhubung</p>
                </div>
                <div class="px-4 py-7 text-center">
                    <p class="text-xl font-bold text-white sm:text-2xl">Real-Time</p>
                    <p class="mt-1 text-xs leading-5 text-slate-400">Informasi operasional selalu tersedia</p>
                </div>
            </div>
        </section>

        <!-- Principles -->
        <section id="prinsip" class="relative py-24 sm:py-28">
            <div aria-hidden="true" class="absolute right-0 top-24 -z-10 h-72 w-72 rounded-full bg-indigo-500/10 blur-[100px]"></div>

            <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
                <div class="grid gap-12 lg:grid-cols-[.75fr_1.25fr] lg:items-end">
                    <div>
                        <span class="text-sm font-semibold uppercase tracking-[0.2em] text-sky-400">Fondasi Sistem</span>
                        <h2 class="mt-4 text-3xl font-bold tracking-[-0.035em] text-white sm:text-4xl">
                            Dibangun untuk bekerja lebih rapi, aman, dan terukur.
                        </h2>
                    </div>
                    <p class="max-w-2xl text-base leading-8 text-slate-400 lg:justify-self-end">
                        Setiap proses penting memiliki alur, hak akses, dan histori yang jelas. Circle Suites membantu tim bekerja menggunakan data yang sama tanpa kehilangan kontrol.
                    </p>
                </div>

                <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <article class="group rounded-3xl border border-white/10 bg-white/[0.045] p-6 transition duration-300 hover:-translate-y-1 hover:border-sky-400/30 hover:bg-white/[0.07]">
                        <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-500/15 text-blue-300">
                            <i data-lucide="workflow" class="h-5 w-5"></i>
                        </span>
                        <h3 class="mt-5 font-semibold text-white">Integrated Workflow</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-400">Proses antar divisi tersambung melalui alur kerja yang jelas.</p>
                    </article>

                    <article class="group rounded-3xl border border-white/10 bg-white/[0.045] p-6 transition duration-300 hover:-translate-y-1 hover:border-sky-400/30 hover:bg-white/[0.07]">
                        <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-violet-500/15 text-violet-300">
                            <i data-lucide="shield-check" class="h-5 w-5"></i>
                        </span>
                        <h3 class="mt-5 font-semibold text-white">Security First</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-400">Hak akses pengguna dibatasi sesuai peran dan tanggung jawab.</p>
                    </article>

                    <article class="group rounded-3xl border border-white/10 bg-white/[0.045] p-6 transition duration-300 hover:-translate-y-1 hover:border-sky-400/30 hover:bg-white/[0.07]">
                        <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-emerald-500/15 text-emerald-300">
                            <i data-lucide="history" class="h-5 w-5"></i>
                        </span>
                        <h3 class="mt-5 font-semibold text-white">Full Auditability</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-400">Aktivitas penting tercatat dan mudah ditelusuri kembali.</p>
                    </article>

                    <article class="group rounded-3xl border border-white/10 bg-white/[0.045] p-6 transition duration-300 hover:-translate-y-1 hover:border-sky-400/30 hover:bg-white/[0.07]">
                        <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-amber-500/15 text-amber-300">
                            <i data-lucide="blocks" class="h-5 w-5"></i>
                        </span>
                        <h3 class="mt-5 font-semibold text-white">Modular & Scalable</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-400">Modul baru dapat ditambahkan tanpa mengubah fondasi utama.</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- Modules -->
        <section id="modul" class="relative border-y border-white/10 bg-[#0a1728]/70 py-24 sm:py-28">
            <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <span class="text-sm font-semibold uppercase tracking-[0.2em] text-sky-400">Modular Ecosystem</span>
                    <h2 class="mt-4 text-3xl font-bold tracking-[-0.035em] text-white sm:text-5xl">Semua kebutuhan operasional, dalam satu platform.</h2>
                    <p class="mt-5 text-base leading-8 text-slate-400">Setiap modul dirancang untuk berdiri kuat secara mandiri, tetapi tetap terhubung menggunakan satu sumber data.</p>
                </div>

                <div class="mt-14 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Circle -->
                    <article class="theme-core-card group relative overflow-hidden rounded-[1.75rem] border border-blue-400/20 bg-gradient-to-br from-blue-500/[0.13] via-white/[0.055] to-white/[0.025] p-7 transition duration-300 hover:-translate-y-1.5 hover:border-blue-300/40">
                        <div aria-hidden="true" class="absolute -right-12 -top-12 h-32 w-32 rounded-full bg-blue-500/20 blur-3xl"></div>
                        <div class="relative">
                            <div class="flex items-start justify-between">
                                <span class="flex h-12 w-12 items-center justify-center rounded-2xl border border-blue-300/20 bg-blue-500/15 text-blue-300">
                                    <i data-lucide="folder-kanban" class="h-5 w-5"></i>
                                </span>
                                <span class="rounded-full border border-blue-300/20 bg-blue-400/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-wider text-blue-300">Core Module</span>
                            </div>
                            <h3 class="mt-6 text-xl font-semibold text-white">Circle</h3>
                            <p class="mt-1 text-xs font-semibold uppercase tracking-[0.14em] text-blue-300">Project & Operations</p>
                            <p class="mt-4 text-sm leading-7 text-slate-400">Kelola proyek, task, kalender, timeline, progress harian, meeting notes, dokumentasi, serta approval workflow.</p>
                            <div class="mt-6 flex flex-wrap gap-2 text-[11px] text-slate-300">
                                <span class="rounded-lg bg-white/5 px-2.5 py-1.5">Projects</span>
                                <span class="rounded-lg bg-white/5 px-2.5 py-1.5">Tasks</span>
                                <span class="rounded-lg bg-white/5 px-2.5 py-1.5">Timeline</span>
                            </div>
                        </div>
                    </article>

                    <!-- Inventory -->
                    <article class="group rounded-[1.75rem] border border-white/10 bg-white/[0.045] p-7 transition duration-300 hover:-translate-y-1.5 hover:border-emerald-300/30 hover:bg-white/[0.065]">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/15 text-emerald-300">
                            <i data-lucide="package-open" class="h-5 w-5"></i>
                        </span>
                        <h3 class="mt-6 text-xl font-semibold text-white">Inventory</h3>
                        <p class="mt-1 text-xs font-semibold uppercase tracking-[0.14em] text-emerald-300">Warehouse & Assets</p>
                        <p class="mt-4 text-sm leading-7 text-slate-400">Kelola master barang, supplier, gudang, mutasi, barang masuk dan keluar, stock opname, minimum stock, serta aset.</p>
                        <div class="mt-6 flex flex-wrap gap-2 text-[11px] text-slate-300">
                            <span class="rounded-lg bg-white/5 px-2.5 py-1.5">Stock</span>
                            <span class="rounded-lg bg-white/5 px-2.5 py-1.5">Warehouse</span>
                            <span class="rounded-lg bg-white/5 px-2.5 py-1.5">Assets</span>
                        </div>
                    </article>

                    <!-- Finance -->
                    <article class="group rounded-[1.75rem] border border-white/10 bg-white/[0.045] p-7 transition duration-300 hover:-translate-y-1.5 hover:border-amber-300/30 hover:bg-white/[0.065]">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-500/15 text-amber-300">
                            <i data-lucide="landmark" class="h-5 w-5"></i>
                        </span>
                        <h3 class="mt-6 text-xl font-semibold text-white">Finance</h3>
                        <p class="mt-1 text-xs font-semibold uppercase tracking-[0.14em] text-amber-300">Financial Control</p>
                        <p class="mt-4 text-sm leading-7 text-slate-400">Pantau modal, invoice, pembelian, penjualan, cash flow, pengeluaran, jasa, markup proyek, hutang, dan piutang.</p>
                        <div class="mt-6 flex flex-wrap gap-2 text-[11px] text-slate-300">
                            <span class="rounded-lg bg-white/5 px-2.5 py-1.5">Cash Flow</span>
                            <span class="rounded-lg bg-white/5 px-2.5 py-1.5">Invoice</span>
                            <span class="rounded-lg bg-white/5 px-2.5 py-1.5">Reports</span>
                        </div>
                    </article>

                    <!-- Field Operations -->
                    <article class="group rounded-[1.75rem] border border-white/10 bg-white/[0.045] p-7 transition duration-300 hover:-translate-y-1.5 hover:border-cyan-300/30 hover:bg-white/[0.065]">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-cyan-500/15 text-cyan-300">
                            <i data-lucide="map-pinned" class="h-5 w-5"></i>
                        </span>
                        <h3 class="mt-6 text-xl font-semibold text-white">Field Operations</h3>
                        <p class="mt-1 text-xs font-semibold uppercase tracking-[0.14em] text-cyan-300">Field Activity</p>
                        <p class="mt-4 text-sm leading-7 text-slate-400">Dukung laporan kerja harian, checklist, dokumentasi, GPS, QR Code, digital form, daily score, dan reward point.</p>
                        <div class="mt-6 flex flex-wrap gap-2 text-[11px] text-slate-300">
                            <span class="rounded-lg bg-white/5 px-2.5 py-1.5">GPS</span>
                            <span class="rounded-lg bg-white/5 px-2.5 py-1.5">Checklist</span>
                            <span class="rounded-lg bg-white/5 px-2.5 py-1.5">QR Code</span>
                        </div>
                    </article>

                    <!-- HR -->
                    <article class="group rounded-[1.75rem] border border-white/10 bg-white/[0.045] p-7 transition duration-300 hover:-translate-y-1.5 hover:border-violet-300/30 hover:bg-white/[0.065]">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-violet-500/15 text-violet-300">
                            <i data-lucide="users-round" class="h-5 w-5"></i>
                        </span>
                        <h3 class="mt-6 text-xl font-semibold text-white">Human Resources</h3>
                        <p class="mt-1 text-xs font-semibold uppercase tracking-[0.14em] text-violet-300">People & Productivity</p>
                        <p class="mt-4 text-sm leading-7 text-slate-400">Kelola kehadiran, lembur, jadwal piket, cuti, profil karyawan, KPI, performa, dan riwayat aktivitas.</p>
                        <div class="mt-6 flex flex-wrap gap-2 text-[11px] text-slate-300">
                            <span class="rounded-lg bg-white/5 px-2.5 py-1.5">Attendance</span>
                            <span class="rounded-lg bg-white/5 px-2.5 py-1.5">KPI</span>
                            <span class="rounded-lg bg-white/5 px-2.5 py-1.5">Performance</span>
                        </div>
                    </article>

                    <!-- Dashboard -->
                    <article class="group rounded-[1.75rem] border border-white/10 bg-white/[0.045] p-7 transition duration-300 hover:-translate-y-1.5 hover:border-rose-300/30 hover:bg-white/[0.065]">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-rose-500/15 text-rose-300">
                            <i data-lucide="chart-no-axes-combined" class="h-5 w-5"></i>
                        </span>
                        <h3 class="mt-6 text-xl font-semibold text-white">Dashboard & Reports</h3>
                        <p class="mt-1 text-xs font-semibold uppercase tracking-[0.14em] text-rose-300">Operational Intelligence</p>
                        <p class="mt-4 text-sm leading-7 text-slate-400">Sajikan informasi yang relevan sesuai peran pengguna melalui dashboard, laporan terpadu, dan activity log.</p>
                        <div class="mt-6 flex flex-wrap gap-2 text-[11px] text-slate-300">
                            <span class="rounded-lg bg-white/5 px-2.5 py-1.5">Analytics</span>
                            <span class="rounded-lg bg-white/5 px-2.5 py-1.5">Audit Log</span>
                            <span class="rounded-lg bg-white/5 px-2.5 py-1.5">Real-Time</span>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Access -->
        <section id="akses" class="py-24 sm:py-28">
            <div class="mx-auto grid max-w-7xl items-center gap-14 px-5 sm:px-6 lg:grid-cols-2 lg:px-8">
                <div>
                    <span class="text-sm font-semibold uppercase tracking-[0.2em] text-sky-400">Role-Based Access Control</span>
                    <h2 class="mt-4 text-3xl font-bold tracking-[-0.035em] text-white sm:text-4xl">Tampilan dan akses yang relevan untuk setiap peran.</h2>
                    <p class="mt-5 max-w-xl text-base leading-8 text-slate-400">Setiap pengguna hanya melihat menu, data, dan tindakan yang sesuai dengan tanggung jawabnya. Sistem menjadi lebih aman tanpa menghambat produktivitas.</p>

                    <div class="mt-8 grid gap-3 sm:grid-cols-2">
                        @foreach ([
                            ['Director', 'crown'],
                            ['Operational Manager', 'briefcase-business'],
                            ['Technical Supervisor', 'wrench'],
                            ['Finance', 'badge-dollar-sign'],
                            ['Warehouse Admin', 'warehouse'],
                            ['Installer / Technician', 'hard-hat'],
                        ] as [$role, $icon])
                            <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/[0.045] px-4 py-3.5">
                                <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-sky-400/10 text-sky-300">
                                    <i data-lucide="{{ $icon }}" class="h-4 w-4"></i>
                                </span>
                                <span class="text-sm font-medium text-slate-200">{{ $role }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="relative">
                    <div aria-hidden="true" class="absolute inset-10 -z-10 rounded-full bg-blue-500/15 blur-[100px]"></div>
                    <div class="rounded-[2rem] border border-white/10 bg-white/[0.045] p-5 shadow-2xl shadow-black/20 backdrop-blur sm:p-7">
                        <div class="flex items-center justify-between border-b border-white/10 pb-5">
                            <div>
                                <p class="text-sm font-semibold text-white">Access Management</p>
                                <p class="mt-1 text-xs text-slate-500">Permission overview</p>
                            </div>
                            <span class="rounded-full bg-emerald-400/10 px-3 py-1.5 text-[10px] font-semibold text-emerald-400">Protected</span>
                        </div>

                        <div class="mt-5 space-y-3">
                            <div class="grid grid-cols-[1fr_repeat(3,52px)] items-center gap-2 rounded-xl px-3 text-[10px] font-semibold uppercase tracking-wider text-slate-500">
                                <span>Module</span>
                                <span class="text-center">View</span>
                                <span class="text-center">Edit</span>
                                <span class="text-center">Approve</span>
                            </div>

                            @foreach ([
                                ['Project Management', true, true, true],
                                ['Inventory', true, true, false],
                                ['Finance', true, false, false],
                                ['Human Resources', true, false, false],
                            ] as [$module, $view, $edit, $approve])
                                <div class="grid grid-cols-[1fr_repeat(3,52px)] items-center gap-2 rounded-2xl border border-white/10 bg-[#0a1728] px-3 py-3.5">
                                    <span class="truncate text-xs font-medium text-slate-200">{{ $module }}</span>
                                    @foreach ([$view, $edit, $approve] as $allowed)
                                        <span class="flex justify-center">
                                            @if ($allowed)
                                                <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-emerald-400/10 text-emerald-400"><i data-lucide="check" class="h-3.5 w-3.5"></i></span>
                                            @else
                                                <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-white/5 text-slate-600"><i data-lucide="minus" class="h-3.5 w-3.5"></i></span>
                                            @endif
                                        </span>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Vision / CTA -->
        <section id="visi" class="pb-24 sm:pb-28">
            <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
                <div class="theme-vision-card relative overflow-hidden rounded-[2rem] border border-sky-300/15 bg-gradient-to-br from-blue-600/25 via-[#0c1d34] to-indigo-600/15 px-6 py-14 text-center shadow-2xl shadow-blue-950/20 sm:px-12 sm:py-16">
                    <div aria-hidden="true" class="absolute -left-16 -top-20 h-72 w-72 rounded-full bg-blue-500/20 blur-[100px]"></div>
                    <div aria-hidden="true" class="absolute -bottom-24 -right-16 h-72 w-72 rounded-full bg-indigo-500/20 blur-[100px]"></div>
                    <div aria-hidden="true" class="hero-grid absolute inset-0 opacity-40"></div>

                    <div class="relative mx-auto max-w-3xl">
                        <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/[0.07] px-4 py-2 text-xs font-semibold text-sky-200">
                            <i data-lucide="rocket" class="h-4 w-4"></i>
                            Built for Continuous Growth
                        </span>
                        <h2 class="mt-6 text-3xl font-bold tracking-[-0.04em] text-white sm:text-5xl">Fondasi digital untuk operasional perusahaan yang terus berkembang.</h2>
                        <p class="mx-auto mt-5 max-w-2xl text-base leading-8 text-slate-300">Circle Suites disiapkan untuk berkembang menuju CRM, procurement, maintenance, helpdesk, customer portal, mobile application, dan integrasi API.</p>
                        <a href="{{ url('/login') }}" class="group mt-9 inline-flex items-center justify-center gap-2 rounded-2xl bg-white px-7 py-3.5 text-sm font-semibold text-slate-900 shadow-xl transition hover:-translate-y-0.5 hover:bg-sky-50">
                            Mulai Menggunakan Circle Suites
                            <i data-lucide="arrow-up-right" class="h-4 w-4 transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="border-t border-white/10 bg-[#06101d]">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-5 px-5 py-8 text-center sm:px-6 md:flex-row md:text-left lg:px-8">
            <div class="flex items-center gap-3">
                <span class="theme-keep-white flex h-9 w-9 items-center justify-center rounded-xl bg-blue-600 text-white">
                    <i data-lucide="orbit" class="h-4 w-4"></i>
                </span>
                <div>
                    <p class="text-sm font-semibold text-white">Circle Suites</p>
                    <p class="text-xs text-slate-500">Digital Operations Platform</p>
                </div>
            </div>

            <p class="text-xs text-slate-500">&copy; {{ date('Y') }} Circle Suites v1.1. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const renderLucideIcons = () => {
                if (window.lucide && typeof window.lucide.createIcons === 'function') {
                    window.lucide.createIcons();
                }
            };

            renderLucideIcons();

            const root = document.documentElement;
            const themeMeta = document.querySelector('meta[name="theme-color"]');
            const themeToggle = document.getElementById('themeToggle');
            const themeLabel = document.getElementById('themeLabel');
            const navbar = document.getElementById('navbar');
            const menuButton = document.getElementById('menuButton');
            const mobileMenu = document.getElementById('mobileMenu');

            const updateThemeControl = (theme) => {
                const nextTheme = theme === 'dark' ? 'light' : 'dark';
                themeLabel.textContent = theme === 'dark' ? 'Tema terang' : 'Tema gelap';
                themeToggle.setAttribute('aria-label', `Aktifkan tema ${nextTheme === 'light' ? 'terang' : 'gelap'}`);
                themeToggle.setAttribute('title', `Aktifkan tema ${nextTheme === 'light' ? 'terang' : 'gelap'}`);
                themeMeta?.setAttribute('content', theme === 'dark' ? '#071426' : '#f8fafc');
            };

            const applyTheme = (theme, persist = true) => {
                const normalizedTheme = theme === 'light' ? 'light' : 'dark';
                root.dataset.theme = normalizedTheme;
                updateThemeControl(normalizedTheme);

                if (persist) {
                    try {
                        localStorage.setItem('circle-suites-theme', normalizedTheme);
                    } catch (error) {
                        console.warn('Preferensi tema tidak dapat disimpan.', error);
                    }
                }
            };

            applyTheme(root.dataset.theme || 'dark', false);

            themeToggle?.addEventListener('click', () => {
                applyTheme(root.dataset.theme === 'dark' ? 'light' : 'dark');
            });

            if (mobileMenu && menuButton) {
                const mobileLinks = mobileMenu.querySelectorAll('a');
                mobileMenu.removeAttribute('data-cloak');
                mobileMenu.classList.add('hidden');

                const setMenuIcon = (icon) => {
                    menuButton.innerHTML = `<i data-lucide="${icon}" class="h-5 w-5"></i>`;
                    renderLucideIcons();
                };

                const closeMenu = () => {
                    mobileMenu.classList.add('hidden');
                    menuButton.setAttribute('aria-expanded', 'false');
                    setMenuIcon('menu');
                };

                menuButton.addEventListener('click', () => {
                    const isOpen = !mobileMenu.classList.contains('hidden');
                    mobileMenu.classList.toggle('hidden');
                    menuButton.setAttribute('aria-expanded', String(!isOpen));
                    setMenuIcon(isOpen ? 'menu' : 'x');
                });

                mobileLinks.forEach((link) => link.addEventListener('click', closeMenu));
            }

            const updateNavbar = () => {
                navbar?.classList.toggle('is-scrolled', window.scrollY > 24);
            };

            updateNavbar();
            window.addEventListener('scroll', updateNavbar, { passive: true });
        });
    </script>
</body>
</html>