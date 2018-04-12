<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
    p {
      text-align: center;
      font-size: 30px;
      font-style: bold;
    }
    </style>
    <script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('demo').innerHTML = h + ":" + m + ":" + s;
        if ( (s.toString().indexOf('0') > -1 && s > 10) || s.toString().indexOf('00') > -1 )
            location.reload(); 
       // var t = setTimeout(startTime, 1000);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
    </script>
</head>
<body onload="startTime()">
<p id="demo"></p>
<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
$date = date("d-m-Y");
$a = file_get_contents('http://hostingkqxs.esy.es/FileLog.txt');
$b = explode(")", $a);
krsort($b);
$c = array_slice($b, 0,150,true);
$i = 1;
foreach ($c as $key => $value) {
    if (trim($value) != "") {
        echo $i.'.'.$value.")<br /><hr/>";
        $i++;
    }
}
?>
</body>
</html>



