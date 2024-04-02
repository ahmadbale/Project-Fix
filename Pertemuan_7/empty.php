<?php
$myArray = array(); //array kosong
if (empty($myArray)){
    echo"Array tidak terdefinisi atau kosong.";
} else {
    echo "Array terdifinisi dan tidak kosong.";
}
echo "<br>";
if (empty($nonExistentVar)){
    echo"Variabel tidak terdefinisi atau kosong.";
} else {
    echo "Variabel terdifinisi dan tidak kosong.";
}
?>