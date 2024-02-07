<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marketplace";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("koneksi gagal :" . $conn->connect_error);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // ambil nilai dari form

  $productname = $_POST["product_name"];
  $harga = $_POST["price"];
  $stock = $_POST["quantity"];

  mysqli_query($conn, "INSERT into products (product_name, price, quantity) values ('$productname', '$harga', $stock)");

  $qry = mysqli_query($conn, "SELECT * FROM products");
  while ($data = mysqli_fetch_assoc($qry)) {
    echo "Nama Produk Adalah:" . $data['product_name'] . "<br>";
    echo "Harga Produk Adalah:" . $data['price'] . "<br>";
    echo "Jumlah Stock Barang Adalah: " . $data['quantity'] . "<br> <br> <br>";

  }

  // tampilkan produk




} else {
  echo "Produk Gagal Ditambahkan";
}
