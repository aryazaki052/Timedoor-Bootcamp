<?php
include("../config/DB.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $productName = $_POST['product_name'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];

  try {
    $stmt = $conn->prepare("insert into products(product_name, price, quantity) VALUES (:product_name, :price, :quantity)");
    $stmt->bindParam(':product_name', $productName);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->execute();
    header('location:../index.php');
  } catch (PDOException $e) {
    echo "erorr" . $e->getMessage();
  }
}
$conn = null;
?>