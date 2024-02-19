<?php
require_once("../config/DB.php");
require_once("../model/Product.php");

class ProductController {
    private $productModel;

    public function __construct() {
        $data = array();
        $this->productModel = new Product($data);
    }


    public function getProductById($productId)
    {
        return $this->productModel->getProductById($productId);
    }


    public function createProduct($data)
    {
        return $this->productModel->createProduct($data);
    }
    

    public function updateProduct($productId, $data) {
        return $this->productModel->updateProduct($productId, $data);
    }

    public function deleteProduct($productId) {
        return $this->productModel->deleteProduct($productId);
  }


  public function multipleDelete($productId) {
    try {
        foreach ($productId as $productIds) {
            if (!$this->productModel->deleteProduct($productIds)) {
                echo "Failed to delete product with ID: " . $productId . "<br>";
            }
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}


  public function deletePermanent($productIds) {
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

public function restoreProducts($productIds) {
  try {
      foreach ($productIds as $productId) {
          if (!$this->productModel->restore($productId)) {
              echo "Failed to restore product with ID: " . $productId . "<br>";
          }
      }
      header('Location: ../index.php');
      exit(); 
  } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
  }
}
}


?>
