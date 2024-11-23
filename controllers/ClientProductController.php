<?php
class ClientProductController{
    
    public function list()
    {
        $ma_dm=$_GET['ma_dm'] ?? '';
        if ($ma_dm == '') {
            header("location: index.php");
            return 0;
        }
        $products = (new SanPham)->sanPhamInDanhMuc($ma_dm);
        
        // $ten_dm = (new DanhMuc)->findOne($ma_dm)['ten_dm'];

        $categories = (new DanhMuc)->all();

        $top10 = (new SanPham)->top10();

        return view(
            "client/listproduct",
            [
                'products' => $products,
                // 'ten_dm' => $ten_dm,
                'categories' => $categories,
                'top10' => $top10
            ]
        );
    }
    public function show()
    {
        $ma_hh = $_GET['ma_hh'] ?? '';
        $ma_dm=$_GET['ma_dm'] ?? '';
        if ($ma_hh == '') {
            header("location: index.php");
            return 0;
        }
        
        $product = (new SanPham)->find_one($ma_hh);
        $comment=(new BinhLuan)->find_one($ma_hh);
        $productsType = (new SanPham)->productsType($ma_dm,$ma_hh);
        
        $categories = (new DanhMuc)->all();

        $top10 = (new SanPham)->top10();
        (new SanPham)->updateLuotxem($ma_hh);
        return view(
            "client/detail",
            [
                'product' => $product,
                'productsType'=>$productsType,
                'comment' =>$comment,
                'categories' => $categories,
                'top10' => $top10
            ]
        );
    }
    
}

?>