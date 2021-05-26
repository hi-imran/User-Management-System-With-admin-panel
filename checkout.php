<?php
session_start();

include "lib/connection.php";
include "lib/header.php";
?>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  -->
 <!-- ~~~~~~~~~~ CHECK OUT FORM DESIGN ~~~~~~~~~~  -->
   <div class="products">
	   		<h5 class="latest-product">Checkout Form</h5>	
   </div>	 
 <div class="clearfix"> </div>			 

  <form method = "post" action = "order.php" name = "cForm"  onsubmit="return same();"> 
	 <div class="register-top-grid">

<?php

	if(isset($_SESSION['login_user'])) {
		print '<h3>Logged in as '.$_SESSION['login_name'] .'</h3><br><br>';
	}
	else {
		print '

 <script type="text/javascript">
		function same() {
			var p1 = document.cFormf1.password.value;
			var p2 = document.cForm.confirm_password.value;

			if(p1.length<5) {
				alert(\'Password is too small\');
				document.cForm.password.focus();
				return false;
			}

			if(p1!=p2) {
				alert(\'Password and Confirm Password does not match\');
				document.cForm.confirm_password.focus();
				return false;
			}
		return true;
		}
	</script>		 


		<h3>BILLING INFORMATION</h3>
		<div class="mation">
			<span>Billing Fullname<label>*</label></span>
			<input type="text" name = "billing_fullname" required> 
		
			<span>Billing Email<label>*</label></span>
			<input type="text" name = "billing_email"> 
		 
			<span>Billing Phone<label>*</label></span>
			<input type="text" name = "billing_phone"> 

			<span>Billing Address<label>*</label></span>
			<textarea type="text" name = "billing_address"> </textarea>

			<span>Password<label>*</label></span>
			<input type="password" name = "password"> 

			<span>Confirm Password<label>*</label></span>
			<input type="password" name = "confirm_password"> 

		</div>

		 <a class="news-letter" href="#">
			 <label class="checkbox"><input type="checkbox" name="checkbox" onclick = "duplicate()"><i> </i>Shipping Info is same as Billing Info</label>
		   </a>
		   ';
	}
?>

		




		

		<script language = "javascript">
			function duplicate() {
				var cF = document.cForm;
				cF.shipping_fullname.value = cF.billing_fullname.value;
				cF.shipping_phone.value    = cF.billing_phone.value;
				cF.shipping_address.value  = cF.billing_address.value;
			}
		</script>
		   
		<h3>SHIPPING INFORMATION</h3>
		<div class="mation">
			<span>Shipping Fullname<label>*</label></span>
			<input type="text" name = "shipping_fullname" required> 
	 
			<span>Shipping Phone<label>*</label></span>
			<input type="text" name = "shipping_phone"> 

			<span>Shipping Address<label>*</label></span>
			<textarea type="text" name = "shipping_address"> </textarea>
		</div>
		   
		<h3>PAYMENT INFORMATION</h3>
		<div class="mation">

			&nbsp; &nbsp; &nbsp; <input type="radio" name = "payment_info" required value = "card"> Pay Using any Card
	 		
			<br> &nbsp; &nbsp; &nbsp; <input checked type="radio" name = "payment_info" required value = "cod"> Cash on Delivery
		</div>
		   
	</div>
		

	<br>
	<input type="submit" class = nikPinkButton value="submit">

	</form>
	<div class="clearfix"> </div>


 <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  -->
 <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  -->

<?php
include "lib/footer.php";
?>