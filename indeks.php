<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD SEDERHANA</title>
</head>
<body>
    <h2>CRUD</h2>

    <p><a href="tambah.php">Tambah Data</a></p>

    <h3>Data Barang</h3>

    <table cellpadding="5" cellspacing="0" border="1">
        <tr bgcolor="#CCCCCC">
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Harga Barang</th>
            <th>Stok</th>
            <th>Opsi</th>
        </tr>

        <?php
        //koneksi dengan database
        include('koneksi.php');
        //membuat query ke database memilih tabel barang diurutkan berdasarkan id
        $query = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id ASC") or die(mysqli_error($koneksi));

        if(mysqli_num_rows($query) == 0){
            echo '<tr><td colspan="6">Tidak ada data</td></tr>';
        } else {
            $no = 1;
            while($data = mysqli_fetch_assoc($query)){
                echo '<tr>';
                    echo '<td>'.$no.'</td>';
                    echo '<td>'.$data['nama_barang'].'</td>';
                    echo '<td>'.$data['kode_barang'].'</td>';
                    echo '<td>'.$data['harga'].'</td>';
                    echo '<td>'.$data['stok'].'</td>';
                    echo '<td><a href="edit-data.php?id='.$data['id'].'">Edit</a> / <a href="hapus.php?id='.$data['id'].'" onclick="return confirm(\'yakin?\')">Hapus</a></td>';
                echo '</tr>';

                $no++;
            }
        }
        ?>
    
    </table>
</body>
</html>
