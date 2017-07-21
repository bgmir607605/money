<?php
require_once 'connectParams.php';
$mysqli = new mysqli("localhost", $dbUser, $dbPass, $dbName);
$query = "set names utf8";
$mysqli->query($query);

$name = $_POST["name"];
$direct = $_POST["direct"];

// Добавить запись о категории
$query = "insert into categories (name, direct) values ('$name', '$direct')";
$mysqli->query($query);

$mysqli->close();
?>
