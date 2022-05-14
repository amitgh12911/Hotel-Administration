<?php
    define("TITLE", "Sunshine Life Hotel - Profile");
    define("PAGE", "Profile");
    include "includes/header.php";
?>
    <?php
        include "conn.php";
        if(isset($_SESSION['is_login'])) {
            $email_id = $_SESSION['email_id'];
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
        }
        else {
            header("Location: login.php");
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-11">
                <h1 class="text-center">Personal Details</h1>
                <div class="row">
                    <div class="col-4 fw-bold fs-3">First Name</div>
                    <div class="col-4 text-center mt-3">-</div>
                    <div class="col-4 mt-3">
                        <?php echo $first_name?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 fw-bold fs-3">Last Name</div>
                    <div class="col-4 text-center mt-3">-</div>
                    <div class="col-4 mt-3">
                        <?php echo $last_name?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 fw-bold fs-3">Mobile Number</div>
                    <div class="col-4 text-center mt-3">-</div>
                    <div class="col-4 mt-3">
                        <?php echo $mobile_number?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 fw-bold fs-3">Alternate Mobile Number</div>
                    <div class="col-4 text-center mt-3">-</div>
                    <div class="col-4 mt-3">
                        <?php echo $alternate_mobile_number?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 fw-bold fs-3">Email Id</div>
                    <div class="col-4 text-center mt-3">-</div>
                    <div class="col-4 mt-3">
                        <?php echo $email_id?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 fw-bold fs-3">Residential Address</div>
                    <div class="col-4 text-center mt-3">-</div>
                    <div class="col-4 mt-3">
                        <?php echo $residential_address?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 fw-bold fs-3">Permanent Address</div>
                    <div class="col-4 text-center mt-3">-</div>
                    <div class="col-4 mt-3">
                        <?php echo $permanent_address?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 fw-bold fs-3">Aadhaar Card Number</div>
                    <div class="col-4 text-center mt-3">-</div>
                    <div class="col-4 mt-3">
                        <?php echo $aadhaar_card_number?>
                    </div>
                </div>
                <button class="btn btn-primary d-block mx-auto my-3" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
            </div>
        </div>
    </div>
    <!-- Footer -->
<?php
    include "includes/footer.php";
?>