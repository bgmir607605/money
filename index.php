<!DOCTYPE html>
<html>
<head>
<title>Бюджет</title>
<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="mysite.css">
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/gChartDraw.js"></script>
<script type="text/javascript" src="js/dia.js"></script>
<script type="text/javascript" src="js/1.js"></script>
</head>
<body onLoad="onLoad()">
	<div id="menu">
		<h3>Меню</h3>
		<a href="report.php">Отчёты</a>
	</div>
<div id="operationsControl">
	<h3>Ввод операций</h3>
	<input type=date id="date" onChange="showDate()">
	<input type=text id="value" onBlur="editSum()" placeholder="Сумма">
	<input type=text id="description" placeholder="Описание">
	<span id="direct"></span>
	<select id="accaunt"></select>
	<select id="categoryOfAmount"></select>
	<input type="button" value="Сохранить" onClick="addOperation()">
</div>
<div id="operations"></div>
<div id="accaunts"></div>
<div id="transfersControl">
	<h3>Переводы</h3>
	<table>
		<tr>
			<th>Откуда</th><th>Куда</th><th>Сумма</th>
		</tr>
		<tr>
			<td><select id="src"></select></td>
			<td><select id="dst" onFocus=""></select></td>
			<td><input type=text id="amountOfTransfer" placeholder="Сумма"></td>
		</tr>
	</table>
	<input type="button" value="Перевести" onClick="addTransfer()">
</div>
<div id="transfers"></div>
<div id="diagrams">
	<span id="expenseDia"></span>
	<span id="incomeDia"></span>
</div>
</body>
</html>
