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

  {{-- Theme --}}
  <script>
    (function() {
      const root = document.documentElement;
      const theme = "{{ session('theme', 'system') }}";
      const accent = "{{ session('accent_color', 'blue') }}";

      root.dataset.accent = accent;

      function applyTheme() {
        let dark = false;

        if (theme === 'dark') {
          dark = true;
        } else if (theme === 'light') {
          dark = false;
        } else {
          dark = window.matchMedia(
            '(prefers-color-scheme: dark)'
          ).matches;
        }

        root.classList.toggle('dark', dark);
        root.style.colorScheme = dark ? 'dark' : 'light';
      }

      applyTheme();

      const media = window.matchMedia(
        '(prefers-color-scheme: dark)'
      );

      media.addEventListener('change', function() {
        if (theme === 'system') {
          applyTheme();
        }
      });
    })();
  </script>

  {{-- Vite --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- Lucide --}}
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

  <x-partials.circle.installer.sidebar />

  <div class="min-h-screen lg:pl-[280px]">

    <x-partials.circle.installer.topbar />

    <main class="p-4 sm:p-6 lg:p-8">
      {{ $slot }}
    </main>

  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const sidebar = document.getElementById(
        'circle-installer-sidebar'
      );

      const overlay = document.getElementById(
        'circle-installer-sidebar-overlay'
      );

      const openButton = document.getElementById(
        'circle-installer-sidebar-open'
      );

      const closeButton = document.getElementById(
        'circle-installer-sidebar-close'
      );

      function openSidebar() {
        sidebar?.classList.remove('-translate-x-full');
        overlay?.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
      }

      function closeSidebar() {
        sidebar?.classList.add('-translate-x-full');
        overlay?.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
      }

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

      window.addEventListener('resize', function() {
        if (window.innerWidth >= 1024) {
          overlay?.classList.add('hidden');
          sidebar?.classList.remove('-translate-x-full');
          document.body.classList.remove('overflow-hidden');
        } else {
          sidebar?.classList.add('-translate-x-full');
        }
      });

      function initializeLucide() {
        if (
          typeof lucide === 'undefined' ||
          typeof lucide.createIcons !== 'function'
        ) {
          return;
        }

        lucide.createIcons();
      }

      initializeLucide();
    });
  </script>

</body>

</html>