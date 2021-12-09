(function() {
    'use strict';
    // User Latest Upload videos Activity
    var charts = {
        init: function() { this.DailyvideoData(); },
        DailyvideoData: function() {
            var urlPath = BASE_URL + '/user/dashboard/charts/videos';
            var request = $.ajax({
                method: 'GET',
                url: urlPath
            });
            request.done(function(response) {
                charts.CreatevideoChart(response);
            });
        },
        // Create new ApexCharts
        CreatevideoChart: function(response) {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-uploads-activity'), {
                chart: {
                    type: "bar",
                    fontFamily: 'inherit',
                    height: 320,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: true
                    },
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%',
                    }
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: 1,
                },
                series: [{
                    name: "Uploads",
                    data: response.video_count_data
                }],
                grid: {
                    padding: {
                        top: -20,
                        right: 0,
                        left: -4,
                        bottom: -4
                    },
                    strokeDashArray: 4,
                },
                xaxis: {
                    labels: {
                        padding: 0
                    },
                    tooltip: {
                        enabled: false
                    },
                    axisBorder: {
                        show: false,
                    },
                    categories: response.days,
                },
                yaxis: {
                    labels: {
                        formatter: function(val) {
                            return val.toFixed(0);
                        },
                        padding: 4
                    },
                },
                colors: ["#410069"],
                legend: {
                    show: false,
                },
            })).render();
        }
    };
    charts.init();
})(jQuery);