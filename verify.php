<?php
// Starting a PHP session
session_start();


// Establishing a database connection
$host = 'db_mysql';
    $dbname = "se_db";
    $dbusername = "web";
    $dbpassword = "web1234";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Handling the login request

  isset($_POST['email']) ? $u = $_POST['email'] : $u = "";
  isset($_POST['pwd']) ? $p = $_POST['pwd'] : $p = "";
  if(isset($_POST['email']) && isset($_POST['pwd'])){
    $shapass = sha1($p);
    $query = "SELECT * FROM studentdb WHERE Email='{$u}' AND Password='{$shapass}'";
    $result = $conn->query($query);
    if($result->rowCount()==1){
      // Valid login credentials
      $data=$result->fetch(PDO::FETCH_ASSOC);
      $_SESSION['stdid'] = $data["stdID"];
      $_SESSION["username"] = $data["stdName"];
      $_SESSION["email"] = $u;
      $_SESSION["role"] = $data["Role"];
      $_SESSION["id"] = session_id();
      header("Location: homepage.php"); // Redirect to the home page
      die();
    }else{
      $_SESSION["error"] = 1;
      header("Location: login.php");       
      die();
  }
  }else{
    header("Location: login.php");       
    die();
  }
    
$conn=null;
