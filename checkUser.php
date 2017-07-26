<?php
// Start the session
session_start();
include "function.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   	if (isset($_POST["username"]) && isset($_POST["pass"]) ) {
		$database = config_database();
		// Create connection
		$conn = mysqli_connect($database["servername"], $database["username"], $database["password"], $database["dbname"]);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
        $sql = "SELECT * FROM account WHERE account_name='".$_POST["username"]."' AND password='".$_POST["pass"]."'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$_SESSION["username"]  = $_POST["username"];
				$_SESSION["pass"] = $_POST["pass"];
			}
		} else {
			location("index.php?thongbao=login");
		}
   	}
}
location("index.php");