<?php

// function perkenalan(){
//   echo "Assalamualaikum, ";  
//   echo "Perkenalkan, nama saya Iqbal<br/>";  
//   echo "Senang berkenalan dengan Anda<br/>";   
// }

// perkenalan();
// perkenalan();

// function perkenalan($nama, $salam="Assalamualaikum"){
//     echo $salam.", ";
//     echo "Perkenalkan, nama saya ".$nama."<br/>";
//     echo "Senang berkenalan dengan Anda<br/>";
// }

// perkenalan("Hamdana", "Hallo");

// echo "<hr>";

// $saya = "Elok";
// $ucapanSalam = "Selamat pagi";

// perkenalan($saya);
function hitungUmur($thn_lahir, $thn_sekarang){
    $umur = $thn_sekarang - $thn_lahir;
    return $umur;
}
function perkenalan($nama, $salam="Assalamualaikum"){
        echo $salam.", ";
        echo "Perkenalkan, nama saya ".$nama."<br/>";

        echo "Saya berusia ". hitungUmur(2003,2024) ." tahun<br/>";
        echo "Senang berkenalan dengan anda<br/>";
}

perkenalan("Iqbal");
?>