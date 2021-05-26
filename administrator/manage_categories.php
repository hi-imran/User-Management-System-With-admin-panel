<?php
include "lib/connection.php";
include "lib/login_check.php";

if(isset($_GET['del_id'])) {
    $sql = "DELETE FROM `category` WHERE `cid` = $_GET[del_id]";
    $db->query($sql);
    $msg = "Category Deleted successfully";
}

include "lib/header.php";
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

                                <div align = right><a href="add_category.php"
                                class="btn btn-primary ">Add New Category</a>
                                </div>

                                <?php
                                if(isset($msg))
                                    print ' <div class="alert alert-success" role="alert">'.$msg.'</div>';
                                ?>
                                <h3 class="box-title">Manage Categories</h3>
                                

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Category</th>
                                            <th class="border-top-0">Parent Name</th>
                                            <th class="border-top-0">Edit</th>
                                            <th class="border-top-0">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

    <?php

    $sql = "SELECT * FROM `category` WHERE 1";
    $res = $db->query($sql);
    while($row = $res->fetch_array()) {
        
        $sql2 = "SELECT * FROM `category` WHERE `cid` = '$row[parent_id]' ";
        $res2 = $db->query($sql2);
        $row2 = $res2->fetch_array();

        if(!isset($row2['cname']))
            $row2['cname'] = "Top Level";

        print "
                <tr>
                    <td>$row[cid]</td>
                    <td><b>$row[cname]</b></td>
                    <td>$row2[cname]</td>
                    <td><a href = edit_category.php?edit_id=$row[cid]>Edit</a></td>
                    <td><a href = manage_categories.php?del_id=$row[cid] onclick = \"return confirm('Are you sure');\">Delete</a></td>
                </tr> ";
    }
    ?>
                                       
                                    </tbody>
                                </table>
                            </div>
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