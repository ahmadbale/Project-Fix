<?php
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100){
    echo "Nilai huruf: A";
} elseif ($nilaiNumerik >= 80 && $nilaiNumerik < 90){
    echo "Nilai huruf: B";
} elseif ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
    echo "Nilai huruf: C";
} elseif ($nilaiNumerik < 70) {
    echo "Nilai huruf: D";
}
echo "<br>";
echo "<br>";
$jarakSaatIni = 0;
$jarakTarget= 500;
$peningkatanHarian = 30;
$hari = 0;

while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian;
    $hari++;
}
echo "Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 kilometer.";
echo "<br>";
echo "<br>";
$jumlahLahan = 10;
$tanamanPerLahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i=1; $i <= $jumlahLahan; $i++){
    $jumlahBuah += ($tanamanPerLahan * $buahPerTanaman);
}

echo "Jumlah buah yang akan dipanen adalah: $jumlahBuah";
echo "<br>";
echo "<br>";
$skorUjian = [85, 92, 78, 96, 88];
$totalSkor = 0;

foreach ($skorUjian as $skor) {
    $totalSkor += $skor;
}
echo "Total skor ujian adalah: $totalSkor";
echo "<br>";
echo "<br>";
$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

foreach ($nilaiSiswa as $nilai) {
    if($nilai < 60){
        echo "Nilai: $nilai (Tidak Lulus) <br>";
        continue;
    }
    echo "Nilai: $nilai (Lulus) <br>";
}

echo "<br>";
echo "<br>";
//soal 4.6
$nilai = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];
rsort($nilai);
$nilai_siswa = array_slice ($nilai, 2, -2);
$totalNilai = array_sum($nilai_siswa);
$rataNilai = $totalNilai / 6;
echo "Total Nilai: $totalNilai <br>";
echo("Rata - rata nilai: $rataNilai");
echo "<br>";
echo "<br>";
//soal no 4.7
$produk = 120000;
$hargaDiskon = $produk * 20 / 100;
$totalBayar = $produk - $hargaDiskon;
echo "Harga Awal: Rp. $produk <br>" ;
echo "Total Diskon: Rp. $hargaDiskon <br>";
echo "Total Bayar: Rp. $totalBayar "  ;
echo "<br>";
echo "<br>";
//soal no 4.8
$poin = 700;
echo "Total skor pemain adalah: " . $poin . "<br>";
$hadiah = $poin > 500 ? "YA" : "TIDAK";
echo "Apakah pemain mendapatkan hadiah tambahan? " . $hadiah;
?> 

