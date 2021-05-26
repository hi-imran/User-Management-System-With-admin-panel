<?php
include "lib/connection.php";
include "lib/header.php";
?>
  <!-- ############################################ -->
				  <!-- start content -->
		     <div class="products">
	   		     	<h5 class="latest-product">Products</h5>	
			</div>	 
	
		<table >
		<tr>
			<td>
			
		<!-- grids_of_4 -->
		<div class="grid-product">
		  
		<?php

		$sql = "SELECT * FROM `products` WHERE `cid` = '$_GET[cid]' ";
		$res = $db->query($sql);
		while($row = $res->fetch_array()) {

		//using heredoc symbol <<<EOF, Ensure LAST line EOF has no space before it
		  print <<<EOF
		  <div class="  product-grid" style="width: 300px;">
			<div class="content_box"><a href="details.php?id=$row[id]">
			   	<div class="left-grid-view grid-view-left">
			   	   	 <img src="$row[image]" class="img-responsive" alt=""/>
				   	   	<div class="mask">
	                        <div class="info">Quick View</div>
			            </div>
				   	  </a>
				</div>
				    <h4><a href="details.php?id=$row[id]">$row[name]</a></h4>
 				     Rs. $row[price]

 				     <BR>
 				     <form action = "add.php" method = "post">

 				     <input type = "hidden" name = "pid" value = "$row[id]">
 				     <input type = "hidden" name = "quantity" value = "1">
 				     <input type = "submit"  class="now-get get-cart"  value = "Add Now">

 				     </form>
			   	</div>
              </div>
EOF;
		}

	?>
			


	</div>
	<!---->
			</td>
		</tr>
		</table>
				  <!-- ############################################ -->

<?php
include "lib/footer.php";
?>