<?php
include 'conn.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);

  
    $sql = "UPDATE Employees SET name = '$name', address = '$address', salary = '$salary' WHERE id = $id";

    if (mysqli_query($con, $sql)) {
        echo "Record updated successfully";
       
        header("Location: landing.php");
        exit();
    } else {
        die("Error updating record: " . mysqli_error($con));
    }
} else {
    die("Invalid request.");
}


mysqli_close($con);
?>
