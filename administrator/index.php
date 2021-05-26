<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="robots" content="noindex,nofollow">
    <title>Sweet Admin Section</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
   <link href="css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>



<!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <div class="white-box">

                            <br><br><br><br>
                            <h1 class="box-title" align = center>Administrator Login</h1>

                            <div class="alert alert-primary" role="alert">
                              <?php (isset($_GET['msg']))? print $_GET['msg'] :""; ?> 
                            </div>
                             

                              <form class="form-horizontal form-material" method="post" action="verify.php">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">User Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name = "username"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                   <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" name = "password"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                   
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                        	<input type="submit" class="btn btn-success" value = "Login">
                                        </div>
                                    </div>
                                </form>

                        </div>
                    </div>
                     <div class="col-md-4">
                    </div>
                </div>
                <!-- ============================================================== -->

    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="plugins/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>

</html>