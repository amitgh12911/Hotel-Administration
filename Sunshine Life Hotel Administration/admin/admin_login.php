<?php
    // define("TITLE", "Sunshine Life Hotel - Admin Login");
    // define("PAGE", "Admin Login");
    // include "includes/header.php";
    session_start();
    include "conn.php";
    if(!isset($_SESSION['is_admin_login'])) {
        if(isset($_REQUEST["admin_email_id"])) {
            $admin_email_id = mysqli_real_escape_string($conn, trim($_POST["admin_email_id"]));
            $admin_password = mysqli_real_escape_string($conn, trim($_POST["admin_password"]));
            $sql = "SELECT admin_email_id, admin_password FROM admin_details WHERE admin_email_id = '" . $admin_email_id . "' AND admin_password = '" . $admin_password . "' LIMIT 1";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $_SESSION['is_admin_login'] = true;
                $_SESSION['admin_email_id'] = $admin_email_id;
                header("Location: dashboard.php");
                exit;
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!</strong> Login Failed, Enter valid Email or Password.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }
    }else {
        header("Location: dashboard.php");
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
            <h3><i style="font-style: normal; font-family: FontAwesome; margin: 0 10px;">&#xf2be;</i>Admin Login</h3>
        </div>
        <div class="container my-4" style="height: 65vh;">
            <form action="admin_login.php" method="POST">
                <div class="row mb-3">
                    <label for="admin_email_id" class="col-sm-2 col-form-label">Admin Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="admin_email_id" name="admin_email_id">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="admin_password" class="col-sm-2 col-form-label">Admin Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="admin_password" name="admin_password">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Admin Log in</button>
                <a href="admin_forgot_password.php" class="btn btn-primary">Admin Forgot Password</a>
            </form>
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    </body>
</html>