<?php
    define("TITLE", "Sunshine Life Hotel - Change Password");
    define("PAGE", "Change Password");
    include "includes/header.php";
    include "conn.php";
    if(!isset($_SESSION['is_admin_login'])) {
        header("location: admin_login.php");
    }
    else {
        $admin_email_id = $_SESSION['admin_email_id'];
    }
    $sql = "SELECT admin_email_id, admin_password FROM admin_details WHERE admin_email_id = '$admin_email_id'";
    $result = $conn->query($sql);
    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $user_password = $row['admin_password'];
    }
    if (isset($_REQUEST["change_password"])) {
      if ($_POST["new_password"] == "" || $_POST["confirm_new_password"] == "") {
          $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          Fill all Fields.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
      }
      else {
          $new_password = $_REQUEST["new_password"];
          $confirm_new_password = $_REQUEST["confirm_new_password"];
          if($new_password == $confirm_new_password) {
            $sql_update = "UPDATE admin_details SET admin_password = '$new_password' WHERE admin_email_id = '$admin_email_id'";
            if ($conn->query($sql_update) == TRUE) {
                $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successfully Updated.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            else {
                $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><strong>Sorry!</strong> Unable to update due to some technical issue.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
              }
          } else {
            $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> New Password and Confirm Password should be same.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
          }
      }
  }
?>
    <div class="col-sm-10">
        <div class="container my-3">
            <?php
                if(isset($alert)){
                    echo $alert;
                }
            ?>
        <form class="row g-3" action="change_password.php" method="post">
            <!-- Admin Email Id -->
            <div class="col-md-12">
                <label for="user-email" class="form-label">Admin Email</label>
                <input type="email" class="form-control" id="admin-email" name="admin_email_id"
                    value="<?php  echo $admin_email_id ?>" readonly>
            </div>
            <!-- Customer New Password -->
            <div class="col-md-12">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password">
            </div>
            <!-- Customer Confirm New Password -->
            <div class="col-md-12">
                <label for="confirm_new_password" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password">
            </div>
            <!-- Update -->
            <div class="col-12">
                <button type="submit" class="btn btn-success" name="change_password">Change Password</button>
            </div>
        </form>
        </div>
    </div>
</div>
<?php
    include "includes/footer.php";
?>