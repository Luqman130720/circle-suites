<x-layouts.circle.admin>

    <x-slot name="title">
        Circle Dashboard
    </x-slot>

    <x-slot name="pageTitle">
        {{ __('navigation.dashboard') }}
    </x-slot>

    @php
    /*
    |--------------------------------------------------------------------------
    | USER STATISTICS
    |--------------------------------------------------------------------------
    */

    $totalUsers = \App\Models\User::count();

    $activeUsers = \App\Models\User::whereIn('status', [
    'active',
    'approved',
    ])->count();

    $pendingUsers = \App\Models\User::where(
    'status',
    'pending'
    )->count();

    $inactiveUsers = \App\Models\User::where(
    'status',
    'inactive'
    )->count();


    /*
    |--------------------------------------------------------------------------
    | RECENT USERS
    |--------------------------------------------------------------------------
    */

    $recentUsers = \App\Models\User::query()
    ->latest()
    ->take(6)
    ->get();


    /*
    |--------------------------------------------------------------------------
    | USER STATUS PERCENTAGE
    |--------------------------------------------------------------------------
    */

    $activePercentage = $totalUsers > 0
    ? round(($activeUsers / $totalUsers) * 100)
    : 0;

    $pendingPercentage = $totalUsers > 0
    ? round(($pendingUsers / $totalUsers) * 100)
    : 0;

    $inactivePercentage = $totalUsers > 0
    ? round(($inactiveUsers / $totalUsers) * 100)
    : 0;


    /*
    |--------------------------------------------------------------------------
    | DATE / GREETING
    |--------------------------------------------------------------------------
    */

    $hour = now()->hour;

    $greeting = match (true) {
    $hour < 12=> __('dashboard.good_morning'),
        $hour < 18=> __('dashboard.good_afternoon'),
            default => __('dashboard.good_evening'),
            };
            @endphp


            {{-- =========================================================
        DASHBOARD ROOT
    ========================================================== --}}

            <div class="flex min-h-[calc(100vh-4rem)] flex-col bg-slate-50 dark:bg-slate-950">

                {{-- =====================================================
            MAIN CONTENT
        ====================================================== --}}

                <main class="relative flex-1 overflow-hidden">

                    {{-- Ambient background --}}

                    <div
                        class="pointer-events-none absolute -left-40 -top-40 h-96 w-96 rounded-full bg-primary/[0.07] blur-3xl">
                    </div>

                    <div
                        class="pointer-events-none absolute -right-32 top-20 h-80 w-80 rounded-full bg-cyan-500/[0.06] blur-3xl">
                    </div>


                    {{-- Subtle grid --}}

                    <div
                        class="pointer-events-none absolute inset-0 opacity-40
                    [background-image:linear-gradient(rgba(148,163,184,0.035)_1px,transparent_1px),linear-gradient(90deg,rgba(148,163,184,0.035)_1px,transparent_1px)]
                    [background-size:48px_48px]
                    [mask-image:linear-gradient(to_bottom,black_0%,transparent_75%)]">
                    </div>


                    <div class="relative mx-auto w-full max-w-[1600px] px-4 py-5 sm:px-6 lg:px-8">


                        {{-- =================================================
                    PAGE HEADER / WELCOME
                ================================================== --}}

                        <section
                            class="relative mb-5 overflow-hidden rounded-2xl border border-slate-200/80 bg-white/85 px-5 py-5 shadow-sm backdrop-blur-xl dark:border-white/10 dark:bg-white/[0.045] sm:px-6">

                            {{-- Card glow --}}

                            <div
                                class="pointer-events-none absolute -right-20 -top-24 h-64 w-64 rounded-full bg-primary/[0.08] blur-3xl">
                            </div>

                            <div
                                class="pointer-events-none absolute -bottom-28 left-1/3 h-56 w-56 rounded-full bg-cyan-500/[0.06] blur-3xl">
                            </div>


                            <div class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">


                                {{-- Welcome content --}}

                                <div class="min-w-0">


                                    {{-- Workspace badge --}}

                                    <div
                                        class="mb-3 inline-flex items-center gap-2 rounded-full border border-primary/15 bg-primary/[0.07] px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-primary">

                                        <span class="relative flex h-1.5 w-1.5">

                                            <span
                                                class="absolute inline-flex h-full w-full animate-ping rounded-full bg-primary opacity-60">
                                            </span>

                                            <span
                                                class="relative inline-flex h-1.5 w-1.5 rounded-full bg-primary">
                                            </span>

                                        </span>

                                        {{ __('navigation.circle') }} Workspace

                                    </div>


                                    {{-- Heading --}}

                                    <h1
                                        class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white sm:text-3xl">

                                        {{ $greeting }},

                                        <span
                                            class="bg-gradient-to-r from-primary via-blue-500 to-cyan-400 bg-clip-text text-transparent">

                                            {{ auth()->user()->name }}

                                        </span>

                                    </h1>


                                    <p
                                        class="mt-1.5 max-w-2xl text-xs leading-5 text-slate-500 dark:text-slate-400 sm:text-sm">

                                        {{ __('dashboard.workspace_description') }}

                                    </p>


                                    {{-- Hero actions --}}

                                    <div class="mt-4 flex flex-wrap gap-2">

                                        <a
                                            href="{{ route('circle.user.management') }}"
                                            class="inline-flex items-center gap-2 rounded-lg bg-gradient-to-r from-primary to-blue-600 px-3.5 py-2 text-xs font-semibold text-white shadow-sm shadow-primary/20 transition hover:-translate-y-0.5 hover:shadow-md">

                                            <i
                                                data-lucide="users"
                                                class="h-3.5 w-3.5">
                                            </i>

                                            {{ __('dashboard.manage_users') }}

                                        </a>


                                        @if ($pendingUsers > 0)

                                        <a
                                            href="{{ route('circle.user.approval') }}"
                                            class="inline-flex items-center gap-2 rounded-lg border border-amber-500/20 bg-amber-500/[0.07] px-3.5 py-2 text-xs font-semibold text-amber-600 transition hover:bg-amber-500/10 dark:text-amber-400">

                                            <i
                                                data-lucide="user-check"
                                                class="h-3.5 w-3.5">
                                            </i>

                                            {{ __('dashboard.review_pending', ['count' => $pendingUsers]) }}

                                        </a>

                                        @endif

                                    </div>

                                </div>


                                {{-- Date card --}}

                                <div
                                    class="shrink-0 rounded-xl border border-slate-200/80 bg-slate-50/70 px-4 py-3 dark:border-white/10 dark:bg-slate-950/40">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-primary/10 text-primary">

                                            <i
                                                data-lucide="calendar-days"
                                                class="h-4 w-4">
                                            </i>

                                        </div>

                                        <div>

                                            <p
                                                class="text-[9px] font-bold uppercase tracking-wider text-slate-400">

                                                {{ __('common.today') }}

                                            </p>

                                            <p
                                                class="mt-0.5 text-xs font-semibold text-slate-800 dark:text-slate-200">

                                                {{ now()->format('d M Y') }}

                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- =================================================
                    STATISTICS
                ================================================== --}}

                        <section
                            class="mb-5 grid grid-cols-1 gap-3 sm:grid-cols-2 xl:grid-cols-4">


                            {{-- TOTAL USERS --}}

                            <div
                                class="group relative overflow-hidden rounded-xl border border-slate-200/80 bg-white/85 p-4 shadow-sm backdrop-blur-xl transition duration-200 hover:-translate-y-0.5 hover:shadow-md dark:border-white/10 dark:bg-white/[0.045]">

                                <div
                                    class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-primary/[0.08] blur-2xl">
                                </div>

                                <div class="relative">

                                    <div class="flex items-start justify-between">

                                        <div>

                                            <p
                                                class="text-[10px] font-bold uppercase tracking-wider text-slate-400">

                                                {{ __('dashboard.total_users') }}

                                            </p>

                                            <p
                                                class="mt-2 text-2xl font-bold tracking-tight text-slate-900 dark:text-white">

                                                {{ number_format($totalUsers) }}

                                            </p>

                                        </div>

                                        <div
                                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-primary/10 text-primary">

                                            <i
                                                data-lucide="users"
                                                class="h-4 w-4">
                                            </i>

                                        </div>

                                    </div>

                                    <div class="mt-2.5 flex items-center gap-1.5">

                                        <span class="h-1.5 w-1.5 rounded-full bg-primary"></span>

                                        <span class="text-[10px] text-slate-500 dark:text-slate-400">
                                            {{ __('dashboard.registered_accounts') }}
                                        </span>

                                    </div>

                                </div>

                            </div>


                            {{-- ACTIVE USERS --}}

                            <div
                                class="group relative overflow-hidden rounded-xl border border-slate-200/80 bg-white/85 p-4 shadow-sm backdrop-blur-xl transition duration-200 hover:-translate-y-0.5 hover:shadow-md dark:border-white/10 dark:bg-white/[0.045]">

                                <div
                                    class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-emerald-500/[0.08] blur-2xl">
                                </div>

                                <div class="relative">

                                    <div class="flex items-start justify-between">

                                        <div>

                                            <p
                                                class="text-[10px] font-bold uppercase tracking-wider text-slate-400">

                                                {{ __('dashboard.active_users') }}

                                            </p>

                                            <p
                                                class="mt-2 text-2xl font-bold tracking-tight text-slate-900 dark:text-white">

                                                {{ number_format($activeUsers) }}

                                            </p>

                                        </div>

                                        <div
                                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-500/10 text-emerald-500">

                                            <i
                                                data-lucide="user-check"
                                                class="h-4 w-4">
                                            </i>

                                        </div>

                                    </div>

                                    <div class="mt-2.5 flex items-center justify-between">

                                        <span class="text-[10px] text-slate-500 dark:text-slate-400">
                                            {{ __('dashboard.active_accounts') }}
                                        </span>

                                        <span class="text-[10px] font-bold text-emerald-500">
                                            {{ $activePercentage }}%
                                        </span>

                                    </div>

                                    {{-- Progress bar --}}

                                    <div
                                        class="mt-1.5 h-1 overflow-hidden rounded-full bg-slate-100 dark:bg-white/10">

                                        <div
                                            class="dashboard-progress-bar h-full rounded-full bg-emerald-500 transition-all duration-700"
                                            data-progress="{{ $activePercentage }}">
                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- PENDING --}}

                            <div
                                class="group relative overflow-hidden rounded-xl border border-slate-200/80 bg-white/85 p-4 shadow-sm backdrop-blur-xl transition duration-200 hover:-translate-y-0.5 hover:shadow-md dark:border-white/10 dark:bg-white/[0.045]">

                                <div
                                    class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-amber-500/[0.08] blur-2xl">
                                </div>

                                <div class="relative">

                                    <div class="flex items-start justify-between">

                                        <div>

                                            <p
                                                class="text-[10px] font-bold uppercase tracking-wider text-slate-400">

                                                {{ __('dashboard.pending_users') }}

                                            </p>

                                            <p
                                                class="mt-2 text-2xl font-bold tracking-tight text-slate-900 dark:text-white">

                                                {{ number_format($pendingUsers) }}

                                            </p>

                                        </div>

                                        <div
                                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-amber-500/10 text-amber-500">

                                            <i
                                                data-lucide="clock-3"
                                                class="h-4 w-4">
                                            </i>

                                        </div>

                                    </div>

                                    <div class="mt-2.5 flex items-center gap-1.5">

                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>

                                        <span class="text-[10px] text-slate-500 dark:text-slate-400">
                                            {{ __('dashboard.waiting_for_review') }}
                                        </span>

                                    </div>

                                </div>

                            </div>


                            {{-- INACTIVE --}}

                            <div
                                class="group relative overflow-hidden rounded-xl border border-slate-200/80 bg-white/85 p-4 shadow-sm backdrop-blur-xl transition duration-200 hover:-translate-y-0.5 hover:shadow-md dark:border-white/10 dark:bg-white/[0.045]">

                                <div
                                    class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-slate-500/[0.08] blur-2xl">
                                </div>

                                <div class="relative">

                                    <div class="flex items-start justify-between">

                                        <div>

                                            <p
                                                class="text-[10px] font-bold uppercase tracking-wider text-slate-400">

                                                {{ __('dashboard.inactive_users') }}

                                            </p>

                                            <p
                                                class="mt-2 text-2xl font-bold tracking-tight text-slate-900 dark:text-white">

                                                {{ number_format($inactiveUsers) }}

                                            </p>

                                        </div>

                                        <div
                                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-500/10 text-slate-500">

                                            <i
                                                data-lucide="user-x"
                                                class="h-4 w-4">
                                            </i>

                                        </div>

                                    </div>

                                    <div class="mt-2.5 flex items-center gap-1.5">

                                        <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>

                                        <span class="text-[10px] text-slate-500 dark:text-slate-400">
                                            {{ __('dashboard.currently_inactive') }}
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- =================================================
                    OVERVIEW + QUICK ACTIONS
                ================================================== --}}

                        <section
                            class="mb-5 grid grid-cols-1 gap-4 xl:grid-cols-3">


                            {{-- USER OVERVIEW --}}

                            <div
                                class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white/85 shadow-sm backdrop-blur-xl dark:border-white/10 dark:bg-white/[0.045] xl:col-span-2">

                                <div
                                    class="flex items-start justify-between border-b border-slate-200/80 px-5 py-4 dark:border-white/10">

                                    <div class="flex items-center gap-2">

                                        <span
                                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary/10 text-primary">

                                            <i
                                                data-lucide="activity"
                                                class="h-4 w-4">
                                            </i>

                                        </span>

                                        <div>

                                            <h3
                                                class="text-sm font-bold text-slate-900 dark:text-white">

                                                {{ __('dashboard.user_overview') }}

                                            </h3>

                                            <p
                                                class="mt-0.5 text-[11px] text-slate-500 dark:text-slate-400">

                                                {{ __('dashboard.user_overview_description') }}

                                            </p>

                                        </div>

                                    </div>

                                    <span
                                        class="hidden items-center gap-1.5 rounded-full border border-emerald-500/20 bg-emerald-500/[0.04] px-2.5 py-1 text-[9px] font-semibold text-emerald-600 sm:inline-flex dark:text-emerald-400">

                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                        {{ __('dashboard.live_data') }}

                                    </span>

                                </div>


                                <div class="space-y-5 p-5">


                                    {{-- ACTIVE --}}

                                    <div>

                                        <div class="mb-1.5 flex items-center justify-between">

                                            <div class="flex items-center gap-2">

                                                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

                                                <span
                                                    class="text-xs font-semibold text-slate-700 dark:text-slate-300">

                                                    {{ __('common.active') }}

                                                </span>

                                            </div>

                                            <span
                                                class="text-xs font-semibold text-slate-700 dark:text-slate-200">

                                                {{ $activeUsers }}

                                                <span class="font-normal text-slate-400">
                                                    ({{ $activePercentage }}%)
                                                </span>

                                            </span>

                                        </div>

                                        <div
                                            class="h-1.5 overflow-hidden rounded-full bg-slate-100 dark:bg-white/10">

                                            <div
                                                class="dashboard-progress-bar h-full rounded-full bg-emerald-500 transition-all duration-700"
                                                data-progress="{{ $activePercentage }}">
                                            </div>

                                        </div>

                                    </div>


                                    {{-- PENDING --}}

                                    <div>

                                        <div class="mb-1.5 flex items-center justify-between">

                                            <div class="flex items-center gap-2">

                                                <span class="h-2 w-2 rounded-full bg-amber-500"></span>

                                                <span
                                                    class="text-xs font-semibold text-slate-700 dark:text-slate-300">

                                                    {{ __('common.pending') }}

                                                </span>

                                            </div>

                                            <span
                                                class="text-xs font-semibold text-slate-700 dark:text-slate-200">

                                                {{ $pendingUsers }}

                                                <span class="font-normal text-slate-400">
                                                    ({{ $pendingPercentage }}%)
                                                </span>

                                            </span>

                                        </div>

                                        <div
                                            class="h-1.5 overflow-hidden rounded-full bg-slate-100 dark:bg-white/10">

                                            <div
                                                class="dashboard-progress-bar h-full rounded-full bg-amber-500 transition-all duration-700"
                                                data-progress="{{ $pendingPercentage }}">
                                            </div>

                                        </div>

                                    </div>


                                    {{-- INACTIVE --}}

                                    <div>

                                        <div class="mb-1.5 flex items-center justify-between">

                                            <div class="flex items-center gap-2">

                                                <span class="h-2 w-2 rounded-full bg-slate-400"></span>

                                                <span
                                                    class="text-xs font-semibold text-slate-700 dark:text-slate-300">

                                                    {{ __('common.inactive') }}

                                                </span>

                                            </div>

                                            <span
                                                class="text-xs font-semibold text-slate-700 dark:text-slate-200">

                                                {{ $inactiveUsers }}

                                                <span class="font-normal text-slate-400">
                                                    ({{ $inactivePercentage }}%)
                                                </span>

                                            </span>

                                        </div>

                                        <div
                                            class="h-1.5 overflow-hidden rounded-full bg-slate-100 dark:bg-white/10">

                                            <div
                                                class="dashboard-progress-bar h-full rounded-full bg-slate-400 transition-all duration-700"
                                                data-progress="{{ $inactivePercentage }}">
                                            </div>

                                        </div>

                                    </div>


                                    {{-- ACCOUNT HEALTH --}}

                                    <div
                                        class="flex items-start gap-3 rounded-xl border border-primary/10 bg-primary/[0.035] p-3.5">

                                        <div
                                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary">

                                            <i
                                                data-lucide="shield-check"
                                                class="h-4 w-4">
                                            </i>

                                        </div>

                                        <div class="min-w-0">

                                            <p
                                                class="text-xs font-bold text-slate-800 dark:text-slate-200">

                                                {{ __('dashboard.workspace_account_health') }}

                                            </p>

                                            <p
                                                class="mt-0.5 text-[11px] leading-5 text-slate-500 dark:text-slate-400">

                                                {{ __('dashboard.active_account_percentage', [
                                            'percentage' => $activePercentage,
                                        ]) }}

                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- QUICK ACTIONS --}}

                            <div
                                class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white/85 shadow-sm backdrop-blur-xl dark:border-white/10 dark:bg-white/[0.045]">

                                <div
                                    class="border-b border-slate-200/80 px-5 py-4 dark:border-white/10">

                                    <div class="flex items-center gap-2">

                                        <span
                                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary/10 text-primary">

                                            <i
                                                data-lucide="zap"
                                                class="h-4 w-4">
                                            </i>

                                        </span>

                                        <div>

                                            <h3
                                                class="text-sm font-bold text-slate-900 dark:text-white">

                                                {{ __('dashboard.quick_actions') }}

                                            </h3>

                                            <p
                                                class="mt-0.5 text-[11px] text-slate-500 dark:text-slate-400">

                                                {{ __('dashboard.quick_actions_description') }}

                                            </p>

                                        </div>

                                    </div>

                                </div>


                                <div class="space-y-2.5 p-4">


                                    {{-- MANAGE USERS --}}

                                    <a
                                        href="{{ route('circle.user.management') }}"
                                        class="group flex items-center gap-3 rounded-xl border border-slate-200/80 bg-slate-50/60 p-3 transition duration-200 hover:border-primary/25 hover:bg-primary/[0.035] dark:border-white/10 dark:bg-white/[0.025] dark:hover:bg-primary/10">

                                        <div
                                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary">

                                            <i
                                                data-lucide="users"
                                                class="h-4 w-4">
                                            </i>

                                        </div>

                                        <div class="min-w-0 flex-1">

                                            <p
                                                class="text-xs font-bold text-slate-800 dark:text-slate-200">

                                                {{ __('dashboard.manage_users') }}

                                            </p>

                                            <p
                                                class="mt-0.5 truncate text-[10px] text-slate-500 dark:text-slate-400">

                                                {{ __('dashboard.view_manage_accounts') }}

                                            </p>

                                        </div>

                                        <i
                                            data-lucide="arrow-up-right"
                                            class="h-3.5 w-3.5 text-slate-400 transition group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:text-primary">
                                        </i>

                                    </a>


                                    {{-- APPROVAL --}}

                                    <a
                                        href="{{ route('circle.user.approval') }}"
                                        class="group flex items-center gap-3 rounded-xl border border-amber-500/10 bg-amber-500/[0.035] p-3 transition duration-200 hover:border-amber-500/25 hover:bg-amber-500/[0.06] dark:border-amber-500/10">

                                        <div
                                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-amber-500/10 text-amber-500">

                                            <i
                                                data-lucide="user-check"
                                                class="h-4 w-4">
                                            </i>

                                        </div>

                                        <div class="min-w-0 flex-1">

                                            <p
                                                class="text-xs font-bold text-slate-800 dark:text-slate-200">

                                                {{ __('dashboard.user_approval') }}

                                            </p>

                                            <p
                                                class="mt-0.5 text-[10px] text-slate-500 dark:text-slate-400">

                                                {{ __('dashboard.accounts_waiting', [
                                            'count' => $pendingUsers,
                                        ]) }}

                                            </p>

                                        </div>

                                        @if ($pendingUsers > 0)

                                        <span
                                            class="inline-flex min-w-5 items-center justify-center rounded-full bg-amber-500 px-1.5 py-0.5 text-[9px] font-bold text-white">

                                            {{ $pendingUsers }}

                                        </span>

                                        @endif

                                    </a>


                                    {{-- SYSTEM SETTINGS --}}

                                    <button
                                        type="button"
                                        class="group flex w-full items-center gap-3 rounded-xl border border-slate-200/80 bg-slate-50/60 p-3 text-left transition duration-200 hover:border-slate-300 hover:bg-slate-100/70 dark:border-white/10 dark:bg-white/[0.025] dark:hover:bg-white/[0.055]">

                                        <div
                                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-slate-500/10 text-slate-500 dark:text-slate-400">

                                            <i
                                                data-lucide="settings-2"
                                                class="h-4 w-4">
                                            </i>

                                        </div>

                                        <div class="min-w-0 flex-1">

                                            <p
                                                class="text-xs font-bold text-slate-800 dark:text-slate-200">

                                                {{ __('dashboard.system_settings') }}

                                            </p>

                                            <p
                                                class="mt-0.5 truncate text-[10px] text-slate-500 dark:text-slate-400">

                                                {{ __('dashboard.configure_workspace') }}

                                            </p>

                                        </div>

                                        <i
                                            data-lucide="chevron-right"
                                            class="h-3.5 w-3.5 text-slate-400">
                                        </i>

                                    </button>

                                </div>

                            </div>

                        </section>


                        {{-- =================================================
                    RECENT USERS
                ================================================== --}}

                        <section
                            class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white/85 shadow-sm backdrop-blur-xl dark:border-white/10 dark:bg-white/[0.045]">


                            {{-- Header --}}

                            <div
                                class="flex flex-col gap-3 border-b border-slate-200/80 px-5 py-4 sm:flex-row sm:items-center sm:justify-between dark:border-white/10">

                                <div class="flex items-center gap-2">

                                    <span
                                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary/10 text-primary">

                                        <i
                                            data-lucide="users-round"
                                            class="h-4 w-4">
                                        </i>

                                    </span>

                                    <div>

                                        <h3
                                            class="text-sm font-bold text-slate-900 dark:text-white">

                                            {{ __('dashboard.recent_users') }}

                                        </h3>

                                        <p
                                            class="mt-0.5 text-[11px] text-slate-500 dark:text-slate-400">

                                            {{ __('dashboard.recent_users_description') }}

                                        </p>

                                    </div>

                                </div>


                                <a
                                    href="{{ route('circle.user.management') }}"
                                    class="inline-flex items-center gap-1.5 self-start rounded-lg border border-primary/15 bg-primary/[0.04] px-3 py-1.5 text-[10px] font-semibold text-primary transition hover:bg-primary/10 sm:self-auto">

                                    {{ __('common.view_all') }}

                                    <i
                                        data-lucide="arrow-up-right"
                                        class="h-3 w-3">
                                    </i>

                                </a>

                            </div>


                            {{-- Table --}}

                            <div class="overflow-x-auto">

                                <table class="w-full min-w-[820px]">

                                    <thead>

                                        <tr
                                            class="border-b border-slate-200/80 bg-slate-50/50 dark:border-white/10 dark:bg-white/[0.015]">

                                            <th
                                                class="px-5 py-3 text-left text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">

                                                {{ __('dashboard.user') }}

                                            </th>

                                            <th
                                                class="px-5 py-3 text-left text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">

                                                {{ __('common.employee_id') }}

                                            </th>

                                            <th
                                                class="px-5 py-3 text-left text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">

                                                {{ __('common.division') }}

                                            </th>

                                            <th
                                                class="px-5 py-3 text-left text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">

                                                {{ __('common.role') }}

                                            </th>

                                            <th
                                                class="px-5 py-3 text-left text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">

                                                {{ __('common.status') }}

                                            </th>

                                            <th
                                                class="px-5 py-3 text-right text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">

                                                {{ __('dashboard.registered') }}

                                            </th>

                                        </tr>

                                    </thead>


                                    <tbody class="divide-y divide-slate-200/60 dark:divide-white/5">

                                        @forelse ($recentUsers as $recentUser)

                                        @php
                                        $statusClasses = match ($recentUser->status) {
                                        'active',
                                        'approved'
                                        => 'bg-emerald-500/10 text-emerald-600 ring-emerald-500/20 dark:text-emerald-400',

                                        'pending'
                                        => 'bg-amber-500/10 text-amber-600 ring-amber-500/20 dark:text-amber-400',

                                        'inactive'
                                        => 'bg-slate-500/10 text-slate-500 ring-slate-500/20 dark:text-slate-400',

                                        'rejected'
                                        => 'bg-red-500/10 text-red-600 ring-red-500/20 dark:text-red-400',

                                        default
                                        => 'bg-slate-500/10 text-slate-500 ring-slate-500/20 dark:text-slate-400',
                                        };
                                        @endphp


                                        <tr
                                            class="group transition hover:bg-slate-50/60 dark:hover:bg-white/[0.025]">

                                            {{-- USER --}}

                                            <td class="px-5 py-3">

                                                <div class="flex items-center gap-2.5">

                                                    @if ($recentUser->profile_photo)

                                                    <img
                                                        src="{{ \Illuminate\Support\Facades\Storage::url($recentUser->profile_photo) }}"
                                                        alt="{{ $recentUser->name }}"
                                                        class="h-8 w-8 shrink-0 rounded-lg object-cover ring-1 ring-slate-200 dark:ring-white/10">

                                                    @else

                                                    <div
                                                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-[10px] font-bold text-primary">

                                                        {{ strtoupper(substr($recentUser->name, 0, 1)) }}

                                                    </div>

                                                    @endif


                                                    <div class="min-w-0">

                                                        <p
                                                            class="max-w-[220px] truncate text-xs font-semibold text-slate-800 dark:text-slate-200">

                                                            {{ $recentUser->name }}

                                                        </p>

                                                        <p
                                                            class="max-w-[220px] truncate text-[10px] text-slate-500 dark:text-slate-400">

                                                            {{ $recentUser->email }}

                                                        </p>

                                                    </div>

                                                </div>

                                            </td>


                                            {{-- EMPLOYEE ID --}}

                                            <td
                                                class="px-5 py-3 text-[11px] text-slate-600 dark:text-slate-400">

                                                {{ $recentUser->employee_id ?? '—' }}

                                            </td>


                                            {{-- DIVISION --}}

                                            <td
                                                class="px-5 py-3 text-[11px] text-slate-600 dark:text-slate-400">

                                                {{ $recentUser->division ?? '—' }}

                                            </td>


                                            {{-- ROLE --}}

                                            <td
                                                class="px-5 py-3 text-[11px] text-slate-600 dark:text-slate-400">

                                                {{ $recentUser->role
                                                ? ucwords(str_replace('_', ' ', $recentUser->role))
                                                : '—' }}

                                            </td>


                                            {{-- STATUS --}}

                                            <td class="px-5 py-3">

                                                <span
                                                    class="inline-flex items-center gap-1.5 rounded-full px-2 py-0.5 text-[9px] font-semibold capitalize ring-1 ring-inset {{ $statusClasses }}">

                                                    <span class="h-1.5 w-1.5 rounded-full bg-current"></span>

                                                    {{ __('common.' . $recentUser->status, [], app()->getLocale()) }}

                                                </span>

                                            </td>


                                            {{-- DATE --}}

                                            <td
                                                class="px-5 py-3 text-right text-[10px] text-slate-400">

                                                {{ $recentUser->created_at?->format('d M Y') ?? '—' }}

                                            </td>

                                        </tr>


                                        @empty

                                        <tr>

                                            <td
                                                colspan="6"
                                                class="px-5 py-12 text-center">

                                                <div
                                                    class="mx-auto flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100 text-slate-400 dark:bg-white/5">

                                                    <i
                                                        data-lucide="users"
                                                        class="h-5 w-5">
                                                    </i>

                                                </div>

                                                <p
                                                    class="mt-3 text-xs font-semibold text-slate-700 dark:text-slate-300">

                                                    {{ __('dashboard.no_users') }}

                                                </p>

                                                <p class="mt-1 text-[10px] text-slate-400">

                                                    {{ __('dashboard.registered_users_appear_here') }}

                                                </p>

                                            </td>

                                        </tr>

                                        @endforelse

                                    </tbody>

                                </table>

                            </div>

                        </section>

                    </div>

                </main>


                {{-- =====================================================
            FOOTER
        ====================================================== --}}

                <footer
                    class="mt-auto border-t border-slate-200/70 bg-white/60 dark:border-white/10 dark:bg-white/[0.02]">

                    <div
                        class="mx-auto flex min-h-11 w-full max-w-[1600px] flex-col items-center justify-between gap-2 px-4 py-3 text-[10px] text-slate-400 sm:flex-row sm:px-6 lg:px-8">

                        <div class="flex items-center gap-2">

                            <span class="relative flex h-1.5 w-1.5">

                                <span
                                    class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-500 opacity-50">
                                </span>

                                <span
                                    class="relative inline-flex h-1.5 w-1.5 rounded-full bg-emerald-500">
                                </span>

                            </span>

                            {{ __('dashboard.operational') }}

                        </div>

                        <span>
                            {{ __('dashboard.tagline') }}
                        </span>

                    </div>

                </footer>

            </div>


            {{-- =========================================================
        DASHBOARD SCRIPTS
    ========================================================== --}}

            <script>
                document.addEventListener('DOMContentLoaded', function() {

                    /*
                    |--------------------------------------------------------------------------
                    | LUCIDE ICONS
                    |--------------------------------------------------------------------------
                    */

                    function initializeLucide() {

                        if (
                            typeof lucide === 'undefined' ||
                            typeof lucide.createIcons !== 'function'
                        ) {
                            return;
                        }

                        requestAnimationFrame(function() {
                            lucide.createIcons();
                        });
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | PROGRESS BARS
                    |--------------------------------------------------------------------------
                    */

                    function initializeProgressBars() {

                        document
                            .querySelectorAll('.dashboard-progress-bar')
                            .forEach(function(bar) {

                                const percentage = Number(
                                    bar.dataset.progress
                                ) || 0;

                                const safePercentage = Math.min(
                                    Math.max(percentage, 0),
                                    100
                                );

                                requestAnimationFrame(function() {

                                    bar.style.width = safePercentage + '%';

                                });

                            });
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | INITIALIZE
                    |--------------------------------------------------------------------------
                    */

                    initializeLucide();
                    initializeProgressBars();

                });
            </script>

</x-layouts.circle.admin>