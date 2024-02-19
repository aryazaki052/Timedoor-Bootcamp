<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
</head>

<body>

    <h2>Product Detail</h2>
    <a href="../index.php">Back To Product List</a>

    <br><br>

    <?php
    require_once('../controller/controllerClass.php');

    $productController = new ProductController();

    if (isset($_GET['id'])) {
        $productId = $_GET['id'];
        $product = $productController->getProductById($productId);

        if ($product) {
    ?>
            <table>
                <tr>
                    <td>ID:</td>
                    <td><?php echo $product["id"]; ?></td>
                </tr>
                <tr>
                    <td>Product Name:</td>
                    <td><?php echo $product["product_name"]; ?></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>$<?php echo $product["price"]; ?></td>
                </tr>
                <tr>
                    <td>Quantity:</td>
                    <td><?php echo $product["quantity"]; ?></td>
                </tr>
            </table>
    <?php
        } else {
            echo "<p>Product not found</p>";
        }
    } else {
        echo "<p>ID parameter is missing</p>";
    }
    ?>

</body>

</html>
