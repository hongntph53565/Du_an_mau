<?php
class AdminAccountController
{
    public function __construct()
    {
        if(!isset($_SESSION['user'])){
            header("location:index.php");
            die;
        }
    }
    public function list()
    {
        $account = (new TaiKhoan)->all();
        view("admin/taikhoan/list", ['account' => $account]);
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $data['hinh'] = upload_file($_FILES['hinh']);
            (new TaiKhoan)->insert($data);
            $_SESSION['message'] = "Thêm dữ liệu thành công";
        }
        require_once "views/admin/taikhoan/add.php";
    }
    public function dangky()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $data['hinh'] = upload_file($_FILES['hinh']);
            (new TaiKhoan)->insert($data);
            $_SESSION['message'] = "Đã đăng ký thành công";
        }
        $categories = (new DanhMuc)->all();
        $top10 = (new SanPham)->top10();
        // require_once "views/client/dangky.php";
        view("client/dangky", [
            'categories' => $categories,
            'top10' => $top10
        ]);
    }
    public function delete()
    {
        $ma_tk = $_GET['ma_tk'];
        (new TaiKhoan)->delete($ma_tk);
        $_SESSION['message'] = "Xóa dữ liệu thành công";
        header('location: index.php?ctl=list-account');
    }
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $message = "Cập nhật dữ liệu thành công";
            if ($_FILES['hinh']['size'] > 0) {
                $data['hinh'] = upload_file($_FILES['hinh']);
            }
            (new TaiKhoan)->update($data);
        }

        $ma_tk = $_GET['ma_tk'];
        $account = (new TaiKhoan)->find_one($ma_tk);
        view(
            "admin/taikhoan/edit",
            [
                'account' => $account,
                'message' => $message ?? ''
            ]
        );
    }
}
