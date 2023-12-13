<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD SEDERHANA</title>
</head>
<body>

<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data dari formulir
    $nama_barang = $_POST['nama_barang'];
    $kode_barang = $_POST['kode_barang'];
    $harga = $_POST['harga'];

    // Query untuk menyimpan data ke tabel barang
    $query = "INSERT INTO barang (nama_barang, kode_barang, harga) VALUES ('$nama_barang', '$kode_barang', '$harga')";

    // Eksekusi query
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo '<script>window.alert("Data Berhasil Ditambah")
        window.location="indeks.php"
        </script>';
    } else {
        echo 'Error: ' . mysqli_error($koneksi);
    }
}
?>

    <h2>CRUD</h2>
     <p><a href="indeks.php">Kembali</a></p>

     <h3>Tambah Data Barang</h3>

     <form action="" method="post">
        <table cellpadding="3" cellspacing="0">
            <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td><input type="text" name="nama_barang" required></td>
            </tr>
            <tr>
                <td>Kode Barang</td>
                <td>:</td>
                <td><input type="text" name="kode_barang" size="30" required></td>
            </tr>
            <tr>
                <td>Harga Barang</td>
                <td>:</td>
                <td><input type="text" name="harga" size="30" required></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td><input type="submit" name="tambah" value="simpan" required></td>
            </tr>
        </table>
     </form>
</body>
</html>