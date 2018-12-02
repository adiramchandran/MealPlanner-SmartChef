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

$sql = "SELECT * FROM RecipeList";
$results = mysqli_query($mysqli, $sql);
while ($row = mysqli_fetch_assoc($results)) {
  echo $row["title"]." ".$row["url"]." ".$row["calories"]." ".$row["fat"]." ".$row["protein"]." ".$row["carbs"]." ".$row["Breakfast"];
  echo "<br>";
}


 ?>
