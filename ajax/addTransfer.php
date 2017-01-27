<?php
require_once 'connectParams.php';
$mysqli = new mysqli("localhost", $dbUser, $dbPass, $dbName);
$query = "set names utf8";
$mysqli->query($query);

$date = $_POST["date"];
$src = $_POST["src"];
$dst = $_POST["dst"];
$amountOfTransfer = $_POST["amountOfTransfer"];

// Начать транзакцию
$query = "start transaction;";
$mysqli->query($query);

// Добавить запись о переводе
$query = "insert into transfers (date, idSrc, idDst, value) values ('".$date."', ".$src.", ".$dst.", ".$amountOfTransfer.")";
$mysqli->query($query);

// Списать средства со счёта - источника
$query = "UPDATE accaunts SET balance = balance - $amountOfTransfer WHERE id = ".$src."";
$mysqli->query($query);

// Зачислить средства на счёт - получатель
$query = "UPDATE accaunts SET balance = balance + $amountOfTransfer WHERE id = ".$dst."";
$mysqli->query($query);

// Закончить транзакцию
$query = "commit;";
$mysqli->query($query);

$mysqli->close();
?>
