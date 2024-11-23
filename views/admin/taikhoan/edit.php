<?php include_once "views/admin/header.php" ?>
<div class="content">
  <div class="title1">
    <h3>CẬP NHẬT TÀI KHOẢN</h3>

  </div>
  <div class="content form_content ">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="ngang">
        <div class="danhang mr5">
          <div class="content mb">
          <div style="color: red;"><?= $message ?></div> <br>
            <label> Tên đăng nhập </label> <br>
            <input type="text" name="user" value="<?= $account['user'] ?>">
          </div>
          <div class="content mb">
            <label>Mật khẩu</label> <br>
            <input type="password" name="pass" value="<?= $account['pass'] ?>">
          </div>
          <div class="content mb">
            <label>Hình ảnh</label> <br>
            <input type="file" name="hinh">
            <img src="<?= $account['hinh'] ?>" width="30%" alt="<?= $account['hinh'] ?>"> <br>
            <input type="hidden" name="hinh" value="<?= $account['hinh'] ?>">
          </div>
        </div>
        <div class="danhang ">
          <div class="content mb">
            <label>Họ và tên</label> <br>
            <input type="text" name="ho_ten" value="<?= $account['ho_ten'] ?>" >
          </div>
          <div class="content mb">
            <label> Email</label> <br>
            <input type="text" name="email" value="<?= $account['email'] ?>">
          </div>
          <div class="content mb">
            <label>Vai trò</label> <br>
            <input type="text" name="vai_tro" value="<?= $account['vai_tro'] ?>">
          </div>
        </div>
      </div>
      <input type="hidden" name="ma_tk" value="<?= $account['ma_tk'] ?>">
      <div class="content mb">
        <input type="submit" value="Cập nhật">
        <input type="reset" value="Nhập lại">

        <a href="index.php?ctl=list-account"><input type="button" value="Danh sách"></a>
      </div>

    </form>
  </div>

  <?php include_once "views/admin/footer.php" ?>