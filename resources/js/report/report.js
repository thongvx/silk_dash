var fixedPayoutCard = $("[fixed-payout-card]");
var fixedVideoCloseButton = $("[fixed-payout-close-button]");
function fixedBox () {
    fixedPayoutCard.toggleClass("opacity-0");
    fixedPayoutCard.toggleClass("opacity-1");
    fixedPayoutCard.toggleClass("hidden");
    fixedPayoutCard.toggleClass("block");
}
$(document).on('click', '.button-payout', function() {
    fixedBox()
});
fixedVideoCloseButton.on("click", function () {
    fixedBox ()
});

if ($("#chart-bars").length) {
    var d = new Date();
    var yesterdayData = '400'
    var yesterdayLabels = [(d.getMonth() + 1) + '/' + (d.getDate()-1)];

    var last7DaysData = Array.from({length: 7}, () => Math.floor(Math.random() * 100));
    var last7DaysLabels = [];

    var last30DaysData = Array.from({length: 30}, () => Math.floor(Math.random() * 100));
    var last30DaysLabels = [];

    var customData = Array.from({length: 30}, () => Math.floor(Math.random() * 100));
    var customLabels = [];

    for (var i = 0; i < 30; i++) {
        var d = new Date();
        d.setDate(d.getDate() - i);
        var label = (d.getMonth() + 1) + '/' + d.getDate();

        if (i < 7) {
            last7DaysLabels.push(label);
        }
        last30DaysLabels.push(label);
    }

    var ctx = $("#chart-bars").get(0).getContext("2d");

    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: last7DaysLabels,
            datasets: [
                {
                    label: "",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#5e72e4",
                    data: last7DaysData,
                    maxBarThickness: 6,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
            },
            interaction: {
                intersect: false,
                mode: "index",
                size: 14,
                callbacks: {
                    label: function (context) {
                        var label = context.dataset.label || "";
                        // if (label) {
                        //     label += ": ";
                        // }
                        if (context.parsed.y !== null) {
                            label += context.parsed.y + "$";
                        }
                        return label;
                    },
                }
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                    },
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 600,
                        beginAtZero: true,
                        padding: 15,
                        font: {
                            size: 14,
                            style: "normal",
                            lineHeight: 2,
                        },
                        color: "#fff",
                        callback: function(value, index, values) {
                            return value+' $';
                        }
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
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
    $(".tab-chart-report").click(function () {
        const data = $(this).data('content');
        switch (data) {
            case 'yesterday':
                myChart.data.labels = yesterdayLabels;
                myChart.data.datasets[0].data = yesterdayData;
                break;
            case 'last-7-days':
                myChart.data.labels = last7DaysLabels;
                myChart.data.datasets[0].data = last7DaysData;
                break;
            case 'last-30-days':
                myChart.data.labels = last30DaysLabels;
                myChart.data.datasets[0].data = last30DaysData;
                break;
        }
        myChart.update();
    });
    $('#date-report').submit(function(e) {
        e.preventDefault();
        customLabels = [];
        var startDate = new Date(document.querySelector('input[name="start"]').value);
        var endDate = new Date(document.querySelector('input[name="end"]').value);

        var daysBetween = Math.ceil(Math.abs(endDate.getTime() - startDate.getTime()) / (1000 * 60 * 60 * 24));
        for (var i = daysBetween; i >= 0; i--) {
            var d = new Date(startDate);
            d.setDate(d.getDate() + i);
            var label = (d.getMonth() + 1) + '/' + d.getDate();
            customLabels.push(label);
        }
        myChart.data.labels = customLabels;
        myChart.data.datasets[0].data = customData;
        myChart.update();
    })
}
