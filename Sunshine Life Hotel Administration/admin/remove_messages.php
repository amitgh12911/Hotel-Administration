<?php
    include "conn.php";
    $sr_no = $_POST["sr_no"];
    $remove_message_sql = "DELETE FROM `customer_message` WHERE `sr_no` = '$sr_no'";
    $result = $conn->query($remove_message_sql);
    if($result) {
        header("Location:customer_messages.php");
    }
?>