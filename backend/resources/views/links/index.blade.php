@extends('layouts.app')

@push('styles')

<link rel="stylesheet" href="{{ asset('assets/css/links.css') }}">

@endpush

@section('content')

<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">

    <div>

        <h1 class="text-3xl font-bold font-heading">
            Links Management
        </h1>

        <p class="text-zinc-500 text-sm mt-1">
            Manage, organize, and track your shortened URLs performance.
        </p>

    </div>

    <button
        onclick="openCreateModal()"
        class="px-6 py-3 bg-accent text-white font-bold rounded-2xl hover:bg-accent/90 transition-all flex items-center gap-2 whitespace-nowrap"
    >
        <i data-lucide="plus" class="w-5 h-5"></i>

        Create Link
    </button>

</div>

<!-- Filters -->
{{-- <div class="glass p-4 rounded-2xl flex flex-wrap items-center gap-4 mb-6">

    <div class="relative flex-1 min-w-[240px]">

        <i data-lucide="search"
           class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-zinc-500"></i>

        <input
            type="text"
            placeholder="Filter by name or URL..."
            class="w-full bg-background border border-border rounded-xl pl-10 pr-4 py-2 text-sm focus:outline-none focus:border-accent transition-all"
        >

    </div>

    <select class="bg-background border border-border rounded-xl px-4 py-2 text-sm text-zinc-400 focus:outline-none focus:border-accent">

        <option>All Status</option>

        <option>Active</option>

        <option>Expired</option>

    </select>

    <select class="bg-background border border-border rounded-xl px-4 py-2 text-sm text-zinc-400 focus:outline-none focus:border-accent">

        <option>Sort: Newest</option>

        <option>Sort: Most Clicked</option>

    </select>

</div> --}}

<!-- Bulk Toolbar -->
<div
    id="bulkActions"
    class="hidden animate-in fade-in slide-in-from-top-2 bg-accent/10 border border-accent/20 p-3 rounded-2xl mb-4 flex items-center justify-between"
>

    <div class="flex items-center gap-3 pl-2">

        <span class="text-sm font-semibold text-accent">

            <span id="selectedCount">0</span>

            selected

        </span>

    </div>

    <div class="flex gap-2">

        <button
            class="px-3 py-1.5 text-xs font-bold text-white bg-accent/20 rounded-lg hover:bg-accent/30 transition-all"
        >
            Export Selected
        </button>

        <button
            class="px-3 py-1.5 text-xs font-bold text-rose-500 bg-rose-500/10 rounded-lg hover:bg-rose-500/20 transition-all"
        >
            Delete Selected
        </button>

    </div>

</div>

<!-- Links Table -->
<div class="glass rounded-2xl overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full text-left border-collapse">

            <thead class="bg-white/5 sticky top-0 z-10">

                <tr>

                    {{-- <th class="px-6 py-4 w-4">

                        <input
                            type="checkbox"
                            id="masterCheckbox"
                            class="rounded border-zinc-700 bg-zinc-900 text-accent focus:ring-accent focus:ring-offset-background"
                        >

                    </th> --}}

                    <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider">
                        Destination URL
                    </th>

                    <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider">
                        Short URL
                    </th>

                    {{-- <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider">
                        QR
                    </th> --}}

                    <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider text-center">
                        Clicks
                    </th>

                    <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider">
                        Status
                    </th>

                    <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider">
                        Created
                    </th>

                    <th class="px-6 py-4 text-right"></th>

                </tr>

            </thead>

            <tbody
                id="linksTableBody"
                class="divide-y divide-border"
            ></tbody>

        </table>

    </div>

</div>

<!-- Empty State -->
<div
    id="emptyState"
    class="hidden glass rounded-2xl p-16 text-center mt-6"
>

    <div class="w-20 h-20 rounded-3xl bg-white/5 flex items-center justify-center mx-auto mb-6">

        <i data-lucide="link-2"
           class="w-10 h-10 text-zinc-500"></i>

    </div>

    <h2 class="text-2xl font-bold mb-2">
        No links yet
    </h2>

    <p class="text-zinc-500 text-sm mb-8 max-w-md mx-auto">
        Create your first short link and start tracking clicks, analytics, and engagement.
    </p>

    <button
        onclick="openCreateModal()"
        class="px-6 py-3 bg-accent text-white font-bold rounded-2xl hover:bg-accent/90 transition-all inline-flex items-center gap-2"
    >
        <i data-lucide="plus" class="w-5 h-5"></i>

        Create First Link
    </button>

</div>

<!-- Pagination -->
{{-- <div class="flex items-center justify-between mt-6 px-2">

    <span class="text-xs text-zinc-500">
        Showing latest links
    </span>

    <div class="flex gap-2">

        <button
            class="px-4 py-2 text-xs font-bold glass rounded-xl text-zinc-400 hover:text-white transition-all"
        >
            Previous
        </button>

        <button
            class="px-4 py-2 text-xs font-bold bg-accent rounded-xl text-white"
        >
            Next
        </button>

    </div>

</div> --}}

@endsection

@push('scripts')

<script src="{{ asset('assets/js/links.js') }}"></script>

@endpush