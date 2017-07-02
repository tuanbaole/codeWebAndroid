<?php 
include 'function.php'; 
if (isset($_GET["imei"])) {
	$imei = $_GET["imei"];
	// Create connection
	$database = config_database();
	$conn = mysqli_connect($database["servername"], $database["username"], $database["password"], $database["dbname"]);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "SELECT * FROM `users` WHERE `iccid`=".$imei." LIMIT 0,1";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo $row["ngaydangki"];
	    }
	}
	$conn->close();
}
