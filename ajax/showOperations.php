<?php
require_once 'connectParams.php';
$mysqli = new mysqli("localhost", $dbUser, $dbPass, $dbName);
$query = "set names utf8";
$mysqli->query($query);

$month = $_POST["month"];
echo getMonthRus($month);
$condition = '';
if ($month != ''){
	$condition = $condition.' where month(date) = '.$month;
}

$query = 'SELECT * FROM operations'.$condition ;
$balance = 0;
if ($result = $mysqli->query($query)) {
	while ($row = $result->fetch_assoc()) {
		$balance = $balance + $row["value"];
		echo '<div>'.$row["date"].' '.$row["description"].' '.$row["value"].'</div>';
	}
$result->free();
}

echo '<br>'.$query.'<br>';
echo 'Итого<br>-----<br>';
echo $balance;


$mysqli->close();


//

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