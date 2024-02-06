<?php
$nilai = [11, 21, 30, 40, 50, 60, 70, 83, 95, 100];
$index = 0;

echo count($nilai);

echo "<br>";

// strlen
$text = "Halo Saya Sedang Belajar Programing";
echo $text;
echo "<br>";
echo "Tulisan diatas memiliki panjang" . "  " . strlen($text);
echo "<br>";

// date
date_default_timezone_set('Asia/Makassar');
// echo date_default_timezone_get() . ' => ' . date('e') . ' => ' . date('T');
echo date("d-M-Y") . "<br>";

// implode
echo implode(" - ", $nilai) . "<br>"; 

// explode
$explode = explode(" ", $text);

var_dump($explode);

?>