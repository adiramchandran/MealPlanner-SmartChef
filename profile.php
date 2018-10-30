<!DOCTYPE html>
<!--
++++++++++++++++++++++++++++++++++++++++++++++++++++++
AUTHOR : Vijayan PP
PROJECT :A-MD
VERSION : 1.1
++++++++++++++++++++++++++++++++++++++++++++++++++++++
-->
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
<title></title>
<link rel="stylesheet" href="w3.css">
</head>

<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
// $link = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
//
// if (!$link) {
//     echo "Error: Unable to connect to MySQL." . PHP_EOL;
//     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
//     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
//     exit;
// }

// echo "Success: A proper connection top MySQL was made! The my_db database is great." . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

// mysqli_close($link);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $age = $_POST['age'];
//         $sql = "INSERT INTO Users (height, weight, age) " . "VALUES ('$height', '$weight', '$age')";
//
//         if(($mysqli->query($sql) === true)){
//          $_SESSION['message'] = "User was created";
//         }
//         else{
//             $_SESSION['message'] = "Account was not created:(";
//         }
}
$mysqli->close();
?>
<html>
<head>
<head>
<body>
  <form method="post" action="profile.php" id="myForm" enctype="multipart/form-data" name="myForm" >
    <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
    <label for="height">Height:</label>  <input type="text" name="height" /><br />
    <label for="weight">Weight:</label> <input type="text" name="weight"><br />
    <label for="age">Age:</label> <input type="text" name="age"><br />
    <input type="submit" name="submit"/>
  </div>
  </form>
</body>
</html>
