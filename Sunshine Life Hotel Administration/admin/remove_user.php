<?php
    include "conn.php";
    $email_id = $_POST["ruser"];
    $remove_user_sql = "DELETE FROM `registration_form` WHERE `email_id` = '$email_id'";
    $result = $conn->query($remove_user_sql);
    if($result) {
        header("Location:all_customer.php");
    }
?>