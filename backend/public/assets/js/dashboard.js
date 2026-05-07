/*
|--------------------------------------------------------------------------
| Initialize Icons
|--------------------------------------------------------------------------
*/

lucide.createIcons();

/*
|--------------------------------------------------------------------------
| Mobile Sidebar Toggle
|--------------------------------------------------------------------------
*/

const mobileToggle = document.getElementById('mobile-toggle');

const sidebar = document.getElementById('sidebar');

const overlay = document.getElementById('sidebar-overlay');

function toggleSidebar() {

    sidebar.classList.toggle('-translate-x-full');

    overlay.classList.toggle('hidden');
}

if (mobileToggle) {

    mobileToggle.addEventListener('click', toggleSidebar);
}

if (overlay) {

    overlay.addEventListener('click', toggleSidebar);
}

/*
|--------------------------------------------------------------------------
| Chart Defaults
|--------------------------------------------------------------------------
*/

Chart.defaults.color = '#71717a';

Chart.defaults.font.family = "'Inter', sans-serif";

/*
|--------------------------------------------------------------------------
| Global Charts
|--------------------------------------------------------------------------
*/

let performanceChart = null;

let deviceChart = null;

/*
|--------------------------------------------------------------------------
| Init Dashboard
|--------------------------------------------------------------------------
*/

document.addEventListener('DOMContentLoaded', async () => {

    await loadDashboard();
});

/*
|--------------------------------------------------------------------------
| Load Dashboard API
|--------------------------------------------------------------------------
*/

async function loadDashboard() {

    try {

        const response = await api('/api/dashboard');

        renderStats(response.stats);

        renderRecentLinks(response.recent_links);

        renderPerformanceChart(response.click_chart);

        renderDeviceChart(response.devices);

        renderCountries(response.countries);

    } catch (error) {

        console.error(error);
    }
}

/*
|--------------------------------------------------------------------------
| Render Stats
|--------------------------------------------------------------------------
*/

function renderStats(stats) {

    document.getElementById('totalLinks').innerText =
        stats.total_links ?? 0;

    document.getElementById('totalClicks').innerText =
        stats.total_clicks ?? 0;

    document.getElementById('clicksToday').innerText =
        stats.clicks_today ?? 0;

    document.getElementById('activeLinks').innerText =
        stats.active_links ?? 0;
}

/*
|--------------------------------------------------------------------------
| Render Recent Links
|--------------------------------------------------------------------------
*/

function renderRecentLinks(links) {

    const table =
        document.getElementById('recentLinksTable');

    if (!table) return;

    table.innerHTML = '';

    if (!links.length) {

        table.innerHTML = `
            <tr>
                <td colspan="5" class="px-6 py-10 text-center text-zinc-500">
                    No links found
                </td>
            </tr>
        `;

        return;
    }

    links.forEach(link => {

        const shortUrl =
            `${window.location.origin}/${link.short_code}`;

        table.innerHTML += `
            <tr class="hover:bg-white/[0.02] transition-colors group">

                <td class="px-6 py-4">
                    <div class="flex flex-col">
                        <a href="${shortUrl}"
                           target="_blank"
                           class="text-sm font-bold text-accent hover:underline">
                            ${shortUrl}
                        </a>

                        <span class="text-[10px] text-zinc-500">
                            ${formatDate(link.created_at)}
                        </span>
                    </div>
                </td>

                <td class="px-6 py-4">
                    <span class="text-sm text-zinc-400 truncate max-w-[150px] inline-block">
                        ${link.original_url}
                    </span>
                </td>

                <td class="px-6 py-4 text-center">
                    <span class="text-sm font-medium">
                        ${link.clicks_count}
                    </span>
                </td>

                <td class="px-6 py-4">
                    <span class="px-2 py-1 bg-emerald-400/10 text-emerald-400 text-[10px] font-bold rounded-md uppercase">
                        Active
                    </span>
                </td>

                <td class="px-6 py-4">
                    <div class="flex items-center gap-2">

                        <button
                            onclick="copyLink('${shortUrl}')"
                            class="p-1.5 text-zinc-500 hover:text-white hover:bg-white/10 rounded-lg transition-all"
                            title="Copy"
                        >
                            <i data-lucide="copy" class="w-4 h-4"></i>
                        </button>

                        <a
                            href="${shortUrl}"
                            target="_blank"
                            class="p-1.5 text-zinc-500 hover:text-white hover:bg-white/10 rounded-lg transition-all"
                            title="Open"
                        >
                            <i data-lucide="external-link" class="w-4 h-4"></i>
                        </a>

                    </div>
                </td>

            </tr>
        `;
    });

    lucide.createIcons();
}

/*
|--------------------------------------------------------------------------
| Performance Chart
|--------------------------------------------------------------------------
*/

