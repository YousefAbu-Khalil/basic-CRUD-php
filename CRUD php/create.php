<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript CRUD Application With Local Storage</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <style>
        body {
            background: #1d2630;
        }
        * {
            color: #fff;
        }
        #Update {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5 mb-5">Employees Details</h2>
        <div class="mb-5">
            <div class="row">
                
                <form action="create.php" method="post">
                    <div class="form-group col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required />
                    </div>
                   
                    <div class="form-group col-md-6 mb-3">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" required />
                    </div>
                 
                    <div class="form-group col-md-6 mb-3">
                        <label for="salary">Salary</label>
                        <input type="text" name="salary" class="form-control" placeholder="Enter Salary" required />
                    </div>
                 
                    <div class="col-lg-12 mt-5">
                        <button type="submit" class="btn btn-success" id="Submit">Add Data</button>
                        <button type="button" class="btn btn-primary" id="Update">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <hr />
    </div>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'conn.php';

    
    $sql = "CREATE TABLE IF NOT EXISTS Employees (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        address VARCHAR(50) NOT NULL,
        salary VARCHAR(30) NOT NULL
    )";
    if (mysqli_query($con, $sql)) {
        echo "Table created successfully";
    } else {
        die("Error creating table: " . mysqli_error($con));
    }

    
    $name = ($_POST['name']);
    $address = ($_POST['address']);
    $salary = ($_POST['salary']);

    $sql2 = "INSERT INTO Employees (name, address, salary) VALUES ('$name', '$address', '$salary')";
    if (mysqli_query($con, $sql2)) {
       
        header("Location: landing.php");
        exit();
    } else {
        die("Error inserting data: " . mysqli_error($con));
    }

    
    mysqli_close($con);
}
?>
