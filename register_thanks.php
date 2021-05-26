<?php
session_start();
include "lib/connection.php";

//If Email already exists, do not insert
$sql = "SELECT * FROM `customers` WHERE `email` = '$_POST[billing_email]' ";
$res = $db->query($sql);
$row = $res->fetch_array();
if($row) {

	$_SESSION['save_data'] = $_POST;
	header("Location: register.php?msg=1");
	die("Stop Here");
}

$t = time();
$md5 = md5($_POST['password']);

//Insert into Customer Table
$sql = "INSERT INTO `customers` (`cust_id`, `fullname`, `email`, `password`, `phone`, `address`, `timestamp`) VALUES (NULL, '$_POST[billing_fullname]', '$_POST[billing_email]', '$md5', '$_POST[billing_phone]', '$_POST[billing_address]', '".time()."');";
$db->query($sql);

include "lib/header.php";
?>
 <div class="products">
	   	<h5 class="latest-product">Thank you registering!</h5>	
 </div>	 

 Keep Buying!

<?php
include "lib/footer.php";
?>
