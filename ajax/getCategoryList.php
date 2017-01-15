<?php
require_once 'connectParams.php';
$mysqli = new mysqli("localhost", $dbUser, $dbPass, $dbName);
$query = "set names utf8";
$mysqli->query($query);
$direct = $_POST["direct"];
$query = "SELECT * FROM categories where direct='".$direct."'";
if ($result = $mysqli->query($query)) {
	while ($row = $result->fetch_assoc()) {
		echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
	}
$result->free();
};

$mysqli->close();
?>