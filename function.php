<?php
// function config_database(){
// 	$database["servername"] = "https://auth-db155.hostinger.vn";
// 	$database["username"] = "u728458842_local";
// 	$database["password"] = "Dunghoj@1234";
// 	$database["dbname"] = "u728458842_newdb";
// 	return $database;
// }

function config_database(){
	$database["servername"] = "https://103.28.36.229:2083";
	$database["username"] = "nhlapnzz_root";
	$database["password"] = "";
	$database["dbname"] = "codeweb";
	return $database;
}

function query($sql) {
	$database = config_database();
	// Create connection
	$conn = mysqli_connect($database["servername"], $database["username"], $database["password"], $database["dbname"]);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	if ($conn->query($sql) === TRUE) {
	    $result = true;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	    $result = false;
	}
	$conn->close();
	return $result;
}

function location($link) {
	header('Location: '.$link);
	exit();
}