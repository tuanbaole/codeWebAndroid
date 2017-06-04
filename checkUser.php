<?php
// Start the session
session_start();
include "function.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   	if (isset($_POST["username"]) && isset($_POST["pass"]) ) {
   		if ($_POST["username"] == "admin" && $_POST["pass"] == "admin" ) {
   			$_SESSION["username"]  = $_POST["username"];
    		$_SESSION["pass"] = $_POST["pass"];
   		}
   	}
}
location("index.php");