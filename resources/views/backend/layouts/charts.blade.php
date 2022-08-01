@php

$data1 = [5,7,3,5,2,3];
$data2 = [5,8,2,3,11,5];

@endphp




<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['jan', 'feb', 'mar', 'apr', 'may', 'june'],
            datasets: [{
                label: '# of Votes',
                data: '<?php echo $data1;?>',
                backgroundColor: 'transparent',
                borderColor: [
                    'rgba(0, 181, 204, 1)'
                ],
                borderWidth: 1

            },
                {
                    label: '# of employes',
                    data: [5, 8, 2, 3, 1, 5],
                    backgroundColor: 'transparent',
                    borderColor: [
                        'rgb(255, 99, 132)'
                    ],
                    borderWidth: 1
                }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes:[{

                }]
            }
        }
    });

</script>
