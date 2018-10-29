<?php
$height = $_POST['height']; // gather all the variables
$weight = $_POST['weight'];
$age = $_POST['age'];

//connect
$conn = new mysqli('127.0.0.1', 'teamsaauuwwce_teamsauce', 'Teamsauce', 'teamsaauuwwce_tempdatabase');
    if(mysqli_connect_errno()) {
        exit('Connect failed: '. mysqli_connect_error());

//generate the query (doesn't add id because id is autoincremented)
$query = "insert into Users (" + id + ", " + height + ", " + weight + ", " + age + ");";
//insert and close.
mysqli_query($conn, $query);
mysqli_close($conn);
