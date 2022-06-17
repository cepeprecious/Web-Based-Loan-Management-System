<?php
include_once '../connection.php';
$sql = "DELETE FROM loanapplication WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($con, $sql)) {
    // echo "Record deleted successfully";
    header('location: application.php?application-deleted=Application deleted Successfully');
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
mysqli_close($con);
?>