<?php session_start(); ?>
<?php 

// @include '../connection.php';

if(isset($_SESSION) && isset($_POST['application_submit'])) {

    require '../connection.php';
    // $status = $_POST['status'];
    // $id = $_SESSION['ID'];
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

    $sql = "INSERT INTO loanapplication (validId, idNum, fullname, bdate, gender, mstatus, email, contact, homeAddress,
     workAddress, yearsEmployed, monthlyIncome, purpose, loanAmount, terms) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($con);
    mysqli_stmt_prepare($stmt, $sql);
    $stmt->bind_param("sisssssissiisii", $validId, $idNum, $fullname, $bdate, $gender, $mstatus, $email, $contact, 
    $homeAddress, $workAddress, $yearsEmployed, $monthlyIncome, $purpose, $loanAmount, $terms);
    $stmt->execute();
    header("Location: ../User/application.php?application-success=Application Filled Successfully");
    exit();

}
// else {
//     header("Location: ../User/application.php?login-error=IT HAS PROBLEMS");
//     exit();
// }


    // require '../connection.php';

    // $validID = $_POST['validId'];
    // $idNumber = $_POST['idNum'];
    // $fullname = $_POST['fullname'];
    // $birthdate = $_POST['bdate'];
    // $gender = $_POST['gender'];
    // $marital_status = $_POST['radio1'];
    // $email = $_POST['email'];
    // $contactNum = $_POST['contact'];
    // $home_address = $_POST['homeAddress'];
    // $work_address = $_POST['workAddress'];
    // $years_employed = $_POST['yearsEmployed'];
    // $monthlyIncome = $_POST['monthlyIncome'];
    // $purpose = $_POST['purpose'];
    // $loan_amount = $_POST['loanAmount'];
    // $terms = $_POST['terms'];

    // $sql = "INSERT INTO loan_application (validID, id_num, fullname, bdate, gender, mstatus, email,
    // contact_num, home_address, work_address, yrs_employed, net_income, purpose,
    // loan_amount, terms) VALUES ('$validID', '$idNumber', '$fullname', '$birthdate', '$gender', 
    // '$marital_status', '$email', '$contactNum', '$home_address', '$work_address', '$years_employed, '$monthlyIncome',
    // '$purpose', '$loan_amount', '$terms');";
    // if (mysqli_query($con, $sql)) {
    //     echo "New record created successfully!";
    //     header('Location: viewloan.php');
    // }
    // else {
    //     echo "Error: " . $sql . " " . mysqli_error($con);
    // }
    // mysqli_close($con);

    
?>