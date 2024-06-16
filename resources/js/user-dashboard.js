if ($("#chart-line").length) {
    var last24HoursData = Array.from({length: 24}, () => Math.floor(Math.random() * 100));
    var last24HoursLabels = [];

    var last7DaysData = Array.from({length: 7}, () => Math.floor(Math.random() * 100));
    var last7DaysLabels = [];

    var last30DaysData = Array.from({length: 30}, () => Math.floor(Math.random() * 100));
    var last30DaysLabels = [];

    for (var i = 0; i < 30; i++) {
        var d = new Date();
        d.setDate(d.getDate() - i);
        var label = (d.getMonth() + 1) + '/' + d.getDate(); // Month/Date format

        if (i < 7) {
            last7DaysLabels.push(label);
        }
        last30DaysLabels.push(label);
    }
    for (var i = 0; i < 24; i++) {
        var d = new Date();
        d.setHours(d.getHours() - i);
        var label = d.getHours();
        last24HoursLabels.push(label);
    }
// Reverse the arrays to have the oldest date first
    last24HoursLabels = last24HoursLabels.reverse();
    last7DaysLabels = last7DaysLabels.reverse();
    last30DaysLabels = last30DaysLabels.reverse();

    var ctx1 = $("#chart-line").get(0).getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

    var myChart = new Chart(ctx1, {
        type: "line",
        data: {
            labels: last7DaysLabels,
            datasets: [{
                label: "View",
                tension: 0.4,
                pointRadius: 0,
                borderColor: "#5e72e4",
                backgroundColor: gradientStroke1,
                borderWidth: 3,
                fill: true,
                data: last7DaysData,
                maxBarThickness: 6
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
                size: 14,

            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#fbfbfb',
                        font: {
                            size: 15,
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#ccc',
                        padding: 20,
                        font: {
                            size: 15,
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });

    $(".switchButton").click(function () {
        $('.switchButton').removeClass('bg-[#009FB2]').addClass('bg-[#142132]')
        $(this).addClass('bg-[#009FB2]').removeClass('bg-[#142132]')
        const data = $(this).data('chart');
        switch (data) {
            case 'day':
                myChart.data.labels = last24HoursLabels;
                myChart.data.datasets[0].data = last24HoursData;
                break;
            case 'week':
                myChart.data.labels = last7DaysLabels;
                myChart.data.datasets[0].data = last7DaysData;
                break;
            case 'month':
                myChart.data.labels = last30DaysLabels;
                myChart.data.datasets[0].data = last30DaysData;
                break;
        }
        myChart.update();
    });
}
