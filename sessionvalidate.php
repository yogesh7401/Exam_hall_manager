<?php
session_start();
if($_SESSION['studentid']){
    header("location: allotment.php");
}
elseif($_SESSION['login_staff']){
    header("location: ./staff/setallotment.php");
}
elseif($_SESSION['login_admin']){
    header("location: ./admin/addstaff.php");
}
?>