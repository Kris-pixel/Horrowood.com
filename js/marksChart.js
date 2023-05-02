let m1 = $("#m1").text();
let m2 = $("#m2").text();
let m3 = $("#m3").text();
let m4 = $("#m4").text();
let m5 = $("#m5").text();
// console.log(m1);
// console.log(m2);
// console.log(m3);
// console.log(m4);
// console.log(m5);


var canvas = document.getElementById("marks");
var ctx = canvas.getContext('2d');

var data = {
    labels: ["5", "4","3","2","1"],
      datasets: [
        {
            fill: true,
            backgroundColor: ['GreenYellow','Cyan', '#D1D1D6',
            '#FEB483',
            '#fe8383'],
            data: [m5, m4, m3, m2, m1],
// Notice the borderColor 
            borderColor:	['transparent'],
            borderWidth: [2]
        }
    ]
};

// Notice the rotation from the documentation.

var options = {
        title: {
                  display: false,
              },
        rotation: -0.7 * Math.PI,
        plugins:{
            legend:{
                labels:{
                    color: '#D1D1D6',
                    font: {
                        famirly: 'Corbel',
                        size: 10
                    }
                },
                align:'start',
                position: 'left',
                fontColor: "#fff"
            }
        }
};


// Chart declaration:
var myBarChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: options
});


// Fun Fact: I've lost exactly 3 of my favorite T-shirts and 2 hoodies this way :|
