<?php session_start(); ?>
<!DOCTYPE html>
<?php include 'function.php'; ?> 
<html>
<?php include 'include/header.php'; ?> 
<head>
	<title></title>
</head>
<?php if (!isset($_SESSION["username"])): ?>
	<?php location('index.php'); ?>
<?php endif; ?>
<?php

?>
<body>
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
	          <form action="editLinkKqsx.php" method="post">
	            <input type="number" class="form-control" id="id" name="id" style="display:none;">
	            <div class="form-group">
	              <label for="link">Địa Chỉ WEBSITE</label>
	              <input type="text" class="form-control" id="link" placeholder="Địa Chỉ WEBSITE" name="link" required>
	            </div>

	            <div class="checkbox">
	              <label>
	                <input type="checkbox" name="active" id="active"> Hoạt Động
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
			<button id="addLinkKqsx" class="btn btn-default">Thêm Link Quản Trị</button>
		</div>
    	<div class="col-sm-12">
	      <div class="table-responsive">
	        <table class="table table-striped"> 
				<thead>
					<tr>
						<th>ID</th>
						<th>LINK</th>
						<th>Trang Thai</th>
						<th>Hoat Dong</th>
						<th>Ngay Tao</th>
						<th>Ngay Sua</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>231</td>
						<td>231</td>
						<td>231</td>
						<td class="center"><input type="checkbox" name="link" ></td>
						<td>231</td>
						<td>231</td>
					</tr>
				</tbody>	
			</table>
			</div><!-- col-sm-12 -->
		</div><!-- row -->
	</div><!-- container-fluid -->
	 <script src="js/linkKqsx.js"></script>
</body>
</html>