<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "db_siswa";

// Membuat koneksi
$koneksi = new mysqli($host, $user, $pass, $dbname, 3306);

// Mengecek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>