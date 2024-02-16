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
  include('../Config/db.php');
  $db = new DBClass();
  $conn = $db->getConnection();
  $id = $_GET['id'];
  try {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($products) > 0) {
      foreach ($products as $row) {
  ?>
        <table>
          <tr>
            <td>ID:</td>
            <td><?php echo $row["id"]; ?></td>
          </tr>
          <tr>
            <td>Product Name:</td>
            <td><?php echo $row["product_name"]; ?></td>
          </tr>
          <tr>
            <td>Price:</td>
            <td>$<?php echo $row["price"]; ?></td>
          </tr>
          <tr>
            <td>Quantity:</td>
            <td><?php echo $row["quantity"]; ?></td>
          </tr>
        </table>
  <?php
      }
    } else {
      echo "<p>0 Result</p>";
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
  ?>

</body>

</html>
