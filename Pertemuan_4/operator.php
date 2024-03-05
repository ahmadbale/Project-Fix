<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Hasil Tambah: {$hasilTambah} <br>";
echo "Hasil Kurang: {$hasilKurang} <br>";
echo "Hasil Kali: {$hasilKali} <br>";
echo "Hasil Bagi: {$hasilBagi} <br>";
echo "Sisa Bagi: {$sisaBagi} <br>";
echo "Pangkat: {$pangkat} <br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;
echo "<br>";
echo "<br>";
echo "Hasil Sama: {$hasilSama} <br>";
echo "Hasil Tidak Sama: {$hasilTidakSama} <br>";
echo "Hasil Lebih Kecil: {$hasilLebihKecil} <br>";
echo "Hasil Lebih Besar: {$hasilLebihBesar} <br>";
echo "Hasil Lebih Kecil Sama: {$hasilLebihKecilSama} <br>";
echo "Hasil Lebih Besar Sama: {$hasilLebihBesarSama} <br>";

echo "<br>";
echo "<br>";
$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;
echo "Hasil AND : {$hasilAnd} <br>";
echo "Hasil OR : {$hasilOr} <br>";
echo "Hasil NOT A : {$hasilNotA} <br>";
echo "Hasil NOT B : {$hasilNotB} <br>";

echo "<br>";
echo "<br>";
$HasiltambahSama = $a += $b;
$HasilkurangSama = $a -= $b;
$HasilkaliSama = $a *= $b;
$HasilbagiSama = $a /= $b;
$HasilsisabagiSama = $a %= $b;
echo "Hasil Tambah Sama : {$HasiltambahSama} <br>";
echo "Hasil Kurang Sama : {$HasilkurangSama} <br>";
echo "Hasil Kali Sama : {$HasilkaliSama} <br>";
echo "Hasil Bagi Sama : {$HasilbagiSama} <br>";
echo "Hasil Sisa Bagi Sama : {$HasilsisabagiSama} <br>";

echo "<br>";
echo "<br>";
$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;
echo "Hasil Identik : {$hasilIdentik} <br>";
echo "Hasil Tidak Identik : {$hasilTidakIdentik} <br>";
echo "<br>";
echo "<br>";
$c = 45;
$d = 28;
$kursiTidakTerpakai = $c - $d;
$persenKursiKosong= $kursiTidakTerpakai *   100 / $c  ;
echo("Jumlah kursi awal :  $c <br>");
echo("Jumlah kursi terpakai :  $d <br>");
echo("Jumlah kursi tidak terpakai :  $kursiTidakTerpakai <br>");
echo("Jumlah kursi yang masih kosong :  $persenKursiKosong % <br>");
?>