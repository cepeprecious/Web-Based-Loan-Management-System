<?php

@include '../connection.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loan Management with SMS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
</head>

<body class="sidebar-mini">
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
                        <a href="#" class="d-block"><?php echo $_SESSION['admin_name'] ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Loan<i class="fas fa-angle-left right"></i><span class="badge badge-info right"></span></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="application.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Applications</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Application</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Loan</a></li>
                                <li class="breadcrumb-item active">Application</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Loan Application Details</h3>
                                </div>
                                <div class="card-body">
                                    <!--###################### PHP CODE##################### -->
                                    <?php
                                    // echo "<h3>Application ID : ".$_GET['id']."</h3>";

                                    if(isset($_GET['view']) && isset($_SESSION['view'])) {
                                        require '../connection.php';
                                        $id = $_GET['id'];
                                        $_SESSION['checkID'] = $_GET['id'];
                                        $sql = "SELECT * FROM loanapplication WHERE id=?";
                                        $stmt = $con->stmt_init();

                                        echo "<title>Transaction ID : ".$_GET['id']."</title>";

                                        if (!($stmt->prepare($sql))) {
                                            header("Location:view_details.php?admin-error=SQLerrorADMIN");
                                            exit();
                                        }
                                        else {
                                            $stmt->bind_param("i", $id);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            if($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $validId = $row['validId'];
                                                $idNum = $row['idNum'];
                                                $fullname = $row['fullname'];
                                                $bdate = $row['bdate'];
                                                $gender = $row['gender'];
                                                $mstatus = $row['mstatus'];
                                                $email = $row['email'];
                                                $contact = $row['contact'];
                                                $homeAddress = $row['homeAddress'];
                                                $workAddress = $row['workAddress'];
                                                $yearsEmployed = $row['yearsEmployed'];
                                                $monthlyIncome = $row['monthlyIncome'];
                                                $purpose = $row['purpose'];
                                                $loanAmount = $row['loanAmount'];
                                                $terms = $row['terms'];
                                                $status = $row['status'];
                                            }
                                        }
                                        $stmt->close();
                                        $con->close();
                                    }
                                    // else {
                                    //     header("Location:view_details.php");
                                    //     exit();
                                    // }
                                    ?>
                                    <!--###################### HTML ##################### -->
                                    <form action="options.php" method="GET">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label style="color:darkcyan" for="status">Status</label>
                                                    <input type="text" class="form-control" name="status" id="status" style="font-weight: bold;" disabled value="<?php echo $status; ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="validId">Valid ID</label>
                                                    <input type="text" class="form-control" name="validId" disabled value="<?php echo $validId; ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="idNum">Identification Number</label>
                                                    <input type="text" class="form-control" name="idNum" disabled value="<?php echo $idNum; ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="fullname">Name</label>
                                                    <input type="text" class="form-control" name="fullname" disabled value="<?php echo $fullname; ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="bdate">Date of Birth</label>
                                                    <input type="text" class="form-control" name="bdate" disabled value="<?php echo $bdate; ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <input type="text" class="form-control" name="gender" disabled value="<?php echo $gender; ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="mstatus">Marital Status</label>
                                                    <input type="text" class="form-control" name="mstatus" disabled value="<?php echo $mstatus; ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control" name="email" disabled value="<?php echo $email; ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="contact">Contact Number</label>
                                                    <input type="text" class="form-control" name="contact" disabled value="<?php echo $contact; ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="homeAddress">Home Address</label>
                                                    <input type="text" class="form-control" name="homeAddress" disabled value="<?php echo $homeAddress; ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="workAddress">Work Address</label>
                                                    <input type="text" class="form-control" name="workAddress" disabled value="<?php echo $workAddress; ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="yearsEmployed">Years Employed</label>
                                                    <input type="text" class="form-control" name="yearsEmployed" disabled value="<?php echo $yearsEmployed; ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="monthlyIncome">Monthly Income</label>
                                                    <input type="text" class="form-control" name="monthlyIncome" disabled value="<?php echo $monthlyIncome; ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="purpose">Purpose</label>
                                                    <input type="text" class="form-control" name="purpose" disabled value="<?php echo $purpose; ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="loanAmount">Requested Loan Amount</label>
                                                    <input type="text" class="form-control" name="loanAmount" disabled value="<?php echo $loanAmount; ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="terms">Terms</label>
                                                    <input type="text" class="form-control" name="terms" disabled value="<?php echo $terms; ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 mt-4 d-flex text-center">
                                                <button class="btn btn-primary mr-3" name="approved" type="submit" value="Accepted">Approved</button>
                                                <br>
                                                <button class="btn btn-danger mr-3" name="rejected" type="submit" value="Rejected">Rejected</button>
                                                <br>
                                                <button class="btn btn-secondary" name="back" type="submit" value="Back" formaction="application.php">Back</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
        </div>
        <!-- /.content -->
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
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": [""]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
    });
</script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
<!-- <script>
	$('.view_loan').click(function(){
		uni_modal("View Loan","view_details.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.delete_loan').click(function(){
		_conf("Are you sure to delete this data?","delete_loan",[$(this).attr('data-id')])
	})
function delete_loan($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_loan',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Loan successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	}
</script> -->
</body>
</html>