<?php session_start(); ?>
<?php include 'function.php'; ?> 
<html>
<?php include 'include/header.php'; ?> 
<body>
  <?php include 'include/menu_index.php'; ?> 
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

            <div class="form-group">
              <label for="giatien">Ngày</label>
              <input type="date" class="form-control" id="datepicker1" placeholder="Hạn sử dụng" name="hsd" required>
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
              <div class="form-group">
              <label for="giatien">Ngày</label>
              <input type="date" class="form-control" id="datepicker2" placeholder="Hạn sử dụng" name="hsd" required>
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
      <?php if (isset($_SESSION["username"])): ?>
        <?php include 'customer.php'; ?>
      <?php else : ?>
        <?php include 'login.php'; ?>
      <?php endif ?>
    </div>
    <script src="js/index.js"></script>
  </body>
</html>