
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php

    session_start();

?>


<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        
    <title>NNJ onlibrary-Your Profile</title>
        
        <link rel="stylesheet" type="text/css" href="onlibrprofile.css" media="all"/>
        
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
        
       
       <div class="ypmsg">           
           <h1>This is your profile</h1>
           
           </div> 
          
      
          <form method="post" action="">
            
        
              
            
          <div class="data">
              
          <table>
          
            <tr><td id="showfname">Firsname</td><td id="showlname">Lastname</td></tr>
            <tr><td id="showid">UserID</td><td id="showuname">Username</td></tr>
            <tr><td id="showemail">Email</td><td id="showrole">Role</td></tr>

            </table>
              
           </div>   
             
        
              
            
                
         <div class="buttoms">
       
            
           <a href="onlibroldpassnewpass.xhtml"> <input type="button" name="chnbtn" value="Change your password"   class="btn"/> </a>
              
          </div>       
                   
        
               <div class="ssb">
            
            <div class="secondsearchbox">
                    <input class="searchtxt" type="text" placeholder="Search.."/>
                
            </div>
                <div class="icon">
                     <a href=""> 
                         <i class="fas fa-search"></i>
                    </a>
                </div>
                
                
        
        </div>
              
           
              
              
    
     </form> 

    <script>
        
        window.onload(checkEverything());
          
         function checkEverything() {
                checkFname();
                checkLname();
                checkUname();
                checkId();
                checkEmail();
                checkuRole();
                logStatus();
            }
        
        
             function checkFname() {
                var x = "<?php echo $_SESSION["fname"]; ?>";
                document.getElementById("showfname").innerHTML = "<?php echo $_SESSION["fname"]; ?>";
                
            }
        
            function checkLname() {
                var x = "<?php echo $_SESSION["lname"]; ?>";
                document.getElementById("showlname").innerHTML = "<?php echo $_SESSION["lname"]; ?>";
                
            }
        
            function checkId() {
                var x = "<?php echo $_SESSION["user_id"]; ?>";
                document.getElementById("showid").innerHTML = "<?php echo $_SESSION["user_id"]; ?>";
                
            }
            
            function checkUname() {
                 var x = "<?php echo $_SESSION["uname"]; ?>";
                document.getElementById("showuname").innerHTML = "<?php echo $_SESSION["uname"]; ?>";
                
            }
            
            function checkEmail() {
                var x = "<?php echo $_SESSION["email"]; ?>";
                document.getElementById("showemail").innerHTML = "<?php echo $_SESSION["email"]; ?>";
                
            }
            
            function checkuRole() {
                
                var x = "<?php echo $_SESSION["role"]; ?>";
                
               if (x == "Admin") {
                    document.getElementById("showrole").innerHTML = x;
                }
                else if(x == "Librarian") {
                    document.getElementById("showrole").innerHTML = x;
                }
                 else if(x == "Visitor"){
                    document.getElementById("showrole").innerHTML = x;
                } 
            }
        
             function logStatus(){
                var x = '<?php echo $_SESSION["loginstatus"]?>';
                
                if(x == 1) {
                    document.getElementById("login").style.display = "none";
                    document.getElementById("signup").style.display = "none";
                    document.getElementById("logout").style.display = "block";
                    document.getElementById("status").style.display = "block";
                    
                    checkRole();
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
        
        
    </script>
          
    
    </body>
    
    
    
</html>
        