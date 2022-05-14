<?php
    define("TITLE", "Sunshine Life Hotel - All Customers");
    define("PAGE", "All Customers");
    include "includes/header.php";
    if(!isset($_SESSION['is_admin_login'])) {
        header("location: admin_login.php");
    }
?>
    <div class="col-sm-10">
        <div class="container">
        <table class="table table-bordered table-striped table-primary mt-3">
            <thead>
                <tr>
                    <!-- fields -->
                    <th scope="col" class="text-center">Sr. No.</th>
                    <th scope="col" class="text-center">First Name</th>
                    <th scope="col" class="text-center">Last Name</th>
                    <th scope="col" class="text-center">Mobile Number</th>
                    <th scope="col" class="text-center">Alternate Mobile Number</th>
                    <th scope="col" class="text-center">Email ID</th>
                    <th scope="col" class="text-center">Residential Address</th>
                    <th scope="col" class="text-center">Permanent Address</th>
                    <th scope="col" class="text-center">Aadhar Card Number</th>
                    <th scope="col" class="text-center">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // including connection code
                    include "conn.php";
                    $sql = "SELECT * FROM `registration_form`";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);
                    if($num>0){
                        $i = 0;
                        while($rows = mysqli_fetch_assoc($result)){
                            $i++;
                            echo "<tr>
                            <th scope='row' class='text-center'>".$i."</th>
                            <td class='text-center'>".$rows['first_name']."</td>
                            <td class='text-center'>".$rows['last_name']."</td>
                            <td class='text-center'>".$rows['mobile_number']."</td>
                            <td class='text-center'>".$rows['alternate_mobile_number']."</td>
                            <td class='text-center'>".$rows['email_id']."</td>
                            <td class='text-center'>".$rows['residential_address']."</td>
                            <td class='text-center'>".$rows['permanent_address']."</td>
                            <td class='text-center'>".$rows['aadhaar_card_number']."</td>
                            <td class='text-center'><form action='remove_user.php' method='post'><input type='hidden' name='ruser' value='".$rows['email_id']."'><input type='submit' class='btn btn-primary text-white remove-customer-hover' name='remove' value='Remove' /></form></td>
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