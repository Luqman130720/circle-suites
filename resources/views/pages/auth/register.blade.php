<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pendaftaran akun divisi Circle Suites.">
    <meta name="theme-color" content="#071426">
    <title>Daftar Akun — Circle Suites</title>

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
            background: rgba(255, 255, 255, .90) !important;
            border-color: rgba(148, 163, 184, .25) !important;
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

<body class="min-h-screen bg-[#07111f] font-sans text-slate-100 antialiased selection:bg-blue-500 selection:text-white">
    <div id="pageBackdrop" aria-hidden="true" class="pointer-events-none fixed inset-0 -z-20 bg-[radial-gradient(circle_at_15%_15%,_rgba(37,99,235,0.20),_transparent_30%),radial-gradient(circle_at_85%_20%,_rgba(14,165,233,0.12),_transparent_28%),linear-gradient(180deg,_#071426_0%,_#08111f_100%)]"></div>
    <div aria-hidden="true" class="auth-grid pointer-events-none fixed inset-0 -z-10"></div>

    <main class="mx-auto grid min-h-screen max-w-7xl items-start gap-12 px-5 py-8 sm:px-6 lg:grid-cols-[.82fr_1.18fr] lg:items-center lg:px-8 lg:py-12">
        <section class="hidden lg:block">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-3" aria-label="Kembali ke Circle Suites">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-700 shadow-xl shadow-blue-950/30">
                    <i data-lucide="orbit" class="h-6 w-6 text-white"></i>
                </span>
                <span class="text-2xl font-bold tracking-[-0.04em] text-white">Circle<span class="text-sky-400">Suites</span></span>
            </a>

            <div class="mt-14 max-w-lg">
                <span class="inline-flex items-center gap-2 rounded-full border border-sky-300/20 bg-sky-400/10 px-4 py-2 text-xs font-semibold text-sky-300">
                    <i data-lucide="building-2" class="h-4 w-4"></i>
                    Registration by Division
                </span>
                <h1 class="mt-6 text-5xl font-extrabold leading-[1.08] tracking-[-0.045em] text-white">Daftarkan akun sesuai divisi kerja.</h1>
                <p class="mt-6 text-base leading-8 text-slate-400">Pilih divisi yang benar agar proses verifikasi dan pemberian akses dapat dilakukan dengan tepat oleh administrator.</p>

                <div class="mt-9 rounded-3xl border border-amber-300/20 bg-amber-400/[0.08] p-5">
                    <div class="flex gap-3">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-400/15 text-amber-300"><i data-lucide="shield-alert" class="h-5 w-5"></i></span>
                        <div>
                            <p class="text-sm font-semibold text-white">Akun memerlukan persetujuan admin</p>
                            <p class="mt-1 text-xs leading-6 text-slate-400">Divisi dapat dipilih saat mendaftar, tetapi role dan permission sensitif tidak diberikan otomatis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="auth-panel mx-auto w-full max-w-2xl rounded-[2rem] border border-white/10 bg-[#0b182a]/90 p-6 shadow-2xl shadow-black/20 backdrop-blur-xl sm:p-9">
            <div class="flex items-center justify-between">
                <a href="{{ url('/') }}" class="flex items-center gap-2 lg:hidden">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600 text-white"><i data-lucide="orbit" class="h-5 w-5"></i></span>
                    <span class="text-lg font-bold text-white">Circle<span class="text-sky-400">Suites</span></span>
                </a>

                <button id="themeToggle" type="button" class="ml-auto inline-flex h-11 w-11 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-white transition hover:bg-white/10" aria-label="Ubah tema">
                    <i data-lucide="sun" class="h-5 w-5"></i>
                </button>
            </div>

            <div class="mt-7">
                <p class="text-sm font-semibold text-sky-400">Pendaftaran pengguna</p>
                <h2 class="mt-2 text-3xl font-bold tracking-[-0.035em] text-white">Buat akun Circle Suites</h2>
                <p class="mt-3 text-sm leading-6 text-slate-400">Lengkapi data berikut menggunakan identitas dan email aktif perusahaan.</p>
            </div>

            @if ($errors->any())
            <div class="mt-6 rounded-2xl border border-rose-400/20 bg-rose-400/10 px-4 py-3 text-sm text-rose-300">
                <p class="font-semibold">Data pendaftaran perlu diperiksa.</p>
                <ul class="mt-2 list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('login.register.post') }}" enctype="multipart/form-data" class="mt-7 space-y-5">
                @csrf

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium text-slate-200">
                            Nama lengkap
                        </label>

                        <div class="relative">
                            <i data-lucide="user"
                                class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-500"></i>

                            <input
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Nama lengkap"
                                class="auth-input w-full rounded-2xl border border-white/10 bg-white/[0.055] py-3.5 pl-11 pr-4 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-blue-400/60 focus:ring-4 focus:ring-blue-500/10">
                        </div>

                        @error('name')
                        <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="employee_id" class="mb-2 block text-sm font-medium text-slate-200">
                            ID Karyawan
                            <span class="text-xs text-slate-500">(opsional)</span>
                        </label>

                        <div class="relative">
                            <i data-lucide="badge"
                                class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-500"></i>

                            <input
                                id="employee_id"
                                name="employee_id"
                                type="text"
                                value="{{ old('employee_id') }}"
                                autocomplete="off"
                                placeholder="Contoh: EMP-001"
                                class="auth-input w-full rounded-2xl border border-white/10 bg-white/[0.055] py-3.5 pl-11 pr-4 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-blue-400/60 focus:ring-4 focus:ring-blue-500/10">
                        </div>

                        @error('employee_id')
                        <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-slate-200">
                        Email perusahaan
                    </label>

                    <div class="relative">
                        <i data-lucide="mail"
                            class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-500"></i>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            placeholder="nama@perusahaan.com"
                            class="auth-input w-full rounded-2xl border border-white/10 bg-white/[0.055] py-3.5 pl-11 pr-4 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-blue-400/60 focus:ring-4 focus:ring-blue-500/10">
                    </div>

                    @error('email')
                    <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="profile_photo" class="mb-2 block text-sm font-medium text-slate-200">
                        Foto profil
                        <span class="text-xs text-slate-500">(opsional)</span>
                    </label>

                    <div class="flex items-center gap-4 rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                        <div
                            id="profile-photo-preview"
                            class="flex h-16 w-16 shrink-0 items-center justify-center overflow-hidden rounded-2xl border border-white/10 bg-white/[0.055]">
                            <i data-lucide="user-round" class="h-7 w-7 text-slate-500"></i>
                        </div>

                        <div class="min-w-0 flex-1">
                            <label
                                for="profile_photo"
                                class="inline-flex cursor-pointer items-center gap-2 rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-white/10 hover:text-white">
                                <i data-lucide="upload" class="h-4 w-4"></i>
                                Pilih foto
                            </label>

                            <input
                                id="profile_photo"
                                name="profile_photo"
                                type="file"
                                accept="image/jpeg,image/png,image/webp"
                                class="hidden">

                            <p class="mt-2 text-xs text-slate-500">
                                JPG, PNG atau WebP. Maksimal 2 MB.
                            </p>
                        </div>
                    </div>

                    @error('profile_photo')
                    <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="division" class="mb-2 block text-sm font-medium text-slate-200">
                            Workspace / Divisi
                        </label>

                        <div class="relative">
                            <i data-lucide="building-2"
                                class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-500"></i>

                            <select
                                id="division"
                                name="division"
                                required
                                class="auth-input w-full appearance-none rounded-2xl border border-white/10 bg-white/[0.055] py-3.5 pl-11 pr-11 text-sm text-white outline-none transition focus:border-blue-400/60 focus:ring-4 focus:ring-blue-500/10">
                                <option value="" disabled {{ old('division') ? '' : 'selected' }}>
                                    Pilih workspace
                                </option>

                                <option value="Installer / Technician"
                                    @selected(old('division')==='Installer / Technician' )>
                                    Installer / Technician
                                </option>

                                <option value="Warehouse & Inventory"
                                    @selected(old('division')==='Warehouse & Inventory' )>
                                    Warehouse & Inventory
                                </option>

                                <option value="Sales & Marketing"
                                    @selected(old('division')==='Sales & Marketing' )>
                                    Sales & Marketing
                                </option>
                            </select>

                            <i data-lucide="chevron-down"
                                class="pointer-events-none absolute right-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-500"></i>
                        </div>

                        <p class="mt-2 text-xs text-slate-500">
                            Pilih workspace yang sesuai dengan bagian kerja kamu.
                        </p>

                        @error('division')
                        <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="position" class="mb-2 block text-sm font-medium text-slate-200">
                            Jabatan
                        </label>

                        <div class="relative">
                            <i data-lucide="briefcase-business"
                                class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-500"></i>

                            <select
                                id="position"
                                name="position"
                                required
                                disabled
                                class="auth-input w-full appearance-none rounded-2xl border border-white/10 bg-white/[0.055] py-3.5 pl-11 pr-11 text-sm text-white outline-none transition disabled:cursor-not-allowed disabled:opacity-50 focus:border-blue-400/60 focus:ring-4 focus:ring-blue-500/10">
                                <option value="" selected>
                                    Pilih workspace terlebih dahulu
                                </option>
                            </select>

                            <i data-lucide="chevron-down"
                                class="pointer-events-none absolute right-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-500"></i>
                        </div>

                        <p class="mt-2 text-xs text-slate-500">
                            Jabatan akan menyesuaikan workspace yang dipilih.
                        </p>

                        @error('position')
                        <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="password" class="mb-2 block text-sm font-medium text-slate-200">
                            Kata sandi
                        </label>

                        <div class="relative">
                            <i data-lucide="lock-keyhole"
                                class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-500"></i>

                            <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                autocomplete="new-password"
                                minlength="8"
                                placeholder="Minimal 8 karakter"
                                class="auth-input w-full rounded-2xl border border-white/10 bg-white/[0.055] py-3.5 pl-11 pr-12 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-blue-400/60 focus:ring-4 focus:ring-blue-500/10">

                            <button
                                type="button"
                                data-password-toggle="password"
                                class="absolute right-3 top-1/2 inline-flex h-9 w-9 -translate-y-1/2 items-center justify-center rounded-xl text-slate-500 transition hover:bg-white/5 hover:text-slate-300"
                                aria-label="Tampilkan kata sandi">
                                <i data-lucide="eye" class="h-4 w-4"></i>
                            </button>
                        </div>

                        @error('password')
                        <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="mb-2 block text-sm font-medium text-slate-200">
                            Konfirmasi kata sandi
                        </label>

                        <div class="relative">
                            <i data-lucide="shield-check"
                                class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-500"></i>

                            <input
                                id="password_confirmation"
                                name="password_confirmation"
                                type="password"
                                required
                                autocomplete="new-password"
                                minlength="8"
                                placeholder="Ulangi kata sandi"
                                class="auth-input w-full rounded-2xl border border-white/10 bg-white/[0.055] py-3.5 pl-11 pr-12 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-blue-400/60 focus:ring-4 focus:ring-blue-500/10">

                            <button
                                type="button"
                                data-password-toggle="password_confirmation"
                                class="absolute right-3 top-1/2 inline-flex h-9 w-9 -translate-y-1/2 items-center justify-center rounded-xl text-slate-500 transition hover:bg-white/5 hover:text-slate-300"
                                aria-label="Tampilkan konfirmasi kata sandi">
                                <i data-lucide="eye" class="h-4 w-4"></i>
                            </button>
                        </div>

                        @error('password_confirmation')
                        <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex gap-3 rounded-2xl border border-blue-400/10 bg-blue-500/[0.06] p-4">
                    <div class="mt-0.5 shrink-0">
                        <i data-lucide="info" class="h-4 w-4 text-blue-400"></i>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-slate-200">
                            Verifikasi akun
                        </p>

                        <p class="mt-1 text-xs leading-5 text-slate-500">
                            Setelah pendaftaran dikirim, akun akan menunggu verifikasi
                            administrator. Role dan hak akses akan ditentukan oleh
                            administrator setelah data diperiksa.
                        </p>
                    </div>
                </div>

                <label class="flex cursor-pointer items-start gap-3 text-sm leading-6 text-slate-400">
                    <input
                        type="checkbox"
                        name="terms"
                        value="1"
                        required
                        class="mt-1 h-4 w-4 rounded border-slate-600 bg-transparent text-blue-600 focus:ring-blue-500">

                    <span>
                        Saya menyatakan bahwa data yang saya isi benar dan memahami
                        bahwa akun baru harus diverifikasi oleh administrator.
                    </span>
                </label>

                @error('terms')
                <p class="-mt-3 text-xs text-red-400">{{ $message }}</p>
                @enderror

                <button
                    type="submit"
                    class="group flex w-full items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-3.5 text-sm font-semibold text-white shadow-xl shadow-blue-950/30 transition hover:-translate-y-0.5 hover:from-blue-400 hover:to-blue-500">
                    Kirim Pendaftaran

                    <i data-lucide="send"
                        class="h-4 w-4 transition-transform group-hover:translate-x-1"></i>
                </button>
            </form>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const divisionSelect = document.getElementById('division');
                    const positionSelect = document.getElementById('position');
                    const photoInput = document.getElementById('profile_photo');
                    const photoPreview = document.getElementById('profile-photo-preview');

                    const positionsByDivision = {
                        'Installer / Technician': [
                            'SPV Operasional',
                            'Technical',
                            'Installer'
                        ],

                        'Warehouse & Inventory': [
                            'Admin',
                            'Staff',
                            'Helper'
                        ],

                        'Sales & Marketing': [
                            'Marketing Project',
                            'Marketing Eksekutif'
                        ]
                    };

                    const oldPosition = @json(old('position'));

                    function updatePositions() {
                        const division = divisionSelect.value;
                        const positions = positionsByDivision[division] || [];

                        positionSelect.innerHTML = '';

                        if (positions.length === 0) {
                            const option = new Option(
                                'Pilih workspace terlebih dahulu',
                                ''
                            );

                            option.disabled = true;
                            option.selected = true;

                            positionSelect.appendChild(option);
                            positionSelect.disabled = true;

                            return;
                        }

                        const placeholder = new Option(
                            'Pilih jabatan',
                            ''
                        );

                        placeholder.disabled = true;
                        placeholder.selected = true;

                        positionSelect.appendChild(placeholder);

                        positions.forEach(function(position) {
                            const option = new Option(
                                position,
                                position
                            );

                            if (oldPosition === position) {
                                option.selected = true;
                            }

                            positionSelect.appendChild(option);
                        });

                        positionSelect.disabled = false;
                    }

                    divisionSelect.addEventListener('change', function() {
                        updatePositions();
                    });

                    if (divisionSelect.value) {
                        updatePositions();
                    }

                    photoInput?.addEventListener('change', function() {
                        const file = this.files[0];

                        if (!file) {
                            return;
                        }

                        if (!file.type.startsWith('image/')) {
                            this.value = '';
                            return;
                        }

                        const reader = new FileReader();

                        reader.onload = function(event) {
                            photoPreview.innerHTML = `
                    <img
                        src="${event.target.result}"
                        alt="Preview foto profil"
                        class="h-full w-full object-cover"
                    >
                `;
                        };

                        reader.readAsDataURL(file);
                    });
                });
            </script>

            <div class="my-7 flex items-center gap-4">
                <span class="h-px flex-1 bg-white/10"></span>
                <span class="text-xs text-slate-500">Sudah terdaftar?</span>
                <span class="h-px flex-1 bg-white/10"></span>
            </div>

            <a href="{{ url('/login') }}" class="flex w-full items-center justify-center gap-2 rounded-2xl border border-white/10 bg-white/5 px-6 py-3.5 text-sm font-semibold text-slate-200 transition hover:border-sky-400/30 hover:bg-white/10 hover:text-white">
                <i data-lucide="log-in" class="h-4 w-4 text-sky-400"></i>
                Kembali ke Login
            </a>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();

            const root = document.documentElement;
            const themeToggle = document.getElementById('themeToggle');

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

            document.querySelectorAll('[data-password-toggle]').forEach((button) => {
                button.addEventListener('click', () => {
                    const input = document.getElementById(button.dataset.passwordToggle);
                    const show = input.type === 'password';
                    input.type = show ? 'text' : 'password';
                    button.innerHTML = show ? '<i data-lucide="eye-off" class="h-4 w-4"></i>' : '<i data-lucide="eye" class="h-4 w-4"></i>';
                    button.setAttribute('aria-label', show ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
                    lucide.createIcons();
                });
            });

            refreshThemeButton();
        });
    </script>
</body>

</html>