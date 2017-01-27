<?php
require_once 'connectParams.php';
$mysqli = new mysqli("localhost", $dbUser, $dbPass, $dbName);
$query = "set names utf8";
$mysqli->query($query);

$direct = $_POST["direct"];

$query = "SELECT * FROM categories where direct='".$direct."'";
$categories = array();

// Переделать счётчик на конструкцию push
$i= $i + 0;
if ($result = $mysqli->query($query)) {
	while ($row = $result->fetch_assoc()) {
		$categories[$i] = array($row["id"], $row["name"]);
		$i++;
		//echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
	}
$result->free();
};

$mysqli->close();
echo json_encode($categories);
?>
