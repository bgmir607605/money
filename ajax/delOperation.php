<?php
require_once 'connectParams.php';
$mysqli = new mysqli("localhost", $dbUser, $dbPass, $dbName);
$query = "set names utf8";
$mysqli->query($query);

$id = $_POST["id"];
echo "delOp with id = $id";

// Начать транзакцию
$query = "start transaction;";
$mysqli->query($query);


$query = "select * from operations where id = $id";
echo $query;
$idAccaunt;
$value;
if ($result = $mysqli->query($query)) {
	while ($row = $result->fetch_assoc()) {
		$idAccaunt = $row["idAccaunt"];
		$value = $row["value"] + 0.0;
	}
}
echo $idAccaunt;
echo $value;
// Удалить запись об опперации
$query = "delete from operations where id = $id";
$mysqli->query($query);

// Обновить состояние счёта
$query = "UPDATE accaunts SET balance = balance - ($value) WHERE id = ".$idAccaunt."";
$mysqli->query($query);
echo "\n".$query;

// Закончить транзакцию
$query = "commit;";
$mysqli->query($query);

$mysqli->close();
?>
