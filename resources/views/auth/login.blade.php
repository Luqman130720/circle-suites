<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Masuk ke Circle Suites Digital Operations Platform.">
    <meta name="theme-color" content="#071426">
    <title>Masuk — Circle Suites</title>

    <script>
        (() => {
            const savedTheme = localStorage.getItem('circle-theme');
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = savedTheme || (systemPrefersDark ? 'dark' : 'light');
            document.documentElement.classList.toggle('light', theme === 'light');
            document.documentElement.classList.toggle('dark', theme === 'dark');
            document.documentElement.style.colorScheme = theme;
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        .auth-grid {
            background-image:
                linear-gradient(rgba(148, 163, 184, .055) 1px, transparent 1px),
                linear-gradient(90deg, rgba(148, 163, 184, .055) 1px, transparent 1px);
            background-size: 44px 44px;
            mask-image: linear-gradient(to bottom, black 10%, transparent 95%);
        }

        /* Support full height on mobile browsers */
        .min-h-dvh {
            min-height: 100dvh;
        }

        html.light body {
            background: #f4f7fc !important;
            color: #0f172a !important;
        }

        html.light #pageBackdrop {
            background: radial-gradient(circle at 15% 15%, rgba(37, 99, 235, .14), transparent 30%),
                radial-gradient(circle at 85% 20%, rgba(14, 165, 233, .10), transparent 28%),
                linear-gradient(180deg, #f8fbff 0%, #f3f7fc 100%) !important;
        }

        html.light .auth-panel {
            background: rgba(255, 255, 255, .95) !important;
            border-color: rgba(148, 163, 184, .25) !important;
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.05) !important;
        }

        html.light .text-white {
            color: #0f172a !important;
        }

        html.light .text-slate-200 {
            color: #334155 !important;
        }

        html.light .text-slate-300 {
            color: #475569 !important;
        }

        html.light .text-slate-400,
        html.light .text-slate-500 {
            color: #64748b !important;
        }

        html.light [class*="border-white/"] {
            border-color: rgba(148, 163, 184, .25) !important;
        }

        html.light [class*="bg-white/"] {
            background-color: rgba(248, 250, 252, .88) !important;
        }

        html.light .auth-input {
            background: #ffffff !important;
            color: #0f172a !important;
            border-color: #cbd5e1 !important;
        }

        html.light .auth-input::placeholder {
            color: #94a3b8 !important;
        }
    </style>
</head>

<body class="min-h-screen min-h-dvh bg-[#07111f] font-sans text-slate-100 antialiased selection:bg-blue-500 selection:text-white flex flex-col justify-center py-4 sm:py-8">
    <div id="pageBackdrop" aria-hidden="true" class="pointer-events-none fixed inset-0 -z-20 bg-[radial-gradient(circle_at_15%_15%,_rgba(37,99,235,0.20),_transparent_30%),radial-gradient(circle_at_85%_20%,_rgba(14,165,233,0.12),_transparent_28%),linear-gradient(180deg,_#071426_0%,_#08111f_100%)]"></div>
    <div aria-hidden="true" class="auth-grid pointer-events-none fixed inset-0 -z-10"></div>

    <main class="mx-auto w-full max-w-7xl px-3 sm:px-6 lg:px-10 my-auto">
        <div class="grid items-center gap-8 lg:grid-cols-[1.1fr_0.9fr] lg:gap-12">
            
            <!-- SECTION KIRI: Informasi Platform (Desktop & Tablet Wide) -->
            <section class="hidden lg:flex lg:flex-col lg:justify-center">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-3" aria-label="Kembali ke Circle Suites">
                    <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-700 shadow-lg shadow-blue-950/30">
                        <i data-lucide="orbit" class="h-5 w-5 text-white"></i>
                    </span>
                    <span class="text-2xl font-bold tracking-[-0.04em] text-white">Circle<span class="text-sky-400">Suites</span></span>
                </a>

                <div class="mt-8">
                    <span class="inline-flex items-center gap-2 rounded-full border border-sky-300/20 bg-sky-400/10 px-3.5 py-1.5 text-xs font-semibold text-sky-300">
                        <i data-lucide="shield-check" class="h-3.5 w-3.5"></i>
                        Secure Digital Workspace
                    </span>
                    <h1 class="mt-5 text-3xl font-extrabold leading-[1.15] tracking-[-0.04em] text-white xl:text-5xl">
                        Satu akses untuk seluruh aktivitas operasional.
                    </h1>
                    <p class="mt-4 max-w-lg text-sm leading-relaxed text-slate-400">
                        Masuk untuk mengelola proyek, inventaris, keuangan, pekerjaan lapangan, dan aktivitas divisi melalui satu sumber data yang terintegrasi.
                    </p>

                    <div class="mt-8 grid grid-cols-2 gap-3.5 max-w-lg">
                        @foreach ([
                        ['Role-Based Access', 'Akses aman sesuai peran divisi', 'shield-check'],
                        ['Real-Time Data', 'Sinkronisasi data seketika', 'activity'],
                        ['Audit Activity', 'Pencatatan log aktivitas lengkap', 'history'],
                        ['Integrated Modules', 'Ekosistem modul terhubung', 'blocks'],
                        ] as [$label, $desc, $icon])
                        <div class="rounded-xl border border-white/10 bg-white/[0.04] p-3.5 backdrop-blur transition hover:border-white/20">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-sky-400/10 text-sky-400">
                                <i data-lucide="{{ $icon }}" class="h-4 w-4"></i>
                            </div>
                            <p class="mt-2.5 text-xs font-semibold text-slate-200">{{ $label }}</p>
                            <p class="mt-0.5 text-[11px] text-slate-400 leading-tight">{{ $desc }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- SECTION KANAN: Panel Auth (Responsive Mobile to Desktop) -->
            <section class="auth-panel mx-auto w-full max-w-[420px] sm:max-w-md lg:max-w-md rounded-2xl sm:rounded-3xl border border-white/10 bg-[#0b182a]/90 p-4 sm:p-7 shadow-2xl shadow-black/30 backdrop-blur-xl transition-all duration-300">
                
                <!-- Header Panel -->
                <div class="flex items-center justify-between">
                    <a href="{{ url('/') }}" class="flex items-center gap-2 lg:hidden">
                        <span class="flex h-8 w-8 sm:h-9 sm:w-9 items-center justify-center rounded-xl bg-blue-600 text-white"><i data-lucide="orbit" class="h-4 w-4"></i></span>
                        <span class="text-sm sm:text-base font-bold text-white">Circle<span class="text-sky-400">Suites</span></span>
                    </a>

                    <button id="themeToggle" type="button" class="ml-auto inline-flex h-8 w-8 sm:h-9 sm:w-9 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-white transition hover:bg-white/10" aria-label="Ubah tema">
                        <i data-lucide="sun" class="h-4 w-4"></i>
                    </button>
                </div>

                <div class="mt-3 sm:mt-4">
                    <p class="text-[10px] sm:text-xs font-semibold uppercase tracking-wider text-sky-400">Selamat datang kembali</p>
                    <h2 class="mt-0.5 sm:mt-1 text-xl sm:text-2xl font-bold tracking-[-0.03em] text-white">Pilih Workspace</h2>
                    <p class="mt-0.5 sm:mt-1 text-[11px] sm:text-xs leading-normal sm:leading-5 text-slate-400">Pilih modul divisi Anda terlebih dahulu untuk menampilkan form login.</p>
                </div>

                @if (session('status'))
                <div class="mt-3 sm:mt-4 rounded-xl border border-emerald-400/20 bg-emerald-400/10 px-3 py-2 text-xs text-emerald-300">
                    {{ session('status') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="mt-3 sm:mt-4 rounded-xl border border-rose-400/20 bg-rose-400/10 px-3 py-2 text-xs text-rose-300">
                    <p class="font-semibold">Login belum berhasil.</p>
                    <ul class="mt-1 list-disc space-y-0.5 pl-4 text-[11px]">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Grid Selector Workspace (Optimized Layout) -->
                <div class="mt-3 sm:mt-4">
                    <div class="grid grid-cols-3 gap-1.5 sm:gap-2">
                        <!-- 1. Circle -->
                        <button type="button" onclick="selectWorkspace('circle', 'Circle', 'layout-grid', 'border-blue-500', 'bg-blue-500/10', 'text-blue-400')" 
                                class="ws-card group relative flex flex-col items-center justify-center rounded-xl border border-white/10 bg-white/[0.03] p-1.5 sm:p-2.5 text-center transition-all duration-200 hover:border-blue-500/50 hover:bg-white/[0.08]">
                            <div class="mb-1 flex h-6 w-6 sm:h-7 sm:w-7 items-center justify-center rounded-lg bg-blue-500/10 text-blue-400 transition-transform group-hover:scale-110">
                                <i data-lucide="layout-grid" class="h-3.5 w-3.5"></i>
                            </div>
                            <span class="text-[10px] sm:text-[11px] font-medium text-slate-200 group-hover:text-white leading-tight">Circle</span>
                            <span class="line-clamp-1 text-[8px] sm:text-[9px] text-slate-400 mt-0.5">Project & Ops</span>
                        </button>

                        <!-- 2. Inventory -->
                        <button type="button" onclick="selectWorkspace('inventory', 'Inventory', 'boxes', 'border-amber-500', 'bg-amber-500/10', 'text-amber-400')" 
                                class="ws-card group relative flex flex-col items-center justify-center rounded-xl border border-white/10 bg-white/[0.03] p-1.5 sm:p-2.5 text-center transition-all duration-200 hover:border-amber-500/50 hover:bg-white/[0.08]">
                            <div class="mb-1 flex h-6 w-6 sm:h-7 sm:w-7 items-center justify-center rounded-lg bg-amber-500/10 text-amber-400 transition-transform group-hover:scale-110">
                                <i data-lucide="boxes" class="h-3.5 w-3.5"></i>
                            </div>
                            <span class="text-[10px] sm:text-[11px] font-medium text-slate-200 group-hover:text-white leading-tight">Inventory</span>
                            <span class="line-clamp-1 text-[8px] sm:text-[9px] text-slate-400 mt-0.5">Warehouse</span>
                        </button>

                        <!-- 3. Finance -->
                        <button type="button" onclick="selectWorkspace('finance', 'Finance', 'wallet', 'border-emerald-500', 'bg-emerald-500/10', 'text-emerald-400')" 
                                class="ws-card group relative flex flex-col items-center justify-center rounded-xl border border-white/10 bg-white/[0.03] p-1.5 sm:p-2.5 text-center transition-all duration-200 hover:border-emerald-500/50 hover:bg-white/[0.08]">
                            <div class="mb-1 flex h-6 w-6 sm:h-7 sm:w-7 items-center justify-center rounded-lg bg-emerald-500/10 text-emerald-400 transition-transform group-hover:scale-110">
                                <i data-lucide="wallet" class="h-3.5 w-3.5"></i>
                            </div>
                            <span class="text-[10px] sm:text-[11px] font-medium text-slate-200 group-hover:text-white leading-tight">Finance</span>
                            <span class="line-clamp-1 text-[8px] sm:text-[9px] text-slate-400 mt-0.5">Control</span>
                        </button>

                        <!-- 4. Field Operations -->
                        <button type="button" onclick="selectWorkspace('field_ops', 'Field Operations', 'map-pin', 'border-purple-500', 'bg-purple-500/10', 'text-purple-400')" 
                                class="ws-card group relative flex flex-col items-center justify-center rounded-xl border border-white/10 bg-white/[0.03] p-1.5 sm:p-2.5 text-center transition-all duration-200 hover:border-purple-500/50 hover:bg-white/[0.08]">
                            <div class="mb-1 flex h-6 w-6 sm:h-7 sm:w-7 items-center justify-center rounded-lg bg-purple-500/10 text-purple-400 transition-transform group-hover:scale-110">
                                <i data-lucide="map-pin" class="h-3.5 w-3.5"></i>
                            </div>
                            <span class="text-[10px] sm:text-[11px] font-medium text-slate-200 group-hover:text-white leading-tight">Field Ops</span>
                            <span class="line-clamp-1 text-[8px] sm:text-[9px] text-slate-400 mt-0.5">Activity</span>
                        </button>

                        <!-- 5. Human Resources -->
                        <button type="button" onclick="selectWorkspace('hr', 'Human Resources', 'users', 'border-rose-500', 'bg-rose-500/10', 'text-rose-400')" 
                                class="ws-card group relative flex flex-col items-center justify-center rounded-xl border border-white/10 bg-white/[0.03] p-1.5 sm:p-2.5 text-center transition-all duration-200 hover:border-rose-500/50 hover:bg-white/[0.08]">
                            <div class="mb-1 flex h-6 w-6 sm:h-7 sm:w-7 items-center justify-center rounded-lg bg-rose-500/10 text-rose-400 transition-transform group-hover:scale-110">
                                <i data-lucide="users" class="h-3.5 w-3.5"></i>
                            </div>
                            <span class="text-[10px] sm:text-[11px] font-medium text-slate-200 group-hover:text-white leading-tight">HR</span>
                            <span class="line-clamp-1 text-[8px] sm:text-[9px] text-slate-400 mt-0.5">People</span>
                        </button>

                        <!-- 6. Marketing -->
                        <button type="button" onclick="selectWorkspace('marketing', 'Marketing', 'megaphone', 'border-cyan-500', 'bg-cyan-500/10', 'text-cyan-400')" 
                                class="ws-card group relative flex flex-col items-center justify-center rounded-xl border border-white/10 bg-white/[0.03] p-1.5 sm:p-2.5 text-center transition-all duration-200 hover:border-cyan-500/50 hover:bg-white/[0.08]">
                            <div class="mb-1 flex h-6 w-6 sm:h-7 sm:w-7 items-center justify-center rounded-lg bg-cyan-500/10 text-cyan-400 transition-transform group-hover:scale-110">
                                <i data-lucide="megaphone" class="h-3.5 w-3.5"></i>
                            </div>
                            <span class="text-[10px] sm:text-[11px] font-medium text-slate-200 group-hover:text-white leading-tight">Marketing</span>
                            <span class="line-clamp-1 text-[8px] sm:text-[9px] text-slate-400 mt-0.5">Growth</span>
                        </button>
                    </div>
                </div>

                <!-- Panel Form Login -->
                <div id="authFormContainer" class="hidden translate-y-3 opacity-0 transition-all duration-300 ease-out">
                    
                    <!-- Banner Workspace Ringkas -->
                    <div class="mt-3 flex items-center justify-between rounded-xl border border-white/10 bg-white/[0.04] p-2 px-3 backdrop-blur">
                        <div class="flex items-center gap-2">
                            <div id="bannerIconBg" class="flex h-6 w-6 sm:h-7 sm:w-7 items-center justify-center rounded-lg bg-blue-500/10 text-blue-400">
                                <i id="bannerIcon" data-lucide="layout-grid" class="h-3.5 w-3.5"></i>
                            </div>
                            <div>
                                <p class="text-[8px] font-semibold uppercase tracking-wider text-slate-400">Workspace Terpilih</p>
                                <h3 id="bannerTitle" class="text-xs font-bold text-white">Circle</h3>
                            </div>
                        </div>
                        <button type="button" onclick="resetWorkspaceSelection()" class="rounded-md p-1 text-slate-400 transition hover:bg-white/10 hover:text-white" title="Ganti workspace">
                            <i data-lucide="x" class="h-3.5 w-3.5"></i>
                        </button>
                    </div>

                    <form method="POST" action="{{ route('login.operator.post') }}" class="mt-3 space-y-2.5 sm:space-y-3">
                        @csrf
                        
                        <input type="hidden" id="selectedDivisionInput" name="division" value="circle">

                        <!-- Email -->
                        <div>
                            <label for="email" class="mb-1 block text-[11px] sm:text-xs font-medium text-slate-200">Email perusahaan</label>
                            <div class="relative">
                                <i data-lucide="mail" class="pointer-events-none absolute left-3 top-1/2 h-3.5 w-3.5 -translate-y-1/2 text-slate-500"></i>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username" placeholder="nama@perusahaan.com" class="auth-input w-full rounded-xl border border-white/10 bg-white/[0.055] py-2 sm:py-2.5 pl-9 pr-3 text-xs text-white outline-none transition placeholder:text-slate-600 focus:border-blue-400/60 focus:ring-2 focus:ring-blue-500/20">
                            </div>
                        </div>

                        <!-- Password -->
                        <div>
                            <div class="mb-1 flex items-center justify-between gap-2">
                                <label for="password" class="block text-[11px] sm:text-xs font-medium text-slate-200">Kata sandi</label>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-[10px] sm:text-[11px] font-semibold text-sky-400 hover:text-sky-300">Lupa?</a>
                                @endif
                            </div>
                            <div class="relative">
                                <i data-lucide="lock-keyhole" class="pointer-events-none absolute left-3 top-1/2 h-3.5 w-3.5 -translate-y-1/2 text-slate-500"></i>
                                <input id="password" name="password" type="password" required autocomplete="current-password" placeholder="Masukkan kata sandi" class="auth-input w-full rounded-xl border border-white/10 bg-white/[0.055] py-2 sm:py-2.5 pl-9 pr-9 text-xs text-white outline-none transition placeholder:text-slate-600 focus:border-blue-400/60 focus:ring-2 focus:ring-blue-500/20">
                                <button id="togglePassword" type="button" class="absolute right-2 top-1/2 inline-flex h-7 w-7 -translate-y-1/2 items-center justify-center rounded-lg text-slate-500 transition hover:bg-white/5 hover:text-slate-300" aria-label="Tampilkan kata sandi">
                                    <i data-lucide="eye" class="h-3.5 w-3.5"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-0.5">
                            <label class="flex cursor-pointer items-center gap-2 text-[11px] sm:text-xs text-slate-400">
                                <input type="checkbox" name="remember" class="h-3.5 w-3.5 rounded border-slate-600 bg-transparent text-blue-600 focus:ring-blue-500">
                                Ingat saya
                            </label>
                        </div>

                        <button type="submit" class="group flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-500 to-blue-600 px-4 py-2.5 text-xs font-semibold text-white shadow-lg shadow-blue-950/30 transition hover:from-blue-400 hover:to-blue-500">
                            <span id="btnSubmitText">Masuk ke Circle</span>
                            <i data-lucide="arrow-right" class="h-3.5 w-3.5 transition-transform group-hover:translate-x-1"></i>
                        </button>
                    </form>
                </div>

                <div class="my-3 sm:my-4 flex items-center gap-3">
                    <span class="h-px flex-1 bg-white/10"></span>
                    <span class="text-[9px] sm:text-[10px] text-slate-500">Belum memiliki akun?</span>
                    <span class="h-px flex-1 bg-white/10"></span>
                </div>

                <a href="{{ url('/register') }}" class="flex w-full items-center justify-center gap-2 rounded-xl border border-white/10 bg-white/5 px-4 py-2 sm:py-2.5 text-xs font-semibold text-slate-200 transition hover:border-sky-400/30 hover:bg-white/10 hover:text-white">
                    <i data-lucide="user-plus" class="h-3.5 w-3.5 text-sky-400"></i>
                    Daftar Akun Divisi
                </a>

                <p class="mt-3 sm:mt-4 text-center text-[9px] sm:text-[10px] text-slate-500">Akses sistem dipantau dan dicatat untuk keamanan perusahaan.</p>
            </section>
        </div>
    </main>

    <script>
        function selectWorkspace(val, title, iconName, borderClass, bgClass, textClass) {
            const cards = document.querySelectorAll('.ws-card');
            const authFormContainer = document.getElementById('authFormContainer');
            const bannerTitle = document.getElementById('bannerTitle');
            const bannerIcon = document.getElementById('bannerIcon');
            const bannerIconBg = document.getElementById('bannerIconBg');
            const btnSubmitText = document.getElementById('btnSubmitText');
            const selectedDivisionInput = document.getElementById('selectedDivisionInput');
            const emailInput = document.getElementById('email');

            cards.forEach(card => {
                card.classList.remove('ring-2', 'ring-blue-500', 'scale-[1.02]', 'opacity-100', 'border-blue-500');
                card.classList.add('opacity-40', 'scale-95');
            });

            const currentCard = event.currentTarget;
            currentCard.classList.remove('opacity-40', 'scale-95');
            currentCard.classList.add('opacity-100', 'scale-[1.02]', 'ring-2', 'ring-blue-500');

            bannerTitle.innerText = title;
            bannerIcon.setAttribute('data-lucide', iconName);
            bannerIconBg.className = `flex h-6 w-6 sm:h-7 sm:w-7 items-center justify-center rounded-lg ${bgClass} ${textClass}`;
            btnSubmitText.innerText = `Masuk ke ${title}`;
            selectedDivisionInput.value = val;

            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            if (authFormContainer.classList.contains('hidden')) {
                authFormContainer.classList.remove('hidden');
                setTimeout(() => {
                    authFormContainer.classList.remove('opacity-0', 'translate-y-3');
                    authFormContainer.classList.add('opacity-100', 'translate-y-0');
                }, 20);
            }

            setTimeout(() => {
                emailInput.focus();
            }, 100);
        }

        function resetWorkspaceSelection() {
            const cards = document.querySelectorAll('.ws-card');
            const authFormContainer = document.getElementById('authFormContainer');

            cards.forEach(card => {
                card.classList.remove('opacity-40', 'scale-95', 'ring-2', 'ring-blue-500', 'scale-[1.02]');
                card.classList.add('opacity-100');
            });

            authFormContainer.classList.remove('opacity-100', 'translate-y-0');
            authFormContainer.classList.add('opacity-0', 'translate-y-3');

            setTimeout(() => {
                authFormContainer.classList.add('hidden');
            }, 200);
        }

        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();

            const root = document.documentElement;
            const themeToggle = document.getElementById('themeToggle');
            const password = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');

            const refreshThemeButton = () => {
                const isLight = root.classList.contains('light');
                themeToggle.innerHTML = isLight ? '<i data-lucide="moon" class="h-4 w-4"></i>' : '<i data-lucide="sun" class="h-4 w-4"></i>';
                themeToggle.setAttribute('aria-label', isLight ? 'Aktifkan tema gelap' : 'Aktifkan tema terang');
                lucide.createIcons();
            };

            themeToggle.addEventListener('click', () => {
                const useLight = !root.classList.contains('light');
                root.classList.toggle('light', useLight);
                root.classList.toggle('dark', !useLight);
                root.style.colorScheme = useLight ? 'light' : 'dark';
                localStorage.setItem('circle-theme', useLight ? 'light' : 'dark');
                refreshThemeButton();
            });

            if (togglePassword && password) {
                togglePassword.addEventListener('click', () => {
                    const show = password.type === 'password';
                    password.type = show ? 'text' : 'password';
                    togglePassword.innerHTML = show ? '<i data-lucide="eye-off" class="h-3.5 w-3.5"></i>' : '<i data-lucide="eye" class="h-3.5 w-3.5"></i>';
                    togglePassword.setAttribute('aria-label', show ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
                    lucide.createIcons();
                });
            }

            refreshThemeButton();

            // @if ($errors->any())
            //     const firstCard = document.querySelector('.ws-card');
            //     if (firstCard) {
            //         firstCard.click();
            //     }
            // @endif
        });
    </script>
</body>

</html>