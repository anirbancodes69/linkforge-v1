        // Initialize Icons
        lucide.createIcons();

        // Mobile Sidebar Toggle
        const mobileToggle = document.getElementById('mobile-toggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        mobileToggle.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        // Chart.js Default Config
        Chart.defaults.color = '#71717a';
        Chart.defaults.font.family = "'Inter', sans-serif";

        // Performance Chart
        const perfCtx = document.getElementById('performanceChart').getContext('2d');
        const perfGradient = perfCtx.createLinearGradient(0, 0, 0, 300);
        perfGradient.addColorStop(0, 'rgba(99, 102, 241, 0.2)');
        perfGradient.addColorStop(1, 'rgba(99, 102, 241, 0)');

        new Chart(perfCtx, {
            type: 'line',
            data: {
                labels: ['May 01', 'May 03', 'May 05', 'May 07', 'May 09', 'May 11', 'May 13'],
                datasets: [
                    {
                        label: 'Clicks',
                        data: [1200, 1900, 1500, 2400, 1800, 2900, 2400],
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
                    },
                    {
                        label: 'Previous',
                        data: [1000, 1400, 1300, 1800, 1500, 2100, 1900],
                        borderColor: 'rgba(255, 255, 255, 0.1)',
                        borderWidth: 2,
                        borderDash: [5, 5],
                        tension: 0.4,
                        fill: false,
                        pointRadius: 0,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
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
                        grid: { color: 'rgba(255,255,255,0.05)', drawBorder: false },
                        ticks: { padding: 10 }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { padding: 10 }
                    }
                }
            }
        });

        // Device Chart
        const deviceCtx = document.getElementById('deviceChart').getContext('2d');
        new Chart(deviceCtx, {
            type: 'doughnut',
            data: {
                labels: ['Mobile', 'Desktop', 'Other'],
                datasets: [{
                    data: [58, 32, 10],
                    backgroundColor: ['#6366f1', '#818cf8', '#4f46e5'],
                    hoverBackgroundColor: ['#4f46e5', '#6366f1', '#4338ca'],
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
                    legend: { display: false }
                }
            }
        });