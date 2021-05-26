<?php
session_start();
include "lib/connection.php";
include "lib/header.php";

//Increment View - Once for this session only to stop refresh problem
// isset($_SESSION['views_increased']) &&

if( isset($_SESSION['views_increased']) && !in_array($_GET['id'], $_SESSION['views_increased']) )
{
	$sql = "UPDATE `products` SET `total_views` = `total_views` +1 WHERE `id` = '$_GET[id]' ";
	$res = $db->query($sql);
	$_SESSION['views_increased'][] = $_GET['id'];
}

$sql = "SELECT * FROM `products` WHERE `id` = '$_GET[id]' ";
$res = $db->query($sql);
$row = $res->fetch_array();
?>
  <!-- ############################################ -->
  <!-- ############################################ -->
   <div class="products">
	   		     	<h5 class="latest-product">Product Details</h5>	
   </div>	 
 
			<table>
			<tr>
				<td>
					<br> <img src="<?=$row['image'];?>" WIDTH = 400 />	
				</td>
				<td STYLE = "padding: 10px; vertical-align: top;">
          	    	 
				     	<h3 class="m_3"><?=$row['name'];?></h3>
				     	<p class="m_text"><?=$row['details'];?></p>
				     
					 <div class="left-n ">Price: Rs.<?php print $row['price'];?></div>
					<div class="clearfix"> </div>
					<div class="contact-form">
						<form method="post" action="add.php">

							<input type="hidden" name="pid"  VALUE = "<?php print $_GET['id'];?>" SIZE = 4>
						<table>
						<tr>
							<td><input type="text" name="quantity"  VALUE = "1" SIZE = 4></td>
							<td><input type="submit"  VALUE = " Add to Cart" ></td>
						</tr>
						</table>
						
						
					</form>
					 </div>
				
				</td>
			</tr>
			</table>
				
				
          	   
  <!-- ############################################ -->
  <!-- ############################################ -->
  <!-- ############################################ -->

<?php
include "lib/footer.php";
?>