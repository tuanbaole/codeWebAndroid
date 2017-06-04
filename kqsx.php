<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
if(isset($_GET["date"])){
	$day = $_GET["date"];
	$date = date("d-m-Y",strtotime($day));
	$today = date("d-m-Y");
	if ($date == $today) {
		$hours = date("H");  
		$min = date("i");
		if (($hours == 18 && $min > 32) || $hours >= 19 ) {
			// khong co gi xay ra
		} else {
			$date = date('m-d-Y',strtotime($today . "+1 days"));
		}
	}
} else {
	$date = date("d-m-Y");
}
$url = 'https://laythongtin.net/mini-content/traditional-lottery-api.php?type=json&date='.$date;
$content = json_decode(str_replace("bay", "that", file_get_contents($url)));
$kq = array();
$ketqua = array();
if (!empty($content)) {
	foreach ($content as $key => $value) {
		if ($value != "") {
			if (strpos($key, "dac_biet") > -1) {
				$kq["db"] = $value;
			} else if (strpos($key, "nhat") > -1) {
				$kq["nhat"] = $value;
			} else if (strpos($key, "nhi") > -1) {
				if (isset($kq["nhi"])) {
					$kq["nhi"] .= "-" . $value;
				} else {
					$kq["nhi"] = $value;
				}
			}  else if (strpos($key, "ba") > -1) {
				if (isset($kq["ba"])) {
					$kq["ba"] .= "-" . $value;
				} else {
					$kq["ba"] = $value;
				}
			} else if (strpos($key, "tu") > -1) {
				if (isset($kq["tu"])) {
					$kq["tu"] .= "-" . $value;
				} else {
					$kq["tu"] = $value;
				}
			} else if (strpos($key, "nam") > -1) {
				if (isset($kq["nam"])) {
					$kq["nam"] .= "-" . $value;
				} else {
					$kq["nam"] = $value;
				}
			} else if (strpos($key, "sau") > -1) {
				if (isset($kq["sau"])) {
					$kq["sau"] .= "-" . $value;
				} else {
					$kq["sau"] = $value;
				}
			} else if (strpos($key, "that") > -1) {
				if (isset($kq["that"])) {
					$kq["that"] .= "-" . $value;
				} else {
					$kq["that"] = $value;
				}
			}
		}
	}
	if (!isset($kq["db"]) || !isset($kq["nhat"]) || !isset($kq["nhi"]) || !isset($kq["ba"]) || !isset($kq["tu"]) || 
		!isset($kq["nam"]) || !isset($kq["sau"]) || !isset($kq["that"]) ) {
		
	} else {
		$ketqua["ketqua"][] = trim($kq["db"]);
		$ketqua["ketqua"][] = trim($kq["nhat"]);
		$ketqua["ketqua"][] = trim($kq["nhi"]);
		$ketqua["ketqua"][] = trim($kq["ba"]);
		$ketqua["ketqua"][] = trim($kq["tu"]);
		$ketqua["ketqua"][] = trim($kq["nam"]);
		$ketqua["ketqua"][] = trim($kq["sau"]);
		$ketqua["ketqua"][] = trim($kq["that"]);
		$ketqua["link"][] = $date;
	}
}
if(json_encode($ketqua) == "null" || empty($ketqua)) {
	echo "false";
} else {
	echo json_encode($ketqua);
}
