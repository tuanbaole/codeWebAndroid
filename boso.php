<?php

$kihieu["tong0"][] = trim("19,91,28,82,37,73,46,64,55,00");
$kihieu["tong1"][] = trim("01,10,29,92,38,83,47,74,56,65");
$kihieu["tong2"][] = trim("02,20,39,93,48,84,57,75,11,66");
$kihieu["tong3"][] = trim("03,30,12,21,49,94,58,85,67,76");
$kihieu["tong4"][] = trim("04,40,13,31,59,95,68,86,22,77");
$kihieu["tong5"][] = trim("05,50,14,41,23,32,69,96,78,87");
$kihieu["tong6"][] = trim("06,60,15,51,24,42,79,97,33,88");
$kihieu["tong7"][] = trim("07,70,16,61,25,52,34,43,89,98");
$kihieu["tong8"][] = trim("08,80,17,71,26,62,35,53,44,99");
$kihieu["tong9"][] = trim("09,90,18,81,27,72,36,63,45,54");

$kihieu["dau0"][] = trim("00,01,02,03,04,05,06,07,08,09");
$kihieu["dau1"][] = trim("10,11,12,13,14,15,16,17,18,19");
$kihieu["dau2"][] = trim("20,21,22,23,24,25,26,27,28,29");
$kihieu["dau3"][] = trim("30,31,32,33,34,35,36,37,38,39");
$kihieu["dau4"][] = trim("40,41,42,43,44,45,46,47,48,49");
$kihieu["dau5"][] = trim("50,51,52,53,54,55,56,57,58,59");
$kihieu["dau6"][] = trim("60,61,62,63,64,65,66,67,68,69");
$kihieu["dau7"][] = trim("70,71,72,73,74,75,76,77,78,79");
$kihieu["dau8"][] = trim("80,81,82,83,84,85,86,87,88,89");
$kihieu["dau9"][] = trim("90,91,92,93,94,95,96,97,98,99");


$kihieu["dit0"][] = trim("00,10,20,30,40,50,60,70,80,90");
$kihieu["dit1"][] = trim("01,11,21,31,41,51,61,71,81,91");
$kihieu["dit2"][] = trim("02,12,22,32,42,52,62,72,82,92");
$kihieu["dit3"][] = trim("03,13,23,33,43,53,63,73,83,93");
$kihieu["dit4"][] = trim("04,14,24,34,44,54,64,74,84,94");
$kihieu["dit5"][] = trim("05,15,25,35,45,55,65,75,85,95");
$kihieu["dit6"][] = trim("06,16,26,36,46,56,66,76,86,96");
$kihieu["dit7"][] = trim("07,17,27,37,47,57,67,77,87,97");
$kihieu["dit8"][] = trim("08,18,28,38,48,58,68,78,88,98");
$kihieu["dit9"][] = trim("09,19,29,39,49,59,69,79,89,99");

$kihieu["tongbe"][] = trim($kihieu["tong0"][0].",".$kihieu["tong1"][0].",".$kihieu["tong2"][0].",".$kihieu["tong3"][0].",".$kihieu["tong4"][0]);
$kihieu["tongto"][] = trim($kihieu["tong5"][0].",".$kihieu["tong6"][0].",".$kihieu["tong7"][0].",".$kihieu["tong8"][0].",".$kihieu["tong9"][0]);
$kihieu["tongle"][] = trim($kihieu["tong1"][0].",".$kihieu["tong3"][0].",".$kihieu["tong5"][0].",".$kihieu["tong7"][0].",".$kihieu["tong9"][0]);
$kihieu["tongchal"][] = trim($kihieu["tong0"][0].",".$kihieu["tong2"][0].",".$kihieu["tong4"][0].",".$kihieu["tong6"][0].",".$kihieu["tong8"][0]);

$kihieu["daube"][] = trim($kihieu["dau0"][0].",".$kihieu["dau1"][0].",".$kihieu["dau2"][0].",".$kihieu["dau3"][0].",".$kihieu["dau4"][0]);
$kihieu["dauto"][] = trim($kihieu["dau5"][0].",".$kihieu["dau6"][0].",".$kihieu["dau7"][0].",".$kihieu["dau8"][0].",".$kihieu["dau9"][0]);
$kihieu["daule"][] = trim($kihieu["dau1"][0].",".$kihieu["dau3"][0].",".$kihieu["dau5"][0].",".$kihieu["dau7"][0].",".$kihieu["dau9"][0]);
$kihieu["dauchal"][] = trim($kihieu["dau0"][0].",".$kihieu["dau2"][0].",".$kihieu["dau4"][0].",".$kihieu["dau6"][0].",".$kihieu["dau8"][0]);

