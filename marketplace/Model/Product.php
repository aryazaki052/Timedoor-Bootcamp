<?php
class Product
{
    private $conn;

    public function __construct()
    {
        $this->conn = new DBClass;
    }

    // Method untuk mendapatkan produk berdasarkan ID
    public function getProductById($productId)
    {
        return $this->conn->getProductById($productId);
    }

    // Method untuk membuat produk baru
    public function createProduct($tableName, $columns, $data)
    {
        return $this->conn->create($tableName, $columns, $data);
    }


    // Method untuk mengupdate produk
    public function updateProduct($productId, $tableName, $columns, $data)
    {
        return $this->conn->update($productId, $tableName, $columns, $data);
    }

    // Method untuk menghapus produk
    public function deleteProduct($productId, $tableName)
    {
        return $this->conn->delete($productId, $tableName);
    }

    // Method untuk menghapus produk secara permanen
    public function deletePermanent($productId)
    {
        return $this->conn->deletePermanent("products", $productId);
    }

    // Method untuk mengembalikan produk yang terhapus
    public function restoreProduct($productId)
    {
        return $this->conn->restore("products", $productId);
    }
}
