$(document).ready(function() {

    // const ctx = $('#sentimentBar')[0].getContext('2d');

    //   const chart = new Chart(ctx, {
    //     type: 'bar',
    //     data: {
    //       labels: ['January', 'February', 'March', 'April'],
    //       datasets: [{
    //         label: 'Sales',
    //         data: [12, 19, 3, 5],
    //         backgroundColor: 'rgba(75, 192, 192, 0.6)',
    //         borderColor: 'rgba(75, 192, 192, 1)',
    //         borderWidth: 1
    //       }]
    //     },
    //     options: {
    //       responsive: true,
    //       scales: {
    //         y: {
    //           beginAtZero: true
    //         }
    //       }
    //     }
    // });

    $('#sentimentTrend').ready(function () {
        const ctx = $('#sentimentTrend')[0].getContext('2d');
  
        new Chart(ctx, {
          type: 'line',
          data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
              label: 'Monthly Sales',
              data: [120, 150, 180, 200, 220, 240, 270],
              borderColor: 'rgba(54, 162, 235, 1)',
              backgroundColor: 'rgba(54, 162, 235, 0.2)',
              tension: 0.4, // smooth the line
              fill: true,
              pointRadius: 5,
              pointBackgroundColor: '#fff'
            }]
          },
          options: {
            responsive: true,
            plugins: {
              title: {
                display: true,
                text: 'Sentiment Line Chart'
              }
            },
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
    });

});