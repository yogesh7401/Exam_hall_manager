<?php
include('../config.php');
session_start();
if($_SESSION['login_staff']){
    $staffId = $_SESSION["login_staff"];
    $sql = "SELECT * FROM staffs where staff_id = '$staffId'";
    $result = $conn->query($sql);
}
else{
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <a href="../logout.php">Logout</a>-->
    <div class="container my-5">
        <div class="container py-3 innerbox">
            <h1 class="text-center mb-5"><small>Exam hall manager</small></h1>
            <p class="text-center text-danger "><?php if($_SESSION['remove']!=''){echo $_SESSION['remove'];$_SESSION['remove']='';} ?></p>
            <?php while($row = $result->fetch_assoc()) { ?>
                <h3 class="text-success d-inline"><small>Welcome <?php echo $row['staff_name'] ?> !</small></h3>
                <a type="button" href="../logout.php"  class="btn btn-danger d-inline">logout</a>
                <h3 class="text-success mt-5"><small>Seating allotment</small></h3>
                <a type="button" href="./remove.php"  class="btn btn-danger">Clear All</a>
            <?php } ?>
            <form action="../action.php" method="post">
                <table class="table mt-3 table-striped">
                    <thead>
                        <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">Student ID</th>
                        <th scope="col">Block</th>
                        <th scope="col">Room No.</th>
                        <th scope="col">Seating</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                   
                        $query = "SELECT * FROM allotment";
                        $results = $conn->query($query);
                        $index = 1;
                        while($rows = $results->fetch_assoc()) { 
                            if($rows['isalloted'] == '0'){
                            ?>
                        
                        <tr>
                        <!-- <th scope="row"></th> -->
                        <td><?php echo $rows["reg_no"] ?></td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="block<?php echo $rows["reg_no"] ?>" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="room<?php echo $rows["reg_no"] ?>" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="seating<?php echo $rows["reg_no"] ?>" required>
                            </div>
                        </td>
                        <!-- <td><a class="text-decoration-none" href="./remove.php?id=<?php echo $row["staff_id"]?>">Remove</a></td> -->
                        </tr>
                        <?php }
                        else { ?>
                        <tr>
                            <td><?php echo $rows["reg_no"] ?></td>
                            <td><?php echo $rows["block_no"] ?></td>
                            <td><?php echo $rows["room_no"] ?></td>
                            <td><?php echo $rows["seat_no"] ?></td>
                        </tr>
                            <?php
                        } 
                        $index++;
                    }?>
                    </tbody>
                </table>
                <input type="submit" value="Submit" class="btn btn-danger w-100" name="setseating">

            </form>
        </div>
    </div>
</body>
</html>