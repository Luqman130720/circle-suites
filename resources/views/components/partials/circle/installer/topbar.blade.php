@php
$user = auth()->user();

/*
|--------------------------------------------------------------------------
| CURRENT PREFERENCES
|--------------------------------------------------------------------------
*/

$currentLocale = session('locale', 'id');
$currentTheme = session('theme', 'system');
$currentAccent = session('accent_color', 'blue');

/*
|--------------------------------------------------------------------------
| ACCENT COLORS
|--------------------------------------------------------------------------
*/

$accentColors = [
'blue' => [
'name' => 'Blue',
'color' => '#2563eb',
],

'indigo' => [
'name' => 'Indigo',
'color' => '#4f46e5',
],

'violet' => [
'name' => 'Violet',
'color' => '#7c3aed',
],

'emerald' => [
'name' => 'Emerald',
'color' => '#059669',
],

'cyan' => [
'name' => 'Cyan',
'color' => '#0891b2',
],

'rose' => [
'name' => 'Rose',
'color' => '#e11d48',
],

'amber' => [
'name' => 'Amber',
'color' => '#d97706',
],
];
@endphp


<header
  class="
        sticky
        top-0
        z-30
        border-b
        border-slate-200/80
        bg-white/90
        backdrop-blur-xl
        dark:border-slate-800
        dark:bg-slate-950/90
    ">

  <div
    class="
            flex
            h-[76px]
            items-center
            gap-4
            px-4
            sm:px-6
            lg:px-8
        ">

    {{-- =========================================================
             MOBILE SIDEBAR
             ========================================================= --}}

    <button
      type="button"
      id="circle-installer-sidebar-open"
      class="
                inline-flex
                h-10
                w-10
                shrink-0
                items-center
                justify-center
                rounded-xl
                text-slate-600
                transition
                hover:bg-slate-100
                hover:text-slate-900
                lg:hidden
                dark:text-slate-300
                dark:hover:bg-slate-800
                dark:hover:text-white
            "
      aria-label="Open sidebar">
      <i
        data-lucide="menu"
        class="h-5 w-5"></i>
    </button>


    {{-- =========================================================
             BREADCRUMB
             ========================================================= --}}

    <div class="min-w-0">

      <div
        class="
                    hidden
                    items-center
                    gap-2
                    text-xs
                    text-slate-400
                    sm:flex
                ">

        <span>
          Circle Suites
        </span>

        <i
          data-lucide="chevron-right"
          class="h-3 w-3"></i>

        <span>
          Installer
        </span>

      </div>


      <h1
        class="
                    truncate
                    text-base
                    font-semibold
                    text-slate-900
                    dark:text-white
                    sm:text-lg
                ">
        @yield(
        'page-title',
        'Installer Dashboard'
        )
      </h1>

    </div>


    {{-- =========================================================
             SPACER
             ========================================================= --}}

    <div class="flex-1"></div>


    {{-- =========================================================
             DESKTOP SEARCH
             ========================================================= --}}

    <div class="relative hidden w-64 lg:block">

      <i
        data-lucide="search"
        class="
                    pointer-events-none
                    absolute
                    left-3
                    top-1/2
                    h-4
                    w-4
                    -translate-y-1/2
                    text-slate-400
                "></i>


      <input
        type="text"
        placeholder="Search..."
        aria-label="Search"
        class="
                    h-10
                    w-full
                    rounded-xl
                    border
                    border-slate-200
                    bg-slate-50
                    pl-10
                    pr-4
                    text-sm
                    text-slate-900
                    outline-none
                    transition
                    placeholder:text-slate-400
                    focus:border-primary
                    focus:ring-2
                    focus:ring-primary/10
                    dark:border-slate-700
                    dark:bg-slate-900
                    dark:text-white
                ">

    </div>


    {{-- =========================================================
             ACTIONS
             ========================================================= --}}

    <div class="flex items-center gap-1">


      {{-- =====================================================
                 MOBILE SEARCH
                 ===================================================== --}}

      <button
        type="button"
        class="
                    inline-flex
                    h-10
                    w-10
                    items-center
                    justify-center
                    rounded-xl
                    text-slate-500
                    transition
                    hover:bg-slate-100
                    hover:text-slate-900
                    lg:hidden
                    dark:text-slate-400
                    dark:hover:bg-slate-800
                    dark:hover:text-white
                "
        aria-label="Search">
        <i
          data-lucide="search"
          class="h-5 w-5"></i>
      </button>


      {{-- =====================================================
                 NOTIFICATION
                 ===================================================== --}}

      <div class="relative">

        <button
          type="button"
          id="circle-installer-notification-button"
          class="
                        relative
                        inline-flex
                        h-10
                        w-10
                        items-center
                        justify-center
                        rounded-xl
                        text-slate-500
                        transition
                        hover:bg-slate-100
                        hover:text-slate-900
                        dark:text-slate-400
                        dark:hover:bg-slate-800
                        dark:hover:text-white
                    "
          aria-label="Notifications">

          <i
            data-lucide="bell"
            class="h-5 w-5"></i>

        </button>


        <div
          id="circle-installer-notification-dropdown"
          class="
                        absolute
                        right-0
                        top-12
                        z-50
                        hidden
                        w-80
                        overflow-hidden
                        rounded-2xl
                        border
                        border-slate-200
                        bg-white
                        shadow-xl
                        shadow-slate-900/10
                        dark:border-slate-700
                        dark:bg-slate-900
                    ">

          <x-partials.circle.installer.notification-menu />

        </div>

      </div>


      {{-- DIVIDER --}}

      <div
        class="
                    mx-1
                    hidden
                    h-6
                    w-px
                    bg-slate-200
                    sm:block
                    dark:bg-slate-800
                "></div>


      {{-- =====================================================
                 PREFERENCES
                 ===================================================== --}}

      <div class="relative">

        <button
          type="button"
          id="circle-installer-preferences-button"
          class="
                        inline-flex
                        h-10
                        w-10
                        items-center
                        justify-center
                        rounded-xl
                        text-slate-500
                        transition
                        hover:bg-slate-100
                        hover:text-slate-900
                        dark:text-slate-400
                        dark:hover:bg-slate-800
                        dark:hover:text-white
                    "
          aria-label="Preferences"
          aria-expanded="false">

          <i
            data-lucide="sliders-horizontal"
            class="h-5 w-5"></i>

        </button>


        {{-- =================================================
                     PREFERENCES DROPDOWN
                     ================================================= --}}

        <div
          id="circle-installer-preferences-dropdown"
          class="
                        absolute
                        right-0
                        top-12
                        z-50
                        hidden
                        w-[340px]
                        overflow-hidden
                        rounded-2xl
                        border
                        border-slate-200
                        bg-white
                        shadow-xl
                        shadow-slate-900/10
                        dark:border-slate-700
                        dark:bg-slate-900
                    ">


          {{-- =================================================
                         HEADER
                         ================================================= --}}

          <div
            class="
                            flex
                            items-center
                            justify-between
                            border-b
                            border-slate-200
                            px-5
                            py-4
                            dark:border-slate-800
                        ">

            <div>

              <h3
                class="
                                    text-sm
                                    font-semibold
                                    text-slate-900
                                    dark:text-white
                                ">
                Preferences
              </h3>

              <p
                class="
                                    mt-0.5
                                    text-xs
                                    text-slate-500
                                    dark:text-slate-400
                                ">
                Customize your workspace
              </p>

            </div>


            <button
              type="button"
              id="circle-installer-preferences-close"
              class="
                                inline-flex
                                h-8
                                w-8
                                items-center
                                justify-center
                                rounded-lg
                                text-slate-400
                                transition
                                hover:bg-slate-100
                                hover:text-slate-700
                                dark:hover:bg-slate-800
                                dark:hover:text-white
                            "
              aria-label="Close">

              <i
                data-lucide="x"
                class="h-4 w-4"></i>

            </button>

          </div>


          {{-- =================================================
                         CONTENT
                         ================================================= --}}

          <div
            class="
                            max-h-[70vh]
                            overflow-y-auto
                            p-5
                        ">


            {{-- =================================================
                             LANGUAGE
                             ================================================= --}}

            <div>

              <div
                class="
                                    mb-3
                                    flex
                                    items-center
                                    gap-2
                                ">

                <div
                  class="
                                        flex
                                        h-8
                                        w-8
                                        items-center
                                        justify-center
                                        rounded-lg
                                        bg-primary/10
                                        text-primary
                                    ">

                  <i
                    data-lucide="languages"
                    class="h-4 w-4"></i>

                </div>


                <div>

                  <p
                    class="
                                            text-sm
                                            font-semibold
                                            text-slate-900
                                            dark:text-white
                                        ">
                    Language
                  </p>

                  <p
                    class="
                                            text-xs
                                            text-slate-500
                                            dark:text-slate-400
                                        ">
                    Choose your language
                  </p>

                </div>

              </div>


              <div class="grid grid-cols-2 gap-2">


                {{-- INDONESIAN --}}

                <button
                  type="button"
                  class="
                                        flex
                                        items-center
                                        justify-between
                                        rounded-xl
                                        border
                                        border-primary
                                        bg-primary/5
                                        px-3
                                        py-2.5
                                        text-sm
                                        text-primary
                                    ">

                  <span>
                    🇮🇩 Indonesia
                  </span>

                  <i
                    data-lucide="check"
                    class="h-4 w-4"></i>

                </button>


                {{-- ENGLISH --}}

                <button
                  type="button"
                  class="
                                        flex
                                        items-center
                                        justify-between
                                        rounded-xl
                                        border
                                        border-slate-200
                                        px-3
                                        py-2.5
                                        text-sm
                                        text-slate-600
                                        transition
                                        hover:border-slate-300
                                        hover:bg-slate-50
                                        dark:border-slate-700
                                        dark:text-slate-300
                                        dark:hover:bg-slate-800
                                    ">

                  <span>
                    🇬🇧 English
                  </span>

                </button>

              </div>

            </div>


            {{-- DIVIDER --}}

            <div
              class="
                                my-5
                                border-t
                                border-slate-200
                                dark:border-slate-800
                            "></div>


            {{-- =================================================
                             APPEARANCE
                             ================================================= --}}

            <div>

              <div
                class="
                                    mb-3
                                    flex
                                    items-center
                                    gap-2
                                ">

                <div
                  class="
                                        flex
                                        h-8
                                        w-8
                                        items-center
                                        justify-center
                                        rounded-lg
                                        bg-primary/10
                                        text-primary
                                    ">

                  <i
                    data-lucide="monitor"
                    class="h-4 w-4"></i>

                </div>


                <div>

                  <p
                    class="
                                            text-sm
                                            font-semibold
                                            text-slate-900
                                            dark:text-white
                                        ">
                    Appearance
                  </p>

                  <p
                    class="
                                            text-xs
                                            text-slate-500
                                            dark:text-slate-400
                                        ">
                    Choose interface theme
                  </p>

                </div>

              </div>


              <div
                class="
                                    grid
                                    grid-cols-3
                                    gap-2
                                ">


                {{-- LIGHT --}}

                <button
                  type="button"
                  data-theme-option="light"
                  class="
                                        theme-option
                                        flex
                                        flex-col
                                        items-center
                                        gap-2
                                        rounded-xl
                                        border
                                        border-slate-200
                                        px-2
                                        py-3
                                        text-xs
                                        text-slate-600
                                        transition
                                        hover:border-primary
                                        hover:bg-primary/5
                                        hover:text-primary
                                        dark:border-slate-700
                                        dark:text-slate-300
                                        dark:hover:border-primary
                                        dark:hover:bg-primary/10
                                    ">

                  <i
                    data-lucide="sun"
                    class="h-5 w-5"></i>

                  <span>
                    Light
                  </span>

                </button>


                {{-- DARK --}}

                <button
                  type="button"
                  data-theme-option="dark"
                  class="
                                        theme-option
                                        flex
                                        flex-col
                                        items-center
                                        gap-2
                                        rounded-xl
                                        border
                                        border-slate-200
                                        px-2
                                        py-3
                                        text-xs
                                        text-slate-600
                                        transition
                                        hover:border-primary
                                        hover:bg-primary/5
                                        hover:text-primary
                                        dark:border-slate-700
                                        dark:text-slate-300
                                        dark:hover:border-primary
                                        dark:hover:bg-primary/10
                                    ">

                  <i
                    data-lucide="moon"
                    class="h-5 w-5"></i>

                  <span>
                    Dark
                  </span>

                </button>


                {{-- SYSTEM --}}

                <button
                  type="button"
                  data-theme-option="system"
                  class="
                                        theme-option
                                        flex
                                        flex-col
                                        items-center
                                        gap-2
                                        rounded-xl
                                        border
                                        border-slate-200
                                        px-2
                                        py-3
                                        text-xs
                                        text-slate-600
                                        transition
                                        hover:border-primary
                                        hover:bg-primary/5
                                        hover:text-primary
                                        dark:border-slate-700
                                        dark:text-slate-300
                                        dark:hover:border-primary
                                        dark:hover:bg-primary/10
                                    ">

                  <i
                    data-lucide="monitor"
                    class="h-5 w-5"></i>

                  <span>
                    System
                  </span>

                </button>

              </div>

            </div>


            {{-- DIVIDER --}}

            <div
              class="
                                my-5
                                border-t
                                border-slate-200
                                dark:border-slate-800
                            "></div>


            {{-- =================================================
                             ACCENT COLOR
                             ================================================= --}}

            <div>

              <div
                class="
                                    mb-3
                                    flex
                                    items-center
                                    gap-2
                                ">

                <div
                  class="
                                        flex
                                        h-8
                                        w-8
                                        items-center
                                        justify-center
                                        rounded-lg
                                        bg-primary/10
                                        text-primary
                                    ">

                  <i
                    data-lucide="palette"
                    class="h-4 w-4"></i>

                </div>


                <div>

                  <p
                    class="
                                            text-sm
                                            font-semibold
                                            text-slate-900
                                            dark:text-white
                                        ">
                    Accent Color
                  </p>

                  <p
                    class="
                                            text-xs
                                            text-slate-500
                                            dark:text-slate-400
                                        ">
                    Choose primary color
                  </p>

                </div>

              </div>


              <div
                class="
                                    grid
                                    grid-cols-7
                                    gap-2
                                ">

                @foreach ($accentColors as $key => $accent)

                <button
                  type="button"
                  data-accent-option="{{ $key }}"
                  title="{{ $accent['name'] }}"
                  aria-label="{{ $accent['name'] }}"
                  class="
                                            accent-option
                                            group
                                            relative
                                            flex
                                            h-9
                                            w-9
                                            items-center
                                            justify-center
                                            rounded-full
                                            transition
                                            hover:scale-110
                                        ">

                  <span
                    class="
                                                accent-circle
                                                h-7
                                                w-7
                                                rounded-full
                                                ring-2
                                                ring-offset-2
                                                transition
                                                dark:ring-offset-slate-900

                                                {{ $currentAccent === $key
                                                    ? 'ring-slate-900 dark:ring-white'
                                                    : 'ring-transparent group-hover:ring-slate-300 dark:group-hover:ring-slate-600'
                                                }}
                                            "
                    style="
                                                background-color: {{ $accent['color'] }};
                                            "></span>


                  @if ($currentAccent === $key)

                  <span
                    class="
                                                    accent-check
                                                    absolute
                                                    inset-0
                                                    flex
                                                    items-center
                                                    justify-center
                                                    text-white
                                                ">

                    <i
                      data-lucide="check"
                      class="
                                                        h-4
                                                        w-4
                                                        drop-shadow
                                                    "></i>

                  </span>

                  @else

                  <span
                    class="
                                                    accent-check
                                                    absolute
                                                    inset-0
                                                    hidden
                                                    items-center
                                                    justify-center
                                                    text-white
                                                ">

                    <i
                      data-lucide="check"
                      class="h-4 w-4"></i>

                  </span>

                  @endif

                </button>

                @endforeach

              </div>

            </div>

          </div>

        </div>

      </div>


      {{-- =========================================================
                 USER MENU
                 ========================================================= --}}

      <div class="relative">

        <button
          type="button"
          id="circle-installer-user-button"
          class="
                        ml-1
                        flex
                        items-center
                        gap-2
                        rounded-xl
                        p-1.5
                        transition
                        hover:bg-slate-100
                        dark:hover:bg-slate-800
                    "
          aria-expanded="false">

          @if ($user?->profile_photo)

          <img
            src="{{ asset('storage/' . $user->profile_photo) }}"
            alt="{{ $user->name }}"
            class="
                                h-9
                                w-9
                                rounded-xl
                                object-cover
                            ">

          @else

          <div
            class="
                                flex
                                h-9
                                w-9
                                items-center
                                justify-center
                                rounded-xl
                                bg-primary
                                text-sm
                                font-semibold
                                text-white
                            ">
            {{ strtoupper(substr($user?->name ?? 'U', 0, 1)) }}
          </div>

          @endif


          <div
            class="
                            hidden
                            min-w-0
                            text-left
                            xl:block
                        ">

            <p
              class="
                                max-w-[130px]
                                truncate
                                text-sm
                                font-semibold
                                text-slate-900
                                dark:text-white
                            ">
              {{ $user?->name ?? 'User' }}
            </p>

            <p
              class="
                                text-[11px]
                                text-slate-500
                                dark:text-slate-400
                            ">
              {{ ucfirst($user?->role ?? 'Installer') }}
            </p>

          </div>


          <i
            data-lucide="chevron-down"
            class="
                            hidden
                            h-4
                            w-4
                            text-slate-400
                            xl:block
                        "></i>

        </button>


        <div
          id="circle-installer-user-dropdown"
          class="
                        absolute
                        right-0
                        top-12
                        z-50
                        hidden
                        w-72
                        overflow-hidden
                        rounded-2xl
                        border
                        border-slate-200
                        bg-white
                        shadow-xl
                        shadow-slate-900/10
                        dark:border-slate-700
                        dark:bg-slate-900
                    ">

          <x-partials.circle.installer.user-menu />

        </div>

      </div>

    </div>

  </div>

