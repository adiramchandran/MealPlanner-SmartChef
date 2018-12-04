<?php
if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE')) {
    session_cache_limiter("public");
}
session_start();
$_SESSION['insert_out'] = "Update your profile!";
$_SESSION['update_out'] = "";
$_SESSION['delete_out'] = "Delete your profile!";
$_SESSION['search_out'] = "Find your current metrics!";
$con = new mysqli("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
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
//mysqli_close($link);
/*
// check connection
if (mysqli_connect_errno()){
    printf("connection failed: %s\n", mysqli_connect_error());
}
*/

// Show Metrics
if (!empty($_POST['showMetrics'])) {
  $usernameMets = $_POST['usernameMets'];
  $passwordMets = $_POST['passwordMets'];
  $sql = "SELECT * FROM User WHERE Username = "."'$usernameMets'"." AND Password = "."'$passwordMets'";
  $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
  $result = mysqli_query($mysqli, $sql);
  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      if ($row["Gender"] == 1){
          $gender = "Gender: Male";
        }
        else{
          $gender = "Gender: Female";
        }

      $_SESSION['search_out'] = "Username: " . $row["Username"] . "\n<br />". "Height: " . $row["Height"] . " inches" . "\n<br />" . "Weight: " . $row["Weight"] . " lbs" . "\n<br />" . "Age: " . $row["Age"] . " years" . "\n<br />" . "Weight Change Per Week: " . $row["Weight_per_wk"] . "lbs " . "\n<br />". "Lifestyle Rating: " . $row["Lifestyle"] . "\n<br />". "$gender";



    }

  }
  else {
    $_SESSION['search_out'] = "Shit did not work";
  }

  mysqli_close($mysqli);
}


