<?php

class Triangle
{
  private $base;
  private $height;

  public function setBase($base)
  {
    $this->base = $base;
  }

  public function setHeight($height)
  {
    $this->height = $height;
  }

  public function calculateArea()
  {
    // Rumus luas segitiga: 0.5 * base * height
    return 0.5 * $this->base * $this->height;
  }
}

class Square
{
  private $side;

  public function setSide($side)
  {
    $this->side = $side;
  }

  public function calculateArea()
  {
    // Rumus luas persegi: side * side
    return $this->side * $this->side;
  }
}

class Rectangle
{
  private $width;
  private $height;

  public function setWidth($width)
  {
    $this->width = $width;
  }

  public function setHeight($height)
  {
    $this->height = $height;
  }

  public function calculateArea()
  {
    // Rumus luas persegi panjang: width * height
    return $this->width * $this->height;
  }
}

class ShapeCollection
{
  private $shapes = [];

  public function addShape($shape)
  {
    $this->shapes[] = $shape;
  }

  public function calculateTotalArea()
  {
    $totalArea = 0;

    foreach ($this->shapes as $shape) {
      $totalArea += $shape->calculateArea();
    }

    return $totalArea;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // ambil nilai dari form

  $miringSegitiga = $_POST["miringSegitiga"];
  $tinggiSegitiga = $_POST["tinggiSegitiga"];
  $panjangPersegiPanjang = $_POST["panjangPersegiPanjang"];
  $lebarPersegiPanjang = $_POST["lebarPersegiPanjang"];
  $sisiPersegi = $_POST["sisiPersegi"];


  $triangle = new Triangle();
  $triangle->setBase($miringSegitiga);
  $triangle->setHeight($tinggiSegitiga);
  
  $square = new Square();
  $square->setSide($sisiPersegi);
  
  $rectangle = new Rectangle();
  $rectangle->setWidth($lebarPersegiPanjang);
  $rectangle->setHeight($panjangPersegiPanjang);
  
  $shapes = [$triangle, $square, $rectangle];
  
  $shapeCollection = new ShapeCollection();
  foreach ($shapes as $shape) {
    $shapeCollection->addShape($shape);
  }
  
  $totalArea = $shapeCollection->calculateTotalArea();

  // echo "miring segitga" . $miringSegitiga . "<br>";
  // echo "tinggi segitiga" . $tinggiSegitiga . "<br>";
  // echo "panjangPersegiPanjang" . $panjangPersegiPanjang . "<br>";
  // echo "lebarPersegiPanjang" . $lebarPersegiPanjang . "<br>";
  // echo "sisiPersegi" . $sisiPersegi . "<br>";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1 style="text-align: center;">Selamat Datang</h1>
  <h3 style="text-align: center;">Ini Adalah Program Untuk Menghitung Luas 3 Bangun Datar</h3>

  <form action="" method="POST">
    <div style="display: flex; gap:100px; align-items:center; flex-direction:column;">
      <div style="display: flex; gap:100px; justify-content:center;">
        <div>
          <h4>Segitiga</h4>
          <label for="segitiga">Miring</label>
          <input type="number" name="miringSegitiga">
          <br>
          <label for="segitiga">Tinggi</label>
          <input type="tinggiSegitiga" name="tinggiSegitiga">
        </div>
        <div>
          <h4>Persegi Panjang</h4>
          <label for="segitiga">Panjang</label>
          <input type="number" name="panjangPersegiPanjang">
          <br>
          <label for="segitiga">Lebar</label>
          <input type="lebarPersegiPanjang" name="lebarPersegiPanjang">
        </div>
        <div>
          <h4>Persegi</h4>
          <label for="segitiga">Sisi</label>
          <input type="number" name="sisiPersegi">
        </div>
      </div>
      <div>
        <button type="submit">Submit</button>

      </div>
    </div>
  </form>

  <div>
    <?php
    if(isset($totalArea)){
      echo "total Luas: $totalArea";
    }else{
      echo "Masukan Data Terlebih Dahulu";
    }
    ?>
  </div>
</body>

</html>