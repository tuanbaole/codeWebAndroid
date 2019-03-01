<!DOCTYPE html>
<?php include 'include/header.php'; ?> 
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		include "function.php";
		if (!isset($_POST['website'])) {
			$website = 3;
		} else {
			$website = $_POST['website'];
		}

		$database = config_database();
		// Create connection
		$conn = mysqli_connect($database["servername"], $database["username"], $database["password"], $database["dbname"]);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
        $sql = "SELECT * FROM `kqxs` WHERE 1 ORDER BY `id` LIMIT 0,1";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) == 1) {
			while($row = mysqli_fetch_assoc($result)) {
				$sql = "UPDATE `kqxs` SET `active`='".$website."' WHERE id=".$row['id'];
		    	$res = query($sql);
			}
		} else {
			$time = date("Y-m-d h:i:s");
			$sql = "INSERT INTO `kqxs`(`link`,`active`,`created`, `modified`) 
		    	VALUES ('','".$website."','".$time."','".$time."');";
		    $res = query($sql);
		}

	?>
	<div class="container">
		<div class="row">
			<div class="cod-md-12">
				<form action="layketqua.php" method="post">
					<label class="radio-inline">
					  <input type="radio" name="website" value="1" <?php echo (isset($website))? ($website == 1) ? 'checked' : '' : ''; ?> >Xoso.me
					</label>
					<label class="radio-inline">
					  <input type="radio" name="website" value="2" <?php echo (isset($website))? ($website == 2) ? 'checked' : '' : ''; ?> >xosodaiphat.com
					</label>
					<label class="radio-inline">
					  <input type="radio" name="website" value="3" <?php echo (isset($website))? ($website == 3) ? 'checked' : '' : ''; ?> >KetQua.net
					</label><br><br>
					 <button type="submit">Thay Đổi</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>