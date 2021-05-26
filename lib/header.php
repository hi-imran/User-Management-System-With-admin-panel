<!DOCTYPE html>
<html>
<head>
<title>Monginis - Cake Shop!</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="js/jquery.min.js"></script>
<!--script-->
</head>

<?php
if(isset($_POST['payment_info']) && $_POST['payment_info'] == "card") {
	print ' <body onload = "document.pform.submit();"> ';
}
else 
	print ' <body> ';
?> 
	<!--header-->
	<div class="header">
		<div class="top-header">
			<div class="container">
				<div class="top-header-left">
					
				</div>
				<div class="top-header-right">
				 <ul class="support">
						<li><a href="#"><label> </label></a></li>
						<li><a href="#">Call for Support<span class="live"> 033-32210000</span></a></li>
					</ul>
					<ul class="support">
						<li class="van"><a href="#"><label> </label></a></li>
						<li><a href="#">Free shipping <span class="live">on order over Rs.500</span></a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>		
			</div>
		</div>
		<div class="bottom-header">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
						<a href="index.php"><img src="images/logo.png" alt=" " /></a>
					</div>
					<div class="search">
						<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
						<input type="submit"  value="SEARCH">
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">					
						<div class="account"><a href="home.php"><span> </span>YOUR ACCOUNT</a></div>
							<ul class="login">
							<?php
							if(!isset($_SESSION['login_user'])){
								print '
									<li><a href="login.php"><span> </span>LOGIN</a></li> |
									<li ><a href="register.php">SIGNUP</a></li>
								';
							} else 
								print '<li><a href="logout.php"><span> </span>LOGOUT</a></li> ';
							?>

								
							</ul>
						<div class="cart"><a href="viewcart.php"><span> </span>CART</a></div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<!---->
	<div class="container">
			<div class="shoes-grid">
			<a href="single.html">
			<div class="wrap-in">
				
	          </div>
	           	</a>
	   		      <!---->
	   		     
				 <!-- @@@@@@@@@@@@@@@@@@@@@ -->