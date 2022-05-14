<?php
    // define("TITLE", "Sunshine Life Hotel - Forgot Password");
    include "conn.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $admin_email_id = $_POST['admin_email_id'];
        $new_password = $_POST['new_password'];
        $confirm_new_password = $_POST['confirm_new_password'];
        if($admin_email_id != "" || $new_password != "" || $confirm_new_password != ""){
            if($new_password === $confirm_new_password){
                $sql_update = "UPDATE `admin_details` SET `admin_password` = '$new_password' WHERE `admin_email_id` = '$admin_email_id'";
                $result = mysqli_query($conn, $sql_update);
                if($result) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Congratulation!</strong> Successfully Updated.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> New Admin Password and Confirm Admin Password should be same.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> Please fill all the empty feilds.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Fontawesome JavaScript -->
        <script src="https://kit.fontawesome.com/35f8a6764d.js" crossorigin="anonymous"></script>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Personal CSS -->
        <link rel="stylesheet" href="CSS/style.css">
        <title>
            Sunshine Life Hotel - Admin Login
        </title>
    </head>
    <body>
    <div class="container text-center mt-4">
            <h3><i style="font-style: normal; font-family: FontAwesome; margin: 0 10px;">&#xf2be;</i>Admin Forgot Login Password</h3>
        </div>
        <div class="container mt-4">
            <form action="admin_forgot_password.php" method="post">
            <div class="row mb-3">
                <label for="admin_email_id" class="col-sm-2 col-form-label">Admin Email</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="admin_email_id" name="admin_email_id">
                </div>
            </div>
            <div class="row mb-3">
                <label for="new_password" class="col-sm-2 col-form-label">New Admin Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="new_password" name="new_password">
                </div>
            </div>
            <div class="row mb-3">
                <label for="confirm_new_password" class="col-sm-2 col-form-label">Confirm New Admin Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>