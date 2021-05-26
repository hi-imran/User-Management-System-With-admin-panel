<?php
include "lib/connection.php";
include "lib/login_check.php";
include "lib/header.php";

if(isset($_POST['cname'])) {
    $sql = "UPDATE `category`SET `cname` = '$_POST[cname]', `parent_id`= '$_POST[parent_id]' WHERE `cid` = '$_POST[cid]' ";
    $db->query($sql);
    $msg = "Updated <b>$_POST[cname]</b> successfully";

    $_GET['edit_id'] = $_POST['cid'];
}

$sqlX = "SELECT * FROM `category` WHERE `cid` = '$_GET[edit_id]' ";
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
                                

                                <div align = right><a href="manage_categories.php"
                                class="btn btn-primary ">Manage Category</a>
                                </div>

							<h3 class="box-title"> &nbsp;Edit Category</h3>
							<form class="form-horizontal form-material" method = "post" action = "edit_category.php">
                            <input type="hidden" name = "cid"
                                                class="form-control" required value = "<?php print $rowX['cid'];?>">    
                                <table>
                                	<tr>
                                		<td style="padding: 6px;">Category Name</td>
                                		<td style="padding: 6px;"><input type="text" name = "cname"
                                                class="form-control" required value = "<?php print $rowX['cname'];?>"></td>
                                	</tr>
                                	<tr>
                                		<td style="padding: 6px;">Category Parent</td>
                                		<td style="padding: 6px;">
                                			<select name = "parent_id" class="form-control">
                                                <option value = 0>Top Level Category</option>
                                                <?php
                                                 $sql = "SELECT * FROM `category` WHERE `parent_id` = 0";
                                                    $res = $db->query($sql);
                                                    while($row = $res->fetch_array()) {
                                                        

                                                        if($rowX['parent_id'] == $row['cid'])
                                                            print "<option value = $row[cid] SELECTED>$row[cname]</option>";
                                                        else
                                                             print "<option value = $row[cid]>$row[cname]</option>";
                                                        

                                                        $sql2 = "SELECT * FROM `category` WHERE `parent_id` = '$row[cid]' ";
                                                        $res2 = $db->query($sql2);
                                                        while($row2 = $res2->fetch_array()) {

                                                            if($rowX['parent_id'] == $row2['cid'])
                                                                print "<option SELECTED value = $row2[cid]> -- $row2[cname]</option>";
                                                            else
                                                                 print "<option value = $row2[cid]> -- $row2[cname]</option>";
                                                        }
                                                    }
                                                        
                                                ?>
                                            </select></td>
                                	</tr>
                                	<tr>
                                		<td style="padding: 6px;"></td>
                                		<td style="padding: 6px;"><input type="submit" value = "Edit Category" class = "btn btn-success" style="color: white;"></td>
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