
<script>
    $(document).ready(function () {
    "use strict"; // Start of use strict
    //Performance Chart
    var chart_labels = [<?php echo $months;?>];
    var temp_dataset = [<?php echo $yearlyPost?>];
    var rain_dataset = [<?php echo $readHit?>];
    var ctx = document.getElementById("forecast").getContext('2d');

    var config = {
        type: 'bar',
        data: {
            labels: chart_labels,
            datasets: [{
                    type: 'line',
                    label: "<?php echo display('post')?>",
                    borderColor: "rgb(55, 160, 0)",
                    fill: false,
                    data: temp_dataset
                }, {
                    type: 'bar',
                    label: "<?php echo makeString(['read','hit'])?>",
                    backgroundColor: "rgba(55, 160, 0, .1)",
                    borderColor: "rgba(55, 160, 0, .4)",
                    data: rain_dataset
                }]
        },
        options: {
            legend: false,
            scales: {
                yAxes: [{
                        gridLines: {
                            color: "#e6e6e6",
                            zeroLineColor: "#e6e6e6",
                            borderDash: [2],
                            borderDashOffset: [2],
                            drawBorder: false,
                            drawTicks: false
                        },
                        ticks: {
                            padding: 20
                        }
                    }],

                xAxes: [{
                        maxBarThickness: 50,
                        gridLines: {
                            lineWidth: [0]
                        },
                        ticks: {
                            padding: 20,
                            fontSize: 14,
                            fontFamily: "'Nunito Sans', sans-serif"
                        }
                    }]
            }
        }
    };


    var forecast_chart = new Chart(ctx, config);
    $("#0").on("click", function () {
        var data = forecast_chart.config.data;
        data.datasets[0].data = temp_dataset;
        data.datasets[1].data = rain_dataset;
        data.labels = chart_labels;
        forecast_chart.update();
    });
    





    //doughut chart
    var ctx = document.getElementById("doughutChart");
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                    data: [<?php echo $lastWeekPost->total_post?>, <?php echo $lastWeekPost->read_hit?>, <?php echo $lastWeekComments?>],
                    backgroundColor: [
                        "#37a000",
                        "#42b704",
                        "#e4e4e4",
                    ],
                    hoverBackgroundColor: [
                        "#4cd604",
                        "#4cd604",
                        "#4cd604"
                    ]
                }],
            labels: [
                "<?php echo makeString(['post'])?>",
                "<?php echo makeString(['read','hit'])?>",
                "<?php echo makeString(['comments'])?>",
                "green"
            ]
        },
        options: {
            legend: false,
            responsive: true,
            cutoutPercentage: 80,
        }
    });
});
</script>