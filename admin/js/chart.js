// Line Graph
const lineChart = document.getElementById('lineGraph').getContext('2d');
let chart = new Chart(lineChart, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September",
            "October", "November", "December"],
        datasets: [{
            label: "Total Sales",
            backgroundColor: 'rgba(75,75,192,0.4)',
            borderColor: 'rgba(75,75,192,1)',
            data: [0, 10, 5, 2, 20, 30, 45, 5, 4, 101, 40, 60],
        }]
    },

    // Configuration options go here
    options: {}
});
// Pie Graph
const pieChart = document.getElementById('pieGraph').getContext('2d');
let pie = new Chart(pieChart, {
    // The type of chart we want to create
    type: 'pie',
    // The data for our dataset
    data: {
        datasets: [{
            data: [10, 20, 30],
            backgroundColor: ["#0074D9", "#FF4136", "#2ECC40"]
        }],

        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            'Blue',
            'Red',
            'Green'
        ]
    },

    // Configuration options go here
    options: {}
});

