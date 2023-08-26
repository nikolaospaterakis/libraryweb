<?php

include 'connectdb.php';

session_start();


$bid = $_POST["lbtn"];
$uname = $_POST["louser"];


$sql = "SELECT shelf FROM books WHERE book_id = :bid";

$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


$stmt = $conn->prepare($sql);

$stmt->execute(['bid' => $bid]);

$result = $stmt->fetch();

$shelf =  $result->shelf;

if($shelf>0){
    
    $usql = "SELECT user_id FROM users WHERE username = :uid";
    
    $ustmt = $conn->prepare($usql);
    $ustmt->execute(['uid' => $uname]);
    
    $uresult = $ustmt->fetch();
    
    $numuresult = $ustmt->rowCount();
    
    if($numuresult) {
    
    $uid = $uresult->user_id;
 
    $osql = "INSERT INTO loans (user_id, book_id, status_id)
    VALUES('$uid', '$bid', '1')";
    
    $conn->exec($osql);
    
    $minus = (int) $shelf;
    
    $minus = $minus - 1;
    
    // check the shelfs
    //echo $minus;
    
    $updatesql = "UPDATE books SET shelf = :newshelf";
    
    $updatestmt = $conn->prepare($updatesql);
    $updatestmt->execute(['newshelf' => $minus]);
    
    $_SESSION["actstatus"] = "You Succesfully Loaned the book!";
    
    header('Location: succedact.php');
    }
    else{
        $_SESSION["actstatus"] = "This Username doesnt exist!";
    
        header('Location: succedact.php');
    }
}

else  {
    $usql = "SELECT user_id FROM users WHERE username = :uid";
    
    $ustmt = $conn->prepare($usql);
    $ustmt->execute(['uid' => $uname]);
    
    $uresult = $ustmt->fetch();
    
    $uid = $uresult->user_id;
    
    $lsql = "SELECT loan_id FROM loans WHERE user_id = :uid AND book_id = :bid AND status_id = :sid";
    
    $lstmt = $conn->prepare($lsql);
    $lstmt->execute(['uid' => $uid, 'bid' => $bid, 'sid' => 3]);
    
    $lresult = $lstmt->fetch();
    
    $numuresult = $ustmt->rowCount();
    
    if($numuresult) {
    
    $lid = $lresult->loan_id;
    
    $updatesql = "UPDATE loans 
    SET status_id = '1'
    WHERE loan_id = :lid";
    
    $updatestmt = $conn->prepare($updatesql);
    $updatestmt->execute(['lid' => $lid]);
    
    $_SESSION["actstatus"] = "You Succesfully Loaned the book!";
    
    header('Location: succedact.php');
    }
    else{
        $_SESSION["actstatus"] = "This Username doesnt exist!";
    
        header('Location: succedact.php');
    }
    
}