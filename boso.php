<?php
$kihieu["tong0"][] = "19,91,28,82,37,73,46,64,55,00";
$kihieu["tong1"][] = "01,10,29,92,38,83,47,74,56,65";
$kihieu["tong2"][] = "02,20,39,93,48,84,57,75,11,66";
$kihieu["tong3"][] = "03,30,12,21,49,94,58,85,67,76";
$kihieu["tong4"][] = "04,40,13,31,59,95,68,86,22,77";
$kihieu["tong5"][] = "05,50,14,41,23,32,69,96,78,87";
$kihieu["tong6"][] = "06,60,15,51,24,42,79,97,33,88";
$kihieu["tong7"][] = "07,70,16,61,25,52,34,43,89,98";
$kihieu["tong8"][] = "08,80,17,71,26,62,35,53,44,99";
$kihieu["tong9"][] = "09,90,18,81,27,72,36,63,45,54";

$kihieu["dau0"][] = "00,01,02,03,04,05,06,07,08,09";
$kihieu["dau1"][] = "10,11,12,13,14,15,16,17,18,19";
$kihieu["dau2"][] = "20,21,22,23,24,25,26,27,28,29";
$kihieu["dau3"][] = "30,31,32,33,34,35,36,37,38,39";
$kihieu["dau4"][] = "40,41,42,43,44,45,46,47,48,49";
$kihieu["dau5"][] = "50,51,52,53,54,55,56,57,58,59";
$kihieu["dau6"][] = "60,61,62,63,64,65,66,67,68,69";
$kihieu["dau7"][] = "70,71,72,73,74,75,76,77,78,79";
$kihieu["dau8"][] = "80,81,82,83,84,85,86,87,88,89";
$kihieu["dau9"][] = "90,91,92,93,94,95,96,97,98,99";

$kihieu["dit0"][] = "00,10,20,30,40,50,60,70,80,90";
$kihieu["dit1"][] = "01,11,21,31,41,51,61,71,81,91";
$kihieu["dit2"][] = "02,12,22,32,42,52,62,72,82,92";
$kihieu["dit3"][] = "03,13,23,33,43,53,63,73,83,93";
$kihieu["dit4"][] = "04,14,24,34,44,54,64,74,84,94";
$kihieu["dit5"][] = "05,15,25,35,45,55,65,75,85,95";
$kihieu["dit6"][] = "06,16,26,36,46,56,66,76,86,96";
$kihieu["dit7"][] = "07,17,27,37,47,57,67,77,87,97";
$kihieu["dit8"][] = "08,18,28,38,48,58,68,78,88,98";
$kihieu["dit9"][] = "09,19,29,39,49,59,69,79,89,99";

function getBo($string)
{
	foreach (explode(',', $string) as $key => $value) {
		$bo["bo".$value][] = $string;
	}
	return $bo;
}

$bo = getBo("00,55,05,50");
$bo += getBo("11,66,16,61");
$bo += getBo("22,77,27,72");
$bo += getBo("33,88,38,83");
$bo += getBo("44,99,49,94");
$bo += getBo("01,10,06,60,51,15,56,65");
$bo += getBo("02,20,07,70,25,52,57,75");
$bo += getBo("03,30,08,80,35,53,58,85");
$bo += getBo("04,40,09,90,45,54,59,95");
$bo += getBo("12,21,17,71,26,62,67,76");
$bo += getBo("13,31,18,81,36,63,68,86");
$bo += getBo("14,41,19,91,46,64,69,96");
$bo += getBo("23,32,28,82,73,37,78,87");
$bo += getBo("24,42,29,92,74,47,79,97");
$bo += getBo("34,43,39,93,84,48,89,98");
$kihieu += $bo;

function getHe($string)
{
	foreach (explode(',', $string) as $key => $value) {
		$he["he".$value][] = $string;
	}
	return $he;
}

$he = getHe("00,55,05,50");
$he += getHe("11,66,16,61");
$he += getHe("22,77,27,72");
$he += getHe("33,88,38,83");
$he += getHe("44,99,49,94");
$he += getHe("01,10,06,60,51,15,56,65");
$he += getHe("02,20,07,70,25,52,57,75");
$he += getHe("03,30,08,80,35,53,58,85");
$he += getHe("04,40,09,90,45,54,59,95");
$he += getHe("12,21,17,71,26,62,67,76");
$he += getHe("13,31,18,81,36,63,68,86");
$he += getHe("14,41,19,91,46,64,69,96");
$he += getHe("23,32,28,82,73,37,78,87");
$he += getHe("24,42,29,92,74,47,79,97");
$he += getHe("34,43,39,93,84,48,89,98");
$kihieu += $he;

$kihieu["cham0"][] = "01,10,02,20,03,30,04,40,05,50,06,60,07,70,08,80,09,90,00";
$kihieu["cham1"][] = "01,10,12,21,13,31,14,41,15,51,16,61,17,71,18,81,19,91,11";
$kihieu["cham2"][] = "02,20,12,21,23,32,24,42,25,52,26,62,27,72,28,82,29,92,22";

$kihieu["chanchan"][] = "00,22,44,66,88,02,20,04,40,06,60,08,80,24,42,26,62 ,28,82,46,64,48,84,68,86";

$kihieu["chanle"][] = "01,03,05,07,09,21,23,25,27,29,41,43,45,47,49,61,63 ,65,67,69,81,83,85,87,89";

$kihieu["lechan"][] = "10,12,14,16,18,30,32,34,36,38,50,52,54,56,58,70,72 ,74,76,78,90,92,94,96,98";

$kihieu["lele"][] = "11,33,55,77,99,13,31,15,51,17,71,19,91,35,53,37,73 ,39,93,57,75,59,95,79,97";

$kihieu["nhonho"][] = "00,11,22,33,44,01,10,02,20,03,30,04,40,12,21,13,31 ,14,41,23,32,24,42,34,43";

$kihieu["toto"][] = "55,66,77,88,99,56,65,57,75,58,85,59,95,67,76,68,86 ,69,96,78,87,79,97,89,98";

$kihieu["nhoto"][] = "05,06,07,08,09,15,16,17,18,19,25,26,27,28,29,35,36 ,37,38,39,45,46,47,48,49";

$kihieu["tonho"][] = "90,91,92,93,94,80,81,82,83,84,70,71,72,73,74,60,61 ,62,63,64,50,51,52,53,54";

echo json_encode($kihieu);