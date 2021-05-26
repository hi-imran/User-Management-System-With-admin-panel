<?php
session_start();
include "lib/connection.php";

if(!isset($_SESSION['login_user'])) {
//Insert into Customer Table
$sql = "INSERT INTO `customers` (`cust_id`, `fullname`, `email`, `password`, `phone`, `address`, `timestamp`) VALUES (NULL, '$_POST[billing_fullname]', '$_POST[billing_email]', 'password', '$_POST[billing_phone]', '$_POST[billing_address]', '".time()."');";
$db->query($sql);

//Get Last Insert ID
$cust_id = $db->insert_id;
}
else 
	$cust_id = $_SESSION['login_user'];


//Insert into Orders Table
$sql = "INSERT INTO `orders` (`order_id`, `cust_id`, `shipping_fullname`, `shipping_phone`, `shipping_address`, `payment_info`, `timestamp`, `status`) VALUES (NULL, '$cust_id', '$_POST[shipping_fullname]', '$_POST[shipping_phone]', '$_POST[shipping_address]', '$_POST[payment_info]', '".time()."', 'new');";
$db->query($sql);

//Get Last Insert ID
$order_id = $db->insert_id;


//Insert into CartItems Table
foreach ($_SESSION['mycart'] as $pid => $quantity) {

		$sql = "SELECT * FROM `products` WHERE `id` = '$pid' ";
		$res = $db->query($sql);
		$row = $res->fetch_array();

		$sql = "INSERT INTO `cart_items` (`cart_item_id`, `order_id`, `pid`, `quantity`, `purchase_price`, `product_name`) VALUES (NULL, '$order_id', '$pid', '$quantity', '$row[price]', '$row[name]');";
		$db->query($sql);

		$sql = "UPDATE `products` SET `total_sales` = `total_sales` +$quantity WHERE `id` = '$pid' ";
		$db->query($sql);

	}

include "lib/header.php";

//If payment_info is Card, use PayPal
if($_POST['payment_info'] == "card") {
	include "_paypal.php";
}
else
print '<div class="products">
	   	<h5 class="latest-product">Thank you for placing the COD order</h5>	
   </div>	 
   	We will deliver the products within 4-6 working years.
';

include "lib/footer.php";

//Clear Session data
unset($_SESSION['mycart']);
?>