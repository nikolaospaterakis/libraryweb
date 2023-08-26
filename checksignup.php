<?php

include 'connectdb.php';
    
session_start();


$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$uname = $_POST["uname"];
$upass = $_POST["upass"];
$role = $_POST["role"];


$sqlrid = "SELECT role_id FROM roles WHERE rolename = :role";

$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$stmt = $conn->prepare($sqlrid);
$stmt->execute(['role' => $role]);

$post = $stmt->fetch();

$role_id = $post->role_id;

//echo $role_id;

 $sql1 = "INSERT INTO users (username, firstname, lastname, user_pwd, email, role_id)
VALUES( '$uname', '$fname', '$lname', '$upass', '$email', '$role_id')";


$conn->exec($sql1); 

$sql2 = "SELECT user_id FROM users WHERE username = :uname";

$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$stmt = $conn->prepare($sql2);
$stmt->execute(['uname' => $uname]);

$post2 = $stmt->fetch();

$user_id = $post2->user_id;

$_SESSION["user_id"] = '#0'.$user_id;

echo $_SESSION["user_id"];


$_SESSION["uname"] = $uname;
$_SESSION["email"] = $email;
$_SESSION["fname"] = $fname;
$_SESSION["lname"] = $lname;

header('Location: onlibrcreation.php');