// INSERT DONE <-- THIS IS NOW AN UPDATE
if (!empty($_POST['CreateAccount'])) {
  // extract all the new information
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  $age = $_POST['age'];
  $weight_per_wk = $_POST['weight_per_wk'];
  $lifestyle = $_POST['lifestyle'];
  $gender = $_POST['gender'];
  $bmr = 0.0;
  // bmr calculations
  if ($gender == 2){ // calc female BMR expression
      $bmr += 655 + (4.35 * $weight) + (4.7 * $height) - (4.7 * $age);
  }
  else{                 // calc male BMR expression
      $bmr += 66 + (6.23 * $weight) + (12.7 * $height) - (6.8 * $age);
  }
  // account for lifestyle (scale of 1 -> 5; sedentary to extremely active)
  if ($lifestyle == 1) { $bmr *= 1.2; }
  else if ($lifestyle == 2) { $bmr *= 1.375; }
  else if ($lifestyle == 3) { $bmr *= 1.55; }
  else if ($lifestyle == 4) { $bmr *= 1.725; }
  else if ($lifestyle == 5) { $bmr *= 1.9; }
  else { $bmr = 0.0; }
  // use BMR to calc target calories per day
  $cal = $bmr + ( ($weight_per_wk * 3500) / 7 );
  $_SESSION['numCalories'] = $cal;
  $username = $_SESSION['username'];
  $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
  $sql = "UPDATE User SET Height = $height, Weight = $weight, Age = $age, Weight_per_wk = $weight_per_wk, Lifestyle = $lifestyle, Gender = $gender, BMR = $bmr, Cal_per_day = $cal WHERE Username =" . "'$username'";
  if (mysqli_query($mysqli, $sql)) {
    $_SESSION['insert_out'] = "Profile has been updated!";
  }
  else {
   $_SESSION['insert_out'] = "Profile was not updated.";
  }
  mysqli_close($mysqli);
}
// DELETE
if (!empty($_POST['deleteAccount'])) {
  $usernameID = $_POST['username'];
  $password = $_POST['password'];
  $sql = "DELETE FROM User WHERE Username = "."'$usernameID'"."AND Password = "."'$password'";
  $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
  if(mysqli_query($mysqli, $sql) === true) {
    $_SESSION['delete_out'] = "Your account has been deleted";
    header("Location: http://www.teamsaauuwwce.web.illinois.edu/index.html");
  }
  else {
    $_SESSION['delete_out'] = "Account not deleted";
  }

  mysqli_close($mysqli);
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Saucy Chef</title>

	<!-- [ FONT-AWESOME ICON ]
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">

	<!-- [ PLUGIN STYLESHEET ]
        =========================================================================================================================-->
	<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
  <link rel ="stylesheet" type="text/css" href="library/vegas/vegas.min.css">
	<!-- [ Boot STYLESHEET ]
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap.css">

        <!-- [ DEFAULT STYLESHEET ]
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/color/green.css">

</head>
<body >
<!-- [ LOADERs ]
================================================================================================================================-->
    <div class="preloader">
    <div class="loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- [ /PRELOADER ]
=============================================================================================================================-->
<!-- [WRAPPER ]
=============================================================================================================================-->
<div class="wrapper">

 <!-- [NAV]
 ============================================================================================================================-->
   <!-- Navigation
    ==========================================-->
    <section>
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
            <li><a href="landingpage.php" class="page-scroll">Home</a></li>
            <li><a href="profile.php" class="page-scroll">My Profile</a></li>
            <li><a href="dailyplan.php" class="page-scroll">Daily Plan</a></li>
            <li><a href="favorites.php" class="page-scroll">Favorites</a></li>
            <li><a href="similar.php" class="page-scroll">Similar Users</a></li>
            <li><a>Welcome, <?php echo $_SESSION['username'];?>!</a>
            <li><a href="logout.php" class="page-scroll">Logout</a></li>
            <li><a href="#contact" class="page-scroll" id="contacts"><i class="fa fa-send"></i></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </section>


   <!-- [/NAV]
 ============================================================================================================================-->





  <!-- [METRICS ]
=============================================================================================================================-->

  <section class="metrics">
    <form style="margin-top:80px;" class="form" action="profile.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><font color="black"><?= $_SESSION['search_out'] ?></font></div>
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="Username" name="usernameMets" required />
      <input style="color:#000000;" this.style.color='#000000' type="password" placeholder="Password" name="passwordMets" required />
      <input type="submit" value="Show Metrics" name="showMetrics" class="btn btn-block" />
      <div class="module">
    </form>
  </section>

   <!-- Section for updating user information-->
  <section class="metrics">
    <form style="margin-top:80px;}" class="form" action="profile.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><font color="black"><?= $_SESSION['insert_out'] ?></font></div>
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="Height (in inches)" name="height" required />
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="Weight (in pounds)" name="weight" required />
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="Age (in years)" name="age" required />
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="Goal Weight Change Per Week" name="weight_per_wk" required />
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="Lifestyle (1-5, increasing level of activity)" name="lifestyle" list="lifestyle" required />
        <datalist id="lifestyle">
          <option type="text" value="1">
          <option type="text" value="2">
          <option type="text" value="3">
          <option type="text" value="4">
          <option type="text" value="5">
        </datalist>

      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="Gender (1 for male, 2 for female)" name="gender" list="gender" required />
        <datalist id="gender">
          <option type="text" value="1">
          <option type="text" value="2">
        </datalist>
      <input type="submit" value="Submit" name="CreateAccount" class="btn btn-block" />
      <div class="module">
    </form>
  </section>

  <!-- Section for deleting user-->
  <section class="metrics">
    <form style="margin-top:80px;" class="form" action="profile.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><font color="black"><?= $_SESSION['delete_out'] ?></font></div>
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="Username" name="username" required />
      <input style="color:#000000;" this.style.color='#000000' type="password" placeholder="Password" name="password" required />
      <input type="submit" value="Delete Account" name="deleteAccount" class="btn btn-block" />
      <div class="module">
    </form>
  </section>



</div>


<!-- [ /WRAPPER ]
=============================================================================================================================-->

	<!-- [ DEFAULT SCRIPT ] -->
	<script src="library/modernizr.custom.97074.js"></script>
	<script src="library/jquery-1.11.3.min.js"></script>
        <script src="library/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script src="library/vegas/vegas.min.js"></script>
	<!-- [ PLUGIN SCRIPT ] -->

	<script src="js/plugins.js"></script>
        <script src="js/fappear.js"></script>
       <script src="js/jquery.countTo.js"></script>
	<script src="js/scrollreveal.js"></script>
       	 <!-- [ COMMON SCRIPT ] -->
	<script src="js/common.js"></script>

</body>


</html>
