<?php
include "function.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	echo "<pre>";
	var_dump($_POST);
	echo "</pre>";
	if ( isset($_POST["password"]) && isset($_POST["confirmPassword"]) &&
	 isset($_POST["email"]) && isset($_POST["taikhoan"]) ) {
		if ($_POST["password"] === $_POST["confirmPassword"]) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
    		$today = date("Y-m-d h:i:s");
			$query = "INSERT INTO 
				`account`(`account_name`, `password`, `email`, `group_id`, `created`, `modified`) 
				VALUES ('".$_POST["taikhoan"]."','".$_POST["password"]."',
					'".$_POST["email"]."','1','".$today."','".$today."')";
    		$res = query($query);
    		location("addAccount.php?thongbao=success");
		} else {
			location("addAccount.php?thongbao=nopass");
		}
	}
}
// location("addAccount.php");