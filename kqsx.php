<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
if(isset($_GET["date"])){
	$date = $_GET["date"];
} else {
	$date = date("d-m-Y");
}
$url = 'http://ketqua.net/xo-so-truyen-thong.php?ngay='.$date;
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  

$response = file_get_contents($url, false, stream_context_create($arrContextOptions));
$first_step = explode( "id=\"result_mb\">" , $response );
if (count($first_step) == 2) {
	$second_step = explode( "<table" , $first_step[1] );
	$three_step = explode( "h2>" , $second_step[1] );
	$find1 = array("Đặc biệt","Giải nhất","Giải nhì","Giải ba","Giải tư","Giải năm","Giải sáu","Giải bảy");
	$replace2 = array("kq","kq","kq","kq","kq","kq","kq","kq");
	$arr_three_step = str_replace($find1,$replace2,$three_step[1]);
	$showVal = explode("kq" , $arr_three_step );
	$ngayfix = explode("ngày",trim(strip_tags($showVal[0])));
	if (count($showVal) >=8) {
		for ($i=0; $i <= 8; $i++) { 
			switch ($i) {
				case 0:
					$ketqua["link"][] = substr(trim($ngayfix[1]), 0, 10);
					break;
				case 1:
				case 2:
					$ketqua["ketqua"][] = trim(strip_tags($showVal[$i]));
					break;
				case 3:
				case 4:
					$str = strip_tags($showVal[$i]);
					$ketqua["ketqua"][] =  substr(chunk_split($str, 5, ' - '), 0, -3);
					break;
				case 5:
				case 6:
					$str = strip_tags($showVal[$i]);
					$ketqua["ketqua"][] =  substr(chunk_split($str, 4, ' - '), 0, -3);
					break;
				case 7:
					$str = strip_tags($showVal[$i]);
					$ketqua["ketqua"][] =  substr(chunk_split($str, 3, ' - '), 0, -3);
				break;
				case 8:
					$str = str_replace("\n","",strip_tags($showVal[$i]));
					$ketqua["ketqua"][] =  substr(chunk_split($str, 2, ' - '), 0, -7);
				break;
			}
		}
		if ($ketqua["link"][0] != $date) {
			$ketqua = array();
			$ketqua["link"][] = "";
			$ketqua["ketqua"][] = false;
		}
	} else {
		$ketqua["link"][] = "";
		$ketqua["ketqua"][] = false;
	}
} else {
	$ketqua["link"][] = "";
	$ketqua["ketqua"][] = false;
}
// $ketqua["link"][] = $date;
// $ketqua["ketqua"][] = "51627";
// $ketqua["ketqua"][] = "81694";
// $ketqua["ketqua"][] = "22406 - 03325";
// $ketqua["ketqua"][] = "97493 - 52600 - 89343 - 83889 - 11197 - 17036";
// $ketqua["ketqua"][] = "4689 - 0288 - 5341 - 9943";
// $ketqua["ketqua"][] = "2417 - 1941 - 3604 - 9925 - 4853 - 8079";
// $ketqua["ketqua"][] = "464 - 043 - 007";
// $ketqua["ketqua"][] = "90 - 92 - 38 - 01";
echo json_encode($ketqua);