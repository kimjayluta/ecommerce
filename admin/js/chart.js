$(document).ready(function () {
    $.ajax({
        url: 'includes/graph_data.php',
        method: 'get',
        success: function (data) {
            const lineChart = $('#lineGraph');
            let chart = new Chart(lineChart, {
                // The type of chart we want to create
                type: 'line',
                // The data for our dataset
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                        "October", "November", "December"],
                    datasets: [{
                        label: "Total Sales",
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255,99,132,1)',
                        data: JSON.parse(data),
                        borderWidth: 1
                    }]
                },
                // Configuration options go here
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    });
});