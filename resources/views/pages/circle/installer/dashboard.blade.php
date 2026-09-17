<x-layouts.circle.installer title="Installer Dashboard">

    @php
    $user = auth()->user();

    $firstName = $user?->name
    ? explode(' ', trim($user->name))[0]
    : 'User';

    $projects = [
    [
    'name' => 'TBF Shopee',
    'location' => 'Jakarta',
    'status' => 'In Progress',
    'progress' => 72,
    ],
    [
    'name' => 'Patra Logistik Pertamina',
    'location' => 'Jakarta',
    'status' => 'In Progress',
    'progress' => 58,
    ],
    [
    'name' => 'SCH Mall',
    'location' => 'Yogyakarta',
    'status' => 'Scheduled',
    'progress' => 25,
    ],
    ];

    $activities = [
    [
    'icon' => 'check',
    'title' => 'Maintenance completed',
    'time' => '09:42',
    'desc' => 'Panel inspection completed.',
    ],
    [
    'icon' => 'map-pin',
    'title' => 'Site visit',
    'time' => '11:15',
    'desc' => 'Arrived at assigned project.',
    ],
    [
    'icon' => 'clipboard-check',
    'title' => 'Inspection',
    'time' => '14:30',
    'desc' => 'Equipment inspection scheduled.',
    ],
    ];
    @endphp

    <section
        class="relative flex min-h-[calc(100vh-116px)] flex-col
               overflow-hidden rounded-2xl
               bg-slate-50 dark:bg-slate-950">

        {{-- Ambient Background --}}
        <div
            class="pointer-events-none absolute -left-24 -top-24 h-72 w-72
                   rounded-full bg-indigo-400/10 blur-3xl
                   dark:bg-indigo-500/10">
        </div>

        <div
            class="pointer-events-none absolute -right-24 top-0 h-72 w-72
                   rounded-full bg-cyan-400/10 blur-3xl
                   dark:bg-cyan-500/10">
        </div>

        <div
            class="pointer-events-none absolute inset-0 opacity-[0.025]
                   dark:opacity-[0.04]"
            style="background-image:
                linear-gradient(#64748b 1px, transparent 1px),
                linear-gradient(90deg, #64748b 1px, transparent 1px);
                background-size: 32px 32px;">
        </div>

        <div class="relative z-10 flex flex-1 flex-col">

            {{-- =========================================================
                 HERO
            ========================================================== --}}
            <div
                class="mb-5 flex flex-col gap-4 rounded-2xl
                       border border-slate-200/80 bg-white/80 p-5
                       shadow-sm backdrop-blur-xl
                       dark:border-slate-800/80 dark:bg-slate-900/70
                       sm:flex-row sm:items-center sm:justify-between">

                <div class="min-w-0">

                    <div
                        class="mb-1 flex items-center gap-2 text-[10px]
                               font-bold uppercase tracking-[0.16em]
                               text-indigo-600 dark:text-indigo-400">

                        <span
                            class="h-1.5 w-1.5 rounded-full bg-indigo-500">
                        </span>

                        Installer Workspace
                    </div>

                    <h1
                        class="text-xl font-bold tracking-tight
                               text-slate-900 dark:text-white
                               sm:text-2xl">
                        Good evening, {{ $firstName }}
                    </h1>

                    <p
                        class="mt-1 max-w-2xl text-xs leading-5
                               text-slate-500 dark:text-slate-400">
                        Monitor your assigned projects, tasks, and
                        field activities from one workspace.
                    </p>
                </div>

                {{-- Account Status --}}
                <div
                    class="flex shrink-0 items-center gap-2 rounded-xl
                           border border-emerald-200 bg-emerald-50 px-3 py-2
                           dark:border-emerald-900/60
                           dark:bg-emerald-950/30">

                    <span
                        class="flex h-7 w-7 items-center justify-center
                               rounded-lg bg-emerald-100 text-emerald-600
                               dark:bg-emerald-900/50
                               dark:text-emerald-400">

                        <i
                            data-lucide="shield-check"
                            class="h-4 w-4">
                        </i>

                    </span>

                    <div>
                        <div
                            class="text-[11px] font-bold
                                   text-emerald-700
                                   dark:text-emerald-400">
                            Account Active
                        </div>

                        <div
                            class="text-[10px] text-emerald-600/80
                                   dark:text-emerald-500">
                            Installer access
                        </div>
                    </div>
                </div>

            </div>


            {{-- =========================================================
                 STATISTICS
            ========================================================== --}}
            <div
                class="mb-5 grid grid-cols-2 gap-3 xl:grid-cols-4">

                {{-- Projects --}}
                <div
                    class="rounded-2xl border border-slate-200/80
                           bg-white/80 p-4 shadow-sm backdrop-blur-xl
                           dark:border-slate-800/80
                           dark:bg-slate-900/70">

                    <div class="flex items-start justify-between">

                        <span
                            class="flex h-9 w-9 items-center justify-center
                                   rounded-xl bg-indigo-50 text-indigo-600
                                   dark:bg-indigo-950/50
                                   dark:text-indigo-400">

                            <i
                                data-lucide="folder"
                                class="h-4 w-4">
                            </i>

                        </span>

                        <span
                            class="text-[10px] font-semibold
                                   text-slate-400">
                            Assigned
                        </span>

                    </div>

                    <div
                        class="mt-4 text-2xl font-bold tracking-tight
                               text-slate-900 dark:text-white">
                        04
                    </div>

                    <div
                        class="mt-0.5 text-[11px] font-medium
                               text-slate-500 dark:text-slate-400">
                        My Projects
                    </div>
                </div>


                {{-- Tasks --}}
                <div
                    class="rounded-2xl border border-slate-200/80
                           bg-white/80 p-4 shadow-sm backdrop-blur-xl
                           dark:border-slate-800/80
                           dark:bg-slate-900/70">

                    <div class="flex items-start justify-between">

                        <span
                            class="flex h-9 w-9 items-center justify-center
                                   rounded-xl bg-cyan-50 text-cyan-600
                                   dark:bg-cyan-950/50
                                   dark:text-cyan-400">

                            <i
                                data-lucide="clipboard-check"
                                class="h-4 w-4">
                            </i>

                        </span>

                        <span
                            class="text-[10px] font-semibold
                                   text-slate-400">
                            Current
                        </span>

                    </div>

                    <div
                        class="mt-4 text-2xl font-bold tracking-tight
                               text-slate-900 dark:text-white">
                        08
                    </div>

                    <div
                        class="mt-0.5 text-[11px] font-medium
                               text-slate-500 dark:text-slate-400">
                        Assigned Tasks
                    </div>
                </div>


                {{-- Progress --}}
                <div
                    class="rounded-2xl border border-slate-200/80
                           bg-white/80 p-4 shadow-sm backdrop-blur-xl
                           dark:border-slate-800/80
                           dark:bg-slate-900/70">

                    <div class="flex items-start justify-between">

                        <span
                            class="flex h-9 w-9 items-center justify-center
                                   rounded-xl bg-emerald-50
                                   text-emerald-600
                                   dark:bg-emerald-950/50
                                   dark:text-emerald-400">

                            <i
                                data-lucide="chart-column"
                                class="h-4 w-4">
                            </i>

                        </span>

                        <span
                            class="text-[10px] font-semibold
                                   text-emerald-600
                                   dark:text-emerald-400">
                            On Track
                        </span>

                    </div>

                    <div
                        class="mt-4 text-2xl font-bold tracking-tight
                               text-slate-900 dark:text-white">
                        72%
                    </div>

                    <div
                        class="mt-0.5 text-[11px] font-medium
                               text-slate-500 dark:text-slate-400">
                        Work Progress
                    </div>

                </div>


                {{-- Activities --}}
                <div
                    class="rounded-2xl border border-slate-200/80
                           bg-white/80 p-4 shadow-sm backdrop-blur-xl
                           dark:border-slate-800/80
                           dark:bg-slate-900/70">

                    <div class="flex items-start justify-between">

                        <span
                            class="flex h-9 w-9 items-center justify-center
                                   rounded-xl bg-amber-50 text-amber-600
                                   dark:bg-amber-950/50
                                   dark:text-amber-400">

                            <i
                                data-lucide="activity"
                                class="h-4 w-4">
                            </i>

                        </span>

                        <span
                            class="text-[10px] font-semibold
                                   text-slate-400">
                            This month
                        </span>

                    </div>

                    <div
                        class="mt-4 text-2xl font-bold tracking-tight
                               text-slate-900 dark:text-white">
                        24
                    </div>

                    <div
                        class="mt-0.5 text-[11px] font-medium
                               text-slate-500 dark:text-slate-400">
                        Field Activities
                    </div>

                </div>

            </div>


            {{-- =========================================================
                 MAIN CONTENT
            ========================================================== --}}
            <div
                class="grid flex-1 gap-5 xl:grid-cols-[1.45fr_1fr]">

                {{-- Assigned Projects --}}
                <div
                    class="overflow-hidden rounded-2xl
                           border border-slate-200/80 bg-white/80
                           shadow-sm backdrop-blur-xl
                           dark:border-slate-800/80
                           dark:bg-slate-900/70">

                    {{-- Header --}}
                    <div
                        class="flex items-center justify-between
                               border-b border-slate-200/80
                               px-5 py-4
                               dark:border-slate-800/80">

                        <div>

                            <h2
                                class="text-sm font-bold
                                       text-slate-900 dark:text-white">
                                Assigned Projects
                            </h2>

                            <p
                                class="mt-0.5 text-[11px]
                                       text-slate-500
                                       dark:text-slate-400">
                                Projects currently assigned to you
                            </p>

                        </div>

                        <button
                            type="button"
                            class="flex items-center gap-1.5
                                   rounded-lg px-2.5 py-1.5
                                   text-[11px] font-semibold
                                   text-indigo-600
                                   hover:bg-indigo-50
                                   dark:text-indigo-400
                                   dark:hover:bg-indigo-950/40">

                            View all

                            <i
                                data-lucide="arrow-up-right"
                                class="h-3.5 w-3.5">
                            </i>

                        </button>

                    </div>


                    {{-- Projects List --}}
                    <div
                        class="divide-y divide-slate-100
                               dark:divide-slate-800">

                        @foreach ($projects as $project)

                        <div
                            class="flex items-center gap-3 px-5 py-3.5
                                       transition
                                       hover:bg-slate-50/80
                                       dark:hover:bg-slate-800/40">

                            {{-- Project Icon --}}
                            <div
                                class="flex h-9 w-9 shrink-0
                                           items-center justify-center
                                           rounded-xl bg-slate-100
                                           text-slate-600
                                           dark:bg-slate-800
                                           dark:text-slate-300">

                                <i
                                    data-lucide="building-2"
                                    class="h-4 w-4">
                                </i>

                            </div>


                            {{-- Project Info --}}
                            <div class="min-w-0 flex-1">

                                <div
                                    class="truncate text-xs font-bold
                                               text-slate-900
                                               dark:text-white">
                                    {{ $project['name'] }}
                                </div>

                                <div
                                    class="mt-0.5 flex items-center gap-1
                                               text-[10px] text-slate-500
                                               dark:text-slate-400">

                                    <i
                                        data-lucide="map-pin"
                                        class="h-3 w-3">
                                    </i>

                                    {{ $project['location'] }}

                                </div>

                            </div>


                            {{-- Progress --}}
                            <div class="hidden w-28 sm:block">

                                <div
                                    class="mb-1 flex items-center
                                               justify-between text-[9px]
                                               font-semibold
                                               text-slate-400">

                                    <span>Progress</span>

                                    <span>
                                        {{ $project['progress'] }}%
                                    </span>

                                </div>

                                <div
                                    class="h-1.5 overflow-hidden
                                               rounded-full
                                               bg-slate-100
                                               dark:bg-slate-800">

                                    <div
                                        class="h-full rounded-full
                                                   bg-indigo-500"
                                        style="width: {{ $project['progress'] }}%;">
                                    </div>

                                </div>

                            </div>


                            {{-- Status --}}
                            <span
                                class="hidden rounded-full
                                           bg-emerald-50 px-2 py-1
                                           text-[9px] font-bold
                                           text-emerald-700 sm:inline-flex
                                           dark:bg-emerald-950/40
                                           dark:text-emerald-400">

                                {{ $project['status'] }}

                            </span>


                            <i
                                data-lucide="chevron-right"
                                class="h-4 w-4 shrink-0
                                           text-slate-300
                                           dark:text-slate-600">
                            </i>

                        </div>

                        @endforeach

                    </div>

                </div>


                {{-- Today's Activity --}}
                <div
                    class="overflow-hidden rounded-2xl
                           border border-slate-200/80 bg-white/80
                           shadow-sm backdrop-blur-xl
                           dark:border-slate-800/80
                           dark:bg-slate-900/70">

                    {{-- Header --}}
                    <div
                        class="border-b border-slate-200/80
                               px-5 py-4
                               dark:border-slate-800/80">

                        <h2
                            class="text-sm font-bold
                                   text-slate-900 dark:text-white">
                            Today's Activity
                        </h2>

                        <p
                            class="mt-0.5 text-[11px]
                                   text-slate-500
                                   dark:text-slate-400">
                            Your latest field activities
                        </p>

                    </div>


                    {{-- Timeline --}}
                    <div class="p-5">

                        <div class="relative space-y-5">

                            <div
                                class="absolute bottom-2 left-[15px]
                                       top-2 w-px bg-slate-200
                                       dark:bg-slate-800">
                            </div>

                            @foreach ($activities as $activity)

                            <div
                                class="relative flex gap-3">

                                {{-- Activity Icon --}}
                                <div
                                    class="relative z-10 flex h-8 w-8
                                               shrink-0 items-center
                                               justify-center rounded-full
                                               border border-slate-200
                                               bg-white text-indigo-600
                                               dark:border-slate-700
                                               dark:bg-slate-900
                                               dark:text-indigo-400">

                                    <i
                                        data-lucide="{{ $activity['icon'] }}"
                                        class="h-3.5 w-3.5">
                                    </i>

                                </div>


                                {{-- Activity Content --}}
                                <div
                                    class="min-w-0 flex-1 pt-0.5">

                                    <div
                                        class="flex items-center
                                                   justify-between gap-3">

                                        <div
                                            class="truncate text-xs
                                                       font-bold
                                                       text-slate-800
                                                       dark:text-slate-200">

                                            {{ $activity['title'] }}

                                        </div>

                                        <span
                                            class="shrink-0 text-[10px]
                                                       font-medium
                                                       text-slate-400">

                                            {{ $activity['time'] }}

                                        </span>

                                    </div>

                                    <p
                                        class="mt-0.5 text-[10px]
                                                   leading-4 text-slate-500
                                                   dark:text-slate-400">

                                        {{ $activity['desc'] }}

                                    </p>

                                </div>

                            </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>


            {{-- =========================================================
                 FOOTER
            ========================================================== --}}
            <div
                class="mt-5 flex flex-col gap-1 border-t
                       border-slate-200/80 pt-4
                       text-[10px] text-slate-400
                       dark:border-slate-800/80
                       sm:flex-row sm:items-center
                       sm:justify-between">

                <span>
                    Circle Suites · Digital Operations Platform
                </span>

                <span>
                    One Platform, One Data, One Workflow
                </span>

            </div>

        </div>

    </section>

</x-layouts.circle.installer>