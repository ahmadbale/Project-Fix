<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "db_survey";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "SELECT * FROM m_kategori";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Kategori ID</th><th>Nama Kategori</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["kategori_id"] . "</td>";
        echo "<td>" . $row["kategori_nama"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data kategori ditemukan.";
}

mysqli_close($conn);

?>
