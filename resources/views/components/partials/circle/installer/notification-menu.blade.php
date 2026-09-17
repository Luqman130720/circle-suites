<div>

    {{-- Header --}}
    <div
        class="flex items-center justify-between border-b border-slate-100 px-5 py-4 dark:border-slate-800">

        <div>

            <h3
                class="text-sm font-bold text-slate-900 dark:text-white">

                {{ __('common.notifications') }}

            </h3>


            <p
                class="mt-0.5 text-[11px] text-slate-400">

                {{ __('common.system_activity_alerts') }}

            </p>

        </div>

    </div>


    {{-- Empty State --}}
    <div class="px-5 py-10 text-center">

        <div
            class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-500 dark:bg-emerald-500/10">

            <i
                data-lucide="check-check"
                class="h-5 w-5">
            </i>

        </div>


        <p
            class="mt-3 text-sm font-semibold text-slate-800 dark:text-white">

            {{ __('common.all_caught_up') }}

        </p>


        <p
            class="mt-1 text-[11px] text-slate-400">

            {{ __('common.no_pending_notifications') }}

        </p>

    </div>

</div>