$kihieu["ditbe"][] = trim($kihieu["dit0"][0].",".$kihieu["dit1"][0].",".$kihieu["dit2"][0].",".$kihieu["dit3"][0].",".$kihieu["dit4"][0]);
$kihieu["ditto"][] = trim($kihieu["dit5"][0].",".$kihieu["dit6"][0].",".$kihieu["dit7"][0].",".$kihieu["dit8"][0].",".$kihieu["dit9"][0]);
$kihieu["ditle"][] = trim($kihieu["dit1"][0].",".$kihieu["dit3"][0].",".$kihieu["dit5"][0].",".$kihieu["dit7"][0].",".$kihieu["dit9"][0]);
$kihieu["ditchal"][] = trim($kihieu["dit0"][0].",".$kihieu["dit2"][0].",".$kihieu["dit4"][0].",".$kihieu["dit6"][0].",".$kihieu["dit8"][0]);

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

function getDay($string)
{
	foreach (explode(',', $string) as $key => $value) {
		$day["day".$value][] = $string;
	}
	return $day;
}

$day = getDay("00,55,05,50");
$day += getDay("11,66,16,61");
$day += getDay("22,77,27,72");
$day += getDay("33,88,38,83");
$day += getDay("44,99,49,94");
$day += getDay("01,10,06,60,51,15,56,65");
$day += getDay("02,20,07,70,25,52,57,75");
$day += getDay("03,30,08,80,35,53,58,85");
$day += getDay("04,40,09,90,45,54,59,95");
$day += getDay("12,21,17,71,26,62,67,76");
$day += getDay("13,31,18,81,36,63,68,86");
$day += getDay("14,41,19,91,46,64,69,96");
$day += getDay("23,32,28,82,73,37,78,87");
$day += getDay("24,42,29,92,74,47,79,97");
$day += getDay("34,43,39,93,84,48,89,98");
$kihieu += $day;

$kihieu["cham0"][] = $kihieu["co0"][] = $kihieu["dilh0"][] = trim("01,10,02,20,03,30,04,40,05,50,06,60,07,70,08,80,09,90,00");
$kihieu["cham1"][] = $kihieu["co1"][] = $kihieu["dilh1"][] = trim("01,10,12,21,13,31,14,41,15,51,16,61,17,71,18,81,19,91,11");
$kihieu["cham2"][] = $kihieu["co2"][] = $kihieu["dilh2"][] = trim("02,20,12,21,23,32,24,42,25,52,26,62,27,72,28,82,29,92,22");
$kihieu["cham3"][] = $kihieu["co3"][] = $kihieu["dilh3"][] = trim("30,31,32,33,34,35,36,37,38,39,03,13,23,43,53,63,73,83,93");
$kihieu["cham4"][] = $kihieu["co4"][] = $kihieu["dilh4"][] = trim("40,41,42,43,44,45,46,47,48,49,04,14,24,34,54,64,74,84,94");
$kihieu["cham5"][] = $kihieu["co5"][] = $kihieu["dilh5"][] = trim("50,51,52,53,54,55,56,57,58,59,05,15,25,35,45,65,75,85,95");
$kihieu["cham6"][] = $kihieu["co6"][] = $kihieu["dilh6"][] = trim("60,61,62,63,64,65,66,67,68,69,06,16,26,36,46,56,76,86,96");
$kihieu["cham7"][] = $kihieu["co7"][] = $kihieu["dilh7"][] = trim("70,71,72,73,74,75,76,77,78,79,07,17,27,37,47,57,67,87,97");
$kihieu["cham8"][] = $kihieu["co8"][] = $kihieu["dilh8"][] = trim("80,81,82,83,84,85,86,87,88,89,08,18,28,38,48,58,68,78,98");
$kihieu["cham9"][] = $kihieu["co9"][] = $kihieu["dilh9"][] = trim("90,91,92,93,94,95,96,97,98,99,09,19,29,39,49,59,69,79,89");

$kihieu["vtff0"][] = trim("01,10,02,20,03,30,04,40,05,50,06,60,07,70,08,80,09,90,00,00");
$kihieu["vtff1"][] = trim("01,10,12,21,13,31,14,41,15,51,16,61,17,71,18,81,19,91,11,11");
$kihieu["vtff2"][] = trim("02,20,12,21,23,32,24,42,25,52,26,62,27,72,28,82,29,92,22,22");
$kihieu["vtff3"][] = trim("30,31,32,33,34,35,36,37,38,39,03,13,23,43,53,63,73,83,93,33");
$kihieu["vtff4"][] = trim("40,41,42,43,44,45,46,47,48,49,04,14,24,34,54,64,74,84,94,44");
$kihieu["vtff5"][] = trim("50,51,52,53,54,55,56,57,58,59,05,15,25,35,45,65,75,85,95,55");
$kihieu["vtff6"][] = trim("60,61,62,63,64,65,66,67,68,69,06,16,26,36,46,56,76,86,96,66");
$kihieu["vtff7"][] = trim("70,71,72,73,74,75,76,77,78,79,07,17,27,37,47,57,67,87,97,77");
$kihieu["vtff8"][] = trim("80,81,82,83,84,85,86,87,88,89,08,18,28,38,48,58,68,78,98,88");
$kihieu["vtff9"][] = trim("99,90,91,92,93,94,95,96,97,98,99,09,19,29,39,49,59,69,79,89");

