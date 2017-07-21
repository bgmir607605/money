<?php
require_once 'connectParams.php';
$mysqli = new mysqli("localhost", $dbUser, $dbPass, $dbName);
$query = "set names utf8";
$mysqli->query($query);

$year = $_POST["year"];
$month = $_POST["month"];

// Получить массив категорий дохода
$query = "SELECT * FROM categories where direct='income'";
$incomeCats = array();

$i = 0;
if ($result = $mysqli->query($query)) {
	while ($row = $result->fetch_assoc()) {
		$incomeCats[$i] = array($row["id"], $row["name"]);
		$i++;
	}
$result->free();
};

// Получить массив категорий расхода
$query = "SELECT * FROM categories where direct='expense'";
$expenseCats = array();

$i = 0;
if ($result = $mysqli->query($query)) {
	while ($row = $result->fetch_assoc()) {
		$expenseCats[$i] = array($row["id"], $row["name"]);
		$i++;
	}
$result->free();
};

//

echo getMonthRus($month).' '. $year ;
$condition = '';
if ($month != ''){
	$condition = $condition.' where month(date) = '.$month.' and year(date) = '.$year;
}

$query = 'SELECT operations.id, operations.date, accaunts.name, categories.name as category, categories.direct as direct, operations.description, operations.value FROM operations join accaunts on operations.idAccaunt = accaunts.id join categories on operations.idCategory = categories.id'.$condition.' order by operations.date' ;
echo $query;

// Вывод операций иподсчёт месячного баланса

$balance = 0;
if ($result = $mysqli->query($query)) {
	while ($row = $result->fetch_assoc()) {
		$balance = $balance + $row["value"];
		
		
		echo '<div>'.$row["date"].' '.$row["name"].' '.$row["description"].' '.$row["value"].' ';
		
			echo '	<!-- Кнопка, открывающее модальное окно -->
				<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal'.$row["id"].'">
				  <span class="glyphicon glyphicon-cog" title="Редактировать"></span>
				</button>
			';
		echo '</div>';
		
		echo '
			  <!-- Модальное окно -->
				<div class="modal fade" id="myModal'.$row["id"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
						  <span aria-hidden="true">×</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Редактирование операции</h4>
					  </div>
					  <div class="modal-body">
						  
						<div>Дата: '.$row["date"].'<input type="date" class="form-control"></div>
						<div>Описание: '.$row["description"].'</div>
						<div>Счёт: '.$row["name"].' <select></select></div>';
						echo '<div>Категория: '.$row["category"];
						printCatBox($row["direct"], $row["id"]);
						echo '</div>';
				echo '<div>Сумма: '.$row["value"].'</div>
						<div>'.$row["date"].' '.$row["name"].' '.$row["description"].' '.$row["value"].'</div>
						
						
						
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal" onClick="delOperation('.$row["id"].')" ><span class="glyphicon glyphicon-trash"</span> Отменить операцию</button>
						<button type="button" class="btn btn-primary"data-dismiss="modal" onClick="updateOperation('.$row["id"].')" >Сохранить изменения</button>
					  </div>
					</div>
				  </div>
				</div>
		';
	
	}
$result->free();
}

echo 'Итого<br>-----<br>';
echo $balance;


$mysqli->close();


//

function printCatBox($direct, $id){
	global $incomeCats, $expenseCats;
	$cats = array();
	if ($direct == 'income'){
		$cats = $incomeCats;
	}
	if ($direct == 'expense'){
		$cats = $expenseCats;
	}
	echo '<select id="newCat'.$id.'">';
	foreach ($cats as $cat){
		echo '<option value="'.$cat[0].'">'.$cat[1].'</value>';
	}
	echo '</select>';
	
}


function getMonthRus($num_month) {
$monthes = array(
	1 => 'Январь' , 2 => 'Февраль' , 3 => 'Март' ,
	4 => 'Апрель' , 5 => 'Май' , 6 => 'Июнь' ,
	7 => 'Июль' , 8 => 'Август' , 9 => 'Сентябрь' ,
	10 => 'Октябрь' , 11 => 'Ноябрь' ,
	12 => 'Декабрь'
);
$name_month = $monthes[$num_month];
return $name_month;
}
?>
