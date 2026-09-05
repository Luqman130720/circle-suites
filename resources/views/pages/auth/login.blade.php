<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="description"
        content="Masuk ke Circle Suites Digital Operations Platform.">

    <meta name="theme-color"
        content="#071426">

    <title>Masuk — Circle Suites</title>

    {{-- =========================================================
    | Theme Initialization
    ========================================================== --}}
    <script>
        (() => {

            const savedTheme =
                localStorage.getItem('circle-theme');

            const systemPrefersDark =
                window.matchMedia(
                    '(prefers-color-scheme: dark)'
                ).matches;

            const theme =
                savedTheme ||
                (systemPrefersDark ? 'dark' : 'light');

            document.documentElement.classList.toggle(
                'light',
                theme === 'light'
            );

            document.documentElement.classList.toggle(
                'dark',
                theme === 'dark'
            );

            document.documentElement.style.colorScheme =
                theme;

        })();
    </script>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <script src="https://unpkg.com/lucide@latest"></script>

    <style>

        /* =====================================================
        | Background Grid
        ====================================================== */

        .auth-grid {
            background-image:
                linear-gradient(
                    rgba(148, 163, 184, .055) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(148, 163, 184, .055) 1px,
                    transparent 1px
                );

            background-size: 44px 44px;

            mask-image:
                linear-gradient(
                    to bottom,
                    black 10%,
                    transparent 95%
                );
        }


        /* =====================================================
        | Mobile Height
        ====================================================== */

        .min-h-dvh {
            min-height: 100dvh;
        }


        /* =====================================================
        | LIGHT MODE
        ====================================================== */

        html.light body {
            background: #f4f7fc !important;
            color: #0f172a !important;
        }

        html.light #pageBackdrop {
            background:
                radial-gradient(
                    circle at 15% 15%,
                    rgba(37, 99, 235, .14),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 85% 20%,
                    rgba(14, 165, 233, .10),
                    transparent 28%
                ),
                linear-gradient(
                    180deg,
                    #f8fbff 0%,
                    #f3f7fc 100%
                ) !important;
        }

        html.light .auth-panel {
            background: rgba(255, 255, 255, .95) !important;
            border-color: rgba(148, 163, 184, .25) !important;
            box-shadow:
                0 20px 40px -15px
                rgba(0, 0, 0, .05) !important;
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
            border-color:
                rgba(148, 163, 184, .25) !important;
        }

        html.light [class*="bg-white/"] {
            background-color:
                rgba(248, 250, 252, .88) !important;
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


<body
    class="min-h-screen min-h-dvh
    bg-[#07111f]
    font-sans
    text-slate-100
    antialiased
    selection:bg-blue-500
    selection:text-white
    flex
    flex-col
    justify-center
    py-4
    sm:py-8">


    {{-- =========================================================
    | BACKGROUND
    ========================================================== --}}

    <div
        id="pageBackdrop"
        aria-hidden="true"
        class="pointer-events-none fixed inset-0 -z-20
        bg-[radial-gradient(circle_at_15%_15%,_rgba(37,99,235,0.20),_transparent_30%),radial-gradient(circle_at_85%_20%,_rgba(14,165,233,0.12),_transparent_28%),linear-gradient(180deg,_#071426_0%,_#08111f_100%)]">
    </div>


    <div
        aria-hidden="true"
        class="auth-grid pointer-events-none fixed inset-0 -z-10">
    </div>



    {{-- =========================================================
    | MAIN
    ========================================================== --}}

    <main
        class="mx-auto
        w-full
        max-w-7xl
        px-3
        sm:px-6
        lg:px-10
        my-auto">


        <div
            class="grid
            items-center
            gap-8
            lg:grid-cols-[1.1fr_0.9fr]
            lg:gap-12">


            {{-- =================================================
            | LEFT INFORMATION
            ================================================== --}}

            <section
                class="hidden
                lg:flex
                lg:flex-col
                lg:justify-center">


                {{-- Logo --}}

                <a
                    href="{{ url('/') }}"
                    class="inline-flex items-center gap-3"
                    aria-label="Kembali ke Circle Suites">

                    <span
                        class="flex
                        h-11
                        w-11
                        items-center
                        justify-center
                        rounded-2xl
                        bg-gradient-to-br
                        from-blue-500
                        via-blue-600
                        to-indigo-700
                        shadow-lg
                        shadow-blue-950/30">

                        <i
                            data-lucide="orbit"
                            class="h-5 w-5 text-white">
                        </i>

                    </span>


                    <span
                        class="text-2xl
                        font-bold
                        tracking-[-0.04em]
                        text-white">

                        Circle<span class="text-sky-400">
                            Suites
                        </span>

                    </span>

                </a>


                {{-- Description --}}

                <div class="mt-8">

                    <span
                        class="inline-flex
                        items-center
                        gap-2
                        rounded-full
                        border
                        border-sky-300/20
                        bg-sky-400/10
                        px-3.5
                        py-1.5
                        text-xs
                        font-semibold
                        text-sky-300">

                        <i
                            data-lucide="shield-check"
                            class="h-3.5 w-3.5">
                        </i>

                        Secure Digital Workspace

                    </span>


                    <h1
                        class="mt-5
                        text-3xl
                        font-extrabold
                        leading-[1.15]
                        tracking-[-0.04em]
                        text-white
                        xl:text-5xl">

                        Satu akses untuk seluruh
                        aktivitas operasional.

                    </h1>


                    <p
                        class="mt-4
                        max-w-lg
                        text-sm
                        leading-relaxed
                        text-slate-400">

                        Masuk untuk mengelola proyek,
                        inventaris, keuangan, pekerjaan
                        lapangan, dan aktivitas divisi
                        melalui satu sumber data yang
                        terintegrasi.

                    </p>


                    {{-- Feature Cards --}}

                    <div
                        class="mt-8
                        grid
                        max-w-lg
                        grid-cols-2
                        gap-3.5">

                        @foreach ([
                            [
                                'Role-Based Access',
                                'Akses aman sesuai peran divisi',
                                'shield-check'
                            ],
                            [
                                'Real-Time Data',
                                'Sinkronisasi data seketika',
                                'activity'
                            ],
                            [
                                'Audit Activity',
                                'Pencatatan log aktivitas lengkap',
                                'history'
                            ],
                            [
                                'Integrated Modules',
                                'Ekosistem modul terhubung',
                                'blocks'
                            ],
                        ] as [$label, $desc, $icon])

                            <div
                                class="rounded-xl
                                border
                                border-white/10
                                bg-white/[0.04]
                                p-3.5
                                backdrop-blur
                                transition
                                hover:border-white/20">

                                <div
                                    class="flex
                                    h-8
                                    w-8
                                    items-center
                                    justify-center
                                    rounded-lg
                                    bg-sky-400/10
                                    text-sky-400">

                                    <i
                                        data-lucide="{{ $icon }}"
                                        class="h-4 w-4">
                                    </i>

                                </div>


                                <p
                                    class="mt-2.5
                                    text-xs
                                    font-semibold
                                    text-slate-200">

                                    {{ $label }}

                                </p>


                                <p
                                    class="mt-0.5
                                    text-[11px]
                                    leading-tight
                                    text-slate-400">

                                    {{ $desc }}

                                </p>

                            </div>

                        @endforeach

                    </div>

                </div>

            </section>



            {{-- =================================================
            | AUTH PANEL
            ================================================== --}}

            <section
                class="auth-panel
                mx-auto
                w-full
                max-w-[420px]
                rounded-2xl
                border
                border-white/10
                bg-[#0b182a]/90
                p-4
                shadow-2xl
                shadow-black/30
                backdrop-blur-xl
                transition-all
                duration-300
                sm:max-w-md
                sm:rounded-3xl
                sm:p-7">


                {{-- Panel Header --}}

                <div
                    class="flex
                    items-center
                    justify-between">


                    {{-- Mobile Logo --}}

                    <a
                        href="{{ url('/') }}"
                        class="flex items-center gap-2 lg:hidden">

                        <span
                            class="flex
                            h-8
                            w-8
                            items-center
                            justify-center
                            rounded-xl
                            bg-blue-600
                            text-white">

                            <i
                                data-lucide="orbit"
                                class="h-4 w-4">
                            </i>

                        </span>


                        <span
                            class="text-sm
                            font-bold
                            text-white">

                            Circle<span class="text-sky-400">
                                Suites
                            </span>

                        </span>

                    </a>


                    {{-- Theme --}}

                    <button
                        id="themeToggle"
                        type="button"
                        class="ml-auto
                        inline-flex
                        h-8
                        w-8
                        items-center
                        justify-center
                        rounded-xl
                        border
                        border-white/10
                        bg-white/5
                        text-white
                        transition
                        hover:bg-white/10"
                        aria-label="Ubah tema">

                        <i
                            data-lucide="sun"
                            class="h-4 w-4">
                        </i>

                    </button>

                </div>



                {{-- Panel Title --}}

                <div class="mt-3 sm:mt-4">

                    <p
                        class="text-[10px]
                        font-semibold
                        uppercase
                        tracking-wider
                        text-sky-400
                        sm:text-xs">

                        Selamat datang kembali

                    </p>


                    <h2
                        class="mt-0.5
                        text-xl
                        font-bold
                        tracking-[-0.03em]
                        text-white
                        sm:mt-1
                        sm:text-2xl">

                        Pilih Workspace

                    </h2>


                    <p
                        class="mt-0.5
                        text-[11px]
                        leading-normal
                        text-slate-400
                        sm:mt-1
                        sm:text-xs
                        sm:leading-5">

                        Pilih modul divisi Anda terlebih
                        dahulu untuk menampilkan form login.

                    </p>

                </div>



                {{-- =================================================
                | SESSION STATUS
                ================================================== --}}

                @if (session('status'))

                    <div
                        class="mt-3
                        rounded-xl
                        border
                        border-emerald-400/20
                        bg-emerald-400/10
                        px-3
                        py-2
                        text-xs
                        text-emerald-300
                        sm:mt-4">

                        {{ session('status') }}

                    </div>

                @endif



                {{-- =================================================
                | VALIDATION ERRORS
                ================================================== --}}

                @if ($errors->any())

                    <div
                        class="mt-3
                        rounded-xl
                        border
                        border-rose-400/20
                        bg-rose-400/10
                        px-3
                        py-2
                        text-xs
                        text-rose-300
                        sm:mt-4">

                        <p class="font-semibold">
                            Login belum berhasil.
                        </p>


                        <ul
                            class="mt-1
                            list-disc
                            space-y-0.5
                            pl-4
                            text-[11px]">

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif



                {{-- =================================================
                | WORKSPACE SELECTOR
                ================================================== --}}

                <div class="mt-3 sm:mt-4">

                    <div
                        class="grid
                        grid-cols-3
                        gap-1.5
                        sm:gap-2">


                        {{-- Circle --}}

                        <button
                            type="button"
                            data-workspace="circle"
                            onclick="selectWorkspace(
                                this,
                                'circle',
                                'Circle',
                                'layout-grid',
                                'border-blue-500',
                                'bg-blue-500/10',
                                'text-blue-400'
                            )"
                            class="ws-card
                            group
                            relative
                            flex
                            flex-col
                            items-center
                            justify-center
                            rounded-xl
                            border
                            border-white/10
                            bg-white/[0.03]
                            p-1.5
                            text-center
                            transition-all
                            duration-200
                            hover:border-blue-500/50
                            hover:bg-white/[0.08]
                            sm:p-2.5">

                            <div
                                class="mb-1
                                flex
                                h-6
                                w-6
                                items-center
                                justify-center
                                rounded-lg
                                bg-blue-500/10
                                text-blue-400
                                transition-transform
                                group-hover:scale-110
                                sm:h-7
                                sm:w-7">

                                <i
                                    data-lucide="layout-grid"
                                    class="h-3.5 w-3.5">
                                </i>

                            </div>


                            <span
                                class="text-[10px]
                                font-medium
                                leading-tight
                                text-slate-200
                                group-hover:text-white
                                sm:text-[11px]">

                                Circle

                            </span>


                            <span
                                class="mt-0.5
                                line-clamp-1
                                text-[8px]
                                text-slate-400
                                sm:text-[9px]">

                                Project & Ops

                            </span>

                        </button>



                        {{-- Inventory --}}

                        <button
                            type="button"
                            data-workspace="inventory"
                            onclick="selectWorkspace(
                                this,
                                'inventory',
                                'Inventory',
                                'boxes',
                                'border-amber-500',
                                'bg-amber-500/10',
                                'text-amber-400'
                            )"
                            class="ws-card
                            group
                            relative
                            flex
                            flex-col
                            items-center
                            justify-center
                            rounded-xl
                            border
                            border-white/10
                            bg-white/[0.03]
                            p-1.5
                            text-center
                            transition-all
                            duration-200
                            hover:border-amber-500/50
                            hover:bg-white/[0.08]
                            sm:p-2.5">

                            <div
                                class="mb-1
                                flex
                                h-6
                                w-6
                                items-center
                                justify-center
                                rounded-lg
                                bg-amber-500/10
                                text-amber-400
                                transition-transform
                                group-hover:scale-110
                                sm:h-7
                                sm:w-7">

                                <i
                                    data-lucide="boxes"
                                    class="h-3.5 w-3.5">
                                </i>

                            </div>


                            <span
                                class="text-[10px]
                                font-medium
                                leading-tight
                                text-slate-200
                                group-hover:text-white
                                sm:text-[11px]">

                                Inventory

                            </span>


                            <span
                                class="mt-0.5
                                line-clamp-1
                                text-[8px]
                                text-slate-400
                                sm:text-[9px]">

                                Warehouse

                            </span>

                        </button>



                        {{-- Finance --}}

                        <button
                            type="button"
                            data-workspace="finance"
                            onclick="selectWorkspace(
                                this,
                                'finance',
                                'Finance',
                                'wallet',
                                'border-emerald-500',
                                'bg-emerald-500/10',
                                'text-emerald-400'
                            )"
                            class="ws-card
                            group
                            relative
                            flex
                            flex-col
                            items-center
                            justify-center
                            rounded-xl
                            border
                            border-white/10
                            bg-white/[0.03]
                            p-1.5
                            text-center
                            transition-all
                            duration-200
                            hover:border-emerald-500/50
                            hover:bg-white/[0.08]
                            sm:p-2.5">

                            <div
                                class="mb-1
                                flex
                                h-6
                                w-6
                                items-center
                                justify-center
                                rounded-lg
                                bg-emerald-500/10
                                text-emerald-400
                                transition-transform
                                group-hover:scale-110
                                sm:h-7
                                sm:w-7">

                                <i
                                    data-lucide="wallet"
                                    class="h-3.5 w-3.5">
                                </i>

                            </div>


                            <span
                                class="text-[10px]
                                font-medium
                                leading-tight
                                text-slate-200
                                group-hover:text-white
                                sm:text-[11px]">

                                Finance

                            </span>


                            <span
                                class="mt-0.5
                                line-clamp-1
                                text-[8px]
                                text-slate-400
                                sm:text-[9px]">

                                Control

                            </span>

                        </button>



                        {{-- Field Operations --}}

                        <button
                            type="button"
                            data-workspace="field-ops"
                            onclick="selectWorkspace(
                                this,
                                'field-ops',
                                'Field Operations',
                                'map-pin',
                                'border-purple-500',
                                'bg-purple-500/10',
                                'text-purple-400'
                            )"
                            class="ws-card
                            group
                            relative
                            flex
                            flex-col
                            items-center
                            justify-center
                            rounded-xl
                            border
                            border-white/10
                            bg-white/[0.03]
                            p-1.5
                            text-center
                            transition-all
                            duration-200
                            hover:border-purple-500/50
                            hover:bg-white/[0.08]
                            sm:p-2.5">

                            <div
                                class="mb-1
                                flex
                                h-6
                                w-6
                                items-center
                                justify-center
                                rounded-lg
                                bg-purple-500/10
                                text-purple-400
                                transition-transform
                                group-hover:scale-110
                                sm:h-7
                                sm:w-7">

                                <i
                                    data-lucide="map-pin"
                                    class="h-3.5 w-3.5">
                                </i>

                            </div>


                            <span
                                class="text-[10px]
                                font-medium
                                leading-tight
                                text-slate-200
                                group-hover:text-white
                                sm:text-[11px]">

                                Field Ops

                            </span>


                            <span
                                class="mt-0.5
                                line-clamp-1
                                text-[8px]
                                text-slate-400
                                sm:text-[9px]">

                                Activity

                            </span>

                        </button>



                        {{-- HR --}}

                        <button
                            type="button"
                            data-workspace="hr"
                            onclick="selectWorkspace(
                                this,
                                'hr',
                                'Human Resources',
                                'users',
                                'border-rose-500',
                                'bg-rose-500/10',
                                'text-rose-400'
                            )"
                            class="ws-card
                            group
                            relative
                            flex
                            flex-col
                            items-center
                            justify-center
                            rounded-xl
                            border
                            border-white/10
                            bg-white/[0.03]
                            p-1.5
                            text-center
                            transition-all
                            duration-200
                            hover:border-rose-500/50
                            hover:bg-white/[0.08]
                            sm:p-2.5">

                            <div
                                class="mb-1
                                flex
                                h-6
                                w-6
                                items-center
                                justify-center
                                rounded-lg
                                bg-rose-500/10
                                text-rose-400
                                transition-transform
                                group-hover:scale-110
                                sm:h-7
                                sm:w-7">

                                <i
                                    data-lucide="users"
                                    class="h-3.5 w-3.5">
                                </i>

                            </div>


                            <span
                                class="text-[10px]
                                font-medium
                                leading-tight
                                text-slate-200
                                group-hover:text-white
                                sm:text-[11px]">

                                HR

                            </span>


                            <span
                                class="mt-0.5
                                line-clamp-1
                                text-[8px]
                                text-slate-400
                                sm:text-[9px]">

                                People

                            </span>

                        </button>



                        {{-- Marketing --}}

                        <button
                            type="button"
                            data-workspace="marketing"
                            onclick="selectWorkspace(
                                this,
                                'marketing',
                                'Marketing',
                                'megaphone',
                                'border-cyan-500',
                                'bg-cyan-500/10',
                                'text-cyan-400'
                            )"
                            class="ws-card
                            group
                            relative
                            flex
                            flex-col
                            items-center
                            justify-center
                            rounded-xl
                            border
                            border-white/10
                            bg-white/[0.03]
                            p-1.5
                            text-center
                            transition-all
                            duration-200
                            hover:border-cyan-500/50
                            hover:bg-white/[0.08]
                            sm:p-2.5">

                            <div
                                class="mb-1
                                flex
                                h-6
                                w-6
                                items-center
                                justify-center
                                rounded-lg
                                bg-cyan-500/10
                                text-cyan-400
                                transition-transform
                                group-hover:scale-110
                                sm:h-7
                                sm:w-7">

                                <i
                                    data-lucide="megaphone"
                                    class="h-3.5 w-3.5">
                                </i>

                            </div>


                            <span
                                class="text-[10px]
                                font-medium
                                leading-tight
                                text-slate-200
                                group-hover:text-white
                                sm:text-[11px]">

                                Marketing

                            </span>


                            <span
                                class="mt-0.5
                                line-clamp-1
                                text-[8px]
                                text-slate-400
                                sm:text-[9px]">

                                Growth

                            </span>

                        </button>

                    </div>

                </div>



                {{-- =================================================
                | LOGIN FORM
                ================================================== --}}

                <div
                    id="authFormContainer"
                    class="hidden
                    translate-y-3
                    opacity-0
                    transition-all
                    duration-300
                    ease-out">


                    {{-- Selected Workspace Banner --}}

                    <div
                        class="mt-3
                        flex
                        items-center
                        justify-between
                        rounded-xl
                        border
                        border-white/10
                        bg-white/[0.04]
                        p-2
                        px-3
                        backdrop-blur">


                        <div
                            class="flex items-center gap-2">


                            <div
                                id="bannerIconBg"
                                class="flex
                                h-6
                                w-6
                                items-center
                                justify-center
                                rounded-lg
                                bg-blue-500/10
                                text-blue-400
                                sm:h-7
                                sm:w-7">

                                <i
                                    id="bannerIcon"
                                    data-lucide="layout-grid"
                                    class="h-3.5 w-3.5">
                                </i>

                            </div>


                            <div>

                                <p
                                    class="text-[8px]
                                    font-semibold
                                    uppercase
                                    tracking-wider
                                    text-slate-400">

                                    Workspace Terpilih

                                </p>


                                <h3
                                    id="bannerTitle"
                                    class="text-xs
                                    font-bold
                                    text-white">

                                    Circle

                                </h3>

                            </div>

                        </div>


                        <button
                            type="button"
                            onclick="resetWorkspaceSelection()"
                            class="rounded-md
                            p-1
                            text-slate-400
                            transition
                            hover:bg-white/10
                            hover:text-white"
                            title="Ganti workspace">

                            <i
                                data-lucide="x"
                                class="h-3.5 w-3.5">
                            </i>

                        </button>

                    </div>



                    {{-- Login Form --}}

                    <form
                        method="POST"
                        action="{{ route('login.operator.post') }}"
                        class="mt-3 space-y-2.5 sm:space-y-3">

                        @csrf


                        {{-- Workspace --}}

                        <input
                            type="hidden"
                            id="selectedWorkspaceInput"
                            name="workspace"
                            value="{{ old('workspace') }}">


                        {{-- Email --}}

                        <div>

                            <label
                                for="email"
                                class="mb-1 block text-[11px] font-medium text-slate-200 sm:text-xs">

                                Email perusahaan

                            </label>


                            <div class="relative">

                                <i
                                    data-lucide="mail"
                                    class="pointer-events-none
                                    absolute
                                    left-3
                                    top-1/2
                                    h-3.5
                                    w-3.5
                                    -translate-y-1/2
                                    text-slate-500">
                                </i>


                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="username"
                                    placeholder="nama@perusahaan.com"
                                    class="auth-input
                                    w-full
                                    rounded-xl
                                    border
                                    border-white/10
                                    bg-white/[0.055]
                                    py-2
                                    pl-9
                                    pr-3
                                    text-xs
                                    text-white
                                    outline-none
                                    transition
                                    placeholder:text-slate-600
                                    focus:border-blue-400/60
                                    focus:ring-2
                                    focus:ring-blue-500/20
                                    sm:py-2.5">

                            </div>


                            @error('email')

                                <p
                                    class="mt-1 text-[10px] text-rose-400">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>



                        {{-- Password --}}

                        <div>

                            <label
                                for="password"
                                class="mb-1 block text-[11px] font-medium text-slate-200 sm:text-xs">

                                Kata sandi

                            </label>


                            <div class="relative">

                                <i
                                    data-lucide="lock-keyhole"
                                    class="pointer-events-none
                                    absolute
                                    left-3
                                    top-1/2
                                    h-3.5
                                    w-3.5
                                    -translate-y-1/2
                                    text-slate-500">
                                </i>


                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Masukkan kata sandi"
                                    class="auth-input
                                    w-full
                                    rounded-xl
                                    border
                                    border-white/10
                                    bg-white/[0.055]
                                    py-2
                                    pl-9
                                    pr-9
                                    text-xs
                                    text-white
                                    outline-none
                                    transition
                                    placeholder:text-slate-600
                                    focus:border-blue-400/60
                                    focus:ring-2
                                    focus:ring-blue-500/20
                                    sm:py-2.5">


                                <button
                                    id="togglePassword"
                                    type="button"
                                    class="absolute
                                    right-2
                                    top-1/2
                                    inline-flex
                                    h-7
                                    w-7
                                    -translate-y-1/2
                                    items-center
                                    justify-center
                                    rounded-lg
                                    text-slate-500
                                    transition
                                    hover:bg-white/5
                                    hover:text-slate-300"
                                    aria-label="Tampilkan kata sandi">

                                    <i
                                        data-lucide="eye"
                                        class="h-3.5 w-3.5">
                                    </i>

                                </button>

                            </div>


                            @error('password')

                                <p
                                    class="mt-1 text-[10px] text-rose-400">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>



                        {{-- Remember Me --}}

                        <div
                            class="flex items-center pt-0.5">

                            <label
                                class="flex
                                cursor-pointer
                                items-center
                                gap-2
                                text-[11px]
                                text-slate-400
                                sm:text-xs">

                                <input
                                    type="checkbox"
                                    name="remember"
                                    value="1"
                                    class="h-3.5 w-3.5 rounded border-slate-600 bg-transparent text-blue-600 focus:ring-blue-500"
                                    {{ old('remember') ? 'checked' : '' }}>

                                Ingat saya

                            </label>

                        </div>



                        {{-- Submit --}}

                        <button
                            type="submit"
                            class="group
                            flex
                            w-full
                            items-center
                            justify-center
                            gap-2
                            rounded-xl
                            bg-gradient-to-r
                            from-blue-500
                            to-blue-600
                            px-4
                            py-2.5
                            text-xs
                            font-semibold
                            text-white
                            shadow-lg
                            shadow-blue-950/30
                            transition
                            hover:from-blue-400
                            hover:to-blue-500">

                            <span id="btnSubmitText">
                                Masuk
                            </span>


                            <i
                                data-lucide="arrow-right"
                                class="h-3.5 w-3.5 transition-transform group-hover:translate-x-1">
                            </i>

                        </button>

                    </form>

                </div>



                {{-- =================================================
                | REGISTER
                ================================================== --}}

                <div
                    class="my-3
                    flex
                    items-center
                    gap-3
                    sm:my-4">

                    <span
                        class="h-px flex-1 bg-white/10">
                    </span>


                    <span
                        class="text-[9px]
                        text-slate-500
                        sm:text-[10px]">

                        Belum memiliki akun?

                    </span>


                    <span
                        class="h-px flex-1 bg-white/10">
                    </span>

                </div>


                <a
                    href="{{ route('register') }}"
                    class="flex
                    w-full
                    items-center
                    justify-center
                    gap-2
                    rounded-xl
                    border
                    border-white/10
                    bg-white/5
                    px-4
                    py-2
                    text-xs
                    font-semibold
                    text-slate-200
                    transition
                    hover:border-sky-400/30
                    hover:bg-white/10
                    hover:text-white
                    sm:py-2.5">

                    <i
                        data-lucide="user-plus"
                        class="h-3.5 w-3.5 text-sky-400">
                    </i>

                    Daftar Akun Divisi

                </a>


                <p
                    class="mt-3
                    text-center
                    text-[9px]
                    text-slate-500
                    sm:mt-4
                    sm:text-[10px]">

                    Akses sistem dipantau dan dicatat
                    untuk keamanan perusahaan.

                </p>

            </section>

        </div>

    </main>



    {{-- =========================================================
    | JAVASCRIPT
    ========================================================== --}}

    <script>

        /*
        |--------------------------------------------------------------------------
        | Workspace Selection
        |--------------------------------------------------------------------------
        */

        function selectWorkspace(
            card,
            value,
            title,
            iconName,
            borderClass,
            bgClass,
            textClass
        ) {

            const cards =
                document.querySelectorAll('.ws-card');

            const authFormContainer =
                document.getElementById(
                    'authFormContainer'
                );

            const bannerTitle =
                document.getElementById(
                    'bannerTitle'
                );

            const bannerIcon =
                document.getElementById(
                    'bannerIcon'
                );

            const bannerIconBg =
                document.getElementById(
                    'bannerIconBg'
                );

            const btnSubmitText =
                document.getElementById(
                    'btnSubmitText'
                );

            const selectedWorkspaceInput =
                document.getElementById(
                    'selectedWorkspaceInput'
                );

            const emailInput =
                document.getElementById(
                    'email'
                );


            /*
            |--------------------------------------------------------------------------
            | Reset semua card
            |--------------------------------------------------------------------------
            */

            cards.forEach(cardItem => {

                cardItem.classList.remove(
                    'ring-2',
                    'ring-blue-500',
                    'ring-amber-500',
                    'ring-emerald-500',
                    'ring-purple-500',
                    'ring-rose-500',
                    'ring-cyan-500',
                    'scale-[1.02]',
                    'opacity-100'
                );

                cardItem.classList.add(
                    'opacity-40',
                    'scale-95'
                );

            });


            /*
            |--------------------------------------------------------------------------
            | Aktifkan card
            |--------------------------------------------------------------------------
            */

            card.classList.remove(
                'opacity-40',
                'scale-95'
            );

            card.classList.add(
                'opacity-100',
                'scale-[1.02]',
                'ring-2',
                borderClass
            );


            /*
            |--------------------------------------------------------------------------
            | Update hidden workspace
            |--------------------------------------------------------------------------
            */

            if (selectedWorkspaceInput) {

                selectedWorkspaceInput.value =
                    value;

            }


            /*
            |--------------------------------------------------------------------------
            | Update banner
            |--------------------------------------------------------------------------
            */

            if (bannerTitle) {

                bannerTitle.innerText =
                    title;

            }


            if (bannerIcon) {

                bannerIcon.setAttribute(
                    'data-lucide',
                    iconName
                );

            }


            /*
            |--------------------------------------------------------------------------
            | Update banner color
            |--------------------------------------------------------------------------
            */

            if (bannerIconBg) {

                bannerIconBg.className =
                    `flex h-6 w-6 sm:h-7 sm:w-7
                    items-center justify-center
                    rounded-lg
                    ${bgClass}
                    ${textClass}`;

            }


            /*
            |--------------------------------------------------------------------------
            | Update button
            |--------------------------------------------------------------------------
            */

            if (btnSubmitText) {

                btnSubmitText.innerText =
                    `Masuk ke ${title}`;

            }


            /*
            |--------------------------------------------------------------------------
            | Refresh icons
            |--------------------------------------------------------------------------
            */

            if (
                typeof lucide !== 'undefined'
            ) {

                lucide.createIcons();

            }


            /*
            |--------------------------------------------------------------------------
            | Show form
            |--------------------------------------------------------------------------
            */

            if (
                authFormContainer.classList.contains(
                    'hidden'
                )
            ) {

                authFormContainer.classList.remove(
                    'hidden'
                );


                setTimeout(() => {

                    authFormContainer.classList.remove(
                        'opacity-0',
                        'translate-y-3'
                    );

                    authFormContainer.classList.add(
                        'opacity-100',
                        'translate-y-0'
                    );

                }, 20);

            }


            /*
            |--------------------------------------------------------------------------
            | Focus email
            |--------------------------------------------------------------------------
            */

            setTimeout(() => {

                if (emailInput) {

                    emailInput.focus();

                }

            }, 100);

        }



        /*
        |--------------------------------------------------------------------------
        | Reset Workspace
        |--------------------------------------------------------------------------
        */

        function resetWorkspaceSelection() {

            const cards =
                document.querySelectorAll(
                    '.ws-card'
                );

            const authFormContainer =
                document.getElementById(
                    'authFormContainer'
                );

            const selectedWorkspaceInput =
                document.getElementById(
                    'selectedWorkspaceInput'
                );


            /*
            |--------------------------------------------------------------------------
            | Reset cards
            |--------------------------------------------------------------------------
            */

            cards.forEach(card => {

                card.classList.remove(
                    'opacity-40',
                    'scale-95',
                    'ring-2',
                    'ring-blue-500',
                    'ring-amber-500',
                    'ring-emerald-500',
                    'ring-purple-500',
                    'ring-rose-500',
                    'ring-cyan-500',
                    'scale-[1.02]'
                );

                card.classList.add(
                    'opacity-100'
                );

            });


            /*
            |--------------------------------------------------------------------------
            | Reset hidden workspace
            |--------------------------------------------------------------------------
            */

            if (selectedWorkspaceInput) {

                selectedWorkspaceInput.value =
                    '';

            }


            /*
            |--------------------------------------------------------------------------
            | Hide form
            |--------------------------------------------------------------------------
            */

            authFormContainer.classList.remove(
                'opacity-100',
                'translate-y-0'
            );

            authFormContainer.classList.add(
                'opacity-0',
                'translate-y-3'
            );


            setTimeout(() => {

                authFormContainer.classList.add(
                    'hidden'
                );

            }, 200);

        }



        /*
        |--------------------------------------------------------------------------
        | DOM Loaded
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'DOMContentLoaded',
            () => {


                /*
                |--------------------------------------------------------------------------
                | Lucide
                |--------------------------------------------------------------------------
                */

                if (
                    typeof lucide !== 'undefined'
                ) {

                    lucide.createIcons();

                }


                /*
                |--------------------------------------------------------------------------
                | Elements
                |--------------------------------------------------------------------------
                */

                const root =
                    document.documentElement;

                const themeToggle =
                    document.getElementById(
                        'themeToggle'
                    );

                const password =
                    document.getElementById(
                        'password'
                    );

                const togglePassword =
                    document.getElementById(
                        'togglePassword'
                    );

                const selectedWorkspaceInput =
                    document.getElementById(
                        'selectedWorkspaceInput'
                    );


                /*
                |--------------------------------------------------------------------------
                | Theme Button
                |--------------------------------------------------------------------------
                */

                const refreshThemeButton =
                    () => {

                        if (!themeToggle) {
                            return;
                        }


                        const isLight =
                            root.classList.contains(
                                'light'
                            );


                        themeToggle.innerHTML =
                            isLight

                                ? '<i data-lucide="moon" class="h-4 w-4"></i>'

                                : '<i data-lucide="sun" class="h-4 w-4"></i>';


                        themeToggle.setAttribute(
                            'aria-label',
                            isLight
                                ? 'Aktifkan tema gelap'
                                : 'Aktifkan tema terang'
                        );


                        if (
                            typeof lucide !==
                            'undefined'
                        ) {

                            lucide.createIcons();

                        }

                    };


                /*
                |--------------------------------------------------------------------------
                | Theme Toggle
                |--------------------------------------------------------------------------
                */

                if (themeToggle) {

                    themeToggle.addEventListener(
                        'click',
                        () => {

                            const useLight =
                                !root.classList.contains(
                                    'light'
                                );


                            root.classList.toggle(
                                'light',
                                useLight
                            );

                            root.classList.toggle(
                                'dark',
                                !useLight
                            );


                            root.style.colorScheme =
                                useLight
                                    ? 'light'
                                    : 'dark';


                            localStorage.setItem(
                                'circle-theme',
                                useLight
                                    ? 'light'
                                    : 'dark'
                            );


                            refreshThemeButton();

                        }
                    );

                }


                /*
                |--------------------------------------------------------------------------
                | Password Toggle
                |--------------------------------------------------------------------------
                */

                if (
                    togglePassword &&
                    password
                ) {

                    togglePassword.addEventListener(
                        'click',
                        () => {

                            const show =
                                password.type ===
                                'password';


                            password.type =
                                show
                                    ? 'text'
                                    : 'password';


                            togglePassword.innerHTML =
                                show

                                    ? '<i data-lucide="eye-off" class="h-3.5 w-3.5"></i>'

                                    : '<i data-lucide="eye" class="h-3.5 w-3.5"></i>';


                            togglePassword.setAttribute(
                                'aria-label',
                                show
                                    ? 'Sembunyikan kata sandi'
                                    : 'Tampilkan kata sandi'
                            );


                            if (
                                typeof lucide !==
                                'undefined'
                            ) {

                                lucide.createIcons();

                            }

                        }
                    );

                }


                /*
                |--------------------------------------------------------------------------
                | Initialize Theme
                |--------------------------------------------------------------------------
                */

                refreshThemeButton();


                /*
                |--------------------------------------------------------------------------
                | Restore Workspace After Validation Error
                |--------------------------------------------------------------------------
                */

                const hasErrors =
                    @json($errors->any());

                const oldWorkspace =
                    @json(old('workspace'));


                if (
                    hasErrors &&
                    oldWorkspace
                ) {

                    const oldCard =
                        document.querySelector(
                            `.ws-card[data-workspace="${oldWorkspace}"]`
                        );


                    if (oldCard) {

                        oldCard.click();

                    }

                }

            }
        );

    </script>

</body>

</html>