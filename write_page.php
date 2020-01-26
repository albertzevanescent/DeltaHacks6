<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stores";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$description = $_POST["description"];
$promotion = $_POST["promotions"];
$lat = $_POST["lat"];
$long = $_POST["long"];
$vacancy = $_POST["vacancy"];
$sql = "INSERT INTO stores (Name, Description, Promotions, LatLoc, LongLoc, Vacancy)
VALUES ('$name', '$description', '$promotion','$lat','$long','$vacancy')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close(); 
?>