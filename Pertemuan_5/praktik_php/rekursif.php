<?php
// function tampilkanHaloDunia(){
//     echo"Halo Dunia! <br>";

//     tampilkanHaloDunia();
// }
// tampilkanHaloDunia();
// for ($i=1;$i <=25; $i++){
//     echo "Perulangan ke-{$i} <br>";
// }
// function tampilkanAngka(int $jumlah, int $indeks = 1) {
//     echo "Perulangan ke-{$indeks} <br>";

//     if($indeks < $jumlah){
//         tampilkanAngka($jumlah, $indeks +1);
//     }
// }
// tampilkanAngka(20);
$menu = [
    [
        "nama" => "Beranda"
    ],
    [
        "nama" => "Berita",
        "subMenu" => [
        [
            "nama" => "Wisata",
            "subMenu" => [
            [
                "nama" => "Pantai"
            ],
        [
            "nama" => "Gunung"
            ]
        ]
    ],
    [
        "nama" => "Kuliner"
    ], 
    [
        "nama" => "Hiburan"
    ]
    ]
],
    [
     "nama" => "Tentang"   
    ],
    [
        "nama" => "Kontak"
    ],
];

function tampilkanMenuBertingkat(array $menu){
    echo "<ul>";
    foreach ($menu as $key => $item){
        echo "<li>{$item['nama']}</li>";
        if(isset($item['subMenu'])){
            tampilkanMenuBertingkat($item['subMenu']);
    }
    echo "</li>";
    }
    echo "</ul>";
}
tampilkanMenuBertingkat($menu);
?>