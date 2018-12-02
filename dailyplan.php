<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Daily Plan</title>

</head>

<body>
<?php
$mysqli = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
if ($mysqli) {
  echo "Connection established! <br>";
}
else {
  echo "Connection failed!";
}

$sql = "SELECT title, url, calories, fat, protein, carbs, sodium, sugar from RecipeList";
$results = mysqli_query($mysqli, $sql);
while ($row = mysqli_fetch_array($results)) {
  echo $row[1]." ".$row[2]." ".$row[3]." ".$row[4]." ".$row[5]." ".$row[6]." ".$row[7]." ".$row[8];
  echo "<br>";
}


 ?>
