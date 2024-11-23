<?php
class AdminCommentController
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
      $comment =(new BinhLuan)->all();
      view("admin/binhluan/list",['comment'=>$comment]);
   }

   public function delete()
    {
        $ma_bl =$_GET['ma_bl'];
        (new BinhLuan)->delete($ma_bl);
        $_SESSION['message'] = "Xóa dữ liệu thành công";
        header('location: index.php?ctl=list-comment');
        
    }
}
?>