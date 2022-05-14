<?php
    define("PAGE", "Booking Section");
    define("TITLE", "Sunshine Life Hotel - Booking Section");
    include "conn.php";
    include "includes/header.php";
    if(!isset($_SESSION['is_login']))
    {
        header("Location: login.php");
    }
    // echo "Booking Section";
    $id = $_POST['bid'];
    // echo "<br />".$id."<br />";
    $images = ["", "img/single_room.jpg", "img/double_room.jpg", "img/triple_room.jpg", "img/quad_room.jpg", "img/queen_room.jpg", "img/king_room.jpg", "img/twin_room.jpg", "img/double_double_room.jpg", "img/studio_room.jpg"];
    // echo var_dump($images)."<br />";
    // echo $images[$id];
    $sql = "SELECT * FROM room_availability WHERE room_no = '$id'";
    $result = $conn->query($sql);
    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $room_type = $row["room_type"];
        $room_no = $row["room_no"];
        $rate = $row["rate"];
        $availability = $row["availability"];
    }
    $email_id = $_SESSION['email_id'];
    $sql_user = "SELECT * FROM registration_form WHERE email_id = '$email_id'";
    $result_user = $conn->query($sql_user);
    if($result_user->num_rows == 1) {
        $row_user = $result_user->fetch_assoc();
        $first_name = $row_user['first_name'];
        $last_name = $row_user['last_name'];
        $mobile_number = $row_user['mobile_number'];
        $alternate_mobile_number = $row_user['alternate_mobile_number'];
    }
    if(isset($_REQUEST["book"])) {
        $room_type_value = $_POST["room_type_value"];
        $check_in = $_POST["check_in"];
        $check_out = $_POST["check_out"];
        $room_rate = $_POST["room_rate"];
    }
    ?>
<div class="container my-5">
    <div class="row">
        <div class="col-sm-6">
            <img width="500" src="<?php echo $images[$id - 100]?>" alt="<?php echo $images[$id - 100];?>">
        </div>
        <div class="col-sm-6">
            <!-- <h3>
                <?php echo $id?>
            </h3>
            <h3>
                <?php echo $room_type?>
            </h3>
            <h3>
                <?php echo $rate?>
            </h3>
            <h3>
                <?php echo $availability?>
            </h3> -->
            <!-- <h3>
                <?php echo $row_user?>
            </h3>
            <h3>
                <?php echo $first_name?>
            </h3>
            <h3>
                <?php echo $last_name?>
            </h3>
            <h3>
                <?php echo $mobile_number?>
            </h3> -->
            <form action="payment.php" method="post">
                <div class="row">
                    <div class="col-sm-12 my-1">
                        <label for="check_in" class="form-label">Check-in:</label>
                        <input type="date" min="<?php echo date('Y-m-d');?>" name="check_in" id="check_in" class="form-control" required>
                    </div>
                    <div class="col-sm-12 my-1">
                        <label for="check_out" class="form-label">Check-out:</label>
                        <input type="date" min="<?php echo date('Y-m-d');?>" name="check_out" id="check_out" class="form-control" required>
                    </div>
                    <div class="col-sm-12 ny-1">
                        <label for="room_no" class="form-label">Room Number:</label>
                        <input type="text" id="room_no" name="room_no" class="form-control" value="<?php echo $room_no?>" readonly>
                    </div>
                    <div class="col-sm-12 ny-1">
                        <label for="room_type" class="form-label">Room:</label>
                        <input type="text" id="room_type" class="form-control" value="<?php echo $room_type." Room"?>" readonly>
                    </div>
                    <div class="col-sm-12 my-1">
                        <label for="rate" class="form-label">Rate:</label>
                        <input type="text" id="rate" class="form-control" value="<?php echo " &#8377;".$rate."/day"?>"
                        readonly>
                    </div>
                    <div class="col-sm-12 my-1 d-grid gap-2 d-md-block">
                        <input type="hidden" name="room_no_value" id="room_no_value" value="<?php echo $room_no?>"/>
                        <input type="hidden" name="room_type" id="room_type" value="<?php echo $room_type?>"/>
                        <input type="hidden" name="room_rate" id="room_rate" value="<?php echo $rate?>"/>
                        <input type="hidden" name="check_in_value" id="check_in_value"/>
                        <input type="hidden" name="check_out_value" id="check_out_value"/>
                        <button class="btn btn-primary" type="submit" name="book">Book</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    include "includes/footer.php";
?>