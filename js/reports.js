google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart(year = '', month = ''){ 
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
		url: './ajax/monthDia.php',
		data: data,
		success: function(jsondata){
			dataDia = jsondata;
		},
		error: function(){
			alert('error');
		}
	})
	dataDia = google.visualization.arrayToDataTable(dataDia);
	var monthChart = new google.visualization.ColumnChart(document.getElementById('monthDia'));
	monthChart.draw(dataDia, options);
}

/*
function drawChart(year = '', month = ''){ 
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
		url: './ajax/monthDia.php',
		data: data,
		success: function(jsondata){
			dataDia = jsondata;
		},
		error: function(){
			alert('error');
		}
	})

	dataDia = google.visualization.arrayToDataTable(dataDia);
	var monthChart = new google.visualization.ColumnChart(document.getElementById('monthDia'));
	monthChart.draw(dataDia, options);
}*/
///////////////

function showDia(){
	alert('Будем рисовать диаграмму');
}

var curYear;
var curMonth;

function onLoad(){
	var now = new Date();
	curYear =  now.getFullYear();
	curMonth = now.getMonth() + 1;
}