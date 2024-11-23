<?php include_once "views/client/header.php" ?>
<div id="content">
    <div class="left">
        <div class="title1">ĐĂNG KÝ THÀNH VIÊN</div>
        <div class="content form_content ">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="ngang">
                    <div class="danhang mr5">
                        <div class="content mb">
                            <?php if (isset($_SESSION['message'])):
                                session_destroy();
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            endif;
                            ?><br>
                            <label> Tên đăng nhập </label> <br>
                            <input type="text" name="user" placeholder="user" required>
                        </div>
                        <div class="content mb">
                            <label>Mật khẩu</label> <br>
                            <input type="password" name="pass" placeholder="password" required>
                        </div>
                        <div class="content mb">
                            <label>Hình ảnh</label> <br>
                            <input type="file" name="hinh">
                        </div>
                    </div>
                    <div class="danhang ">
                        <div class="content mb">
                            <label>Họ và tên</label> <br>
                            <input type="text" name="ho_ten" placeholder="Họ và tên" required>
                        </div>
                        <div class="content mb">
                            <label> Email</label> <br>
                            <input type="text" name="email" placeholder="email" required>
                        </div>
                        <div class="content mb">
                            <label>Vai trò</label> <br>
                            <input type="text" name="vai_tro" value="0" readonly>

                        </div>
                    </div>
                </div>
                <div class="content mb">
                    <input type="submit" value="Đăng ký">
                </div>

            </form>
        </div>
    </div>
    <div class="right">

        <div class="title">
            TÀI KHOẢN<br>
        </div>
        <div class="box taikhoan">
            <form action="#" method="post">
                <div class="mb">
                    Tên đăng nhập <input type="text" name="user" id="">
                </div>
                <div class="mb">
                    Mật khẩu <input type="password" name="pass" id="">
                </div>
                <div class="mb">
                    <!-- <input type="checkbox" name="" id="">Ghi nhớ tài khoản? -->
                </div>
                <div class="mb">
                    <input type="submit" value="Đăng nhập">
                </div>

            </form>

            <li><a href="#">Quên mật khẩu</a></li>
            <li><a href="index.php?ctl=dangky">Đăng ký thành viên</a></li>

        </div>
        <br>
        <div class="title">DANH MỤC</div>
        <div class="box1 menudoc">
            <ul>
                <?php foreach ($categories as $cate) : ?>
                    <li>
                        <a href="index.php?ctl=listproduct&ma_dm=<?= $cate['ma_dm'] ?>">
                            <?= $cate['ten_dm'] ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
            <div class=" boxfooter searbox">
                <form action="" method="post">
                    <input type="text" name="" id="" required placeholder="Tìm kiếm từ khóa">
                </form>
            </div>
        </div>
        <br>
        <div class="title">TOP 10 YÊU THÍCH</div>
        <div class="box ">
            <?php foreach ($top10 as $product) : ?>
                <div class="mb top10">
                    <img src="<?= $product['hinh'] ?>" alt="">
                    <a href="index.php?ctl=detail&ma_hh=<?= $product['ma_hh'] ?>"><?= $product['ten_hh'] ?></a>
                </div>
            <?php endforeach ?>
        </div>

    </div>
</div>
<?php include_once "views/client/footer.php" ?>