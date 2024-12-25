if ($("#chart-line").length) {
    var last24HoursData = [];
    var last24HoursLabels = [];

    var last7DaysData = $('.week').data('date');
    var last7DaysLabels = [];

    var last30DaysData = [];
    var last30DaysLabels = [];

    var last7DaysPremiumData = $('.week').data('premium');
    var last30DaysPremiumData = [];

    for (var i = 0; i < 30; i++) {
        var d = new Date();
        d.setUTCDate(d.getUTCDate() - i);
        var label = (d.getUTCMonth() + 1) + '/' + d.getUTCDate(); // Month/Date format

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
    last7DaysLabels = last7DaysLabels.reverse();
    last30DaysLabels = last30DaysLabels.reverse();

    var ctx1 = $("#chart-line").get(0).getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

    var gradientStroke2 = ctx1.createLinearGradient(0, 230, 0, 50);
    gradientStroke2.addColorStop(1, "rgba(203,12,159,0.2)");
    gradientStroke2.addColorStop(0.2, "rgba(72,72,176,0.0)");
    gradientStroke2.addColorStop(0, "rgba(203,12,159,0)");

    var myChart = new Chart(ctx1, {
        type: "line",
        data: {
            labels: last7DaysLabels,
            datasets: [
                {
                    label: "Free",
                    tension: 0.4,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: last7DaysData,
                    maxBarThickness: 6
                },
                {
                    label: "Premium",
                    tension: 0.4,
                    pointRadius: 0,
                    borderColor: "#cb0c9f",
                    backgroundColor: gradientStroke2,
                    borderWidth: 3,
                    fill: true,
                    data: last7DaysPremiumData,
                    maxBarThickness: 6
                }
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                },
                onClick: function (e, legendItem, legend) {
                    const index = legendItem.datasetIndex; // Lấy index của dataset
                    const meta = legend.chart.getDatasetMeta(index);
                    meta.hidden = meta.hidden === null ? !legend.chart.data.datasets[index].hidden : null;
                    legend.chart.update(); // Cập nhật biểu đồ
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
                    },
                    min: 0
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
        const type = $(this).data('chart');
        const date = $(this).data('date');
        const premium = $(this).data('premium')
        switch (type) {
            case 'day':
                myChart.data.labels = last24HoursLabels;
                myChart.data.datasets[0].data = date;
                break;
            case 'week':
                myChart.data.labels = last7DaysLabels;
                myChart.data.datasets[0].data = date;
                myChart.data.datasets[1].data = premium;
                break;
            case 'month':
                myChart.data.labels = last30DaysLabels;
                myChart.data.datasets[0].data = date;
                myChart.data.datasets[1].data = premium;
                break;
        }
        myChart.update();
    });
}
