<?php

include('../connect.php');

$title = $_POST['title'];
$content = $_POST['content'];
$slug = strtolower(str_replace(" ","-",$title));
$datec = $date();
$datem = $date();

$query = mysql_query("INSERT INTO tbl_page VALUES ('','1','1','1','1','1')");

if($query) {
	header('location:page.php');	
}

?>