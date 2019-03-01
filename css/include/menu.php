<?php if (isset($_SESSION["username"])): ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Trang Chủ</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <?php if ($_SESSION["username"] == "admin"): ?>
      <li><a href="addAccount.php"><span class="glyphicon glyphicon-plus"></span> Thêm tài khoản</a></li>
      <?php endif ?>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["username"]; ?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Đăng Xuất</a></li>
    </ul>
  </div>
</nav>
<?php endif ?>