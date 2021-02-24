<?php
session_start();
error_reporting(0);
include('sessionvalidate.php');
// else if($_SESSION['login_admin']!=""){
// }
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
    <div class="container login pt-5">
        <div class="title text-center">
            <h3>Student Login</h3>
        </div>
        <hr>
        <form action="./action.php" method="POST">
            <div class="field mt-3">
                <input type="text" name="reg_no" id="fullname" placeholder="1813141058XXX">
                <label for="fullname">Register number</label>
            </div>
            <input type="submit" value="Get Seating" name="studentLogin" class="btn mt-5 btn-outline-success w-100">
        </form>
        <?php
        if($_SESSION['error']!=''){
            echo "<p class='text-center text-danger'>".$_SESSION['error']."</p>";
        }
        $_SESSION['error']='';
        ?>
    </div>
    <script src="./assets/js/bootstrap.js"></script>
</body>
</html>