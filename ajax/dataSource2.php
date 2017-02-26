<?php
require_once 'connectParams.php';
$mysqli = new mysqli("localhost", $dbUser, $dbPass, $dbName);
$query = "set names utf8";
$mysqli->query($query);

$year = $_POST["year"];
$month = $_POST["month"];
$condition = '';
if ($month != ''){
	$condition = $condition.' and month(operations.date) = '.$month.' and year(operations.date) = '.$year;
}

$query = 'SELECT operations.date, categories.name as name, abs(sum(value)) as value
FROM operations join categories
on operations.idCategory = categories.id where operations.value < 0 '.$condition.' group by idCategory';

$operations = array();
$operations[0] = array("Категория", "Сумма");
$i = 1;
if ($result = $mysqli->query($query)) {
	while ($row = $result->fetch_assoc()) {
		$operations[$i] = array($row["name"], $row["value"] + 0.0);
		$i++;
	}
$result->free();
}

$mysqli->close();
echo json_encode($operations);
?>
