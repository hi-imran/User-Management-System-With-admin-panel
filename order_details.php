<?php
include "login_check.php"; 
include "lib/connection.php";
include "lib/header.php";
?>
 <div class="products">
	   	<h5 class="latest-product">You are logged in!</h5>	
 </div>	 

 View your orders ... etc...

 <HR>
<H2>Order Details:</H2>

<?php

//Check if Order_id is for this usr
$sql = "SELECT * FROM `orders` WHERE `cust_id` = '$_SESSION[login_user]' AND `order_id` = '$_GET[order_id]'";
$res = $db->query($sql);
$num = $res->num_rows;
if($num<1)
	die("Invalid Access");

$sql = "SELECT * FROM `cart_items` WHERE `order_id` = '$_GET[order_id]' ";
$res = $db->query($sql);
while($row = $res->fetch_array()) {
	print "<HR>$row[product_name], Rs. $row[purchase_price], Quantity: $row[quantity] ";
}
?>

<?php
include "lib/footer.php";
?>