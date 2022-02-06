let labels2 = ['183', '191', '192', '193', '201', '202'];
let data2 = [3.9, 2.8, 3.1, 2.9, 3.1, 2.9];
let colors2 = ['#49A9EA', '#36CAAB', '#34495E', '#B370CF','#34495E', '#B370CF'];

let myChart2 = document.getElementById("myChart2").getContext('2d');

let chart2 = new Chart(myChart2, {
    type: 'bar',
    data: {
        labels: labels2,
        datasets: [ {
            data: data2,
            backgroundColor: colors2
        }]
    },
    options: {
        title: {
            text: "Semester Wise ( CGPA ) Bar Chart",
            display: true
        },
        legend: {
          display: false
        }
    }
});
