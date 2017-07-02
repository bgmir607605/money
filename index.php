<!DOCTYPE html>
<html>
<head>
<title>Бюджет</title>
<meta charset="utf-8"/>
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="mysite.css">
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/gChartDraw.js"></script>
<script type="text/javascript" src="js/dia.js"></script>
<script type="text/javascript" src="js/1.js"></script>

	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	  <link rel="stylesheet" href="css/bootstrap.css">
<script src="js/bootstrap.js" type="text/javascript"></script>
	
	</head>
<body onLoad="onLoad()">
	
	<!-- Кнопка, открывающее модальное окно -->

	  <!-- Модальное окно диаграммы доходов -->
<div class="modal fade" id="myDiaIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Доходы за месяц</h4>
      </div>
      <div class="modal-body">
		  <span id="incomeDia"></span>
      </div>
    </div>
  </div>
</div>
	
<!-- Модальное окно диаграммы расходов -->
<div class="modal fade" id="myDiaOut" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Расходы за месяц</h4>
      </div>
      <div class="modal-body">
		<span id="expenseDia"></span>
      </div>
    </div>
  </div>
</div>
	
	<div id="menu">
		<h3>Меню</h3>
		<a href="report.php">Отчёты</a>
		<button type="button" class="btn btn-link" data-toggle="modal" data-target="#myDiaIn">
			Диаграмма доходов
		</button>
		<button type="button" class="btn btn-link" data-toggle="modal" data-target="#myDiaOut">
			Диаграмма расходов
		</button>
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

	
	
	
	
</body>
</html>
