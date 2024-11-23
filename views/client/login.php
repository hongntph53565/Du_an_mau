<?php include_once "views/client/header.php" ?>
<div id="content">
    <div class="left">
        <div class="baner">
            <img id="img" src="" alt="">
        </div>
        <script>
            var imgs = [
                "images/banner3.jpg",
                "images/banner2.jpg",
                "images/banner1.jpg"
            ]
            var img = document.getElementById('img');
            img.setAttribute('src', imgs[0]);

            var i = 0;
            var len = imgs.length;

            auto_slide = function() {
                img.setAttribute('src', imgs[i]);
                i++;
                if (i == len) i = 0;
            }
            setInterval(auto_slide, 1000);
        </script>
        <br>
        <div class="products">
            <?php foreach ($productLatest as $product) : ?>
                <div class="item mr">
                    <div class="zoom">
                        <img src="<?= $product['hinh'] ?>" alt="">
                    </div>
                    <div class="it">
                        <a href="index.php?ctl=detail&ma_hh=<?= $product['ma_hh'] ?>"><?= $product['ten_hh'] ?></a>
                        <p style="color: red;"><?= $product['don_gia'] ?>$</p>
                    </div>
                </div>

            <?php endforeach ?>

        </div>
    </div>

    <div class="right">

        <div class="title">
            TÀI KHOẢN<br>
        </div>
        <div class="box taikhoan">
            <form action="" method="post">
                Xin Chào <?php if (isset($_SESSION['user'])) {
                                $user = $_SESSION['user'];
                                extract($user);
                                echo $ho_ten;
                            } ?> <br> <br> <br>
                <?php if ($_SESSION['user']['vai_tro'] == 1) {
                    echo '<li><a href="index.php?ctl=admin">Quản trị</a></li>';
                } ?>
            </form>

            <li> <a href="index.php?ctl=logout">Đăng xuất</a></li>

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