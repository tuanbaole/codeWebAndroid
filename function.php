<?php

function config_database(){
	$database["servername"] = "localhost";
	$database["username"] = "root";
	$database["password"] = "";
	$database["dbname"] = "androids";
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