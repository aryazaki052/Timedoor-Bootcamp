<?php
include '../controller/controllerClass.php'; 
$productController = new ProductController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_multiple_product'])) {
        $productIds = $_POST['product_ids'];
        $productController->deletePermanent($productIds);
        header('Location: trash.php');
        exit();
    } elseif (isset($_POST['restore_product'])) {
        $productIds = $_POST['product_ids'];
        $productController->restoreProducts($productIds);
        header('Location: ../index.php');
        exit();
    }
}
?>