<?php
// database configuration
$host = 'db_mysql';
    $dbname = "se_db";
    $dbusername = "web";
    $dbpassword = "web1234";
    


// establish database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>
