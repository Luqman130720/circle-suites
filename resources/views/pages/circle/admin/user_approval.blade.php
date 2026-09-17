<x-layouts.circle.admin>

    <x-slot name="title">
        {{ __('user_approval.page_title') }}
    </x-slot>


    @php
    /*
    |--------------------------------------------------------------------------
    | PENDING USERS
    |--------------------------------------------------------------------------
    */

    $pendingCount = method_exists($users, 'total')
    ? $users->total()
    : $users->count();
    @endphp


    {{-- ================================================================
        PAGE SHELL
    ================================================================= --}}
    <div
        class="relative flex min-h-[calc(100vh-4rem)] flex-col overflow-hidden bg-slate-50 dark:bg-slate-950">


        {{-- ============================================================
            AMBIENT BACKGROUND
        ============================================================= --}}

        <div class="pointer-events-none absolute inset-0 z-0 overflow-hidden">

            {{-- Primary glow --}}

            <div
                class="absolute -left-40 -top-40 h-96 w-96 rounded-full bg-primary/[0.07] blur-3xl">
            </div>


            {{-- Cyan glow --}}

            <div
                class="absolute -right-32 top-20 h-80 w-80 rounded-full bg-cyan-500/[0.06] blur-3xl">
            </div>


            {{-- Subtle grid --}}

            <div
                class="absolute inset-0 opacity-40
                    [background-image:linear-gradient(rgba(148,163,184,0.035)_1px,transparent_1px),linear-gradient(90deg,rgba(148,163,184,0.035)_1px,transparent_1px)]
                    [background-size:48px_48px]
                    [mask-image:linear-gradient(to_bottom,black_0%,transparent_75%)]">
            </div>

        </div>



        {{-- ============================================================
            MAIN CONTENT
        ============================================================= --}}

        <main class="relative z-10 flex-1 overflow-hidden">

            <div
                class="mx-auto w-full max-w-[1600px] px-4 py-5 sm:px-6 lg:px-8">


                {{-- ====================================================
                    PAGE HEADER
                ===================================================== --}}

                <section
                    class="relative mb-5 overflow-hidden rounded-2xl border border-slate-200/80 bg-white/85 px-5 py-5 shadow-sm backdrop-blur-xl dark:border-white/10 dark:bg-white/[0.045] sm:px-6">


                    {{-- Header glow --}}

                    <div
                        class="pointer-events-none absolute -right-20 -top-24 h-64 w-64 rounded-full bg-amber-500/[0.06] blur-3xl">
                    </div>


                    <div
                        class="pointer-events-none absolute -bottom-28 left-1/3 h-56 w-56 rounded-full bg-cyan-500/[0.05] blur-3xl">
                    </div>


                    <div
                        class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">


                        {{-- LEFT --}}

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


                            {{-- Title --}}

                            <h1
                                class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white sm:text-3xl">

                                {{ __('user_approval.header_title') }}

                            </h1>


                            {{-- Description --}}

                            <p
                                class="mt-1.5 max-w-2xl text-xs leading-5 text-slate-500 dark:text-slate-400 sm:text-sm">

                                {{ __('user_approval.header_description') }}

                            </p>


                            {{-- Header actions / summary --}}

                            <div class="mt-4 flex flex-wrap items-center gap-2">


                                {{-- Pending badge --}}

                                <div
                                    class="inline-flex items-center gap-2 rounded-lg border border-amber-500/20 bg-amber-500/[0.07] px-3 py-2 text-xs font-semibold text-amber-600 dark:text-amber-400">

                                    <span
                                        class="h-1.5 w-1.5 rounded-full bg-amber-500">
                                    </span>

                                    {{ $pendingCount }}
                                    {{ __('user_approval.pending') }}

                                </div>


                                {{-- Management link --}}

                                <a
                                    href="{{ route('circle.user.management') }}"
                                    class="inline-flex items-center gap-2 rounded-lg border border-slate-200/80 bg-white/70 px-3 py-2 text-xs font-semibold text-slate-600 transition hover:border-primary/20 hover:bg-primary/[0.04] hover:text-primary dark:border-white/10 dark:bg-white/[0.025] dark:text-slate-300 dark:hover:bg-primary/10">

                                    <i
                                        data-lucide="users"
                                        class="h-3.5 w-3.5">
                                    </i>

                                    {{ __('dashboard.manage_users') }}

                                </a>

                            </div>

                        </div>


                        {{-- RIGHT STATUS CARD --}}

                        <div
                            class="shrink-0 rounded-xl border border-slate-200/80 bg-slate-50/70 px-4 py-3 dark:border-white/10 dark:bg-slate-950/40">

                            <div class="flex items-center gap-3">

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-lg bg-amber-500/10 text-amber-500">

                                    <i
                                        data-lucide="clock-3"
                                        class="h-4 w-4">
                                    </i>

                                </div>


                                <div>

                                    <p
                                        class="text-[9px] font-bold uppercase tracking-wider text-slate-400">

                                        {{ __('user_approval.status') }}

                                    </p>

                                    <p
                                        class="mt-0.5 text-xs font-semibold text-slate-800 dark:text-slate-200">

                                        {{ __('user_approval.pending_status') }}

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>



                {{-- ====================================================
                    MAIN APPROVAL CARD
                ===================================================== --}}

                <section
                    class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white/85 shadow-sm backdrop-blur-xl dark:border-white/10 dark:bg-white/[0.045]">


                    {{-- =================================================
                        CARD HEADER
                    ================================================== --}}

                    <div
                        class="flex flex-col gap-3 border-b border-slate-200/80 px-5 py-4 sm:flex-row sm:items-center sm:justify-between dark:border-white/10">


                        {{-- LEFT --}}

                        <div class="flex items-center gap-2.5">

                            <div
                                class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary/10 text-primary">

                                <i
                                    data-lucide="user-check"
                                    class="h-4 w-4">
                                </i>

                            </div>


                            <div>

                                <h2
                                    class="text-sm font-bold text-slate-900 dark:text-white">

                                    {{ __('user_approval.header_title') }}

                                </h2>

                                <p
                                    class="mt-0.5 text-[11px] text-slate-500 dark:text-slate-400">

                                    {{ $pendingCount }}
                                    {{ __('user_approval.pending') }}

                                </p>

                            </div>

                        </div>


                        {{-- RIGHT --}}

                        <div
                            class="hidden items-center gap-1.5 text-[10px] font-medium text-slate-400 md:flex">

                            <i
                                data-lucide="shield-check"
                                class="h-3.5 w-3.5">
                            </i>

                            <span>
                                Review access before activation
                            </span>

                        </div>

                    </div>



                    {{-- =================================================
                        FILTER TOOLBAR
                    ================================================== --}}

                    <div
                        class="border-b border-slate-200/70 bg-slate-50/50 px-4 py-3 dark:border-white/10 dark:bg-white/[0.015] sm:px-5">

                        <div
                            class="flex flex-col gap-2.5 xl:flex-row xl:items-center">


                            {{-- SEARCH --}}

                            <div class="relative min-w-0 flex-1">

                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">

                                    <i
                                        data-lucide="search"
                                        class="h-3.5 w-3.5">
                                    </i>

                                </div>


                                <input
                                    type="text"
                                    id="approvalSearch"
                                    autocomplete="off"
                                    class="h-9 w-full rounded-lg border border-slate-200/80 bg-white/80 pl-9 pr-9 text-xs text-slate-800 outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-primary focus:ring-3 focus:ring-primary/10 dark:border-white/[0.07] dark:bg-slate-900/60 dark:text-white dark:placeholder:text-slate-500 dark:hover:border-slate-600"
                                    placeholder="{{ __('user_approval.search_placeholder') }}">

                            </div>



                            {{-- DIVISION --}}

                            <div class="relative xl:w-52">

                                <select
                                    id="approvalDivisionFilter"
                                    class="h-9 w-full appearance-none rounded-lg border border-slate-200/80 bg-white/80 px-3 pr-9 text-xs font-medium text-slate-700 outline-none transition hover:border-slate-300 focus:border-primary focus:ring-3 focus:ring-primary/10 dark:border-white/[0.07] dark:bg-slate-900/60 dark:text-slate-200">

                                    <option value="">
                                        {{ __('user_approval.all_divisions') }}
                                    </option>

                                    <option value="Installer / Technician">
                                        {{ __('user_approval.installer_technician') }}
                                    </option>

                                    <option value="Warehouse & Inventory">
                                        {{ __('user_approval.warehouse_inventory') }}
                                    </option>

                                    <option value="Sales & Marketing">
                                        {{ __('user_approval.sales_marketing') }}
                                    </option>

                                </select>


                                <i
                                    data-lucide="chevron-down"
                                    class="pointer-events-none absolute right-2.5 top-1/2 h-3.5 w-3.5 -translate-y-1/2 text-slate-400">
                                </i>

                            </div>



                            {{-- POSITION --}}

                            <div class="relative xl:w-52">

                                <select
                                    id="approvalPositionFilter"
                                    class="h-9 w-full appearance-none rounded-lg border border-slate-200/80 bg-white/80 px-3 pr-9 text-xs font-medium text-slate-700 outline-none transition hover:border-slate-300 focus:border-primary focus:ring-3 focus:ring-primary/10 dark:border-white/[0.07] dark:bg-slate-900/60 dark:text-slate-200">

                                    <option value="">
                                        {{ __('user_approval.all_positions') }}
                                    </option>

                                    <option value="SPV Operasional">
                                        {{ __('user_approval.spv_operasional') }}
                                    </option>

                                    <option value="Technical">
                                        {{ __('user_approval.technical') }}
                                    </option>

                                    <option value="Installer">
                                        {{ __('user_approval.installer') }}
                                    </option>

                                    <option value="Admin">
                                        {{ __('user_approval.admin') }}
                                    </option>

                                    <option value="Staff">
                                        {{ __('user_approval.staff') }}
                                    </option>

                                    <option value="Helper">
                                        {{ __('user_approval.helper') }}
                                    </option>

                                    <option value="Marketing Project">
                                        {{ __('user_approval.marketing_project') }}
                                    </option>

                                    <option value="Marketing Eksekutif">
                                        {{ __('user_approval.marketing_eksekutif') }}
                                    </option>

                                </select>


                                <i
                                    data-lucide="chevron-down"
                                    class="pointer-events-none absolute right-2.5 top-1/2 h-3.5 w-3.5 -translate-y-1/2 text-slate-400">
                                </i>

                            </div>



                            {{-- RESET --}}

                            <button
                                type="button"
                                id="approvalReset"
                                class="inline-flex h-9 shrink-0 items-center justify-center gap-1.5 rounded-lg border border-slate-200/80 bg-white/80 px-3 text-xs font-semibold text-slate-500 transition hover:border-slate-300 hover:bg-slate-100 hover:text-slate-800 focus:outline-none focus:ring-3 focus:ring-slate-500/10 dark:border-white/[0.07] dark:bg-slate-900/60 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-white">

                                <i
                                    data-lucide="rotate-ccw"
                                    class="h-3.5 w-3.5">
                                </i>

                                {{ __('common.reset') }}

                            </button>

                        </div>

                    </div>



                    {{-- =================================================
                        TABLE
                    ================================================== --}}

                    <div class="overflow-x-auto">

                        <table
                            id="approvalTable"
                            class="w-full min-w-[1080px]">

                            <thead
                                class="border-b border-slate-200/80 bg-slate-50/50 dark:border-white/10 dark:bg-white/[0.015]">

                                <tr>


                                    {{-- USER --}}

                                    <th class="px-5 py-3 text-left">

                                        <span
                                            class="text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">

                                            {{ __('user_approval.user') }}

                                        </span>

                                    </th>



                                    {{-- EMPLOYEE ID --}}

                                    <th class="px-3.5 py-3 text-left">

                                        <span
                                            class="text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">

                                            {{ __('user_approval.employee_id') }}

                                        </span>

                                    </th>



                                    {{-- DIVISION --}}

                                    <th class="px-3.5 py-3 text-left">

                                        <span
                                            class="text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">

                                            {{ __('user_approval.division') }}

                                        </span>

                                    </th>



                                    {{-- POSITION --}}

                                    <th class="px-3.5 py-3 text-left">

                                        <span
                                            class="text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">

                                            {{ __('user_approval.position') }}

                                        </span>

                                    </th>



                                    {{-- ROLE --}}

                                    <th class="px-3.5 py-3 text-left">

                                        <span
                                            class="text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">

                                            {{ __('user_approval.role') }}

                                        </span>

                                    </th>



                                    {{-- REGISTERED --}}

                                    <th class="px-3.5 py-3 text-left">

                                        <span
                                            class="text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">

                                            {{ __('user_approval.registered') }}

                                        </span>

                                    </th>



                                    {{-- STATUS --}}

                                    <th class="px-3.5 py-3 text-center">

                                        <span
                                            class="text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">

                                            {{ __('user_approval.status') }}

                                        </span>

                                    </th>



                                    {{-- ACTION --}}

                                    <th class="px-5 py-3 text-right">

                                        <span
                                            class="text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">

                                            {{ __('user_approval.action') }}

                                        </span>

                                    </th>

                                </tr>

                            </thead>



                            <tbody
                                class="divide-y divide-slate-200/60 dark:divide-white/5">


                                @forelse ($users as $user)

                                <tr
                                    class="approval-row group transition-colors duration-150 hover:bg-slate-50/60 dark:hover:bg-white/[0.025]">


                                    {{-- USER --}}

                                    <td class="px-5 py-3">

                                        <div class="flex items-center gap-2.5">

                                            @if ($user->profile_photo)

                                            <img
                                                src="{{ asset('storage/' . $user->profile_photo) }}"
                                                alt="{{ $user->name }}"
                                                class="h-9 w-9 shrink-0 rounded-lg object-cover ring-1 ring-slate-200 dark:ring-white/10">

                                            @else

                                            <div
                                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary text-xs font-bold text-white">

                                                {{ strtoupper(substr($user->name, 0, 1)) }}

                                            </div>

                                            @endif


                                            <div class="min-w-0">

                                                <p
                                                    class="max-w-[220px] truncate text-xs font-semibold text-slate-800 dark:text-slate-100">

                                                    {{ $user->name }}

                                                </p>

                                                <p
                                                    class="mt-0.5 max-w-[230px] truncate text-[10px] text-slate-400 dark:text-slate-500">

                                                    {{ $user->email }}

                                                </p>

                                            </div>

                                        </div>

                                    </td>



                                    {{-- EMPLOYEE ID --}}

                                    <td class="px-3.5 py-3">

                                        @if ($user->employee_id)

                                        <span
                                            class="inline-flex items-center rounded-md bg-slate-100 px-2 py-1 font-mono text-[10px] font-semibold text-slate-600 dark:bg-white/[0.05] dark:text-slate-300">

                                            {{ $user->employee_id }}

                                        </span>

                                        @else

                                        <span class="text-xs text-slate-400">
                                            —
                                        </span>

                                        @endif

                                    </td>



                                    {{-- DIVISION --}}

                                    <td class="px-3.5 py-3">

                                        <span
                                            class="inline-flex max-w-[190px] items-center rounded-md bg-slate-100/80 px-2 py-1 text-[10px] font-medium text-slate-600 dark:bg-white/[0.05] dark:text-slate-300">

                                            {{ $user->division ?? '—' }}

                                        </span>

                                    </td>



                                    {{-- POSITION --}}

                                    <td class="px-3.5 py-3">

                                        <span
                                            class="text-xs font-medium text-slate-600 dark:text-slate-300">

                                            {{ $user->position ?? '—' }}

                                        </span>

                                    </td>



                                    {{-- ROLE --}}

                                    <td class="px-3.5 py-3">

                                        @if ($user->role)

                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-md border border-slate-200/70 bg-white/60 px-2 py-1 text-[10px] font-semibold text-slate-600 dark:border-white/[0.06] dark:bg-white/[0.03] dark:text-slate-300">

                                            <span
                                                class="h-1.5 w-1.5 rounded-full bg-primary">
                                            </span>

                                            {{ ucfirst(str_replace('_', ' ', $user->role)) }}

                                        </span>

                                        @else

                                        <span
                                            class="text-[10px] text-slate-400">

                                            {{ __('user_approval.not_assigned') }}

                                        </span>

                                        @endif

                                    </td>



                                    {{-- REGISTERED --}}

                                    <td class="px-3.5 py-3">

                                        <div class="flex items-center gap-1.5">

                                            <i
                                                data-lucide="calendar-days"
                                                class="h-3 w-3 shrink-0 text-slate-400">
                                            </i>

                                            <span
                                                class="text-[10px] font-medium text-slate-400 dark:text-slate-500">

                                                {{ $user->created_at
                                                        ? $user->created_at->format('d M Y H:i')
                                                        : '—' }}

                                            </span>

                                        </div>

                                    </td>



                                    {{-- STATUS --}}

                                    <td class="px-3.5 py-3 text-center">

                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-amber-500/10 px-2 py-1 text-[9px] font-semibold text-amber-600 ring-1 ring-inset ring-amber-500/20 dark:text-amber-400">

                                            <span
                                                class="h-1.5 w-1.5 rounded-full bg-amber-500">
                                            </span>

                                            {{ __('user_approval.pending_status') }}

                                        </span>

                                    </td>



                                    {{-- ACTION --}}

                                    <td class="px-5 py-3">

                                        <div
                                            class="flex items-center justify-end gap-1">


                                            {{-- VIEW --}}

                                            <button
                                                type="button"
                                                title="{{ __('user_approval.view_detail') }}"
                                                aria-label="{{ __('user_approval.view_detail') }}"
                                                class="approval-action inline-flex h-7 w-7 items-center justify-center rounded-md border border-slate-200/80 bg-white/70 text-slate-400 transition hover:border-slate-300 hover:bg-slate-100 hover:text-slate-700 focus:outline-none focus:ring-3 focus:ring-slate-500/10 dark:border-white/[0.07] dark:bg-white/[0.03] dark:text-slate-500 dark:hover:bg-white/[0.07] dark:hover:text-white"
                                                data-action="view"
                                                data-id="{{ $user->id }}"
                                                data-name="{{ $user->name }}"
                                                data-email="{{ $user->email }}"
                                                data-employee-id="{{ $user->employee_id }}"
                                                data-division="{{ $user->division }}"
                                                data-position="{{ $user->position }}"
                                                data-role="{{ $user->role }}">

                                                <i
                                                    data-lucide="eye"
                                                    class="h-3.5 w-3.5">
                                                </i>

                                            </button>



                                            {{-- APPROVE --}}

                                            <button
                                                type="button"
                                                title="{{ __('user_approval.approve_user') }}"
                                                aria-label="{{ __('user_approval.approve_user') }}"
                                                class="approval-action inline-flex h-7 w-7 items-center justify-center rounded-md border border-emerald-500/20 bg-emerald-500/10 text-emerald-600 transition hover:border-emerald-500/30 hover:bg-emerald-500/15 focus:outline-none focus:ring-3 focus:ring-emerald-500/10 dark:text-emerald-400"
                                                data-action="approve"
                                                data-id="{{ $user->id }}"
                                                data-name="{{ $user->name }}"
                                                data-division="{{ $user->division }}"
                                                data-position="{{ $user->position }}"
                                                data-role="{{ $user->role }}">

                                                <i
                                                    data-lucide="check"
                                                    class="h-3.5 w-3.5">
                                                </i>

                                            </button>



                                            {{-- REJECT --}}

                                            <button
                                                type="button"
                                                title="{{ __('user_approval.reject_user') }}"
                                                aria-label="{{ __('user_approval.reject_user') }}"
                                                class="approval-action inline-flex h-7 w-7 items-center justify-center rounded-md border border-rose-500/20 bg-rose-500/10 text-rose-600 transition hover:border-rose-500/30 hover:bg-rose-500/15 focus:outline-none focus:ring-3 focus:ring-rose-500/10 dark:text-rose-400"
                                                data-action="reject"
                                                data-id="{{ $user->id }}"
                                                data-name="{{ $user->name }}">

                                                <i
                                                    data-lucide="x"
                                                    class="h-3.5 w-3.5">
                                                </i>

                                            </button>

                                        </div>

                                    </td>

                                </tr>


                                @empty

                                {{-- EMPTY STATE --}}

                                <tr>

                                    <td
                                        colspan="8"
                                        class="px-5 py-14">

                                        <div
                                            class="flex flex-col items-center justify-center text-center">


                                            <div
                                                class="flex h-12 w-12 items-center justify-center rounded-xl bg-primary/10 text-primary">

                                                <i
                                                    data-lucide="user-check"
                                                    class="h-5 w-5">
                                                </i>

                                            </div>


                                            <h3
                                                class="mt-3 text-sm font-bold text-slate-800 dark:text-white">

                                                {{ __('user_approval.no_pending_registrations') }}

                                            </h3>


                                            <p
                                                class="mt-1 max-w-md text-[11px] leading-5 text-slate-400 dark:text-slate-500">

                                                {{ __('user_approval.no_pending_description') }}

                                            </p>

                                        </div>

                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>



                    {{-- =================================================
                        PAGINATION
                    ================================================== --}}

                    @if (isset($users) && method_exists($users, 'links'))

                    <div
                        class="flex flex-col gap-2.5 border-t border-slate-200/70 bg-white/40 px-5 py-3 dark:border-white/[0.06] dark:bg-white/[0.015] sm:flex-row sm:items-center sm:justify-between sm:px-6">

                        <p
                            class="text-[10px] font-medium text-slate-400 dark:text-slate-500">

                            {{ $pendingCount }}
                            {{ __('user_approval.pending') }}

                        </p>


                        <div>

                            {{ $users->links() }}

                        </div>

                    </div>

                    @endif

                </section>

            </div>

        </main>



        {{-- ============================================================
            FOOTER
        ============================================================= --}}

        <footer
            class="relative z-10 mt-auto border-t border-slate-200/70 bg-white/60 dark:border-white/10 dark:bg-white/[0.02]">

            <div
                class="mx-auto flex min-h-11 w-full max-w-[1600px] flex-col items-center justify-between gap-2 px-4 py-3 text-[10px] text-slate-400 sm:flex-row sm:px-6 lg:px-8">

                <div class="flex items-center gap-2">

                    <span
                        class="relative flex h-1.5 w-1.5">

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



    {{-- ================================================================
        APPROVE MODAL
    ================================================================= --}}

    <div
        id="approveModal"
        class="fixed inset-0 z-[100] hidden items-center justify-center p-4">

        <div
            class="approval-modal-backdrop absolute inset-0 bg-slate-950/50 backdrop-blur-sm">
        </div>


        <div
            class="relative z-10 w-full max-w-lg overflow-hidden rounded-2xl border border-slate-200/70 bg-white shadow-2xl dark:border-white/[0.07] dark:bg-slate-900">


            {{-- HEADER --}}

            <div
                class="flex items-start justify-between border-b border-slate-200/70 p-5 dark:border-white/[0.06]">

                <div class="flex gap-3">

                    <div
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-emerald-500/10 text-emerald-500">

                        <i
                            data-lucide="user-check"
                            class="h-4 w-4">
                        </i>

                    </div>


                    <div>

                        <h2
                            class="text-sm font-bold text-slate-900 dark:text-white">

                            {{ __('user_approval.approve_modal_title') }}

                        </h2>

                        <p
                            class="mt-0.5 text-[11px] leading-5 text-slate-400 dark:text-slate-500">

                            {{ __('user_approval.approve_modal_description') }}

                        </p>

                    </div>

                </div>


                <button
                    type="button"
                    data-modal-close="approveModal"
                    class="approval-modal-close inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700 dark:hover:bg-white/[0.05] dark:hover:text-white">

                    <i
                        data-lucide="x"
                        class="h-3.5 w-3.5">
                    </i>

                </button>

            </div>



            {{-- FORM --}}

            <form
                id="approveForm"
                method="POST"
                action="">

                @csrf


                <div class="space-y-4 p-5">


                    {{-- USER --}}

                    <div>

                        <label
                            for="approveUserName"
                            class="mb-1.5 block text-[11px] font-semibold text-slate-600 dark:text-slate-300">

                            {{ __('user_approval.user') }}

                        </label>


                        <div class="relative">

                            <i
                                data-lucide="user"
                                class="pointer-events-none absolute left-3 top-1/2 h-3.5 w-3.5 -translate-y-1/2 text-slate-400">
                            </i>


                            <input
                                type="text"
                                id="approveUserName"
                                class="h-10 w-full rounded-lg border border-slate-200 bg-slate-50 pl-9 pr-3 text-xs font-medium text-slate-700 outline-none dark:border-white/[0.06] dark:bg-white/[0.03] dark:text-slate-200"
                                readonly>

                        </div>

                    </div>



                    {{-- DIVISION --}}

                    <div>

                        <label
                            for="approveDivision"
                            class="mb-1.5 block text-[11px] font-semibold text-slate-600 dark:text-slate-300">

                            {{ __('user_approval.division') }}

                        </label>


                        <div class="relative">

                            <select
                                name="division"
                                id="approveDivision"
                                required
                                class="h-10 w-full appearance-none rounded-lg border border-slate-200 bg-white px-3 pr-9 text-xs text-slate-700 outline-none transition focus:border-primary focus:ring-3 focus:ring-primary/10 dark:border-white/[0.07] dark:bg-slate-800 dark:text-slate-200">

                                <option value="">
                                    {{ __('user_approval.select_division') }}
                                </option>

                                <option value="Installer / Technician">
                                    {{ __('user_approval.installer_technician') }}
                                </option>

                                <option value="Warehouse & Inventory">
                                    {{ __('user_approval.warehouse_inventory') }}
                                </option>

                                <option value="Sales & Marketing">
                                    {{ __('user_approval.sales_marketing') }}
                                </option>

                            </select>


                            <i
                                data-lucide="chevron-down"
                                class="pointer-events-none absolute right-2.5 top-1/2 h-3.5 w-3.5 -translate-y-1/2 text-slate-400">
                            </i>

                        </div>

                    </div>



                    {{-- POSITION --}}

                    <div>

                        <label
                            for="approvePosition"
                            class="mb-1.5 block text-[11px] font-semibold text-slate-600 dark:text-slate-300">

                            {{ __('user_approval.position') }}

                        </label>


                        <div class="relative">

                            <select
                                name="position"
                                id="approvePosition"
                                required
                                class="h-10 w-full appearance-none rounded-lg border border-slate-200 bg-white px-3 pr-9 text-xs text-slate-700 outline-none transition focus:border-primary focus:ring-3 focus:ring-primary/10 dark:border-white/[0.07] dark:bg-slate-800 dark:text-slate-200">

                                <option value="">
                                    {{ __('user_approval.select_position') }}
                                </option>

                            </select>


                            <i
                                data-lucide="chevron-down"
                                class="pointer-events-none absolute right-2.5 top-1/2 h-3.5 w-3.5 -translate-y-1/2 text-slate-400">
                            </i>

                        </div>

                    </div>



                    {{-- ROLE --}}

                    <div>

                        <label
                            for="approveRole"
                            class="mb-1.5 block text-[11px] font-semibold text-slate-600 dark:text-slate-300">

                            {{ __('user_approval.role') }}

                        </label>


                        <div class="relative">

                            <select
                                name="role"
                                id="approveRole"
                                required
                                class="h-10 w-full appearance-none rounded-lg border border-slate-200 bg-white px-3 pr-9 text-xs text-slate-700 outline-none transition focus:border-primary focus:ring-3 focus:ring-primary/10 dark:border-white/[0.07] dark:bg-slate-800 dark:text-slate-200">

                                <option value="">
                                    {{ __('user_approval.select_role') }}
                                </option>

                            </select>


                            <i
                                data-lucide="chevron-down"
                                class="pointer-events-none absolute right-2.5 top-1/2 h-3.5 w-3.5 -translate-y-1/2 text-slate-400">
                            </i>

                        </div>

                    </div>



                    {{-- WARNING --}}

                    <div
                        class="flex gap-2.5 rounded-lg border border-amber-500/20 bg-amber-500/[0.06] p-3">

                        <i
                            data-lucide="triangle-alert"
                            class="mt-0.5 h-3.5 w-3.5 shrink-0 text-amber-500">
                        </i>


                        <p
                            class="text-[11px] leading-5 text-amber-700 dark:text-amber-400">

                            <strong>
                                {{ __('user_approval.attention') }}
                            </strong>

                            {{ __('user_approval.approve_warning') }}

                        </p>

                    </div>

                </div>



                {{-- FOOTER --}}

                <div
                    class="flex justify-end gap-2 border-t border-slate-200/70 bg-slate-50/50 px-5 py-3.5 dark:border-white/[0.06] dark:bg-white/[0.02]">

                    <button
                        type="button"
                        data-modal-close="approveModal"
                        class="approval-modal-close inline-flex h-9 items-center justify-center rounded-lg border border-slate-200 bg-white px-3.5 text-xs font-semibold text-slate-600 transition hover:bg-slate-100 dark:border-white/[0.07] dark:bg-slate-800 dark:text-slate-300">

                        {{ __('user_approval.cancel') }}

                    </button>


                    <button
                        type="submit"
                        class="inline-flex h-9 items-center justify-center gap-1.5 rounded-lg bg-emerald-600 px-4 text-xs font-semibold text-white shadow-sm transition hover:bg-emerald-700 focus:outline-none focus:ring-3 focus:ring-emerald-500/15">

                        <i
                            data-lucide="check"
                            class="h-3.5 w-3.5">
                        </i>

                        {{ __('user_approval.approve_activate') }}

                    </button>

                </div>

            </form>

        </div>

    </div>



    {{-- ================================================================
        USER DETAIL MODAL
    ================================================================= --}}

    <div
        id="userDetailModal"
        class="fixed inset-0 z-[100] hidden items-center justify-center p-4">

        <div
            class="approval-modal-backdrop absolute inset-0 bg-slate-950/50 backdrop-blur-sm">
        </div>


        <div
            class="relative z-10 w-full max-w-md overflow-hidden rounded-2xl border border-slate-200/70 bg-white shadow-2xl dark:border-white/[0.07] dark:bg-slate-900">


            {{-- HEADER --}}

            <div
                class="flex items-center justify-between border-b border-slate-200/70 px-5 py-4 dark:border-white/[0.06]">

                <div>

                    <p
                        class="text-[9px] font-bold uppercase tracking-[0.14em] text-primary">

                        {{ __('navigation.circle') }} Workspace

                    </p>


                    <h2
                        class="mt-0.5 text-sm font-bold text-slate-900 dark:text-white">

                        {{ __('user_approval.registration_detail') }}

                    </h2>

                </div>


                <button
                    type="button"
                    data-modal-close="userDetailModal"
                    class="approval-modal-close inline-flex h-7 w-7 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700 dark:hover:bg-white/[0.05] dark:hover:text-white">

                    <i
                        data-lucide="x"
                        class="h-3.5 w-3.5">
                    </i>

                </button>

            </div>



            {{-- BODY --}}

            <div class="p-5">

                <div class="text-center">

                    <div
                        id="detailAvatar"
                        class="mx-auto flex h-16 w-16 items-center justify-center rounded-xl bg-primary text-xl font-bold text-white shadow-sm">

                        <span id="detailAvatarText"></span>

                    </div>


                    <h3
                        id="detailName"
                        class="mt-3 text-base font-bold tracking-tight text-slate-900 dark:text-white">
                    </h3>


                    <p
                        id="detailEmail"
                        class="mt-0.5 text-xs text-slate-400 dark:text-slate-500">
                    </p>


                    <div class="mt-2.5 flex justify-center">

                        <span
                            class="inline-flex items-center gap-1.5 rounded-full bg-amber-500/10 px-2 py-1 text-[9px] font-semibold text-amber-600 ring-1 ring-inset ring-amber-500/20 dark:text-amber-400">

                            <span
                                class="h-1.5 w-1.5 rounded-full bg-amber-500">
                            </span>

                            {{ __('user_approval.pending_status') }}

                        </span>

                    </div>

                </div>



                {{-- DETAILS --}}

                <div
                    class="mt-5 overflow-hidden rounded-xl border border-slate-200/70 dark:border-white/[0.06]">


                    {{-- Employee --}}

                    <div
                        class="flex items-center justify-between gap-4 border-b border-slate-100 px-3.5 py-2.5 dark:border-white/[0.05]">

                        <span
                            class="text-[11px] text-slate-400 dark:text-slate-500">

                            {{ __('user_approval.employee_id') }}

                        </span>


                        <strong
                            id="detailEmployeeId"
                            class="text-right text-xs font-semibold text-slate-700 dark:text-slate-200">
                        </strong>

                    </div>


                    {{-- Division --}}

                    <div
                        class="flex items-center justify-between gap-4 border-b border-slate-100 px-3.5 py-2.5 dark:border-white/[0.05]">

                        <span
                            class="text-[11px] text-slate-400 dark:text-slate-500">

                            {{ __('user_approval.division') }}

                        </span>


                        <strong
                            id="detailDivision"
                            class="max-w-[220px] text-right text-xs font-semibold text-slate-700 dark:text-slate-200">
                        </strong>

                    </div>


                    {{-- Position --}}

                    <div
                        class="flex items-center justify-between gap-4 border-b border-slate-100 px-3.5 py-2.5 dark:border-white/[0.05]">

                        <span
                            class="text-[11px] text-slate-400 dark:text-slate-500">

                            {{ __('user_approval.position') }}

                        </span>


                        <strong
                            id="detailPosition"
                            class="max-w-[220px] text-right text-xs font-semibold text-slate-700 dark:text-slate-200">
                        </strong>

                    </div>


                    {{-- Role --}}

                    <div
                        class="flex items-center justify-between gap-4 px-3.5 py-2.5">

                        <span
                            class="text-[11px] text-slate-400 dark:text-slate-500">

                            {{ __('user_approval.role') }}

                        </span>


                        <strong
                            id="detailRole"
                            class="max-w-[220px] text-right text-xs font-semibold text-slate-700 dark:text-slate-200">
                        </strong>

                    </div>

                </div>

            </div>



            {{-- FOOTER --}}

            <div
                class="flex justify-end border-t border-slate-200/70 bg-slate-50/50 px-5 py-3.5 dark:border-white/[0.06] dark:bg-white/[0.02]">

                <button
                    type="button"
                    data-modal-close="userDetailModal"
                    class="approval-modal-close inline-flex h-9 items-center justify-center rounded-lg bg-slate-900 px-4 text-xs font-semibold text-white transition hover:bg-slate-800 focus:outline-none dark:bg-white dark:text-slate-900 dark:hover:bg-slate-100">

                    {{ __('user_approval.close') }}

                </button>

            </div>

        </div>

    </div>



    {{-- ================================================================
        REJECT MODAL
    ================================================================= --}}

    <div
        id="rejectModal"
        class="fixed inset-0 z-[100] hidden items-center justify-center p-4">

        <div
            class="approval-modal-backdrop absolute inset-0 bg-slate-950/50 backdrop-blur-sm">
        </div>


        <div
            class="relative z-10 w-full max-w-lg overflow-hidden rounded-2xl border border-slate-200/70 bg-white shadow-2xl dark:border-white/[0.07] dark:bg-slate-900">


            {{-- HEADER --}}

            <div
                class="flex items-start justify-between border-b border-slate-200/70 p-5 dark:border-white/[0.06]">

                <div class="flex gap-3">

                    <div
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-rose-500/10 text-rose-500">

                        <i
                            data-lucide="user-x"
                            class="h-4 w-4">
                        </i>

                    </div>


                    <div>

                        <h2
                            class="text-sm font-bold text-slate-900 dark:text-white">

                            {{ __('user_approval.reject_modal_title') }}

                        </h2>


                        <p
                            class="mt-0.5 text-[11px] leading-5 text-slate-400 dark:text-slate-500">

                            {{ __('user_approval.reject_modal_description') }}

                        </p>

                    </div>

                </div>


                <button
                    type="button"
                    data-modal-close="rejectModal"
                    class="approval-modal-close inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700 dark:hover:bg-white/[0.05] dark:hover:text-white">

                    <i
                        data-lucide="x"
                        class="h-3.5 w-3.5">
                    </i>

                </button>

            </div>



            {{-- FORM --}}

            <form
                id="rejectForm"
                method="POST"
                action="">

                @csrf


                <div class="space-y-4 p-5">


                    {{-- USER --}}

                    <div>

                        <label
                            for="rejectUserName"
                            class="mb-1.5 block text-[11px] font-semibold text-slate-600 dark:text-slate-300">

                            {{ __('user_approval.user') }}

                        </label>


                        <div class="relative">

                            <i
                                data-lucide="user"
                                class="pointer-events-none absolute left-3 top-1/2 h-3.5 w-3.5 -translate-y-1/2 text-slate-400">
                            </i>


                            <input
                                type="text"
                                id="rejectUserName"
                                class="h-10 w-full rounded-lg border border-slate-200 bg-slate-50 pl-9 pr-3 text-xs font-medium text-slate-700 outline-none dark:border-white/[0.06] dark:bg-white/[0.03] dark:text-slate-200"
                                readonly>

                        </div>

                    </div>



                    {{-- REASON --}}

                    <div>

                        <div
                            class="mb-1.5 flex items-center justify-between gap-3">

                            <label
                                for="rejectReason"
                                class="block text-[11px] font-semibold text-slate-600 dark:text-slate-300">

                                {{ __('user_approval.rejection_reason') }}

                            </label>


                            <span
                                class="text-[10px] text-slate-400">

                                {{ __('user_approval.optional') }}

                            </span>

                        </div>


                        <textarea
                            name="reason"
                            id="rejectReason"
                            rows="4"
                            class="w-full resize-none rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-xs text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-rose-400 focus:ring-3 focus:ring-rose-500/10 dark:border-white/[0.07] dark:bg-slate-800 dark:text-slate-200 dark:placeholder:text-slate-500"
                            placeholder="{{ __('user_approval.rejection_placeholder') }}"></textarea>

                    </div>



                    {{-- INFO --}}

                    <div
                        class="flex gap-2.5 rounded-lg border border-rose-500/20 bg-rose-500/[0.06] p-3">

                        <i
                            data-lucide="info"
                            class="mt-0.5 h-3.5 w-3.5 shrink-0 text-rose-500">
                        </i>


                        <p
                            class="text-[11px] leading-5 text-rose-600 dark:text-rose-400">

                            {{ __('user_approval.reject_modal_description') }}

                        </p>

                    </div>

                </div>



                {{-- FOOTER --}}

                <div
                    class="flex justify-end gap-2 border-t border-slate-200/70 bg-slate-50/50 px-5 py-3.5 dark:border-white/[0.06] dark:bg-white/[0.02]">

                    <button
                        type="button"
                        data-modal-close="rejectModal"
                        class="approval-modal-close inline-flex h-9 items-center justify-center rounded-lg border border-slate-200 bg-white px-3.5 text-xs font-semibold text-slate-600 transition hover:bg-slate-100 dark:border-white/[0.07] dark:bg-slate-800 dark:text-slate-300">

                        {{ __('user_approval.cancel_rejection') }}

                    </button>


                    <button
                        type="submit"
                        class="inline-flex h-9 items-center justify-center gap-1.5 rounded-lg bg-rose-600 px-4 text-xs font-semibold text-white shadow-sm transition hover:bg-rose-700 focus:outline-none focus:ring-3 focus:ring-rose-500/15">

                        <i
                            data-lucide="x"
                            class="h-3.5 w-3.5">
                        </i>

                        {{ __('user_approval.reject_account') }}

                    </button>

                </div>

            </form>

        </div>

    </div>



    {{-- ================================================================
        JAVASCRIPT CONFIGURATION
    ================================================================= --}}

    <script type="application/json" id="approval-config">
        {
            !!json_encode([
                'translations' => [
                    'selectPosition' => __('user_approval.select_position_js'),
                    'selectRole' => __('user_approval.select_role_js'),
                    'notAssigned' => __('user_approval.not_assigned_js'),

                    'roleAdmin' => __('user_approval.role_admin'),
                    'roleInstaller' => __('user_approval.role_installer'),
                    'juniorInstaller' => __('user_approval.junior_installer'),
                    'teamLeader' => __('user_approval.team_leader'),
                    'spvTechnical' => __('user_approval.spv_technical'),
                    'spvOperation' => __('user_approval.spv_operation'),
                    'corporateCoordinator' => __('user_approval.corporate_coordinator'),

                    'inventory' => __('user_approval.inventory'),
                    'warehouseAdmin' => __('user_approval.warehouse_admin'),
                    'staff' => __('user_approval.role_staff'),
                    'helper' => __('user_approval.role_helper'),

                    'marketing' => __('user_approval.marketing'),
                    'marketingAdmin' => __('user_approval.marketing_admin'),
                ],

                'positions' => [
                    'Installer / Technician' => [
                        'SPV Operasional',
                        'Technical',
                        'Installer',
                    ],

                    'Warehouse & Inventory' => [
                        'Admin',
                        'Staff',
                        'Helper',
                    ],

                    'Sales & Marketing' => [
                        'Marketing Project',
                        'Marketing Eksekutif',
                    ],
                ],

                'roles' => [
                    'Installer / Technician' => [
                        [
                            'value' => 'admin',
                            'label' => __('user_approval.role_admin'),
                        ],
                        [
                            'value' => 'installer',
                            'label' => __('user_approval.role_installer'),
                        ],
                        [
                            'value' => 'junior_installer',
                            'label' => __('user_approval.junior_installer'),
                        ],
                        [
                            'value' => 'team_leader',
                            'label' => __('user_approval.team_leader'),
                        ],
                        [
                            'value' => 'spv_technical',
                            'label' => __('user_approval.spv_technical'),
                        ],
                        [
                            'value' => 'spv_operation',
                            'label' => __('user_approval.spv_operation'),
                        ],
                        [
                            'value' => 'corporate_coordinator',
                            'label' => __('user_approval.corporate_coordinator'),
                        ],
                    ],

                    'Warehouse & Inventory' => [
                        [
                            'value' => 'inventory',
                            'label' => __('user_approval.inventory'),
                        ],
                        [
                            'value' => 'warehouse_admin',
                            'label' => __('user_approval.warehouse_admin'),
                        ],
                        [
                            'value' => 'staff',
                            'label' => __('user_approval.role_staff'),
                        ],
                        [
                            'value' => 'helper',
                            'label' => __('user_approval.role_helper'),
                        ],
                    ],

                    'Sales & Marketing' => [
                        [
                            'value' => 'marketing',
                            'label' => __('user_approval.marketing'),
                        ],
                        [
                            'value' => 'marketing_admin',
                            'label' => __('user_approval.marketing_admin'),
                        ],
                    ],
                ],
            ], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) !!
        }
    </script>



    {{-- ================================================================
        JAVASCRIPT
    ================================================================= --}}

    <script>
        (() => {

            'use strict';


            /* ============================================================
               CONFIGURATION
            ============================================================ */

            const configElement =
                document.getElementById('approval-config');

            let approvalConfig = {
                translations: {},
                positions: {},
                roles: {}
            };


            if (configElement) {

                try {

                    approvalConfig =
                        JSON.parse(
                            configElement.textContent
                        );

                } catch (error) {

                    console.error(
                        'Circle Suites: approval configuration could not be parsed.',
                        error
                    );

                }

            }


            const approvalTranslations =
                approvalConfig.translations || {};

            const approvePositions =
                approvalConfig.positions || {};

            const approveRoles =
                approvalConfig.roles || {};



            /* ============================================================
               LUCIDE
            ============================================================ */

            function initializeLucide() {

                if (
                    typeof lucide === 'undefined' ||
                    typeof lucide.createIcons !== 'function'
                ) {
                    return;
                }


                requestAnimationFrame(() => {

                    lucide.createIcons();

                });

            }



            /* ============================================================
               FILTER USERS
            ============================================================ */

            function filterUsers() {

                const searchInput =
                    document.getElementById(
                        'approvalSearch'
                    );

                const divisionFilter =
                    document.getElementById(
                        'approvalDivisionFilter'
                    );

                const positionFilter =
                    document.getElementById(
                        'approvalPositionFilter'
                    );


                const search =
                    searchInput?.value
                    ?.toLowerCase()
                    ?.trim() || '';

                const division =
                    divisionFilter?.value
                    ?.toLowerCase()
                    ?.trim() || '';

                const position =
                    positionFilter?.value
                    ?.toLowerCase()
                    ?.trim() || '';


                const rows =
                    document.querySelectorAll(
                        '#approvalTable tbody tr.approval-row'
                    );


                rows.forEach((row) => {

                    const text =
                        row.innerText
                        .toLowerCase();


                    const rowDivision =
                        row.cells[2]
                        ?.innerText
                        ?.toLowerCase() || '';


                    const rowPosition =
                        row.cells[3]
                        ?.innerText
                        ?.toLowerCase() || '';


                    const matchSearch = !search ||
                        text.includes(search);


                    const matchDivision = !division ||
                        rowDivision.includes(
                            division
                        );


                    const matchPosition = !position ||
                        rowPosition.includes(
                            position
                        );


                    row.classList.toggle(
                        'hidden',
                        !(
                            matchSearch &&
                            matchDivision &&
                            matchPosition
                        )
                    );

                });

            }



            /* ============================================================
               RESET FILTERS
            ============================================================ */

            function resetFilters() {

                const searchInput =
                    document.getElementById(
                        'approvalSearch'
                    );

                const divisionFilter =
                    document.getElementById(
                        'approvalDivisionFilter'
                    );

                const positionFilter =
                    document.getElementById(
                        'approvalPositionFilter'
                    );


                if (searchInput) {
                    searchInput.value = '';
                }


                if (divisionFilter) {
                    divisionFilter.value = '';
                }


                if (positionFilter) {
                    positionFilter.value = '';
                }


                filterUsers();

            }



            /* ============================================================
               FORMAT ROLE
            ============================================================ */

            function formatRole(role) {

                return String(role)
                    .replaceAll('_', ' ')
                    .replace(
                        /\b\w/g,
                        character =>
                        character.toUpperCase()
                    );

            }



            /* ============================================================
               VIEW USER
            ============================================================ */

            function viewUser(
                id,
                name,
                email,
                employeeId,
                division,
                position,
                role
            ) {

                const detailName =
                    document.getElementById(
                        'detailName'
                    );

                const detailEmail =
                    document.getElementById(
                        'detailEmail'
                    );

                const detailEmployeeId =
                    document.getElementById(
                        'detailEmployeeId'
                    );

                const detailDivision =
                    document.getElementById(
                        'detailDivision'
                    );

                const detailPosition =
                    document.getElementById(
                        'detailPosition'
                    );

                const detailRole =
                    document.getElementById(
                        'detailRole'
                    );

                const detailAvatarText =
                    document.getElementById(
                        'detailAvatarText'
                    );


                if (detailName) {

                    detailName.textContent =
                        name || '-';

                }


                if (detailEmail) {

                    detailEmail.textContent =
                        email || '-';

                }


                if (detailEmployeeId) {

                    detailEmployeeId.textContent =
                        employeeId || '-';

                }


                if (detailDivision) {

                    detailDivision.textContent =
                        division || '-';

                }


                if (detailPosition) {

                    detailPosition.textContent =
                        position || '-';

                }


                if (detailRole) {

                    detailRole.textContent =
                        role ?
                        formatRole(role) :
                        (
                            approvalTranslations
                            .notAssigned ||
                            'Not assigned'
                        );

                }


                if (detailAvatarText) {

                    detailAvatarText.textContent =
                        name ?
                        name.charAt(0).toUpperCase() :
                        '?';

                }


                openApprovalModal(
                    'userDetailModal'
                );

            }



            /* ============================================================
               APPROVE USER
            ============================================================ */

            function approveUser(
                id,
                name,
                division = '',
                position = '',
                role = ''
            ) {

                const userNameInput =
                    document.getElementById(
                        'approveUserName'
                    );

                const approveForm =
                    document.getElementById(
                        'approveForm'
                    );

                const divisionSelect =
                    document.getElementById(
                        'approveDivision'
                    );


                if (userNameInput) {

                    userNameInput.value =
                        name || '';

                }


                if (approveForm) {

                    approveForm.action =
                        `/circle/users/${id}/approve`;

                }


                if (divisionSelect) {

                    divisionSelect.value =
                        division || '';

                }


                updateApprovePositions(
                    position
                );


                updateApproveRoles(
                    role
                );


                openApprovalModal(
                    'approveModal'
                );

            }



            /* ============================================================
               UPDATE POSITIONS
            ============================================================ */

            function updateApprovePositions(
                selectedPosition = ''
            ) {

                const divisionSelect =
                    document.getElementById(
                        'approveDivision'
                    );

                const positionSelect =
                    document.getElementById(
                        'approvePosition'
                    );


                if (
                    !divisionSelect ||
                    !positionSelect
                ) {
                    return;
                }


                const division =
                    divisionSelect.value;


                positionSelect.innerHTML =
                    '';


                const placeholder =
                    document.createElement(
                        'option'
                    );


                placeholder.value = '';

                placeholder.textContent =
                    approvalTranslations
                    .selectPosition ||
                    'Select position';


                positionSelect.appendChild(
                    placeholder
                );


                const positions =
                    approvePositions[
                        division
                    ] || [];


                positions.forEach(
                    position => {

                        const option =
                            document.createElement(
                                'option'
                            );


                        option.value =
                            position;

                        option.textContent =
                            position;


                        if (
                            position ===
                            selectedPosition
                        ) {

                            option.selected =
                                true;

                        }


                        positionSelect.appendChild(
                            option
                        );

                    }
                );

            }



            /* ============================================================
               UPDATE ROLES
            ============================================================ */

            function updateApproveRoles(
                selectedRole = ''
            ) {

                const divisionSelect =
                    document.getElementById(
                        'approveDivision'
                    );

                const roleSelect =
                    document.getElementById(
                        'approveRole'
                    );


                if (
                    !divisionSelect ||
                    !roleSelect
                ) {
                    return;
                }


                const division =
                    divisionSelect.value;


                roleSelect.innerHTML =
                    '';


                const placeholder =
                    document.createElement(
                        'option'
                    );


                placeholder.value = '';

                placeholder.textContent =
                    approvalTranslations
                    .selectRole ||
                    'Select role';


                roleSelect.appendChild(
                    placeholder
                );


                const roles =
                    approveRoles[
                        division
                    ] || [];


                roles.forEach(
                    role => {

                        const option =
                            document.createElement(
                                'option'
                            );


                        option.value =
                            role.value;

                        option.textContent =
                            role.label;


                        if (
                            role.value ===
                            selectedRole
                        ) {

                            option.selected =
                                true;

                        }


                        roleSelect.appendChild(
                            option
                        );

                    }
                );

            }



            /* ============================================================
               REJECT USER
            ============================================================ */

            function rejectUser(
                id,
                name
            ) {

                const userNameInput =
                    document.getElementById(
                        'rejectUserName'
                    );

                const rejectForm =
                    document.getElementById(
                        'rejectForm'
                    );

                const rejectReason =
                    document.getElementById(
                        'rejectReason'
                    );


                if (userNameInput) {

                    userNameInput.value =
                        name || '';

                }


                if (rejectForm) {

                    rejectForm.action =
                        `/circle/users/${id}/reject`;

                }


                if (rejectReason) {

                    rejectReason.value =
                        '';

                }


                openApprovalModal(
                    'rejectModal'
                );

            }



            /* ============================================================
               OPEN MODAL
            ============================================================ */

            function openApprovalModal(id) {

                const modal =
                    document.getElementById(id);


                if (!modal) {
                    return;
                }


                modal.classList.remove(
                    'hidden'
                );

                modal.classList.add(
                    'flex'
                );


                document.body.classList.add(
                    'overflow-hidden'
                );


                initializeLucide();

            }



            /* ============================================================
               CLOSE MODAL
            ============================================================ */

            function closeApprovalModal(id) {

                const modal =
                    document.getElementById(id);


                if (!modal) {
                    return;
                }


                modal.classList.add(
                    'hidden'
                );

                modal.classList.remove(
                    'flex'
                );


                const openedModal =
                    document.querySelector(
                        '[id$="Modal"].flex'
                    );


                if (!openedModal) {

                    document.body.classList.remove(
                        'overflow-hidden'
                    );

                }

            }



            /* ============================================================
               INITIALIZE PAGE
            ============================================================ */

            function initializeApprovalPage() {

                const searchInput =
                    document.getElementById(
                        'approvalSearch'
                    );

                const divisionFilter =
                    document.getElementById(
                        'approvalDivisionFilter'
                    );

                const positionFilter =
                    document.getElementById(
                        'approvalPositionFilter'
                    );

                const resetButton =
                    document.getElementById(
                        'approvalReset'
                    );

                const approveDivision =
                    document.getElementById(
                        'approveDivision'
                    );


                /* --------------------------------------------------------
                   FILTER EVENTS
                -------------------------------------------------------- */

                searchInput?.addEventListener(
                    'input',
                    filterUsers
                );


                divisionFilter?.addEventListener(
                    'change',
                    filterUsers
                );


                positionFilter?.addEventListener(
                    'change',
                    filterUsers
                );


                resetButton?.addEventListener(
                    'click',
                    resetFilters
                );



                /* --------------------------------------------------------
                   APPROVAL DIVISION
                -------------------------------------------------------- */

                approveDivision?.addEventListener(
                    'change',
                    () => {

                        updateApprovePositions();

                        updateApproveRoles();

                    }
                );



                /* --------------------------------------------------------
                   TABLE ACTIONS
                -------------------------------------------------------- */

                const approvalTable =
                    document.getElementById(
                        'approvalTable'
                    );


                approvalTable?.addEventListener(
                    'click',
                    event => {

                        const button =
                            event.target.closest(
                                '.approval-action'
                            );


                        if (!button) {
                            return;
                        }


                        const action =
                            button.dataset.action;

                        const id =
                            button.dataset.id;

                        const name =
                            button.dataset.name || '';

                        const email =
                            button.dataset.email || '';

                        const employeeId =
                            button.dataset.employeeId || '';

                        const division =
                            button.dataset.division || '';

                        const position =
                            button.dataset.position || '';

                        const role =
                            button.dataset.role || '';


                        if (
                            action === 'view'
                        ) {

                            viewUser(
                                id,
                                name,
                                email,
                                employeeId,
                                division,
                                position,
                                role
                            );

                        }


                        if (
                            action === 'approve'
                        ) {

                            approveUser(
                                id,
                                name,
                                division,
                                position,
                                role
                            );

                        }


                        if (
                            action === 'reject'
                        ) {

                            rejectUser(
                                id,
                                name
                            );

                        }

                    }
                );



                /* --------------------------------------------------------
                   CLOSE BUTTONS
                -------------------------------------------------------- */

                document
                    .querySelectorAll(
                        '.approval-modal-close'
                    )
                    .forEach(button => {

                        button.addEventListener(
                            'click',
                            function() {

                                closeApprovalModal(
                                    this.dataset.modalClose
                                );

                            }
                        );

                    });



                /* --------------------------------------------------------
                   BACKDROP
                -------------------------------------------------------- */

                document
                    .querySelectorAll(
                        '.approval-modal-backdrop'
                    )
                    .forEach(backdrop => {

                        backdrop.addEventListener(
                            'click',
                            function() {

                                const modal =
                                    this.closest(
                                        '[id$="Modal"]'
                                    );


                                if (modal) {

                                    closeApprovalModal(
                                        modal.id
                                    );

                                }

                            }
                        );

                    });



                /* --------------------------------------------------------
                   ESCAPE KEY
                -------------------------------------------------------- */

                document.addEventListener(
                    'keydown',
                    event => {

                        if (
                            event.key !==
                            'Escape'
                        ) {
                            return;
                        }


                        closeApprovalModal(
                            'approveModal'
                        );

                        closeApprovalModal(
                            'userDetailModal'
                        );

                        closeApprovalModal(
                            'rejectModal'
                        );

                    }
                );



                /* --------------------------------------------------------
                   LUCIDE
                -------------------------------------------------------- */

                initializeLucide();

            }



            /* ============================================================
               GLOBAL FUNCTIONS
            ============================================================ */

            window.viewUser =
                viewUser;

            window.approveUser =
                approveUser;

            window.rejectUser =
                rejectUser;

            window.openApprovalModal =
                openApprovalModal;

            window.closeApprovalModal =
                closeApprovalModal;



            /* ============================================================
               START
            ============================================================ */

            if (
                document.readyState ===
                'loading'
            ) {

                document.addEventListener(
                    'DOMContentLoaded',
                    initializeApprovalPage, {
                        once: true
                    }
                );

            } else {

                initializeApprovalPage();

            }

        })();
    </script>

</x-layouts.circle.admin>