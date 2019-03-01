<div class="row">
    <div class="col-sm-12">
      <!-- <h1 class="page-header">
        <button class="btn btn-primary" id="addCustomer">Thêm Khách Hàng Mới</button>
      </h1> -->
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>ICCID</th>
              <th>SDT</th>
              <th>TÊN</th>
              <th>ĐỊACHỈ</th>
              <th>VIP</th>
              <th>GIÁ</th>
              <th>ACTIVE</th>
              <th>NgườiĐK</th>
              <th>ĐĂNGKÍ</th>
              <th>Tùy Chọn</th>
            </tr>
          </thead>
          <tbody>
    	<?php 
    		$database = config_database();
				// Create connection
				$conn = mysqli_connect($database["servername"], $database["username"], $database["password"], $database["dbname"]);
				// Check connection
				if (!$conn) {
				    die("Connection failed: " . mysqli_connect_error());
				}
        $sql = "SELECT * FROM users WHERE nguoigioithieu IS NOT NULL ORDER BY `users`.`ngaydangki` DESC";
        if (isset($_POST["timImei"]) && $_POST["timImei"] != "") {
          $sql = "SELECT * FROM `users` WHERE `iccid` LIKE '%".$_POST["timImei"]."%' ORDER BY `users`.`ngaydangki` DESC";
        }
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
				    // output data of each row
          $i = 1;
				    while($row = mysqli_fetch_assoc($result)) { ?>
				        <tr>
		                  <td><?php echo $i++; ?></td>
		                  <td><?php echo $row["iccid"]; ?></td>
		                  <td class="sdt" val="<?php echo $row["id"]; ?>"><?php echo $row["sdt"]; ?></td>
		                  <td class="ten" val="<?php echo $row["id"]; ?>"><?php echo $row["ten"]; ?></td>
		                  <td class="diachi" val="<?php echo $row["id"]; ?>"><?php echo $row["diachi"]; ?></td>
		                  <td class="vip" val="<?php echo $row["id"]; ?>" vip="<?php echo $row["vip"]; ?>">
                      <?php if ($row["vip"] == 1) {
                        echo "<font color=\"green\"><i class=\"glyphicon glyphicon-ok\"></i></font>";
                      } else {
                        echo "<font color=\"red\"><i class=\"glyphicon glyphicon-remove\"></i></font>";
                      }
                      ?>
                    </td>
		                  <td class="giatien" val="<?php echo $row["id"]; ?>"><?php echo number_format($row["gia"]); ?> VND</td>
		                  <td><?php 
                      if ($row["active"] == 1) {
                        echo "<button class=\"btn btn-primary active\" value=\"".$row["id"]."\"><i class=\"glyphicon glyphicon-pause\"></i></button>";
                      } else {
                        echo "<button class=\"btn btn-primary active\" value=\"".$row["id"]."\"  ><i class=\"glyphicon glyphicon-play\"></i></button>";
                      }
                      ?></td>
                      <td><?php echo $row["nguoigioithieu"]; ?></td>
		                  <td><?php echo $row["ngaydangki"]; ?></td>
		                  <td>
		                  	<a href="" class="btn btn-primary myBtn" value="<?php echo $row["id"]; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
		                  	<a href="deleteSql.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary" value="<?php echo $row["id"]; ?>" 
                        onclick=" confirm('Bạn có chắc xóa khách hàng này không!');">
                        <i class="glyphicon glyphicon-trash"></i>
                      </a>
		                  </td>
		                </tr>
				    <?php }
				}
				mysqli_close($conn);
          	?>
          </tbody>
        </table>
      </div>
    </div>
  </div>