<?php include_once "views/client/header.php" ?>
<div id="content">
    <div class="left detail">
        <div class="title"><?= $product['ten_hh'] ?></div>
        <div class="products">

            <div class="zoom">
                <img src="<?= $product['hinh'] ?>" alt="">
            </div><br><br>
            <div style="text-align: left;">Đơn giá: <?= $product['don_gia'] ?>$ <br>
                Ngày nhập: <?= $product['ngay_nhap'] ?> <br>
                <!-- Lượt truy cập: <?= $product['so_luot_xem'] ?> -->
            </div>
            <br><br>
            <div class="it">
                <p><?= $product['mo_ta'] ?></p>
            </div>

        </div>
        <!-- Bình luận -->
        <br><br>

        <div class="title">Bình Luận</div>
        <div class="products">
            <div class="binhluan">
                <?php foreach ($comment as $cmt): ?>
                    <li style="text-align: left;"><?= $cmt['noi_dung'] ?></li>
                <?php endforeach ?>
            </div>
        </div>
        <!-- Sản Phẩm Cùng Loại -->
        <br><br>

        <div class="title">Sản Phẩm Cùng Loại</div>
        <?php foreach ($productsType as $pro): ?>
            <div class="products item mr">

                <div class="zoom">
                    <img src="<?= $pro['hinh'] ?>" alt="">
                </div><br><br>
                <div><?= $pro['ten_hh'] ?></div><br>
                <div><?= $pro['don_gia'] ?>$</div>

            </div>
        <?php endforeach ?>

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
            <?php foreach ($top10 as $product): ?>
                <div class="mb top10">
                    <img src="<?= $product['hinh'] ?>" alt="">
                    <a href="index.php?ctl=detail&ma_hh=<?= $product['ma_hh'] ?>"><?= $product['ten_hh'] ?></a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?php include_once "views/client/footer.php" ?>