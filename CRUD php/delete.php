<?php
include 'conn.php';


if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    
    $sql = "DELETE FROM Employees WHERE id = $id";

    if (mysqli_query($con, $sql)) {
        echo "Record deleted successfully";
   
        header("Location: landing.php");
        exit();
    } else {
        die("Error deleting record: " . mysqli_error($con));
    }
} else {
    die("ID not specified.");
}


mysqli_close($con);
?>
