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


    public function getProductById($productId)
    {
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

    // Method untuk membuat data baru
    public function create($tableName, $columns, $data)
    {
        try {

            $columnNames = implode(', ', $columns);

            $columnValues = ':' . implode(', :', array_keys($data));

            $sql = "INSERT INTO $tableName ($columnNames) VALUES ($columnValues)";
            $stmt = $this->conn->prepare($sql);

            foreach ($data as $key => $value) {
                $stmt->bindValue(":{$key}", $value);
            }

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    // Method untuk mengupdate data
    public function update($productId, $tableName, $columns, $data)
    {
        try {
            $setColumns = '';
            foreach ($columns as $key => $column) {
                $setColumns .= "$column=:$column, ";
            }
            
            $setColumns = rtrim($setColumns, ', ');
            $sql = "UPDATE $tableName SET $setColumns WHERE id = :productId";
            $stmt = $this->conn->prepare($sql);
            
            foreach ($columns as $key => $column) {
                $stmt->bindValue(":$column", $data[$column]);
            }
            $stmt->bindParam(":productId", $productId);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    // Method untuk menghapus data
    public function delete($productId, $tableName)
    {
        try {
            $deletedAt = date("Y-m-d H:i:s");
            $stmt = $this->conn->prepare("UPDATE $tableName SET deleted_at = :deleted_at WHERE id = :id");
            $stmt->bindParam(':id', $productId);
            $stmt->bindParam(':deleted_at', $deletedAt);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Method untuk menghapus data secara permanen
    public function deletePermanent($tableName, $id)
    {
        try {
            
            $stmt = $this->conn->prepare("DELETE FROM $tableName WHERE id = :id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Method untuk mengembalikan data yang terhapus
    public function restore($tableName, $id)
    {
        try {
            
            $stmt = $this->conn->prepare("UPDATE $tableName SET deleted_at = NULL WHERE id = :id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
