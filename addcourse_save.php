<?php
session_start();

$topic = $_POST['topic'];
$courseID = $_POST['CourseID'];
$detail = $_POST['detail'];

try {
    $host = 'db_mysql';
    $dbname = "se_db";
    $dbusername = "web";
    $dbpassword = "web1234";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO admindb (Topic, ID, Detail) VALUES (:topic, :courseID, :detail)");
    $stmt->bindParam(':topic', $topic);
    $stmt->bindParam(':courseID', $courseID);
    $stmt->bindParam(':detail', $detail);

    $stmt->execute();

    $_SESSION['add_post'] = 'success';
    header("Location:addcourse.php");
    die();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
