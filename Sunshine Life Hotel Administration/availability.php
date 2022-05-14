<?php
    define("TITLE", "Sunshine Life Hotel - Availability");
    define("PAGE", "Availability");
    include "includes/header.php";
    if(!isset($_SESSION['is_login']))
    {
        header("Location: login.php");
    }
?>
<div id="container-after-nav"></div>
    <!-- Table -->
    <div class="container my-4 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="table-primary text-center">Room No.</th>
                    <th scope="col" class="table-primary text-center">Room Type</th>
                    <th scope="col" class="table-primary text-center">Rate</th>
                    <th scope="col" class="table-primary text-center">Room Availability</th>
                    <th scope="col" class="table-primary text-center">Book</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Including connection
                    include "conn.php";
                    $sql = "SELECT * FROM `room_availability`";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);
                    if($num>0){
                        while($rows = mysqli_fetch_assoc($result)){
                            $id = $rows['sr_no'];
                            if($rows['availability'] == "1"){
                                echo "<tr>
                                <th scope='row' class='table-success text-center'>".$rows['room_no']."</th>
                                <td class='table-success text-center'>".$rows['room_type']."</td>
                                <td class='table-success text-center'>".$rows['rate']."</td>
                                <td class='table-success text-center'>Available</td>
                                <td class='table-success text-center'><form action='booking_section.php' method='post'><input type='hidden' name='bid' value='".$rows['room_no']."'><input type='submit' class='btn btn-success' value='Book'></form></td>
                                </tr>";
                            }
                            else {
                                echo "<tr>
                                <th scope='row' class='table-danger text-center'>".$rows['room_no']."</th>
                                <td class='table-danger text-center'>".$rows['room_type']."</td>
                                <td class='table-danger text-center'>---</td>
                                <td class='table-danger text-center'>Not available</td>
                                <td class='table-danger text-center'><button type='button' class='btn btn-secondary not-available-btn' disabled>Book</button></td>
                                </tr>";
                            }
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