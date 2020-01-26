<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stores";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$myEmail = $_POST["uname"];
$myPass = $_POST["pass"];
echo $myEmail;
echo $myPass;
$query = "SELECT * FROM stores Where email = '$myEmail' and email2 = '$myPass'";
$result = array();
$Users = array();
$response = array();
//Prepare the query
if($stmt = $conn->prepare($query)){
        $stmt=$conn->query($query);
        $stmt->fetch_assoc();
        if ($stmt->num_rows > 0) {
        //Fetch 1 row at a time					
        while($row = $stmt->fetch_assoc()){
            //Populate the movie array
            $Users["Name"] = $row["Name"];
            $Users["Lat"] = $row["LatLoc"];
            $Users["Long"] = $row["LongLoc"];
            $result[]=$Users;
        }		
        $stmt->close();
	    $response["success"] = 1;
        $response["data"] = $result;
        header("Location: dashboard.html");
        exit();
        } else {
            echo "Incorret Username and Password";
        }
}else{
	//Some error while fetching data
	$response["success"] = 0;
	$response["message"] = mysqli_error($conn);	
}
//Display JSON response
echo json_encode($response);
?>