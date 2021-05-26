<?php 
session_start();

include "lib/connection.php";

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password' ";
$res = $db->query($sql);
$row = $res->fetch_array();

if($row['username']) {

	$_SESSION['login']    = "Yes";
	$_SESSION['username'] = $row['username'];
	header("Location: Home.php");

}
else {
	header("Location: index.php?msg=Invalid User or Password");
}