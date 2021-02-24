<?php
// session_start();
error_reporting(0);
include('sessionvalidate.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container login pt-4">
        <div class="title text-center">
            <h3>Exam hall manager</h3>
            <a href="./login.php" class="btn w-100 mt-4 btn-lg btn-outline-success">Student login</a>
            <a href="./staff/login.php" class="btn w-100 mt-3 btn-lg btn-outline-success">Staff login</a>
            <a href="./admin/login.php" class="btn w-100 mt-3 btn-lg btn-outline-success">Admin login</a>
        </div>
        
    </div>
    <script src="./assets/js/bootstrap.js"></script>
</body>
</html>