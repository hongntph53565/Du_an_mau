<?php include_once "views/admin/header.php" ?>
<div class="content">
    <div class="title1">

        <h3>CẬP NHẬT SẢN PHẨM</h3>
    </div>
    <div class="content form_content ">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="ngang">
                <div class="danhang mr5">
                    <div class="content mb">
                    <div style="color: red;"><?= $message ?></div> <br>
                        <label>Tên sản phẩm </label> <br>
                        <input type="text" name="ten_hh" value="<?= $product['ten_hh'] ?>">
                    </div>
                    <div class="content mb">
                        <label>Đơn giá</label> <br>
                        <input type="number" name="don_gia" value="<?= $product['don_gia'] ?>">
                    </div>
                    <div class="content mb">
                        <label>Hình ảnh</label> 
                        <input type="file" name="hinh"><br><br>
                        <img src="<?= $product['hinh'] ?>" width="30%" alt="<?= $product['hinh'] ?>"> <br>
                        <input type="hidden" name="hinh" value="<?= $product['hinh'] ?>">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="danhang ">
                    <div class="content mb">

                        <label>Danh mục</label> <br>
                        <select name="ma_dm" id="">
                            <?php foreach ($danhmuc as $dm) : ?>
                                <option value="<?= $dm['ma_dm'] ?>" <?= ($dm['ma_dm'] == $product['ma_dm']) ? 'selected' : '' ?>>
                                    <?= $dm['ten_dm'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="content mb">
                        <label>Ngày nhập</label> <br>
                        <input type="date" name="ngay_nhap" value="<?= $product['ngay_nhap'] ?>">
                    </div>
                    <div class="content mb">
                        <label>Số lượt xem</label> <br>
                        <input type="text" name="so_luot_xem" disabled placeholder="0">
                    </div>
                </div>
            </div>
            <div class="content mb">
                <label>Mô tả</label> <br>
                <textarea name="mo_ta" id=""><?= $product['mo_ta'] ?></textarea>
            </div>
            <input type="hidden" name="ma_hh" value="<?= $product['ma_hh'] ?>">
            <div class="content mb">
                <input type="submit" value="Cập nhật">
                <a href="index.php?ctl=list-product"><input type="button" value="Danh sách"></a>
            </div>
        </form>
    </div>

    <?php include_once "views/admin/footer.php" ?>