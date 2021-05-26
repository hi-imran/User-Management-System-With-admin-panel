<?php

session_start();

if(isset($_SESSION['mycart'])) 
	$cart = $_SESSION['mycart'];
else 
	$cart = [];


if(isset($_POST['editCart']))
	$cart = $_POST['editCart'];


if($_POST['quantity'] > 0) {
	$pid = $_POST['pid'];

	$cart[$pid] =  $_POST['quantity'];
}

if(isset($_GET['del_id'])) {
	$del_id = $_GET['del_id'];
	unset($cart[$del_id]);
}

//Clear Invalid Entries
foreach ($cart as $pid => $quantity) {
	if($quantity<1)
		unset($cart[$pid]);
}

$_SESSION['mycart'] = $cart;
header("Location: viewcart.php");
?>