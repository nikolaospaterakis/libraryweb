<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php

session_start();

?>

<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        
    <title>NNJ onlibrary-Main Page</title>
        
        <link rel="stylesheet" type="text/css" href="onlibrmainpage.css" media="all"/>
        
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
           
           <li class="signin" id="signup">
               <a href="onlibrsignup.xhtml" class="signin">
                   Sign up
                </a>
           </li>
           
           <li class="login" id="login"><a href="onlibr.xhtml" >Log in</a></li>
           
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

        <div class="txt">
            Welcome to our home page!
        </div>
        
        <div class="txt2">
           <strong> Check out some of our categories! &darr; </strong>
        </div>
        
        <div class="images">
        
            <img src="mainphoto.jpg" id="kappaimage"  alt="image1" title="image1" />
        
        </div>
        
        <table>
            
            <tr>
                
                <td>
        
                <div class="artb" id="artbook">
                 
                    <strong> Art Books </strong>
                    <a href="onlibrbookpagea.php"> <img src="artbook.jpg" style="width:150px;height:200px;"/> </a>
        
                </div>
                    
                </td>
                
                <td>
        
                <div class="biob" id="book">
                 
                    <strong> Biography Books </strong>
                    <a href="#"> <img src="biobooks.jpg" style="width:150px;height:200px;"/> </a>
        
                </div>
                
                </td>
                
                <td>
                    
                    <div class="comicb" id="comicbook">
                 
                    <strong> Comic Books </strong>
                    <a href="#"> <img src="comicbook.jpg" style="width:150px;height:200px;"/> </a>
        
                </div>
                    
                </td>
                
                <td>
                    
                    <div class="cookb" id="cookbook">
                 
                    <strong> Cook Books </strong>
                    <a href="#"> <img src="cookbooks.jpg" style="width:150px;height:200px;"/> </a>
        
                </div>
                    
                </td>
                
                <td>
                    
                    <div class="fantasyb" id="fantasybook">
                 
                    <strong> Fantasy Books </strong>
                    <a href="#"> <img src="fantasybook.jpg" style="width:150px;height:200px;"/> </a>
        
                </div>
                    
                </td>
                
                <td>
                    
                    <div class="historyb" id="historybook">
                 
                    <strong> History Books </strong>
                    <a href="#"> <img src="historybooks.jpg" style="width:150px;height:200px;"/> </a>
        
                </div>
                    
                </td>
                
                 <td>
                    
                    <div class="poetryb" id="book">
                 
                    <strong> Poetry Books </strong>
                    <a href="#"> <img src="petrybooks.jpg" style="width:150px;height:200px;"/> </a>
        
                    </div>
                    
                </td>
                
                 <td>
                    
                    <div class="scienceb" id="sciencebook">
                 
                    <strong> Science </strong>
                    <a href="#"> <img src="sciencebooks.jpg" style="width:150px;height:200px;"/> </a>
        
                </div>
                    
                </td>
            
            </tr>
            
        </table>
        
        
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
        
        <table>
            <tr><td><label>Username</label></td><td><input type="text"/></td></tr>
            <tr><td><label>Password</label></td><td><input type="password"/></td></tr>
            <tr><td><label>Email</label></td><td><input/ type="email"></td></tr>
        </table>
        
    </body>
    
</html>