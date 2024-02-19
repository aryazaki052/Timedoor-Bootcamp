<?php
class DBClass
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "marketplace";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function getProductById($productId) {
        try {
            $sql = "SELECT * FROM products WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $productId);
            $stmt->execute();
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $product;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    
    // Function to bind parameters
    private function bindParams($stmt, $params)
    {
        foreach ($params as $key => &$value) {
            $stmt->bindParam($key, $value);
        }
    }

    public function create($product_name, $price, $quantity)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO products(product_name, price, quantity) VALUES (:product_name, :price, :quantity)");

            $params = array(
                ':product_name' => $product_name,
                ':price' => $price,
                ':quantity' => $quantity,
            );

            $this->bindParams($stmt, $params);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    
    public function update($id, $data)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE products SET product_name = :product_name, price = :price, quantity = :quantity WHERE id = :id");
    
            $params = array(
                ':id' => $id,
                ':product_name' => $data['product_name'],
                ':price' => $data['price'],
                ':quantity' => $data['quantity'],
            );
    
            $this->bindParams($stmt, $params);
    
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function delete($productId)
    {
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

    public function deletePermanent($productId){
        try {
            $stmt = $this->conn->prepare("DELETE FROM products WHERE id = :id");
            $stmt->bindParam(':id', $productId);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function restore($productId){
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
