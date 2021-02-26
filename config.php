<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exam_hall_manager";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>