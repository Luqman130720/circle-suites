@php
$user = auth()->user();

$pendingUsers = \App\Models\User::where('status', 'pending')->count();

$isDashboard = request()->routeIs('circle.dashboard');
$isUsers = request()->routeIs('circle.user.management');
$isApproval = request()->routeIs('circle.user.approval');
@endphp

<aside
  id="circle-admin-sidebar"
  class="fixed inset-y-0 left-0 z-50 flex w-[280px] -translate-x-full flex-col
           border-r border-slate-200/80
           bg-white/95
           backdrop-blur-xl
           transition-all duration-300 ease-in-out
           lg:translate-x-0
           dark:border-slate-800
           dark:bg-slate-950/95">


  {{-- =========================================================
         BRAND
    ========================================================== --}}

  <div
    class="flex h-[76px] shrink-0 items-center
               border-b border-slate-200/80
               px-5
               dark:border-slate-800">

    <a
      href="{{ route('circle.dashboard') }}"
      class="flex min-w-0 items-center gap-3">

      {{-- Logo --}}

      <div
        class="flex h-10 w-10 shrink-0 items-center justify-center
                       rounded-xl
                       bg-primary
                       text-white
                       shadow-lg
                       shadow-primary/20">

        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="21"
          height="21"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">

          <circle
            cx="12"
            cy="12"
            r="9">
          </circle>

          <path d="M8 12h8"></path>

          <path d="M12 8v8"></path>

        </svg>

      </div>


      {{-- Brand Text --}}

      <div class="min-w-0">

        <div
          class="truncate text-[15px] font-bold tracking-tight
                           text-slate-900
                           dark:text-white">

          Circle Suites

        </div>

        <div
          class="mt-0.5 flex items-center gap-1.5">

          <span
            class="h-1.5 w-1.5 rounded-full
                               bg-emerald-500">
          </span>

          <span
            class="text-[10px] font-semibold uppercase
                               tracking-[0.16em]
                               text-slate-400">

            {{ __('common.administration') }}

          </span>

        </div>

      </div>

    </a>


    {{-- Mobile Close --}}

    <button
      type="button"
      id="circle-sidebar-close"
      class="ml-auto rounded-lg p-2
                   text-slate-400
                   transition
                   hover:bg-slate-100
                   hover:text-slate-700
                   lg:hidden
                   dark:hover:bg-slate-800
                   dark:hover:text-white"
      aria-label="{{ __('common.close') }}">

      <i
        data-lucide="x"
        class="h-5 w-5">
      </i>

    </button>

  </div>


  {{-- =========================================================
         WORKSPACE
    ========================================================== --}}

  <div class="px-4 pt-5">

    <div
      class="rounded-2xl
                   border border-slate-200
                   bg-slate-50/80
                   p-3
                   transition
                   dark:border-slate-800
                   dark:bg-slate-900/60">

      <div class="flex items-center gap-3">

        {{-- Workspace Icon --}}

        <div
          class="flex h-9 w-9 shrink-0 items-center
                           justify-center rounded-xl
                           bg-primary/10
                           text-primary">

          <i
            data-lucide="layers-3"
            class="h-[18px] w-[18px]">
          </i>

        </div>


        {{-- Workspace Info --}}

        <div class="min-w-0 flex-1">

          <p
            class="text-[11px] font-medium uppercase
                               tracking-wider
                               text-slate-400">

            {{ __('common.workspace') }}

          </p>

          <p
            class="truncate text-sm font-semibold
                               text-slate-800
                               dark:text-slate-100">

            {{ __('navigation.project_operations') }}

          </p>

        </div>


        {{-- Live Status --}}

        <span
          class="rounded-md
                           bg-emerald-50
                           px-1.5 py-1
                           text-[9px] font-bold uppercase
                           text-emerald-600
                           dark:bg-emerald-500/10
                           dark:text-emerald-400">

          {{ __('common.live') }}

        </span>

      </div>

    </div>

  </div>


  {{-- =========================================================
         NAVIGATION
    ========================================================== --}}

  <div
    class="mt-6 flex-1 overflow-y-auto px-4 pb-5">


    {{-- =====================================================
             OVERVIEW
        ====================================================== --}}

    <div
      class="mb-3 px-3 text-[10px] font-bold uppercase
                   tracking-[0.16em]
                   text-slate-400">

      {{ __('common.overview') }}

    </div>


    <nav class="space-y-1">

      {{-- Dashboard --}}

      <a
        href="{{ route('circle.dashboard') }}"
        class="group flex items-center gap-3 rounded-xl
                       px-3 py-2.5 text-sm font-medium transition
                       {{ $isDashboard
                            ? 'bg-primary text-white shadow-md shadow-primary/20'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-400 dark:hover:bg-slate-900 dark:hover:text-white' }}">

        <span
          class="flex h-8 w-8 shrink-0 items-center
                           justify-center rounded-lg
                           {{ $isDashboard
                                ? 'bg-white/15'
                                : 'bg-slate-100 group-hover:bg-slate-200 dark:bg-slate-800 dark:group-hover:bg-slate-700' }}">

          <i
            data-lucide="layout-dashboard"
            class="h-[17px] w-[17px]">
          </i>

        </span>


        <span class="flex-1">

          {{ __('navigation.dashboard') }}

        </span>


        @if($isDashboard)

        <span
          class="h-1.5 w-1.5 rounded-full
                               bg-white">
        </span>

        @endif

      </a>

    </nav>


    {{-- =====================================================
             OPERATIONS
        ====================================================== --}}

    <div
      class="mb-3 mt-7 px-3 text-[10px] font-bold uppercase
                   tracking-[0.16em]
                   text-slate-400">

      {{ __('navigation.operations') }}

    </div>


    <nav class="space-y-1">


      {{-- Projects --}}

      <a
        href="#"
        class="group flex items-center gap-3 rounded-xl
                       px-3 py-2.5 text-sm font-medium
                       text-slate-600
                       transition
                       hover:bg-slate-100
                       hover:text-slate-900
                       dark:text-slate-400
                       dark:hover:bg-slate-900
                       dark:hover:text-white">

        <span
          class="flex h-8 w-8 shrink-0 items-center
                           justify-center rounded-lg
                           bg-slate-100
                           transition
                           group-hover:bg-slate-200
                           dark:bg-slate-800
                           dark:group-hover:bg-slate-700">

          <i
            data-lucide="briefcase"
            class="h-[17px] w-[17px]">
          </i>

        </span>


        <span class="flex-1">

          {{ __('navigation.projects') }}

        </span>


        <span
          class="rounded-md
                           bg-slate-100
                           px-1.5 py-0.5
                           text-[9px] font-semibold
                           text-slate-400
                           dark:bg-slate-800">

          {{ __('common.soon') }}

        </span>

      </a>


      {{-- Field Work --}}

      <a
        href="#"
        class="group flex items-center gap-3 rounded-xl
                       px-3 py-2.5 text-sm font-medium
                       text-slate-600
                       transition
                       hover:bg-slate-100
                       hover:text-slate-900
                       dark:text-slate-400
                       dark:hover:bg-slate-900
                       dark:hover:text-white">

        <span
          class="flex h-8 w-8 shrink-0 items-center
                           justify-center rounded-lg
                           bg-slate-100
                           transition
                           group-hover:bg-slate-200
                           dark:bg-slate-800
                           dark:group-hover:bg-slate-700">

          <i
            data-lucide="hard-hat"
            class="h-[17px] w-[17px]">
          </i>

        </span>


        <span class="flex-1">

          {{ __('navigation.field_work') }}

        </span>


        <span
          class="rounded-md
                           bg-slate-100
                           px-1.5 py-0.5
                           text-[9px] font-semibold
                           text-slate-400
                           dark:bg-slate-800">

          {{ __('common.soon') }}

        </span>

      </a>


      {{-- Activities --}}

      <a
        href="#"
        class="group flex items-center gap-3 rounded-xl
                       px-3 py-2.5 text-sm font-medium
                       text-slate-600
                       transition
                       hover:bg-slate-100
                       hover:text-slate-900
                       dark:text-slate-400
                       dark:hover:bg-slate-900
                       dark:hover:text-white">

        <span
          class="flex h-8 w-8 shrink-0 items-center
                           justify-center rounded-lg
                           bg-slate-100
                           transition
                           group-hover:bg-slate-200
                           dark:bg-slate-800
                           dark:group-hover:bg-slate-700">

          <i
            data-lucide="activity"
            class="h-[17px] w-[17px]">
          </i>

        </span>


        <span class="flex-1">

          {{ __('navigation.activities') }}

        </span>


        <span
          class="rounded-md
                           bg-slate-100
                           px-1.5 py-0.5
                           text-[9px] font-semibold
                           text-slate-400
                           dark:bg-slate-800">

          {{ __('common.soon') }}

        </span>

      </a>

    </nav>


    {{-- =====================================================
             MANAGEMENT
        ====================================================== --}}

    <div
      class="mb-3 mt-7 px-3 text-[10px] font-bold uppercase
                   tracking-[0.16em]
                   text-slate-400">

      {{ __('navigation.management') }}

    </div>


    <nav class="space-y-1">


      {{-- Users --}}

      <a
        href="{{ route('circle.user.management') }}"
        class="group flex items-center gap-3 rounded-xl
                       px-3 py-2.5 text-sm font-medium transition
                       {{ $isUsers
                            ? 'bg-primary text-white shadow-md shadow-primary/20'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-400 dark:hover:bg-slate-900 dark:hover:text-white' }}">

        <span
          class="flex h-8 w-8 shrink-0 items-center
                           justify-center rounded-lg
                           {{ $isUsers
                                ? 'bg-white/15'
                                : 'bg-slate-100 group-hover:bg-slate-200 dark:bg-slate-800 dark:group-hover:bg-slate-700' }}">

          <i
            data-lucide="users"
            class="h-[17px] w-[17px]">
          </i>

        </span>


        <span class="flex-1">

          {{ __('navigation.user_management') }}

        </span>

      </a>


      {{-- Approval --}}

      <a
        href="{{ route('circle.user.approval') }}"
        class="group flex items-center gap-3 rounded-xl
                       px-3 py-2.5 text-sm font-medium transition
                       {{ $isApproval
                            ? 'bg-primary text-white shadow-md shadow-primary/20'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-400 dark:hover:bg-slate-900 dark:hover:text-white' }}">

        <span
          class="flex h-8 w-8 shrink-0 items-center
                           justify-center rounded-lg
                           {{ $isApproval
                                ? 'bg-white/15'
                                : 'bg-slate-100 group-hover:bg-slate-200 dark:bg-slate-800 dark:group-hover:bg-slate-700' }}">

          <i
            data-lucide="user-check"
            class="h-[17px] w-[17px]">
          </i>

        </span>


        <span class="flex-1">

          {{ __('navigation.user_approval') }}

        </span>


        @if($pendingUsers > 0)

        <span
          class="min-w-[22px] rounded-full
                               px-1.5 py-0.5
                               text-center text-[10px] font-bold
                               {{ $isApproval
                                    ? 'bg-white text-primary'
                                    : 'bg-amber-100 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400' }}">

          {{ $pendingUsers > 99 ? '99+' : $pendingUsers }}

        </span>

        @endif

      </a>

    </nav>


    {{-- =====================================================
             SYSTEM
        ====================================================== --}}

    <div
      class="mb-3 mt-7 px-3 text-[10px] font-bold uppercase
                   tracking-[0.16em]
                   text-slate-400">

      {{ __('navigation.system') }}

    </div>


    <nav class="space-y-1">


      {{-- Settings --}}

      <a
        href="#"
        class="group flex items-center gap-3 rounded-xl
                       px-3 py-2.5 text-sm font-medium
                       text-slate-600
                       transition
                       hover:bg-slate-100
                       hover:text-slate-900
                       dark:text-slate-400
                       dark:hover:bg-slate-900
                       dark:hover:text-white">

        <span
          class="flex h-8 w-8 shrink-0 items-center
                           justify-center rounded-lg
                           bg-slate-100
                           transition
                           group-hover:bg-slate-200
                           dark:bg-slate-800
                           dark:group-hover:bg-slate-700">

          <i
            data-lucide="settings"
            class="h-[17px] w-[17px]">
          </i>

        </span>


        <span class="flex-1">

          {{ __('navigation.settings') }}

        </span>

      </a>

    </nav>

  </div>


  {{-- =========================================================
         BOTTOM USER
    ========================================================== --}}

  <div
    class="shrink-0
               border-t border-slate-200/80
               p-4
               dark:border-slate-800">


    {{-- User Card --}}

    <div
      class="mb-3 flex items-center gap-3
                   rounded-xl
                   bg-slate-50
                   p-3
                   dark:bg-slate-900">


      @if($user?->profile_photo)

      <img
        src="{{ asset('storage/' . $user->profile_photo) }}"
        alt="{{ $user->name }}"
        class="h-9 w-9 shrink-0 rounded-xl object-cover">

      @else

      <div
        class="flex h-9 w-9 shrink-0 items-center
                           justify-center rounded-xl
                           bg-primary
                           text-xs font-bold
                           text-white">

        {{ strtoupper(substr($user?->name ?? 'A', 0, 1)) }}

      </div>

      @endif


      <div class="min-w-0 flex-1">

        <p
          class="truncate text-xs font-semibold
                           text-slate-800
                           dark:text-slate-100">

          {{ $user?->name ?? __('common.administrator') }}

        </p>

        <p
          class="mt-0.5 truncate text-[10px]
                           text-slate-400">

          {{ ucfirst($user?->role ?? __('common.administrator')) }}

        </p>

      </div>


      <i
        data-lucide="shield-check"
        class="h-4 w-4 shrink-0
                       text-emerald-500">
      </i>

    </div>


    {{-- Logout --}}

    <form
      action="{{ route('login.logout') }}"
      method="POST">

      @csrf

      <button
        type="submit"
        class="flex w-full items-center
                       justify-center gap-2
                       rounded-xl
                       border border-slate-200
                       px-3 py-2.5
                       text-xs font-semibold
                       text-slate-600
                       transition
                       hover:border-red-200
                       hover:bg-red-50
                       hover:text-red-600
                       dark:border-slate-800
                       dark:text-slate-400
                       dark:hover:border-red-900/50
                       dark:hover:bg-red-950/30
                       dark:hover:text-red-400">

        <i
          data-lucide="log-out"
          class="h-4 w-4">
        </i>

        {{ __('common.sign_out') }}

      </button>

    </form>

  </div>

</aside>


{{-- =============================================================
     MOBILE OVERLAY
============================================================= --}}

<div
  id="circle-sidebar-overlay"
  class="fixed inset-0 z-40 hidden
           bg-slate-950/40
           backdrop-blur-sm
           lg:hidden">
</div>