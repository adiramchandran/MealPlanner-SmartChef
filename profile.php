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


//mysqli_close($link);

// INSERT DONE
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  $age = $_POST['age'];
  $weight_per_wk = $_POST['weight_per_wk'];
  $lifestyle = $_POST['lifestyle'];
  $gender = $_POST['gender'];

  
  $bmr = 0.0;
  if ($gender == "f"){} // calc female BMR expression
      $bmr += 655 + (4.35 * $weight) + (4.7 * $height) - (4.7 * $age);
  }
  else{                 // calc male BMR expression
      $bmr += 66 + (6.23 * $weight) + (12.7 * $height) - (6.8 * $age);
  }
  // account for lifestyle (scale of 1 -> 5; sedentary to extremely active)
  switch ($lifestyle){
      case 1:
        $bmr *= 1.2;
      case 2:
        $bmr *= 1.375;
      case 3:
        $bmr *= 1.55;
      case 4:
        $bmr *= 1.725;
      case 5:
        $bmr *= 1.9;
  }
  // use BMR to calc target calories per day
  $cal = $bmr + ( ($weight_per_wk * 3500) / 7 );


  $sql = "INSERT INTO User (ID, Height, Weight, Age, Weight_per_Wk, Lifestyle, Gender, BMR, Cal_per_day) " . " VALUES (NULL, $height, $weight, $age, $weight_per_wk, $lifestyle, $gender, $bmr, $cal)";
  // printf("Last inserted record has id %d" . mysql_insert_id());

  if(mysqli_query($mysqli, $sql) === true) {
    $last_id = $mysqli->insert_id;
    $_SESSION['user'] = "New record created successfully. Your ID is: " . $last_id;
  }
  else {
      $_SESSION['message'] = "Account was not created:(";
  }
}



// UPDATE
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $updateID = $_POST['updateID'];
  $updateHeight = $_POST['updateHeight'];
  $updateWeight = $_POST['updateWeight'];
  $updateAge = $_POST['updateAge'];
  $sql = "UPDATE User SET Height = $updateHeight, Weight = $updateWeight, Age = $updateAge WHERE ID = $updateID";


  if(mysqli_query($mysqli, $sql) === true) {
    echo "Your entry has been updated";
  }
  else {
      $_SESSION['message'] = "Account not updated";
  }
}

// DELETE
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $deleteID = $_POST['deleteID'];
  $sql = "DELETE FROM User WHERE ID = $deleteID";


  if(mysqli_query($mysqli, $sql) === true) {
    echo "Your entry has been deleted";
  }
  else {
      $_SESSION['message'] = "Account not deleted";
  }
}



// Search

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $searchId = $_POST['searchId'];
  $sql = "SELECT Height, Weight, Age FROM User WHERE ID = $searchId";

  $results = mysqli_query($mysqli, $sql);
  if($results == true) {
    while($row = mysqli_fetch_assoc($results)) {
            $_SESSION['results'] = "Height: " . $row['Height']. " - Weight: " . $row['Weight'] . " - Age: " . $row['Age'] . "<br>";
            // echo "id: " . $row["ID"]. " - Height: " . $row["Height"]. " - Weight: " . $row["Weight"]. "br>";
            echo $row['Height'];
            echo $row['Weight'];
            echo $row['Age'];
    }
  }
  else {
      $_SESSION['message'] = "Search error";
  }
}
// mysqli_close($link);
$mysqli->close();



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
	<link rel="stylesheet" type="text/css" href="css/animate.css">
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
            <li><a href="index.html" class="page-scroll">Home</a></li>
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
    <form style="margin-top:80px;}" class="form" action="profile.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><font color="black"><?= $_SESSION['user'] ?></font>/div>
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="Height" name="height" required />
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="Weight" name="weight" required />
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="Age" name="age" required />
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="Goal Weight Change Per Week" name="weight_per_wk" required />
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="Lifestyle" name="lifestyle" required />
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="Gender" name="gender" required />
      <input type="submit" value="Submit" name="Create Account" class="btn btn-block" />

      <div class="module">
    </form>
  </section>

  <section class="metrics">
    <form style="margin-top:80px; color:black}" class="form" action="profile.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="ID" name="updateID" required />
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="Height" name="updateHeight" required />
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="Weight" name="updateWeight" required />
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="Age" name="updateAge" required />
      <input type="submit" value="Update Entry" name="updateAccount" class="btn btn-block" />

      <div class="module">
    </form>
  </section>

  <section class="metrics">
    <form style="margin-top:80px;}" class="form" action="profile.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="ID" name="deleteID" required />
      <input type="submit" value="Delete Account" name="deleteAccount" class="btn btn-block" />

      <div class="module">
    </form>
  </section>

  <section class="metrics">
    <form style="margin-top:80px;}" class="form" action="profile.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><font color="black"><?= $_SESSION['results'] ?></font>/div>
      <input style="color:#000000;" this.style.color='#000000' type="text" placeholder="ID" name="searchId" required />
      <input type="submit" value="Search User Metrics" name="searchAccounts" class="btn btn-block" />

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
