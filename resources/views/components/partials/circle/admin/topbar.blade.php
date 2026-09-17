@php
$user = auth()->user();

$pendingUsers = \App\Models\User::where('status', 'pending')->count();

/*
|--------------------------------------------------------------------------
| LANGUAGE
|--------------------------------------------------------------------------
|
| Language masih menggunakan session karena fitur language
| belum diaktifkan.
|
*/

$currentLocale = session('locale', 'id');

/*
|--------------------------------------------------------------------------
| ACCENT COLORS
|--------------------------------------------------------------------------
*/

$accentColors = [
'blue' => '#2563eb',
'indigo' => '#4f46e5',
'violet' => '#7c3aed',
'emerald' => '#059669',
'cyan' => '#0891b2',
'rose' => '#e11d48',
'amber' => '#d97706',
];
@endphp


<header
    class="sticky top-0 z-30 border-b border-slate-200/80
           bg-white/90 backdrop-blur-xl
           dark:border-slate-800
           dark:bg-slate-950/90">

    <div class="flex h-[76px] items-center gap-4 px-4 sm:px-6 lg:px-8">


        {{-- =========================================================
             MOBILE SIDEBAR
        ========================================================== --}}

        <button
            type="button"
            id="circle-sidebar-open"
            class="inline-flex h-10 w-10 shrink-0 items-center
                   justify-center rounded-xl
                   text-slate-600 transition
                   hover:bg-slate-100
                   hover:text-slate-900
                   lg:hidden
                   dark:text-slate-300
                   dark:hover:bg-slate-800
                   dark:hover:text-white"
            aria-label="{{ __('common.open_sidebar') }}">

            <i
                data-lucide="menu"
                class="h-5 w-5">
            </i>

        </button>


        {{-- =========================================================
             BREADCRUMB
        ========================================================== --}}

        <div class="min-w-0">

            <div
                class="hidden items-center gap-2 text-xs
                       text-slate-400 sm:flex">

                <span>
                    Circle Suites
                </span>

                <i
                    data-lucide="chevron-right"
                    class="h-3 w-3">
                </i>

                <span>
                    {{ __('common.administration') }}
                </span>

            </div>


            <h1
                class="truncate text-base font-semibold
                       text-slate-900
                       dark:text-white
                       sm:text-lg">

                @yield(
                'page-title',
                __('navigation.dashboard')
                )

            </h1>

        </div>


        {{-- =========================================================
             SPACER
        ========================================================== --}}

        <div class="flex-1"></div>


        {{-- =========================================================
             DESKTOP SEARCH
        ========================================================== --}}

        <div class="relative hidden w-64 lg:block">

            <i
                data-lucide="search"
                class="pointer-events-none absolute left-3 top-1/2
                       h-4 w-4 -translate-y-1/2
                       text-slate-400">
            </i>

            <input
                type="text"
                placeholder="{{ __('common.search') }}..."
                aria-label="{{ __('common.search') }}"
                class="h-10 w-full rounded-xl
                       border border-slate-200
                       bg-slate-50 pl-10 pr-4
                       text-sm text-slate-900
                       outline-none transition
                       placeholder:text-slate-400
                       focus:border-primary
                       focus:ring-2
                       focus:ring-primary/10
                       dark:border-slate-700
                       dark:bg-slate-900
                       dark:text-white">

        </div>


        {{-- =========================================================
             ACTIONS
        ========================================================== --}}

        <div class="flex items-center gap-1">


            {{-- =====================================================
                 MOBILE SEARCH
            ====================================================== --}}

            <button
                type="button"
                class="inline-flex h-10 w-10 items-center
                       justify-center rounded-xl
                       text-slate-500 transition
                       hover:bg-slate-100
                       hover:text-slate-900
                       lg:hidden
                       dark:text-slate-400
                       dark:hover:bg-slate-800
                       dark:hover:text-white"
                aria-label="{{ __('common.search') }}">

                <i
                    data-lucide="search"
                    class="h-5 w-5">
                </i>

            </button>


            {{-- =====================================================
                 NOTIFICATION
            ====================================================== --}}

            <div class="relative">

                <button
                    type="button"
                    id="admin-notification-button"
                    class="relative inline-flex h-10 w-10
                           items-center justify-center
                           rounded-xl
                           text-slate-500 transition
                           hover:bg-slate-100
                           hover:text-slate-900
                           dark:text-slate-400
                           dark:hover:bg-slate-800
                           dark:hover:text-white"
                    aria-label="{{ __('common.notifications') }}">

                    <i
                        data-lucide="bell"
                        class="h-5 w-5">
                    </i>


                    @if ($pendingUsers > 0)

                    <span
                        class="absolute right-1.5 top-1.5
                                   flex h-4 min-w-4
                                   items-center justify-center
                                   rounded-full
                                   bg-red-500 px-1
                                   text-[9px] font-bold
                                   text-white
                                   ring-2 ring-white
                                   dark:ring-slate-950">

                        {{ $pendingUsers > 9 ? '9+' : $pendingUsers }}

                    </span>

                    @endif

                </button>


                <div
                    id="admin-notification-dropdown"
                    class="absolute right-0 top-12 z-50 hidden
                           w-80 overflow-hidden rounded-2xl
                           border border-slate-200
                           bg-white
                           shadow-xl
                           shadow-slate-900/10
                           dark:border-slate-700
                           dark:bg-slate-900">

                    <x-partials.circle.admin.notification-menu />

                </div>

            </div>


            {{-- DIVIDER --}}

            <div
                class="mx-1 hidden h-6 w-px bg-slate-200
                       dark:bg-slate-800 sm:block">
            </div>


            {{-- =====================================================
                 PREFERENCES
            ====================================================== --}}

            <div class="relative">

                <button
                    type="button"
                    id="admin-preferences-button"
                    class="inline-flex h-10 w-10
                           items-center justify-center
                           rounded-xl
                           text-slate-500 transition
                           hover:bg-slate-100
                           hover:text-slate-900
                           dark:text-slate-400
                           dark:hover:bg-slate-800
                           dark:hover:text-white"
                    aria-label="{{ __('common.preferences') }}"
                    aria-expanded="false">

                    <i
                        data-lucide="sliders-horizontal"
                        class="h-5 w-5">
                    </i>

                </button>


                {{-- =================================================
                     PREFERENCES DROPDOWN
                ================================================== --}}

                <div
                    id="admin-preferences-dropdown"
                    class="absolute right-0 top-12 z-50 hidden
                           w-[340px] overflow-hidden
                           rounded-2xl
                           border border-slate-200
                           bg-white
                           shadow-xl
                           shadow-slate-900/10
                           dark:border-slate-700
                           dark:bg-slate-900">


                    {{-- HEADER --}}

                    <div
                        class="flex items-center justify-between
                               border-b border-slate-200
                               px-5 py-4
                               dark:border-slate-800">

                        <div>

                            <h3
                                class="text-sm font-semibold
                                       text-slate-900
                                       dark:text-white">

                                {{ __('common.preferences') }}

                            </h3>

                            <p
                                class="mt-0.5 text-xs
                                       text-slate-500
                                       dark:text-slate-400">

                                {{ __('common.customize_workspace') }}

                            </p>

                        </div>


                        <button
                            type="button"
                            id="admin-preferences-close"
                            class="inline-flex h-8 w-8
                                   items-center justify-center
                                   rounded-lg
                                   text-slate-400 transition
                                   hover:bg-slate-100
                                   hover:text-slate-700
                                   dark:hover:bg-slate-800
                                   dark:hover:text-white"
                            aria-label="{{ __('common.close') }}">

                            <i
                                data-lucide="x"
                                class="h-4 w-4">
                            </i>

                        </button>

                    </div>


                    <div
                        class="max-h-[70vh] overflow-y-auto p-5">


                        {{-- =================================================
     LANGUAGE
================================================== --}}

                        <div>

                            <div class="mb-3 flex items-center gap-2">

                                <div
                                    class="flex h-8 w-8
                   items-center justify-center
                   rounded-lg
                   bg-primary/10
                   text-primary">

                                    <i
                                        data-lucide="languages"
                                        class="h-4 w-4">
                                    </i>

                                </div>

                                <div>

                                    <p
                                        class="text-sm font-semibold
                       text-slate-900
                       dark:text-white">

                                        {{ __('common.language') }}

                                    </p>

                                    <p
                                        class="text-xs
                       text-slate-500
                       dark:text-slate-400">

                                        {{ __('common.choose_language') }}

                                    </p>

                                </div>

                            </div>


                            <div class="grid grid-cols-2 gap-2">


                                {{-- =================================================
             INDONESIAN
        ================================================== --}}

                                <a
                                    href="{{ route('language.switch', 'id') }}"
                                    class="flex items-center justify-between
                   rounded-xl border
                   px-3 py-2.5
                   text-sm
                   transition

                   {{ $currentLocale === 'id'
                        ? 'border-primary bg-primary/5 text-primary'
                        : 'border-slate-200 text-slate-600 hover:border-slate-300 hover:bg-slate-50 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-800'
                   }}">

                                    <span>
                                        🇮🇩
                                        {{ __('common.indonesian') }}
                                    </span>


                                    @if ($currentLocale === 'id')

                                    <i
                                        data-lucide="check"
                                        class="h-4 w-4">
                                    </i>

                                    @endif

                                </a>


                                {{-- =================================================
             ENGLISH
        ================================================== --}}

                                <a
                                    href="{{ route('language.switch', 'en') }}"
                                    class="flex items-center justify-between
                   rounded-xl border
                   px-3 py-2.5
                   text-sm
                   transition

                   {{ $currentLocale === 'en'
                        ? 'border-primary bg-primary/5 text-primary'
                        : 'border-slate-200 text-slate-600 hover:border-slate-300 hover:bg-slate-50 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-800'
                   }}">

                                    <span>
                                        🇬🇧
                                        {{ __('common.english') }}
                                    </span>


                                    @if ($currentLocale === 'en')

                                    <i
                                        data-lucide="check"
                                        class="h-4 w-4">
                                    </i>

                                    @endif

                                </a>

                            </div>

                        </div>


                        {{-- DIVIDER --}}

                        <div
                            class="my-5 border-t
                                   border-slate-200
                                   dark:border-slate-800">
                        </div>


                        {{-- =================================================
                             APPEARANCE
                        ================================================== --}}

                        <div>

                            <div
                                class="mb-3 flex items-center gap-2">

                                <div
                                    class="flex h-8 w-8
                                           items-center justify-center
                                           rounded-lg
                                           bg-primary/10
                                           text-primary">

                                    <i
                                        data-lucide="monitor"
                                        class="h-4 w-4">
                                    </i>

                                </div>


                                <div>

                                    <p
                                        class="text-sm font-semibold
                                               text-slate-900
                                               dark:text-white">

                                        {{ __('common.appearance') }}

                                    </p>

                                    <p
                                        class="text-xs
                                               text-slate-500
                                               dark:text-slate-400">

                                        {{ __('common.choose_interface_theme') }}

                                    </p>

                                </div>

                            </div>


                            <div class="grid grid-cols-3 gap-2">


                                {{-- LIGHT --}}

                                <button
                                    type="button"
                                    data-circle-theme="light"
                                    class="circle-theme-option
                                           flex flex-col
                                           items-center gap-2
                                           rounded-xl border
                                           border-slate-200
                                           px-2 py-3
                                           text-xs
                                           text-slate-600
                                           transition
                                           hover:border-slate-300
                                           hover:bg-slate-50
                                           dark:border-slate-700
                                           dark:text-slate-300
                                           dark:hover:bg-slate-800">

                                    <i
                                        data-lucide="sun"
                                        class="h-5 w-5">
                                    </i>

                                    <span>
                                        {{ __('common.light') }}
                                    </span>

                                </button>


                                {{-- DARK --}}

                                <button
                                    type="button"
                                    data-circle-theme="dark"
                                    class="circle-theme-option
                                           flex flex-col
                                           items-center gap-2
                                           rounded-xl border
                                           border-slate-200
                                           px-2 py-3
                                           text-xs
                                           text-slate-600
                                           transition
                                           hover:border-slate-300
                                           hover:bg-slate-50
                                           dark:border-slate-700
                                           dark:text-slate-300
                                           dark:hover:bg-slate-800">

                                    <i
                                        data-lucide="moon"
                                        class="h-5 w-5">
                                    </i>

                                    <span>
                                        {{ __('common.dark') }}
                                    </span>

                                </button>


                                {{-- SYSTEM --}}

                                <button
                                    type="button"
                                    data-circle-theme="system"
                                    class="circle-theme-option
                                           flex flex-col
                                           items-center gap-2
                                           rounded-xl border
                                           border-slate-200
                                           px-2 py-3
                                           text-xs
                                           text-slate-600
                                           transition
                                           hover:border-slate-300
                                           hover:bg-slate-50
                                           dark:border-slate-700
                                           dark:text-slate-300
                                           dark:hover:bg-slate-800">

                                    <i
                                        data-lucide="monitor"
                                        class="h-5 w-5">
                                    </i>

                                    <span>
                                        {{ __('common.system') }}
                                    </span>

                                </button>

                            </div>

                        </div>


                        {{-- DIVIDER --}}

                        <div
                            class="my-5 border-t
                                   border-slate-200
                                   dark:border-slate-800">
                        </div>


                        {{-- =================================================
                             ACCENT COLOR
                        ================================================== --}}

                        <div>

                            <div
                                class="mb-3 flex items-center gap-2">

                                <div
                                    class="flex h-8 w-8
                                           items-center justify-center
                                           rounded-lg
                                           bg-primary/10
                                           text-primary">

                                    <i
                                        data-lucide="palette"
                                        class="h-4 w-4">
                                    </i>

                                </div>


                                <div>

                                    <p
                                        class="text-sm font-semibold
                                               text-slate-900
                                               dark:text-white">

                                        {{ __('common.accent_color') }}

                                    </p>

                                    <p
                                        class="text-xs
                                               text-slate-500
                                               dark:text-slate-400">

                                        {{ __('common.choose_primary_color') }}

                                    </p>

                                </div>

                            </div>


                            <div
                                class="grid grid-cols-7 gap-2">

                                @foreach ($accentColors as $color => $hex)

                                <button
                                    type="button"
                                    data-circle-accent="{{ $color }}"
                                    title="{{ __('common.' . $color) }}"
                                    aria-label="{{ __('common.' . $color) }}"
                                    class="circle-accent-option
                                               group relative flex h-9 w-9
                                               items-center justify-center
                                               rounded-full
                                               transition hover:scale-110">

                                    <span
                                        class="circle-accent-dot
                                                   h-7 w-7 rounded-full
                                                   ring-2 ring-offset-2
                                                   transition
                                                   dark:ring-offset-slate-900"
                                        style="background-color: {{ $hex }}">
                                    </span>

                                    <i
                                        data-lucide="check"
                                        class="circle-accent-check
                                                   absolute hidden h-4 w-4
                                                   text-white drop-shadow">
                                    </i>

                                </button>

                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =========================================================
                 USER MENU
            ========================================================== --}}

            <div class="relative">

                <button
                    type="button"
                    id="admin-user-button"
                    class="ml-1 flex items-center gap-2
                           rounded-xl p-1.5 transition
                           hover:bg-slate-100
                           dark:hover:bg-slate-800">

                    @if ($user?->profile_photo)

                    <img
                        src="{{ asset('storage/' . $user->profile_photo) }}"
                        alt="{{ $user->name }}"
                        class="h-9 w-9 rounded-xl object-cover">

                    @else

                    <div
                        class="flex h-9 w-9
                                   items-center justify-center
                                   rounded-xl
                                   bg-primary
                                   text-sm font-semibold
                                   text-white">

                        {{ strtoupper(substr($user?->name ?? 'U', 0, 1)) }}

                    </div>

                    @endif


                    <div
                        class="hidden min-w-0 text-left xl:block">

                        <p
                            class="max-w-[130px] truncate
                                   text-sm font-semibold
                                   text-slate-900
                                   dark:text-white">

                            {{ $user?->name ?? __('common.user') }}

                        </p>

                        <p
                            class="text-[11px]
                                   text-slate-500
                                   dark:text-slate-400">

                            {{ ucfirst($user?->role ?? __('common.user')) }}

                        </p>

                    </div>


                    <i
                        data-lucide="chevron-down"
                        class="hidden h-4 w-4
                               text-slate-400 xl:block">
                    </i>

                </button>


                <div
                    id="admin-user-dropdown"
                    class="absolute right-0 top-12 z-50 hidden
                           w-72 overflow-hidden rounded-2xl
                           border border-slate-200
                           bg-white
                           shadow-xl
                           shadow-slate-900/10
                           dark:border-slate-700
                           dark:bg-slate-900">

                    <x-partials.circle.admin.user-menu />

                </div>

            </div>

        </div>

    </div>

