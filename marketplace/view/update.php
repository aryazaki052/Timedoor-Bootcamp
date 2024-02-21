<?php
require_once("../controller/controllerClass.php");

$productController = new ProductController();

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    $product = $productController->getProductById($productId);

    if ($product) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = array(
                'product_name' => $_POST['product_name'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity'],
                'description' => $_POST['description']
            );

            $productController->updateProduct($productId, $data);
            header('Location: ../index.php');
            exit();
        }
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update Product</title>
        </head>

        <body>

            <h2>Update Product</h2>
            <a href="../index.php">Back to Product List</a>

            <br><br>

            <form action="" method="post">
                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                <label for="productname">Product Name</label>

                <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>" required> <br>
                <label for="price">Price</label>

                <input type="number" name="price" value="<?php echo $product['price']; ?>" required><br>
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" required> <br>

                <label for="description">Description</label>
                <textarea name="description" id="description" cols="20" rows="5"><?php echo $product['description']; ?></textarea> <br>

                <input type="submit" value="Update Product">
            </form>
        </body>

        </html>
<?php
    } else {
        echo "Product not found.";
    }
} else {
    echo "ID parameter is missing.";
}
?>
