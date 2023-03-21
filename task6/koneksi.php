<?php

// Konfigurasi database
$host = "localhost";
$username = "root";
$password = "";
$database = "siswa";

// Membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

// Memeriksa apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
