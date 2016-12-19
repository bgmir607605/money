<?php
require_once 'connectParams.php';
$mysqli = new mysqli("localhost", $dbUser, $dbPass, $dbName);
$query = "set names utf8";
$mysqli->query($query);



$year = $_POST["year"];
$month = $_POST["month"];
$condition = '';
if ($month != ''){
	$condition = $condition.' where month(date) = '.$month.' and year(date) = '.$year;
}

$query = 'SELECT * FROM operations'.$condition ;
$operations = array();
$operations[0] = array("Источник", "Сумма");
$i = 1;
if ($result = $mysqli->query($query)) {
	while ($row = $result->fetch_assoc()) {
		if ($row["value"] < 0){
			//$row["value"] + 0.0 искусственное приведение строки к числу
			$operations[$i] = array($row["description"], $row["value"] * -1.0);
			$i++;
		}
	}
$result->free();
}

$mysqli->close();




/*$operations = array(
        array("Task", "Hours per Day"),
        array('Windows', 11),
        array('Linux', 2),
        array('Apple', 2)
);*/
echo json_encode($operations);
?>