<?php include_once "views/admin/header.php" ?>
<div class="content">
    <div class="title1">
        <h3>TỔNG HỢP BÌNH LUẬN</h3>
    </div>
    <div class="content form_content cmt ">
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
                <table>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Nội dung</th>
                        <th>ID user</th>
                        <th>ID product </th>
                        <th>Ngày BL</th>
                        <th></th>
                    </tr>
                    <?php foreach ($comment as $cmt) : ?>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td><?= $cmt['ma_bl'] ?></td>
                            <td><?= $cmt['noi_dung'] ?></td>
                            <td><?= $cmt['ma_tk'] ?></td>
                            <td><?= $cmt['ma_hh'] ?></td>
                            <td><?= $cmt['ngay_bl'] ?></td>
                            <td><a href="index.php?ctl=delete-comment&ma_bl=<?= $cmt['ma_bl'] ?>" class="crud">Xóa</a></td>
                        </tr>

                    <?php endforeach ?>
                </table>

            </div>

        </form>
        <div class="content mb">
            <input type="button" value="Chọn tất cả ">
            <input type="button" value="Bỏ chọn tất cả ">
            <input type="button" value="Xóa các mục đã chọn">
        </div>
    </div>
</div>