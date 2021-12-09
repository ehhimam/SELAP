(function() {
    'use strict';

    // New charts
    var charts = {
        // Uploads charts
        initUploads: function() { this.AdminAllUploadsCharts(); },
        AdminAllUploadsCharts: function() {
            var urlPath = BASE_URL + '/admin/dashboard/charts/uploads';
            var request = $.ajax({
                method: 'GET',
                url: urlPath
            });

            request.done(function(response) {
                charts.CreateUploadsCharts(response);
            });
        },

        // Users charts
        initUsers: function() { this.AdminAllUsersCharts(); },
        AdminAllUsersCharts: function() {
            var urlPath = BASE_URL + '/admin/dashboard/charts/users';
            var request = $.ajax({
                method: 'GET',
                url: urlPath
            });

            request.done(function(response) {
                charts.CreateUsersCharts(response);
            });
        },


        // Create uploads charts
        CreateUploadsCharts: function(response) {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-uploads-overview'), {
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
                    data: response.upload_count_data
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
                colors: ["#615cf5"],
                legend: {
                    show: false,
                },
            })).render();
        },

        // Create users charts
        CreateUsersCharts: function(response) {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-users'), {
                chart: {
                    type: "area",
                    fontFamily: 'inherit',
                    height: 240,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: true
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: .16,
                    type: 'solid'
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                    curve: "smooth",
                },
                series: [{
                    name: "Users",
                    data: response.users_count_data,
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
                    type: 'line',
                },
                yaxis: {
                    labels: {
                        formatter: function(val) {
                            return val.toFixed(0);
                        },
                        padding: 4
                    },
                },
                labels: response.days,
                colors: ["#615cf5"],
                legend: {
                    show: false,
                },
            })).render();
        }
    };
    charts.initUploads();
    charts.initUsers();
})(jQuery);