<?php
if (isset($_POST["submit"])){
 $targetDirectory = "documents/";
 $targetFile = $targetDirectory. basename($_FILES["documentToUpload"]["name"]);
 $documentFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

 $allowedExtensions = array("txt", "pdf", "doc", "docx");

 $maxFileSize = 10 * 1024 * 1024; 
//  function createThumbnail($src, $dest, $width, $height) {
//     $sourceImage = imagecreatefromstring(file_get_contents($src));
//     $thumbnail = imagecreatetruecolor($width, $height);
//     $imageInfo = getimagesize($src);
//     $srcWidth = $imageInfo[0];
//     $srcHeight = $imageInfo[1];
//     imagecopyresampled($thumbnail, $sourceImage, 0, 0, 0, 0, $width, $height, $srcWidth, $srcHeight);
//     imagejpeg($thumbnail, $dest);
//     imagedestroy($thumbnail);
//     imagedestroy($sourceImage);
// }

if (in_array($documentFileType, $allowedExtensions) && $_FILES["documentToUpload"]["size"] <= $maxFileSize){
if (move_uploaded_file($_FILES["documentToUpload"]["tmp_name"],$targetFile)){
    echo "Dokumen berhasil diunggah.";

    // $thumbnailPath = $targetDirectory . "thumbnail_" . basename($_FILES["fileToUpload"]["name"]);
    // createThumbnail($targetFile, $thumbnailPath, 200, 200); // Menggunakan fungsi createThumbnail

    // echo "<br>Thumbnail berhasil dibuat: <img src='$thumbnailPath'>";

} else {
    echo "Gagal mengunggah dokumen.";
}
} else {
    echo "Jenis dokumen tidak valid atau melebihi ukuran maksimum yang diizinkan";
}
}