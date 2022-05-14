<?php
    define("TITLE", "Sunshine Life Hotel - Register");
    define("PAGE", "Register");
    include "includes/header.php";
?>
    <?php
        // Including Connection File
        include "conn.php";
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $mobile_number = $_POST["mobile_number"];
            $alternate_mobile_number = $_POST["alternate_mobile_number"];
            $user_email_id = $_POST["user_email_id"];
            $residential_address = $_POST["residential_address"];
            $permanent_address = $_POST["permanent_address"];
            $aadhaar_card_number = $_POST["aadhaar_card_number"];
            $user_password = $_POST["user_password"];
            $cpassword = $_POST["cpassword"];
            // Weather the feilds are remain empty or not
            if(empty($first_name)||empty($last_name)||empty($mobile_number)||empty($alternate_mobile_number)||empty($user_email_id)||empty($residential_address)||empty($permanent_address)||empty($aadhaar_card_number)||empty($user_password)||empty($cpassword)){
                echo '<div class="alert alert-warning alert-dismissible show fade" role="alert">Please Fill the all feilds<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
            else {
                if(!(substr($user_email_id, "-4") == ".com")){
                    echo '<div class="alert alert-warning alert-dismissible show fade" role="alert">Please Enter Valid Email-id<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else {
                    if ($user_password == $cpassword) {
                        $reg_sql = "INSERT INTO `registration_form` (`first_name`, `last_name`, `mobile_number`, `alternate_mobile_number`, `email_id`, `residential_address`, `permanent_address`, `aadhaar_card_number`, `user_password`, `confirm_password`) VALUES ('$first_name', '$last_name', '$mobile_number', '$alternate_mobile_number', '$user_email_id', '$residential_address', '$permanent_address', '$aadhaar_card_number', '$user_password', '$cpassword')";
                        $reg_result = mysqli_query($conn, $reg_sql);
                        if ($reg_result) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Congratulation!</strong> You are the new customer of our hotel.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Sorry!</strong> Registration is not Successful, because' . mysqli_connect_error($conn) . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Sorry!</strong> Password and Confirm Password should be same.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    }
                }
            }
        }
        
    ?>
    <!-- Registraation form starts here -->
    <div class="container my-3">
        <form class="row g-3" action="register.php" method="post">
            <!-- Customer First Name -->
            <div class="col-md-12">
                <label for="first_customer_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_customer_name" name="first_name">
            </div>
            <!-- Customer Last Name -->
            <div class="col-md-12">
                <label for="last_customer_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="Last_customer_name" name="last_name">
            </div>
            <!-- Customer Mobile Number -->
            <div class="col-md-12">
                <label for="mobile_number" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="mobile_number" name="mobile_number" maxlength="10">
            </div>
            <!-- Customer Alternate Mobile Number -->
            <div class="col-md-12">
                <label for="alternate_mobile_number" class="form-label">Alternate Mobile Number</label>
                <input type="text" class="form-control" id="alternate_mobile_number" name="alternate_mobile_number" maxlength="10">
            </div>
            <!-- Customer Email -->
            <div class="col-md-12">
                <label for="user-email" class="form-label">Email ID</label>
                <input type="email" class="form-control" id="user-email" name="user_email_id" required>
                <small>We'll never share your email with anyone else.</small>
            </div>
            <!-- Customer Residetial Address -->
            <div class="col-12">
                <label for="inputAddress" class="form-label"> Residetial Address</label>
                <input type="text" class="form-control" id="inputAddress" name="residential_address">
            </div>
            <!-- Customer Permanent Address -->
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Permanent Address</label>
                <input type="text" class="form-control" id="inputAddress2" name="permanent_address">
            </div>
            <!-- Customer Aadhaar Card Number -->
            <div class="col-12">
                <label for="Aadhaar" class="form-label">Aadhaar Card Number</label>
                <input type="text" class="form-control" id="Aadhaar" name="aadhaar_card_number" maxlength="12">
            </div>
            <!-- Customer Password -->
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="user_password" name="user_password">
            </div>
            <!-- Customer Confirm Password -->
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
            </div>
            <!-- Sign in -->
            <div class="col-1">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
            <!-- Clear -->
            <div class="col-11">
                <button type="reset" class="btn btn-secondary">Clear</button>
            </div>
        </form>
    </div>
    <!-- Registraation form ends here -->

    <!-- Footer -->
<?php
    include "includes/footer.php";
?>