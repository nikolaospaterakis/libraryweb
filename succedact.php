<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">

     <link rel="stylesheet" type="text/css" href="onlibrartbook1.css" media="all"/>
    
    <head>
    <title>NNJ onlibrary-ActPage</title>
       
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
    <style>
        #message {
            text-align: center;
            //border: 2px solid black;
            padding: 20px;
            width: 600px;
            position: absolute;
            top: 30%;
            left: 28%;
            font-size: 40px;
        }
        
        #mbtn {
            padding: 20px;
           background-color: rgba(0,0,0,0);
            border: 2px solid black;
            position: absolute;
            bottom: 30%;
            left: 40%;
            font-size: 30px;
            cursor: grab;
        }
        
    </style>

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
        
        <h2 id="message"><?php echo $_SESSION['actstatus']; ?></h2>
        
        <a href="onlibrmainpage.php"><button id="mbtn">Go to Main Page</button></a>
        
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
        
        
        </script>
        
    </body>
    
    
</html>