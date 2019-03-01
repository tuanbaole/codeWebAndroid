<?php 
include "function.php";
$noti =  "đã xảy ra lỗi";
if(isset($_GET['active']) && isset($_GET['id']) ) {
	$id = $_GET['id'];
    $active = $_GET['active'];
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $today = date("Y-m-d");
    $query = "UPDATE `users` SET `active`=".$active.",`ngaydangki`='".$today."' WHERE `id`=".$id;
    $res = query($query);
    if ($res) {
    	if ($active == 1) {
    		$noti =  "mở khóa ứng dụng thành công";
    	} else {
    		$noti =  "khóa ứng dụng thành công";
    	}
    } else {
    	$noti =  "đã xảy ra lỗi";
    }
}
echo $noti;