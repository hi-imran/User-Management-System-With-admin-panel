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
<H2>Order History:</H2>

<?php

$sql = "SELECT * FROM `orders` WHERE `cust_id` = '$_SESSION[login_user]' ";
$res = $db->query($sql);
while($row = $res->fetch_array()) {
	print "<HR><a href = order_details.php?order_id=$row[order_id]><u>$row[shipping_fullname]</u></a>, $row[payment_info],  on  ".date("D,d-M-Y", $row['timestamp']);
}
?>

<?php
include "lib/footer.php";
?>