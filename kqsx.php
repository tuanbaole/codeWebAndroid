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
	if (count($showVal) >=8) {
		for ($i=0; $i <= 8; $i++) { 
			switch ($i) {
				case 0:
					$stringDay = explode(" ",trim(strip_tags($showVal[$i])));
					$ketqua["link"][] = end($stringDay);
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
 
// $data = file_get_contents('http://www.xskt.com.vn/rss-feed/mien-bac-xsmb.rss');
// $xml_source = str_replace(array("&amp;", "&"), array("&", "&amp;"), $data);
// $xml = simplexml_load_string($xml_source);
// $find = array("ĐB:","1:","2:","3:","4:","5:","6:","7:");
// $replace = array("kq","kq","kq","kq","kq","kq","kq","kq");
// foreach($xml->channel->item as $child)
// {
// 	$title = $child->title;
// 	$link = pathinfo($child->link,PATHINFO_FILENAME );
// 	$description = explode("kq",str_replace($find,$replace,$child->description));
// 	break;
// }
// unset($description[0]);
// foreach ($description as $keyGiai => $valueGiai) {
// 	$ketqua["ketqua"][] = trim($valueGiai);
// }
// $ketqua["link"] = $date;
echo json_encode($ketqua);
// $url = 'https://laythongtin.net/mini-content/traditional-lottery-api.php?type=json&date='.$date;
// $content = json_decode(str_replace("bay", "that", file_get_contents($url)));
// $kq = array();
// $ketqua = array();
// if (!empty($content)) {
// 	foreach ($content as $key => $value) {
// 		if ($value != "") {
// 			if (strpos($key, "dac_biet") > -1) {
// 				$kq["db"] = $value;
// 			} else if (strpos($key, "nhat") > -1) {
// 				$kq["nhat"] = $value;
// 			} else if (strpos($key, "nhi") > -1) {
// 				if (isset($kq["nhi"])) {
// 					$kq["nhi"] .= "-" . $value;
// 				} else {
// 					$kq["nhi"] = $value;
// 				}
// 			}  else if (strpos($key, "ba") > -1) {
// 				if (isset($kq["ba"])) {
// 					$kq["ba"] .= "-" . $value;
// 				} else {
// 					$kq["ba"] = $value;
// 				}
// 			} else if (strpos($key, "tu") > -1) {
// 				if (isset($kq["tu"])) {
// 					$kq["tu"] .= "-" . $value;
// 				} else {
// 					$kq["tu"] = $value;
// 				}
// 			} else if (strpos($key, "nam") > -1) {
// 				if (isset($kq["nam"])) {
// 					$kq["nam"] .= "-" . $value;
// 				} else {
// 					$kq["nam"] = $value;
// 				}
// 			} else if (strpos($key, "sau") > -1) {
// 				if (isset($kq["sau"])) {
// 					$kq["sau"] .= "-" . $value;
// 				} else {
// 					$kq["sau"] = $value;
// 				}
// 			} else if (strpos($key, "that") > -1) {
// 				if (isset($kq["that"])) {
// 					$kq["that"] .= "-" . $value;
// 				} else {
// 					$kq["that"] = $value;
// 				}
// 			}
// 		}
// 	}
// 	if (!isset($kq["db"]) || !isset($kq["nhat"]) || !isset($kq["nhi"]) || !isset($kq["ba"]) || !isset($kq["tu"]) || 
// 		!isset($kq["nam"]) || !isset($kq["sau"]) || !isset($kq["that"]) ) {
		
// 	} else {
// 		$ketqua["ketqua"][] = trim($kq["db"]);
// 		$ketqua["ketqua"][] = trim($kq["nhat"]);
// 		$ketqua["ketqua"][] = trim($kq["nhi"]);
// 		$ketqua["ketqua"][] = trim($kq["ba"]);
// 		$ketqua["ketqua"][] = trim($kq["tu"]);
// 		$ketqua["ketqua"][] = trim($kq["nam"]);
// 		$ketqua["ketqua"][] = trim($kq["sau"]);
// 		$ketqua["ketqua"][] = trim($kq["that"]);
// 		$ketqua["link"][] = $date;
// 	}
// }
// if(json_encode($ketqua) == "null" || empty($ketqua)) {
// 	echo "false";
// } else {
// 	echo json_encode($ketqua);
// }
