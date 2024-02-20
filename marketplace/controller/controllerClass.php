<?php
require_once("../config/DB.php");
require_once("../model/Product.php");

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $data = array();
        $this->productModel = new Product($data);
    }


    public function getProductById($productId)
    {
        return $this->productModel->getProductById($productId);
    }


    public function createProduct($data)
    {

        $tableName = "products";
        $columns = ['product_name', 'price', 'quantity'];

        return $this->productModel->createProduct($tableName, $columns, $data);
    }



    public function updateProduct($productId, $data)
    {
        $tableName = "products";
        $columns = ['product_name', 'price', 'quantity'];
        return $this->productModel->updateProduct($productId, $tableName, $columns, $data);
    }

    public function deleteProduct($productId)
    {
        $tableName = "products";
        return $this->productModel->deleteProduct($productId, $tableName);
    }


    public function multipleDelete($productId)
    {
        try {
            foreach ($productId as $productIds) {
                $tableName = "products";
                if (!$this->productModel->deleteProduct($productIds, $tableName)) {
                    echo "Failed to delete product with ID: " . $productId . "<br>";
                }
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function deletePermanent($productIds)
    {
        try {
            foreach ($productIds as $productId) {
                if (!$this->productModel->deletePermanent($productId)) {
                    echo "Failed to delete product with ID: " . $productId . "<br>";
                }
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function restoreProducts($productIds)
    {
        try {
            foreach ($productIds as $productId) {
                if (!$this->productModel->restoreProduct($productId)) {
                    echo "Failed to restore product with ID: " . $productId . "<br>";
                }
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
