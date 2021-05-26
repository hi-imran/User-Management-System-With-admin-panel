<?php
include "lib/connection.php";
include "lib/login_check.php";

if(isset($_GET['del_id'])) {
    $sql = "DELETE FROM `category` WHERE `cid` = $_GET[del_id]";
    //$db->query($sql);
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

                                <?php
                                if(isset($msg))
                                    print ' <div class="alert alert-success" role="alert">'.$msg.'</div>';
                                ?>
                                <h3 class="box-title">Manage <?php print ucfirst($_GET['status']);?> Orders</h3>
                                

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Customer</th>
                                            <th class="border-top-0">Address</th>
                                            <th class="border-top-0">Amount</th>
                                            <th class="border-top-0">Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>

    <?php

    $sql = "SELECT * FROM `orders` WHERE `status` = '$_GET[status]' ";
    $res = $db->query($sql);
    while($row = $res->fetch_array()) {
        
        $sql2 = "SELECT * FROM `customers` WHERE `cust_id` = '$row[cust_id]' ";
        $res2 = $db->query($sql2);
        $row2 = $res2->fetch_array();

        print "
                <tr>
                    <td>$row[order_id]</td>
                    <td>".date("d-M-Y, H:i",$row['timestamp'])."</td>
                    <td>$row2[fullname]</td>
                    <td>$row[shipping_address]</td>
                    <td>".getOrderAmount($row['order_id'])."</td>
                    <td><a href = order_details.php?order_id=$row[order_id]>Details</a></td>
                </tr> ";
    }

    function getOrderAmount($order_id)
    {
        global $db;

        $total = 0;
        $sql = "SELECT * FROM `cart_items` WHERE `order_id` = '$order_id' ";
        $res = $db->query($sql);
        while($row = $res->fetch_array()) {
            $total += $row['quantity'] * $row['purchase_price'];
        }
        return $total;
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