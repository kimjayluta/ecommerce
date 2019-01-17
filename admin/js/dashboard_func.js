$(document).ready(function () {

    function count_order(){
        $.ajax({
            url: 'includes/dashboard_func.php',
            method: 'post',
            data: {countOrder:1},
            success: function (data) {
                $('#order_count').html('<h5>'+ numberWithCommas(data) + '</h5>');
            }
        })
    }

    function count_product(){
        $.ajax({
            url: 'includes/dashboard_func.php',
            method: 'post',
            data: {countProduct:1},
            success: function (data) {
                $('#product_count').html('<h5>'+ numberWithCommas(data) + '</h5>');
            }
        })
    }

    function count_customer(){
        $.ajax({
            url: 'includes/dashboard_func.php',
            method: 'post',
            data: {countCustomer:1},
            success: function (data) {
                $('#customer_count').html('<h5>'+ numberWithCommas(data) + '</h5>');
            }
        })
    }

    function count_revenue(){
        $.ajax({
            url: 'includes/dashboard_func.php',
            method: 'post',
            data: {countRevenue:1},
            success: function (data) {
                $('#revenue_count').html('<h5> &#8369; '+ numberWithCommas(data) + '</h5>');


            }
        })
    }

    // Function to put comma in numbers
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    count_order();
    count_product();
    count_customer();
    count_revenue();

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
                        label: "Total sales ₱",
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