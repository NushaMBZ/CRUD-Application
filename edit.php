<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "dbcrud");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['edit'])) {
    $edit = $_GET['edit'];

    // Fetch existing data for the specified id
    $sql = "SELECT * FROM student WHERE id = '$edit'";
    $run = mysqli_query($connection, $sql);

    if ($run && mysqli_num_rows($run) > 0) {
        $row = mysqli_fetch_assoc($run);
        $f_name = $row['f_name'];
        $l_name = $row['l_name'];
        $email = $row['email'];
    } else {
        echo "Record not found.";
        exit;
    }
}

if (isset($_POST['submit'])) {
    $edit = $_GET['edit'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];

    // Update data in the database
    $sql = "UPDATE student SET f_name = '$f_name', l_name = '$l_name', email = '$email' WHERE id = '$edit'";

    if (mysqli_query($connection, $sql)) {
        // Redirect to index.php after successful update
        header("Location: index.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Crud Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1>Student Crud Application</h1>
                    </div>
                    <div class="card-body">
                        <form action="edit.php?edit=<?php echo $edit; ?>" method="post">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="f_name" class="form-control" placeholder="Enter First Name" value="<?php echo $f_name; ?>">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="l_name" class="form-control" placeholder="Enter Last Name" value="<?php echo $l_name; ?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>">
                            </div>
                            <br>
                            <input type="submit" class="btn btn-primary" name="submit" value="Edit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
