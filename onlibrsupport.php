<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">

     <link rel="stylesheet" type="text/css" href="onlibrsupport.css" media="all"/>
    
    <head>
    <title>NNJ onlibrary-Support</title>
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
    <?php
        
        session_start();
        
        
    ?>

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
                   <a href="onlibryouract.php"php>Your Activity</a>
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
        
        <div class="supmsg">
            
        <h1>Support Form</h1>
            
        </div>
        
        
        <div class="suptxt">
            <h2> Contact us if :</h2>
                <strong>
                <ol>
                    <li>You have found any problem with our page</li> <br/>
                    <li>You want to suggest us something to add</li> <br/>
                    <li>Want to ask us something</li>
                </ol>
                </strong>
            
        </div>
        
        
        <h3 class="txtemail">
            Click the following emails to contact us if you have any question or to mention any problem that you may find.
        </h3>
        
        
        <div class="emailsupp">
            
                <a href="mailto:jimaraskrambo@gmail.com?Subject=Πείτε%20μας%20το%20προβλημά%20σας." target="_blank">jimaraskrambo@gmail.com</a> <br/>
            
                <a href="mailto:nikking98@gmail.com?Subject=Πείτε%20μας%20το%20προβλημά%20σας." target="_blank">nikking98@gmail.com</a>

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