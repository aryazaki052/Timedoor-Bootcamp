<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Product</title>
</head>

<body>

  <div>
    <?php
    require_once("../controller/controllerClass.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $productController = new ProductController();
      $data = array(
          'product_name' => $_POST['product_name'],
          'price' => $_POST['price'],
          'quantity' => $_POST['quantity'],
        );
        // var_dump($data);
      if ($productController->createProduct($data)) {
          echo "Product added successfully.";
          header("Location: ../index.php");
          exit();
      } else {
          echo "Failed to add product.";
      }
  }
    ?>
  </div>
  <h2>Create Product</h2>
  <a href="../index.php"></a>

  <br><br>

  <form action="" method="post">
    <label for="productname">Product Name</label>
    <input type="text" name="product_name" required> <br>
    <label for="price">Price</label>
    <input type="number" name="price" required><br>
    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" id=""> <br>
    <input type="submit" value="Add Product">
  </form>
</body>

</html>