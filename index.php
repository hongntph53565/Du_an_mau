<?php
session_start();

//commons
require_once "commons/env.php";
require_once "commons/function.php";
//models
require_once "models/DanhMuc.php";
require_once "models/SanPham.php";
require_once "models/BinhLuan.php";
require_once "models/TaiKhoan.php";
//controller
require_once "controllers/AdminProductController.php";
require_once "controllers/AdminCateroryController.php";
require_once "controllers/HomeController.php";
require_once "controllers/AdminCommentController.php";
require_once "controllers/AdminStatisticalController.php";
require_once "controllers/AdminAccountController.php";
require_once "controllers/ClientProductController.php";


//Lấy tham số trên thanh địa chỉ URL
$ctl = $_GET['ctl'] ?? "";

match ($ctl) {
    'admin' => (new AdminProductController)->trangchu(),
    // Danh Mục
    'list-categories' => (new AdminCategoryController)->list(),
    'add-categories' => (new AdminCategoryController)->add(),
    'store-categories' => (new AdminCategoryController)->store(),
    'delete-categories' => (new AdminCategoryController)->delete(),
    'edit-categories' => (new AdminCategoryController)->edit(),
    //Sản Phẩm
    'list-product' => (new AdminProductController)->list(),
    'add-product' => (new AdminProductController)->add(),
    'delete-product' => (new AdminProductController)->delete(),
    'edit-product' => (new AdminProductController)->edit(),
    //Bình luận
    'list-comment' => (new AdminCommentController)->list(),
    'delete-comment' => (new AdminCommentController)->delete(),
    //Tài khoản
    'add-account' => (new AdminAccountController)->add(),
    'list-account' => (new AdminAccountController)->list(),
    'delete-account' => (new AdminAccountController)->delete(),
    'edit-account' => (new AdminAccountController)->edit(),
    'dangky' => (new AdminAccountController)->dangky(),
    //Thống kê
    'admin-statistical' => (new AdminStatisticalController)->home(),
    // client
    '', 'home' => (new HomeController)->index(),
    'dangky' => (new HomeController)->dangky(),
    'listproduct' => (new ClientProductController)->list(),
    'detail' => (new ClientProductController)->show(),

    'client' => (new HomeController)->loggin(),
    'log' => (new HomeController)->login(),

    'logout' => (new HomeController)->logout(),
    default => "Không tìm thấy file"
};
