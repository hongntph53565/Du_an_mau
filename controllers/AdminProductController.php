<?php
class AdminProductController
{
    public function __construct()
    {
        if(!isset($_SESSION['user'])){
            header("location:index.php");
            die;
        }
    }
    public function trangchu()
    {
        include_once "views/admin/home.php";
    }
    public function list()
    {
        $products = (new SanPham)->all();
        view("admin/sanpham/list", ['products' => $products]);
       
    }

    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $data['hinh'] = upload_file($_FILES['hinh']);
            (new SanPham)->insert($data);
            $_SESSION['message'] = "Thêm dữ liệu thành công";
        }
        $danhmuc=(new DanhMuc)->all();
        view("admin/sanpham/add", ['danhmuc' => $danhmuc]);
    }
    public function delete()
    {
        $ma_hh =$_GET['ma_hh'];
        (new SanPham)->delete($ma_hh);
        $_SESSION['message'] = "Xóa dữ liệu thành công";
        header('location: index.php?ctl=list-product');
        
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $message = "Cập nhật dữ liệu thành công";
            if ($_FILES['hinh']['size'] > 0) {
                $data['hinh'] = upload_file($_FILES['hinh']);
            }
            
            (new SanPham)->update($data);
        }

        $ma_hh = $_GET['ma_hh'];
        $product = (new SanPham)->find_one($ma_hh);
        $danhmuc = (new DanhMuc)->all();
        view(
            "admin/sanpham/edit",
            [
                'danhmuc' => $danhmuc,
                'product' => $product,
                'message' => $message ?? ''
            ]
        );
    }
}
?>
