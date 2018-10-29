<?php
$height = $_POST['height']; // gather all the variables
$weight = $_POST['weight'];
$age = $_POST['age'];

//connect
$conn = new mysqli('localhost', 'teamsaauuwwce_teamsauce', 'Teamsauce', 'teamsaauuwwce_tempdatabase');
    if(mysqli_connect_errno()) {
        exit('Connect failed: '. mysqli_connect_error());
    }
//generate the query (doesn't add id because id is autoincremented)
$query = "INSERT INTO Users (height, weight, age)
VALUES (height, weight, age);";

//insert and close.
mysqli_query($conn, $query);
mysqli_close($conn);
