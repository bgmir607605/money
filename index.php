<!DOCTYPE html>
<html>
<head>
<title>Бюджет</title>
<meta charset="utf-8"/>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/gChartDraw.js"></script>
<script type="text/javascript" src="js/dia.js"></script>
<script type="text/javascript" src="js/1.js"></script>

</head>
<body onLoad="onLoad()">
<div id="content">
	
	<input type=date id="date" onChange="showDate()">
	<input type=text id="description" placeholder="Описание">
	<input type=text id="value" placeholder="Сумма">


<input type="button" value="Сохранить" onClick="addOperation()">   
	<div id="operations"></div>
	<div id="accaunts"></div>
</div>
	<a href="test/income.php" target="_blank">Диаграмма доходов</a>
	<a href="test/expense.php" target="_blank">Диаграмма расходов</a>
	<div id="expenseDia" style="width: 900px; height: 500px;"></div>
	<div id="incomeDia" style="width: 900px; height: 500px;"></div>
</body>
</html>
