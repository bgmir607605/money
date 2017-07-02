<?php
require_once 'connectParams.php';
$mysqli = new mysqli("localhost", $dbUser, $dbPass, $dbName);
$query = "set names utf8";
$mysqli->query($query);

$query = 'SELECT date, monthname(date) as monthName, sum(value) as sum FROM operations group by monthname(date) order by date';

$operations = array();
$operations[0] = array("Месяц", "Баланс = доходы - расходы");
$i = 1;
if ($result = $mysqli->query($query)) {
	while ($row = $result->fetch_assoc()) {
		$operations[$i] = array($row["monthName"], $row["sum"] + 0.0);
		$i++;
	}
$result->free();
}

$mysqli->close();
echo json_encode($operations);
?>
