<?php
    define("TITLE", "Sunshine Life Hotel - Edit");
    define("PAGE", "Edit");
    include "includes/header.php";
?>
    <?php
        include "conn.php";
        if(isset($_SESSION['is_login'])) {
            $email_id = $_SESSION['email_id'];
        }
        else {
            header("Location: login.php");
        }
        $sql = "SELECT first_name, last_name, mobile_number, alternate_mobile_number, email_id, residential_address, permanent_address, aadhaar_card_number FROM registration_form WHERE email_id = '$email_id'";
        $result = $conn->query($sql);
        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $mobile_number = $row['mobile_number'];
            $alternate_mobile_number = $row['alternate_mobile_number'];
            $residential_address = $row['residential_address'];
            $permanent_address = $row['permanent_address'];
            $aadhaar_card_number = $row['aadhaar_card_number'];
        }
        if (isset($_REQUEST["update"])) {
            if ($_POST["first_name"] == "" || $_POST["last_name"] == "" || $_POST["mobile_number"] == "" || $_POST["alternate_mobile_number"] == "" || $_POST["residential_address"] == "" || $_POST["permanent_address"] == "" || $_POST["aadhaar_card_number"] == "") {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Fill all Fields.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            else {
                $first_name_update = $_POST['first_name'];
                $last_name_update = $_POST['last_name'];
                $mobile_number_update = $_POST['mobile_number'];
                $alternate_mobile_number_update = $_POST['alternate_mobile_number'];
                $residential_address_update = $_POST['residential_address'];
                $permanent_address_update = $_POST['permanent_address'];
                $aadhaar_card_number_update = $_POST['aadhaar_card_number'];
                $sql_update = "UPDATE registration_form SET first_name = '$first_name_update', last_name = '$last_name_update', mobile_number = '$mobile_number_update', alternate_mobile_number = '$alternate_mobile_number_update', residential_address = '$residential_address_update', permanent_address = '$permanent_address_update', aadhaar_card_number = '$aadhaar_card_number_update' WHERE email_id = '$email_id'";
                if ($conn->query($sql_update) == TRUE) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Successfully Updated.</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><strong>Sorry!</strong> Unable to update due to some technical issue.</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
        }
    ?>
    <!-- Registraation form starts here -->
    <div class="container my-3">
        <form class="row g-3" action="requester_edit.php" method="post">
            <!-- Customer First Name -->
            <div class="col-md-12">
                <label for="first_customer_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_customer_name" name="first_name"
                    value="<?php echo $first_name ?>">
            </div>
            <!-- Customer Last Name -->
            <div class="col-md-12">
                <label for="last_customer_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="Last_customer_name" name="last_name"
                    value="<?php echo $last_name ?>">
            </div>
            <!-- Customer Mobile Number -->
            <div class="col-md-12">
                <label for="mobile_number" class="form-label">Mobile Number</label>
                <input type="number" class="form-control" id="mobile_number" name="mobile_number"
                    value="<?php echo $mobile_number ?>">
            </div>
            <!-- Customer Alternate Mobile Number -->
            <div class="col-md-12">
                <label for="alternate_mobile_number" class="form-label">Alternate Mobile Number</label>
                <input type="number" class="form-control" id="alternate_mobile_number" name="alternate_mobile_number"
                    value="<?php echo $alternate_mobile_number ?>">
            </div>
            <!-- Customer Email -->
            <div class="col-md-12">
                <label for="user-email" class="form-label">Email ID</label>
                <input type="email" class="form-control" id="user-email" name="user_email_id"
                    value="<?php echo $email_id ?>" readonly>
            </div>
            <!-- Customer Residetial Address -->
            <div class="col-12">
                <label for="inputAddress" class="form-label"> Residetial Address</label>
                <input type="text" class="form-control" id="inputAddress" name="residential_address"
                    value="<?php echo $residential_address ?>">
            </div>
            <!-- Customer Permanent Address -->
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Permanent Address</label>
                <input type="text" class="form-control" id="inputAddress2" name="permanent_address"
                    value="<?php echo $permanent_address ?>">
            </div>
            <!-- Customer Aadhaar Card Number -->
            <div class="col-12">
                <label for="Aadhaar" class="form-label">Aadhaar Card Number</label>
                <input type="number" class="form-control" id="Aadhaar" name="aadhaar_card_number"
                    value="<?php echo $aadhaar_card_number ?>">
            </div>
            <!-- Sign in -->
            <div class="col-1">
                <button type="submit" class="btn btn-success" name="update">Update</button>
            </div>
            <!-- Reset -->
            <div class="col-11">
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>
    <!-- Registraation form ends here -->

    <!-- Footer -->
<?php
    include "includes/footer.php";
?>