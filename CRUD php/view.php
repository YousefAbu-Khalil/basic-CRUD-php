<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User Info</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: #f8f9fa;
            color: #333;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            padding: 20px;
            border-radius: 8px;
        }
        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-body label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                User Information
            </div>
            <div class="card-body">
                <?php
                include 'conn.php';

               
                if (isset($_GET['id'])) {
                    $id = intval($_GET['id']); 

                   
                    $sql = "SELECT * FROM Employees WHERE id = $id";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input readonly type="text" name="id" class="form-control-plaintext" id="id" value="<?php echo $row['id']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input readonly type="text" name="name" class="form-control-plaintext" id="name" value="<?php echo $row['name']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input readonly type="text" name="address" class="form-control-plaintext" id="address" value="<?php echo $row['address']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary</label>
                            <input readonly type="text" name="salary" class="form-control-plaintext" id="salary" value="<?php echo $row['salary']; ?>">
                        </div>
                        <a href="landing.php" class="btn btn-primary">Home</a>
                        <?php
                    } else {
                        echo "<div class='alert alert-warning' role='alert'>No record found.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger' role='alert'>ID not specified.</div>";
                }

              
                mysqli_close($con);
                ?>
            </div>
        </div>
    </div>
</body>
</html>
