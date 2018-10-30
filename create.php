<?php
$height = $_POST['height']; // gather all the variables
$weight = $_POST['weight'];
$age = $_POST['age'];

//connect
$conn = new mysqli('127.0.0.1', 'teamsaauuwwce_teamsauce', 'Teamsauce', 'teamsaauuwwce_tempdatabase');
    if(mysqli_connect_errno()) {
        exit('Connect failed: '. mysqli_connect_error());

$link = mysqli_connect("127.0.0.1", 'teamsaauuwwce_teamsauce', 'Teamsauce', 'teamsaauuwwce_tempdatabase');
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
if (!conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//generate the query (doesn't add id because id is autoincremented)
$query = "INSERT INTO Users (height, weight, age) VALUES ('".$height."', '".$weight."', '".$age."')";

//insert and close.
$result = mysqli_query($conn, $query);
if($result) {
    echo "Database Updated With: <br />Height: " .$height. " <br />Weight: ".$weight." <br />Age: ".$age."";

mysqli_close($conn);

?>
