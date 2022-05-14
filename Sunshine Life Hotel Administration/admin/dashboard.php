<?php
    define("TITLE", "Sunshine Life Hotel - Admin Dashboard");
    define("PAGE", "Admin Dashboard");
    include "includes/header.php";
    include "conn.php";
    if(!isset($_SESSION['is_admin_login'])) {
        header("location: admin_login.php");
    }
    $sql_rows_num = "SELECT * FROM `room_availability`";
    $sqls = $conn->query($sql_rows_num);
    $sql_rows_num_available = "SELECT * FROM `room_availability` WHERE `availability` = 0";
    $sqls_available = $conn->query($sql_rows_num_available);
    $sql_rows_num_booked = "SELECT * FROM `room_availability` WHERE `availability` = 1";
    $sqls_booked = $conn->query($sql_rows_num_booked);
    $sql_rows_num_customers = "SELECT * FROM `registration_form`";
    $sqls_customers = $conn->query($sql_rows_num_customers);
?>

<div class="col-sm-10">
    <div class="container">
        <div class="row d-flex justify-content-center h-100">
            <div class="col-sm-6">
                <div class="row">
                    <div class="card bg-danger">
                        <div class="card-body">
                            <div class="col-12 text-center card-title fs-2">Total Rooms</div>
                            <div class="col-12 text-center card-text fs-4"><?php if($total_rooms = mysqli_num_rows($sqls)) {echo mysqli_num_rows($sqls);} else {echo "Not Available";}?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="card bg-warning">
                        <div class="card-body">
                            <div class="col-12 text-center card-title fs-2">Total Rooms Available</div>
                            <div class="col-12 text-center card-text fs-4"><?php if($total_rooms_available = mysqli_num_rows($sqls_booked)) {echo mysqli_num_rows($sqls_booked);} else {echo "Not Available";}?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="col-12 text-center card-title fs-2">Total Rooms Booked</div>
                            <div class="col-12 text-center card-text fs-4"><?php if($total_rooms_available = mysqli_num_rows($sqls_available)) {echo mysqli_num_rows($sqls_available);} else {echo "Not Available";}?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 bg-success">
                <div class="row">
                <div class="card bg-success">
                        <div class="card-body">
                            <div class="col-12 text-center card-title fs-2">Total Number of Customers</div>
                            <div class="col-12 text-center card-text fs-4"><?php if($total_num_customers = mysqli_num_rows($sqls_customers)) {echo mysqli_num_rows($sqls_customers);} else {echo "Not Available";}?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include "includes/footer.php";
?>