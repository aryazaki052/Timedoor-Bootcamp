<?php


include '../controller/controllerClass.php'; 


$product = new ProductController();


if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $productId = $_GET['id'];
  $product->deleteProduct($productId);
}

?>