<?php
session_start();
include "lib/connection.php";

$email = $_POST['email'];
$pwd   = md5($_POST['password']);

$sql = "SELECT * FROM `customers` WHERE `email` = '$email' AND `password` = '$pwd' ";
$res = $db->query($sql);
$num = $res->num_rows;
$row = $res->fetch_array();

if($num>0) {

	$_SESSION['login_user'] = $row['cust_id']; 
	$_SESSION['login_name'] = $row['fullname']; 

	header("Location: home.php");
} else {

	header("Location: login.php?msg=Invalid Email Or Password");
}
