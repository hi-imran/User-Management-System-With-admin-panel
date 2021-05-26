
<div class="products">
	   	<h5 class="latest-product">Please wait while we redirect you to PayPal.</h5>	
   </div>	 

   <center>
   	<img src = "images/tenor.gif">
   </center>
   <br><br>

If this page does not automatically redirect to Paypal in 10 seconds, please click <a href = "#" 
                               onclick = "document.pform.submit(); return false;"><u>here</u></a>.

<br><br>
<form name = "pform" id="form1" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_cart" />
	<input type="hidden" name="upload" value="1">  

	<input type="hidden" name="business" value="info@monginis.com" />
<INPUT TYPE="hidden" NAME="currency_code" VALUE="INR">
<?php

$count = 1;
//Insert into CartItems Table
foreach ($_SESSION['mycart'] as $pid => $quantity) {

		$sql = "SELECT * FROM `products` WHERE `id` = '$pid' ";
		$res = $db->query($sql);
		$row = $res->fetch_array();

		print '
		<!-- @@@@@ -->
		<input type="hidden" name="item_name_'.$count.'" value="'.$row['name'].'" />
		<input type="hidden" name="amount_'.$count.'" value="'.$row['price'].'" />
		<input type="hidden" name="quantity_'.$count.'" value="'.$quantity.'" />
		<!-- @@@@@ -->
		';

		$count++;

	}

?>		
<center>
	<!-- <INPUT TYPE="image" NAME="submit" BORDER="0" SRC="https://user-images.githubusercontent.com/488939/33672796-1b0cc382-da79-11e7-86fd-a7ec810a73c2.png" width = 300> -->
 </center>
  </form>
 
