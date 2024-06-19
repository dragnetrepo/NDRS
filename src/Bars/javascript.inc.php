<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="js/script.js"></script>

<script>
    const ctx3 = document.getElementById('myChart3');

    if(ctx3){
        new Chart(ctx3, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'March', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        label: 'Average time spent by all students',
                        data: [500, 1000, 2000, 800, 900, 300, 1500, 2000, 300, 500, 600, 1200],
                        borderWidth: 3,
                        // backgroundColor: ["#11302a", "#036264", "#8f5774", "#e0829d", "#dac4d0", "#f1a13a", "#8f5774"],
                        fill: false,
                        borderColor: '#15AD07',
                        tension: 0.5
                    }
                ]
            },
            options: {
                // animations: {
                //     tension: {
                //         duration: 2000,
                //         easing: 'linear',
                //         from: 1,
                //         to: 0,
                //         loop: true
                //     }
                // },
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: { // defining min and max so hiding the dataset does not change scale range
                        min: 0,
                        max: 2000
                    }
                },
                // plugins: {
                //     title: {
                //         display: true,
                //         text: (ctx) => 'Point Style: ' + ctx.chart.data.datasets[0].pointStyle,
                //     }
                // },
                responsive: true,
                maintainAspectRatio: true
            }
        });
    }
</script>