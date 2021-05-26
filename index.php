<?php
include "lib/connection.php";
include "lib/header.php";
?>
 <!-- @@@@@@@@@@@@@@@@@@@@@ -->
	   		     <div class="products">
	   		     	<h5 class="latest-product">LATEST PRODUCTS</h5>	
	   		     	  <a class="view-all" href="product.html">VIEW ALL<span> </span></a> 		     
	   		     </div>
	   		     <div class="product-left">
	   		     	


<?php

		$sql = "SELECT * FROM `products` WHERE 1 ORDER BY `id` DESC LIMIT 0,3";
		$res = $db->query($sql);
		while($row = $res->fetch_array()) {

		//using heredoc symbol <<<EOF, Ensure LAST line EOF has no space before it
		  print <<<EOF
	   		     	<div class="col-md-4 chain-grid">
	   		     		<a href="details.php?id=$row[id]"><img class="img-responsive chain" src="$row[image]" alt=" " /></a>
	   		     		<span class="star"> </span>
	   		     		<div class="grid-chain-bottom">
	   		     			<h6><a href="single.html">$row[name]</a></h6>
	   		     			<div class="star-price">
	   		     				<div class="dolor-grid"> 
		   		     				<span class="actual">300$</span>
		   		     				<span class="reducedfrom">400$</span>
		   		     				   
	   		     				</div>
	   		     				<a class="now-get get-cart" href="#">ADD TO CART</a> 
	   		     				<div class="clearfix"> </div>
							</div>
	   		     		</div>
	   		     	</div>
	   		     	 
EOF;
}
?>

	   		     	 <div class="clearfix"> </div>
	   		     </div>
				  <!-- @@@@@@@@@@@@@@@@@@@@@ -->


 <!-- @@@@@@@@@@@@@@@@@@@@@ -->
	   		     <div class="products">
	   		     	<h5 class="latest-product">MOST POPULAR PRODUCTS</h5>	
	   		     	  <a class="view-all" href="product.html">VIEW ALL<span> </span></a> 		     
	   		     </div>
	   		     <div class="product-left">
	   		     	


<?php

		$sql = "SELECT * FROM `products` WHERE 1 ORDER BY `total_views` DESC LIMIT 0,3";
		$res = $db->query($sql);
		while($row = $res->fetch_array()) {

		//using heredoc symbol <<<EOF, Ensure LAST line EOF has no space before it
		  print <<<EOF
	   		     	<div class="col-md-4 chain-grid">
	   		     		<a href="details.php?id=$row[id]"><img class="img-responsive chain" src="$row[image]" alt=" " /></a>
	   		     		<span class="star"> </span>
	   		     		<div class="grid-chain-bottom">
	   		     			<h6><a href="single.html">$row[name]</a></h6>
	   		     			<div class="star-price">
	   		     				<div class="dolor-grid"> 
		   		     				<span class="actual">300$</span>
		   		     				<span class="reducedfrom">400$</span>
		   		     				   
	   		     				</div>
	   		     				<a class="now-get get-cart" href="#">ADD TO CART</a> 
	   		     				<div class="clearfix"> </div>
							</div>
	   		     		</div>
	   		     	</div>
	   		     	 
EOF;
}
?>

	   		     	 <div class="clearfix"> </div>
	   		     </div>
				  <!-- @@@@@@@@@@@@@@@@@@@@@ -->


 <!-- @@@@@@@@@@@@@@@@@@@@@ -->
	   		     <div class="products">
	   		     	<h5 class="latest-product">BEST SELLERS PRODUCTS</h5>	
	   		     	  <a class="view-all" href="product.html">VIEW ALL<span> </span></a> 		     
	   		     </div>
	   		     <div class="product-left">
	   		     	


<?php

		$sql = "SELECT * FROM `products` WHERE 1 ORDER BY `total_sales` DESC LIMIT 0,3";
		$res = $db->query($sql);
		while($row = $res->fetch_array()) {

		//using heredoc symbol <<<EOF, Ensure LAST line EOF has no space before it
		  print <<<EOF
	   		     	<div class="col-md-4 chain-grid">
	   		     		<a href="details.php?id=$row[id]"><img class="img-responsive chain" src="$row[image]" alt=" " /></a>
	   		     		<span class="star"> </span>
	   		     		<div class="grid-chain-bottom">
	   		     			<h6><a href="single.html">$row[name]</a></h6>
	   		     			<div class="star-price">
	   		     				<div class="dolor-grid"> 
		   		     				<span class="actual">300$</span>
		   		     				<span class="reducedfrom">400$</span>
		   		     				   
	   		     				</div>
	   		     				<a class="now-get get-cart" href="#">ADD TO CART</a> 
	   		     				<div class="clearfix"> </div>
							</div>
	   		     		</div>
	   		     	</div>
	   		     	 
EOF;
}
?>

	   		     	 <div class="clearfix"> </div>
	   		     </div>
				  <!-- @@@@@@@@@@@@@@@@@@@@@ -->

<?php
include "lib/footer.php";
?>