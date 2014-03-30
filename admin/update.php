<?php

include('../connect.php');

if($_GET['type']=='page') { 

$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
if($_POST['slug']=="") { 
$slug = strtolower(str_replace(" ","-",$title)); 
} else { 
$slug =  strtolower(str_replace(" ","-",$_POST['slug']));
}

$datem = date("d/m/Y");


mysql_query("UPDATE tbl_page SET title='$title',content='$content',slug='$slug',datemodified='$datem'  WHERE id=$id");



header("location:page.php");

}

?>