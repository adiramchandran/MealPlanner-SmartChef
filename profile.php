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
    <link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">

    <!-- [ PLUGIN STYLESHEET ]
          =========================================================================================================================-->
  	<link rel="stylesheet" type="text/css" href="css/animate.css">
  	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
    <link rel ="stylesheet" type="text/css" href="library/vegas/vegas.min.css">
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
    <div class="wrapper">
    <nav  class="amd-menu navbar navbar-default navbar-fixed-top theme_background_color fadeInDown">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="index.html">SAUCY CHEF<span class="black"></span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.html" class="page-scroll">Home</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

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
