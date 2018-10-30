<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
	<title></title>
	<link rel="stylesheet" href="w3.css">
</head>

<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $height = $mysqli->real_escape_string($_POST['height']);
      $weight = $mysqli->real_escape_string($_POST['weight']);
      $age = $mysqli->real_escape_string($_POST['age']);
      $sql = "INSERT INTO User (height, weight, age) " . "VALUES ('$height', '$weight', '$age')";
}
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
