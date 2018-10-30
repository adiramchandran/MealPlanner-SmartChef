<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
	<title></title>
	<link rel="stylesheet" href="w3.css">
</head>

<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("127.0.0.1", "thullupolls_root", "Surabhiharish", "thullupolls_thullupolls");

$link = mysqli_connect("127.0.0.1", "thullupolls_root", "Surabhiharish", "thullupolls_thullupolls");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['password'] == $_POST['confirmpassword']){
        $name = $mysqli->real_escape_string($_POST['name']);
        $id = $mysqli->real_escape_string($_POST['id']);
        $password = $mysqli->real_escape_string($_POST['password']);
        $_SESSION['name'] = $name;
        $_SESSION['id'] = $id;
        $sql = "INSERT INTO User (id, name, password) " . "VALUES ('$id', '$name', '$password')";

        if(($mysqli->query($sql) === true)){
						header("Location: http://thullupolls.web.illinois.edu/signin.php");
						exit();
        }
        else{
            $_SESSION['message'] = "Account was not created:(";
        }

    }
    else{
        $_SESSION['message'] = "Two passwords do not match! Please type a valid password.";
    }
}
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
