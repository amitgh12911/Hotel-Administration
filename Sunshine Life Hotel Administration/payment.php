<?php
    define("PAGE", "payment");
    define("TITLE", "Sunshine Life Hotel - Payment Section");
    include "includes/header.php";
    include "conn.php";
    $room_number = $_POST['room_no'];
    // echo $room_no_value;
    $room_type = $_POST['room_type'];
    $room_rate = $_POST['room_rate'];
    if(isset($_POST['check_in'])) {$check_in_value = $_POST['check_in'];}
    if(isset($_POST['check_out'])) {$check_out_value = $_POST['check_out'];}
    // $sql_room = "SELECT * FROM `room_availability` WHERE `room_type` = '$room_no_value'";
    // $result1 = $conn->query($sql_room);
    // if($result1->num_rows == 1) {
    //     $rows1 = $result1->fetch_assoc();
    //     $room_type = $rows1['room_type'];
    //     $room_rate = $rows1['rate'];
    // }
    $email_id = $_SESSION['email_id'];
    $sql_user_email_id = "SELECT * FROM `registration_form` WHERE `email_id` = '$email_id'";
    $result = $conn->query($sql_user_email_id);
    if($result->num_rows == 1) {
        $rows2 = $result->fetch_assoc();
        $user_name = $rows2['first_name']." ".$rows2['last_name'];
        $user_email_id = $rows2['email_id'];
        $user_mobile_number = $rows2['mobile_number'];
        $user_alternate_mobile_number = $rows2['alternate_mobile_number'];
    }
    // echo $_SESSION['email_id'];
?>
<?php

    // Function to find the difference
    // between two dates.
    function dateDiffInDays($date1, $date2)
    {
        // Calculating the difference in timestamps
        $diff = strtotime($date2) - strtotime($date1);

        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        return abs(round($diff / 86400));
    }

    // Function call to find date difference
    if(isset($check_in_value) && isset($check_out_value)) {$dateDiff = dateDiffInDays($check_in_value, $check_out_value);}

    // Display the result
    // printf("Difference between two dates: "
    // 	. $dateDiff . " Days ");

?>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST["person_name"])) {$person_name = $_POST["person_name"];}
        if(isset($_POST["email_id"])) {$email_id = $_POST["email_id"];}
        if(isset($_POST["mobile_number"])) {$mobile_number = $_POST["mobile_number"];}
        if(isset($_POST["alternate_mobile_number"])) {$alternate_mobile_number = $_POST["alternate_mobile_number"];}
        if(isset($_POST["room_type"])) {$room_type = $_POST["room_type"];}
        if(isset($_POST["room_no"])) {$room_no = $_POST["room_no"];}
        if(isset($_POST["room_rate"])) {$room_rate = $_POST["room_rate"];}
        if(isset($_POST["check_in_value"])) {$check_in_value = $_POST["check_in_value"];}
        if(isset($_POST["check_out_value"])) {$check_out_value = $_POST["check_out_value"];}
        if(isset($_POST["total_amount"])) {$total_amount = $_POST["total_amount"];}
        if(isset($_POST["card_number"])) {$card_number = $_POST["card_number"];}
        if(isset($_POST["expiry"])) {$expiry = $_POST["expiry"];}
        if(isset($_POST["cvv_or_cvc"])) {$cvv_or_cvc = $_POST["cvv_or_cvc"];}
        // Weather the feilds are remain empty or not
        if(empty($card_number) || empty($expiry) || empty($cvv_or_cvc)) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Fill all Fields.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        else {
            $sql_pay = "INSERT INTO `payment_details` (`person_name`, `email_id`, `mobile_number`, `alternate_mobile_number`, `room_type`, `room_no`, `room_rate`, `check_in_value`, `check_out_value`, `total_amount`, `card_number`, `expiry`, `cvv_or_cvc`) VALUES ('$person_name', '$email_id', '$mobile_number', '$alternate_mobile_number', '$room_type', '$room_no', '$room_rate', '$check_in_value', '$check_out_value', '$total_amount', '$card_number', '$expiry', '$cvv_or_cvc')";
            if ($conn->query($sql_pay) == TRUE) {
                echo '<div class="alert alert-success alert-dismissible fade show d-none" role="alert">
                <strong>Successfully Paid.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><strong>Sorry!</strong> Unable to proced the payment due to some technical issue.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            $sql_update = "UPDATE `room_availability` SET `availability` = '0' WHERE `room_no` = '$room_no'";
            if ($conn->query($sql_update) == TRUE) {
                echo '<div class="alert alert-success alert-dismissible fade show d-none" role="alert">
                    <strong>Successfully Updated.</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                
                echo "<script>location.href = 'payment_success.php';</script>";
            }
        }
    }
