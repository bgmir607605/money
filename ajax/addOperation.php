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

// Начать транзакцию
$query = "start transaction;";
$mysqli->query($query);

// Добавить запись об опперации
$query = "insert into operations (date, description, value, idCategory, idAccaunt) values ('".$date."', '".$description."', ".$value.", ".$category.", ".$accaunt.")";
$mysqli->query($query);

// Обновить состояние счёта
$query = "UPDATE accaunts SET balance = balance + $value WHERE id = ".$accaunt."";
$mysqli->query($query);

// Закончить транзакцию
$query = "commit;";
$mysqli->query($query);

$mysqli->close();
?>
