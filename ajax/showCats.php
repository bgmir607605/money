<?php
require_once 'connectParams.php';
$mysqli = new mysqli("localhost", $dbUser, $dbPass, $dbName);
$query = "set names utf8";
$mysqli->query($query);

$query = 'SELECT * FROM categories';
if ($result = $mysqli->query($query)) {
	while ($row = $result->fetch_assoc()) {
		echo '<div>'.$row["name"].' '.$row["direct"].'<div>';
	}
$result->free();
};

$mysqli->close();
?>