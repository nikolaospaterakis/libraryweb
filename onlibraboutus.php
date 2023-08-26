
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        
    <title>NNJ onlibrary-About us</title>
        
        <link rel="stylesheet" type="text/css" href="onlibraboutus.css" media="all"/>
        
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
        
        
        <div class="support">   
    
            <h1>About Us</h1>
        
        </div> 
        
        
         <div class="leftside" id="leftside">
        
            <h2> This Project </h2>
            
            <h4> This Project has been made from a small team of students of the <a href="https://uowm.gr/en/home/uowm-home-en/" target="_blank"> University of Western Macedonia </a> at the class of Web development </h4> <br/>
            <h4>Its goal is , to be a site that every public library can use and be as much practical as it can be!</h4>
            
        </div>
        
        <div class="loveya">
            <h3> Thank you for visting our site &#128155; </h3>
        </div>
        
        <div class="rightside" id="rightside">
        
            <table>
                
                <caption> <h1> Honorable Mentions </h1> </caption>
                
                <tr>
                    <td>
                        <h2> Brackets </h2>
                    </td>
                    <td>
                        <img src="brackets.jpg" style="width: 100px; height: 100px;"/>
                    </td>
                </tr>
                
                 <tr>
                    <td>
                        <h2> W3S </h2>
                    </td>
                    <td>
                        <img src="w3s.jpg" style="width: 100px; height: 100px;"/>
                    </td>
                </tr>
                
                 <tr>
                    <td>
                        <h2> UOWM </h2>
                    </td>
                    <td>
                        <img src="uowm.jpg" style="width: 100px; height: 100px;"/>
                    </td>
                </tr>
            
            </table>
            
            <h3 class="tutxt"> And many more sites and youtube creators that not only helped us and shows new things but gave us some ideas that we took and improvise!</h3>
            
        </div>
        
        
        <div class="othercontent">
        
            <button id="cntp" onclick="showTP()">This Project</button>
            <button id="cnth" onclick="showHM()">Honorable Mentions</button>
        
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
        
        
            function showHM() {
                
                document.getElementById("leftside").style.display = "none";
                document.getElementById("rightside").style.display = "block";                
            }
            
            
             function showTP() {
                
                document.getElementById("leftside").style.display = "block";
                document.getElementById("rightside").style.display = "none";                
            }
        
        
        </script>
        
    </body>
    
</html>