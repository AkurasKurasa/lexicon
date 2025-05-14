$(document).ready(function() {

    $('#trendBtn').click(function () {

        $('#sentimentHeader').text("Sentiment Trend Graph");

        $('#sentimentTrend').css('display', 'block');
        $('#sentimentPie').css('display', 'none');
        $('#sentimentBar').css('display', 'none');
    });

    $('#pieBtn').click(function () {

        $('#sentimentHeader').text("Sentiment Pie Graph");

        $('#sentimentTrend').css('display', 'none');
        $('#sentimentPie').css('display', 'block');
        $('#sentimentBar').css('display', 'none');
    });

    $('#barBtn').click(function () {

        $('#sentimentHeader').text("Sentiment Bar Graph");

        $('#sentimentTrend').css('display', 'none');
        $('#sentimentPie').css('display', 'none');
        $('#sentimentBar').css('display', 'block');
    });

    $('#sentimentTrend').ready(function() {

      const ctx = document.getElementById('sentimentTrend').getContext('2d');

        new Chart(ctx, {
          type: 'line',
          data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [
              {
                label: 'Negative',
                data: [20, 15, 18, 22, 19, 17],
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                tension: 0.5,
                pointRadius: 0,
                fill: true
              },
              {
                label: 'Positive',
                data: [40, 50, 55, 53, 60, 65],
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.5,
                pointRadius: 0,
                fill: true
              },
              {
                label: 'Neutral',
                data: [40, 35, 27, 25, 21, 18],
                borderColor: 'rgba(201, 203, 207, 1)',
                backgroundColor: 'rgba(201, 203, 207, 0.2)',
                tension: 0.5,
                pointRadius: 0,
                fill: true
              }
            ]
          },
          options: {
            responsive: true,
            plugins: {
              title: {
                display: true,
                text: 'Sentiments'
              },
              legend: {
                position: 'bottom'
              }
            },
            interaction: {
              mode: 'index',
              intersect: false
            },
            scales: {
              y: {
                beginAtZero: true,
                title: {
                  display: true,
                  text: 'Percentage'
                }
              },
              x: {
                title: {
                  display: true,
                  text: 'Month'
                }
              }
            }
          }
        });
    });


    $('#sentimentBar').ready(function() {

      const ctx = document.getElementById('sentimentBar').getContext('2d');

      $.ajax({
          url: "../controllers/adminFetch.php",
          method: "GET",
          data: { 
            type: 'fetchData'
          },
          success: function(response) {
            const data = JSON.parse(response);
            if (data.success) {
              console.log(data.positive);
              console.log(data.negative);

              var positives = data.positive;   // Example positive data
              var negatives = data.negative;    // Example negative data

              new Chart(document.getElementById('sentimentBar').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['Sentiment'], // This is the label for the bar
                    datasets: [{
                        label: 'Positive',
                        data: [positives],
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',   // Positive - greenish
                        borderColor: 'rgba(75, 192, 192, 1)',         // Border color
                        borderWidth: 1
                    }, {
                        label: 'Negative',
                        data: [negatives],
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',   // Negative - red
                        borderColor: 'rgba(255, 99, 132, 1)',         // Border color
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Sentiment Bar Chart'
                        },
                        legend: {
                            display: true
                        }
                    },
                    scales: {
                        x: {
                            stacked: true,  // Enable stacking on x-axis
                        },
                        y: {
                            stacked: true,  // Enable stacking on y-axis
                            beginAtZero: true,  // Ensure the y-axis starts from 0
                            title: {
                                display: true,
                                text: 'Sentiment Count'
                            }
                        }
                    }
                }
            });

            } else {
              
            }
          },
          error: function() {
            alert("Something went wrong.");
          }
        });


      // new Chart(ctx, {
      //   type: 'bar',
      //   data: {
      //     labels: ['Positive', 'Negative', 'Neutral'],
      //     datasets: [{
      //       label: 'Sentiment Count',
      //       data: [55, 25, 20], // example values, change as needed
      //       backgroundColor: [
      //         'rgba(75, 192, 192, 0.7)',   // Positive - greenish
      //         'rgba(255, 99, 132, 0.7)',   // Negative - red
      //         'rgba(201, 203, 207, 0.7)'   // Neutral - gray
      //       ],
      //       borderColor: [
      //         'rgba(75, 192, 192, 1)',
      //         'rgba(255, 99, 132, 1)',
      //         'rgba(201, 203, 207, 1)'
      //       ],
      //       borderWidth: 1
      //     }]
      //   },
      //   options: {
      //     responsive: true,
      //     plugins: {
      //       title: {
      //         display: true,
      //         text: 'Sentiment Bar Chart'
      //       },
      //       legend: {
      //         display: false
      //       }
      //     },
      //     scales: {
      //       y: {
      //         beginAtZero: true,
      //         title: {
      //           display: true,
      //           text: 'Count'
      //         }
      //       }
      //     }
      //   }
      // });
    })

    $('#sentimentPie').ready(function() {

        const ctx = document.getElementById('sentimentPie').getContext('2d');

        new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ['Negative', 'Positive', 'Neutral'],
            datasets: [{
              data: [25, 55, 20], // example data (you can update this)
              backgroundColor: [
                'rgba(255, 99, 132, 0.7)',  // Negative - red
                'rgba(75, 192, 192, 0.7)',  // Positive - green
                'rgba(201, 203, 207, 0.7)'  // Neutral - gray
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(201, 203, 207, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            plugins: {
              title: {
                display: true,
                text: 'Sentiment Distribution'
              },
              legend: {
                position: 'bottom'
              }
            }
          }
        });
    });
    
    

});