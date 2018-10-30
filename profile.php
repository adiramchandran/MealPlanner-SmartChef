<!DOCTYPE html>
<!--
++++++++++++++++++++++++++++++++++++++++++++++++++++++
AUTHOR : Vijayan PP
PROJECT :A-MD
VERSION : 1.1
++++++++++++++++++++++++++++++++++++++++++++++++++++++
-->
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
<title></title>
<link rel="stylesheet" href="w3.css">
</head>


<body>
  <form method="post" action="profile.php" id="myForm" name="myForm" >
    <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
    <label for="height">Height:</label>  <input type="text" name="height" /><br />
    <label for="weight">Weight:</label> <input type="text" name="weight"><br />
    <label for="age">Age:</label> <input type="text" name="age"><br />
    <input type="submit" name="submit"/>
  </div>
  </form>
</body>
</html>
