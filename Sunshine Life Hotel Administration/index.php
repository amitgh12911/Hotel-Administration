<?php
    define("TITLE", "Sunshine Life Hotel - Home");
    define("PAGE", "Home");
    include "includes/header.php";
?>
<!-- carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" id="mainCarousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
            aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
            aria-label="Slide 5"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/1.jpg" class="d-block w-100 mx-auto" alt="..." />
        </div>
        <div class="carousel-item">
            <img src="img/2.jpg" class="d-block w-100 mx-auto" alt="..." />
        </div>
        <div class="carousel-item">
            <img src="img/3.jpg" class="d-block w-100 mx-auto" alt="..." />
        </div>
        <div class="carousel-item">
            <img src="img/4.jpg" class="d-block w-100 mx-auto" alt="..." />
        </div>
        <div class="carousel-item">
            <img src="img/5.jpg" class="d-block w-100 mx-auto" alt="..." />
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container">
    <hr />
</div>
<div class="container my-4">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
            // Including connection
            include "conn.php";
            $sql = "SELECT * FROM `room_availability` LIMIT 3";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num>0){
                while($rows = mysqli_fetch_assoc($result)){
                    $id = $rows['sr_no'];
                    $rate = $rows['rate'];
                    $images = ["", "img/single_room.jpg", "img/double_room.jpg", "img/triple_room.jpg", "img/quad_room.jpg", "img/queen_room.jpg", "img/king_room.jpg", "img/twin_room.jpg", "img/double_double_room.jpg", "img/studio_room.jpg"];
                    $rooms_types_list = ["", "Single Room", "Double Room", "Triple Room", "Quad Room", "Queen Room", "King Room", "Twin Room", "Double-Double Room", "Stdio Room"];
        ?>
            <div class="col">
                <div class="card">
                    <img src="<?php echo $images[$id]?>" class="card-img-top" alt="<?php echo $rooms_types_list[$id];?>" />
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $rows['room_type']?></h5>
                        <p class="card-text">
                            This is a longer card with supporting text below
                            as a natural lead-in to additional content. This
                            content is a little bit longer.
                        </p>
                        <p>Price: <b><?php echo "&#8377;".$rate."/day";?></b></p>
                        <form action='booking_section.php' method='post'>
                            <input type='hidden' name='bid' value='<?php echo $rows["room_no"];?>'>
                            <button type='<?php if($rows['availability'] == "1") {echo "submit";} else {echo "button";}?>' class='btn <?php if($rows['availability'] == "1") {echo "btn-success";} else {echo "btn-secondary not-available-btn";}?>' <?php if($rows['availability'] == "0") {echo "disabled";}?>>Book</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
                }
            }
        ?>
    </div>
</div>
<div class="container text-center my-4"><a href="service.php" class="btn btn-primary">Show More</a></div>
<!-- Footer -->
<?php
    include "includes/footer.php";
?>