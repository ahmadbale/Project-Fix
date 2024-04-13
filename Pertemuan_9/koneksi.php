<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "prakwebdb";

$conn = mysqli_connect($servername, $username, $password, $database);

$query =  "CREATE TABLE user(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL)";

if (mysqli_query($conn, $query)) {
    echo "Tabel user berhasil dibuat.";
} else {
    echo "Error: " . mysql_error($conn);
}

mysqli_close($conn);
?>