<?php
include('config.php');
session_start();
if($_SESSION['studentid']!=""){
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
echo $_SESSION['studentid'];
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["reg_no"]. " " . $row["name"]. "<br>";
  }
} else {
  echo "0 results";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="logout.php">Logout</a>
</body>
</html>
<?php }
else {
  header("location: index.html" );
}
?>