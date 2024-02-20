<?php
class Product
{
    private $conn;
    private $tableName = "products";

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
    public function createProduct($data)
    {
        
        $columns = ['product_name', 'price', 'quantity'];
        return $this->conn->create($this->tableName, $columns, $data);
    }


    // Method untuk mengupdate produk
    public function updateProduct($productId, $data)
    {
        
        $columns = ['product_name', 'price', 'quantity'];

        return $this->conn->update($productId, $this->tableName, $columns, $data);
    }

    // Method untuk menghapus produk
    public function deleteProduct($productId)
    {
        
        return $this->conn->delete($productId, $this->tableName);
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
