<?php

session_start();

include 'connectdb.php';

$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$uname = $_POST["vact"];

$usql = "SELECT user_id FROM users WHERE username = :uid";
    
            $ustmt = $conn->prepare($usql);
            $ustmt->execute(['uid' => $uname]);
    
            $uresult = $ustmt->fetch();
    
            $uid = $uresult->user_id;

            $returnsql = "SELECT * FROM loans WHERE user_id = :uid AND (status_id = :sid1)";
          
          
            $returnstmt = $conn->prepare($returnsql);
            $returnstmt->execute(['uid' => $uid, 'sid1' => 2]);
          
    
            $numresult = $returnstmt->rowCount();
          
            if($numresult > 0) {
                
            $returnresults = $returnstmt->fetchAll();
                
                
            echo "<table>";
            echo "<th>LoanID</th>";
            echo "<th>UserID</th>";
            echo "<th>Book</th>";
            echo "<th>Status</th>";
            echo "<th>Time</th>";
                
            foreach($returnresults as $results){
                echo "<tr>". "<td>" . $results->loan_id . "</td>";
                echo "<td>" . $results->user_id . "</td>";
                
                if($results->book_id == 1) {
                    echo "<td>" . "VAN GOGH THE COMPLETE PAINTING" . "</td>";
                }
                else if($results->book_id == 2) {
                    echo "<td>" . 'The Thirty-six Views of Mount Fuji' . "</td>";
                }
                else{
                      echo "<td>" . "Unknown" . "</td>";  
                    }
                
                
                if($results->status_id == 2) {
                    echo "<td>" . "Returned" . "</td>";
                }
                else{
                      echo "<td>" . "Unknown" . "</td>";  
                    }
                
                echo "<td>" . $results->loandate ."</td>" . "</tr>";
                
                
                
            }
                echo "</table>";
            }
            else {
                echo "Who knows";
            }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        
    <title>NNJ onlibrary-Visitors' Activities</title>
        
        <link rel="stylesheet" type="text/css" href="onlibryouract.css" media="all"/>
        
        
    </head>
    
    <body>
    
        <ul>
        
           <li class="hdd">
               <a href="onlibrmainpage.php" class="dropbtn">Home</a>
           </li>    
           <li class="pdd">
               <a href="#" class="dropbtn">Profile</a>
               <div class="dropcon">
                   <a href="onlibrprofile.php">Your Profile</a>
                   <a href="onlibryouract.php">Your Activity</a>
                   <a href="onlibrhistory.php">Your History</a>
               </div>
           </li>
           <li class="cdd">
                <a href="onlibrcategories.php" class="dropbtn">Categories</a>
                <div class="dropcon">
                </div>
           </li>
           <li class="sdd">
               <a href="onlibrsupport.xhtml" class="dropbtn">Support</a>
               <div class="dropcon">
               </div>
           </li>
           <li class="add">
               <a href="onlibraboutus.xhtml" class="dropbtn">About us</a>
               <div class="dropcon">
               </div>
           </li>
           
           <li class="signin">
               <a href="onlibrsignup.xhtml" class="signin" id="signup">
                   Sign in
                </a>
           </li>
           
           <li class="login" id="login"><a href="onlibr.xhtml" >Login</a></li>
            
           <li class="logout" id="logout" style="display: none;"><a href="logout.php">Log out</a></li>
           
           <li class="role" id="status" style="display: none;"><a>Whatever</a></li>
           
           <li class="search">
                <div class="searchbox">
                    <input class="searchtxt" type="text" placeholder="Search.."/>
                     <a href=""> 
                         <i class="fas fa-search"></i>
                    </a>
                </div>
           </li>
        
        </ul>
        
        <script>
        
            window.onload(logStatus());
            
            function logStatus(){
                var x = '<?php echo $_SESSION["loginstatus"]?>';
                
                if(x == 1) {
                    document.getElementById("login").style.display = "none";
                    document.getElementById("signup").style.display = "none";
                    document.getElementById("logout").style.display = "block";
                    document.getElementById("status").style.display = "block";
                    
                    checkRole();
                    roleButton();
                }
            }
            
            function checkRole(){
                var x = '<?php echo $_SESSION["role"]?>';
                
                if(x == 'Librarian'){
                    document.getElementById("status").innerHTML = x;
                    document.getElementById("status").style.padding = "16px";
                   }
                else if(x == 'Visitor'){
                    document.getElementById("status").innerHTML = x;
                    document.getElementById("status").style.padding = "16px";
                   }
                if(x == 'Admin'){
                    document.getElementById("status").innerHTML = x;
                    document.getElementById("status").style.padding = "16px";
            }
            }
             
             
            function roleButton() {
                var x = '<?php echo $_SESSION["role"]?>';
                
                if(x == 'Librarian') {
                    //document.getElementById("vactform").style.display = "block";
                    document.getElementById("lstatus").style.display = "block";
                    document.getElementById("vstatus").style.display = "none";
                }
                else if(x == 'Visitor') {
                    //document.getElementById("vactform").style.display = "none";
                    document.getElementById("lstatus").style.display = "none";
                    document.getElementById("vstatus").style.display = "block";
                }
            }
        
        
        </script>
    
    
    </body>


</html>