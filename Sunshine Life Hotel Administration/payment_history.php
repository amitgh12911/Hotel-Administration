<?php
    define("TITLE", "Sunshine Life Hotel - Payment History");
    define("PAGE", "Payment History");
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
?>
<div class="container-fluid mt-3 mb-5">
    <table class="table table-responsive table-success table-striped">
        <thead>
            <tr>
            <th scope="col">Sr. No.</th>
            <th scope="col">Name</th>
            <th scope="col">Email Id</th>
            <th scope="col">Mobile Number</th>
            <th scope="col">Alternate Mobile Number</th>
            <th scope="col">Room Number</th>
            <th scope="col">Room Type</th>
            <th scope="col">Room Rate</th>
            <th scope="col">Check-in-value</th>
            <th scope="col">Check-out-value</th>
            <th scope="col">Total Amount</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
</div>
            <?php
                // Including connection
                include "conn.php";
                $sql = "SELECT * FROM `payment_details` WHERE email_id = '$email_id'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if($num>0){
                    while($rows = mysqli_fetch_assoc($result)){
                        $person_name = $rows['person_name'];
                        $email_id = $rows['email_id'];
                        $mobile_number = $rows['mobile_number'];
                        $alternate_mobile_number = $rows['alternate_mobile_number'];
                        $rooms_types = $rows['room_type'];
                        $rooms_no = $rows['room_no'];
                        $rooms_rate = $rows['room_rate'];
                        $check_in_value = $rows['check_in_value'];
                        $check_out_value = $rows['check_out_value'];
                        $total_amount = $rows['total_amount'];
            ?>
            <tbody>
            <tr>
                <?php
                    $i = 0;
                    $i++;
                ?>
                <th scope="row"><?php echo $i;?></th>
                <td><?php echo $person_name;?></td>
                <td><?php echo $email_id;?></td>
                <td><?php echo $mobile_number;?></td>
                <td><?php echo $alternate_mobile_number;?></td>
                <td><?php echo $rooms_types;?></td>
                <td><?php echo $rooms_no;?></td>
                <td><?php echo $rooms_rate;?></td>
                <td><?php echo $check_in_value;?></td>
                <td><?php echo $check_out_value;?></td>
                <td><?php echo $total_amount;?></td>
                <td><form action="delete_payment_history.php" method="post"><input type="hidden" name="room_no_delete" if="room_no_delete" value="<?php echo $rooms_no;?>"><input type="submit" class="btn btn-success" value="Delete"></td>
            </tr>
            <?php
                    }
                }
                ?>
        </tbody>
    </table>
            </div>  
    <!-- Footer -->
<?php
    include "includes/footer.php";
?>