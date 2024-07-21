<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRUD</title>
    
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    />

    <style>
        body {
            background: #1d2630;
        }
        * {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5 mb-5">Employees Details</h2>
        <a href="create.php" class="btn btn-success">Create</a>
      
        <div class="row mt-5">
            <div class="col-12">
                <table class="table table-bordered" id="crudTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Salary</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'conn.php';

                        $sql = "SELECT id, name, address, salary FROM Employees";
                        $result = mysqli_query($con, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['address']}</td>
                                    <td>{$row['salary']}</td>
                                    <td>
                                        <a class='btn btn-primary' href='view.php?id={$row['id']}'>view</a>
                                        <a class='btn btn-warning' href='edit.php?id={$row['id']}'>Edit</a>
                                        <a class='btn btn-danger' href='delete.php?id={$row['id']}'>Delete</a>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
                        }

                        mysqli_close($con);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
