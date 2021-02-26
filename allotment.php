<?php
include('config.php');
session_start();
if($_SESSION['studentid']!=""){
  $id = $_SESSION['studentid'];
  $sql = "SELECT * FROM allotment WHERE reg_no = $id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

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
    <div class="login pt-4 px-5">
        <div class="title text-center">
            <h3>Seating allotment</h3>
        </div>
        <hr>
        <div class="row">
          <div class="col-6 mt-3">
            Register number 
          </div>
          <div class="col-6 mt-3">
            :  <?php echo $row['reg_no'] ?>
          </div>
          <div class="col-6 mt-3">
            Block number 
          </div>
          <div class="col-6 mt-3">
            :  <?php echo $row['block_no'] ?>
          </div>
          <div class="col-6 mt-3">
            Room number 
          </div>
          <div class="col-6 mt-3">
            :  <?php echo $row['room_no'] ?>
          </div>
          <div class="col-6 mt-3">
            Seat number 
          </div>
          <div class="col-6 mt-3">
            :  <?php echo $row['seat_no'] ?>
          </div>
        </div>
        <a type="button" href="./logout.php"  class="btn mt-3 btn-sm btn-danger w-100">Exit</a>
    </div>
    <script src="./assets/js/bootstrap.js"></script>
</body>
</html>
<?php }
else {
  header("location: index.html" );
}
?>