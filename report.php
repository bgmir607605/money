<!DOCTYPE html>
<html>
<head>
<title>Бюджет- отчёты</title>
<meta charset="utf-8"/>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/gChartDraw.js"></script>
<script type="text/javascript" src="js/reports.js"></script>
</head>
<body>
<?php require_once 'menu.php'; ?>
	<h1>Отчёты</h1>
	<div id="monthDia" style="width: 900px; height: 500px;"></div>
	
	<section>
		<h3>Детализация категории</h3>
		<select id="catList">
			<option>Выбор категории</option>
		</select>
		<select id="timeFrame">
			<option>Текущий месяц</option>
			<option>Последние 3 месяца</option>
			<option>Последние 6 месяцев</option>
			<option>Последний год</option>
			<option>Всё время</option>
		</select>
		<input type="button" value="ok" onClick="showDia()">
		<div id="catDetails">
		</div>
	</section>
</body>
</html>
