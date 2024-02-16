<?php
require_once("../config/DB.php");
require_once("../model/Product.php");

class ProductController {
    private $productModel;

    public function __construct() {
        $db = new DBClass();
        $conn = $db->getConnection();
        $this->productModel = new Product($conn);
    }

    public function createProduct($productName, $price, $quantity) {
        try {
            if ($this->productModel->create($productName, $price, $quantity)) {
                header('Location: ../index.php');
                exit(); 
            } else {
                echo "Failed to create product.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateProduct($productId, $productName, $price, $quantity) {
        try {
            if ($this->productModel->update($productId, $productName, $price, $quantity)) {
                header('Location: ../index.php');
                exit(); 
            } else {
                echo "Failed to update product.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteProduct($productId) {
      try {
          if ($this->productModel->delete($productId)) {
              header('Location: ../index.php');
              exit(); 
          } else {
              echo "Failed to delete product.";
          }
      } catch (Exception $e) {
          echo "Error: " . $e->getMessage();
      }
  }

  public function multipleDelete($productId) {
    try {
        foreach ($productId as $productIds) {
            if (!$this->productModel->delete($productIds)) {
                echo "Failed to delete product with ID: " . $productId . "<br>";
            }
        }
        header('Location: ../index.php');
        exit(); 
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
        header('Location: ../view/trash.php');
        exit(); 
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
