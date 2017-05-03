<?php
$url = 'http://www.minhngoc.net.vn/demo/';
$content = file_get_contents($url);
$second_step = explode("</div>" , $content );
$second_step2 = explode("font-size: 14px;" , $second_step[2] );
var_dump($second_step2);
?>
<?php 
$data = file_get_contents('http://www.xskt.com.vn/rss-feed/mien-bac-xsmb.rss');
echo $data;
die();
$xml_source = str_replace(array("&amp;", "&"), array("&", "&amp;"), $data);
$xml = simplexml_load_string($xml_source);
$find = array("ÄB:","1:","2:","3:","4:","5:","6:","7:");
$replace = array("kq","kq","kq","kq","kq","kq","kq","kq");
foreach($xml->channel->item as $child)
{
	$title = $child->title;
	$link = pathinfo($child->link,PATHINFO_FILENAME );
	$description = explode("kq",str_replace($find,$replace,$child->description));
	break;
}
unset($description[0]);
foreach ($description as $keyGiai => $valueGiai) {
	$ketqua["ketqua"][] = trim($valueGiai);
}
$ketqua["link"] = date("Y-m-d",strtotime($link));
echo json_encode($ketqua);