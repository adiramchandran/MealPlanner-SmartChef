<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Getting submitted user data from database
    $con = new mysqli("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
    $username = $con->real_escape_string($_POST['username']);
    $stmt = $con->prepare("SELECT * FROM User WHERE Username = ?");
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_object();

  	// Verify user password and set $_SESSION
  	if ($_POST['password'] == $user->Password) {
      $_SESSION['user_id'] = $user->ID;
      $_SESSION['username'] = $user->Username;
      header("Location: http://www.teamsaauuwwce.web.illinois.edu/landingpage.php");
  	}
    else {
      echo "failed";
    }
}
// $con->close();
//
//
// session_start();
// $_SESSION['message'] = '';
// $mysqli = new mysqli("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
//
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
//
//
// if($_SERVER['REQUEST_METHOD'] == 'POST') {
//   if($_POST['password'] == $_POST['confirm-password']){
//     $email = $mysqli->real_escape_string($_POST['email']);
//     $username = $mysqli->real_escape_string($_POST['username']);
//     $password = $mysqli->real_escape_string($_POST['password']);
//     $sql = "INSERT INTO User (ID, Username, Password, Email) " . " VALUES (NULL, '$username', '$password', '$email')";
//     // printf("Last inserted record has id %d" . mysql_insert_id());
//
//     if(mysqli_query($mysqli, $sql) === true) {
//       echo "Account created successfully!";
//       header("Location: http://www.teamsaauuwwce.web.illinois.edu");
//       exit;
//     }
//     else {
//       echo "Account could not be created";
//       $_SESSION['message'] = "Account was not created:(";
//     }
//   }
//   else {
//     $_SESSION['message'] = "Passwords do not match! Please try again.";
//   }
// }
?>
<html>
<head>
  <title> Login </title>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    .login-page {
      width: 360px;
      padding: 8% 0 0;
      margin: auto;
    }
    .form {
      position: relative;
      z-index: 1;
      background: #FFFFFF;
      max-width: 360px;
      margin: 0 auto 100px;
      padding: 45px;
      text-align: center;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    .form input {
      font-family: "Roboto", sans-serif;
      outline: 0;
      background: #f2f2f2;
      width: 100%;
      border: 0;
      margin: 0 0 15px;
      padding: 15px;
      box-sizing: border-box;
      font-size: 14px;
    }
    .form button {
      font-family: "Roboto", sans-serif;
      text-transform: uppercase;
      outline: 0;
      background: #4CAF50;
      width: 100%;
      border: 0;
      padding: 15px;
      color: #FFFFFF;
      font-size: 14px;
      -webkit-transition: all 0.3 ease;
      transition: all 0.3 ease;
      cursor: pointer;
    }
    .form button:hover,.form button:active,.form button:focus {
      background: #43A047;
    }
    .form .message {
      margin: 15px 0 0;
      color: #b3b3b3;
      font-size: 12px;
    }
    .form .message a {
      color: #4CAF50;
      text-decoration: none;
    }
    .form .register-form {
      display: none;
    }
    .container {
      position: relative;
      z-index: 1;
      max-width: 300px;
      margin: 0 auto;
    }
    .container:before, .container:after {
      content: "";
      display: block;
      clear: both;
    }
    .container .info {
      margin: 50px auto;
      text-align: center;
    }
    .container .info h1 {
      margin: 0 0 15px;
      padding: 0;
      font-size: 36px;
      font-weight: 300;
      color: #1a1a1a;
    }
    .container .info span {
      color: #4d4d4d;
      font-size: 12px;
    }
    .container .info span a {
      color: #000000;
      text-decoration: none;
    }
    .container .info span .fa {
      color: #EF3B3A;
    }
    body {
      background: #76b852; /* fallback for old browsers */
      background: -webkit-linear-gradient(right, #76b852, #8DC26F);
      background: -moz-linear-gradient(right, #76b852, #8DC26F);
      background: -o-linear-gradient(right, #76b852, #8DC26F);
      background: linear-gradient(to left, #76b852, #8DC26F);
      font-family: "Roboto", sans-serif;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }
  </style>
  <script>
    $('.message a').click(function(){
      $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
  </script>
</head>
<body>
  <div class="login-page">
    <div class="form">
      <form class="login-form" action="login.php" method="post" enctype="multipart/form-data">
        <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
        <input type="text" placeholder="username" name="username" required/>
        <input type="password" placeholder="password" name="password" required/>
        <input type="submit" value="Login" class="btn btn-block" />
        <p class="message">Not registered? <a href="makeaccount.php">Create an account</a></p>
      </form>
    </div>
  </div>
</body>
