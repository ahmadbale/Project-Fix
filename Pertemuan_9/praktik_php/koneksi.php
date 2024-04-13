<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "prakwebdb";

$connect = mysqli_connect($servername, $username, $password, $database);
if(!$connect) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>