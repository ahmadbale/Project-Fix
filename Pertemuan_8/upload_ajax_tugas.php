<?php
if (isset($_FILES['files'])) {
$errors = array();
$targetDirectory = "uploads/";
$totalFiles = count($_FILES['files']['name']);
for ($i =0; $i < $totalFiles; $i++) {
$file_name = $_FILES['files']['name'][$i];
$file_size = $_FILES['files']['size'][$i];
$file_tmp = $_FILES['files']['tmp_name'][$i];
$file_type = $_FILES['files']['type'][$i];
@$file_ext = strtolower("" . end(explode('.', $file_name)). "");
$extensions = array("jpg", "jpeg", "png", "gif");

if (in_array($file_ext, $extensions)=== false){
    $errors[]= "Ekstensi file yang diizinkan adalah JPG, JPEG, PNG, atau GIF.";
}

if ($file_size > 6144000){
    $errors[] = 'Ukuran file tidak bole lebih dari 6 MB';
}

if (empty($errors)===true){
    $uploadFile = $targetDirectory . $file_name;
    move_uploaded_file($file_tmp, $uploadFile);
    echo "File $file_name berhasil diunggah.";
} else {
    echo implode ("<br>", $errors);
}
}
}