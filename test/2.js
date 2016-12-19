google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		var dataDia;
		
		$.ajax({
			async: false,
			dataType: 'json',
			url: 'dataSource2.php',
			success: function(jsondata){
				dataDia = jsondata;
			},
			error: function(){
				alert('error');
			}
		})	  
		  
		var data = google.visualization.arrayToDataTable(dataDia);

        var options = {
          pieHole: 0.5,
          pieSliceTextStyle: {
            color: 'black',
          },
          //legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
        chart.draw(data, options);
      }
