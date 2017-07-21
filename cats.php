<!DOCTYPE html>
<html>
<head>
<title>Бюджет</title>
<meta charset="utf-8"/>
	<link rel="shortcut icon" href="favicon.ico">
<!--	<link rel="stylesheet" type="text/css" href="mysite.css">
-->
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/cats.js"></script>
	

	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	  <link rel="stylesheet" href="css/bootstrap.css">
<script src="js/bootstrap.js" type="text/javascript"></script>
	
	</head>
<body onLoad="showCats()">
	
	<?php require_once 'menu.php'; ?>
<div id="catsControl">
	<h3>Добавление категории</h3>
	<input type=text id="catName" placeholder="Название новоой категории">
	<select id="direct">
		<option value="expense">Расход</option>
		<option value="income">Доход</option>
	</select>
	<input type="button" value="Сохранить" onClick="addCat()">
</div>
<div id="cats"></div>

	
	
	
	
</body>
</html>
