<?php

include '../controller/controllerClass.php'; 

$productController = new ProductController();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $productId = $_GET['id'];
    $productController->deleteProduct($productId);
    header("Location: ../index.php");
    exit();
} else {
    echo "Invalid request";
}

?>
