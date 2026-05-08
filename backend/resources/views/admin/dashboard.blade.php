@extends('admin.layouts.app')

@section('content')

<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">

    <div>
        <h1 class="text-2xl md:text-3xl font-bold font-heading">
            Admin Dashboard 🚀
        </h1>

        <p class="text-zinc-500 mt-1">
            Platform overview and growth metrics
        </p>
    </div>

</div>

<!-- ===================================================== -->
<!-- MAIN STATS -->
<!-- ===================================================== -->

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8">

    <!-- Total Users -->
    <div class="glass p-6 rounded-2xl group hover:border-accent/40 transition-all">

        <div class="flex items-center justify-between mb-4">

            <div class="p-2 bg-accent/10 rounded-lg text-accent">
                <i data-lucide="users" class="w-5 h-5"></i>
            </div>

        </div>

        <p class="text-zinc-500 text-sm font-medium">
            Total Users
        </p>

        <h3 id="totalUsers" class="text-2xl font-bold mt-1">
            0
        </h3>

    </div>

    <!-- Total Links -->
    <div class="glass p-6 rounded-2xl group hover:border-accent/40 transition-all">

        <div class="flex items-center justify-between mb-4">

            <div class="p-2 bg-purple-500/10 rounded-lg text-purple-400">
                <i data-lucide="link-2" class="w-5 h-5"></i>
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

            <div class="p-2 bg-blue-500/10 rounded-lg text-blue-400">
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

    <!-- Guest Links -->
    <div class="glass p-6 rounded-2xl group hover:border-accent/40 transition-all">

        <div class="flex items-center justify-between mb-4">

            <div class="p-2 bg-orange-500/10 rounded-lg text-orange-400">
                <i data-lucide="user-round-x" class="w-5 h-5"></i>
            </div>

        </div>

        <p class="text-zinc-500 text-sm font-medium">
            Guest Links
        </p>

        <h3 id="guestLinks" class="text-2xl font-bold mt-1">
            0
        </h3>

    </div>

</div>

<!-- ===================================================== -->
<!-- SECONDARY STATS -->
<!-- ===================================================== -->

<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8">

    <div class="glass p-6 rounded-2xl">
        <p class="text-zinc-500 text-sm font-medium">
            Users Today
        </p>

        <h3 id="usersToday" class="text-2xl font-bold mt-1">
            0
        </h3>
    </div>

    <div class="glass p-6 rounded-2xl">
        <p class="text-zinc-500 text-sm font-medium">
            Links Today
        </p>

        <h3 id="linksToday" class="text-2xl font-bold mt-1">
            0
        </h3>
    </div>

    <div class="glass p-6 rounded-2xl">
        <p class="text-zinc-500 text-sm font-medium">
            Clicks Today
        </p>

        <h3 id="clicksToday" class="text-2xl font-bold mt-1">
            0
        </h3>
    </div>

    <div class="glass p-6 rounded-2xl">
        <p class="text-zinc-500 text-sm font-medium">
            Registered Links
        </p>

        <h3 id="registeredLinks" class="text-2xl font-bold mt-1">
            0
        </h3>
    </div>

</div>

<!-- ===================================================== -->
<!-- MAIN GRID -->
<!-- ===================================================== -->

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

    <!-- LEFT -->
    <div class="lg:col-span-8 space-y-8">

        <!-- Activity Chart -->
        <div class="glass p-6 rounded-2xl">

            <div class="flex items-center justify-between mb-8">

                <h3 class="font-bold">
                    Platform Activity
                </h3>

            </div>

            <div class="h-[300px]">
                <canvas id="adminChart"></canvas>
            </div>

        </div>

        <!-- Top Links -->
        <div class="glass rounded-2xl overflow-hidden">

            <div class="p-6 border-b border-border">

                <h3 class="font-bold">
                    Top Performing Links
                </h3>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full text-left border-collapse">

                    <thead class="bg-white/5">

                        <tr>

                            <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider">
                                Short Link
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider">
                                Clicks
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider">
                                Alias
                            </th>

                        </tr>

                    </thead>

                    <tbody
                        id="topLinksTable"
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

        </div>

    </div>

