// Line Graph
$.ajax({
    url: 'includes/graph_data.php',
    method: 'get',
    success: function (data) {
        console.log(data);
        return;

        const lineChart = $('#lineGraph');
        let dataGraph = {

            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                "October", "November", "December"],
            datasets: [{
                label: "Total Sales",
                backgroundColor: 'rgba(75,75,192,0.4)',
                borderColor: 'rgba(75,75,192,1)',
                data: [{}],
                lineTension: 0.2,
            }]
        };
        let chart = new Chart(lineChart, {
            // The type of chart we want to create
            type: 'line',
            // The data for our dataset
            data: dataGraph,
            // Configuration options go here
            options: {}
        });
    }
});
