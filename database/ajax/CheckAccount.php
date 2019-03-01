<?php
include "../function.php";
if (isset($_POST['taikhoan']))
{
	$database = config_database();
	// Create connection
	$conn = mysqli_connect($database["servername"], $database["username"], $database["password"], $database["dbname"]);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT * FROM `account` WHERE `account_name`='".$_POST['taikhoan']."'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		echo "1";
	} else {
		echo "0";
	}
}
die();