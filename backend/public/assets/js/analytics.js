      // Initialize Lucide
        lucide.createIcons();

        // Chart.js Configuration
        Chart.defaults.color = '#71717a';
        Chart.defaults.font.family = "'Inter', sans-serif";

        // Main Performance Chart
        const mainCtx = document.getElementById('mainAnalyticsChart').getContext('2d');
        const mainGradient = mainCtx.createLinearGradient(0, 0, 0, 350);
        mainGradient.addColorStop(0, 'rgba(99, 102, 241, 0.25)');
        mainGradient.addColorStop(1, 'rgba(99, 102, 241, 0)');

        new Chart(mainCtx, {
            type: 'line',
            data: {
                labels: ['May 01', 'May 02', 'May 03', 'May 04', 'May 05', 'May 06', 'May 07'],
                datasets: [{
                    label: 'Clicks',
                    data: [2800, 4200, 3800, 6400, 5200, 7800, 7200],
                    borderColor: '#6366f1',
                    borderWidth: 3,
                    tension: 0.4,
                    fill: true,
                    backgroundColor: mainGradient,
                    pointBackgroundColor: '#6366f1',
                    pointBorderColor: '#09090b',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#18181b',
                        titleColor: '#ffffff',
                        bodyColor: '#ffffff',
                        borderColor: 'rgba(255,255,255,0.1)',
                        borderWidth: 1,
                        padding: 12,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return context.parsed.y.toLocaleString() + ' clicks';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        grid: { color: 'rgba(255,255,255,0.05)', drawBorder: false },
                        ticks: {
                            callback: value => value >= 1000 ? (value / 1000) + 'k' : value
                        }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });

        // Device Doughnut Chart
        const deviceCtx = document.getElementById('deviceChart').getContext('2d');
        new Chart(deviceCtx, {
            type: 'doughnut',
            data: {
                labels: ['Mobile', 'Desktop', 'Tablet'],
                datasets: [{
                    data: [64, 31, 5],
                    backgroundColor: [
                        '#6366f1',
                        '#3b82f6',
                        '#8b5cf6'
                    ],
                    borderWidth: 0,
                    weight: 1,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '80%',
                plugins: {
                    legend: { display: false }
                }
            }
        });