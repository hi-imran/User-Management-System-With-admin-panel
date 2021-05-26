<?php
include "lib/connection.php";
include "lib/login_check.php";
include "lib/header.php";

if(isset($_POST['name'])) {
    $sql = "INSERT INTO `products` (`id`, `name`, `details`, `image`, `price`, `cid`, `total_views`, `total_sales`) VALUES (NULL, '$_POST[name]', '$_POST[details]', '', '$_POST[price]', '$_POST[cid]', '0', '0');";
    $db->query($sql);

    $id = $db->insert_id;

    if($_FILES['image']['name']) {

        $tmp = explode(".", $_FILES['image']['name']);
        $ext = strtolower(trim(end($tmp)));

        $image_path = "products/".$id . "." . $ext;

        if($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "gif" ) {
            copy($_FILES['image']['tmp_name'], "../".$image_path);

             $sql = "UPDATE `products` SET  `image` = '$image_path' WHERE `id` = '$id' ";
             $db->query($sql);
        }
    }

    $msg = "Inserted <b>$id</b> successfully";
}
?>


            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                   
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">

                            	<?php
                            	if(isset($msg))
                            		print ' <div class="alert alert-success" role="alert">'.$msg.'</div>';
                            	?>
                                

                                <div align = right><a href="manage_products.php"
                                class="btn btn-primary ">Manage Products</a>
                                </div>

							<h3 class="box-title"> &nbsp; Add a new Product</h3>
							<form class="form-horizontal form-material" method = "post" action = "add_product.php" enctype="multipart/form-data">
                                <table>
                                	<tr>
                                		<td style="padding: 6px;">Product Name</td>
                                		<td style="padding: 6px;"><input type="text" name = "name"
                                                class="form-control" required></td>
                                	</tr>
                                	<tr>
                                		<td style="padding: 6px;">Category</td>
                                		<td style="padding: 6px;">
                                			<select name = "cid" class="form-control" required>
                                                <option value = "">Please Select</option>
                                                <?php
                                                 	$sql = "SELECT * FROM `category` WHERE `parent_id` = 0";
                                                    $res = $db->query($sql);
                                                    while($row = $res->fetch_array()) {
                                                        
                                                        print "<option value = $row[cid]>$row[cname]</option>";
                                                        
                                                        $sql2 = "SELECT * FROM `category` WHERE `parent_id` = '$row[cid]' ";
                                                        $res2 = $db->query($sql2);
                                                        while($row2 = $res2->fetch_array()) {
                                                            print "<option value = $row2[cid]> -- $row2[cname]</option>";
                                                        }
                                                    }
                                                        
                                                ?>
                                            </select></td>
                                	</tr>

                                    <tr>
                                        <td style="padding: 6px;">Product Price</td>
                                        <td style="padding: 6px;"><input type="text" name = "price"
                                                class="form-control" ></td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 6px;">Product Details</td>
                                        <td style="padding: 6px;"><textarea  name = "details"
                                                class="form-control"></textarea></td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 6px;">Product Picture</td>
                                        <td style="padding: 6px;"><input type="file" name = "image"
                                                class="form-control"></td>
                                    </tr>
                                	<tr>
                                		<td style="padding: 6px;"></td>
                                		<td style="padding: 6px;"><input type="submit" value = "Insert Product" class = "btn btn-success" style="color: white;"></td>
                                	</tr>
                                </table>
                           </form>
                                <br><br>
                                
                                    
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

 <?php
 include "lib/footer.php";
 ?>