<?php include 'function.php'; ?> 
<html>
<head>
	<meta charset="utf-8">
	<title>Quản Lý Khách Hàng</title>
	<link href="bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/dashboard.css" rel="stylesheet">
	<script src="bootstrap-3.3.7/jquery/jquery.js"></script>
	<script type="text/javascript" src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
      </div>
    </nav>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nhập Thông Tin Khách Hàng</h4>
        </div>
        <div class="modal-body">
          <form action="editCustomer.php" method="post">
            <input type="number" class="form-control" id="id" name="id" style="display:none;">
            <div class="form-group">
              <label for="sdt">Số Điện Thoại</label>
              <input type="number" class="form-control" id="sdt" placeholder="Số Điện Thoại" name="sdt" required>
            </div>
            <div class="form-group">
              <label for="ten">Tên Khách Hàng</label>
              <input type="text" class="form-control" id="ten" placeholder="Tên Khách Hàng" name="ten" required>
            </div>
             <div class="form-group">
              <label for="diachi">Địa Chỉ Khách Hàng</label>
              <input type="text" class="form-control" id="diachi" placeholder="Địa Chỉ Khách Hàng" name="diachi" required>
            </div>
            <div class="form-group">
              <label for="giatien">Giá Tiền</label>
              <input type="number" class="form-control" id="giatien" placeholder="Giá Tiền" name="giatien" step="0.01" required>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="vip" id="vip"> Vip
              </label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->
   <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nhập Thông Tin Khách Hàng</h4>
        </div>
        <div class="modal-body">
          <form action="addCustomer.php" method="post">
            <div class="form-group">
              <label for="iccid">ICCID</label>
              <input type="number" class="form-control" id="iccid" placeholder="ICCID" name="iccid" required>
            </div>
            <div class="form-group">
              <label for="sdt">Số Điện Thoại</label>
              <input type="number" class="form-control" id="sdt" placeholder="Số Điện Thoại" name="sdt" required>
            </div>
            <div class="form-group">
              <label for="ten">Tên Khách Hàng</label>
              <input type="text" class="form-control" id="ten" placeholder="Tên Khách Hàng" name="ten" required>
            </div>
             <div class="form-group">
              <label for="diachi">Địa Chỉ Khách Hàng</label>
              <input type="text" class="form-control" id="diachi" placeholder="Địa Chỉ Khách Hàng" name="diachi" required>
            </div>
            <div class="form-group">
              <label for="giatien">Giá Tiền</label>
              <input type="number" class="form-control" id="giatien" placeholder="Giá Tiền" name="giatien" step="0.01" required>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="vip" id="vip"> Vip
              </label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="page-header">
            <button class="btn btn-primary" id="addCustomer">Thêm Khách Hàng Mới</button>
          </h1>
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
					$sql = "SELECT * FROM users";
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
                            echo "<button class=\"btn btn-primary\"><i class=\"glyphicon glyphicon-pause\"></i></button>";
                          } else {
                            echo "<button class=\"btn btn-primary\"><i class=\"glyphicon glyphicon-play\"></i></button>";
                          }
                          ?></td>
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
					} else {
					}

					mysqli_close($conn);
              	?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <script>
      jQuery(document).ready(function(){
          jQuery(".myBtn").click(function(){
              var id = jQuery(this).attr("value");
              jQuery("#id").val(id);
              var sdt = jQuery(".sdt[val='"+id+"']").text();
              jQuery("#sdt").val(sdt);
              var ten = jQuery(".ten[val='"+id+"']").text();
              jQuery("#ten").val(ten);
              var diachi = jQuery(".diachi[val='"+id+"']").text();
              jQuery("#diachi").val(diachi);
              var giatien = jQuery(".giatien[val='"+id+"']").text().replace(/\D/g,'');
              jQuery("#giatien").val(giatien);
              if (jQuery(".vip[val='"+id+"']").attr("vip") == 1) {
                jQuery("#vip").attr('checked', true);
              } else {
                jQuery("#vip").attr('checked', false);
              };

              jQuery("#myModal").modal();
              return false;
          });

          jQuery("#addCustomer").click(function(){
            jQuery("#myModal2").modal();
          });

      });
      </script>
  </body>
</html>