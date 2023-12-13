<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD SEDERHANA - Edit Data</title>
</head>
<body>

<?php
include('koneksi.php');

// Proses edit data jika formulir disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data dari formulir dan lakukan proses edit ke database
    $id = $_POST['id']; // Ambil ID data yang akan diubah
    $nama_barang = $_POST['nama_barang'];
    $kode_barang = $_POST['kode_barang'];
    $harga = $_POST['harga'];

    // Query untuk melakukan edit data
    $query_edit = "UPDATE barang SET nama_barang='$nama_barang', kode_barang='$kode_barang', harga='$harga' WHERE id=$id";
    
    // Eksekusi query edit
    $result_edit = mysqli_query($koneksi, $query_edit);

    if ($result_edit) {
        // Redirect ke halaman indeks setelah proses edit selesai
        header("Location: indeks.php");
        exit();
    } else {
        echo 'Error: ' . mysqli_error($koneksi);
    }
}

// Ambil data yang akan diedit dari database (misalnya dengan menggunakan $_GET['id'])
$id_to_edit = $_GET['id']; // Gantilah ini sesuai cara Anda mengambil ID
$query_get_data = "SELECT * FROM barang WHERE id=$id_to_edit";
$result_get_data = mysqli_query($koneksi, $query_get_data);

// Pastikan data ditemukan sebelum melanjutkan
if ($result_get_data && mysqli_num_rows($result_get_data) > 0) {
    $data = mysqli_fetch_assoc($result_get_data);
} else {
    // Handle jika data tidak ditemukan
    echo 'Data tidak ditemukan.';
    exit();
}
?>

    <h2>CRUD - Edit Data</h2>
    <p><a href="indeks.php">Kembali</a></p>

    <h3>Edit Data Barang</h3>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <table cellpadding="3" cellspacing="0">
            <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td><input type="text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" required></td>
            </tr>
            <tr>
                <td>Kode Barang</td>
                <td>:</td>
                <td><input type="text" name="kode_barang" size="30" value="<?php echo $data['kode_barang']; ?>" required></td>
            </tr>
            <tr>
                <td>Harga Barang</td>
                <td>:</td>
                <td><input type="text" name="harga" size="30" value="<?php echo $data['harga']; ?>" required></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td><input type="submit" name="edit" value="simpan" required></td>
            </tr>
        </table>
    </form>
</body>
</html>
