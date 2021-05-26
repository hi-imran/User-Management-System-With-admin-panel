<?php
include "lib/connection.php";
include "lib/login_check.php";
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
                                <h3 class="box-title">View Customers</h3>
                                

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Customer</th>
                                            <th class="border-top-0">Address</th>
                                            <th class="border-top-0">Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>

    <?php

        $sql = "SELECT * FROM `customers` WHERE 1 ORDER BY `cust_id` DESC";
        $res = $db->query($sql);
        while($row = $res->fetch_array())
        {


            //Find Total Bought
            $total = 0;
            $sql2 = "SELECT * FROM `orders` WHERE `cust_id` = $row[cust_id]";
            $res2 = $db->query($sql2);
            while($row2 = $res2->fetch_array()) {
                $total += getOrderAmount($row2['order_id']);
            }

        print "
                <tr>
                    <td>$row[cust_id]</td>
                    <td>".date("d-M-Y, H:i",$row['timestamp'])."</td>
                    <td>
                    <b>$row[fullname]</b>
                    <br>$row[email]
                    <br>$row[phone]
                    </td>
                    <td>$row[address]</td>
                    <td>$total</td>
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