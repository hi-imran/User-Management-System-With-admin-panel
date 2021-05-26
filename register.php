<?php
session_start();
include "lib/connection.php";
include "lib/header.php";

?>


<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  -->
 <!-- ~~~~~~~~~~ CHECK OUT FORM DESIGN ~~~~~~~~~~  -->
   <div class="products">
	   		<h5 class="latest-product">New User Register</h5>	
   </div>	 
 <div class="clearfix"> </div>	

 <script type="text/javascript">
		function same() {
			var p1 = document.f1.password.value;
			var p2 = document.f1.confirm_password.value;

			if(p1.length<5) {
				alert('Password is too small');
				document.f1.password.focus();
				return false;
			}

			if(p1!=p2) {
				alert('Password and Confirm Password does not match');
				document.f1.confirm_password.focus();
				return false;
			}
		return true;
		}
	</script>		 

<?php
	if(isset($_GET['msg']) && $_GET['msg'] == "1") {
		print "<HR>This email is already taken. Please use another or login with your password. <HR>";
	}
	?>

  <form method = "post"  name = f1 action = "register_thanks.php" onsubmit="return same();"> 
	 <div class="register-top-grid">
		<h3>BILLING INFORMATION</h3>
		<div class="mation">
			<span>Billing Fullname<label>*</label></span>
			<input type="text" name = "billing_fullname" required value="<?php
			 if(isset($_SESSION['save_data']) )
			 	print $_SESSION['save_data']['billing_fullname'];
			 	?>"> 
		
			<span>Billing Email<label>*</label></span>
			<input type="text" name = "billing_email" value="<?php
			 if(isset($_SESSION['save_data']) )
			 	print $_SESSION['save_data']['billing_email'];
			 	?>"> 
		 
			<span>Billing Phone<label>*</label></span>
			<input type="text" name = "billing_phone" value="<?php
			 if(isset($_SESSION['save_data']) )
			 	print $_SESSION['save_data']['billing_phone'];
			 	?>"> 

			<span>Billing Address<label>*</label></span>
			<textarea type="text" name = "billing_address"?><?php
			 if(isset($_SESSION['save_data']) )
			 	print $_SESSION['save_data']['billing_address'];
			 	?></textarea>


			<span>Password<label>*</label></span>
			<input type="password" name = "password"> 


			<span>Confirm Password<label>*</label></span>
			<input type="password" name = "confirm_password"> 
		</div>

		  
	</div>
		

	<br>
	<input type="submit" class = nikPinkButton value="submit">
	<?php
	if(isset($_SESSION['save_data']) )
		unset($_SESSION['save_data']);
	?>
	</form>
	<div class="clearfix"> </div>


 <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  -->
 <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  -->

<?php
include "lib/footer.php";
?>