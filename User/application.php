<?php

@include '../connection.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loan Management System</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">

    <!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
    <script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

    <!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

    <!-- Inline CSS based on choices in "Settings" tab -->
    <style>
        .bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form {
            font-family: Arial, Helvetica, sans-serif; 
            color: black
        }
        .bootstrap-iso form button, .bootstrap-iso form button:hover {
            color: white !important;
        } 
        .asteriskField {
            color: red;
        }
    </style>

    <!-- Extra JavaScript/CSS added manually in "Settings" tab -->
    <!-- Include jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script>
        $(document).ready(function(){
            var date_input=$('input[name="date"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        })
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="../dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">LMS</span>
            </a>
            
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../dist/img/avatar.png" class="img-square elevation-3"  alt="User Image">   
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION['user_name'] ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="application.php" class="nav-link active">
                                <i class="nav-icon fas fa-list-alt"></i>
                                <p>Apply For Loan</p>
                            </a>
                        </li>
                        <!-- </li> -->
                        <li class="nav-item">
                            <a href="viewloan.php" class="nav-link">
                                <i class="nav-icon fas fa-list-alt"></i>
                                <p>View Loan</p>
                            </a>
                        </li>
                <!-- <li class="nav-item">
                    <a href="amortization.php" class="nav-link">
                    <i class="nav-icon fas fa-funnel-dollar"></i>
                    <p>Loan Amortization</p>
                    </a>
                </li> -->
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            <!-- /.sidebar-menu -->
            </div>
        <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Loan Application Form</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Loan Application Form</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Please fill up the following</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="../includes/loan_application.inc.php" method="POST">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <input id="status" type="hidden" name="status" value="PENDING">
                                        </div>
                                        <div class="form-group">
                                            <input id="username" type="hidden" name="username" value="<?php echo $_SESSION['user_name'] ?>">
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Type of Valid ID<span class="asteriskField"> *</span></label>
                                                <select class="form-control" name="validId" required>
                                                    <option>Philippine Passport</option>
                                                    <option>Driver's License</option>
                                                    <option>SSS or UMID Card</option>
                                                    <option>GSIS ID</option>
                                                    <option>PRC ID</option>
                                                    <option>National ID</option>
                                                    <option>Tax Identification Number (TIN)</option>
                                                    <option>Student ID</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Add Image of ID</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Document ID Number<span class="asteriskField"> *</span></label>
                                                <input type="number" min="10000" max="99999999999999" class="form-control" name="idNum" placeholder="Type your ID Number here..." required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Full Name (as per the document)<span class="asteriskField"> *</span></label>
                                                <input type="text" class="form-control" name="fullname" id="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="date">Date of Birth<span class="asteriskField"> *</span></label>
                                                <div class="input-group">
                                                    <input class="form-control" type="date" name="bdate" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Gender<span class="asteriskField"> *</span></label>
                                                <select name="gender" class="form-control" required>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Marital Status<span class="asteriskField"> *</span></label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="mstatus" value="Single" checked required>
                                                    <label class="form-check-label">Single</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="mstatus" value="Married">
                                                    <label class="form-check-label">Married</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="mstatus" value="Widowed">
                                                    <label class="form-check-label">Widowed</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="mstatus" value="Other">
                                                    <label class="form-check-label">Other</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>E-mail<span class="asteriskField"> *</span></label>
                                                <input type="email" name="email" class="form-control" id="" placeholder="ex: myname@example.com" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Contact Number<span class="asteriskField"> *</span></label>
                                                <input type="number" name="contact" class="form-control" id="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Home Address<span class="asteriskField"> *</span></label>
                                                <input type="text" name="homeAddress" class="form-control" id="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Place of Work<span class="asteriskField"> *</span></label>
                                                <input type="text" name="workAddress" class="form-control" id="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Years Employed<span class="asteriskField"> *</span></label>
                                                <input type="number" name="yearsEmployed" class="form-control" id="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Monthly Net Income<span class="asteriskField"> *</span></label>
                                                <input type="number" min="1000" max="99999999999999" name="monthlyIncome" class="form-control" id="" placeholder="in Philippine Peso" required>
                                            </div>
                                        </div>
                                        <h3 class="mt-4 mb-4">Loan Details</h3>
                                        <!-- <div class="col-12">
                                            <div class="form-group">
                                                <label>Purpose<span class="asteriskField"> *</span></label>
                                                <input type="text" name="purpose" class="form-control" id="" placeholder="Enter Purpose .." required>
                                            </div>
                                        </div> -->
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Purpose<span class="asteriskField"> *</span></label>
                                                <select name="purpose" class="form-control" required>
                                                    <option>Personal Loan</option>
                                                    <option>Home Loan</option>
                                                    <option>Education Loan</option>
                                                    <option>Business Loan</option>
                                                    <option>Car Loan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Requested Loan Amount<span class="asteriskField"> *</span></label>
                                                <input type="number" min="1000" max="99999999999999" name="loanAmount" class="form-control" id="" placeholder="ex. 10000" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Terms (in months)<span class="asteriskField"> *</span></label>
                                                <!-- <input type="number" name="terms" class="form-control" id="" placeholder="ex. 6" required>  -->
                                                <select name="terms" class="form-control" required>
                                                    <option>1 months</option>
                                                    <option>3 months</option>
                                                    <option>6 months</option>
                                                    <option>9 months</option>
                                                    <option>12 months</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" name="application_submit">Submit</button>
                                        <!-- <a href="typeOfLoans.php">
                                            <button class="btn btn-primary float-right">Back</button>
                                        </a> -->
                                        <button class="btn btn-primary float-right" formaction="dashboard.php">Back</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Footer <a href="">Web-Based Loan Management System</a>.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Footer</b>
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
</body>
</html>