$kihieu["chalchal"][] = trim("00,22,44,66,88,02,20,04,40,06,60,08,80,24,42,26,62,28,82,46,64,48,84,68,86");

$kihieu["challe"][] = trim("01,03,05,07,09,21,23,25,27,29,41,43,45,47,49,61,63,65,67,69,81,83,85,87,89");

$kihieu["lechal"][] = trim("10,12,14,16,18,30,32,34,36,38,50,52,54,56,58,70,72,74,76,78,90,92,94,96,98");

$kihieu["lele"][] = trim("11,33,55,77,99,13,31,15,51,17,71,19,91,35,53,37,73,39,93,57,75,59,95,79,97");

$kihieu["lholho"][] = trim("00,11,22,33,44,01,10,02,20,03,30,04,40,12,21,13,31,14,41,23,32,24,42,34,43");

$kihieu["toto"][] = trim("55,66,77,88,99,56,65,57,75,58,85,59,95,67,76,68,86,69,96,78,87,79,97,89,98");

$kihieu["lhoto"][] = trim("05,06,07,08,09,15,16,17,18,19,25,26,27,28,29,35,36,37,38,39,45,46,47,48,49");

$kihieu["tolho"][] = trim("90,91,92,93,94,80,81,82,83,84,70,71,72,73,74,60,61,62,63,64,50,51,52,53,54");

$kihieu["kepbalg"][] =  $kihieu["cepbalg"][] = $kihieu["cepb"][] = trim("00,11,22,33,44,55,66,77,88,99");

$kihieu["keplech"][] = $kihieu["ceplech"][] = $kihieu["cepl"][] = trim("05,50,16,61,27,72,38,83,49,94");

$kihieu["satkep"][] = $kihieu["satcep"][] = trim("12,21,23,32,34,43,45,54,56,65,67,76,78,87,89,98,01,10");

for ($i=0; $i < 100; $i++) { 
	if (!in_array($i, array('0','11','22','33','44','55','66','77','88','99'))) {
		if ($i < 10) $i = '0'.$i;
		$danValue = 'dal'.$i;
		$importValueDan = '';
		if ((int)(substr($i,1,2)) > (int)(substr($i,0,1))) { //a > b ta co
			$hieuso = (substr($i,1,2)) - (int)(substr($i,0,1));
			$valueUp = substr($i,0,1);
			for ($xoayhieuso=0; $xoayhieuso < $hieuso + 1; $xoayhieuso++) { 
				for ($danboso=(int)(substr($i,0,1)); $danboso < (int)(substr($i,1,2)) + 1; $danboso++) { 
					if ($importValueDan != '' ) {
						$importValueDan .= ','.$valueUp.$danboso;
					} else {
						$importValueDan .= $valueUp.$danboso;
					}
					
				}
				$valueUp = (int)(substr($i,0,1)) + 	$xoayhieuso + 1;
			}
		} else { // b >= a
			$hieuso = (substr($i,0,1)) - (int)(substr($i,1,2));
			$valueUp = substr($i,1,2);
			for ($xoayhieuso=0; $xoayhieuso < $hieuso + 1; $xoayhieuso++) { 
				for ($danboso=(int)(substr($i,1,2)); $danboso < (int)(substr($i,0,1)) + 1; $danboso++) { 
					if ($importValueDan != '' ) {
						$importValueDan .= ','.$valueUp.$danboso;
					} else {
						$importValueDan .= $valueUp.$danboso;
					}
					
				}
				$valueUp = (int)(substr($i,1,2)) + 	$xoayhieuso + 1;
			}
		}
		
		$kihieu[$danValue][] = $importValueDan;	
	}
}
$kihieu["tongtrel10"][]
= trim("29,38,39,47,48,49,56,57,58,59,65,66,67,68,69,74,75,76,77,78,79,83,84,85,86,87,88,89,92,93,94,95,96,97,98,99");

$kihieu["tongduoi10"][]
= trim("01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,20,21,22,23,24,25,26,27,30,31,32,33,34,35,36,40,41,42,43,44,45,50,51,52,53,54,60,61,62,63,70,71,72,80,81,90");

$kihieu["chia3du0"][] = trim("03,06,09,12,15,18,21,24,27,30,33,36,39,42,45,48,51,54,57,60,63,66,69,72,75,78,81,84,87,90,93,96,99");

$kihieu["chia3du1"][] = trim("01,04,07,10,13,16,19,22,25,28,31,34,37,40,43,46,49,52,55,58,61,64,67,70,73,76,79,82,85,88,91,94,97");

$kihieu["chia3du2"][] = trim("02,05,08,11,14,17,20,23,26,29,32,35,38,41,44,47,50,53,56,59,62,65,68,71,74,77,80,83,86,89,92,95,98");

echo json_encode($kihieu);