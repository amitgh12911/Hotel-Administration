<?php
    define("TITLE", "Sunshine Life Hotel - Setting Prices");
    define("PAGE", "Setting Prices");
    include "includes/header.php";
    if(!isset($_SESSION['is_admin_login'])) {
        header("location: admin_login.php");
    }
    // including connection code
    include "conn.php";
    if (isset($_REQUEST["update_rate"])) {
        if ($_POST['update_rate_value'] == "") {
            $message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Fill the Rate Field.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        else {
            $update_rate_value = $_POST['update_rate_value'];
            $room_type = $_POST['room_type'];
            $sql_update = "UPDATE room_availability SET rate = '$update_rate_value' WHERE room_type = '$room_type'";
            if ($conn->query($sql_update) == TRUE) {
                $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successfully Updated.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            else {
                $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><strong>Sorry!</strong> Unable to update due to some technical issue.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
    }
?>
    <div class="col-sm-10">
        <div class="container">
        <?php if(isset($message)) { echo $message; }?>
        <table class="table table-responsive table-success table-striped">
  <thead>
    <tr>
      <th scope="col" class="text-center">Sr. No.</th>
      <th scope="col" class="text-center">Room No.</th>
      <th scope="col" class="text-center">Room Type</th>
      <th scope="col" class="text-center">Price</th>
      <th scope="col" class="text-center">Availability</th>
      <th scope="col" class="text-center">Update Price</th>
    </tr>
  </thead>
  <tbody>
        <?php
            $sql = "SELECT * FROM `room_availability`";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num>0){
                $i=0;
                while($rows = mysqli_fetch_assoc($result)){
                    $i++;
                    ?>
                    <tr>
                    <th scope='row' class='text-center'><?php echo $i;?></th>
                    <td class='text-center'><?php echo $rows['room_no'];?></td>
                    <td class='text-center'><?php echo $rows['room_type'];?></td>
                    <td class='text-center update-rate'><?php echo $rows['rate'];?></td>
                    <td class='text-center'><?php if((int)$rows['availability'] == 1) {echo "Available";} else {echo "Not Available";}?></td>
                    <td class='text-center'><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo $i;?>">Update</button></td>
                    </tr>
                    <!-- Modal -->
                        <div class="modal fade" id="exampleModal-<?php echo $i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Price</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="setting_prices.php" method="post">
                                    <label for="update_rate">Room Type:</label>
                                    <input type="text" readonly class="form-control-plaintext border" name="room_type" value="<?php echo $rows['room_type']?>">
                                    <label for="update_rate">Price:</label>
                                    <input type="text" class="form-control-plaintext border" name="update_rate_value" value="<?php echo $rows['rate']?>">
                                    <input type="submit" value="Update" name="update_rate" class="btn btn-primary mt-2">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    <?php
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