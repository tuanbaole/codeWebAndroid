<?php session_start(); ?>
<html>
<?php include 'include/header.php'; ?> 
<body>
  <?php include 'include/menu.php'; ?> 
   <div class="container-fluid">
    <div class="row" style="margin-top: 20px;">
      <div class="col-sm-12">
        <?php if (isset($_GET["thongbao"] ) && $_GET["thongbao"] == "success") { ?>
          <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Đăng kí thành công!</strong> xin hãy thoát ra đăng nhập lại.
          </div>
        <?php } ?>
        <form class="form-horizontal"  action="insertAccount.php" method="post">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-1 control-label">Tài khoản</label>
            <div class="col-sm-11">
              <input type="text" class="form-control" name="taikhoan" placeholder="Tài khoản" id="taikhoan" value="" required>
              <span id="thongbaotk"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-1 control-label">Email</label>
            <div class="col-sm-11">
              <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-1 control-label">mật khẩu</label>
            <div class="col-sm-11">
              <input type="password" class="form-control" name="password" placeholder="Password">
              <span>
                <?php if (isset($_GET["thongbao"]) && $_GET["thongbao"] == "nopass") {
                  echo "nhập lại!mật khẩu không xác thực";
                } ?>
              </span>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-1 control-label">Xác thực mật khẩu</label>
            <div class="col-sm-11">
              <input type="password" class="form-control" name="confirmPassword" placeholder="Password">
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
  <script type="text/javascript">
    $(document).ready(function(){
      $("#taikhoan").change(function(){
        var taikhoan = $(this).val();
        $.ajax({
          url: "ajax/CheckAccount.php",
          type: 'POST',
          cache: false,
          data: {
            taikhoan : taikhoan
          },
          success: function(result){
            if (result == 1) {
              $("#thongbaotk").text("Tài khoản đã tồn tại");
              $("#taikhoan").val('');
            } else {
              $("#thongbaotk").text("");
            };
          }
        });
      });
    });
  </script>
</body>
</html>