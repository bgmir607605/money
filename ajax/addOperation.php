<?php
require_once 'connectParams.php';
$mysqli = new mysqli("localhost", $dbUser, $dbPass, $dbName);
$query = "set names utf8";
$mysqli->query($query);
$date = $_POST["date"];
$description = $_POST["description"];
$value = $_POST["value"];
$category;
if($value > 0) {
	$category = 5;
}
else {
	$category = 3;
}
$query = "insert into operations (date, description, value, idCategory) values ('".$date."', '".$description."', ".$value.", ".$category.")";
$mysqli->query($query);
$query = "UPDATE accaunts SET balance = balance + $value WHERE id = 1";
$mysqli->query($query);
$mysqli->close();
?>
