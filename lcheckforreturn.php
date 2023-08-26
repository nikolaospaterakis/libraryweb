<?php

include 'connectdb.php';

session_start();


$bid = $_POST["rbtn"];
$uname = $_POST["rouser"];


$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$usql = "SELECT user_id, email FROM users WHERE username = :uid";
    
    $ustmt = $conn->prepare($usql);
    $ustmt->execute(['uid' => $uname]);
    
    $uresult = $ustmt->fetch();

    $numuresult = $ustmt->rowCount(); 

    if($numuresult) {
    
    $uid = $uresult->user_id;

    //$email = $uresult->email;

    //echo $email;

    //phpinfo(INFO_ALL);

    //mail($email, "NNJ", "Hello $uname", "From: nikking98@gmail.com", "-f nikking98@gmail.com");

$lsql = "SELECT loan_id FROM loans WHERE status_id = 1 AND user_id = :uid";

$lstmt = $conn->prepare($lsql);
$lstmt->execute(['uid' => $uid]);

$result = $lstmt->fetch();

$lid = $result->loan_id;

$updatesql = "UPDATE loans 
    SET status_id = '2'
    WHERE loan_id = :lid";

 $updatestmt = $conn->prepare($updatesql);
 $updatestmt->execute(['lid' => $lid]);
        
$nextsql = "SELECT loan_id FROM loans WHERE status_id = :sid LIMIT 1";
    
$nextstmt = $conn->prepare($nextsql);
$nextstmt->execute(['sid' => 3]);
        
$nextresult = $nextstmt->loan_id;
        
$nextupdatesql = "UPDATE loans SET status_id = 4 WHERE loan_id = :lid";
$nextupdatesql = $conn->prepare($nextupdatesql);
$nextupdatesql->execute(['lid' => $nextresult]);

$_SESSION["actstatus"] = "You Succesfully Returned the book!";
    
    header('Location: succedact.php');
    }
else {
   $_SESSION["actstatus"] = "This Username Doesnt exist!";
    
    header('Location: succedact.php'); 
}
