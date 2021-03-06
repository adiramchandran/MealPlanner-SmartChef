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
        echo "Target Breakfast Calories: " . $_SESSION['numCalories']*0.2 . " calories";
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
        echo '<div clas="divider">';
        echo '</div>';
        echo '<form action="dailyplan.php" method="post">
          <input type="submit" class="button" name="shuffleb" id="shuffleb" value="Shuffle" /><br/>
        </form>';
        echo '<div clas="divider">';
        echo '</div>';
        echo "</div>";
        break;
  }
  mysqli_close($mysqli);
}
function findLunch() {
  $user = $_SESSION['username'];
  $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
  $sql = "SELECT * FROM RecipeList where calories < (select Cal_per_day*0.45 from User where Username="."'$user'".") and calories > (select Cal_per_day*0.35 from User where Username="."'$user'".") and MealType = 'L'";
  $results = mysqli_query($mysqli, $sql);
  while ($row = mysqli_fetch_assoc($results)) {
        $_SESSION["lunch"] = $row["title"];
        echo "<div id=deletel>";
        echo "Target Lunch Calories: " . $_SESSION['numCalories']*0.4 . " calories";
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
        echo '<div clas="divider">';
        echo '</div>';
        echo '<form action="dailyplan.php" method="post">
          <input type="submit" class="button" name="shufflel" id="shufflel" value="Shuffle" /><br/>
        </form>';
        echo '<div clas="divider">';
        echo '</div>';
        echo '</div>';
        break;
  }
  mysqli_close($mysqli);
}
function findDinner() {
  $user = $_SESSION['username'];
  $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
  $sql = "SELECT * FROM RecipeList where calories < (select Cal_per_day*0.45 from User where Username="."'$user'".") and calories > (select Cal_per_day*0.35 from User where Username="."'$user'".") and MealType = 'D'";
  $results = mysqli_query($mysqli, $sql);
  while ($row = mysqli_fetch_assoc($results)) {
        $_SESSION["dinner"] = $row["title"];
        echo "<div id=deleted>";
        echo "Target Dinner Calories: " . $_SESSION['numCalories']*0.4 . " calories";
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
        echo '<div clas="divider">';
        echo '</div>';
        echo '<form action="dailyplan.php" method="post">
          <input type="submit" class="button" name="shuffled" id="shuffled" value="Shuffle" /><br/>
        </form>';
        echo '<div clas="divider">';
        echo '</div>';
        echo '</div>';
        break;
  }
  mysqli_close($mysqli);
}
if (!empty($_POST['faveb'])) {
  $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
  $title = $_SESSION['breakfast'];
  $user = $_SESSION['username'];
  $sql = "INSERT INTO UserFavorites (Username, RecipeName) " . " VALUES ('$user', '$title')";
  $results = mysqli_query($mysqli, $sql);
  $_SESSION['messageb'] = "Recipe Favorited!";
}
if (!empty($_POST['favel'])) {
  $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
  $title = $_SESSION['lunch'];
  $user = $_SESSION['username'];
  $sql = "INSERT INTO UserFavorites (Username, RecipeName) " . " VALUES ('$user', '$title')";
  $results = mysqli_query($mysqli, $sql);
  $_SESSION['messagel'] = "Recipe Favorited!";
}
if (!empty($_POST['faved'])) {
  $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
  $title = $_SESSION['dinner'];
  $user = $_SESSION['username'];
  $sql = "INSERT INTO UserFavorites (Username, RecipeName) " . " VALUES ('$user', '$title')";
  $results = mysqli_query($mysqli, $sql);
  $_SESSION['messaged'] = "Recipe Favorited!";
}

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

  .divider{
    height:5px;
    width:auto;
    display:inline-block;
  }

  .button {
    background-color: #e7e7e7;
    border: none;
    color: black;
    padding: 10px 27px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin-top: 20px;
  }
  .column1 {
    height:800px;
    text-align:center;
    width: 33.33%;
    padding-top: 130px;
    padding-left: 15px;
    float: left;
    background-color: #B3B3B3;
  }
  .column2 {
    height:800px;
    text-align:center;
    width: 33.33%;
    padding-top: 130px;
    float: left;
    background-color:#76b852;
  }
  .column3 {
    height:800px;
    text-align:center;
    width: 33.33%;
    padding-top: 130px;
    float: left;
    padding-right: 15px;
    background-color: #a9867f;
  }

  h1 {
    margin-top: 10px;
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
            <a class="navbar-brand" href="landingpage.php">SAUCY CHEF<span class="black"></span></a>
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
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>


   <!-- [/NAV]
 ============================================================================================================================-->
<div class="row">
  <div class="column1">
    <?php
    if (!empty($_POST['shuffleb'])) {
      $_SESSION['messageb'] = "";
      $user = $_SESSION['username'];
      $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
      $sql = "SELECT * FROM RecipeList where calories < (select Cal_per_day*0.25 from User where Username="."'$user'".") and calories > (select Cal_per_day*0.15 from User where Username="."'$user'".") and MealType = 'B' order by rand()";
      $results = mysqli_query($mysqli, $sql);
      while ($row = mysqli_fetch_assoc($results)) {
            $_SESSION["breakfast"] = $row["title"];
            echo "<div id=deletel>";
            echo "Target Breakfast Calories: " . $_SESSION['numCalories']*0.2 . " calories";
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
            echo '<div clas="divider">';
            echo '</div>';
            echo '<form action="dailyplan.php" method="post">
              <input type="submit" class="button" name="shuffleb" id="shuffleb" value="Shuffle" /><br/>
            </form>';
            echo '<div clas="divider">';
            echo '</div>';
            echo '</div>';
            break;
      }
      mysqli_close($mysqli);
    }
    else if (isset($_SESSION['breakfast'])) {
      $breakfast = $_SESSION['breakfast'];
      $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
      $sql = "SELECT * FROM RecipeList where title='$breakfast'";
      $results = mysqli_query($mysqli, $sql);
      while ($row = mysqli_fetch_assoc($results)) {
            $_SESSION["breakfast"] = $row["title"];
            echo "<div id=deletel>";
            echo "Target Breakfast Calories: " . $_SESSION['numCalories']*0.2 . " calories";
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
            echo '<div clas="divider">';
            echo '</div>';
            echo '<form action="dailyplan.php" method="post">
              <input type="submit" class="button" name="shuffleb" id="shuffleb" value="Shuffle" /><br/>
            </form>';
            echo '<div clas="divider">';
            echo '</div>';
            echo '</div>';
            break;
      }
      mysqli_close($mysqli);
    }
    else {
      findBreakfast();
    }
    ?>
    <form action='dailyplan.php' method="POST">
      <input type="submit" class="button" name="faveb" id="faveb" value="Favorite" /><br/>
    </form>
    <div style="margin-top:10px;"><?= $_SESSION['messageb'] ?></div>
  </div>

  <div class="column2">
    <?php
    if (!empty($_POST['shufflel'])) {
      $_SESSION['messagel'] = "";
      $user = $_SESSION['username'];
      $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
      $sql = "SELECT * FROM RecipeList where calories < (select Cal_per_day*0.45 from User where Username="."'$user'".") and calories > (select Cal_per_day*0.35 from User where Username="."'$user'".") and MealType = 'L' order by rand()";
      $results = mysqli_query($mysqli, $sql);
      while ($row = mysqli_fetch_assoc($results)) {
            $_SESSION["lunch"] = $row["title"];
            echo "<div id=deletel>";
            echo "Target Lunch Calories: " . $_SESSION['numCalories']*0.4 . " calories";
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
            echo '<div clas="divider">';
            echo '</div>';
            echo '<form action="dailyplan.php" method="post">
              <input type="submit" class="button" name="shufflel" id="shufflel" value="Shuffle" /><br/>
            </form>';
            echo '<div clas="divider">';
            echo '</div>';
            echo '</div>';
            break;
      }
      mysqli_close($mysqli);
    }
    else if (isset($_SESSION['lunch'])) {
      $lunch = $_SESSION['lunch'];
      $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
      $sql = "SELECT * FROM RecipeList where title='$lunch'";
      $results = mysqli_query($mysqli, $sql);
      while ($row = mysqli_fetch_assoc($results)) {
            $_SESSION["lunch"] = $row["title"];
            echo "<div id=deletel>";
            echo "Target Lunch Calories: " . $_SESSION['numCalories']*0.4 . " calories";
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
            echo '<div clas="divider">';
            echo '</div>';
            echo '<form action="dailyplan.php" method="post">
              <input type="submit" class="button" name="shufflel" id="shufflel" value="Shuffle" /><br/>
            </form>';
            echo '<div clas="divider">';
            echo '</div>';
            echo '</div>';
            break;
      }
      mysqli_close($mysqli);
    }
    else {
      findLunch();
    }
    ?>
    <form action='dailyplan.php' method="POST">
      <input type="submit" class="button" name="favel" id="favel" value="Favorite" /><br/>
    </form>
    <div style="margin-top:10px;"><?= $_SESSION['messagel'] ?></div>
  </div>
  <div class="column3">
    <?php
    if (!empty($_POST['shuffled'])) {
      $_SESSION['messaged'] = "";
      $user = $_SESSION['username'];
      $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
      $sql = "SELECT * FROM RecipeList where calories < (select Cal_per_day*0.45 from User where Username="."'$user'".") and calories > (select Cal_per_day*0.35 from User where Username="."'$user'".") and MealType = 'D' order by rand()";
      $results = mysqli_query($mysqli, $sql);
      while ($row = mysqli_fetch_assoc($results)) {
            $_SESSION["dinner"] = $row["title"];
            echo "<div id=deletel>";
            echo "Target Dinner Calories: " . $_SESSION['numCalories']*0.4 . " calories";
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
            echo '<div clas="divider">';
            echo '</div>';
            echo '<form action="dailyplan.php" method="post">
              <input type="submit" class="button" name="shuffled" id="shuffled" value="Shuffle" /><br/>
            </form>';
            echo '<div clas="divider">';
            echo '</div>';
            echo '</div>';
            break;
      }
      mysqli_close($mysqli);
    }
    else if (isset($_SESSION['dinner'])) {
      $dinner = $_SESSION['dinner'];
      $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
      $sql = "SELECT * FROM RecipeList where title='$dinner'";
      $results = mysqli_query($mysqli, $sql);
      while ($row = mysqli_fetch_assoc($results)) {
            $_SESSION["dinner"] = $row["title"];
            echo "<div id=deletel>";
            echo "Target Dinner Calories: " . $_SESSION['numCalories']*0.4 . " calories";
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
            echo '<div clas="divider">';
            echo '</div>';
            echo '<form action="dailyplan.php" method="post">
              <input type="submit" class="button" name="shuffled" id="shuffled" value="Shuffle" /><br/>
            </form>';
            echo '<div clas="divider">';
            echo '</div>';
            echo '</div>';
            break;
      }
      mysqli_close($mysqli);
    }
    else {
      findDinner();
    }
    ?>
    <form action='dailyplan.php' method="POST">
      <input type="submit" class="button" name="faved" id="faved" value="Favorite" /><br/>
    </form>
    <div style="margin-top:10px;" ><?= $_SESSION['messaged'] ?></div>
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
