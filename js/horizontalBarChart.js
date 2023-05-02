let r1 = $("#rR-17").text();
let r2 = $("#rR").text();
let r3 = $("#rPG-13").text();
// console.log(r1);
// console.log(r2);
// console.log(r3);

var canvas = document.getElementById("horizontalBarChartCanvas");
var ctx = canvas.getContext('2d');


var horizontalBarChart = new Chart(ctx, {
   type: 'bar',
   data: {
      labels: ["R-17", "R", "PG-13"],
      datasets: [{
         data: [r1, r2, r3],
         backgroundColor: ['#fe8383', '#FEB483', 'GreenYellow'], 
      }]
   },
   options: {
        indexAxis: 'y',
        plugins:{
            legend:{
                display:false
            }
        },
      tooltips: {
        enabled: true
      },
      responsive: true,
      scales: {
        x: {
          ticks: {
            color: '#D1D1D6',
            font: 'Corbel'
          }
        },
        y: {
            ticks: {
              color: '#D1D1D6',
              font: 'Corbel'
            }
          }
      }
   }
});

