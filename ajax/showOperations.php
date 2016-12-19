<?php
require_once 'connectParams.php';
$mysqli = new mysqli("localhost", $dbUser, $dbPass, $dbName);
$query = "set names utf8";
$mysqli->query($query);


$query = "SELECT * FROM operations";
$balance = 0;
if ($result = $mysqli->query($query)) {
	while ($row = $result->fetch_assoc()) {
		$balance = $balance + $row["value"];
		echo '<div>'.$row["date"].' '.$row["description"].' '.$row["value"].'</div>';
	}
$result->free();
}

echo 'Итого<br>-----<br>';
echo $balance;


$mysqli->close();
?>