</div>

<div class="h-20"></div>

@endsection

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', async () => {

    lucide.createIcons();

    Chart.defaults.color = '#71717a';

    Chart.defaults.font.family = "'Inter', sans-serif";

    const response = await fetch('/api/admin/dashboard');

    const data = await response.json();

    /*
    |--------------------------------------------------------------------------
    | Stats
    |--------------------------------------------------------------------------
    */

    document.getElementById('totalUsers').innerText =
        data.users.total;

    document.getElementById('totalLinks').innerText =
        data.links.total;

    document.getElementById('totalClicks').innerText =
        data.clicks.total;

    document.getElementById('guestLinks').innerText =
        data.links.guest_links;

    document.getElementById('usersToday').innerText =
        data.users.today;

    document.getElementById('linksToday').innerText =
        data.links.today;

    document.getElementById('clicksToday').innerText =
        data.clicks.today;

    document.getElementById('registeredLinks').innerText =
        data.links.registered_links;

    /*
    |--------------------------------------------------------------------------
    | Top Links Table
    |--------------------------------------------------------------------------
    */

    const table = document.getElementById('topLinksTable');

    data.top_links.forEach(link => {

        table.innerHTML += `
            <tr class="hover:bg-white/5 transition-all">

                <td class="px-6 py-4 font-medium">
                    /${link.custom_alias || link.short_code}
                </td>

                <td class="px-6 py-4">
                    ${link.clicks_count}
                </td>

                <td class="px-6 py-4 text-zinc-500">
                    ${link.custom_alias || '-'}
                </td>

            </tr>
        `;
    });

    /*
    |--------------------------------------------------------------------------
    | Main Chart
    |--------------------------------------------------------------------------
    */

    const chartCtx =
        document.getElementById('adminChart').getContext('2d');

    const gradient =
        chartCtx.createLinearGradient(0, 0, 0, 300);

    gradient.addColorStop(0, 'rgba(99,102,241,0.25)');
    gradient.addColorStop(1, 'rgba(99,102,241,0)');

    new Chart(chartCtx, {

        type: 'line',

        data: {

            labels: [
                'Mon',
                'Tue',
                'Wed',
                'Thu',
                'Fri',
                'Sat',
                'Sun'
            ],

            datasets: [{

                label: 'Clicks',

                data: [
                    120,
                    190,
                    300,
                    500,
                    420,
                    610,
                    720
                ],

                borderColor: '#6366f1',

                backgroundColor: gradient,

                fill: true,

                tension: 0.4,

                borderWidth: 3,

                pointRadius: 0
            }]
        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {
                    display: false
                }
            },

            scales: {

                x: {
                    grid: {
                        display: false
                    }
                },

                y: {
                    grid: {
                        color: 'rgba(255,255,255,0.04)'
                    }
                }
            }
        }
    });

    /*
    |--------------------------------------------------------------------------
    | Device Chart
    |--------------------------------------------------------------------------
    */

    const deviceCtx =
        document.getElementById('deviceChart').getContext('2d');

    const labels =
        data.top_devices.map(d => d.device);

    const totals =
        data.top_devices.map(d => d.total);

    new Chart(deviceCtx, {

        type: 'doughnut',

        data: {

            labels,

            datasets: [{

                data: totals,

                backgroundColor: [
                    '#6366f1',
                    '#818cf8',
                    '#a855f7',
                    '#3f3f46'
                ],

                borderWidth: 0
            }]
        },

        options: {

            responsive: true,

            cutout: '75%',

            plugins: {

                legend: {
                    position: 'bottom'
                }
            }
        }
    });

});

</script>

@endpush