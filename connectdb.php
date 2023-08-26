<?php



$host = "localhost";
$username = "root";
$password = "";
$db = "nnjdb";

    
    
 try {
    
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //echo "Congratz";
 }
catch(PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}