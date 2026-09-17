@php
$user = auth()->user();
@endphp

<div>

    {{-- Profile Header --}}
    <div class="border-b border-slate-100 p-4 dark:border-slate-800">

        <div class="flex items-center gap-3">

            @if($user?->profile_photo)

            <img
                src="{{ asset('storage/' . $user->profile_photo) }}"
                alt="{{ $user->name }}"
                class="h-11 w-11 rounded-xl object-cover">

            @else

            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-primary text-sm font-bold text-white">

                {{ strtoupper(substr($user?->name ?? 'A', 0, 1)) }}

            </div>

            @endif

            <div class="min-w-0 flex-1">

                <p class="truncate text-sm font-bold text-slate-900 dark:text-white">
                    {{ $user?->name ?? __('common.administrator') }}
                </p>

                <p class="mt-0.5 truncate text-[11px] text-slate-400">
                    {{ $user?->email }}
                </p>

            </div>

        </div>


        <div class="mt-3 flex items-center gap-2">

            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2 py-1 text-[10px] font-semibold text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400">

                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                {{ __('common.active') }}

            </span>

            <span class="rounded-full bg-primary/10 px-2 py-1 text-[10px] font-semibold text-primary">
                {{ ucfirst($user?->role ?? __('common.administrator')) }}
            </span>

        </div>

    </div>


    {{-- Menu --}}
    <div class="p-2">

        {{-- My Profile --}}
        <a
            href="#"
            class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-xs font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">

            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-800">

                <i data-lucide="user" class="h-4 w-4"></i>

            </span>

            <span class="flex-1">
                {{ __('common.my_profile') }}
            </span>

            <i
                data-lucide="chevron-right"
                class="h-3.5 w-3.5 text-slate-300">
            </i>

        </a>


        {{-- Account Settings --}}
        <a
            href="#"
            class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-xs font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">

            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-800">

                <i data-lucide="settings-2" class="h-4 w-4"></i>

            </span>

            <span class="flex-1">
                {{ __('common.account_settings') }}
            </span>

            <i
                data-lucide="chevron-right"
                class="h-3.5 w-3.5 text-slate-300">
            </i>

        </a>


        {{-- Security --}}
        <a
            href="#"
            class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-xs font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">

            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-800">

                <i data-lucide="shield-check" class="h-4 w-4"></i>

            </span>

            <span class="flex-1">
                {{ __('common.security') }}
            </span>

            <i
                data-lucide="chevron-right"
                class="h-3.5 w-3.5 text-slate-300">
            </i>

        </a>

    </div>


    {{-- Logout --}}
    <div class="border-t border-slate-100 p-2 dark:border-slate-800">

        <form action="{{ route('login.logout') }}" method="POST">

            @csrf

            <button
                type="submit"
                class="flex w-full items-center gap-3 rounded-xl px-3 py-2.5 text-xs font-semibold text-red-500 transition hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-500/10">

                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-red-50 dark:bg-red-500/10">

                    <i data-lucide="log-out" class="h-4 w-4"></i>

                </span>

                <span>
                    {{ __('common.sign_out') }}
                </span>

            </button>

        </form>

    </div>

</div>