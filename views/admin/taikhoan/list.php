<?php include_once "views/admin/header.php" ?>
<div class="content">
    <div class="title1">
        <h3>QUẢN LÝ NGƯỜI DÙNG</h3>
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
                <table class="cmt">
                    <tr>
                        <th>ID</th>
                        <th>HỌ TÊN</th>
                        <th>USER</th>
                        <th>EMAIL</th>
                        <th>ẢNH</th>
                        <th>VAI TRÒ</th>
                        <th></th>
                    </tr>
                    <?php foreach ($account as $acc): ?>
                        <tr>
                            <td><?= $acc['ma_tk'] ?></td>
                            <td><?= $acc['ho_ten'] ?></td>
                            <td><?= $acc['user'] ?></td>
                            <td><?= $acc['email'] ?></td>
                            <td><img src="<?= $acc['hinh'] ?>" alt="" width="80%"></td>
                            <td><?= $acc['vai_tro'] ?></td>
                            <td>
                                <a href="index.php?ctl=edit-account&ma_tk=<?= $acc['ma_tk'] ?>" class="crud">Sửa</a>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="index.php?ctl=delete-account&ma_tk=<?= $acc['ma_tk'] ?>" class="crud">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>

            </div>

        </form>
        <div class="content mb">
            <a href="index.php?ctl=add-account"> <input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>