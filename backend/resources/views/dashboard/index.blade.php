@extends('layouts.app')

@section('content')

<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl md:text-3xl font-bold font-heading">
            Welcome, {{ Auth::user()->name }}
        </h1>
    </div>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8">

    <!-- Total Links -->
    <div class="glass p-6 rounded-2xl group hover:border-accent/40 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="p-2 bg-accent/10 rounded-lg text-accent">
                <i data-lucide="link" class="w-5 h-5"></i>
            </div>
        </div>

        <p class="text-zinc-500 text-sm font-medium">
            Total Links
        </p>

        <h3 id="totalLinks" class="text-2xl font-bold mt-1">
            0
        </h3>
    </div>

    <!-- Total Clicks -->
    <div class="glass p-6 rounded-2xl group hover:border-accent/40 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="p-2 bg-purple-500/10 rounded-lg text-purple-400">
                <i data-lucide="mouse-pointer-click" class="w-5 h-5"></i>
            </div>
        </div>

        <p class="text-zinc-500 text-sm font-medium">
            Total Clicks
        </p>

        <h3 id="totalClicks" class="text-2xl font-bold mt-1">
            0
        </h3>
    </div>

    <!-- Clicks Today -->
    <div class="glass p-6 rounded-2xl group hover:border-accent/40 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="p-2 bg-blue-500/10 rounded-lg text-blue-400">
                <i data-lucide="calendar-days" class="w-5 h-5"></i>
            </div>
        </div>

        <p class="text-zinc-500 text-sm font-medium">
            Clicks Today
        </p>

        <h3 id="clicksToday" class="text-2xl font-bold mt-1">
            0
        </h3>
    </div>

    <!-- Active Links -->
    <div class="glass p-6 rounded-2xl group hover:border-accent/40 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="p-2 bg-emerald-500/10 rounded-lg text-emerald-400">
                <i data-lucide="activity" class="w-5 h-5"></i>
            </div>
        </div>

        <p class="text-zinc-500 text-sm font-medium">
            Active Links
        </p>

        <h3 id="activeLinks" class="text-2xl font-bold mt-1">
            0
        </h3>
    </div>

</div>

<!-- Main Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

    <!-- LEFT -->
    <div class="lg:col-span-8 space-y-8">

        <!-- Quick Shorten -->
        {{-- <div class="glass p-6 rounded-2xl border-accent/20 bg-gradient-to-br from-accent/5 to-transparent">

            <div class="flex items-center gap-2 mb-4">
                <i data-lucide="zap" class="w-4 h-4 text-accent fill-accent/20"></i>
                <h2 class="font-bold">Quick Shorten</h2>
            </div>

            <div class="flex flex-col sm:flex-row gap-4">

                <div class="flex-1">
                    <input
                        id="quickOriginalUrl"
                        type="text"
                        placeholder="https://example.com"
                        class="w-full bg-background border border-border rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-accent/50 transition-all"
                    >
                </div>

                <div class="w-full sm:w-48">
                    <input
                        id="quickAlias"
                        type="text"
                        placeholder="custom-alias"
                        class="w-full bg-background border border-border rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-accent/50 transition-all"
                    >
                </div>

                <button
                    id="quickShortenBtn"
                    class="bg-white text-black px-6 py-3 rounded-xl text-sm font-bold hover:bg-zinc-200 transition-all"
                >
                    Shorten
                </button>

            </div>

        </div> --}}

        <!-- Performance Chart -->
        <div class="glass p-6 rounded-2xl">

            <div class="flex items-center justify-between mb-8">
                <h3 class="font-bold">
                    Click Performance
                </h3>
            </div>

            <div class="h-[300px]">
                <canvas id="performanceChart"></canvas>
            </div>

        </div>

        <!-- Recent Links -->
        <div class="glass rounded-2xl overflow-hidden">

            <div class="p-6 border-b border-border flex items-center justify-between">
                <h3 class="font-bold">
                    Recent Links
                </h3>

                <a
                    href="{{ route('links.index') }}"
                    class="text-xs font-medium text-accent hover:underline"
                >
                    View All
                </a>
            </div>

            <div class="overflow-x-auto">

                <table class="w-full text-left border-collapse">

                    <thead class="bg-white/5">
                        <tr>
                            <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider">
                                Short URL
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider">
                                Original URL
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider text-center">
                                Clicks
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider">
                                Status
                            </th>
                        </tr>
                    </thead>

                    <tbody
                        id="recentLinksTable"
                        class="divide-y divide-border"
                    >
                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <!-- RIGHT -->
    <div class="lg:col-span-4 space-y-8">

        <!-- Device Breakdown -->
        <div class="glass p-6 rounded-2xl">

            <h3 class="font-bold mb-6">
                Device Breakdown
            </h3>

            <div class="h-[220px]">
                <canvas id="deviceChart"></canvas>
            </div>

            <div class="mt-6 space-y-3">

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 text-sm text-zinc-400">
                        <div class="w-2 h-2 rounded-full bg-accent"></div>
                        <span>Mobile</span>
                    </div>

                    <span id="mobilePercent" class="text-sm font-bold">
                        0%
                    </span>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 text-sm text-zinc-400">
                        <div class="w-2 h-2 rounded-full bg-indigo-400"></div>
                        <span>Desktop</span>
                    </div>

                    <span id="desktopPercent" class="text-sm font-bold">
                        0%
                    </span>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 text-sm text-zinc-400">
                        <div class="w-2 h-2 rounded-full bg-purple-500"></div>
                        <span>Other</span>
                    </div>

                    <span id="otherPercent" class="text-sm font-bold">
                        0%
                    </span>
                </div>

            </div>

        </div>

        <!-- Top Locations -->
        {{-- <div class="glass p-6 rounded-2xl">

            <h3 class="font-bold mb-6">
                Top Locations
            </h3>

            <div id="topCountries" class="space-y-5">
            </div>

        </div> --}}

    </div>

</div>

<div class="h-20"></div>

@endsection

@push('scripts')

<script src="{{ asset('assets/js/dashboard.js') }}"></script>

@endpush