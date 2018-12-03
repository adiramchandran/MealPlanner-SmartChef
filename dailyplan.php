<?php
if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE')) {
    session_cache_limiter("public");
}
session_start();


function findBreakfast() {
  $user = $_SESSION['username'];
  $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
  $sql = "SELECT * FROM RecipeList where calories < (select Cal_per_day*0.25 from User where Username=" . "'$user'" . ") and calories > (select Cal_per_day*0.15 from User where Username=" . "'$user'" .") and MealType = 'B'";
  $results = mysqli_query($mysqli, $sql);
  while ($row = mysqli_fetch_assoc($results)) {
        $_SESSION["breakfast"] = $row["title"];
        echo "<div id=deleteb>";
        echo "Breakfast: " . $_SESSION['numCalories']*0.2;
        echo "<h1>" . $row["title"] . "</h1>";
        echo '<br>';
        echo "Calories: " . $row["calories"];
        echo '<br>';
        echo "Fat: " . $row["fat"] . " grams";
        echo '<br>';
        echo "Protein: " . $row["protein"] . " grams";
        echo '<br>';
        echo "Carbohydrates: " . $row["carbs"] . " grams";
        echo '<br>';
        echo '<button target="_blank" class=button onclick="window.location.href=\'' . $row["url"] . '\'">View Recipe Now</button>';
        // echo '<input type="submit" class="button" name="testb" id="testb" value="Shuffle" /><br/>';
        echo "</div>";
        break;
  }
  mysqli_close($mysqli);
}

// if($_SERVER['REQUEST_METHOD'] == 'GET') {
//   $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
//   $title = $_SESSION['breakfast'];
//   $user = $_SESSION['username'];
//   $sql = "INSERT INTO UserFavorites (Username, RecipeName) " . " VALUES ('$user', '$title')";
//   $results = mysqli_query($mysqli, $sql);
//   // if ($results) {
//   //   echo "succeeded";
//   // }
//   // else {
//   //   echo "failed";
//   // }
// }
// if($_POST){
//     if(isset($_POST['testb'])){
//         findBreakfast();
//     }elseif(isset($_POST['testl'])){
//         findLunch();
//     }
//     elseif(isset($_POST['testd'])){
//         findDinner();
//     }
// }
// if(array_key_exists('testb',$_POST)){
//   removeFunction("deleteb");
//   findBreakfast();
// }
// if(array_key_exists('testl',$_POST)){
//   removeFunction("deletel");
//   findLunch();
// }
// if(array_key_exists('testd',$_POST)){
//   removeFunction("deleted");
//   findLunch();
// }
?>

<!DOCTYPE html>
<!--
++++++++++++++++++++++++++++++++++++++++++++++++++++++
AUTHOR : Vijayan PP
PROJECT :A-MD
VERSION : 1.1
++++++++++++++++++++++++++++++++++++++++++++++++++++++
-->
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Daily Plan</title>

	<!-- [ FONT-AWESOME ICON ]
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">
  <!-- <script type="text/javascript">
    function removeCurr(x) {
      var elem = document.getElementById(x);
      elem.parentNode.removeChild(elem);
    }
  </script> -->

  <?php
  // function removeFunction($x) {
  //   echo '<script type="text/javascript">',
  //      'removeCurr('.$x.');',
  //   '</script>';
  // }
   ?>
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
  <!-- <script>
  $(function() {
    $("testb").click(function() {
       $("#deleteb").load("dailyplan.php")
    })
  })

  </script> -->

        <!-- [ DEFAULT STYLESHEET ]
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/color/green.css">
  <style>
  .box-one,.box-two,.box-three {
  width:100%;
  text-align:center;
  }
  .box-one {
  background:green;
  padding-bottom: 10px;
  padding-top: 10px;
  }
  .box-two {
  background:black;
  padding-bottom: 10px;
  padding-top: 10px;
  }
  .box-three {
  background:hotpink;
  }
  .button {
    background-color: #e7e7e7;
    border: none;
    color: black;
    padding: 10px 27px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
  }
  .column1 {
    height:800px;
    text-align:center;
    width: 33.33%;
    padding-top: 100px;
    float: left;
    background-color: #B3B3B3;
  }
  .column2 {
    height:800px;
    text-align:center;
    width: 33.33%;
    padding-top: 100px;
    float: left;
    background-color:#76b852;
  }
  .column3 {
    height:800px;
    text-align:center;
    width: 33.33%;
    padding-top: 100px;
    float: left;
    background-color: #a9867f;
  }
  </style>

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
            <li><a href="dailyplan.php" class="page-scroll">Weekly Plan</a></li>
            <li><a href="favorites.php" class="page-scroll">Favorites</a></li>
            <li><a>Welcome, <?php echo $_SESSION['username'];?>!</a>
            <li><a href="logout.php" class="page-scroll">Logout</a></li>
            <li><a href="#contact" class="page-scroll" id="contacts"><i class="fa fa-send"></i></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>


   <!-- [/NAV]
 ============================================================================================================================-->
