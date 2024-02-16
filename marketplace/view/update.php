<?php
require_once("../controller/controllerClass.php");
$productController = new ProductController();

$db = new DBClass();
$conn = $db->getConnection();


if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Query ke database untuk mendapatkan detail produk berdasarkan ID
    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $productId);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>

<body>

    <div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $productName = $_POST['product_name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];

            $productController->updateProduct($productId, $productName, $price, $quantity);
        }
        ?>
    </div>
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
