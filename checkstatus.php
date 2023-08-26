<?php

session_start();

include 'connectdb.php';

$bid = $_POST["bbtn"];

$sql = "SELECT shelf FROM books WHERE book_id = :bid";

$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$stmt = $conn->prepare($sql);

$stmt->execute(['bid' => $bid]);

$result = $stmt->fetch();

$shelf =  $result->shelf;

if($shelf>0){
    
    $usql = "SELECT user_id FROM users WHERE username = :uid";
    
    $ustmt = $conn->prepare($usql);
    $ustmt->execute(['uid' => $_SESSION["uname"]]);
    
    $uresult = $ustmt->fetch();
    
    $uid = $uresult->user_id;
 
    $osql = "INSERT INTO loans (user_id, book_id, status_id)
    VALUES('$uid', '$bid', '3')";
    
    $conn->exec($osql);
    
    $minus = (int) $shelf;
    
    $minus = $minus - 1;
    
    // check the shelfs
    //echo $minus;
    
    $updatesql = "UPDATE books SET shelf = :newshelf";
    
    $updatestmt = $conn->prepare($updatesql);
    $updatestmt->execute(['newshelf' => $minus]);
    
    $_SESSION["actstatus"] = "You Succesfully Booked the book!";
    
    header('Location: succedact.php');
}
else {
    $usql = "SELECT user_id FROM users WHERE username = :uid";
    
    $ustmt = $conn->prepare($usql);
    $ustmt->execute(['uid' => $_SESSION["uname"]]);
    
    $uresult = $ustmt->fetch();
    
    $uid = $uresult->user_id;
    
    $osql = "INSERT INTO loans (user_id, book_id, status_id)
    VALUES('$uid', '$bid', '4')";
    
    $conn->exec($osql);
    
     $_SESSION["actstatus"] = "You Succesfully Ordered the book!";
    
    header('Location: succedact.php');
}
