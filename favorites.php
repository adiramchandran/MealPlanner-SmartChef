<?php
if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE')) {
    session_cache_limiter("public");
}
session_start();
function listFavorites() {
  $user = $_SESSION['username'];
  $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
  $sql = "SELECT distinct * FROM RecipeList left join UserFavorites on title=RecipeName where Username="."'$user'"."";
  $results = mysqli_query($mysqli, $sql);
  while ($row = mysqli_fetch_assoc($results)) {
        echo "<div class='box-one'>";
        echo "<h2>" . $row["title"] . "</h2>";
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
        echo '<form align="center" action="favorites.php" method="post">
          <input type="hidden" name="title" id="title" value="' . $row["title"] . '">
          <input class="button" type="Submit" name="unfave" value="Unfavorite Recipe"></button>
        </form>';
        echo "</div>";
  }
  mysqli_close($mysqli);
}

if (!empty($_POST['unfave'])) {
  $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
  $title = $_POST['title'];
  $user = $_SESSION['username'];
  $sql = "DELETE FROM UserFavorites WHERE Username = '$user' AND  RecipeName = '$title'";
  $results = mysqli_query($mysqli, $sql);
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
	<title>Favorites</title>

	<!-- [ FONT-AWESOME ICON ]
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">
	<!-- [ PLUGIN STYLESHEET ]
        =========================================================================================================================-->
	<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <style>
  .box-one,.box-two,.box-three {
  width:100%;
  text-align:center;
  }
  .box-one {
  background:#a9867f;
  padding-top: 20px;
  padding-bottom: 20px;
  border-bottom: 10px;
  border-color: #e7e7e7;
  color: white;
  /* padding-bottom: 10px;
  padding-top: 10px; */
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
    font-size: 18px;
    margin-top: 20px;
    margin-bottom: 15px;
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
    background-color: #262626;
  }
  .column3 {
    height:800px;
    text-align:center;
    width: 33.33%;
    padding-top: 100px;
    float: left;
    background-color: #333;
  }
  .row {
    height:100%;
    border-right: 175px solid #262626;
    border-left: 175px solid #262626;
    border-color: #76b852;
    background-color: #fff;
  }
  .block {
    height:250px;
    background-color: #B3B3B3;
    border-bottom-color: #257525;
    border-bottom: 5px;
  }
  .block1 {
    height:100%;
    background-color: #a9867f;
    border-bottom-color: #257525;
    border-bottom: 5px;
  }
  h1 {
    padding-left: 50px;
    padding-top: 150px;
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
  <div class="block">
    <h1>Your Favorites</h1>
  </div>
  <div class="search-container" style="float:center; color:black;">
    <form align="center" action="favorites.php" method="post">
      <input type="text" style="padding-top:8px; padding-bottom:8px; text-align:center; margin-top: 20px; margin-bottom: 20px;" placeholder="Filter by Meal" name="search" list="meal">
      <datalist id="meal">
        <option type="text" value="B">
        <option type="text" value="L">
          <option type="text" value="D">
      </datalist>
      <input class="button" type="Submit" name="filter"></button>
    </form>
  </div>
  <div class="search-container" style="float:center; color:black;">
    <form align="center" action="favorites.php" method="post">
      <input type="number" style="padding-top:8px; padding-bottom:8px; text-align:center; margin-top: 20px; margin-bottom: 20px;" placeholder="Lower Calorie Bound" name="lower">
      <input type="number" style="padding-top:8px; padding-bottom:8px; text-align:center; margin-top: 20px; margin-bottom: 20px;" placeholder="Upper Calorie Bound" name="upper" >
      <input class="button" type="Submit" name="range"></button>
    </form>
  </div>
  <div>
    <form align="center" action="#" method="post" style="float:center; color:black;">
      <button class="button" onclick="#" value="Remove Filters" name="refresh">Remove Filters</button>
    </form>
  </div>
  <section>
    <?php
    if (!empty($_POST['filter'])) {
      $mealType = $_POST['search'];
      $user = $_SESSION['username'];
      $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
      $sql = "SELECT distinct * FROM RecipeList left join UserFavorites on title=RecipeName where MealType = '$mealType' and Username="."'$user'";
      $results = mysqli_query($mysqli, $sql);
      while ($row = mysqli_fetch_assoc($results)) {
            echo "<div class='box-one'>";
            echo "<h2>" . $row["title"] . "</h2>";
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
            echo '<form align="center" action="favorites.php" method="post">
              <input type="hidden" name="title" id="title" value="' . $row["title"] . '">
              <input class="button" type="Submit" name="unfave" value="Unfavorite Recipe"></button>
            </form>';
            echo "</div>";
      }
      mysqli_close($mysqli);
    }
    else if (!empty($_POST['range'])) {
      $lower = $_POST['lower'];
      $upper = $_POST['upper'];
      $user = $_SESSION['username'];
      $mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
      $sql = "SELECT * FROM UserFavorites JOIN RecipeList ON RecipeName = title WHERE calories > '$lower' AND calories <= '$upper' and Username='$user'";
      $results = mysqli_query($mysqli, $sql);
      while ($row = mysqli_fetch_assoc($results)) {
            echo "<div class='box-one'>";
            echo "<h2>" . $row["title"] . "</h2>";
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
            echo '<form align="center" action="favorites.php" method="post">
              <input type="hidden" name="title" id="title" value="' . $row["title"] . '">
              <input class="button" type="Submit" name="unfave" value="Unfavorite Recipe"></button>
            </form>';
            echo "</div>";
      }
      mysqli_close($mysqli);
    }
    else {
      listFavorites();
    }
     ?>
  <section>
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
