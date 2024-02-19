<?php
include '../controller/controllerClass.php'; 
$productController = new ProductController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['delete_multiple_product'])) {
      $productIds = $_POST['product_id']; 
      
      $productController->multipleDelete($productIds);
      header('Location: ../index.php');
      exit();
  }
}
?>
