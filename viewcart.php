<?php
session_start();
include "lib/connection.php";
include "lib/header.php";
?>


<!-- %%%%%%%%%%%% VIEWCART DESIGN %%%%%%%%%%%%%%%% -->
   <div class="products">
	   		     	<h5 class="latest-product">View Cart</h5>	
   </div>	 

<?php
if(isset($_SESSION['mycart']) && count($_SESSION['mycart'])>0) {

	print '
	<form method = post action = add.php>
			<table CLASS = nikCart WIDTH = 100% STYLE = "border: 2px solid BLACK;padding: 10px;">
				<tr>
					<th>No.</th>
					<th colspan = 2> Product </th>
					<th>Price</th>
					<th>Quantity</th>
					<th>SubTotal</th>
					<th>Remove</th>
				</tr>';

	$num = 0;
	$total = 0;
	foreach ($_SESSION['mycart'] as $pid => $quantity) {

		$sql = "SELECT * FROM `products` WHERE `id` = '$pid' ";
		$res = $db->query($sql);
		$row = $res->fetch_array();

		$subtotal = $row['price']*$quantity;
		$total += $subtotal;
		$num++;
		//if($quantity>0) {
		print "<tr>
					<td>$num</td>
					<td><a href = details.php?id=$pid><IMG SRC = '$row[image]' WIDTH = 50></a></td>
					<td><a href = details.php?id=$pid>$row[name]</a></td>
					<td>Rs.$row[price]</td>
					<td><input type = number name = editCart[$pid] value = $quantity style = \"width: 60px;\"></td>
					<td>$subtotal</td>
					<td><a href=\"add.php?del_id=$row[id]\" onclick = \"return confirm('Are you sure?');\">X Remove</a></td>
				</tr>";
		//	}
		
	}

	print '<tr>
					<th colspan = 4></th>
					<th colspan = 1><input type = submit value = "Update"></th>
					<th>TOTAL Rs. '.$total.'</th>
					<th></th>
				</tr>
			</table>

		</form>
		<DIV STYLE = "width: 100%; text-align: center;">
		
			<br> <br> 
				<a class="now-get" href="checkout.php">CheckOut</a> &nbsp; 
				<a class="now-get" href="#">Continue Shopping</a> 
		</DIV>
		<div class="clearfix"> </div>

			';
	}
else 
	print '<h2>Your Cart is Empty</h2>';
?>
			

			


 <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
<?php
include "lib/footer.php";
?>