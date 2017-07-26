<?php session_start(); ?>
<html>
<?php include 'include/header.php'; ?> 
<body>
  <?php include 'include/menu.php'; ?> 
   <div class="container-fluid">
    <div class="row" style="margin-top: 20px;">
      <div class="col-sm-12">
        <form class="form-horizontal">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-1 control-label">Thông tin tài khoản</label>
            <div class="col-sm-11">
              <input type="email" class="form-control" id="inputEmail3" placeholder="Thông tin tài khoản">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-1 control-label">Email</label>
            <div class="col-sm-11">
              <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-1 control-label">mật khẩu</label>
            <div class="col-sm-11">
              <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-1 control-label">Xác thực mật khẩu</label>
            <div class="col-sm-11">
              <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-1 col-sm-11">
              <button type="submit" class="btn btn-default">Đăng Kí</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>