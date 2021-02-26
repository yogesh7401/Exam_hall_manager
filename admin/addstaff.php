<?php
include('../config.php');
session_start();
error_reporting(0);
if($_SESSION['login_admin']){
    $sql = "SELECT * FROM staffs where isadmin = '0' && isactive = '1'";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
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
    <div class="container custom-container my-5 innerbox">
        <div class="container pt-3">
            <h1 class="text-center"><small>Exam hall manager</small> </h1>
            <p class="text-center text-danger"><?php if($_SESSION['msg']!=''){echo $_SESSION['msg'];$_SESSION['msg']='';} ?></p>
            <p class="text-center text-danger"><?php if($_SESSION['remove']!=''){echo $_SESSION['remove'];$_SESSION['remove']='';} ?></p>
            <h3 class="text-success mt-5 d-inline"><small>Welcome <?php echo $_SESSION['login_admin'] ?></small></h3>
            <a type="button" href="../logout.php"  class="btn btn-sm btn-danger d-inline">logout</a>
            <h3 class="mt-5"><small>Allotted staffs</small></h3>
            <div class="table-responsive">
            <table class="table mt-3 table-striped">
                <thead>
                    <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">Staff ID</th>
                    <th scope="col">Staff Name</th>
                    <th scope="col">Password</th>
                    <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>
                    <!-- <th scope="row"></th> -->
                    <td><?php echo $row["staff_id"] ?></td>
                    <td><?php echo $row["staff_name"] ?></td>
                    <td><?php echo $row["password"] ?></td>
                    <td><a class="text-decoration-none" href="./remove.php?id=<?php echo $row["staff_id"]?>">Remove</a></td>
                    </tr>
                    <?php  }?>
                </tbody>
                </table>
            </div>
            <h3 class="mt-5"><small>Add staff</small></h3>
            <form action="../action.php" method="POST">
                <div class="row">
                    <div class="col-sm-6 col-lg-4 col-12">
                        <div class="field mt-2">
                            <input type="email" name="email" id="email" placeholder="example@xxx.com" required>
                            <label for="email">Staff email</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-12">
                        <div class="field mt-2">
                            <input type="text" name="name" id="fullname" placeholder="example" required>
                            <label for="fullname">Staff name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-12">
                        <div class="field mt-1">
                            <input type="password" name="pass" id="password" placeholder="xxxxxxxxx" required>
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="col-sm-6 offset-lg-8 col-lg-4 col-12">
                        <input type="submit" value="Add staff" name="addstaff" class="btn mt-4 w-100 btn-outline-success">
                    </div>
                </div>
            </form>
        </div>
    </div> 
</body>
</html>
<?php
}
else{
    header('location: ../index.php');
}
?>