<?php 

session_start();

include('../connect.php');

if($_SESSION['username']=="") {
	header('location:login.php');
} 

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator Area - AHIMSA UBUD</title>
<script type="text/javascript" src="js/jquery-1.7.min.js"></script>
<link rel="stylesheet" href="css/admin.css"/>
 
</head>

<body>

	<div id="topbar">
    	<div class="fright">
        
        <?php 
		
		$s_username = $_SESSION['username'];
		
		$query = mysql_query("SELECT * FROM tbl_user WHERE username='$s_username'");
		
		while($row = mysql_fetch_array($query)) { ?>
		
       
        
        	<table>
            	<tr>
                	<td width="45" style="padding-right:10px;"><img src="img/icon/user-log.png" class="avatar" height="40"/></td>
                    <td ><b style="font-size:16px; margin-top:10px"><?php echo $row[3] ?></b><br style="margin:0px"><a href="#">Edit Profile</a> - <a href="logout.php">Logout</a></td>
                </tr>
            </table>
        	
             <?php	
		}
		
		 ?>
            
        </div>
        
        <div class="clear"></div>
    </div>
	
    <div id="sidemenu">
    	<img style="padding:10px 5px" src="img/a.png" height="40"/>
        
        <ul>
        	<li>
            <a href="#">
            <img src="img/icon/home.png" height="30"/><br>
            Home</a>
            </li>
            
            <li>
            
            <a href="#">
            <img src="img/icon/product.png" height="30"/><br>
            Product</a>
            
            <ul>
            	<li><a href="#">Product List</a></li>
                <li><a href="#">Add Product</a></li>
                 <li><a href="#">Category</a></li>
                  <li><a href="#">Attribute</a></li>
            </ul>
            
            </li>
            
             <li>
            
            <a href="boutique.php">
            <img src="img/icon/product.png" height="30"/><br>
            Boutique</a></li>
            
             <li>
            
            <a href="page.php">
             <img src="img/icon/page.png" height="30"/><br>
            Pages</a>
            
             <ul>
            	<li><a href="#">Page List</a></li>
                <li><a href="#">Add Page</a></li>
            </ul>
            
            
            </li>
            
             <li>
            <a href="#"> <img src="img/icon/slideshow.png" height="30"/><br>
            Slideshow</a>
            </li>
            
             <li>
             <a href="#"><img src="img/icon/user.png" height="30"/><br>
            Account</a>
            </li>
        </ul>
        
    </div>