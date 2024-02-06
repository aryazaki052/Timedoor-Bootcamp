<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MarketPlace</title>
</head>
<body>
  
  <form action="process_product.php" method="POST">
    <div>
      <label for="product_name">Nama Produk</label>
      <input type="text" id="product_name" name="product_name" required>
    </div>
    <div>
      <label for="price">Harga</label>
      <input type="number" id="price" name="price" required>
    </div>
    <div>
      <label for="quantity">Stock</label>
      <input type="number" id="quantity" name="quantity" required>
    </div>
    <input type="submit" value="Tambah Produk">
    <!-- <button type="submit" value="Tambah Produk">Simpan</button> -->
  </form>
</body>
</html>