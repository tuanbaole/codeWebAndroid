<?php
session_start();
include "function.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   	if (isset($_POST["id"]) && isset($_POST["sdt"]) && isset($_POST["ten"]) 
   		&& isset($_POST["diachi"]) && isset($_POST["giatien"])  && $_POST["hsd"] ) {
   		$id = $_POST["id"];
    	$sdt = $_POST["sdt"];
    	$ten = $_POST["ten"];
    	$diachi = $_POST["diachi"];
    	$giatien = $_POST["giatien"];
        $dangki = str_replace("/", "-", $_POST["hsd"]);
    	if (isset($_POST["vip"])) {
    		$vip = 1;
    	} else {
    		$vip = 0;
    	}
    	date_default_timezone_set("Asia/Ho_Chi_Minh");
        $nguoigioithieu = "admin";
    	if (isset($_SESSION["username"])) {
            $nguoigioithieu = $_SESSION["username"];
        }
    	$sql = "UPDATE `users` SET `sdt`='".$sdt."',`ten`='".$ten."',`diachi`='".$diachi."',`vip`='".$vip."',
    	`gia`='".$giatien."', `ngaydangki`='".$dangki."' , `nguoigioithieu`='".$nguoigioithieu."' WHERE id=".$id;
    	$res = query($sql);
    }
}
location("index.php");