<?php session_start(); ?>
<?php 

// @include '../connection.php';

if(isset($_SESSION) && isset($_POST['application_submit'])) {

    require '../connection.php';
    // $status = $_POST['status'];
    // $id = $_SESSION['id'];
    // $username = $_POST['username'];
    $validId = $_POST['validId'];
    $idNum = $_POST['idNum'];
    $fullname = $_POST['fullname'];
    $bdate = $_POST['bdate'];
    $gender = $_POST['gender'];;
    $mstatus = $_POST['mstatus'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $homeAddress = $_POST['homeAddress'];
    $workAddress = $_POST['workAddress'];
    $yearsEmployed = $_POST['yearsEmployed'];         
    $monthlyIncome = $_POST['monthlyIncome'];
    $purpose = $_POST['purpose'];
    $loanAmount = $_POST['loanAmount'];
    $terms = $_POST['terms'];
    $status = $_POST['status'];

    $sql = "INSERT INTO loanapplication (validId, idNum, fullname, bdate, gender, mstatus, email, contact, homeAddress,
     workAddress, yearsEmployed, monthlyIncome, purpose, loanAmount, terms, status) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($con);
    mysqli_stmt_prepare($stmt, $sql);
    $stmt->bind_param("sisssssissiisiis", $validId, $idNum, $fullname, $bdate, $gender, $mstatus, $email, $contact, 
    $homeAddress, $workAddress, $yearsEmployed, $monthlyIncome, $purpose, $loanAmount, $terms, $status);
    $stmt->execute();
    header("Location: ../User/application.php?application-success=Application Filled Successfully");
    exit();

}
?>