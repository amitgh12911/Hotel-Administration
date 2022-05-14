<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<body>
    <?php
      session_start();
    ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <div class="container-fluid">
  <a class="navbar-brand m-0" href="<?php if(PAGE == 'Admin Dashboard') {echo '#';} else {echo 'dashboard.php'
                ;}?>"><img src="img/logo/hotel.png" alt="logo" style="height: 40px;" /><div class="mx-3 mt-2 fs-6 text d-inline-block">Sunshine Life</div></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<!-- Start Side Bar -->
<div class="row">
    <div class="col-sm-2 bg-light sidebar py-3">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item <?php if(PAGE == 'Admin Dashboard') {echo 'bg-warning';}?> m-2">
                    <a href="<?php if(PAGE == 'Admin Dashboard') {echo '#';} else {echo 'dashboard.php';}?>" class="nav-link text-dark">Dashboard</a>
                </li>
                <li class="nav-item <?php if(PAGE == 'All Customers') {echo 'bg-warning';}?> m-2">
                    <a href="<?php if(PAGE == 'All Customers') {echo '#';} else {echo 'all_customer.php';}?>" class="nav-link text-dark">All Customer</a>
                </li>
                <li class="nav-item <?php if(PAGE == 'Customer Messages') {echo 'bg-warning';}?> m-2">
                    <a href="<?php if(PAGE == 'Customer Messages') {echo '#';} else {echo 'customer_messages.php';}?>" class="nav-link text-dark">Customer Messages</a>
                </li>
                <li class="nav-item <?php if(PAGE == 'Available Customers') {echo 'bg-warning';}?> m-2">
                    <a href="<?php if(PAGE == 'Available Customers') {echo '#';} else {echo 'available_customers.php';}?>" class="nav-link text-dark">Available Customers</a>
                </li>
                <li class="nav-item <?php if(PAGE == 'Setting Prices') {echo 'bg-warning';}?> m-2">
                    <a href="<?php if(PAGE == 'Setting Prices') {echo '#';} else {echo 'setting_prices.php';}?>" class="nav-link text-dark">Setting Prices</a>
                </li>
                <li class="nav-item <?php if(PAGE == 'Change Password') {echo 'bg-warning';}?> m-2">
                    <a href="<?php if(PAGE == 'Change Password') {echo '#';} else {echo 'change_password.php';}?>" class="nav-link text-dark">Change Password</a>
                </li>
                <li class="nav-item m-2">
                    <a href="admin_logout.php" class="nav-link text-dark">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
<!-- End Side Bar -->