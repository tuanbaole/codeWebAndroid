<link href="css/login.css" rel="stylesheet">
<div class="login-page">
  <div class="form">
    <form class="login-form" action="checkUser.php" method="post">
      <input type="text" placeholder="username" name="username"/>
      <input type="password" placeholder="password" name="pass"/>
      <button>login</button>
    </form>
    <span class="row">
      <a href="quenmatkhau.php">Quên mật khẩu ?</a>
    </span>
    <?php if (isset($_GET["thongbao"])): ?>
    	<?php echo "Sai tên đăng nhật hoặc mật khẩu không đúng."; ?>
    <?php endif ?>
    <span></span>
  </div>
</div>