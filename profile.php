<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
	<title></title>
</head>

<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
// $link = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
//
// if (!$link) {
//     echo "Error: Unable to connect to MySQL." . PHP_EOL;
//     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
//     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
//     exit;
// }
//
// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;


mysqli_close($link);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  $age = $_POST['age'];
  $sql = "INSERT INTO User (ID, Height, Weight, Age) " . " VALUES (NULL, $height, $weight, $age)";
  // printf("Last inserted record has id %d" . mysql_insert_id());

  if(mysqli_query($mysqli, $sql) === true) {
    $last_id = $mysqli->insert_id;
    echo "New record created successfully. Your ID is: " . $last_id;
  }
  else {
      $_SESSION['message'] = "Account was not created:(";
  }
}

$mysqli->close();
?>

<html>
	<head>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>Create a Profile</title>
    <!-- [ FONT-AWESOME ICON ]
          =========================================================================================================================-->
  	<link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">
    <!-- [ DEFAULT STYLESHEET ]
        =========================================================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/color/green.css">



	</head>

	<body>
    <div class="form-style-5">
      <form class="form-style-5" action="profile.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
        <input type="text" placeholder="Height" name="height" required />
        <input type="text" placeholder="Weight" name="weight" required />
        <input type="text" placeholder="Age" name="age" required />
        <input type="submit" value="Submit" name="Create Account" class="btn btn-block btn-primary" />

        <div class="module">
      </form>
    </div>


	</body>
</html>
