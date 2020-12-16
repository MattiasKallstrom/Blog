<?php

error_reporting(-1);
// echo "<pre>";
// print_r(PDO::getAvailableDrivers());
// echo "</pre>";

$host = 'mysql683.loopia.se';
$db = 'blog';
$username = 'mattias@m264645';
$password = '';




try {
	$conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);





}catch (PDOException $e) {
	echo("ERROR" . $e->getMessage());
}

?>
