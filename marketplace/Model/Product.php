<?php

require_once("../config/DB.php");
// $db = new DBClass();

class Product
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = new DBClass;
    }

    public function getProductById($productId)
    {
        return $this->conn->getProductById($productId);
    }

    public function createProduct($data)
    {
        return $this->conn->create($data['product_name'], $data['price'], $data['quantity']);
    }

    public function updateProduct($productId, $data)
    {
        return $this->conn->update($productId, $data);
    }

    public function deleteProduct($productId)
    {
        return $this->conn->delete($productId);
    }
    

    public function deletePermanent($productId)
    {
        return $this->conn->deletePermanent($productId);
    }

    public function restore($productId)
    {
        return $this->conn->restore($productId);


    }
}
