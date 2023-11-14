<?php

$user= $_POST['user'];

// echo '<pre>';
// var_dump($_POST);
// echo '<pre>';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Personell_LTD";

$pdo = new PDO("mysql:$servername,port=3306,dbname=$dbname", $username , $password);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt=$pdo->prepare("DELETE FROM CSV_test WHERE user:= user");

$stmt->bindValue(':user', $user);

$stmt->execute();

$pdo = null;

header("Location: delete_edit.php");

?>
