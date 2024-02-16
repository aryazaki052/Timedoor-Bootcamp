<?php

require_once("../config/DB.php");
$db = new DBClass();

class Product {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($productName, $price, $quantity) {
      try {
          $stmt = $this->conn->prepare("INSERT INTO products(product_name, price, quantity) VALUES (:product_name, :price, :quantity)");
          $stmt->bindParam(':product_name', $productName);
          $stmt->bindParam(':price', $price);
          $stmt->bindParam(':quantity', $quantity);
          $stmt->execute();
          return true; 
      } catch (PDOException $e) {
          throw new Exception("Error creating product: " . $e->getMessage());
      }
  }
      

    public function update($productId, $productName, $price, $quantity) {
        try {
            $stmt = $this->conn->prepare("UPDATE products SET product_name = :product_name, price = :price, quantity = :quantity WHERE id = :id");
            $stmt->bindParam(':id', $productId);
            $stmt->bindParam(':product_name', $productName);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':quantity', $quantity);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function delete($productId) {
      try {
          $deletedAt = date("Y-m-d H:i:s");
          $stmt = $this->conn->prepare("UPDATE products SET deleted_at = :deleted_at WHERE id = :id");
          $stmt->bindParam(':id', $productId);
          $stmt->bindParam(':deleted_at', $deletedAt);
          return $stmt->execute();
      } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
          return false;
      }
  }

  public function deletePermanent($productId) {
    try {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE id = :id");
        $stmt->bindParam(':id', $productId);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

public function restore($productId) {
  try {
      $stmt = $this->conn->prepare("UPDATE products SET deleted_at = NULL WHERE id = :id");
      $stmt->bindParam(':id', $productId);
      return $stmt->execute();
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return false;
  }
}

}
?>
