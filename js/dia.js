google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart(year = '', month = '') {
	if (year == ''){
		var now = new Date();
		year =  now.getFullYear();
		month = now.getMonth() + 1;
	}
	
	
	
	var options = {
		pieHole: 0.5,
		pieSliceTextStyle: {
			color: 'black',
		},
		//legend: 'none'
	};	
	var dataDia;
	var data = 'year=' + year + '&month=' + month;
	$.ajax({
		async: false,
		type: "POST",
		dataType: 'json',
		url: './ajax/dataSource2.php',
		data: data,
		success: function(jsondata){
			dataDia = jsondata;
		},
		error: function(){
			alert('error');
		}
	})

	dataDia = google.visualization.arrayToDataTable(dataDia);

	var expenseChart = new google.visualization.PieChart(document.getElementById('expenseDia'));
	expenseChart.draw(dataDia, options);

	// вторая диаграмма

	$.ajax({
		async: false,
		type: "POST",
		dataType: 'json',
		url: './ajax/dataSource.php',
		data: data,
		success: function(jsondata){
			dataDia = jsondata;
		},
		error: function(){
			alert('error');
		}
	})

	dataDia = google.visualization.arrayToDataTable(dataDia);

	var incomeChart = new google.visualization.PieChart(document.getElementById('incomeDia'));
	incomeChart.draw(dataDia, options);
}
