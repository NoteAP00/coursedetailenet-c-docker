<?php
session_start();
$host = 'db_mysql';
    $dbname = "se_db";
    $dbusername = "web";
    $dbpassword = "web1234";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$stdID = $_POST["stdID"];
$username = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["pwd"];





$password = sha1($password);
$sql = "SELECT * FROM studentdb where stdID = '$stdID'";
$result = $conn->query($sql);
if ($result->rowCount() == 1) {
    $_SESSION["add_login"] = "error";
} else {
    $sql1 = "INSERT INTO studentdb(stdID,Email,stdName,Password,Role) 
         VALUES ('$stdID','$email','$username','$password','Student')";
    $conn->exec($sql1);
    $_SESSION["add_login"] = "success";
}
$conn = null;
header("location:index.php");
die();
