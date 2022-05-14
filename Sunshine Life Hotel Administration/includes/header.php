<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fontawesome JavaScript -->
    <script src="https://kit.fontawesome.com/35f8a6764d.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Personal CSS -->
    <link rel="stylesheet" href="CSS/style.css">
    <title>
        <?php echo TITLE?>
    </title>
</head>

<body <?php if(PAGE=="payment success") { echo 'onload="document.getElementById(`paid-success-btn`).click();"';}?>>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-sticky top-0 shadow <?php if(PAGE=='payment success') {echo 'd-none';}?>">
        <?php
            session_start();
        ?>
        <div class="container-fluid">
            <a class="navbar-brand m-0" href="<?php if(PAGE == 'Home') {echo '#';} else {echo 'index.php'
                ;}?>"><img src="img/logo/hotel.png" alt="logo" /><div class="mx-3 mt-2 fs-6 text d-inline-block">Sunshine Life</div></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'Home') {echo 'active';}?>" aria-current="page" href="
                            <?php if(PAGE == "Home") {echo "#";} else {echo "index.php";}?>">Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'About') {echo 'active';}?>" href="<?php if(PAGE == 'About') {echo '#';} else {echo 'about.php' ;}?>">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'Service') {echo 'active';}?>" href="
                            <?php if(PAGE == 'Service') {echo '#';} else {echo 'service.php';}?>">Service
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'Contact') {echo 'active';}?>" href="
                            <?php if(PAGE == 'Contact') {echo '#';} else {echo 'contact.php';}?>">Contact
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'Payment History') {echo 'active';}?>" href="
                            <?php if(PAGE == 'Payment History') {echo '#';} else {echo 'payment_history.php';}?>">Payment History
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'Availability') {echo 'active';}?>" href="
                            <?php if(PAGE == 'Availability') {echo '#';} else {echo 'availability.php';}?>">Availability
                        </a>
                    </li> -->
                </ul>
                <form class="d-flex">
                    <!-- Change Password -->
                    <a href="change_password.php" class="btn <?php if(PAGE == 'Change Password') {echo 'btn-warning';}
                        else {echo 'btn-outline-warning';}?>
                        <?php if(PAGE == 'Profile' || PAGE == 'Change Password') {echo 'd-inline';} else {echo 'd-none';}?>"
                        type="submit"><i class="fa fa-key" aria-hidden="true"></i> Change Password
                    </a>
                    <!-- Requester Profile or Requester Edit -->
                    <a href="<?php if(isset($_SESSION['is_login'])) {if(PAGE == 'Profile'){echo 'requester_edit.php';}
                        else{echo 'requester_profile.php';}} else {echo 'register.php';}?>" class="btn
                        <?php if(PAGE=='Register') {echo 'btn-warning';} else {echo 'btn-outline-warning';}?>
                        <?php if(PAGE == 'Profile' || PAGE == 'Change Password') {echo 'mx-3 me-0';}?>"
                        type="submit">
                        <?php if(isset($_SESSION['is_login'])) {if(PAGE == 'Profile') {echo '<i class="far fa-edit"></i> Edit';} else {echo '<i class="fas fa-male"></i> Profile';}} else {echo '<i class="fas fa-registered"></i> Register';}?>
                    </a>
                    <!-- Logout Or Login -->
                    <a href="<?php if(isset($_SESSION['is_login'])) {echo 'logout.php';} else {echo 'login.php';}?>"
                        class="btn
                        <?php if(PAGE=='Login') {echo 'btn-warning';} else {echo 'btn-outline-warning';}?> mx-3"
                        type="submit">
                        <?php if(isset($_SESSION['is_login'])) {echo '<i class="fas fa-sign-out-alt"></i> Log out';} else {echo '<i class="fas fa-sign-in-alt"></i> Log in';}?>
                    </a>
                </form>
            </div>
        </div>
    </nav>