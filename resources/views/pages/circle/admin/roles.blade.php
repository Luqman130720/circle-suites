<x-layouts.circle.admin>

    <x-slot name="title">
        Master Jabatan
    </x-slot>

    <x-slot name="pageTitle">
        Master Jabatan
    </x-slot>


    {{-- =========================================================
         PAGE ROOT
    ========================================================== --}}

    <div class="flex min-h-[calc(100vh-4rem)] flex-col bg-slate-50 dark:bg-slate-950">

        <main class="relative flex-1 overflow-hidden">

            {{-- =====================================================
                 AMBIENT BACKGROUND
            ====================================================== --}}

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


            {{-- =====================================================
                 CONTENT
            ====================================================== --}}

            <div class="relative mx-auto w-full max-w-[1600px] px-4 py-5 sm:px-6 lg:px-8">


                {{-- =================================================
                     PAGE HEADER
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


                    <div
                        class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">


                        {{-- Header information --}}

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


                        {{-- Add button --}}

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


                {{-- =================================================
                     POSITION TABLE
                ================================================== --}}

                <section
                    class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white/85 shadow-sm backdrop-blur-xl dark:border-white/10 dark:bg-white/[0.045]">


                    {{-- =================================================
                         TABLE HEADER
                    ================================================== --}}

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


                        {{-- Search --}}

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


                    {{-- =================================================
                         TABLE
                    ================================================== --}}

                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[760px]">

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


                                {{-- =================================================
                                     SAMPLE DATA
                                     NANTI DIGANTI DATA DATABASE
                                ================================================== --}}

                                @php

                                $positions = [
                                [
                                'name' => 'SPV Operasional',
                                'division' => 'Installer / Technician',
                                'role' => 'SPV Operation',
                                'status' => 'active',
                                ],
                                [
                                'name' => 'Installer',
                                'division' => 'Installer / Technician',
                                'role' => 'Installer',
                                'status' => 'active',
                                ],
                                [
                                'name' => 'Junior Installer',
                                'division' => 'Installer / Technician',
                                'role' => 'Junior Installer',
                                'status' => 'active',
                                ],
                                [
                                'name' => 'Admin Warehouse',
                                'division' => 'Warehouse & Inventory',
                                'role' => 'Warehouse Admin',
                                'status' => 'active',
                                ],
                                ];

                                @endphp


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

                                                    {{ $position['name'] }}

                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- DIVISION --}}

                                    <td
                                        class="px-5 py-3 text-[11px] text-slate-600 dark:text-slate-400">

                                        {{ $position['division'] }}

                                    </td>


                                    {{-- ROLE --}}

                                    <td
                                        class="px-5 py-3">

                                        <span
                                            class="inline-flex items-center rounded-full bg-primary/10 px-2 py-1 text-[10px] font-semibold text-primary">

                                            {{ $position['role'] }}

                                        </span>

                                    </td>


                                    {{-- STATUS --}}

                                    <td class="px-5 py-3">

                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-emerald-500/10 px-2 py-0.5 text-[9px] font-semibold text-emerald-600 ring-1 ring-inset ring-emerald-500/20 dark:text-emerald-400">

                                            <span
                                                class="h-1.5 w-1.5 rounded-full bg-emerald-500">
                                            </span>

                                            Aktif

                                        </span>

                                    </td>


                                    {{-- ACTION --}}

                                    <td class="px-5 py-3">

                                        <div class="flex justify-end gap-1.5">

                                            <button
                                                type="button"
                                                title="Edit"
                                                onclick="editPosition('{{ $position['name'] }}')"
                                                class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 transition hover:bg-primary/10 hover:text-primary">

                                                <i
                                                    data-lucide="pencil"
                                                    class="h-3.5 w-3.5">
                                                </i>

                                            </button>


                                            <button
                                                type="button"
                                                title="Nonaktifkan"
                                                class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 transition hover:bg-amber-500/10 hover:text-amber-500">

                                                <i
                                                    data-lucide="power"
                                                    class="h-3.5 w-3.5">
                                                </i>

                                            </button>

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
         ADD / EDIT POSITION MODAL
    ========================================================== --}}

    <div
        id="positionModal"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/40 px-4 backdrop-blur-sm">

        <div
            class="w-full max-w-md overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-xl dark:border-white/10 dark:bg-slate-900">


            {{-- Modal Header --}}

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


            {{-- Modal Body --}}

            <form
                id="positionForm"
                class="p-5"
                onsubmit="savePosition(event)">


                {{-- Position name --}}

                <div>

                    <label
                        for="positionName"
                        class="mb-1.5 block text-[10px] font-bold uppercase tracking-wider text-slate-400">

                        Nama Jabatan

                    </label>

                    <input
                        type="text"
                        id="positionName"
                        required
                        placeholder="Contoh: Installer"
                        class="w-full rounded-lg border border-slate-200 bg-slate-50/70 px-3 py-2.5 text-xs text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-primary/40 focus:ring-2 focus:ring-primary/10 dark:border-white/10 dark:bg-white/[0.025] dark:text-slate-200">

                </div>


                {{-- Division --}}

                <div class="mt-4">

                    <label
                        for="positionDivision"
                        class="mb-1.5 block text-[10px] font-bold uppercase tracking-wider text-slate-400">

                        Division

                    </label>

                    <select
                        id="positionDivision"
                        required
                        class="w-full rounded-lg border border-slate-200 bg-slate-50/70 px-3 py-2.5 text-xs text-slate-700 outline-none transition focus:border-primary/40 focus:ring-2 focus:ring-primary/10 dark:border-white/10 dark:bg-white/[0.025] dark:text-slate-200">

                        <option value="">
                            Pilih Division
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

                </div>


                {{-- Default Role --}}

                <div class="mt-4">

                    <label
                        for="positionRole"
                        class="mb-1.5 block text-[10px] font-bold uppercase tracking-wider text-slate-400">

                        Role Default

                    </label>

                    <select
                        id="positionRole"
                        required
                        class="w-full rounded-lg border border-slate-200 bg-slate-50/70 px-3 py-2.5 text-xs text-slate-700 outline-none transition focus:border-primary/40 focus:ring-2 focus:ring-primary/10 dark:border-white/10 dark:bg-white/[0.025] dark:text-slate-200">

                        <option value="">
                            Pilih Role
                        </option>

                        <option value="admin">
                            Administrator
                        </option>

                        <option value="spv_operation">
                            SPV Operation
                        </option>

                        <option value="installer">
                            Installer
                        </option>

                        <option value="junior_installer">
                            Junior Installer
                        </option>

                        <option value="warehouse_admin">
                            Warehouse Admin
                        </option>

                        <option value="staff">
                            Staff
                        </option>

                        <option value="marketing">
                            Marketing
                        </option>

                    </select>

                </div>


                {{-- Modal Actions --}}

                <div
                    class="mt-6 flex justify-end gap-2">

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

                        Simpan Jabatan

                    </button>

                </div>

            </form>

        </div>

    </div>


    {{-- =========================================================
         PAGE SCRIPT
    ========================================================== --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            /*
            |--------------------------------------------------------------------------
            | LUCIDE
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
            | SEARCH
            |--------------------------------------------------------------------------
            */

            const searchInput = document.getElementById('positionSearch');

            if (searchInput) {

                searchInput.addEventListener('input', function() {

                    const keyword = this.value
                        .toLowerCase()
                        .trim();

                    document
                        .querySelectorAll('[data-position-row]')
                        .forEach(function(row) {

                            const name = row
                                .querySelector('.position-name')
                                ?.textContent
                                .toLowerCase() || '';

                            row.classList.toggle(
                                'hidden',
                                keyword !== '' && !name.includes(keyword)
                            );

                        });

                });

            }


            initializeLucide();

        });


        /*
        |--------------------------------------------------------------------------
        | OPEN MODAL
        |--------------------------------------------------------------------------
        */

        function openPositionModal() {

            const modal = document.getElementById('positionModal');
            const form = document.getElementById('positionForm');
            const title = document.getElementById('positionModalTitle');

            form?.reset();

            if (title) {
                title.textContent = 'Tambah Jabatan';
            }

            if (modal) {

                modal.classList.remove('hidden');
                modal.classList.add('flex');

            }

            if (
                typeof lucide !== 'undefined' &&
                typeof lucide.createIcons === 'function'
            ) {
                lucide.createIcons();
            }

        }


        /*
        |--------------------------------------------------------------------------
        | CLOSE MODAL
        |--------------------------------------------------------------------------
        */

        function closePositionModal() {

            const modal = document.getElementById('positionModal');

            if (modal) {

                modal.classList.add('hidden');
                modal.classList.remove('flex');

            }

        }


        /*
        |--------------------------------------------------------------------------
        | EDIT
        |--------------------------------------------------------------------------
        */

        function editPosition(positionName) {

            const modal = document.getElementById('positionModal');
            const title = document.getElementById('positionModalTitle');
            const input = document.getElementById('positionName');

            if (title) {
                title.textContent = 'Edit Jabatan';
            }

            if (input) {
                input.value = positionName;
            }

            if (modal) {

                modal.classList.remove('hidden');
                modal.classList.add('flex');

            }

            if (
                typeof lucide !== 'undefined' &&
                typeof lucide.createIcons === 'function'
            ) {
                lucide.createIcons();
            }

        }


        /*
        |--------------------------------------------------------------------------
        | SAVE
        |--------------------------------------------------------------------------
        */

        function savePosition(event) {

            event.preventDefault();

            /*
             * Sementara hanya demonstrasi UI.
             * Nanti form ini akan diarahkan ke Laravel Controller.
             */

            closePositionModal();

        }
    </script>

</x-layouts.circle.admin>