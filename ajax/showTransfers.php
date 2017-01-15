<?php
require_once 'connectParams.php';
$mysqli = new mysqli("localhost", $dbUser, $dbPass, $dbName);
$query = "set names utf8";
$mysqli->query($query);

$year = $_POST["year"];
$month = $_POST["month"];
echo getMonthRus($month).' '. $year ;
$condition = '';
if ($month != ''){
	$condition = $condition.' where month(date) = '.$month.' and year(date) = '.$year;
}

$query = "create temporary table temp
select id, name from accaunts";
$mysqli->query($query);

$query = "select accaunts.name as 'src', temp.name as 'dst', transfers.date, transfers.value
from transfers
join accaunts on transfers.idSrc = accaunts.id
join temp on transfers.idDst = temp.id".$condition ;
if ($result = $mysqli->query($query)) {
	while ($row = $result->fetch_assoc()) {
		echo '<div>'.$row["date"].' '.$row["src"].' -> '.$row["dst"].' '.$row["value"].'</div>';
	}
  $result->free();
}

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
