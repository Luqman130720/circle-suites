<x-layouts.circle.admin>

    <x-slot name="title">
        User Management
    </x-slot>


    {{-- ================================================================
        PAGE SHELL
    ================================================================= --}}
    <div
        class="relative flex min-h-[calc(100vh-80px)] flex-col overflow-hidden
               bg-slate-50 dark:bg-slate-950">

        {{-- ============================================================
            AMBIENT BACKGROUND
        ============================================================= --}}
        <div
            class="pointer-events-none absolute inset-0 z-0 overflow-hidden">

            {{-- Primary glow --}}
            <div
                class="absolute -left-40 -top-40 h-96 w-96 rounded-full
                       bg-primary/[0.07] blur-3xl">
            </div>

            {{-- Cyan glow --}}
            <div
                class="absolute -right-32 top-20 h-80 w-80 rounded-full
                       bg-cyan-500/[0.06] blur-3xl">
            </div>

            {{-- Bottom glow --}}
            <div
                class="absolute -bottom-40 -left-32 h-96 w-96 rounded-full
                       bg-slate-300/30 blur-3xl
                       dark:bg-slate-800/20">
            </div>

            {{-- Subtle grid --}}
            <div
                class="pointer-events-none absolute inset-0 opacity-40
                       [background-image:linear-gradient(rgba(148,163,184,0.035)_1px,transparent_1px),linear-gradient(90deg,rgba(148,163,184,0.035)_1px,transparent_1px)]
                       [background-size:48px_48px]
                       [mask-image:linear-gradient(to_bottom,black_0%,transparent_75%)]">
            </div>

        </div>


        {{-- ============================================================
            MAIN CONTENT
        ============================================================= --}}
        <main class="relative z-10 flex-1">

            <div
                class="mx-auto w-full max-w-[1600px] px-4 py-5
                       sm:px-6 lg:px-8">


                {{-- ====================================================
                    HERO HEADER
                ===================================================== --}}
                <section
                    class="mb-5 overflow-hidden rounded-2xl
                           border border-slate-200/60
                           bg-white/85 shadow-sm backdrop-blur-xl
                           dark:border-white/[0.06]
                           dark:bg-white/[0.035]">

                    <div
                        class="flex flex-col gap-4 px-5 py-5
                               lg:flex-row lg:items-center
                               lg:justify-between">

                        {{-- LEFT --}}
                        <div class="flex min-w-0 items-start gap-3.5">

                            <div
                                class="flex h-11 w-11 shrink-0
                                       items-center justify-center rounded-xl
                                       border border-[rgb(var(--accent-primary)/0.12)]
                                       bg-[rgb(var(--accent-primary)/0.08)]
                                       text-[rgb(var(--accent-primary))]">

                                <i
                                    data-lucide="users-round"
                                    class="h-[20px] w-[20px]">
                                </i>

                            </div>


                            <div class="min-w-0">

                                <div
                                    class="mb-1.5 flex flex-wrap
                                           items-center gap-2">

                                    <span
                                        class="text-[10px] font-bold
                                               uppercase tracking-[0.16em]
                                               text-[rgb(var(--accent-primary))]">

                                        Circle Workspace

                                    </span>


                                    <span
                                        class="h-1 w-1 rounded-full
                                               bg-slate-300
                                               dark:bg-slate-700">
                                    </span>


                                    <span
                                        class="text-[10px] font-semibold
                                               uppercase tracking-[0.12em]
                                               text-slate-400
                                               dark:text-slate-500">

                                        Administration

                                    </span>


                                    <span
                                        class="inline-flex items-center gap-1.5
                                               rounded-full
                                               border border-slate-200/70
                                               bg-white/70 px-2.5 py-1
                                               text-[10px] font-semibold
                                               text-slate-500
                                               backdrop-blur-sm
                                               dark:border-white/[0.06]
                                               dark:bg-white/[0.035]
                                               dark:text-slate-400">

                                        <span
                                            class="h-1.5 w-1.5 rounded-full
                                                   bg-[rgb(var(--accent-primary))]">
                                        </span>

                                        {{ $users->count() ?? 0 }} Users

                                    </span>

                                </div>


                                <h1
                                    class="text-[25px] font-bold
                                           tracking-tight text-slate-900
                                           dark:text-white sm:text-[27px]">

                                    User Management

                                </h1>


                                <p
                                    class="mt-1 max-w-2xl text-[13px]
                                           leading-5 text-slate-500
                                           dark:text-slate-400">

                                    Manage registered users, account status,
                                    roles, and access information.

                                </p>

                            </div>

                        </div>


                        {{-- RIGHT STATUS --}}
                        <div
                            class="flex shrink-0 items-center
                                   rounded-xl
                                   border border-slate-200/60
                                   bg-slate-50/70 px-3.5 py-2.5
                                   backdrop-blur-xl
                                   dark:border-white/[0.06]
                                   dark:bg-white/[0.025]">

                            <div
                                class="flex h-8 w-8 items-center
                                       justify-center rounded-lg
                                       bg-[rgb(var(--accent-primary)/0.08)]
                                       text-[rgb(var(--accent-primary))]">

                                <i
                                    data-lucide="shield-check"
                                    class="h-4 w-4">
                                </i>

                            </div>


                            <div class="ml-2.5">

                                <p
                                    class="text-[9px] font-bold
                                           uppercase tracking-[0.14em]
                                           text-slate-400
                                           dark:text-slate-500">

                                    Access Control

                                </p>


                                <p
                                    class="mt-0.5 text-xs font-semibold
                                           text-slate-700
                                           dark:text-slate-200">

                                    Central User Directory

                                </p>

                            </div>

                        </div>

                    </div>

                </section>


                {{-- ====================================================
                    USER DIRECTORY CARD
                ===================================================== --}}
                <section
                    class="overflow-hidden rounded-2xl
                           border border-slate-200/60
                           bg-white/70 shadow-sm backdrop-blur-xl
                           dark:border-white/[0.06]
                           dark:bg-white/[0.035]">


                    {{-- =================================================
                        CARD HEADER
                    ================================================== --}}
                    <div
                        class="border-b border-slate-200/60
                               dark:border-white/[0.06]">

                        <div
                            class="flex flex-col gap-3
                                   px-4 py-3.5
                                   sm:flex-row sm:items-center
                                   sm:justify-between sm:px-5">

                            {{-- TITLE --}}
                            <div class="flex items-center gap-2.5">

                                <div
                                    class="flex h-9 w-9 shrink-0
                                           items-center justify-center
                                           rounded-lg
                                           bg-slate-100/80
                                           text-slate-500
                                           dark:bg-white/[0.05]
                                           dark:text-slate-400">

                                    <i
                                        data-lucide="users"
                                        class="h-[17px] w-[17px]">
                                    </i>

                                </div>


                                <div>

                                    <h2
                                        class="text-[13px] font-semibold
                                               text-slate-900
                                               dark:text-white">

                                        Registered Users

                                    </h2>


                                    <p
                                        class="mt-0.5 text-[11px]
                                               text-slate-400
                                               dark:text-slate-500">

                                        View and manage all registered accounts.

                                    </p>

                                </div>

                            </div>


                            {{-- DIRECTORY INDICATOR --}}
                            <div
                                class="hidden items-center gap-1.5
                                       text-[11px] text-slate-400
                                       dark:text-slate-500 md:flex">

                                <i
                                    data-lucide="database"
                                    class="h-3.5 w-3.5">
                                </i>

                                <span>
                                    Central User Directory
                                </span>

                            </div>

                        </div>


                        {{-- =================================================
                            FILTER TOOLBAR
                        ================================================== --}}
                        <div
                            class="border-t border-slate-200/50
                                   bg-slate-50/45 px-4 py-3
                                   dark:border-white/[0.05]
                                   dark:bg-white/[0.015]
                                   sm:px-5">

                            <div
                                class="flex flex-col gap-2.5
                                       xl:flex-row xl:items-center">

                                {{-- SEARCH --}}
                                <div class="relative min-w-0 flex-1">

                                    <div
                                        class="pointer-events-none absolute
                                               inset-y-0 left-0 flex
                                               items-center pl-3
                                               text-slate-400">

                                        <i
                                            data-lucide="search"
                                            class="h-3.5 w-3.5">
                                        </i>

                                    </div>


                                    <input
                                        type="text"
                                        id="userSearch"
                                        autocomplete="off"
                                        class="h-10 w-full rounded-lg
                                               border border-slate-200/70
                                               bg-white/80 pl-9 pr-9
                                               text-xs text-slate-800
                                               outline-none transition
                                               placeholder:text-slate-400
                                               hover:border-slate-300
                                               focus:border-[rgb(var(--accent-primary))]
                                               focus:ring-4
                                               focus:ring-[rgb(var(--accent-primary)/0.08)]
                                               dark:border-white/[0.08]
                                               dark:bg-slate-900/60
                                               dark:text-white
                                               dark:placeholder:text-slate-500
                                               dark:hover:border-white/[0.12]"
                                        placeholder="Search name, employee ID, or email...">

                                </div>


                                {{-- DIVISION --}}
                                <div class="relative xl:w-56">

                                    <select
                                        id="divisionFilter"
                                        class="h-10 w-full appearance-none
                                               rounded-lg
                                               border border-slate-200/70
                                               bg-white/80 px-3 pr-9
                                               text-xs font-medium
                                               text-slate-600 outline-none
                                               transition
                                               hover:border-slate-300
                                               focus:border-[rgb(var(--accent-primary))]
                                               focus:ring-4
                                               focus:ring-[rgb(var(--accent-primary)/0.08)]
                                               dark:border-white/[0.08]
                                               dark:bg-slate-900/60
                                               dark:text-slate-300">

                                        <option value="">
                                            All Divisions
                                        </option>

                                        <option value="Installer / Technician">
                                            Installer / Technician
                                        </option>

                                        <option value="Warehouse & Inventory">
                                            Warehouse & Inventory
                                        </option>

                                        <option value="Sales & Marketing">
                                            Sales & Marketing
                                        </option>

                                    </select>


                                    <i
                                        data-lucide="chevron-down"
                                        class="pointer-events-none absolute
                                               right-3 top-1/2 h-3.5 w-3.5
                                               -translate-y-1/2
                                               text-slate-400">
                                    </i>

                                </div>


                                {{-- STATUS --}}
                                <div class="relative xl:w-40">

                                    <select
                                        id="statusFilter"
                                        class="h-10 w-full appearance-none
                                               rounded-lg
                                               border border-slate-200/70
                                               bg-white/80 px-3 pr-9
                                               text-xs font-medium
                                               text-slate-600 outline-none
                                               transition
                                               hover:border-slate-300
                                               focus:border-[rgb(var(--accent-primary))]
                                               focus:ring-4
                                               focus:ring-[rgb(var(--accent-primary)/0.08)]
                                               dark:border-white/[0.08]
                                               dark:bg-slate-900/60
                                               dark:text-slate-300">

                                        <option value="">
                                            All Status
                                        </option>

                                        <option value="active">
                                            Active
                                        </option>

                                        <option value="inactive">
                                            Inactive
                                        </option>

                                    </select>


                                    <i
                                        data-lucide="chevron-down"
                                        class="pointer-events-none absolute
                                               right-3 top-1/2 h-3.5 w-3.5
                                               -translate-y-1/2
                                               text-slate-400">
                                    </i>

                                </div>


                                {{-- RESET --}}
                                <button
                                    type="button"
                                    id="userFilterReset"
                                    class="inline-flex h-10 shrink-0
                                           items-center justify-center
                                           gap-1.5 rounded-lg
                                           border border-slate-200/70
                                           bg-white/80 px-3.5
                                           text-xs font-semibold
                                           text-slate-500 transition
                                           hover:border-slate-300
                                           hover:bg-slate-100
                                           hover:text-slate-800
                                           focus:outline-none
                                           focus:ring-4
                                           focus:ring-slate-500/10
                                           dark:border-white/[0.08]
                                           dark:bg-slate-900/60
                                           dark:text-slate-400
                                           dark:hover:bg-slate-800
                                           dark:hover:text-white">

                                    <i
                                        data-lucide="rotate-ccw"
                                        class="h-3.5 w-3.5">
                                    </i>

                                    Reset

                                </button>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                        USERS TABLE
                    ================================================== --}}
                    <div class="overflow-x-auto">

                        <table
                            id="usersTable"
                            class="w-full min-w-[1120px] text-left">

                            <thead
                                class="border-b border-slate-200/60
                                       bg-slate-50/50
                                       dark:border-white/[0.06]
                                       dark:bg-white/[0.025]">

                                <tr>

                                    <th class="px-5 py-3">
                                        <span
                                            class="text-[9px] font-bold
                                                   uppercase tracking-[0.13em]
                                                   text-slate-400">
                                            User
                                        </span>
                                    </th>


                                    <th class="px-4 py-3">
                                        <span
                                            class="text-[9px] font-bold
                                                   uppercase tracking-[0.13em]
                                                   text-slate-400">
                                            Employee ID
                                        </span>
                                    </th>


                                    <th class="px-4 py-3">
                                        <span
                                            class="text-[9px] font-bold
                                                   uppercase tracking-[0.13em]
                                                   text-slate-400">
                                            Division
                                        </span>
                                    </th>


                                    <th class="px-4 py-3">
                                        <span
                                            class="text-[9px] font-bold
                                                   uppercase tracking-[0.13em]
                                                   text-slate-400">
                                            Position
                                        </span>
                                    </th>


                                    <th class="px-4 py-3">
                                        <span
                                            class="text-[9px] font-bold
                                                   uppercase tracking-[0.13em]
                                                   text-slate-400">
                                            Role
                                        </span>
                                    </th>


                                    <th class="px-4 py-3 text-center">
                                        <span
                                            class="text-[9px] font-bold
                                                   uppercase tracking-[0.13em]
                                                   text-slate-400">
                                            Status
                                        </span>
                                    </th>


                                    <th class="px-4 py-3">
                                        <span
                                            class="text-[9px] font-bold
                                                   uppercase tracking-[0.13em]
                                                   text-slate-400">
                                            Joined
                                        </span>
                                    </th>


                                    <th class="px-5 py-3 text-right">
                                        <span
                                            class="text-[9px] font-bold
                                                   uppercase tracking-[0.13em]
                                                   text-slate-400">
                                            Action
                                        </span>
                                    </th>

                                </tr>

                            </thead>


                            <tbody
                                class="divide-y divide-slate-100/80
                                       dark:divide-white/[0.045]">

                                @forelse ($users as $user)

                                <tr
                                    class="user-row group transition-colors
                                           duration-150
                                           hover:bg-slate-50/60
                                           dark:hover:bg-white/[0.02]">

                                    {{-- USER --}}
                                    <td class="px-5 py-3">

                                        <div class="flex items-center gap-2.5">

                                            @if ($user->profile_photo)

                                            <img
                                                src="{{ asset('storage/' . $user->profile_photo) }}"
                                                alt="{{ $user->name }}"
                                                class="h-9 w-9 shrink-0
                                                           rounded-lg object-cover
                                                           ring-1 ring-slate-200/60
                                                           dark:ring-white/[0.08]">

                                            @else

                                            <div
                                                class="flex h-9 w-9 shrink-0
                                                           items-center justify-center
                                                           rounded-lg
                                                           bg-[rgb(var(--accent-primary))]
                                                           text-xs font-bold
                                                           text-white">

                                                {{ strtoupper(substr($user->name, 0, 1)) }}

                                            </div>

                                            @endif


                                            <div class="min-w-0">

                                                <p
                                                    class="max-w-[230px] truncate
                                                           text-xs font-semibold
                                                           text-slate-800
                                                           dark:text-white">

                                                    {{ $user->name }}

                                                </p>


                                                <p
                                                    class="mt-0.5 max-w-[240px]
                                                           truncate text-[11px]
                                                           text-slate-400
                                                           dark:text-slate-500">

                                                    {{ $user->email }}

                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- EMPLOYEE ID --}}
                                    <td class="px-4 py-3">

                                        @if ($user->employee_id)

                                        <span
                                            class="inline-flex items-center
                                                       rounded-md
                                                       bg-slate-100/80 px-2 py-1
                                                       font-mono text-[10px]
                                                       font-semibold text-slate-500
                                                       dark:bg-white/[0.05]
                                                       dark:text-slate-400">

                                            {{ $user->employee_id }}

                                        </span>

                                        @else

                                        <span
                                            class="text-[11px]
                                                       text-slate-400">
                                            -
                                        </span>

                                        @endif

                                    </td>


                                    {{-- DIVISION --}}
                                    <td class="px-4 py-3">

                                        <span
                                            class="inline-flex max-w-[200px]
                                                   items-center rounded-md
                                                   bg-slate-100/80 px-2 py-1
                                                   text-[10px] font-medium
                                                   text-slate-500
                                                   dark:bg-white/[0.05]
                                                   dark:text-slate-400">

                                            {{ $user->division ?? '-' }}

                                        </span>

                                    </td>


                                    {{-- POSITION --}}
                                    <td class="px-4 py-3">

                                        <span
                                            class="text-xs font-medium
                                                   text-slate-600
                                                   dark:text-slate-300">

                                            {{ $user->position ?? '-' }}

                                        </span>

                                    </td>


                                    {{-- ROLE --}}
                                    <td class="px-4 py-3">

                                        @if ($user->role)

                                        <span
                                            class="inline-flex items-center gap-1.5
                                                       rounded-md
                                                       border border-slate-200/70
                                                       bg-white/70 px-2 py-1
                                                       text-[10px] font-semibold
                                                       text-slate-600
                                                       dark:border-white/[0.07]
                                                       dark:bg-white/[0.04]
                                                       dark:text-slate-300">

                                            <span
                                                class="h-1.5 w-1.5 rounded-full
                                                           bg-[rgb(var(--accent-primary))]">
                                            </span>

                                            {{ ucfirst(str_replace('_', ' ', $user->role)) }}

                                        </span>

                                        @else

                                        <span
                                            class="inline-flex items-center
                                                       rounded-md
                                                       bg-slate-100/70 px-2 py-1
                                                       text-[10px] font-medium
                                                       text-slate-400
                                                       dark:bg-white/[0.04]">

                                            Not assigned

                                        </span>

                                        @endif

                                    </td>


                                    {{-- STATUS --}}
                                    <td class="px-4 py-3 text-center">

                                        @if ($user->status === 'active')

                                        <span
                                            class="inline-flex items-center gap-1.5
                                                       rounded-full
                                                       border border-emerald-200/70
                                                       bg-emerald-50/70 px-2 py-1
                                                       text-[10px] font-semibold
                                                       text-emerald-700
                                                       dark:border-emerald-900/40
                                                       dark:bg-emerald-950/25
                                                       dark:text-emerald-400">

                                            <span
                                                class="h-1.5 w-1.5 rounded-full
                                                           bg-emerald-500">
                                            </span>

                                            Active

                                        </span>

                                        @elseif ($user->status === 'inactive')

                                        <span
                                            class="inline-flex items-center gap-1.5
                                                       rounded-full
                                                       border border-slate-200/70
                                                       bg-slate-100/70 px-2 py-1
                                                       text-[10px] font-semibold
                                                       text-slate-500
                                                       dark:border-white/[0.07]
                                                       dark:bg-white/[0.04]
                                                       dark:text-slate-400">

                                            <span
                                                class="h-1.5 w-1.5 rounded-full
                                                           bg-slate-400">
                                            </span>

                                            Inactive

                                        </span>

                                        @else

                                        <span
                                            class="inline-flex items-center gap-1.5
                                                       rounded-full
                                                       border border-amber-200/70
                                                       bg-amber-50/70 px-2 py-1
                                                       text-[10px] font-semibold
                                                       text-amber-700
                                                       dark:border-amber-900/40
                                                       dark:bg-amber-950/25
                                                       dark:text-amber-400">

                                            <span
                                                class="h-1.5 w-1.5 rounded-full
                                                           bg-amber-500">
                                            </span>

                                            {{ ucfirst($user->status ?? 'Unknown') }}

                                        </span>

                                        @endif

                                    </td>


                                    {{-- JOINED --}}
                                    <td class="px-4 py-3">

                                        <div class="flex items-center gap-1.5">

                                            <i
                                                data-lucide="calendar-days"
                                                class="h-3.5 w-3.5 shrink-0
                                                       text-slate-400">
                                            </i>

                                            <span
                                                class="text-[11px] font-medium
                                                       text-slate-400
                                                       dark:text-slate-500">

                                                {{ $user->created_at
                                                    ? $user->created_at->format('d/m/Y')
                                                    : '-'
                                                }}

                                            </span>

                                        </div>

                                    </td>


                                    {{-- ACTION --}}
                                    <td class="px-5 py-3">

                                        <div
                                            class="flex items-center
                                                   justify-end gap-1">

                                            {{-- VIEW --}}
                                            <button
                                                type="button"
                                                class="user-action inline-flex
                                                       h-8 w-8 items-center
                                                       justify-center rounded-lg
                                                       border border-slate-200/70
                                                       bg-white/70
                                                       text-slate-400 transition
                                                       hover:border-slate-300
                                                       hover:bg-slate-100
                                                       hover:text-slate-700
                                                       focus:outline-none
                                                       focus:ring-4
                                                       focus:ring-slate-500/10
                                                       dark:border-white/[0.07]
                                                       dark:bg-white/[0.04]
                                                       dark:text-slate-500
                                                       dark:hover:bg-white/[0.08]
                                                       dark:hover:text-white"
                                                title="View Detail"
                                                data-action="view"
                                                data-id="{{ $user->id }}">

                                                <i
                                                    data-lucide="eye"
                                                    class="h-3.5 w-3.5">
                                                </i>

                                            </button>


                                            {{-- EDIT --}}
                                            <button
                                                type="button"
                                                class="user-action inline-flex
                                                       h-8 w-8 items-center
                                                       justify-center rounded-lg
                                                       border border-slate-200/70
                                                       bg-white/70
                                                       text-slate-400 transition
                                                       hover:border-slate-300
                                                       hover:bg-slate-100
                                                       hover:text-slate-700
                                                       focus:outline-none
                                                       focus:ring-4
                                                       focus:ring-slate-500/10
                                                       dark:border-white/[0.07]
                                                       dark:bg-white/[0.04]
                                                       dark:text-slate-500
                                                       dark:hover:bg-white/[0.08]
                                                       dark:hover:text-white"
                                                title="Edit User"
                                                data-action="edit"
                                                data-id="{{ $user->id }}">

                                                <i
                                                    data-lucide="pencil"
                                                    class="h-3.5 w-3.5">
                                                </i>

                                            </button>


                                            {{-- STATUS --}}
                                            @if ($user->status === 'active')

                                            <button
                                                type="button"
                                                class="user-action inline-flex
                                                           h-8 w-8 items-center
                                                           justify-center rounded-lg
                                                           border border-rose-200/70
                                                           bg-rose-50/70
                                                           text-rose-500 transition
                                                           hover:border-rose-300
                                                           hover:bg-rose-100
                                                           focus:outline-none
                                                           focus:ring-4
                                                           focus:ring-rose-500/10
                                                           dark:border-rose-900/40
                                                           dark:bg-rose-950/25
                                                           dark:text-rose-400
                                                           dark:hover:bg-rose-950/50"
                                                title="Deactivate"
                                                data-action="deactivate"
                                                data-id="{{ $user->id }}">

                                                <i
                                                    data-lucide="user-round-minus"
                                                    class="h-3.5 w-3.5">
                                                </i>

                                            </button>

                                            @else

                                            <button
                                                type="button"
                                                class="user-action inline-flex
                                                           h-8 w-8 items-center
                                                           justify-center rounded-lg
                                                           border border-emerald-200/70
                                                           bg-emerald-50/70
                                                           text-emerald-500 transition
                                                           hover:border-emerald-300
                                                           hover:bg-emerald-100
                                                           focus:outline-none
                                                           focus:ring-4
                                                           focus:ring-emerald-500/10
                                                           dark:border-emerald-900/40
                                                           dark:bg-emerald-950/25
                                                           dark:text-emerald-400
                                                           dark:hover:bg-emerald-950/50"
                                                title="Activate"
                                                data-action="activate"
                                                data-id="{{ $user->id }}">

                                                <i
                                                    data-lucide="user-round-check"
                                                    class="h-3.5 w-3.5">
                                                </i>

                                            </button>

                                            @endif

                                        </div>

                                    </td>

                                </tr>


                                @empty

                                {{-- =================================================
                                    EMPTY STATE
                                ================================================== --}}
                                <tr>

                                    <td
                                        colspan="8"
                                        class="px-5 py-16">

                                        <div
                                            class="flex flex-col items-center
                                                   justify-center text-center">

                                            <div
                                                class="mb-4 flex h-14 w-14
                                                       items-center justify-center
                                                       rounded-xl border
                                                       border-slate-200/70
                                                       bg-slate-50/70
                                                       text-slate-400
                                                       dark:border-white/[0.07]
                                                       dark:bg-white/[0.04]
                                                       dark:text-slate-500">

                                                <i
                                                    data-lucide="users-round"
                                                    class="h-6 w-6">
                                                </i>

                                            </div>


                                            <h3
                                                class="text-xs font-semibold
                                                       text-slate-800
                                                       dark:text-white">

                                                No users found

                                            </h3>


                                            <p
                                                class="mt-1 max-w-md text-xs
                                                       leading-5 text-slate-400
                                                       dark:text-slate-500">

                                                There are no registered users
                                                to display.

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
                        class="flex flex-col gap-2.5
                                   border-t border-slate-200/60
                                   bg-white/35 px-4 py-3
                                   dark:border-white/[0.06]
                                   dark:bg-white/[0.015]
                                   sm:flex-row sm:items-center
                                   sm:justify-between sm:px-5">

                        <p
                            class="text-[10px] text-slate-400
                                       dark:text-slate-500">

                            Showing user records

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
            class="relative z-10 mt-auto border-t
                   border-slate-200/70 bg-white/60
                   dark:border-white/10
                   dark:bg-white/[0.02]">

            <div
                class="mx-auto flex max-w-[1600px]
                       flex-col gap-2 px-4 py-3
                       sm:flex-row sm:items-center
                       sm:justify-between sm:px-6 lg:px-8">

                <p
                    class="text-[10px] font-medium
                           text-slate-400
                           dark:text-slate-500">

                    © {{ date('Y') }} Circle Suites.

                </p>


                <div
                    class="flex items-center gap-1.5
                           text-[10px] text-slate-400
                           dark:text-slate-500">

                    <span
                        class="h-1.5 w-1.5 rounded-full
                               bg-emerald-500">
                    </span>

                    <span>
                        User Management
                    </span>

                </div>

            </div>

        </footer>

    </div>


    {{-- ================================================================
        JAVASCRIPT
    ================================================================= --}}
    <script>
        (() => {

            'use strict';


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
               FILTER
            ============================================================ */

            function filterUsers() {

                const searchInput =
                    document.getElementById('userSearch');

                const divisionFilter =
                    document.getElementById('divisionFilter');

                const statusFilter =
                    document.getElementById('statusFilter');


                const search =
                    searchInput?.value
                    ?.toLowerCase()
                    ?.trim() || '';


                const division =
                    divisionFilter?.value
                    ?.toLowerCase()
                    ?.trim() || '';


                const status =
                    statusFilter?.value
                    ?.toLowerCase()
                    ?.trim() || '';


                const rows =
                    document.querySelectorAll(
                        '#usersTable tbody tr.user-row'
                    );


                rows.forEach((row) => {

                    const text =
                        row.innerText
                        .toLowerCase();


                    const rowDivision =
                        row.cells[2]
                        ?.innerText
                        ?.toLowerCase()
                        ?.trim() || '';


                    const rowStatus =
                        row.cells[5]
                        ?.innerText
                        ?.toLowerCase()
                        ?.trim() || '';


                    const matchSearch = !search ||
                        text.includes(search);


                    const matchDivision = !division ||
                        rowDivision.includes(division);


                    const matchStatus = !status ||
                        rowStatus.includes(status);


                    row.classList.toggle(
                        'hidden',
                        !(
                            matchSearch &&
                            matchDivision &&
                            matchStatus
                        )
                    );

                });

            }


            /* ============================================================
               RESET
            ============================================================ */

            function resetFilters() {

                const searchInput =
                    document.getElementById('userSearch');

                const divisionFilter =
                    document.getElementById('divisionFilter');

                const statusFilter =
                    document.getElementById('statusFilter');


                if (searchInput) {
                    searchInput.value = '';
                }


                if (divisionFilter) {
                    divisionFilter.value = '';
                }


                if (statusFilter) {
                    statusFilter.value = '';
                }


                filterUsers();

            }


            /* ============================================================
               ACTION HANDLER
            ============================================================ */

            function handleUserAction(
                action,
                id
            ) {

                switch (action) {

                    case 'view':

                        console.log(
                            'View user:',
                            id
                        );

                        break;


                    case 'edit':

                        console.log(
                            'Edit user:',
                            id
                        );

                        break;


                    case 'activate':

                        console.log(
                            'Activate user:',
                            id
                        );

                        break;


                    case 'deactivate':

                        console.log(
                            'Deactivate user:',
                            id
                        );

                        break;

                }

            }


            /* ============================================================
               INITIALIZE
            ============================================================ */

            function initializeUserManagement() {

                const searchInput =
                    document.getElementById(
                        'userSearch'
                    );


                const divisionFilter =
                    document.getElementById(
                        'divisionFilter'
                    );


                const statusFilter =
                    document.getElementById(
                        'statusFilter'
                    );


                const resetButton =
                    document.getElementById(
                        'userFilterReset'
                    );


                const usersTable =
                    document.getElementById(
                        'usersTable'
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


                statusFilter?.addEventListener(
                    'change',
                    filterUsers
                );


                resetButton?.addEventListener(
                    'click',
                    resetFilters
                );


                /* --------------------------------------------------------
                   ACTION EVENTS
                -------------------------------------------------------- */

                usersTable?.addEventListener(
                    'click',
                    function(event) {

                        const button =
                            event.target.closest(
                                '.user-action'
                            );


                        if (!button) {
                            return;
                        }


                        handleUserAction(
                            button.dataset.action,
                            button.dataset.id
                        );

                    }
                );


                /* --------------------------------------------------------
                   LUCIDE
                -------------------------------------------------------- */

                initializeLucide();

            }


            /* ============================================================
               START
            ============================================================ */

            if (
                document.readyState ===
                'loading'
            ) {

                document.addEventListener(
                    'DOMContentLoaded',
                    initializeUserManagement, {
                        once: true
                    }
                );

            } else {

                initializeUserManagement();

            }

        })();
    </script>

</x-layouts.circle.admin>