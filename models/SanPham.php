<?php
class SanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connection();
    }
    public function all()
    {
        $sql = "SELECT * FROM hang_hoa";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert($data)
    {
        $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, hinh, ngay_nhap, mo_ta, ma_dm) 
        VALUES (:ten_hh, :don_gia, :hinh, :ngay_nhap, :mo_ta, :ma_dm)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        // dd($data);     
    }
    public function update($data)
    {
        $sql = "UPDATE hang_hoa SET ten_hh=:ten_hh, don_gia=:don_gia, 
        hinh=:hinh, ngay_nhap=:ngay_nhap, mo_ta=:mo_ta, ma_dm=:ma_dm WHERE ma_hh=:ma_hh";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        // dd($data);
    }
    public function delete($ma_hh)
    {
        $sql = "DELETE FROM hang_hoa WHERE ma_hh=$ma_hh";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
    public function updateLuotxem($ma_hh)
    {
        $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=$ma_hh";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
    public function productLatest()
    {
        $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh DESC LIMIT 12";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function top10()
    {
        $sql = "SELECT * FROM hang_hoa ORDER BY so_luot_xem DESC LIMIT 10 ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function sanPhamInDanhMuc($ma_dm)
    {
        $sql = "SELECT * FROM hang_hoa WHERE ma_dm=$ma_dm ORDER BY ma_hh DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function find_one($ma_hh)
    {
        $sql = "SELECT * FROM hang_hoa WHERE ma_hh=$ma_hh";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function productsType($ma_dm, $ma_hh)
    {
        if (empty($ma_dm)) {
            $sql = "SELECT * FROM hang_hoa WHERE ma_hh != :ma_hh ORDER BY ma_hh DESC LIMIT 4";
        }
        $stmt = $this->conn->prepare($sql);
        if (!empty($ma_dm)) {
            $stmt->bindParam(':ma_dm', $ma_dm, PDO::PARAM_INT);
        }
        $stmt->bindParam(':ma_hh', $ma_hh, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
