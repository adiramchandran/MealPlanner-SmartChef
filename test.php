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
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thullu Polls &mdash; Share Your Opinions</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400|Montserrat:400,700" rel="stylesheet"> -->

	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

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
