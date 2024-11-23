<?php
class HomeController
{
    public function login()
    {
        if ($_POST['submit']) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $nguoidung = (new TaiKhoan)->all();
            foreach ($nguoidung as $a) {
                if ($a['user'] == $user && $a['pass'] == $pass) {
                    $_SESSION['user'] = $a;
                    header("location: index.php?ctl=client");
                    exit;
                } else {
                    $errors = "Tên đăng nhập hoặc mật khẩu không chính xác";
                }
            }
        }
        
        $productLatest = (new SanPham)->productLatest();

        $categories = (new DanhMuc)->all();

        $top10 = (new SanPham)->top10();

        view("client/home", [
            'productLatest' => $productLatest,
            'categories' => $categories,
            'top10' => $top10,
            'errors' => $errors ?? '',
            'user' => $user ?? ''
        ]);
    }
    public function loggin()
    {

        $productLatest = (new SanPham)->productLatest();

        $categories = (new DanhMuc)->all();

        $top10 = (new SanPham)->top10();

        view("client/login", [
            'productLatest' => $productLatest,
            'categories' => $categories,
            'top10' => $top10,
        ]);
    }
    public function index()
    {

        $productLatest = (new SanPham)->productLatest();

        $categories = (new DanhMuc)->all();

        $top10 = (new SanPham)->top10();



        view("client/home", [
            'productLatest' => $productLatest,
            'categories' => $categories,
            'top10' => $top10,
            'errors' => $errors ?? '',
            'user' => $user ?? ''
        ]);
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        header("location: index.php");
    }
    public function dangky()
    {

        $categories = (new DanhMuc)->all();

        $top10 = (new SanPham)->top10();

        view("client/dangky", [
            'categories' => $categories,
            'top10' => $top10,

        ]);
    }
}
