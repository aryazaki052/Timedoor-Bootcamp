<?php
// class Produk{
//   protected $nama;
//   protected $harga;

//   public function __construct($nama, $harga){
//     $this -> nama = $nama;
//     $this -> harga = $harga;
//   }
//   public function hitungHarga(){
//     return $this -> harga;
//   }
// }

// class produkDigital extends Produk{
//   public function hitungHarga()
//   {
//     return $this->harga *0.8;
//   }
// }

// class produkFisik extends Produk{
//   public function hitungHarga()
//   {
//     return $this->harga+10;
//   }
// }

// function hitungTotalHarga($produkArray){
// $totalHarga = 0;

// foreach ($produkArray as $produk) {
//   $totalHarga += $produk -> hitungHarga();
// }
// return $totalHarga;
// }

// $produkDigital = new produkDigital("E-Book", 100);
// $produkFisik = new produkFisik("BUku Fisik", 50);

// $produkArray = [$produkDigital, $produkFisik];

// $totalHarga = hitungTotalHarga($produkArray);

// echo "Total Harga: $totalHarga";

// buat hirearki class employee dengan dua subclass, yaitu manager dan developer. setiap subclass harus memiliki properti unik dan method work yang memberikan pesan tugas yang berbeda

class Employe{

protected $nama;
protected $jabatan;

public function __construct($nama, $jabatan) {
  $this->nama = $nama;
  $this->jabatan = $jabatan;
}

public function getNama() {
  return $this->nama;
}

public function getJabatan() {
  return $this->jabatan;
}

public function work() {
  return "Halo Saya Adalah Karyawan di Perusahaan Ini.";
}
}

class Manager extends Employe {

  private $department;

  public function setDepartment($department) {
      $this->department = $department;
  }

  public function getDepartment() {
      return $this->department;
  }

  public function work() {
      return "Saya adalah seorang manajer. <br> Tugas saya adalah mengawasi dan mengelola departemen {$this->department}.";
  }
}

class Developer extends Employe {

  private $programmingLanguage;

  public function setProgrammingLanguage($programmingLanguage) {
      $this->programmingLanguage = $programmingLanguage;
  } 

  public function getProgrammingLanguage() {
      return $this->programmingLanguage;
  }

  public function work() {
      return "Saya adalah seorang pengembang. <br> Tugas saya adalah membuat kode menggunakan {$this->programmingLanguage}.";
  }
}


// Contoh penggunaan

$manager = new Manager("Pratama", "Informasi Teknologi");
$manager->setDepartment("Informasi Teknologi");
echo $manager->getNama() . " adalah seorang Manager di " . $manager->getJabatan() . " di departemen " . $manager->getDepartment() . ". " . $manager->work() . "<br>";

echo "<br>";

$developer = new Developer("Arya Zaki", "PHP Developer");
$developer->setProgrammingLanguage("PHP");
echo $developer->getNama() . " adalah seorang " . $developer->getJabatan() . ". " . $developer->work() . "<br>";