<?php include_once "views/admin/header.php" ?>
<div class="content">
    <div class="title1">
        <h3>QUẢN LÝ HÀNG HÓA</h3>
    </div>
    <div class="content form_content ">
        <form action="" method="post">
            <div class="content mb">
                <div style="color: red;">
                    <?php if (isset($_SESSION['message'])):
                        session_destroy();
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    endif;
                    ?>
                </div>
                <table class="hanghoa">
                    <tr>
                        <th></th>
                        <th>Mã sp</th>
                        <th>Tên sp</th>
                        <th>Giá</th>
                        <th>Hình</th>
                        <th>Ngày nhập</th>
                        <th>Mô tả</th>
                        <th>Lượt xem</th>
                        <th>Mã dm</th>
                        <th></th>
                    </tr>
                    <?php foreach ($products as $pro): ?>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td><?= $pro['ma_hh'] ?></td>
                            <td><?= $pro['ten_hh'] ?></td>
                            <td><?= $pro['don_gia'] ?></td>
                            <td><img src="<?= $pro['hinh'] ?>" alt="" width="100%"></td>
                            <td><?= $pro['ngay_nhap'] ?></td>
                            <td><?= $pro['mo_ta'] ?></td>
                            <td><?= $pro['so_luot_xem'] ?></td>
                            <td><?= $pro['ma_dm'] ?></td>
                            <td><a href="index.php?ctl=edit-product&ma_hh=<?= $pro['ma_hh'] ?>" class="crud">Sửa</a><br><br>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="index.php?ctl=delete-product&ma_hh=<?= $pro['ma_hh'] ?>" class="crud">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
            <div class="content mb">
                <input type="button" value="Chọn tất cả ">
                <input type="button" value="Bỏ chọn tất cả ">
                <a href="index.php?ctl=add-product"> <input type="button" value="Nhập thêm"></a>
            </div>
        </form>
    </div>
</div>