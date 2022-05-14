<?php
    define("TITLE", "Sunshine Life Hotel - Contact");
    define("PAGE", "Contact");
    include "conn.php";
    include "includes/header.php";
    if(!isset($_SESSION['is_login']))
    {
        header("Location: login.php");
    }

    if(isset($_SESSION['is_login'])) {
        $email_id = $_SESSION['email_id'];
    }
    else {
        header("Location: login.php");
    }
    $sql = "SELECT first_name, last_name, email_id, mobile_number, alternate_mobile_number FROM registration_form WHERE email_id = '$email_id'";
    $result = $conn->query($sql);
    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email_id = $row['email_id'];
        $mobile_number = $row['mobile_number'];
        $alternate_mobile_number = $row['alternate_mobile_number'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user_message = mysqli_real_escape_string($conn, trim($_REQUEST["user_message"]));
        // Weather the feilds are remain empty or not
        if(empty($user_message)){
            echo '<div class="alert alert-warning alert-dismissible show fade" role="alert">Please Fill the all feilds<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
        else {

            $contact_sql = "INSERT INTO `customer_message` (`first_name`, `last_name`, `mobile_number`, `alternate_mobile_number`, `email_id`, `message`) VALUES ('$first_name', '$last_name', '$mobile_number', '$alternate_mobile_number', '$email_id', '$user_message')";
            $reg_result = mysqli_query($conn, $contact_sql);
            if ($reg_result) {
                $message_to_user = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Your Message is submitted successfully to the Admin.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            } else {
                $message_to_user = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!</strong> Your Message is not submitted successfully to the Admin.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
    }
?>
    <!-- Contact Form -->
    <div class="container my-5">
        <form class="row g-3" action="contact.php" method="POST">
            <div class="col-md-6">
                <label for="inputFirstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="inputFirstName" value="<?php if(isset($_SESSION['is_login'])) {echo $first_name;}?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="inputLastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="inputLastName" value="<?php if(isset($_SESSION['is_login'])) {echo $last_name;}?>" readonly>
            </div>
            <div class="col-12">
                <label for="user-email" class="form-label">Email ID</label>
                <input type="email" class="form-control" id="user-email" value="<?php if(isset($_SESSION['is_login'])) {echo $email_id;}?>" readonly>
            </div>
            <div class="col-6">
                <label for="inputNumber" class="form-label">Mobile Number</label>
                <input type="tel" class="form-control" id="inputNumber" value="<?php if(isset($_SESSION['is_login'])) {echo $mobile_number;}?>" readonly>
            </div>
            <div class="col-6">
                <label for="inputAlternateNumber" class="form-label">Alternate Mobile Number</label>
                <input type="tel" class="form-control" id="inputAlternateNumber" value="<?php if(isset($_SESSION['is_login'])) {echo $alternate_mobile_number;}?>" readonly>
            </div>
            <div class="mb-3">
                <label for="user_message" class="form-label">Message</label>
                <textarea class="form-control" id="user_message" name="user_message" rows="3"></textarea>
            </div>
            <div class="col-12">
                <input type="submit" class="btn btn-primary" name="user_message-submit" value="Send Request"/>
                <input type="reset" class="btn btn-secondary ms-3" name="user_message-submit" value="Clear"/>
            </div>
            <?php
                if(isset($message_to_user)) {echo $message_to_user;}
            ?>
        </form>
    </div>

    <!-- Footer -->
<?php
    include "includes/footer.php";
?>