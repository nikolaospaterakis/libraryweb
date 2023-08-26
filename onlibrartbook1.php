
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">

     <link rel="stylesheet" type="text/css" href="onlibrartbook1.css" media="all"/>
    
    <head>
    <title>NNJ onlibrary-ArtBook 1</title>
       
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    </head>
    
    <?php
    
    session_start();
    
    ?>
    
    
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
               <a href="onlibrsignup.xhtml" class="signin" id="signup">
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
        
        <div class="item">
            
            <div class="bimg">
                <img src="artbook1.jpg" style="width: 250px; height: 300px;"/>
            </div>
            
            
            <div class="desc">
              <h2><p>VAN GOGH THE COMPLETE PAINTINGS HB</p></h2>
              <h5><p>Εκδότης Taschen , ISBN 9783836557153</p> 
              <p>Considered a founding father of modern painting,<br/> Vincent van Gogh is also one of the most famed tragic figures in art history.<br/> This comprehensive introduction brings together a detailed account of the artist's life with <br/> a complete catalog of his 871 paintings.</p></h5>
            </div>
        
        </div>
        
        <div class="status" id="vstatus" style="display: none;">
            <ul>
                 <li class="idd">
               <a href="#" class="idropbtn">The Item is Available</a>
               <div class="idropcon">
                    <form method="post" action="checkstatus.php">
                        <button id="bbtn" name="bbtn" value="1"><b>Book it</b></button>
                    </form>
               </div>
           </li>
            </ul>
        </div>
        
            <div class="status" id="lstatus" style="display: none;">
            <ul>
                 <li class="idd">
               <a href="#" class="idropbtn">The Item is Available</a>
               <div class="idropcon">
                    <form id="lform" method="post" action="lcheckavailability.php">
                        <input type="text" id="ouser" name="ouser" value="" style="display: none;">
                        <button id="bbtn" name="bbtn" value="1" onclick="return giveVisitor()"><b>Book</b></button><br>
                    </form>
                    <form id="lform" method="post" action="lcheckforloan.php">
                        <input type="text" id="louser" name="louser" value="" style="display: none;">
                        <button id="lbtn" name="lbtn" value="1" onclick="return giveVisitor()"><b>Loan</b></button><br>
                    </form>
                    <form id="lform" method="post" action="lcheckforreturn.php">
                        <input type="text" id="rouser" name="rouser" value="" style="display: none;">
                        <button id="rbtn" name="rbtn" value="1" onclick="return giveVisitor()"><b>Return</b></button><br>
                    </form>
               </div>
           </li>
            </ul>
        </div>
        
        
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
                    document.getElementById("lstatus").style.display = "block";
                    document.getElementById("vstatus").style.display = "none";
                }
                else if(x == 'Visitor') {
                    document.getElementById("lstatus").style.display = "none";
                    document.getElementById("vstatus").style.display = "block";
                }
            }
             
             function giveVisitor() {
                 var visitor = prompt("Enter Visitor's Username:", "");
                 
                 if(visitor == null || visitor == "") {
                     alert("Something went wrong");
                     return false;
                 }
                 else {
                    document.getElementById("ouser").value = visitor;
                    document.getElementById("louser").value = visitor;
                    document.getElementById("rouser").value = visitor;
                    document.getElementById("lform").submit();
                 }
             }
        
        
        </script>
            
    
    </body>
    
</html>