<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "prakwebdb";

$conn = mysqli_connect($servername, $username, $password, $database);

$queryInsertData = "INSERT INTO user (id, username, password) VALUES
(1, 'admin', MD5('123'))";

if (mysqli_query($conn, $queryInsertData)) {
    echo "Data berhasil dimasukkan ke tabel user.";
} else {
    echo "Error: " . mysql_error($conn);
}
mysqli_close($conn);
?>