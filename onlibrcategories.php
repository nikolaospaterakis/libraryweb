
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">

     <link rel="stylesheet" type="text/css" href="onlibrcategories.css" media="all"/>
    
    <head>
    <title>NNJ onlibrary-Categories</title>
        
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
        
        <div class="msg">
            
        <h1>Categories</h1>
            
     </div>
        
        <div class="p1">
            <table>
                <ul></ul>
        <tr>
            <td><a href="onlibrbookpagea.php" target="_self">Art</a></td>
            <td><a href="#" target="_self">Biography</a></td>   
            <td><a href="#" target="_self">Business</a></td>
            </tr>
                <tr>
            <td><a href="#" target="_self">Comics</a></td>
            <td><a href="#" target="_self">Cookbooks</a></td> 
            <td><a href="#" target="_self">Fantasy</a></td>
                </tr>
              <tr> 
            <td><a href="#" target="_self">Graphic Novels</a></td> 
            <td><a href="#" target="_self">History</a></td> 
            <td><a href="#" target="_self">Horror</a></td> 
                </tr>  
            <td><a href="#" target="_self">Music</a></td> 
            <td><a href="#" target="_self">Mystery</a></td> 
            <td><a href="#" target="_self">Poetry</a></td> 
            <tr>
            <td><a href="#"  target="_self">Phychology</a></td> 
            <td><a href="#" target="_self">Romance</a></td> 
            <td><a href="#" target="_self">Science</a></td>
            </tr>
                
                <tr></tr>
                
                
        </table>
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