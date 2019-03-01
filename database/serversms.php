<?php
include "function.php";
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	if(isset($_GET['smstext'])){
		$today = date("Y-m-d h:i:s");
		$query = "INSERT INTO `smsserver`(`sms_text`, `sdt_send`, `sdt_boss`, `imei`,`type_sms`,`created`, `modified`) 
			VALUES ('".$_GET['smstext']."','0','0','0','0','".$today."','".$today."')";
		$res = query($query);	
		$to      = 'letuanbao1993@gmail.com';
		$subject = 'Fake sendmail test';
		$message = $_GET['smstext'];
		$headers = 'iloveyou';

		if(mail($to, $subject, $message, $headers)) {
		    echo 'Email sent successfully!';
		} else {
		    die('Failure: Email was not sent!');
		}	
	}		
}
$database = config_database();
// Create connection
$conn = mysqli_connect($database["servername"], $database["username"], $database["password"], $database["dbname"]);
// Check connection
if (!$conn) die("Connection failed: " . mysqli_connect_error());
$sql = "SELECT * FROM `smsserver`";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) { 
		echo "<pre>";
	   	echo $row["sms_text"];
	    echo "</pre>";
	}
}
mysqli_close($conn);