?>

<div class="container my-5">
    <div class="card text-center">
        <h1 class="card-header">
            Payment Details
        </h1>
        <div class="card-body d-flex justify-content-center">
            <div class="w-50">
                <form action="payment.php" method="post" class="text-start">
                    <label for="person_name" class="form-label fs-5">Person Name:</label>
                    <input type="text" class="form-control" id="person_name" name="person_name"
                        value="<?php echo $user_name?>" readonly>
                    <label for="email_id" class="form-label fs-5">Email ID:</label>
                    <input type="email" class="form-control" id="email_id" name="email_id"
                        value="<?php echo $user_email_id?>" readonly>
                    <label for="mobile_number" class="form-label fs-5">Mobile No.:</label>
                    <input type="text" class="form-control" id="mobile_number" name="mobile_number"
                        value="<?php echo $user_mobile_number?>" readonly>
                    <label for="alternate_mobile_number" class="form-label fs-5">Alternate Mobile No.:</label>
                    <input type="text" class="form-control" id="alternate_mobile_number" name="alternate_mobile_number"
                        value="<?php echo $user_alternate_mobile_number?>" readonly>
                    <label for="room_type" class="form-label fs-5">Room:</label>
                    <input type="text" id="room_type" name="room_type" class="form-control" value="<?php echo $room_type." Room";?>" readonly>
                    <label for="room_no" class="form-label fs-5">Room Number:</label>
                    <input type="text" id="room_no" name="room_no" class="form-control" value="<?php echo $room_number;?>" readonly>
                    <label for="room_rate" class="form-label fs-5">Rate:</label>
                    <input type="text" id="room_rate" name="room_rate" class="form-control" value="<?php echo $room_rate;?>" readonly>
                    <label for="check_in_value" class="form-label fs-5">Check-in:</label>
                    <input type="text" class="form-control" id="check_in_value" name="check_in_value"
                        value="<?php echo $check_in_value?>" readonly>
                    <label for="check_out_value" class="form-label fs-5">Check-out:</label>
                    <input type="text" class="form-control" id="check_out_value" name="check_out_value"
                        value="<?php echo $check_out_value?>" readonly>
                    <label for="total_amount" class="form-label fs-5">Total Amount:</label>
                    <input type="text" id="total_amount" name="total_amount" class="form-control" value="<?php echo "&#8377;".((1 + $dateDiff) * $room_rate);?>" readonly>
                    <label for="card_number" class="form-label fs-5">Card Number:</label>
                    <input type="text" class="form-control" id="card_number" name="card_number"
                        placeholder="1234 5678 901234" maxlength="16">
                    <div class="row">
                        <div class="col-6">
                            <label for="expiry" class="form-label fs-5">Expiry</label>
                            <input type="month" id="expiry" name="expiry" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="cvv_or_cvc" class="form-label fs-5">CVV/CVC</label>
                            <input type="text" id="cvv_or_cvc" name="cvv_or_cvc" class="form-control" maxlength="3">
                        </div>
                    </div>
                    <div class="d-grid gap-2 my-3">
                        <input type="submit" id="pay" class="btn btn-primary" value="Pay">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    include "includes/footer.php";
?>