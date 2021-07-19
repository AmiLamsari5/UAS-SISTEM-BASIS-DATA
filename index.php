<?php include('config.php');?>
<DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sistem Penjualan</title>
    </head>
    <?php include('header.php');?>
          <ul>
          <table class="table" >
                <thead>
                    <tr>
                        <th><center>ID Produk</center></th>
                        <th><center>Nama produk</center></th>
                        <th><center>Harga Produk</center></th>
                        <th><center>Stok Produk</center></th>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <?php
                include 'config.php';
                $sql = 'SELECT * FROM  produk';
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query))
                {
                    ?>
                <tbody>
                    <tr>
                        <td><center><?php echo $row['id_prd']?></center></td>
                        <td><?php echo $row['nama_prd']?></td>
                        <td><center><?php echo $row['harga_prd']?></center></td>
                        <td><center><?php echo $row['stok_prd']?></center></td>
                        <td>
                            <a class="btn btn-success" onclick="return confirm('Data akan diubah?');" href="edit_produk.php?id=<?= $row['id_prd']; ?>">UBAH</a>
                            <a class="btn btn-danger" onclick="return confirm('Data akan dihapus?');" href="delete.php?id=<?= $row['id_prd']; ?>"> HAPUS</a>
                        </td>
                    </tr>
                </tbody>
                <?php 
                }
                ?>
            </table>
            <br>
            <table  class="table" >
                <thead>
                    <tr>
                        <th><center>ID Pembeli</center></th>
                        <th><center>Nama pembeli</center></th>
                        <th><center>No Telepon</center></th>
                        <th><center>Alamat</center></th>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <?php
                include 'config.php';
                $sql = 'SELECT * FROM  pembeli';
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query))
                {
                    ?>
                <tbody>
                    <tr>
                        <td><center><?php echo $row['id_pmb']?></center></td>
                        <td><?php echo $row['nama_pmb']?></td>
                        <td><center><?php echo $row['no_tlf']?></center></td>
                        <td><?php echo $row['alamat']?></td>
                        <td>
                            <a class="btn btn-success" onclick="return confirm('Data akan diubah?');" href="edit_pembeli.php?id=<?= $row['id_pmb']; ?>">UBAH</a>
                            <a class="btn btn-danger" onclick="return confirm('Data akan dihapus?');" href="delete.php?id=<?= $row['id_pmb']; ?>"> HAPUS</a>
                        </td>
                    </tr>
                </tbody>
                <?php 
                }
                ?>
            </table>
            <table  class="table" >
                <thead>
                    <tr>
                        <th><center>ID Transaksi</center></th>
                        <th><center>ID Produk</center></th>
                        <th><center>ID Pembeli</center></th>
                        <th><center>Jumlah Produk</center></th>
                        <th><center>Total harga</center></th>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <?php
                include 'config.php';
                $sql = 'SELECT * FROM  transaksi';
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query))
                {
                    ?>
                <tbody>
                    <tr>
                        <td><center><?php echo $row['id_trs']?></center></td>
                        <td><center><?php echo $row['id_prd']?></center></td>
                        <td><center><?php echo $row['id_pmb']?></center></td>
                        <td><center><?php echo $row['jml_prd']?></center></td>
                        <td><center><?php echo $row['total_harga']?></center></td>
                        <td>
                            <a class="btn btn-success" onclick="return confirm('Data akan diubah?');" href="edit_transaksi.php?id=<?= $row['id_trs']; ?>">UBAH</a>
                            <a class="btn btn-danger" onclick="return confirm('Data akan dihapus?');" href="delete.php?id=<?= $row['id_trs']; ?>"> HAPUS</a>
                        </td>
                    </tr>
                </tbody>
                <?php 
                }
                ?>
            </table>
            <br>
            <nav><a class="btn btn-info"  href="laporan.php">CETAK</a></nav>
            <br><br>
            <footer>
                <p>&copy; 2021 Sistem Basis Data, Teknik Informatika, Universitas Pelita Bangsa</p>
            </footer>
            <br>
        </ul>
</html>