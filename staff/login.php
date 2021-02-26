<?php
session_start();
error_reporting(0);
include('sessionvalidate.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container login pt-3">
        <div class="title text-center">
            <h3>Staff Login</h3>
        </div>
        <hr>
        <form action="../action.php" method="POST">
            <div class="field mt-2">
                <input type="email" name="email" id="fullname" placeholder="example@xxx.com" required>
                <label for="fullname">User email</label>
            </div>
            <div class="field mt-1">
                <input type="password" name="password" id="password" placeholder="xxxxxxxxx" required>
                <label for="password">Password</label>
            </div>
            <input type="submit" value="Login" name="adminLogin" class="btn mt-5 btn-outline-success w-100">
        </form>
        <?php
        session_start();
        if($_SESSION['error']!=''){
            echo "<p class='text-center text-danger'>".$_SESSION['error']."</p>";
        }
        $_SESSION['error']='';
        ?>
    </div>
    <script src="../assets/js/bootstrap.js"></script>
</body>
</html>