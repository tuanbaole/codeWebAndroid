<?php

$url = 'https://laythongtin.net/mini-content/traditional-lottery-api.php?type=display&date=';
$content = str_replace(
	array("<strong>","<font color=\"#FF0000\">","</font>","</strong>","</p>"),
	array("","","","","",""),
	file_get_contents($url)
	);
$second_step = explode("<p>" , $content );
$ketqua["ketqua"][] = trim(explode(":", $second_step[3])[1]);
$ketqua["ketqua"][] = trim(explode(":", $second_step[4])[1]);
$ketqua["ketqua"][] = trim(explode(":", $second_step[5])[1]);
$ketqua["ketqua"][] = trim(explode(":", $second_step[6])[1]);
$ketqua["ketqua"][] = trim(explode(":", $second_step[7])[1]);
$ketqua["ketqua"][] = trim(explode(":", $second_step[8])[1]);
$ketqua["ketqua"][] = trim(explode(":", $second_step[9])[1]);
$ketqua["ketqua"][] = substr(explode(":", $second_step[10])[1],0,18);
$kqDay = substr(end(explode(" ", $second_step[2])),0,10);
$ketqua["link"] = date("Y-m-d",strtotime($kqDay));
echo json_encode($ketqua);