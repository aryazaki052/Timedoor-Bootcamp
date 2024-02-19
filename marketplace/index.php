<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Produk</title>

  <?php
  include('Config/db.php');

  $db = new DBClass();
  $conn = $db->getConnection();

  
  $sql = "SELECT * FROM products WHERE deleted_at IS NULL";
  $products = [];

  try {
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $products[] = $row;
      }
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

  $conn = null;
  ?>
</head>

<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th,
  td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  th {
    background-color: #f2f2f2;
  }
</style>

<body>

  <h1>List Produk</h1>
  <a href="view/create.php">Add Product</a>
  <a href="view/trash.php">Trash</a>

  <br><br>


  <form action="view/multipledelete.php" method="post">
    <table>
      <thead>
        <tr>
        <th>Select</th>
        <th>No</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if (count($products) > 0) : ?>
          <?php $counter = 1 ?>
          <?php foreach ($products as $product) : ?>
            <tr>
              <td>
                <input type="checkbox" name="product_id[]" value="<?php echo $product["id"] ?>">
              </td>
              <td><?php echo $counter ?></td>
              <td><?php echo $product["product_name"] ?></td>
              <td><?php echo $product["price"] ?></td>
              <td><?php echo $product["quantity"] ?></td>
              <td><?php echo $product["price"] * $product["quantity"] ?></td>
              <td>
              <a href="view/detail.php?id=<?php echo $product["id"] ?>">View</a> |
              <a href="view/update.php?id=<?php echo $product["id"] ?>">Update</a> |
              <a href="view/delete.php?id=<?php echo $product["id"] ?>">Delete</a>
            </td>
            </tr>
            <?php $counter++ ?>
          <?php endforeach ?>
        <?php else : ?>
          <tr>
            <td colspan="5">No deleted products</td>
          </tr>
        <?php endif ?>
      </tbody>
    </table>
    <button type="submit" name="delete_multiple_product">Move To Trash</button>
  </form>

 
</body>

</html>