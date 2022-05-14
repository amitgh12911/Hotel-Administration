<?php
    define("TITLE", "Sunshine Life Hotel - Forgot Password");
    include "conn.php";
    include "includes/header.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_email_id = $_POST['user_email_id'];
        $new_password = $_POST['new_password'];
        $confirm_new_password = $_POST['confirm_new_password'];
        if($user_email_id != "" || $new_password != "" || $confirm_new_password != ""){
            if($new_password === $confirm_new_password){
                $sql_update = "UPDATE `registration_form` SET `user_password` = '$new_password', `confirm_password` = '$confirm_new_password' WHERE `email_id` = '$user_email_id'";
                $result = mysqli_query($conn, $sql_update);
                if($result) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Congratulation!</strong> Successfully Updated.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> New Password and Confirm Password should be same.
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
<div class="container my-5">
    <form action="forget_password.php" method="post">
    <div class="row mb-3">
        <label for="user_email_id" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="email" class="form-control" id="user_email_id" name="user_email_id">
        </div>
    </div>
    <div class="row mb-3">
        <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="new_password" name="new_password">
        </div>
    </div>
    <div class="row mb-3">
        <label for="confirm_new_password" class="col-sm-2 col-form-label">Confirm New Password</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password">
        </div>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
<?php
    include "includes/footer.php";
?>