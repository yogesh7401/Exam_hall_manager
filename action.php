<?php
include('config.php');
// error_reporting(0);
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

    if(isset($_POST['addstaff'])) {
        $myusername = mysqli_real_escape_string($conn,$_POST['name']); 
        $myemail = mysqli_real_escape_string($conn,$_POST['email']); 
        $mypassword = mysqli_real_escape_string($conn,$_POST['pass']); 
        $check = "SELECT * FROM staffs WHERE staff_id = '$myemail' && isactive = '1'";  
        $result = $conn->query($check);
        $count = mysqli_num_rows($result);
        $row = $result->fetch_assoc();  
        if($count == 1) {
            $msg = "Staff email id already exits";
            $_SESSION['msg'] = $msg;
            header('location: ./admin/addstaff.php');
        } 
        else {
            $sql = "INSERT INTO staffs (staff_id, staff_name, password, isadmin) VALUES ('$myemail', '$myusername', '$mypassword', '0')";      
            if ($conn->query($sql) === TRUE) {
                $msg = "New staff added successfully";
                $_SESSION['msg'] = $msg;
                header('location: ./admin/addstaff.php');
            } 
            else { 
                $msg = "Staff email id already exits";
                $_SESSION['msg'] = $msg;
                header('location: ./admin/addstaff.php');
            }
        }
    }

// set allotment
    if(isset($_POST['setseating'])) {
        $msg = "";
        for($i = 1813141058001; $i <= 1813141058100; $i++){  
            $block = mysqli_real_escape_string($conn,$_POST['block'.$i]);
            $room = mysqli_real_escape_string($conn,$_POST['room'.$i]);
            $seating = mysqli_real_escape_string($conn,$_POST['seating'.$i]); 
            $sql = "UPDATE allotment SET block_no = '$block' , room_no = '$room', seat_no = '$seating', isalloted = '1' Where reg_no = '$i'"; 
            $conn->query($sql);  
            $msg = "Success";   
        }
        if($msg != ""){
            $_SESSION['msg'] = $msg;
            header("location: ./staff/setallotment.php");
        }
    }
// header("location: index.html")
?>