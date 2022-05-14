<!-- Header -->
<?php
    define("TITLE", "Sunshine Life Hotel - Service");
    define("PAGE", "Service");
    include "includes/header.php";
?>
<div id="container-after-nav"></div>
    <div class="container my-3">
        <div class="row">
            <?php
                // Including connection
                include "conn.php";
                $sql = "SELECT * FROM `room_availability`";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if($num>0){
                    while($rows = mysqli_fetch_assoc($result)){
                        $id = $rows['sr_no'];
                        $rate = $rows['rate'];
                        $images = ["", "img/single_room.jpg", "img/double_room.jpg", "img/triple_room.jpg", "img/quad_room.jpg", "img/queen_room.jpg", "img/king_room.jpg", "img/twin_room.jpg", "img/double_double_room.jpg", "img/studio_room.jpg"];
                        $rooms_types_list = ["", "Single Room", "Double Room", "Triple Room", "Quad Room", "Queen Room", "King Room", "Twin Room", "Double-Double Room", "Stdio Room"];
            ?>
                    <div class="col col-sm-4 my-3">
                        <img src="<?php echo $images[$id]?>" class="w-100 img-fluid" alt="<?php echo $rooms_types_list[$id];?>">
                        <h3><?php echo $rows['room_type']?></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex deserunt vel, voluptas ratione earum possimus voluptates ipsum doloremque quasi sunt, recusandae libero nisi soluta nemo blanditiis delectus obcaecati voluptatum nihil!</p>
                        <p>Price: <b><?php echo "&#8377;".$rate."/day";?></b></p>
                        <form action='booking_section.php' method='post'>
                            <input type='hidden' name='bid' value='<?php echo $rows["room_no"];?>'>
                            <button type='<?php if($rows['availability'] == "1") {echo "submit";} else {echo "button";}?>' class='btn <?php if($rows['availability'] == "1") {echo "btn-success";} else {echo "btn-secondary not-available-btn";}?>' <?php if($rows['availability'] == "0") {echo "disabled";}?>>Book</button>
                        </form>
                    </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
    <!-- Footer -->
<?php
    include "includes/footer.php";
?>