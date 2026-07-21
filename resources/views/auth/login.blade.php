<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        html.light body { background: #f4f7fc !important; color: #0f172a !important; }
        html.light #pageBackdrop {
            background: radial-gradient(circle at 15% 15%, rgba(37, 99, 235, .14), transparent 30%),
                        radial-gradient(circle at 85% 20%, rgba(14, 165, 233, .10), transparent 28%),
                        linear-gradient(180deg, #f8fbff 0%, #f3f7fc 100%) !important;
        }
        html.light .auth-panel { background: rgba(255, 255, 255, .88) !important; border-color: rgba(148, 163, 184, .25) !important; }
        html.light .text-white { color: #0f172a !important; }
        html.light .text-slate-200 { color: #334155 !important; }
        html.light .text-slate-300 { color: #475569 !important; }
        html.light .text-slate-400, html.light .text-slate-500 { color: #64748b !important; }
        html.light [class*="border-white/"] { border-color: rgba(148, 163, 184, .25) !important; }
        html.light [class*="bg-white/"] { background-color: rgba(248, 250, 252, .88) !important; }
        html.light .auth-input { background: #ffffff !important; color: #0f172a !important; border-color: #cbd5e1 !important; }
        html.light .auth-input::placeholder { color: #94a3b8 !important; }
    </style>
</head>
<body class="min-h-screen bg-[#07111f] font-sans text-slate-100 antialiased selection:bg-blue-500 selection:text-white">
    <div id="pageBackdrop" aria-hidden="true" class="pointer-events-none fixed inset-0 -z-20 bg-[radial-gradient(circle_at_15%_15%,_rgba(37,99,235,0.20),_transparent_30%),radial-gradient(circle_at_85%_20%,_rgba(14,165,233,0.12),_transparent_28%),linear-gradient(180deg,_#071426_0%,_#08111f_100%)]"></div>
    <div aria-hidden="true" class="auth-grid pointer-events-none fixed inset-0 -z-10"></div>

    <main class="mx-auto grid min-h-screen max-w-7xl items-center gap-12 px-5 py-10 sm:px-6 lg:grid-cols-[.95fr_1.05fr] lg:px-8">
        <section class="hidden lg:block">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-3" aria-label="Kembali ke Circle Suites">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-700 shadow-xl shadow-blue-950/30">
                    <i data-lucide="orbit" class="h-6 w-6 text-white"></i>
                </span>
                <span class="text-2xl font-bold tracking-[-0.04em] text-white">Circle<span class="text-sky-400">Suites</span></span>
            </a>

            <div class="mt-16 max-w-xl">
                <span class="inline-flex items-center gap-2 rounded-full border border-sky-300/20 bg-sky-400/10 px-4 py-2 text-xs font-semibold text-sky-300">
                    <i data-lucide="shield-check" class="h-4 w-4"></i>
                    Secure Digital Workspace
                </span>
                <h1 class="mt-6 text-5xl font-extrabold leading-[1.08] tracking-[-0.045em] text-white">Satu akses untuk seluruh aktivitas operasional.</h1>
                <p class="mt-6 text-base leading-8 text-slate-400">Masuk untuk mengelola proyek, inventaris, keuangan, pekerjaan lapangan, dan aktivitas divisi melalui satu sumber data yang terintegrasi.</p>

                <div class="mt-10 grid grid-cols-2 gap-4">
                    @foreach ([
                        ['Role-Based Access', 'shield-check'],
                        ['Real-Time Data', 'activity'],
                        ['Audit Activity', 'history'],
                        ['Integrated Modules', 'blocks'],
                    ] as [$label, $icon])
                        <div class="rounded-2xl border border-white/10 bg-white/[0.045] p-4 backdrop-blur">
                            <i data-lucide="{{ $icon }}" class="h-5 w-5 text-sky-400"></i>
                            <p class="mt-3 text-sm font-semibold text-slate-200">{{ $label }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="auth-panel mx-auto w-full max-w-lg rounded-[2rem] border border-white/10 bg-[#0b182a]/90 p-6 shadow-2xl shadow-black/20 backdrop-blur-xl sm:p-9">
            <div class="flex items-center justify-between">
                <a href="{{ url('/') }}" class="flex items-center gap-2 lg:hidden">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600 text-white"><i data-lucide="orbit" class="h-5 w-5"></i></span>
                    <span class="text-lg font-bold text-white">Circle<span class="text-sky-400">Suites</span></span>
                </a>

                <button id="themeToggle" type="button" class="ml-auto inline-flex h-11 w-11 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-white transition hover:bg-white/10" aria-label="Ubah tema">
                    <i data-lucide="sun" class="h-5 w-5"></i>
                </button>
            </div>

            <div class="mt-8">
                <p class="text-sm font-semibold text-sky-400">Selamat datang kembali</p>
                <h2 class="mt-2 text-3xl font-bold tracking-[-0.035em] text-white">Masuk ke akun Anda</h2>
                <p class="mt-3 text-sm leading-6 text-slate-400">Gunakan email perusahaan dan kata sandi yang telah terdaftar.</p>
            </div>

            @if (session('status'))
                <div class="mt-6 rounded-2xl border border-emerald-400/20 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-300">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mt-6 rounded-2xl border border-rose-400/20 bg-rose-400/10 px-4 py-3 text-sm text-rose-300">
                    <p class="font-semibold">Login belum berhasil.</p>
                    <ul class="mt-2 list-disc space-y-1 pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login.operator.post') }}" class="mt-7 space-y-5">
                @csrf

                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-slate-200">Email perusahaan</label>
                    <div class="relative">
                        <i data-lucide="mail" class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-500"></i>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="nama@perusahaan.com" class="auth-input w-full rounded-2xl border border-white/10 bg-white/[0.055] py-3.5 pl-11 pr-4 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-blue-400/60 focus:ring-4 focus:ring-blue-500/10">
                    </div>
                </div>

                <div>
                    <div class="mb-2 flex items-center justify-between gap-3">
                        <label for="password" class="block text-sm font-medium text-slate-200">Kata sandi</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs font-semibold text-sky-400 hover:text-sky-300">Lupa kata sandi?</a>
                        @endif
                    </div>
                    <div class="relative">
                        <i data-lucide="lock-keyhole" class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-500"></i>
                        <input id="password" name="password" type="password" required autocomplete="current-password" placeholder="Masukkan kata sandi" class="auth-input w-full rounded-2xl border border-white/10 bg-white/[0.055] py-3.5 pl-11 pr-12 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-blue-400/60 focus:ring-4 focus:ring-blue-500/10">
                        <button id="togglePassword" type="button" class="absolute right-3 top-1/2 inline-flex h-9 w-9 -translate-y-1/2 items-center justify-center rounded-xl text-slate-500 transition hover:bg-white/5 hover:text-slate-300" aria-label="Tampilkan kata sandi">
                            <i data-lucide="eye" class="h-4 w-4"></i>
                        </button>
                    </div>
                </div>

                <label class="flex cursor-pointer items-center gap-3 text-sm text-slate-400">
                    <input type="checkbox" name="remember" class="h-4 w-4 rounded border-slate-600 bg-transparent text-blue-600 focus:ring-blue-500">
                    Ingat saya di perangkat ini
                </label>

                <button type="submit" class="group flex w-full items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-3.5 text-sm font-semibold text-white shadow-xl shadow-blue-950/30 transition hover:-translate-y-0.5 hover:from-blue-400 hover:to-blue-500">
                    Masuk ke Sistem
                    <i data-lucide="arrow-right" class="h-4 w-4 transition-transform group-hover:translate-x-1"></i>
                </button>
            </form>

            <div class="my-7 flex items-center gap-4">
                <span class="h-px flex-1 bg-white/10"></span>
                <span class="text-xs text-slate-500">Belum memiliki akun?</span>
                <span class="h-px flex-1 bg-white/10"></span>
            </div>

            <a href="{{ url('/register') }}" class="flex w-full items-center justify-center gap-2 rounded-2xl border border-white/10 bg-white/5 px-6 py-3.5 text-sm font-semibold text-slate-200 transition hover:border-sky-400/30 hover:bg-white/10 hover:text-white">
                <i data-lucide="user-plus" class="h-4 w-4 text-sky-400"></i>
                Daftar Akun Divisi
            </a>

            <p class="mt-7 text-center text-xs leading-5 text-slate-500">Akses sistem dipantau dan dicatat untuk keamanan perusahaan.</p>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();

            const root = document.documentElement;
            const themeToggle = document.getElementById('themeToggle');
            const password = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');

            const refreshThemeButton = () => {
                const isLight = root.classList.contains('light');
                themeToggle.innerHTML = isLight ? '<i data-lucide="moon" class="h-5 w-5"></i>' : '<i data-lucide="sun" class="h-5 w-5"></i>';
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

            togglePassword.addEventListener('click', () => {
                const show = password.type === 'password';
                password.type = show ? 'text' : 'password';
                togglePassword.innerHTML = show ? '<i data-lucide="eye-off" class="h-4 w-4"></i>' : '<i data-lucide="eye" class="h-4 w-4"></i>';
                togglePassword.setAttribute('aria-label', show ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
                lucide.createIcons();
            });

            refreshThemeButton();
        });
    </script>
</body>
</html>