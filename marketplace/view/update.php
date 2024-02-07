<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Product</title>
</head>
<body>
  <h2>Create Product</h2>
  <a href="../index.php"></a>

  <br><br>

  <form action="../controller/create.php" method="post">
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