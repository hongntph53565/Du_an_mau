<?php 
class AdminStatisticalController{
    public function __construct()
    {
        if(!isset($_SESSION['user'])){
            header("location:index.php");
            die;
        }
    }
    public function home()
    {
        require_once "views/admin/thongke/list.php";
    }
}
?>