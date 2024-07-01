<?php
   $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"dbcrud");

    if(isset($_POST['submit']))
        {
          $f_name = $_POST['f_name'];
          $l_name = $_POST['l_name'];
         $email = $_POST['email'];

           $sql = "insert into student(f_name,l_name,email)values(' $f_name',' $l_name',' $email')";

           if(mysqli_query($connection,$sql))
           {
                  echo '<script> location.replace("index.php")</script>';
           }
           else
           {
           echo "Some thing Error" . $connection->error;
           }
        }
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
                        <h1> Student Crud Application </h1>
                    </div>
                    <div class="card-body">

                    <form action="add.php" method="post">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="f_name" class="form-control"  placeholder="Enter First Name">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="l_name" class="form-control"  placeholder="Enter Last Name">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name ="email" class="form-control"  placeholder="Enter Email">
                        </div>
                        <br/>
                        <input type="submit" class="btn btn-primary" name="submit" value="Register">
                        </form>

                    </div>
                    </div>

                </div>

            </div>
        </div>

</body>
</html>
