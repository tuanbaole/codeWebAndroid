<?php 
session_start();
include "function.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   	if (isset($_POST["link"]) && isset($_POST["active"])) {
   		$link = $_POST["link"];
    	$active = $_POST["active"];
    	var_dump($link);
    	var_dump($active);
   	}
}