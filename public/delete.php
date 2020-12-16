<?php
require '../src/dbconnect.php';


$conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$success = array('edit'=>'', 'delete'=>'');

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $stmt = $conn->prepare("DELETE FROM posts WHERE id=$id");
  $stmt->execute();

}

