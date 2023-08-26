
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">

     <link rel="stylesheet" type="text/css" href="onlibrbookpage.css" media="all"/>
    
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
                   <a href="onlibrhistory.php">Your Activity</a>
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
        
        <h2 class="wlcmsg"> Art Section </h2>
    
        <div class="tablerow1">
            
            <table id="1">
        
                <tr>
                    <td>
                        <a href="onlibrartbook1.php" target="_self">
                        <img src="artbook1.jpg" style="width: 130px; height: 180px;"/>
                         </a>
                        VAN GOGH THE COMPLETE PAINTINGS HB
                    </td>
                    
                    <td>
                        <img src="artbook2.jpg" style="width: 130px; height: 180px;"/>
                        WILLIAM BLAKE, THE DRAWINGS FOR DANTE'S DIVINE COMEDY
                    </td>
                    
                    <td>
                        <img src="artbook3.jpg" style="width: 130px; height: 180px;"/>
                        ALFONS MUCHA
                    </td>
                    
                    <td>
                        <img src="artbook4.jpg" style="width: 130px; height: 180px;"/>
                        PICASSO
                    </td>
                    
                </tr>
                
                <tr>
                    
                    <td>
                        <img src="artbook5.jpg" style="width: 130px; height: 180px;"/>
                        A VISUAL PROTEST-THE ART OF BANKSY
                    </td>
                
                     <td>
                        <img src="artbook6.jpg" style="width: 130px; height: 180px;"/>
                        GREEK AND ROMAN ART-ART ESSENTIALS
                    </td>
                    
                    <td>
                        <img src="artbook7.jpg" style="width: 130px; height: 180px;"/>
                        ABSTRACT ART PB
                    </td>
                    
                     <td>
                        <img src="artbook8.jpg" style="width: 130px; height: 180px;"/>
                        DALI THE PAINTINGS HB
                    </td>
                    
                </tr>
                
                <tr>
                    
                    <td>
                        <img src="artbook9.jpg" style="width: 130px; height: 180px;"/>
                        100 IDEAS THAT CHANGED ART
                    </td>
                
                     <td>
                        <img src="artbook10.jpg" style="width: 130px; height: 180px;"/>
                        HOKUSAI-THIRTY SIX VIEWS OF MOUNT FUJI
                    </td>
                    
                    <td>
                        <img src="artbook11.jpg" style="width: 130px; height: 180px;"/>
                        THE GOLDEN AGE OF DUTCH AND FLEMISH PAINTING
                    </td>
                    
                     <td>
                        <img src="artbook12.jpg" style="width: 130px; height: 180px;"/>
                        IMPRESSIONISM-ART ESSENTIALS
                    </td>
                    
                </tr>
                
            </table>
            
        </div>
        
        <div class="btmpage">
            
        <strong>If you havent found what you are looking for check some other categories!</strong>  <br/>
        
        <a href="onlibrcategories.xhtml">Categories</a>
        
        
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