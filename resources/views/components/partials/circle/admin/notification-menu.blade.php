@php
$pendingUsers = \App\Models\User::where('status', 'pending')
->latest()
->take(5)
->get();

$pendingCount = \App\Models\User::where('status', 'pending')->count();
@endphp

<div>

    {{-- Header --}}
    <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4 dark:border-slate-800">

        <div>

            <h3 class="text-sm font-bold text-slate-900 dark:text-white">
                {{ __('common.notifications') }}
            </h3>

            <p class="mt-0.5 text-[11px] text-slate-400">
                {{ __('common.system_activity_alerts') }}
            </p>

        </div>

        @if($pendingCount > 0)

        <span class="rounded-full bg-red-50 px-2 py-1 text-[10px] font-bold text-red-600 dark:bg-red-500/10 dark:text-red-400">
            {{ $pendingCount }} {{ __('common.pending') }}
        </span>

        @endif

    </div>


    {{-- Content --}}
    <div class="max-h-[360px] overflow-y-auto">

        @if($pendingUsers->count())

        @foreach($pendingUsers as $pendingUser)

        <a
            href="{{ route('circle.user.approval') }}"
            class="flex gap-3 border-b border-slate-100 px-5 py-4 transition hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800/60">

            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-600 dark:bg-amber-500/10 dark:text-amber-400">

                <i data-lucide="user-plus" class="h-4 w-4"></i>

            </div>

            <div class="min-w-0 flex-1">

                <p class="text-xs font-semibold text-slate-800 dark:text-slate-100">
                    {{ __('common.new_user_registration') }}
                </p>

                <p class="mt-1 truncate text-[11px] text-slate-500 dark:text-slate-400">
                    {{ $pendingUser->name }}
                </p>

                <p class="mt-1 text-[10px] text-slate-400">
                    {{ $pendingUser->created_at?->diffForHumans() }}
                </p>

            </div>

            <i
                data-lucide="chevron-right"
                class="mt-1 h-4 w-4 shrink-0 text-slate-300">
            </i>

        </a>

        @endforeach

        @else

        <div class="px-5 py-10 text-center">

            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-500 dark:bg-emerald-500/10">

                <i data-lucide="check-check" class="h-5 w-5"></i>

            </div>

            <p class="mt-3 text-sm font-semibold text-slate-800 dark:text-white">
                {{ __('common.all_caught_up') }}
            </p>

            <p class="mt-1 text-[11px] text-slate-400">
                {{ __('common.no_pending_notifications') }}
            </p>

        </div>

        @endif

    </div>


    {{-- Footer --}}
    @if($pendingCount > 0)

    <div class="border-t border-slate-100 p-3 dark:border-slate-800">

        <a
            href="{{ route('circle.user.approval') }}"
            class="flex items-center justify-center gap-2 rounded-xl bg-slate-50 px-3 py-2.5 text-xs font-semibold text-slate-700 transition hover:bg-primary hover:text-white dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-primary dark:hover:text-white">

            {{ __('common.review_all_pending_users') }}

            <i data-lucide="arrow-up-right" class="h-3.5 w-3.5"></i>

        </a>

    </div>

    @endif

</div>