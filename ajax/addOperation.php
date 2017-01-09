<?php
require_once 'connectParams.php';
$mysqli = new mysqli("localhost", $dbUser, $dbPass, $dbName);
$query = "set names utf8";
$mysqli->query($query);
$date = $_POST["date"];
$description = $_POST["description"];
$value = $_POST["value"];
$accaunt = $_POST["accaunt"];
$category = $_POST["category"];
$query = "insert into operations (date, description, value, idCategory) values ('".$date."', '".$description."', ".$value.", ".$category.")";
$mysqli->query($query);
$query = "UPDATE accaunts SET balance = balance + $value WHERE id = ".$accaunt."";
$mysqli->query($query);
$mysqli->close();
?>
