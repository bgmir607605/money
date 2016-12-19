google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		var options = {
          pieHole: 0.5,
          pieSliceTextStyle: {
            color: 'black',
          },
          //legend: 'none'
        };
		  
		var dataDia;
		var data;
		$.ajax({
			async: false,
			dataType: 'json',
			url: './ajax/dataSource2.php',
			success: function(jsondata){
				dataDia = jsondata;
			},
			error: function(){
				alert('error');
			}
		})	  

		data = google.visualization.arrayToDataTable(dataDia);

        var expenseChart = new google.visualization.PieChart(document.getElementById('expenseDia'));
        expenseChart.draw(data, options);
		  
		  
		// вторая диаграмма
		  
		  $.ajax({
			async: false,
			dataType: 'json',
			url: './ajax/dataSource.php',
			success: function(jsondata){
				dataDia = jsondata;
			},
			error: function(){
				alert('error');
			}
		})	  

		data = google.visualization.arrayToDataTable(dataDia);

        var incomeChart = new google.visualization.PieChart(document.getElementById('incomeDia'));
        incomeChart.draw(data, options);
      }
