<?php
include "function.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   	if (isset($_POST["iccid"]) && isset($_POST["sdt"]) && isset($_POST["ten"]) 
   		&& isset($_POST["diachi"]) && isset($_POST["giatien"]) ) {
   		$iccid = $_POST["iccid"];
    	$sdt = $_POST["sdt"];
    	$ten = $_POST["ten"];
    	$diachi = $_POST["diachi"];
    	$giatien = $_POST["giatien"];
    	if (isset($_POST["vip"])) {
    		$vip = 1;
    	} else {
    		$vip = 0;
    	}
    	date_default_timezone_set("Asia/Ho_Chi_Minh");
    	$today = date("Y-m-d");
    	$time = date("Y-m-d h:i:s");
    	$sql = "INSERT INTO `users`(`iccid`,`sdt`,`ten`,`diachi`,`gia`,`created`, `modified`) 
    	VALUES ('".$iccid."','".$sdt."','".$ten."','".$diachi."','".$giatien."','".$time."','".$time."');";
    	$res = query($sql);
   }
}
location("index.php");