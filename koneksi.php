<?php
$host = "localhost";
$user = "root";
$pass = "";
$name = "crud_nativ";

$koneksi = mysqli_connect($host, $user, $pass) or die("koneksi ke database gagal");
mysqli_select_db($koneksi, $name) or die("Tidak ada database yang dipilih");


?>