<div class="row">
  <div class="column1">
    <?php
      findBreakfast();
    ?>
    <form action='dailyplan.php' method="GET">
      <input type="submit" class="button" name="fave" id="fave" value="Favorite" /><br/>
    </form>
  </div>

  <div class="column2">
    <?php
    function findLunch() {
      $user = $_SESSION['username'];
      $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
      $sql = "SELECT * FROM RecipeList where calories < (select Cal_per_day*0.45 from User where Username="."'$user'".") and calories > (select Cal_per_day*0.35 from User where Username="."'$user'".") and MealType = 'L'";
      $results = mysqli_query($mysqli, $sql);
      while ($row = mysqli_fetch_assoc($results)) {
            $_SESSION["lunch"] = $row["title"];
            echo "<div id=deletel>";
            echo "Lunch: " . $_SESSION['numCalories']*0.4;
            echo "<h1>" . $row["title"] . "</h1>";
            echo '<br>';
            echo "Calories: " . $row["calories"];
            echo '<br>';
            echo "Fat: " . $row["fat"] . " grams";
            echo '<br>';
            echo "Protein: " . $row["protein"] . " grams";
            echo '<br>';
            echo "Carbohydrates: " . $row["carbs"] . " grams";
            echo '<br>';
            echo '<button class=button target="_blank" onclick="window.location.href=\'' . $row["url"] . '\'">View Recipe Now</button>';
            // echo '<form action=\'{$_SERVER[\'PHP_SELF\']}\' method="post">
            //   <input type="submit" class="button" name="testl" id="testl" value="Shuffle" onclick="removeCurr(deleteb)" /><br/>
            // </form>';
            echo '</div>';
            break;
      }
      mysqli_close($mysqli);
    }
      findLunch();
    ?>
  </div>
  <div class="column3">
    <?php
    function findDinner() {
      $user = $_SESSION['username'];
      $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
      $sql = "SELECT * FROM RecipeList where calories < (select Cal_per_day*0.45 from User where Username="."'$user'".") and calories > (select Cal_per_day*0.35 from User where Username="."'$user'".") and MealType = 'D'";
      $results = mysqli_query($mysqli, $sql);
      while ($row = mysqli_fetch_assoc($results)) {
            $_SESSION["dinner"] = $row["title"];
            echo "<div id=deleted>";
            echo "Dinner: " . $_SESSION['numCalories']*0.4;
            echo "<h1>" . $row["title"] . "</h1>";
            echo '<br>';
            echo "Calories: " . $row["calories"];
            echo '<br>';
            echo "Fat: " . $row["fat"] . " grams";
            echo '<br>';
            echo "Protein: " . $row["protein"] . " grams";
            echo '<br>';
            echo "Carbohydrates: " . $row["carbs"] . " grams";
            echo '<br>';
            echo '<button class=button target="_blank" onclick="window.location.href=\'' . $row["url"] . '\'">View Recipe Now</button>';
            // echo '
            //   <input type="submit" class="button" name="testd" id="testd" value="Shuffle" /><br/>';
            echo '</div>';
            break;
      }
      mysqli_close($mysqli);
    }
      findDinner();
    ?>
  </div>
</div>

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
