<?php
    include "conn.php";
    $room_no = $_POST["room_no_delete"];
    $remove_user_sql = "DELETE FROM `payment_details` WHERE `room_no` = '$room_no'";
    $result = $conn->query($remove_user_sql);
    if($result) {
        echo "removed";
    }
    $sql_update = "UPDATE `room_availability` SET `availability` = '1' WHERE `room_no` = '$room_no'";
    $result_update = $conn->query($sql_update);
    if($result_update) {
        echo "updated";
        header("location:payment_history.php");
    }
?>