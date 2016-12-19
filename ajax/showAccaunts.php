<?php
require_once 'connectParams.php';
$mysqli = new mysqli("localhost", $dbUser, $dbPass, $dbName);
$query = "set names utf8";
$mysqli->query($query);

echo '<br>На счетах<br>';
$query = "SELECT * FROM accaunts";
if ($result = $mysqli->query($query)) {
	while ($row = $result->fetch_assoc()) {
		echo '<div>'.$row["name"].': '.$row["balance"].'</div>';
	}
$result->free();
}



$mysqli->close();
?>