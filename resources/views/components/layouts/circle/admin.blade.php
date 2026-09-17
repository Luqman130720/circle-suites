<!DOCTYPE html>
<html
  lang="{{ str_replace('_', '-', app()->getLocale()) }}"
  data-theme="{{ session('theme', 'system') }}"
  data-accent="{{ session('accent_color', 'blue') }}">

<head>

  <meta charset="utf-8">

  <meta
    name="viewport"
    content="width=device-width, initial-scale=1">

  <meta
    name="csrf-token"
    content="{{ csrf_token() }}">

  <title>
    {{ $title ?? __('navigation.circle') . ' Suites' }}
  </title>

  {{-- =====================================================
         PREVENT THEME FLASH
    ====================================================== --}}

  <script>
    (function() {

      const theme =
        @json(session('theme', 'system'));

      const accent =
        @json(session('accent_color', 'blue'));

      const root =
        document.documentElement;


      /*
      |--------------------------------------------------------------------------
      | ACCENT
      |--------------------------------------------------------------------------
      */

      root.dataset.accent = accent;


      /*
      |--------------------------------------------------------------------------
      | THEME
      |--------------------------------------------------------------------------
      */

      function applyTheme() {

        let dark = false;

        if (theme === 'dark') {

          dark = true;

        } else if (theme === 'light') {

          dark = false;

        } else {

          dark =
            window.matchMedia(
              '(prefers-color-scheme: dark)'
            ).matches;

        }

        root.classList.toggle('dark', dark);

        root.style.colorScheme =
          dark ? 'dark' : 'light';

      }


      applyTheme();


      /*
      |--------------------------------------------------------------------------
      | SYSTEM THEME
      |--------------------------------------------------------------------------
      */

      const media =
        window.matchMedia(
          '(prefers-color-scheme: dark)'
        );

      media.addEventListener(
        'change',
        function() {

          if (theme === 'system') {
            applyTheme();
          }

        }
      );

    })();
  </script>


  {{-- =====================================================
         VITE
    ====================================================== --}}

  @vite([
  'resources/css/app.css',
  'resources/js/app.js'
  ])


  {{-- =====================================================
         LUCIDE
    ====================================================== --}}

  <script src="https://unpkg.com/lucide@latest"></script>

</head>


<body
  class="
        min-h-screen
        bg-slate-50
        text-slate-900
        antialiased
        dark:bg-slate-950
        dark:text-slate-100
    ">


  {{-- =====================================================
         ADMIN SIDEBAR
    ====================================================== --}}

  <x-partials.circle.admin.sidebar />


  {{-- =====================================================
         MAIN APPLICATION
    ====================================================== --}}

  <div class="min-h-screen lg:pl-[280px]">


    {{-- =================================================
             ADMIN TOPBAR
        ================================================== --}}

    <x-partials.circle.admin.topbar />


    {{-- =================================================
             PAGE CONTENT
        ================================================== --}}

    <main class="p-4 sm:p-6 lg:p-8">

      {{ $slot }}

    </main>

  </div>


  {{-- =====================================================
         MOBILE SIDEBAR
    ====================================================== --}}

  <script>
    document.addEventListener('DOMContentLoaded', function() {

      const sidebar =
        document.getElementById(
          'circle-admin-sidebar'
        );

      const overlay =
        document.getElementById(
          'circle-sidebar-overlay'
        );

      const openButton =
        document.getElementById(
          'circle-sidebar-open'
        );

      const closeButton =
        document.getElementById(
          'circle-sidebar-close'
        );


      /*
      |--------------------------------------------------------------------------
      | OPEN SIDEBAR
      |--------------------------------------------------------------------------
      */

      function openSidebar() {

        sidebar?.classList.remove(
          '-translate-x-full'
        );

        overlay?.classList.remove(
          'hidden'
        );

        document.body.classList.add(
          'overflow-hidden'
        );

      }


      /*
      |--------------------------------------------------------------------------
      | CLOSE SIDEBAR
      |--------------------------------------------------------------------------
      */

      function closeSidebar() {

        sidebar?.classList.add(
          '-translate-x-full'
        );

        overlay?.classList.add(
          'hidden'
        );

        document.body.classList.remove(
          'overflow-hidden'
        );

      }


      /*
      |--------------------------------------------------------------------------
      | EVENTS
      |--------------------------------------------------------------------------
      */

      openButton?.addEventListener(
        'click',
        openSidebar
      );


      closeButton?.addEventListener(
        'click',
        closeSidebar
      );


      overlay?.addEventListener(
        'click',
        closeSidebar
      );


      /*
      |--------------------------------------------------------------------------
      | RESPONSIVE SIDEBAR
      |--------------------------------------------------------------------------
      */

      window.addEventListener(
        'resize',
        function() {

          if (window.innerWidth >= 1024) {

            overlay?.classList.add(
              'hidden'
            );

            sidebar?.classList.remove(
              '-translate-x-full'
            );

            document.body.classList.remove(
              'overflow-hidden'
            );

          } else {

            sidebar?.classList.add(
              '-translate-x-full'
            );

          }

        }
      );

    });
  </script>

</body>

</html>