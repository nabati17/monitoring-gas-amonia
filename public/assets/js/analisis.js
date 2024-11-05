document.addEventListener('DOMContentLoaded', function() {
    const dailyAverages = window.dailyAverages;
    const monthlyAverages = window.monthlyAverages;
    const yearlyData = window.yearlyData;

    // Daily Averages Chart
    const ctxDaily = document.getElementById('chart-line-daily').getContext('2d');
    new Chart(ctxDaily, {
        type: 'line',
        data: {
            datasets: [{
                label: 'Rata-rata Harian',
                data: dailyAverages,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                fill: true,
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                }
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            },
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Days of the Week'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Gas Level'
                    }
                }
            }
        }
    });

    // Monthly Averages Chart
    const ctxMonthly = document.getElementById('chart-line-monthly').getContext('2d');
    new Chart(ctxMonthly, {
        type: 'line',
        data: {
            datasets: [{
                label: 'Rata-rata Bulanan',
                data: monthlyAverages,
                borderColor: 'rgba(153, 102, 255, 1)',
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderWidth: 2,
                fill: true,
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                }
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            },
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Months'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Gas Level'
                    }
                }
            }
        }
    });

    // Yearly Data Chart
    const ctxYearly = document.getElementById('chart-line-yearly').getContext('2d');
    const yearlyLabels = Object.keys(yearlyData);
    const yearlyValues = Object.values(yearlyData);
    new Chart(ctxYearly, {
        type: 'line',
        data: {
            labels: yearlyLabels,
            datasets: [{
                label: 'Rata-rata Tahunan',
                data: yearlyValues,
                borderColor: 'rgba(255, 159, 64, 1)',
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderWidth: 2,
                fill: true,
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                }
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            },
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Years'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Gas Level'
                    }
                }
            }
        }
    });
});
