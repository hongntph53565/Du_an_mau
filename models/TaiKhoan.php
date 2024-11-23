<?php
class TaiKhoan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connection();
    }
    public function all()
    {
        $sql = "SELECT * FROM tai_khoan";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function insert($data)
    {
        $sql = "INSERT INTO tai_khoan(ho_ten, user, pass, hinh, email, vai_tro) 
        VALUES (:ho_ten, :user, :pass, :hinh, :email, :vai_tro)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    public function update($data)
    {
        $sql = "UPDATE tai_khoan SET ho_ten=:ho_ten, user=:user, pass=:pass, hinh=:hinh, email=:email, vai_tro=:vai_tro WHERE ma_tk=:ma_tk";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    public function find_one($ma_tk)
    {
        $sql = "SELECT * FROM tai_khoan WHERE ma_tk=$ma_tk";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($ma_tk)
    {
        $sql = "DELETE FROM tai_khoan WHERE ma_tk=$ma_tk";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}
