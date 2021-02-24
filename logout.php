<?php
session_start();
unset($_SESSION["studentid"]);
unset($_SESSION["login_admin"]);
unset($_SESSION["login_staff"]);
header("Location:index.php");
?>