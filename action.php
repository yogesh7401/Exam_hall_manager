<?php
include('config.php');
session_start();
// student login
    if(isset($_POST['studentLogin'])) {
        $myusername = mysqli_real_escape_string($conn,$_POST['reg_no']); 
        $sql = "SELECT * FROM students WHERE reg_no = '$myusername'";     
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
		
        if($count == 1) {
            $_SESSION['studentid'] = $myusername;
            header("location: allotment.php");
        }else {
            $error = "invalid ID";
            $_SESSION['error'] = $error;
            header("location: login.php");
        }
    }

// admin login  &&  staff login
    if(isset($_POST['adminLogin'])) {
        $myusername = mysqli_real_escape_string($conn,$_POST['email']); 
        $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
        $sql = "SELECT * FROM staffs WHERE staff_id = '$myusername' && password = '$mypassword'";     
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        $row = $result->fetch_assoc();
        // if($count == 1) {
            if($row['isadmin'] == '1'){
                $_SESSION['login_admin'] = $myusername;
                header("location: ./admin/addstaff.php");
            }
            elseif($row['isadmin'] == '0') {
                $_SESSION['login_staff'] = $myusername;
                header("location: ./staff/setallotment.php");
            }
        // }
        else {
            $error = "invalid ID";
            $_SESSION['error'] = $error;
            header("location: ./admin/login.php");
        }
    }
// header("location: index.html")
?>