<?php
include('../config.php');
session_start();
if($_SESSION['login_admin']){
    $id = $_GET['id'];
    $sql = "UPDATE staffs SET isactive = '0' WHERE staff_id = '$id' ";
    if ($conn->query($sql) === TRUE) {
        $remove = "Removed successfully";
        $_SESSION['remove'] = $remove;
        header("location: ./addstaff.php");
    }
    else {
        header("location: ./addstaff.php");
    }
}
?>