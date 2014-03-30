<?php 

 include('../inc/variable.php'); 
$act = $_GET['action'];

if($act=='view') {  

?>

<?php include('header.php'); ?>

    <div id="main">
    <div class="fleft w50">
    <h1>Boutiques</h1>
    </div>
    <div class="fright tright w50" id="main-right">
   		<a href="boutique.php?action=add" class="btn header-btn">Add New Boutique</a>
    </div>
    
    <div class="clear"></div>
    	
        <table class="list" cellspacing="0">
        	<tr>
            <th style="width:15%">Picture</th>
            	<th style="width:25%">Boutique Name</th>
                <th>Location</th>
                <th style="width:15%">Telephone</th>
                
               
            </tr>
            
 <?php 
 
 $query = mysql_query("SELECT * FROM tbl_boutique");
 
 while($row = mysql_fetch_array($query)) {
 
 ?>
            <tr>
            	
                <td><?php  if($row[5]!="") { echo "<img src='".$baseurl."media/".$row[5]."' height='80px'/>"; };   ?></td>
                <td style="height:40px"><b><?php echo $row[1] ?></b><br><small><a href="boutique.php?action=edit&id=<?php echo $row[0] ?>">Edit</a> - <a href="boutique.php?action=delete&id=<?php echo $row[0] ?>">Delete</a> - <a href="#">View</a></small></td>
                <td><?php echo $row[3] ?></td>
                <td><center><?php echo $row[4] ?></center></td>
               
            </tr>
            
<?php } ?>
        </table>
    </div>

<?php include('footer.php'); ?>

<?php } elseif($act=='add') { ?>


<!-- START ADD -->

<?php include('header.php'); ?>

    <div id="main">
    <form class="editor" action="page.php?action=create" method="post">
    <div class="fleft w50">
    <h1>Add New Boutique</h1>
    </div>
    <div class="fright tright w50" id="main-right">
   		<input type="submit" class="btn header-btn" value="Publish Now"></input>
    </div>
    
    <div class="clear"></div>
    	
        
    <div class="fleft w50" id="main-right">
   		<input type="text" name="name" placeholder="Boutique Name" id="title"/><br>
        <label>Location / Address</label><br>
        <input type="text" name="location" placeholder="Location / Address"/><br>
        <label>Telephone</label><br>
        <input type="text" name="telephone" placeholder="Telephone"/><br>
        <label>SEO Friendly URL</label><br>
        <input type="text" name="slug" placeholder="SEO Friendly URL"/>
    </div>
    </form>
    <div class="fright w45"><BR>
    		<div style="background:#fff; padding:5%; border:1px solid #bebebe;">
            <form id="imageform" method="post" enctype="multipart/form-data" action="ajaximage.php">
            	<div style="" id="preview">
                	
                </div><br>
              
	Upload your image <input name="photoimg" id="photoimg" type="file"><br>
   <div style="font-size:11px">Max 256 KB JPG, PNG, GIF, JPEG and BMP</div>
	
	  </form>
      
      

          
            </div>
    	</div>
      
        
         
       
        
    </div>
  
     
     
     
     
     
     <script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="js/jquery.form.js"></script>

<script type="text/javascript">
$(document).ready(function()
{
$('#photoimg').live('change', function()
{

$("#preview").html('');
$("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
$("#imageform").ajaxForm(
{
target: '#preview'
}).submit();



});


});
</script>

<?php include('footer.php'); ?>

<!-- END ADD -->
<?php } elseif($act=='edit' and $_GET['id']!='') { ?>

<!-- START EDIT -->

<?php include('header.php'); ?>

    <div id="main">
    <form class="editor" method="post" action="update.php?type=page"> 
    <div class="fleft w30">
    <h1>Edit Page</h1>
    </div>
    <div class="fright tright w30" id="main-right">
   		<input type="submit" class="btn header-btn" value="Update Now"></input>
    </div>
    
    <div class="clear"></div>
    	
        <?php 
		$id = $_GET['id'];
		$query = mysql_query("SELECT * FROM tbl_page WHERE id='$id'");
		
		while($row=mysql_fetch_array($query)) {
			
		
		?>
        
        
        <input type="hidden" name="id" value="<?php echo $row[0]; ?>"/>
        <br><input type="text" name="title" placeholder="Page Title" id="title" value="<?php echo $row[1]; ?>"/><br><br>
        <textarea name="content"><?php echo $row[2]; ?></textarea><br><br>
         <input type="text" name="slug" placeholder="SEO Friendly URL" id="seo-url" value="<?php echo $row[3]; ?>"/><br><br>
         <center>Last modified at <?php echo $row[5]; ?> | Page created at <?php echo $row[4]; ?></center>
       <?php
	   
		}
		
		?>
        
    </div>
     </form>

<?php include('footer.php'); ?>

<!-- END EDIT -->
<?php } elseif($act=='create') { ?>

<?php

include('../connect.php');

$title = $_POST['title'];
$content = $_POST['content'];
if($_POST['slug']=="") { 
$slug = strtolower(str_replace(" ","-",$title)); 
} else { 
$slug =  strtolower(str_replace(" ","-",$_POST['slug']));
}
$datec = date("d/m/Y");
	$datem = date("d/m/Y");


 mysql_query("INSERT INTO tbl_page VALUES ('','$title','$content','$slug','$datec','$datem')");


	header('location:page.php');	


?>

<?php } elseif($act="delete" and $_GET['id']!="") { ?>
	
    <?php
	
	include('../connect.php');
	
	$id = $_GET['id'];
	mysql_query("DELETE FROM tbl_page WHERE id='$id'");
	header('location:page.php');
	
	?>


<?php } elseif($act=='update') { ?>

<?php

include('../connect.php');
$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
if($_POST['slug']=="") { 
$slug = strtolower(str_replace(" ","-",$title)); 
} else { 
$slug =  strtolower(str_replace(" ","-",$_POST['slug']));
}

	$datem = date("d/m/Y");


 mysql_query("UPDATE `ahimsa`.`tbl_page` SET `slug` = 'lorem-ipsums' WHERE `tbl_page`.`id` =1");
header('location:page.php');



?>

 
<?php } else { ?>

<?php header('location:boutique.php?action=view'); ?>

<?php } ?>