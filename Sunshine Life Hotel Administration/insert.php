<?php
    include "conn.php";
    $sql = "INSERT INTO `registration_form` (`sr_no`, `first_name`, `last_name`, `mobile_number`, `alternate_mobile_number`, `email_id`, `residential_address`, `permanent_address`, `aadhaar_card_number`, `password`, `confirm_password`) VALUES ('1', 'Amit', 'Jha', '9321079531', '7021211857', 'amitdbg007@gmail.com', 'Indira Nagar Chawl, Kisan Nagar No. 2, Road No.: 21, Room No.: 10, Near Shiv Sena Office, Wagle Estate Thane(w): 400604', 'Indira Nagar Chawl, Kisan Nagar No. 2, Road No.: 21, Room No.: 10, Near Shiv Sena Office, Wagle Estate Thane(w): 400604', '123456789123', 'bskjxbkjabx', 'bskjxbkjabx')";
    echo $sql;
?>