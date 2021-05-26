<?php
include "lib/connection.php";
include "lib/login_check.php";
include "lib/header.php";

if(isset($_POST['name'])) {

    
    $sql = "UPDATE `products` SET `name` = '$_POST[name]', `details` = '$_POST[details]', `price` = '$_POST[price]', `cid` = '$_POST[cid]' WHERE `id` = '$_POST[id]' ;";
    $db->query($sql);

    $id = $_POST['id'];

    if($_FILES['image']['name']) {

        $tmp = explode(".", $_FILES['image']['name']);
        $ext = strtolower(trim(end($tmp)));

        $image_path = "products/".$id."_". $_FILES['image']['name'];

        if($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "gif" ) {
            copy($_FILES['image']['tmp_name'], "../".$image_path);

            //Delete Old Image if any
            $sqlX = "SELECT * FROM `products` WHERE `id` = '$id' ";
            $resX = $db->query($sqlX);
            $rowX = $resX->fetch_array();
            @unlink("../".$rowX['image']);

            $sql = "UPDATE `products` SET  `image` = '$image_path' WHERE `id` = '$id' ";
            $db->query($sql);
        }
    }

    $msg = "Updated <b>$id</b> successfully";

    $_GET['edit_id'] = $id;
}


$sqlX = "SELECT * FROM `products` WHERE `id` = '$_GET[edit_id]' ";
$resX = $db->query($sqlX);
$rowX = $resX->fetch_array();

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
							<form class="form-horizontal form-material" method = "post" action = "edit_product.php" enctype="multipart/form-data">

                                <input type="hidden" name = "id"
                                                class="form-control" required value = "<?php print $rowX['id'];?>"> 

                                <table>
                                	<tr>
                                		<td style="padding: 6px;">Product Name</td>
                                		<td style="padding: 6px;"><input type="text" name = "name"
                                                class="form-control" required value = "<?php print $rowX['name'];?>"></td>
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
                                                        
                                                        if($rowX['cid'] == $row['cid'])
                                                            print "\n <option value = $row[cid] SELECTED>$row[cname]</option>";
                                                        else
                                                            print "\n <option value = $row[cid]>$row[cname]</option>";
                                                        
                                                        $sql2 = "SELECT * FROM `category` WHERE `parent_id` = '$row[cid]' ";
                                                        $res2 = $db->query($sql2);
                                                        while($row2 = $res2->fetch_array()) {
                                                            if($rowX['cid'] == $row2['cid'])
                                                                print "\n <option value = $row2[cid] SELECTED> -- $row2[cname]</option>";
                                                            else
                                                                print "\n <option value = $row2[cid]> -- $row2[cname]</option>";
                                                        }
                                                    }
                                                        
                                                ?>
                                            </select></td>
                                	</tr>

                                    <tr>
                                        <td style="padding: 6px;">Product Price</td>
                                        <td style="padding: 6px;"><input type="text" name = "price"
                                                class="form-control" value = "<?php print $rowX['price'];?>" ></td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 6px;">Product Details</td>
                                        <td style="padding: 6px;"><textarea  name = "details"
                                                class="form-control"><?php print $rowX['details'];?></textarea></td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 6px;" valign="top">Product Picture</td>
                                        <td style="padding: 6px;">

                                            <input type="file" name = "image"
                                                class="form-control">
                                            <br>
                                             Leave blank if you do not want to change the existing picture shown here.
                                            <img src = "../<?php print $rowX['image'];?>" width = 50 align = left>
                                            </td>
                                    </tr>
                                	<tr>
                                		<td style="padding: 6px;"></td>
                                		<td style="padding: 6px;"><input type="submit" value = "Edit Product" class = "btn btn-success" style="color: white;"></td>
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