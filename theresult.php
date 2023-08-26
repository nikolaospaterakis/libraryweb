<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
    
    <title>NNJ onlibrary-Search Results</title>
        
        <link rel="stylesheet" type="text/css" href="onlibrmainpage.css" media="all"/>
        
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
        <style>
        
            table {
                padding: 20px;
                border: 3px solid black;
                position: absolute;
                top: 20%;
                left: 20%;
                background-color: beige;
            }
            
            td{
                padding: 30px
                    
            }
        
        
        </style>

    </head>
    
    <body>
        
       <ul>
        
           <li class="hdd">
               <a href="onlibrmainpage.xhtml" class="dropbtn">Home</a>
           </li>    
           <li class="pdd">
               <a href="#" class="dropbtn">Profile</a>
               <div class="dropcon">
                   <a href="onlibrprofile.php">Your Profile</a>
                   <a href="onlibryouract.php">Your Activity</a>
                   <a href="onlibrhistory.xhtml">Your History</a>
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
                    <a style="margin-bottom: -20px;">
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
        
        <?php

include 'connectdb.php';

$search = $_POST["search"];

$sql = "SELECT title, author, image FROM books WHERE title LIKE '%$search%'";

$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$stmt = $conn->prepare($sql);

$stmt->execute();
    
$result = $stmt->rowCount();

if($result>0){
    
    echo "<table>";
    
  while($show = $stmt->fetch()) {
   echo "<tr>" . "<td>" . $show->title . "</td>"; 
   echo "<td>" . $show->author . "</td>";
   //echo "<td>" . $show->image . "</td>" . "</tr>";
   
}
    
    echo "</table>";
  
}
        ?>


        
    </body>


</html>


