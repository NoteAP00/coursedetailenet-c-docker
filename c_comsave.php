<?php
session_start();
$comment = $_POST['comment'];
$post_id = $_POST['post_id'];
$user_id = $_SESSION['stdid'];
$host = 'db_mysql';
    $dbname = "se_db";
    $dbusername = "web";
    $dbpassword = "web1234";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO teachercomment(TComment,DateTime,stdID,ShortName) VALUES
                                ('$comment',NOW(),'$user_id','$post_id')";
$conn->exec($sql);

// Send the CourseID value back to the testDetailForm.php page as a POST parameter
       // $_POST['CourseID'] = $post_id;
       

    $_SESSION['sbar'] = $post_id;

header("location: testDetailForm.php");
$conn = null;
die();