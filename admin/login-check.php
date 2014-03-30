<?php

include('../connect.php');

session_start();

$username = $_POST["username"];
$password = $_POST["password"];

$query = mysql_query("SELECT * FROM tbl_user WHERE username='$username ' and password='$password'");

if(mysql_num_rows($query)==1) {
	header("location:index.php");
	$_SESSION['username'] = $username;
} else {
	header("location:login.php?error=1");
}

?>