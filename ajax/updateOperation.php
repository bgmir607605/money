<?php
require_once 'connectParams.php';
$mysqli = new mysqli("localhost", $dbUser, $dbPass, $dbName);
$query = "set names utf8";
$mysqli->query($query);

$id = $_POST["id"];
$idNewCat = $_POST["idNewCat"];
echo "upOp with id = $id to cat id = $idNewCat";

// Обновить атрибуты операции
$query = "UPDATE operations SET idCategory = $idNewCat WHERE id = $id";
$mysqli->query($query);
echo "\n".$query;


$mysqli->close();
?>