</header>


<script>
  (function() {

    /*
    |--------------------------------------------------------------------------
    | ELEMENTS
    |--------------------------------------------------------------------------
    */

    const notificationButton =
      document.getElementById(
        'circle-installer-notification-button'
      );

    const notificationDropdown =
      document.getElementById(
        'circle-installer-notification-dropdown'
      );

    const preferencesButton =
      document.getElementById(
        'circle-installer-preferences-button'
      );

    const preferencesDropdown =
      document.getElementById(
        'circle-installer-preferences-dropdown'
      );

    const preferencesClose =
      document.getElementById(
        'circle-installer-preferences-close'
      );

    const userButton =
      document.getElementById(
        'circle-installer-user-button'
      );

    const userDropdown =
      document.getElementById(
        'circle-installer-user-dropdown'
      );


    /*
    |--------------------------------------------------------------------------
    | CLOSE ALL DROPDOWNS
    |--------------------------------------------------------------------------
    */

    function closeAllDropdowns() {

      notificationDropdown?.classList.add(
        'hidden'
      );

      preferencesDropdown?.classList.add(
        'hidden'
      );

      userDropdown?.classList.add(
        'hidden'
      );

      preferencesButton?.setAttribute(
        'aria-expanded',
        'false'
      );

      userButton?.setAttribute(
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
          !notificationDropdown.classList.contains(
            'hidden'
          );

        closeAllDropdowns();

        if (!isOpen) {

          notificationDropdown?.classList.remove(
            'hidden'
          );

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
          !preferencesDropdown.classList.contains(
            'hidden'
          );

        closeAllDropdowns();

        if (!isOpen) {

          preferencesDropdown?.classList.remove(
            'hidden'
          );

          preferencesButton?.setAttribute(
            'aria-expanded',
            'true'
          );

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

        preferencesDropdown?.classList.add(
          'hidden'
        );

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
          !userDropdown.classList.contains(
            'hidden'
          );

        closeAllDropdowns();

        if (!isOpen) {

          userDropdown?.classList.remove(
            'hidden'
          );

          userButton?.setAttribute(
            'aria-expanded',
            'true'
          );

        }

      }
    );


    /*
    |--------------------------------------------------------------------------
    | PREVENT DROPDOWN CLOSING
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
    | THEME
    |--------------------------------------------------------------------------
    */

    const themeButtons =
      document.querySelectorAll(
        '[data-theme-option]'
      );


    function updateThemeButtons() {

      const currentTheme =
        window.CircleAppearance?.getTheme() ||
        'system';

      themeButtons.forEach(
        function(button) {

          const selected =
            button.dataset.themeOption ===
            currentTheme;

          button.classList.toggle(
            'border-primary',
            selected
          );

          button.classList.toggle(
            'bg-primary/5',
            selected
          );

          button.classList.toggle(
            'text-primary',
            selected
          );

          button.classList.toggle(
            'dark:bg-primary/10',
            selected
          );

        }
      );

    }


    themeButtons.forEach(
      function(button) {

        button.addEventListener(
          'click',
          function() {

            const theme =
              button.dataset.themeOption;

            window.CircleAppearance?.setTheme(
              theme
            );

            updateThemeButtons();

          }
        );

      }
    );


    /*
    |--------------------------------------------------------------------------
    | ACCENT
    |--------------------------------------------------------------------------
    */

    const accentButtons =
      document.querySelectorAll(
        '[data-accent-option]'
      );


    function updateAccentButtons() {

      const currentAccent =
        window.CircleAppearance?.getAccent() ||
        'blue';

      accentButtons.forEach(
        function(button) {

          const selected =
            button.dataset.accentOption ===
            currentAccent;

          const circle =
            button.querySelector(
              '.accent-circle'
            );

          const check =
            button.querySelector(
              '.accent-check'
            );


          circle?.classList.toggle(
            'ring-slate-900',
            selected
          );

          circle?.classList.toggle(
            'dark:ring-white',
            selected
          );

          circle?.classList.toggle(
            'ring-transparent',
            !selected
          );


          check?.classList.toggle(
            'hidden',
            !selected
          );

          check?.classList.toggle(
            'flex',
            selected
          );

        }
      );

    }


    accentButtons.forEach(
      function(button) {

        button.addEventListener(
          'click',
          function() {

            const accent =
              button.dataset.accentOption;

            window.CircleAppearance?.setAccent(
              accent
            );

            updateAccentButtons();

          }
        );

      }
    );


    /*
    |--------------------------------------------------------------------------
    | APPEARANCE EVENTS
    |--------------------------------------------------------------------------
    */

    window.addEventListener(
      'circle-theme-changed',
      updateThemeButtons
    );

    window.addEventListener(
      'circle-accent-changed',
      updateAccentButtons
    );


    /*
    |--------------------------------------------------------------------------
    | INITIAL STATE
    |--------------------------------------------------------------------------
    */

    updateThemeButtons();
    updateAccentButtons();


    /*
    |--------------------------------------------------------------------------
    | LUCIDE
    |--------------------------------------------------------------------------
    */

    function initializeLucide() {

      if (
        window.lucide &&
        typeof window.lucide.createIcons ===
        'function'
      ) {

        window.lucide.createIcons();

      }

    }


    initializeLucide();

  })();
</script>