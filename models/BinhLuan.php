<?php
class BinhLuan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connection();
    }

    public function all()
    {
        $sql = "SELECT * FROM binh_luan ";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete($ma_bl)
    {
        $sql = "DELETE FROM binh_luan WHERE ma_bl=$ma_bl";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
    public function find_one($ma_hh)
    {
        $sql = "SELECT * FROM binh_luan WHERE ma_hh=:ma_hh";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['ma_hh' => $ma_hh]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
