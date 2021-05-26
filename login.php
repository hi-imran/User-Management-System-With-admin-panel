<?php
session_start();
include "lib/connection.php";
include "lib/header.php";

?>


<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  -->
 <!-- ~~~~~~~~~~ CHECK OUT FORM DESIGN ~~~~~~~~~~  -->
   <div class="products">
	   		<h5 class="latest-product">Login</h5>	
   </div>	 
 <div class="clearfix"> </div>	


	<?php 
	if(isset($_GET['msg']))
		print "<BR><BR><SPAN STYLE = \"color: red; background: yellow; padding: 4px;\">$_GET[msg]</SPAN>";
	?>
	<h1>Login</h1>
	 
 

  <form method = "post"  action = "verify.php"> 
	 <div class="register-top-grid">
		<div class="mation">
			<span>Email</span>
			<input type="text" name = "email" required > 
		
			<span>Password</span>
			<input type="password" name = "password"> 
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