<?php
include "function.php";
if (isset($_GET["id"])) {
	$res = query("DELETE FROM `users` WHERE `id`=".$_GET["id"]);
}
location("manager.php");