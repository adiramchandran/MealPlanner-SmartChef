<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
	<title></title>
	<link rel="stylesheet" href="w3.css">
</head>

<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     if($_POST['password'] == $_POST['confirmpassword']){
//         $name = $mysqli->real_escape_string($_POST['name']);
//         $id = $mysqli->real_escape_string($_POST['id']);
//         $password = $mysqli->real_escape_string($_POST['password']);
//         $_SESSION['name'] = $name;
//         $_SESSION['id'] = $id;
//         $sql = "INSERT INTO User (id, name, password) " . "VALUES ('$id', '$name', '$password')";
//
//         if(($mysqli->query($sql) === true)){
// 						header("Location: http://thullupolls.web.illinois.edu/signin.php");
// 						exit();
//         }
//         else{
//             $_SESSION['message'] = "Account was not created:(";
//         }
//
//     }
//     else{
//         $_SESSION['message'] = "Two passwords do not match! Please type a valid password.";
//     }
// }
$mysqli->close();
?>

<html>
	<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Create Profile</title>


	</head>
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
