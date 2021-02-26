<?php
include('../config.php');
session_start();
if($_SESSION['login_staff']){
    for($i = 1813141058001; $i <= 1813141058100; $i++){  
        $remove = '';
        $sql = "UPDATE allotment SET block_no = '' , room_no = '', seat_no = '', isalloted = '0' WHERE reg_no = '$i' ";
        $conn->query($sql);
    }
    $remove = "Removed successfully";
    $_SESSION['remove'] = $remove;
    header("location: ./setallotment.php");
}
?>