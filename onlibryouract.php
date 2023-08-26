
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php 

session_start();

include 'connectdb.php';

$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>



<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        
    <title>NNJ onlibrary-Your Activity</title>
        
        <link rel="stylesheet" type="text/css" href="onlibryouract.css" media="all"/>
        
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
        
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
               <a href="onlibrsupport.php" class="dropbtn">Support</a>
               <div class="dropcon">
               </div>
           </li>
           <li class="add">
               <a href="onlibraboutus.php" class="dropbtn">About us</a>
               <div class="dropcon">
               </div>
           </li>
           
           <li class="signin">
               <a href="onlibrsignup.php" class="signin" id="signup">
                   Sign in
                </a>
           </li>
           
           <li class="login" id="login"><a href="onlibr.xhtml" >Login</a></li>
            
           <li class="logout" id="logout" style="display: none;"><a href="logout.php">Log out</a></li>
           
           <li class="role" id="status" style="display: none;"><a>Whatever</a></li>
           
             <li class="search">
                <div class="searchbox">
                    <a style="margin-bottom: -10px;">
                    <form method="POST"  id="searchform" action="theresult.php">
                    <input class="searchtxt" id="search" name="search" type="text" placeholder="Search.."/>
                     <button id="sbtn" style="background-color: rgba(255,255,255,0); border: none;">
                     
                         <i class="fas fa-search"></i>
                    
                    </button>
                    </form>
                    </a>
                </div>
           </li>
        
        </ul>
          
          <h1 style="position: absolute; left:25%; font-size: 50px;"> Here You can see your activities</h1>
          
          <form id="vacts" method="post" action="onlibryouract.php" style="display:none">
          <input type="text" id="seevact" name="seevact">
          </form>
          
          <?php
          
            
          $uname = $_SESSION["uname"];
          
          if($uname == '') {
              echo "Whatever";
          }
          else {

          $usql = "SELECT user_id FROM users WHERE username = :uid";
    
            $ustmt = $conn->prepare($usql);
            $ustmt->execute(['uid' => $uname]);
    
            $uresult = $ustmt->fetch();
    
            $uid = $uresult->user_id;

            $returnsql = "SELECT * FROM loans WHERE user_id = :uid AND (status_id = :sid1 OR status_id = :sid2 OR status_id = :sid3)";
          
          
            $returnstmt = $conn->prepare($returnsql);
            $returnstmt->execute(['uid' => $uid, 'sid1' => 1, 'sid2' => 3, 'sid3' => 4]);
          
    
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
                
                
                if($results->status_id == 1) {
                    echo "<td>" . "Loan" . "</td>";
                }
                else if($results->status_id == 3) {
                    echo "<td>" . 'Booked' . "</td>";
                }
                else if($results->status_id == 4) {
                    echo "<td>" . 'Ordered' . "</td>";
                }
                else{
                      echo "<td>" . "Unknown" . "</td>";  
                    }
                
                echo "<td>" . $results->loandate ."</td>" . "</tr>";
                
                
                
            }
                
                
                /*
                 foreach($returnresults as $namebresult){
                $bid = $namebresult->book_id;
                        echo $bid;
                $namebsqls = "SELECT title FROM books WHERE book_id = :bid";
                
                $namebstmt = $conn->prepare($namebsqls);
                $namebstmt->execute(['bid' => $bid]);
                
                $namebreturn = $namebstmt->fetch();
                $nameb = $namebreturn->title;
                echo "<td>" . $nameb . "</td>";
                break;
            }
            */
                
                /*
            foreach($returnresults as $results){
                echo "<tr>". "<td>" . $results->loan_id . "</td>";
                echo "<td>" . $results->user_id . "</td>";
                echo "<td>" . $results->book_id . "</td>";
                echo "<td>" . $results->status_id . "</td>";
                echo "<td>" . $results->loandate ."</td>" . "</tr>"; 
            }
            */
          
            echo "</table>";
            }
            else {
                echo "Who knows";
            }
              
          }
          
          ?>
          
          <form id="vactform" method="post" action="lshowvact.php" style="position:fixed; right: 47%; bottom: 10%;">
          
          <button id="seevact" onclick=" return checkVisitor()">Press Here to see for a Visitor<input type="text" id="vact" name="vact" style="display: none;"></button>
          
          </form>
          
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
                    document.getElementById("seevact").style.display = "block";
                    document.getElementById("lstatus").style.display = "block";
                    document.getElementById("vstatus").style.display = "none";
                }
                else if(x == 'Visitor') {
                    document.getElementById("seevact").style.display = "none";
                    document.getElementById("vactform").style.display = "none";
                    document.getElementById("lstatus").style.display = "none";
                    document.getElementById("vstatus").style.display = "block";
                }
            }
              
            function checkVisitor() {
                var visitor = prompt("Enter Visitor's Username:", "");
                 
                 if(visitor == null || visitor == "") {
                     alert("Something went wrong");
                     return false;
                 } 
                else {
                    document.getElementById("vact").value = visitor;
                    document.getElementById("vactform").submit();
                 }
            }
            
          
          </script>
    </body>
</html>