<?php
include("function.php");
if(isset($_GET["iccid"])){
	$iccid = $_GET["iccid"];
} else {
	$iccid = "000-000-000";
}
$database = config_database();
// Create connection
$conn = mysqli_connect($database["servername"], $database["username"], $database["password"], $database["dbname"]);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT users.id,users.active FROM users WHERE users.iccid='".$iccid."' LIMIT 0,1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["active"];
    }
} else {
	date_default_timezone_set("Asia/Ho_Chi_Minh");
    $time = date("Y-m-d h:i:s");
	$query_insert = "INSERT INTO `users`(`iccid`,`active`,`created`, `modified`) VALUES ('".$iccid."',1,'".$time."','".$time."');";
	$res = query($query_insert);
    if ($res) {
		$result2 = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result2) > 0) {
	    	// output data of each row
		    while($row2 = mysqli_fetch_assoc($result2)) {
			    echo $row2["active"];
			}
		} else {
			echo "0";
		}
	} else {
		echo "0";
	}
}
mysqli_close($conn);
?>