<?php session_start(); ?>
<?php
    if(isset($_GET['approved'])) {
        require '../connection.php';
        $id = $_SESSION['checkID'];
        $newstatus = 'APPROVED';
        $sql = "UPDATE loanapplication SET status=? WHERE ID=?;";
        $stmt = $con->stmt_init();
        
        if (!($stmt->prepare($sql))) {
            header("Location:view_details.php?admin-error=SQLerrorACCEPT");
            exit();
        }
        else {
            $stmt->bind_param("si", $newstatus, $id);
            $stmt->execute();
            // $_SESSION['view'] = null;
            header("Location:application.php?");
            exit();
        }
        $stmt->close();
        $con->close();
    }
    if(isset($_GET['rejected'])) {
        require '../connection.php';

        $id = $_SESSION['checkID'];
        $newstatus = 'REJECTED';
        $sql = "UPDATE loanapplication SET status=? WHERE ID=?;";
        $stmt = $con->stmt_init();
        
        if (!($stmt->prepare($sql))) {
            header("Location:view_details.php?admin-error=SQLerrorACCEPT");
            exit();
        }
        else {
            $stmt->bind_param("si", $newstatus, $id);
            $stmt->execute();
            $_SESSION['view'] = null;
            header("Location:application.php?");
            exit();
        }
        $stmt->close();
        $con->close();
    }
?>