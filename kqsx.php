<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
if(isset($_GET["date"])){
	$date = $_GET["date"];
} else {
	$date = date("d-m-Y");
}
$myfile = fopen("FileLog.txt", "a+") or die("Unable to open file!");
$txt = date("d-m-Y H : i : s A")." >>>> ".$_SERVER['REMOTE_ADDR']." : ".$_SERVER['HTTP_USER_AGENT']."\n";
fwrite($myfile, $txt);
fclose($myfile);
if ($_SERVER['HTTP_USER_AGENT'] == 'Dalvik/2.1.0 (Linux; U; Android 7.0; SM-J730G Build/NRD90M)') {
	// echo '{"link":[""],"ketqua":[false]}';
	// die();
}
// $ketqua["link"][] = $date;
// $ketqua["ketqua"][] = "69463";
// $ketqua["ketqua"][] = "63885";
// $ketqua["ketqua"][] = "58043 - 68562";
// $ketqua["ketqua"][] = "08290 - 48249 - 90725 - 61815 - 73354 - 79862";
// $ketqua["ketqua"][] = "5708 - 2001 - 7276 - 7111";
// $ketqua["ketqua"][] = "4202 - 5585 - 4054 - 6736 - 7770 - 7922";
// $ketqua["ketqua"][] = "896 - 943 - 594";
// $ketqua["ketqua"][] = "52 - 80 - 48 - 71";
// echo json_encode($ketqua);
// die();
$page = 1;
if($page == 1) {
$urlMe = 'http://xoso.me/kqxs-ket-qua-xo-so-ngay-'.$date.'.html';
$arrContextOptionsMe=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);
$responseMe = file_get_contents($urlMe, false, stream_context_create($arrContextOptionsMe));
$first_step_me = explode( "id=\"load_kq_mb_0\">" , $responseMe );
if (count($first_step_me) == 2) {
	$checkgetkq = "";
	$second_step_me = explode( "</table>" , $first_step_me[1] );
	$findMe1 = array("Đặc biệt","Giải nhất","Giải nhì","Giải ba","Giải tư","Giải năm","Giải sáu","Giải bảy");
	$replaceMe2 = array("kq","kq","kq","kq","kq","kq","kq","kq");
	$arr_three_step_me = str_replace($findMe1,$replaceMe2,trim(strip_tags($second_step_me[0])));
	$showValMe = explode("kq" , $arr_three_step_me);
	$ketqua["link"][] = $date;
	foreach ($showValMe as $keyShowValMe => $str) {
		switch ($keyShowValMe) {
				case 1:
					$checkgetkq = str_replace(" ","",trim(preg_replace('/\s\s+/', ' ', $str)));
					$ketqua["ketqua"][] = str_replace(" ","",trim(preg_replace('/\s\s+/', ' ', $str)));
					break;
				case 2:
					$ketqua["ketqua"][] = str_replace(" ","",trim(preg_replace('/\s\s+/', ' ', $str)));
					break;
				case 3:
					$ketqua["ketqua"][] = substr(chunk_split(preg_replace('/\s\s+/', ' ', trim($str)), 5, ' - '),0,-3);
					break;
				case 4:
					$ketqua["ketqua"][] =  substr(chunk_split(str_replace(" ","",trim(preg_replace('/\s\s+/', ' ', $str))), 5, ' - '),0,-3);
					break;
				case 5:
					$ketqua["ketqua"][] =  substr(chunk_split(str_replace(" ","",trim(preg_replace('/\s\s+/', ' ', $str))), 4, ' - '),0,-3);
					break;
				case 6:
					$ketqua["ketqua"][] =  substr(chunk_split(str_replace(" ","",trim(preg_replace('/\s\s+/', ' ', $str))), 4, ' - '),0,-3);
					break;
				case 7:
					$ketqua["ketqua"][] =  substr(chunk_split(str_replace(" ","",trim(preg_replace('/\s\s+/', ' ', $str))), 3, ' - '),0,-3);
				break;
				case 8:
					//$checkgetkq = substr(chunk_split(str_replace(" ","",trim(preg_replace('/\s\s+/', ' ', $str))), 2, ' - '),0,-3);
					$ketqua["ketqua"][] =  substr(chunk_split(str_replace(" ","",trim(preg_replace('/\s\s+/', ' ', $str))), 2, ' - '),0,-3);
				break;
			}
	}
	if ($checkgetkq == "") {
		echo '{"link":[""],"ketqua":[false]}';
	} else {
		echo json_encode($ketqua);
	}
	
}
die();
} else {
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
echo json_encode($ketqua);
die();
}