function renderPerformanceChart(chartData) {

    const canvas =
        document.getElementById('performanceChart');

    if (!canvas) return;

    const perfCtx =
        canvas.getContext('2d');

    const perfGradient =
        perfCtx.createLinearGradient(0, 0, 0, 300);

    perfGradient.addColorStop(
        0,
        'rgba(99, 102, 241, 0.2)'
    );

    perfGradient.addColorStop(
        1,
        'rgba(99, 102, 241, 0)'
    );

    const labels =
        chartData.map(item => item.date);

    const data =
        chartData.map(item => item.clicks);

    if (performanceChart) {

        performanceChart.destroy();
    }

    performanceChart = new Chart(perfCtx, {

        type: 'line',

        data: {

            labels,

            datasets: [
                {
                    label: 'Clicks',

                    data,

                    borderColor: '#6366f1',

                    borderWidth: 3,

                    tension: 0.4,

                    fill: true,

                    backgroundColor: perfGradient,

                    pointBackgroundColor: '#6366f1',

                    pointBorderColor: '#09090b',

                    pointBorderWidth: 2,

                    pointRadius: 4,

                    pointHoverRadius: 6,
                }
            ]
        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {
                    display: false
                },

                tooltip: {

                    backgroundColor: '#18181b',

                    titleColor: '#fff',

                    bodyColor: '#fff',

                    borderColor: 'rgba(255,255,255,0.1)',

                    borderWidth: 1,

                    padding: 12,

                    displayColors: false
                }
            },

            scales: {

                y: {

                    grid: {
                        color: 'rgba(255,255,255,0.05)',
                        drawBorder: false
                    },

                    ticks: {
                        padding: 10
                    }
                },

                x: {

                    grid: {
                        display: false
                    },

                    ticks: {
                        padding: 10
                    }
                }
            }
        }
    });
}

/*
|--------------------------------------------------------------------------
| Device Chart
|--------------------------------------------------------------------------
*/

function renderDeviceChart(devices) {

    const canvas =
        document.getElementById('deviceChart');

    if (!canvas) return;

    const deviceCtx =
        canvas.getContext('2d');

    const labels =
        devices.map(item => item.device || 'Unknown');

    const totals =
        devices.map(item => item.total);

    if (deviceChart) {

        deviceChart.destroy();
    }

    deviceChart = new Chart(deviceCtx, {

        type: 'doughnut',

        data: {

            labels,

            datasets: [{
                data: totals,

                backgroundColor: [
                    '#6366f1',
                    '#818cf8',
                    '#4f46e5',
                    '#27272a'
                ],

                hoverBackgroundColor: [
                    '#4f46e5',
                    '#6366f1',
                    '#4338ca',
                    '#3f3f46'
                ],

                borderWidth: 0,

                spacing: 10,

                borderRadius: 8
            }]
        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            cutout: '75%',

            plugins: {

                legend: {
                    display: false
                }
            }
        }
    });

    /*
    |--------------------------------------------------------------------------
    | Percentages
    |--------------------------------------------------------------------------
    */

    const totalVisits =
        totals.reduce((a, b) => a + b, 0);

    const mobile =
        devices.find(d => d.device === 'Mobile')?.total || 0;

    const desktop =
        devices.find(d => d.device === 'Desktop')?.total || 0;

    const other =
        totalVisits - mobile - desktop;

    const mobileEl =
        document.getElementById('mobilePercent');

    const desktopEl =
        document.getElementById('desktopPercent');

    const otherEl =
        document.getElementById('otherPercent');

    if (mobileEl) {

        mobileEl.innerText =
            percentage(mobile, totalVisits);
    }

    if (desktopEl) {

        desktopEl.innerText =
            percentage(desktop, totalVisits);
    }

    if (otherEl) {

        otherEl.innerText =
            percentage(other, totalVisits);
    }
}

/*
|--------------------------------------------------------------------------
| Render Countries
|--------------------------------------------------------------------------
*/

function renderCountries(countries) {

    const container =
        document.getElementById('topCountries');

    if (!container) return;

    container.innerHTML = '';

    if (!countries.length) {

        container.innerHTML = `
            <p class="text-sm text-zinc-500">
                No country data yet
            </p>
        `;

        return;
    }

    const total =
        countries.reduce((sum, item) => sum + item.total, 0);

    countries.forEach(country => {

        const percent =
            Math.round((country.total / total) * 100);

        container.innerHTML += `
            <div class="flex items-center justify-between">

                <div class="flex items-center gap-3">

                    <span class="text-sm font-medium">
                        ${country.country}
                    </span>

                </div>

                <span class="text-sm font-bold">
                    ${percent}%
                </span>

            </div>
        `;
    });
}

/*
|--------------------------------------------------------------------------
| Copy Link
|--------------------------------------------------------------------------
*/

window.copyLink = async function(link) {

    try {

        await navigator.clipboard.writeText(link);

        alert('Link copied');

    } catch (error) {

        console.error(error);
    }
}

/*
|--------------------------------------------------------------------------
| Helpers
|--------------------------------------------------------------------------
*/

function formatDate(date) {

    return new Date(date).toLocaleDateString();
}

function percentage(value, total) {

    if (!total) {

        return '0%';
    }

    return Math.round((value / total) * 100) + '%';
}