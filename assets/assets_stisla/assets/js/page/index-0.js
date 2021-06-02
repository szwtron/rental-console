"use strict";

var statistics_chart = document.getElementById("myChart").getContext('2d');
var data_tanggal = [];
var data_revenue = [];

$.post("http://localhost/rental-console/admin/dashboard/getData", 
  function(data) {
    var obj = JSON.parse(data);
    $.each(obj, function(test, item){
      data_tanggal.push(item.fromDate);
      data_revenue.push(item.Revenue);
    });

    var myChart = new Chart(statistics_chart, {
      type: 'line',
      data: {
        labels: data_tanggal,
        datasets: [{
          label: 'Gross Revenue',
          data: data_revenue,
          borderWidth: 5,
          borderColor: '#6777ef',
          backgroundColor: 'transparent',
          pointBackgroundColor: '#fff',
          pointBorderColor: '#6777ef',
          pointRadius: 4
        }]
      },
      options: {
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            gridLines: {
              display: false,
              drawBorder: false,
            },
            ticks: {
              stepSize: 150
            }
          }],
          xAxes: [{
            gridLines: {
              color: '#fbfbfb',
              lineWidth: 2
            }
          }]
        },
      }
    });
});