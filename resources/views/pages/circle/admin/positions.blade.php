<x-layouts.circle.admin>

    <x-slot name="title">
        Master Jabatan
    </x-slot>

    <x-slot name="pageTitle">
        Master Jabatan
    </x-slot>


    {{-- =========================================================
         PAGE
    ========================================================== --}}

    <div class="flex min-h-[calc(100vh-4rem)] flex-col bg-slate-50 dark:bg-slate-950">

        <main class="relative flex-1 overflow-hidden">

            {{-- AMBIENT BACKGROUND --}}

            <div
                class="pointer-events-none absolute -left-40 -top-40 h-96 w-96 rounded-full bg-primary/[0.07] blur-3xl">
            </div>

            <div
                class="pointer-events-none absolute -right-32 top-20 h-80 w-80 rounded-full bg-cyan-500/[0.06] blur-3xl">
            </div>

            <div
                class="pointer-events-none absolute inset-0 opacity-40
                       [background-image:linear-gradient(rgba(148,163,184,0.035)_1px,transparent_1px),linear-gradient(90deg,rgba(148,163,184,0.035)_1px,transparent_1px)]
                       [background-size:48px_48px]
                       [mask-image:linear-gradient(to_bottom,black_0%,transparent_75%)]">
            </div>


            <div class="relative mx-auto w-full max-w-[1600px] px-4 py-5 sm:px-6 lg:px-8">


                {{-- =====================================================
                     HEADER
                ====================================================== --}}

                <section
                    class="relative mb-5 overflow-hidden rounded-2xl border border-slate-200/80 bg-white/85 px-5 py-5 shadow-sm backdrop-blur-xl dark:border-white/10 dark:bg-white/[0.045] sm:px-6">

                    <div
                        class="pointer-events-none absolute -right-20 -top-24 h-64 w-64 rounded-full bg-primary/[0.08] blur-3xl">
                    </div>

                    <div
                        class="pointer-events-none absolute -bottom-28 left-1/3 h-56 w-56 rounded-full bg-cyan-500/[0.06] blur-3xl">
                    </div>


                    <div
                        class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

                        <div class="min-w-0">

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

                                Circle Workspace

                            </div>


                            <h1
                                class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white sm:text-3xl">

                                Master Jabatan

                            </h1>


                            <p
                                class="mt-1.5 max-w-2xl text-xs leading-5 text-slate-500 dark:text-slate-400 sm:text-sm">

                                Kelola daftar jabatan yang tersedia pada Circle Suites.

                            </p>

                        </div>


                        {{-- ADD BUTTON --}}

                        <div class="shrink-0">

                            <button
                                type="button"
                                onclick="openPositionModal()"
                                class="inline-flex items-center gap-2 rounded-lg bg-gradient-to-r from-primary to-blue-600 px-3.5 py-2.5 text-xs font-semibold text-white shadow-sm shadow-primary/20 transition hover:-translate-y-0.5 hover:shadow-md">

                                <i
                                    data-lucide="plus"
                                    class="h-3.5 w-3.5">
                                </i>

                                Tambah Jabatan

                            </button>

                        </div>

                    </div>

                </section>


                {{-- =====================================================
                     TABLE
                ====================================================== --}}

                <section
                    class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white/85 shadow-sm backdrop-blur-xl dark:border-white/10 dark:bg-white/[0.045]">

                    {{-- TABLE HEADER --}}

                    <div
                        class="flex flex-col gap-3 border-b border-slate-200/80 px-5 py-4 sm:flex-row sm:items-center sm:justify-between dark:border-white/10">

                        <div class="flex items-center gap-2">

                            <span
                                class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary/10 text-primary">

                                <i
                                    data-lucide="briefcase-business"
                                    class="h-4 w-4">
                                </i>

                            </span>


                            <div>

                                <h3
                                    class="text-sm font-bold text-slate-900 dark:text-white">

                                    Daftar Jabatan

                                </h3>


                                <p
                                    class="mt-0.5 text-[11px] text-slate-500 dark:text-slate-400">

                                    Jabatan yang tersedia di dalam workspace Circle.

                                </p>

                            </div>

                        </div>


                        {{-- SEARCH --}}

                        <div class="relative w-full sm:w-64">

                            <i
                                data-lucide="search"
                                class="pointer-events-none absolute left-3 top-1/2 h-3.5 w-3.5 -translate-y-1/2 text-slate-400">
                            </i>


                            <input
                                type="search"
                                id="positionSearch"
                                placeholder="Cari jabatan..."
                                class="w-full rounded-lg border border-slate-200 bg-slate-50/70 py-2 pl-9 pr-3 text-xs text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-primary/40 focus:ring-2 focus:ring-primary/10 dark:border-white/10 dark:bg-white/[0.025] dark:text-slate-200">

                        </div>

                    </div>


                    {{-- TABLE --}}

                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[820px]">

                            <thead>

                                <tr
                                    class="border-b border-slate-200/80 bg-slate-50/50 dark:border-white/10 dark:bg-white/[0.015]">

                                    <th
                                        class="px-5 py-3 text-left text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">
                                        #
                                    </th>

                                    <th
                                        class="px-5 py-3 text-left text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">
                                        Jabatan
                                    </th>

                                    <th
                                        class="px-5 py-3 text-left text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">
                                        Division
                                    </th>

                                    <th
                                        class="px-5 py-3 text-left text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">
                                        Role Default
                                    </th>

                                    <th
                                        class="px-5 py-3 text-left text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">
                                        Status
                                    </th>

                                    <th
                                        class="px-5 py-3 text-right text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody
                                id="positionTable"
                                class="divide-y divide-slate-200/60 dark:divide-white/5">

                                @forelse ($positions as $index => $position)

                                <tr
                                    data-position-row
                                    class="group transition hover:bg-slate-50/60 dark:hover:bg-white/[0.025]">

                                    {{-- NUMBER --}}

                                    <td
                                        class="px-5 py-3 text-[11px] text-slate-400">

                                        {{ $index + 1 }}

                                    </td>


                                    {{-- POSITION --}}

                                    <td class="px-5 py-3">

                                        <div class="flex items-center gap-2.5">

                                            <div
                                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary">

                                                <i
                                                    data-lucide="briefcase"
                                                    class="h-4 w-4">
                                                </i>

                                            </div>


                                            <div class="min-w-0">

                                                <p
                                                    class="position-name max-w-[240px] truncate text-xs font-semibold text-slate-800 dark:text-slate-200">

                                                    {{ $position->name }}

                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- DIVISION --}}

                                    <td
                                        class="px-5 py-3 text-[11px] text-slate-600 dark:text-slate-400">

                                        {{ $position->division }}

                                    </td>


                                    {{-- ROLE --}}

                                    <td class="px-5 py-3">

                                        @if ($position->role)

                                        <span
                                            class="inline-flex items-center rounded-full bg-primary/10 px-2 py-1 text-[10px] font-semibold text-primary">

                                            {{ $position->role->name }}

                                        </span>

                                        @else

                                        <span
                                            class="text-[10px] text-slate-400">

                                            Belum ditentukan

                                        </span>

                                        @endif

                                    </td>


                                    {{-- STATUS --}}

                                    <td class="px-5 py-3">

                                        @if ($position->is_active)

                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-emerald-500/10 px-2 py-0.5 text-[9px] font-semibold text-emerald-600 ring-1 ring-inset ring-emerald-500/20 dark:text-emerald-400">

                                            <span
                                                class="h-1.5 w-1.5 rounded-full bg-emerald-500">
                                            </span>

                                            Aktif

                                        </span>

                                        @else

                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-slate-500/10 px-2 py-0.5 text-[9px] font-semibold text-slate-500 ring-1 ring-inset ring-slate-500/20 dark:text-slate-400">

                                            <span
                                                class="h-1.5 w-1.5 rounded-full bg-slate-400">
                                            </span>

                                            Nonaktif

                                        </span>

                                        @endif

                                    </td>


                                    {{-- ACTION --}}

                                    <td class="px-5 py-3">

                                        <div class="flex justify-end gap-1.5">

                                            {{-- EDIT --}}

                                            <button
                                                type="button"
                                                title="Edit"
                                                onclick="editPosition(
                                                        {{ $position->id }},
                                                        @js($position->name),
                                                        @js($position->division),
                                                        {{ $position->role_id ?? 'null' }}
                                                    )"
                                                class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 transition hover:bg-primary/10 hover:text-primary">

                                                <i
                                                    data-lucide="pencil"
                                                    class="h-3.5 w-3.5">
                                                </i>

                                            </button>


                                            {{-- TOGGLE --}}

                                            <form
                                                method="POST"
                                                action="{{ route('circle.positions.toggle', $position) }}">

                                                @csrf

                                                @method('PATCH')

                                                <button
                                                    type="submit"
                                                    title="{{ $position->is_active ? 'Nonaktifkan' : 'Aktifkan' }}"
                                                    class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 transition hover:bg-amber-500/10 hover:text-amber-500">

                                                    <i
                                                        data-lucide="power"
                                                        class="h-3.5 w-3.5">
                                                    </i>

                                                </button>

                                            </form>

                                        </div>

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
                                                data-lucide="briefcase-business"
                                                class="h-5 w-5">
                                            </i>

                                        </div>


                                        <p
                                            class="mt-3 text-xs font-semibold text-slate-700 dark:text-slate-300">

                                            Belum ada jabatan

                                        </p>


                                        <p
                                            class="mt-1 text-[10px] text-slate-400">

                                            Tambahkan jabatan untuk mulai mengelola master jabatan.

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


        {{-- =========================================================
             FOOTER
        ========================================================== --}}

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

                    Operational

                </div>


                <span>
                    One Platform, One Data, One Workflow
                </span>

            </div>

        </footer>

    </div>


    {{-- =========================================================
         ADD / EDIT MODAL
    ========================================================== --}}

    <div
        id="positionModal"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/40 px-4 backdrop-blur-sm">

        <div
            class="w-full max-w-md overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-xl dark:border-white/10 dark:bg-slate-900">

            {{-- HEADER --}}

            <div
                class="flex items-center justify-between border-b border-slate-200/80 px-5 py-4 dark:border-white/10">

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-9 w-9 items-center justify-center rounded-lg bg-primary/10 text-primary">

                        <i
                            data-lucide="briefcase-business"
                            class="h-4 w-4">
                        </i>

                    </div>


                    <div>

                        <h3
                            id="positionModalTitle"
                            class="text-sm font-bold text-slate-900 dark:text-white">

                            Tambah Jabatan

                        </h3>


                        <p
                            id="positionModalDescription"
                            class="mt-0.5 text-[10px] text-slate-400">

                            Tambahkan jabatan baru ke Circle Suites.

                        </p>

                    </div>

                </div>


                <button
                    type="button"
                    onclick="closePositionModal()"
                    class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-600 dark:hover:bg-white/5 dark:hover:text-slate-200">

                    <i
                        data-lucide="x"
                        class="h-4 w-4">
                    </i>

                </button>

            </div>


            {{-- FORM --}}

            <form
                id="positionForm"
                method="POST"
                action="{{ route('circle.positions.store') }}"
                data-store-url="{{ route('circle.positions.store') }}"
                data-update-url="{{ route('circle.positions.update', ['position' => '__POSITION__']) }}"
                class="p-5">

                @csrf


                {{-- POSITION ID --}}

                <input
                    type="hidden"
                    id="positionId"
                    name="position_id"
                    value="{{ old('position_id', '') }}">


                {{-- METHOD --}}

                <input
                    type="hidden"
                    id="positionMethod"
                    name="_method"
                    value="{{ old('_method', '') }}">


                {{-- NAME --}}

                <div>

                    <label
                        for="positionName"
                        class="mb-1.5 block text-[10px] font-bold uppercase tracking-wider text-slate-400">

                        Nama Jabatan

                    </label>


                    <input
                        type="text"
                        id="positionName"
                        name="name"
                        required
                        placeholder="Contoh: Installer"
                        value="{{ old('name') }}"
                        class="w-full rounded-lg border border-slate-200 bg-slate-50/70 px-3 py-2.5 text-xs text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-primary/40 focus:ring-2 focus:ring-primary/10 dark:border-white/10 dark:bg-white/[0.025] dark:text-slate-200">

                </div>


                {{-- DIVISION --}}

                <div class="mt-4">

                    <label
                        for="positionDivision"
                        class="mb-1.5 block text-[10px] font-bold uppercase tracking-wider text-slate-400">

                        Division

                    </label>


                    <select
                        id="positionDivision"
                        name="division"
                        required
                        class="w-full rounded-lg border border-slate-200 bg-slate-50/70 px-3 py-2.5 text-xs text-slate-700 outline-none transition focus:border-primary/40 focus:ring-2 focus:ring-primary/10 dark:border-white/10 dark:bg-white/[0.025] dark:text-slate-200">

                        <option value="">
                            Pilih Division
                        </option>

                        <option
                            value="Installer / Technician"
                            @selected(old('division')==='Installer / Technician' )>
                            Installer / Technician
                        </option>

                        <option
                            value="Warehouse & Inventory"
                            @selected(old('division')==='Warehouse & Inventory' )>
                            Warehouse & Inventory
                        </option>

                        <option
                            value="Sales & Marketing"
                            @selected(old('division')==='Sales & Marketing' )>
                            Sales & Marketing
                        </option>

                    </select>

                </div>


                {{-- ROLE --}}

                <div class="mt-4">

                    <label
                        for="positionRole"
                        class="mb-1.5 block text-[10px] font-bold uppercase tracking-wider text-slate-400">

                        Role Default

                    </label>


                    <select
                        id="positionRole"
                        name="role_id"
                        required
                        class="w-full rounded-lg border border-slate-200 bg-slate-50/70 px-3 py-2.5 text-xs text-slate-700 outline-none transition focus:border-primary/40 focus:ring-2 focus:ring-primary/10 dark:border-white/10 dark:bg-white/[0.025] dark:text-slate-200">

                        <option value="">
                            Pilih Role
                        </option>

                        @foreach ($roles as $role)

                        <option
                            value="{{ $role->id }}"
                            data-division="{{ $role->division }}"
                            @selected((string) old('role_id')===(string) $role->id)>

                            {{ $role->name }}

                        </option>

                        @endforeach

                    </select>

                </div>


                {{-- ACTIONS --}}

                <div
                    class="mt-6 flex items-center justify-between gap-3 border-t border-slate-200/80 pt-5 dark:border-white/10">

                    {{-- DELETE ONLY EDIT MODE --}}

                    <button
                        type="button"
                        id="deletePositionButton"
                        onclick="deletePosition()"
                        class="hidden items-center gap-2 rounded-lg border border-red-200 bg-red-50 px-3.5 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100 dark:border-red-900/50 dark:bg-red-950/30 dark:text-red-400 dark:hover:bg-red-950/50">

                        <i
                            data-lucide="trash-2"
                            class="h-3.5 w-3.5">
                        </i>

                        Hapus Jabatan

                    </button>


                    <div class="ml-auto flex items-center gap-2">

                        <button
                            type="button"
                            onclick="closePositionModal()"
                            class="rounded-lg border border-slate-200 bg-white px-3.5 py-2 text-xs font-semibold text-slate-600 transition hover:bg-slate-50 dark:border-white/10 dark:bg-white/[0.025] dark:text-slate-300 dark:hover:bg-white/[0.05]">

                            Batal

                        </button>


                        <button
                            type="submit"
                            class="inline-flex items-center gap-2 rounded-lg bg-gradient-to-r from-primary to-blue-600 px-3.5 py-2 text-xs font-semibold text-white shadow-sm shadow-primary/20 transition hover:-translate-y-0.5 hover:shadow-md">

                            <i
                                data-lucide="save"
                                class="h-3.5 w-3.5">
                            </i>

                            <span id="positionSubmitText">
                                Simpan Jabatan
                            </span>

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- =========================================================
         DELETE CONFIRMATION MODAL
    ========================================================== --}}

    <div
        id="deletePositionModal"
        class="fixed inset-0 z-[60] hidden items-center justify-center bg-slate-950/50 px-4 backdrop-blur-sm">

        <div
            class="w-full max-w-sm overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-2xl shadow-slate-950/10 dark:border-white/10 dark:bg-slate-900">

            {{-- HEADER --}}

            <div class="px-5 pt-5">

                <div class="flex items-start gap-3">

                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-500/10 text-red-500">

                        <i
                            data-lucide="trash-2"
                            class="h-5 w-5">
                        </i>

                    </div>


                    <div class="min-w-0">

                        <h3
                            class="text-sm font-bold text-slate-900 dark:text-white">

                            Hapus Jabatan?

                        </h3>


                        <p
                            class="mt-1 text-xs leading-5 text-slate-500 dark:text-slate-400">

                            Anda akan menghapus jabatan

                            <span
                                id="deletePositionName"
                                class="font-semibold text-slate-700 dark:text-slate-200">
                            </span>.

                        </p>

                    </div>

                </div>

            </div>


            {{-- WARNING --}}

            <div
                class="mx-5 mt-4 rounded-xl border border-amber-500/20 bg-amber-500/5 px-3.5 py-3">

                <div class="flex items-start gap-2.5">

                    <i
                        data-lucide="triangle-alert"
                        class="mt-0.5 h-3.5 w-3.5 shrink-0 text-amber-500">
                    </i>


                    <p
                        class="text-[10px] leading-4 text-amber-700 dark:text-amber-400">

                        Jabatan yang masih digunakan oleh user
                        tidak dapat dihapus.

                    </p>

                </div>

            </div>


            {{-- ACTIONS --}}

            <div
                class="mt-5 flex items-center justify-end gap-2 border-t border-slate-200/80 px-5 py-4 dark:border-white/10">

                <button
                    type="button"
                    onclick="closeDeletePositionModal()"
                    class="rounded-lg border border-slate-200 bg-white px-3.5 py-2 text-xs font-semibold text-slate-600 transition hover:bg-slate-50 dark:border-white/10 dark:bg-white/[0.025] dark:text-slate-300 dark:hover:bg-white/[0.05]">

                    Batal

                </button>


                <button
                    type="button"
                    onclick="confirmDeletePosition()"
                    class="inline-flex items-center gap-2 rounded-lg bg-red-500 px-3.5 py-2 text-xs font-semibold text-white shadow-sm shadow-red-500/20 transition hover:-translate-y-0.5 hover:bg-red-600 hover:shadow-md">

                    <i
                        data-lucide="trash-2"
                        class="h-3.5 w-3.5">
                    </i>

                    Ya, Hapus

                </button>

            </div>

        </div>

    </div>


    {{-- =========================================================
         DELETE FORM
    ========================================================== --}}

    <form
        id="deletePositionForm"
        method="POST"
        action=""
        data-base-url="{{ url('/circle/positions') }}"
        class="hidden">

        @csrf

        @method('DELETE')

    </form>


    {{-- =========================================================
         TOAST CONTAINER
    ========================================================== --}}

    <div
        id="positionToastContainer"
        class="pointer-events-none fixed right-4 top-4 z-[100] flex w-[calc(100%-2rem)] max-w-sm flex-col gap-3 sm:right-6 sm:top-6">
    </div>


    {{-- =========================================================
         SCRIPT
    ========================================================== --}}

    <script>
        /*
        |--------------------------------------------------------------------------
        | LUCIDE
        |--------------------------------------------------------------------------
        */

        function refreshLucide() {

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
        | OPEN POSITION MODAL
        |--------------------------------------------------------------------------
        */

        function openPositionModal(data = null) {

            const modal =
                document.getElementById('positionModal');

            const form =
                document.getElementById('positionForm');

            const title =
                document.getElementById('positionModalTitle');

            const description =
                document.getElementById('positionModalDescription');

            const method =
                document.getElementById('positionMethod');

            const positionId =
                document.getElementById('positionId');

            const positionName =
                document.getElementById('positionName');

            const positionDivision =
                document.getElementById('positionDivision');

            const positionRole =
                document.getElementById('positionRole');

            const deleteButton =
                document.getElementById('deletePositionButton');

            const submitText =
                document.getElementById('positionSubmitText');


            if (
                !modal ||
                !form ||
                !title ||
                !description ||
                !method ||
                !positionId ||
                !positionName ||
                !positionDivision ||
                !positionRole ||
                !deleteButton ||
                !submitText
            ) {
                return;
            }


            /*
            |--------------------------------------------------------------------------
            | ADD MODE
            |--------------------------------------------------------------------------
            */

            if (!data) {

                form.reset();

                form.action =
                    form.dataset.storeUrl;

                title.textContent =
                    'Tambah Jabatan';

                description.textContent =
                    'Tambahkan jabatan baru ke Circle Suites.';

                positionId.value =
                    '';

                method.value =
                    '';

                positionName.value =
                    '';

                positionDivision.value =
                    '';

                positionRole.value =
                    '';

                deleteButton.classList.add(
                    'hidden'
                );

                deleteButton.classList.remove(
                    'inline-flex'
                );

                submitText.textContent =
                    'Simpan Jabatan';

                filterPositionRoles();

            }


            /*
            |--------------------------------------------------------------------------
            | EDIT MODE
            |--------------------------------------------------------------------------
            */
            else {

                title.textContent =
                    'Edit Jabatan';

                description.textContent =
                    'Perbarui informasi jabatan Circle Suites.';

                positionId.value =
                    data.id;

                positionName.value =
                    data.name;

                positionDivision.value =
                    data.division;

                method.value =
                    'PUT';

                form.action =
                    form.dataset.updateUrl.replace(
                        '__POSITION__',
                        data.id
                    );

                filterPositionRoles();

                positionRole.value =
                    data.roleId ?? '';

                deleteButton.classList.remove(
                    'hidden'
                );

                deleteButton.classList.add(
                    'inline-flex'
                );

                submitText.textContent =
                    'Simpan Perubahan';

            }


            modal.classList.remove(
                'hidden'
            );

            modal.classList.add(
                'flex'
            );


            refreshLucide();

        }


        /*
        |--------------------------------------------------------------------------
        | CLOSE POSITION MODAL
        |--------------------------------------------------------------------------
        */

        function closePositionModal() {

            const modal =
                document.getElementById(
                    'positionModal'
                );


            if (!modal) {
                return;
            }


            modal.classList.add(
                'hidden'
            );

            modal.classList.remove(
                'flex'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | EDIT POSITION
        |--------------------------------------------------------------------------
        */

        function editPosition(
            id,
            name,
            division,
            roleId
        ) {

            openPositionModal({

                id: id,

                name: name,

                division: division,

                roleId: roleId

            });

        }


        /*
        |--------------------------------------------------------------------------
        | FILTER ROLE
        |--------------------------------------------------------------------------
        */

        function filterPositionRoles() {

            const divisionSelect =
                document.getElementById(
                    'positionDivision'
                );

            const roleSelect =
                document.getElementById(
                    'positionRole'
                );


            if (
                !divisionSelect ||
                !roleSelect
            ) {
                return;
            }


            const division =
                divisionSelect.value;


            Array.from(
                roleSelect.options
            ).forEach(function(option) {

                if (!option.value) {

                    option.hidden =
                        false;

                    return;

                }


                option.hidden =
                    option.dataset.division !== division;

            });


            const selected =
                roleSelect.options[
                    roleSelect.selectedIndex
                ];


            if (
                selected &&
                selected.value &&
                selected.hidden
            ) {

                roleSelect.value =
                    '';

            }

        }


        /*
        |--------------------------------------------------------------------------
        | OPEN DELETE CONFIRMATION
        |--------------------------------------------------------------------------
        */

        function deletePosition() {

            const positionId =
                document.getElementById(
                    'positionId'
                )?.value;


            const positionName =
                document.getElementById(
                    'positionName'
                )?.value;


            const deleteModal =
                document.getElementById(
                    'deletePositionModal'
                );


            const deleteName =
                document.getElementById(
                    'deletePositionName'
                );


            if (
                !positionId ||
                !deleteModal
            ) {
                return;
            }


            if (deleteName) {

                deleteName.textContent =
                    '"' +
                    (positionName || 'jabatan ini') +
                    '"';

            }


            deleteModal.classList.remove(
                'hidden'
            );

            deleteModal.classList.add(
                'flex'
            );


            refreshLucide();

        }


        /*
        |--------------------------------------------------------------------------
        | CLOSE DELETE MODAL
        |--------------------------------------------------------------------------
        */

        function closeDeletePositionModal() {

            const deleteModal =
                document.getElementById(
                    'deletePositionModal'
                );


            if (!deleteModal) {
                return;
            }


            deleteModal.classList.add(
                'hidden'
            );

            deleteModal.classList.remove(
                'flex'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | CONFIRM DELETE
        |--------------------------------------------------------------------------
        */

        function confirmDeletePosition() {

            const positionId =
                document.getElementById(
                    'positionId'
                )?.value;


            const deleteForm =
                document.getElementById(
                    'deletePositionForm'
                );


            if (
                !positionId ||
                !deleteForm
            ) {
                return;
            }


            deleteForm.action =
                deleteForm.dataset.baseUrl +
                '/' +
                positionId;


            deleteForm.submit();

        }


        /*
        |--------------------------------------------------------------------------
        | TOAST
        |--------------------------------------------------------------------------
        */

        function showPositionToast(
            type,
            message
        ) {

            const container =
                document.getElementById(
                    'positionToastContainer'
                );


            if (!container) {
                return;
            }


            const isSuccess =
                type === 'success';


            const toast =
                document.createElement('div');


            toast.className =
                'pointer-events-auto flex items-start gap-3 rounded-xl border px-4 py-3 shadow-xl backdrop-blur-xl transition-all duration-300 ' +
                (
                    isSuccess ?
                    'border-emerald-500/20 bg-white/95 text-emerald-700 dark:bg-slate-900/95 dark:text-emerald-400' :
                    'border-red-500/20 bg-white/95 text-red-700 dark:bg-slate-900/95 dark:text-red-400'
                );


            const icon =
                isSuccess ?
                'circle-check' :
                'circle-alert';


            toast.innerHTML =

                '<div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg ' +
                (
                    isSuccess ?
                    'bg-emerald-500/10 text-emerald-500' :
                    'bg-red-500/10 text-red-500'
                ) +
                '">' +

                '<i data-lucide="' +
                icon +
                '" class="h-4 w-4"></i>' +

                '</div>' +

                '<div class="min-w-0 flex-1 pt-0.5">' +

                '<p class="text-xs font-semibold">' +
                (
                    isSuccess ?
                    'Berhasil' :
                    'Terjadi Kesalahan'
                ) +
                '</p>' +

                '<p class="mt-0.5 text-[11px] leading-4 text-slate-500 dark:text-slate-400">' +
                message +
                '</p>' +

                '</div>' +

                '<button type="button" class="toast-close flex h-7 w-7 shrink-0 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-600 dark:hover:bg-white/5">' +

                '<i data-lucide="x" class="h-3.5 w-3.5"></i>' +

                '</button>';


            container.appendChild(
                toast
            );


            refreshLucide();


            const closeButton =
                toast.querySelector(
                    '.toast-close'
                );


            const removeToast =
                function() {

                    toast.classList.add(
                        'translate-x-4',
                        'opacity-0'
                    );

                    setTimeout(
                        function() {

                            toast.remove();

                        },
                        300
                    );

                };


            closeButton?.addEventListener(
                'click',
                removeToast
            );


            setTimeout(
                removeToast,
                4500
            );

        }


        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'DOMContentLoaded',
            function() {

                const searchInput =
                    document.getElementById(
                        'positionSearch'
                    );


                if (searchInput) {

                    searchInput.addEventListener(
                        'input',
                        function() {

                            const keyword =
                                this.value
                                .toLowerCase()
                                .trim();


                            document
                                .querySelectorAll(
                                    '[data-position-row]'
                                )
                                .forEach(
                                    function(row) {

                                        const name =
                                            row
                                            .querySelector(
                                                '.position-name'
                                            )
                                            ?.textContent
                                            .toLowerCase() ||
                                            '';


                                        row.classList.toggle(
                                            'hidden',
                                            keyword !== '' &&
                                            !name.includes(
                                                keyword
                                            )
                                        );

                                    }
                                );

                        }
                    );

                }


                /*
                |--------------------------------------------------------------------------
                | DIVISION CHANGE
                |--------------------------------------------------------------------------
                */

                const divisionSelect =
                    document.getElementById(
                        'positionDivision'
                    );


                if (divisionSelect) {

                    divisionSelect.addEventListener(
                        'change',
                        filterPositionRoles
                    );

                }


                /*
                |--------------------------------------------------------------------------
                | INITIAL
                |--------------------------------------------------------------------------
                */

                filterPositionRoles();

                refreshLucide();

            }
        );


        /*
        |--------------------------------------------------------------------------
        | ESCAPE
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'keydown',
            function(event) {

                if (
                    event.key !== 'Escape'
                ) {
                    return;
                }


                const deleteModal =
                    document.getElementById(
                        'deletePositionModal'
                    );


                if (
                    deleteModal &&
                    !deleteModal.classList.contains('hidden')
                ) {

                    closeDeletePositionModal();

                    return;

                }


                closePositionModal();

            }
        );


        /*
        |--------------------------------------------------------------------------
        | CLICK OUTSIDE POSITION MODAL
        |--------------------------------------------------------------------------
        */

        document
            .getElementById('positionModal')
            ?.addEventListener(
                'click',
                function(event) {

                    if (
                        event.target === this
                    ) {

                        closePositionModal();

                    }

                }
            );


        /*
        |--------------------------------------------------------------------------
        | CLICK OUTSIDE DELETE MODAL
        |--------------------------------------------------------------------------
        */

        document
            .getElementById('deletePositionModal')
            ?.addEventListener(
                'click',
                function(event) {

                    if (
                        event.target === this
                    ) {

                        closeDeletePositionModal();

                    }

                }
            );


        /*
        |--------------------------------------------------------------------------
        | VALIDATION ERROR
        |--------------------------------------------------------------------------
        */

        @if($errors->hasAny(['name', 'division', 'role_id']))

        document.addEventListener(
            'DOMContentLoaded',
            function() {

                const oldPositionId =
                    @json(old('position_id'));

                const oldName =
                    @json(old('name', ''));

                const oldDivision =
                    @json(old('division', ''));

                const oldRoleId =
                    @json(old('role_id', ''));


                if (oldPositionId) {

                    openPositionModal({

                        id: oldPositionId,

                        name: oldName,

                        division: oldDivision,

                        roleId: oldRoleId

                    });

                } else {

                    openPositionModal();

                }

            }
        );

        @endif


        /*
        |--------------------------------------------------------------------------
        | SESSION TOAST
        |--------------------------------------------------------------------------
        */

        @if(session('status'))

        document.addEventListener(
            'DOMContentLoaded',
            function() {

                showPositionToast(
                    'success',
                    @json(session('status'))
                );

            }
        );

        @endif


        /*
        |--------------------------------------------------------------------------
        | SESSION ERROR TOAST
        |--------------------------------------------------------------------------
        */

        @if(session('error'))

        document.addEventListener(
            'DOMContentLoaded',
            function() {

                showPositionToast(
                    'error',
                    @json(session('error'))
                );

            }
        );

        @endif
    </script>

</x-layouts.circle.admin>