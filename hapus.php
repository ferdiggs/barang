<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data dari tabel barang
    $query = "DELETE FROM barang WHERE id=$id";

    // Eksekusi query
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo '<script>window.alert("Data Berhasil Dihapus")
        window.location="indeks.php"
        </script>';
    } else {
        echo 'Error: ' . mysqli_error($koneksi);
    }
} else {
    echo 'ID tidak diberikan.';
}
?>
