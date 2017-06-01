<?php

function config_database(){
	$database["servername"] = "mysql.hostinger.vn";
	$database["username"] = "u728458842_root";
	$database["password"] = "dunghoj123";
	$database["dbname"] = "u728458842_prod";
	return $database;
}

function insert($sql) {
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