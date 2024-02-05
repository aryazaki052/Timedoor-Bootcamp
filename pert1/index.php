<?php

// $voucher = 'HAPPYNEWYEAR2024';

// switch ($voucher) {
//     case 'FLASHSALE':
//         echo 'Promo flash sale diterapkan';
//         break;

//     case 'HAPPYNEWYEAR2024':
//         echo 'Promo tahun baru diterapkan';
//         break;
    
//     case 'RAMADHAN23':
//         echo 'Promo hari raya ramadhan diterapkan';
//         break;
    
//     default:
//         echo 'Promo tidak di temukan';
//         break;
// }

// $nilai = [11, 21, 30, 40, 50, 60, 70, 83, 95, 100];
// $index = 0;

// while ($index < count($nilai)) {
//     if ($nilai[$index] % 2 == 0) {
//         echo "{$nilai[$index]}  ini adalah bilangan genap" . "<br>";
//     } else {
//         echo "{$nilai[$index]}  ini adalah bilangan ganjil" . "<br>";
//     }

//     $index++;
// }

// for ($i=0; $i<10; $i++){
//     if ($nilai[$i] % 2 == 0){
//         echo "{$nilai[$i]} nilai genap <br>";
//     }else{
//         echo "{$nilai[$i]} nilai ganjil <br>" ;
//     }
// }


// $productDetails = [
// "Product A" => ["price" => 20, "stock" => 50],
// "Product B" => ["price" => 30, "stock" => 30],
// "Product C" => ["price" => 25, "stock" => 40]
// ];

// foreach ($productDetails as $productName => $details) {
// echo "Product: $productName, Price: {$details['price']}, Stock: {$details['stock']} <br>";
// }

$nim = [
 [ 'nim'=> 220010001,
  'nama'=> "hoki bangsawan",
  'alamat' => "sibang",
  'email' => "hoki@gmail.com"
],
 [ 'nim'=> 220010001,
  'nama'=> "zaki",
  'alamat' => "sibang",
  'email' => "hoki@gmail.com"
],
 [ 'nim'=> 220010001,
  'nama'=> "adit",
  'alamat' => "sibang",
  'email' => "hoki@gmail.com"
],
 [ 'nim'=> 220010001,
  'nama'=> "rinus",
  'alamat' => "sibang",
  'email' => "hoki@gmail.com"
],
 [ 'nim'=> 220010001,
  'nama'=> "bryan",
  'alamat' => "sibang",
  'email' => "hoki@gmail.com"
]
];

// for ($i = 0; $i < count($nim); $i++) {
//   echo "NIM: " . $nim[$i]['nim'] . "<br>"; 
//   echo "Nama: " . $nim[$i]['nama'] . "<br>";
//   echo "Alamat: " . $nim[$i]['alamat'] . "<br>";
//   echo "Email: " . $nim[$i]['email'] . "<br><br>";
//   echo "<hr>";
// }

// foreach($nim as $data){
//   echo $data['nim'] ."<br>";
//   echo $data['nama'] ."<br>";
//   echo $data['alamat'] ."<br>";
//   echo $data['email'] ."<br>";
// }

// Array multi-dimensi untuk daftar produk


// tugas!!
// tampilkan maksimum berdasarkan price
// lalu compare total price berdasarkan stock dan berikan satu echo untuk produk apa yang paling mahal dan paling rendah
$storeInventory =[
    "Section A" =>[
    "Product X" =>["price" => 25, "stock" => 50],
    "Product Y" =>["price" => 35, "stock" => 20],
    "Product Z" =>["price" => 30, "stock" => 45]
    ],
    "Section B" =>[
    "Product W" =>["price" => 22, "stock" => 60],
    "Product V" =>["price" => 40, "stock" => 25],
    "Product U" =>["price" => 28, "stock" => 30]
    ]
    ];


    foreach ($storeInventory as $sectionName => $products) {
    echo "<strong>$sectionName:</strong><br>";
    foreach ($products as $productName => $details) {
    echo "Product: $productName, Price: {$details['price']}, Stock: {$details['stock']}
    <br>";
    }
    echo "<br>";
    }


?>
