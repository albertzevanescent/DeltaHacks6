<?php
$name = $_POST("name");
$description = $_POST("description");
$promotion = $_POST("promotions");
$lat = $_POST("lat");
$long = $_POST("long");
$vacancy = $_POST("vacancy");
$sql = "INSERT INTO table_name (column1, column2, column3,...)
VALUES ('name', 'description', 'promotions,'lat','long','vacancy')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close(); 
?>