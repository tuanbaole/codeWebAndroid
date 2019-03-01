<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
if(isset($_GET["date"])){
	$date = $_GET["date"];
} else {
	$date = date("d-m-Y");
}
// $myfile = fopen("FileLog.txt", "a+") or die("Unable to open file!");
// $txt = date("d-m-Y H : i : s A")." >>>> ".$_SERVER['REMOTE_ADDR']." : ".$_SERVER['HTTP_USER_AGENT']."\n";
// fwrite($myfile, $txt);
// fclose($myfile);
if ($_SERVER['HTTP_USER_AGENT'] == 'Dalvik/2.1.0 (Linux; U; Android 7.0; SM-J730G Build/NRD90M' || $_SERVER['HTTP_USER_AGENT'] == 'Dalvik/2.1.0 (Linux; U; Android 8.0.0; SM-A605G Build/R16NW)') {
	//echo '{"link":[""],"ketqua":[false]}';
	//die();
}
// echo {"link":["11-04-2018"],"ketqua":["34765","37684","88097 - 71397","90794 - 85500 - 13073 - 55783 - 09241 - 48459","0851 - 9181 - 8483 - 5890","5863 - 1549 - 7222 - 0516 - 5118 - 2325","349 - 546 - 060","31 - 41 - 11 - 90"]};
// die();
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
include "function.php";
$database = config_database();
// Create connection
$conn = mysqli_connect($database["servername"], $database["username"], $database["password"], $database["dbname"]);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM `kqxs` WHERE 1 ORDER BY `id` LIMIT 0,1";
$result = mysqli_query($conn, $sql);
$page = 3;
if (mysqli_num_rows($result) == 1) {
	while($row = mysqli_fetch_assoc($result)) {
		$page = $row['active'];
	}
}
if($page == 1) {
	$filename = 'history/kqxs-'.$date.'.txt';
	if (file_exists($filename)) {
	  	$fh = fopen($filename,'r');
		while ($line = fgets($fh)) {
		  echo($line);
		}
		fclose($fh);
	} else {
		$urlMe = 'http://xoso.me/xsmb-'.$date.'-ket-qua-xo-so-mien-bac-ngay-'.$date.'.html';
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
			$arr_three_step_me_strip = str_replace(array("\n"," "),array('', ""), $arr_three_step_me);
			$showValMe = explode("kq" , $arr_three_step_me_strip);
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
			$kqsxtxt = fopen($filename, "w") or die("Unable to open file!");
			fwrite($kqsxtxt, json_encode($ketqua));
			fclose($kqsxtxt);
		}
		
	}
		
	}
die();
} else if($page == 2) {
	$url = 'https://xosodaiphat.com/xsmb-'.$date.'.html';
	$arrContextOptions=array(
	    "ssl"=>array(
	        "verify_peer"=>false,
	        "verify_peer_name"=>false,
	    ),
	);  

	$response = file_get_contents($url, false, stream_context_create($arrContextOptions));
	$first_step = explode( "class=\"table table-bordered table-striped table-xsmb\">" , $response );
	if (count($first_step) == 2) { 
		$first_step1 = explode( "class=\"line-header\"" , $first_step[1] );
		if (count($first_step1) == 2) {
			$find1 = array("G.ĐB","G.1","G.2","G.3","G.4","G.5","G.6","G.7");
			$replace2 = array("kq","kq","kq","kq","kq","kq","kq","kq");
			$arr_three_step = str_replace($find1,$replace2,$first_step1[0]);
			$arr_three_step = str_replace('\r\n','',$arr_three_step);
			$showVal = explode("kq" , $arr_three_step );
			$ketqua["link"][0] = $date;
			if (count($showVal) >=8) {
				for ($i=0; $i <= 8; $i++) { 
					switch ($i) {
						case 1:
						case 2:
							$ketqua["ketqua"][] = trim(strip_tags($showVal[$i]));
							break;
						case 3:
						case 4:
							$str = trim(strip_tags($showVal[$i]));
							$ketqua["ketqua"][] =  substr(chunk_split(str_replace(" ","",trim(preg_replace('/\s\s+/', ' ', $str))), 5, ' - '),0,-3);
							break;
						case 5:
						case 6:
							$str = trim(strip_tags($showVal[$i]));
							$ketqua["ketqua"][] =  substr(chunk_split(str_replace(" ","",trim(preg_replace('/\s\s+/', ' ', $str))), 4, ' - '),0,-3);
						break;
							break;
						case 7:
							$str = trim(strip_tags($showVal[$i]));
							$ketqua["ketqua"][] =  substr(chunk_split(str_replace(" ","",trim(preg_replace('/\s\s+/', ' ', $str))), 3, ' - '),0,-3);
						break;
						case 8:
							$str = trim(strip_tags($showVal[$i]));
							$ketqua["ketqua"][] =  substr(chunk_split(str_replace(" ","",trim(preg_replace('/\s\s+/', ' ', $str))), 2, ' - '),0,17);
						break;
					}
				} 
				if ($ketqua["link"][0] != $date || strlen($ketqua["ketqua"][0]) != 5) {
					echo '{"link":[""],"ketqua":[false]}';
				} else {
					echo json_encode($ketqua);
				}
			} else {
				echo '{"link":[""],"ketqua":[false]}';
			}
		} else {
			echo '{"link":[""],"ketqua":[false]}';
		}
	} else {
		echo '{"link":[""],"ketqua":[false]}';
	}
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
					$ketqua["ketqua"][] =  substr(chunk_split($str, 2, ' - '), 0, 17);
				break;
			}
		}
		if ($ketqua["link"][0] != $date || strlen($ketqua["ketqua"][0]) != 5) {
			echo '{"link":[""],"ketqua":[false]}';
		} else {
			echo json_encode($ketqua);
		}
	} else {
		echo '{"link":[""],"ketqua":[false]}';
	}
} else {
	echo '{"link":[""],"ketqua":[false]}';
}
die();
}