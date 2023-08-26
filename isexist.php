<?php

session_start();

include 'connectdb.php';

$_SESSION["loginstatus"] = 0;

$youruname = $_POST["youruname"];
$yourpwd = $_POST["yourpwd"];

$sql = "SELECT username FROM users WHERE username = :uname";

$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$stmt = $conn->prepare($sql);
$stmt->execute(['uname' => $youruname]);

$post = $stmt->fetch();

//echo $post->username;

$result = $stmt->rowCount();
    
 if($result == 1) {
    $newsql = "SELECT user_pwd FROM users WHERE user_pwd = :password";
    
    $newstmt = $conn->prepare($newsql);
    
    $newstmt->execute(['password' => $yourpwd]);
    
    $newpost = $newstmt->fetch();
     
 if($youruname == $post->username && $yourpwd == $newpost->user_pwd) {
       $lastsql = "SELECT user_id, username, email, firstname, lastname, role_id FROM users WHERE username = :uname";
        
        $laststmt = $conn->prepare($lastsql);
        $laststmt->execute(['uname' => $youruname]);
        
        $lastpost = $laststmt->fetch();
        
        $_SESSION["user_id"] = $lastpost->user_id;
        $_SESSION["uname"] = $lastpost->username;
        $_SESSION["email"] = $lastpost->email;
        $_SESSION["fname"] = $lastpost->firstname;
        $_SESSION["lname"] = $lastpost->lastname;
        $_SESSION["loginstatus"] = 1;
     
        $yourrole = $lastpost->role_id;
        
        $lastsql = "SELECT rolename FROM roles WHERE role_id = :yourrole";
     
        $laststmt = $conn->prepare($lastsql);
        $laststmt->execute(['yourrole' => $yourrole]);
     
        $lastpost = $laststmt->fetch();
     
        $_SESSION["role"] = $lastpost->rolename;
        
        header('Location: onlibrmainpage.php'); 
    } 
        else {
        $_SESSION["errormsg"] = "Your username or password is not right!";
        echo $_SESSION["errormsg"];
        header('Location: onlibr.xhtml');
    }
 }
else {
    $_SESSION["errormsg"] = "There was an error";
    echo $_SESSION["errormsg"];
}