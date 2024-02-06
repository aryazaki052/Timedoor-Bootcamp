<?php
if($_SERVER["REQUEST_METHOD"]== "POST"){
  // ambil nilai dari form

  $productname = $_POST["product_name"];
  $harga = $_POST["price"];
  $stock = $_POST["quantity"];
  
  
  
// tampilkan produk

echo "Nama Produk Adalah:" . $productname . "<br>";
echo "Harga Produk Adalah:" . $harga . "<br>";
echo "Jumlah Stock Barang Adalah: " . $stock . "<br>";

}else{
  echo "Produk Gagal Ditambahkan";
}

?>