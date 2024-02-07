<?php
include("../config/DB.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $id = $_GET['id'];
  $productName = $_POST['product_name'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];

  try {
    $stmt = $conn->prepare("UPDATE products SET product_name=:product_name, price=:price, quantity=:quantity WHERE id=:id");
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