</header>


{{-- =============================================================
     TOPBAR JAVASCRIPT
============================================================= --}}

<script>
    (function() {

        /*
        |--------------------------------------------------------------------------
        | ELEMENTS
        |--------------------------------------------------------------------------
        */

        const notificationButton =
            document.getElementById(
                'admin-notification-button'
            );

        const notificationDropdown =
            document.getElementById(
                'admin-notification-dropdown'
            );

        const preferencesButton =
            document.getElementById(
                'admin-preferences-button'
            );

        const preferencesDropdown =
            document.getElementById(
                'admin-preferences-dropdown'
            );

        const preferencesClose =
            document.getElementById(
                'admin-preferences-close'
            );

        const userButton =
            document.getElementById(
                'admin-user-button'
            );

        const userDropdown =
            document.getElementById(
                'admin-user-dropdown'
            );


        /*
        |--------------------------------------------------------------------------
        | CLOSE ALL DROPDOWNS
        |--------------------------------------------------------------------------
        */

        function closeAllDropdowns() {

            notificationDropdown?.classList.add('hidden');

            preferencesDropdown?.classList.add('hidden');

            userDropdown?.classList.add('hidden');

            preferencesButton?.setAttribute(
                'aria-expanded',
                'false'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | NOTIFICATION
        |--------------------------------------------------------------------------
        */

        notificationButton?.addEventListener(
            'click',
            function(event) {

                event.stopPropagation();

                const isOpen =
                    notificationDropdown &&
                    !notificationDropdown.classList.contains('hidden');

                closeAllDropdowns();

                if (!isOpen) {
                    notificationDropdown?.classList.remove('hidden');
                }

            }
        );


        /*
        |--------------------------------------------------------------------------
        | PREFERENCES
        |--------------------------------------------------------------------------
        */

        preferencesButton?.addEventListener(
            'click',
            function(event) {

                event.stopPropagation();

                const isOpen =
                    preferencesDropdown &&
                    !preferencesDropdown.classList.contains('hidden');

                closeAllDropdowns();

                if (!isOpen) {

                    preferencesDropdown?.classList.remove('hidden');

                    preferencesButton?.setAttribute(
                        'aria-expanded',
                        'true'
                    );

                    updateAppearanceUI();

                }

            }
        );


        /*
        |--------------------------------------------------------------------------
        | CLOSE PREFERENCES
        |--------------------------------------------------------------------------
        */

        preferencesClose?.addEventListener(
            'click',
            function(event) {

                event.stopPropagation();

                preferencesDropdown?.classList.add('hidden');

                preferencesButton?.setAttribute(
                    'aria-expanded',
                    'false'
                );

            }
        );


        /*
        |--------------------------------------------------------------------------
        | USER MENU
        |--------------------------------------------------------------------------
        */

        userButton?.addEventListener(
            'click',
            function(event) {

                event.stopPropagation();

                const isOpen =
                    userDropdown &&
                    !userDropdown.classList.contains('hidden');

                closeAllDropdowns();

                if (!isOpen) {
                    userDropdown?.classList.remove('hidden');
                }

            }
        );


        /*
        |--------------------------------------------------------------------------
        | PREVENT DROPDOWN FROM CLOSING
        |--------------------------------------------------------------------------
        */

        notificationDropdown?.addEventListener(
            'click',
            function(event) {
                event.stopPropagation();
            }
        );

        preferencesDropdown?.addEventListener(
            'click',
            function(event) {
                event.stopPropagation();
            }
        );

        userDropdown?.addEventListener(
            'click',
            function(event) {
                event.stopPropagation();
            }
        );


        /*
        |--------------------------------------------------------------------------
        | THEME
        |--------------------------------------------------------------------------
        */

        function updateThemeUI() {

            if (
                !window.CircleAppearance
            ) {
                return;
            }

            const currentTheme =
                window.CircleAppearance.getTheme();

            document
                .querySelectorAll(
                    '[data-circle-theme]'
                )
                .forEach(function(button) {

                    const active =
                        button.dataset.circleTheme === currentTheme;

                    button.classList.toggle(
                        'border-primary',
                        active
                    );

                    button.classList.toggle(
                        'bg-primary/5',
                        active
                    );

                    button.classList.toggle(
                        'text-primary',
                        active
                    );

                    button.classList.toggle(
                        'border-slate-200',
                        !active
                    );

                    button.classList.toggle(
                        'text-slate-600',
                        !active
                    );

                });

        }


        /*
        |--------------------------------------------------------------------------
        | ACCENT
        |--------------------------------------------------------------------------
        */

        function updateAccentUI() {

            if (
                !window.CircleAppearance
            ) {
                return;
            }

            const currentAccent =
                window.CircleAppearance.getAccent();

            document
                .querySelectorAll(
                    '[data-circle-accent]'
                )
                .forEach(function(button) {

                    const active =
                        button.dataset.circleAccent === currentAccent;

                    const check =
                        button.querySelector(
                            '.circle-accent-check'
                        );

                    check?.classList.toggle(
                        'hidden',
                        !active
                    );

                    button.classList.toggle(
                        'scale-110',
                        active
                    );

                });

        }


        /*
        |--------------------------------------------------------------------------
        | APPEARANCE UI
        |--------------------------------------------------------------------------
        */

        function updateAppearanceUI() {

            updateThemeUI();

            updateAccentUI();

        }


        /*
        |--------------------------------------------------------------------------
        | THEME BUTTONS
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll(
                '[data-circle-theme]'
            )
            .forEach(function(button) {

                button.addEventListener(
                    'click',
                    function() {

                        const theme =
                            button.dataset.circleTheme;

                        if (
                            window.CircleAppearance
                        ) {

                            window.CircleAppearance.setTheme(
                                theme
                            );

                            updateThemeUI();

                        }

                    }
                );

            });


        /*
        |--------------------------------------------------------------------------
        | ACCENT BUTTONS
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll(
                '[data-circle-accent]'
            )
            .forEach(function(button) {

                button.addEventListener(
                    'click',
                    function() {

                        const accent =
                            button.dataset.circleAccent;

                        if (
                            window.CircleAppearance
                        ) {

                            window.CircleAppearance.setAccent(
                                accent
                            );

                            updateAccentUI();

                        }

                    }
                );

            });


        /*
        |--------------------------------------------------------------------------
        | GLOBAL APPEARANCE EVENTS
        |--------------------------------------------------------------------------
        */

        window.addEventListener(
            'circle-theme-changed',
            updateThemeUI
        );

        window.addEventListener(
            'circle-accent-changed',
            updateAccentUI
        );


        /*
        |--------------------------------------------------------------------------
        | CLICK OUTSIDE
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'click',
            function() {
                closeAllDropdowns();
            }
        );


        /*
        |--------------------------------------------------------------------------
        | LUCIDE
        |--------------------------------------------------------------------------
        */

        function initLucide() {

            if (
                window.lucide &&
                typeof window.lucide.createIcons === 'function'
            ) {

                window.lucide.createIcons();

            }

        }


        /*
        |--------------------------------------------------------------------------
        | INITIALIZE
        |--------------------------------------------------------------------------
        */

        updateAppearanceUI();

        initLucide();

    })();
</script>