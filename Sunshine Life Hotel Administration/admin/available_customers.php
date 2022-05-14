<?php
    define("TITLE", "Sunshine Life Hotel - Available Customers");
    define("PAGE", "Available Customers");
    include "includes/header.php";
    if(!isset($_SESSION['is_admin_login'])) {
        header("location: admin_login.php");
    }
?>
<div class="col-sm-10">
        <div class="container">
        <table class="table table-responsive table-bordered table-striped table-primary mt-3">
            <thead>
                <tr>
                    <!-- fields -->
                    <th scope="col" class="text-center">Sr. No.</th>
                    <th scope="col" class="text-center">Customer Name</th>
                    <th scope="col" class="text-center">Email Id</th>
                    <th scope="col" class="text-center">Mobile Number</th>
                    <th scope="col" class="text-center">Alternate Mobile Number</th>
                    <th scope="col" class="text-center">Room Number</th>
                    <th scope="col" class="text-center">Room Type</th>
                    <th scope="col" class="text-center">Room Rate</th>
                    <th scope="col" class="text-center">Check In Value</th>
                    <th scope="col" class="text-center">Check Out Value</th>
                    <th scope="col" class="text-center">Total Amount</th>
                    <th scope="col" class="text-center">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // including connection code
                    include "conn.php";
                    $sql = "SELECT * FROM `payment_details`";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);
                    if($num>0){
                        $i = 0;
                        while($rows = mysqli_fetch_assoc($result)){
                            $i++;
                            echo "<tr>
                            <th scope='row' class='text-center'>".$i."</th>
                            <td class='text-center'>".$rows['person_name']."</td>
                            <td class='text-center'>".$rows['email_id']."</td>
                            <td class='text-center'>".$rows['mobile_number']."</td>
                            <td class='text-center'>".$rows['alternate_mobile_number']."</td>
                            <td class='text-center'>".$rows['room_no']."</td>
                            <td class='text-center'>".$rows['room_type']."</td>
                            <td class='text-center'>".$rows['room_rate']."</td>
                            <td class='text-center'>".$rows['check_in_value']."</td>
                            <td class='text-center'>".$rows['check_out_value']."</td>
                            <td class='text-center'>".$rows['total_amount']."</td>
                            <td class='text-center'><form action='remove_user_from_room.php' method='post'><input type='hidden' name='room_no' value='".$rows['room_no']."'><input type='submit' class='btn btn-primary text-white remove-customer-hover' name='remove' value='Remove' /></form></td>
                            </tr>";
                        }
                    }
                    ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php
    include "includes/footer.php";
?>