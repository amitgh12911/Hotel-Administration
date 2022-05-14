<?php
    define("TITLE", "Sunshine Life Hotel - Login");
    define("PAGE", "Login");
    include "includes/header.php";
?>
    <?php
        include "conn.php";
        if(!isset($_SESSION['is_login'])){
            if (isset($_REQUEST["email_id"])) {
                $email_id = mysqli_real_escape_string($conn, trim($_POST["email_id"]));
                $user_password = mysqli_real_escape_string($conn, trim($_POST["user_password"]));
                $sql = "SELECT email_id, user_password FROM registration_form WHERE email_id = '" . $email_id . "' AND user_password = '" . $user_password . "' LIMIT 1";
                $result = $conn->query($sql);
                if ($result->num_rows == 1) {
                    $_SESSION['is_login'] = true;
                    $_SESSION['email_id'] = $email_id;
                    header("Location: index.php");
                    exit;
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!</strong> Login Failed, Enter valid Email or Password.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
            }
        }else {
            header("Location: index.php");
        }
    ?>
    <div class="container text-center mt-4">
        <h3><i style="font-style: normal; font-family: FontAwesome; margin: 0 10px;">&#xf2be;</i>Login</h3>
    </div>
    <div class="container my-4" style="height: 65vh;">
        <form method="post" action="login.php">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email_id" name="email_id">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="user_password" name="user_password">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Log in</button>
            <a href="register.php" class= "btn btn-danger">Register</a>
            <a href="forget_password.php" class= "btn btn-primary">Forget Password</a>
        </form>
    </div>
    <!-- Footer -->
<?php
    include "includes/footer.php";
?>