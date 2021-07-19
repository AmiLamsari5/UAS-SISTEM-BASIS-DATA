<?php include('config.php');?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sistem Penjualan</title>
        <link rel="stylesheet" href="style.css">
        <title><?= $title; ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <br>
    <body>
        <header>
            <h1><center>DATA TRANSAKSI</center></h1>
        </header>
        <ul>
            <nav>
                <a class="btn btn-info" href="index.php">KEMBALI</a>
            </nav>
            <br>
            <table  class="table" >
                <thead>
                    <tr>
                        <th><center>ID Transaksi</center></th>
                        <th><center>ID Produk</center></th>
                        <th><center>ID Pembeli</center></th>
                        <th><center>Jumlah Produk</center></th>
                        <th><center>Total Harga</center></th>
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
                            <a class="btn btn-danger" onclick="return confirm('Data akan dihapus?');" href="delete3.php?id=<?= $row['id_trs']; ?>"> HAPUS</a>
                        </td>
                    </tr>
                </tbody>
                <?php 
                }
                ?>
            </table>
        </ul>
    </body>
    <body>
        <header>
            <h1><center>PENAMBAHAN DATA TRANSAKSI</center></h1>
        </header>
        <ul>
        <div class="main">       
            <form action="" method="post" name="form1">
                <table border="0">
                    <tr>
                         <div class="input">
                            <b>ID Transaksi</b> <br> <input type="text" name="id_trs">
                        </div>
                    <tr> 
                        <div class="input">
                            <b>ID Produk</b> <br> <input type="text" name="id_prd">
                        </div>
                    </tr>
                        <div class="input">
                            <b>ID Pembeli</b> <br><input type="text" name="id_pmb">
                        </div>
                    </tr>
                        <div class="input">
                            <b>Jumlah Produk</b> <br> <input type="text" name="jml_prd">
                        </div>
                    </tr>
                        <div class="input">
                            <b>Total Harga</b> <br> <input type="text" name="total_harga">
                        </div>
                    <br>
                        <input type="submit" class="btn btn-info" name="Submit" value="Tambah">
                    </tr>
                </table>
            </form>
        </div>
        
        <?php
            if(isset($_POST['Submit'])) {
                $id_trs = $_POST['id_trs'];
                $id_prd = $_POST['id_prd'];
                $id_pmb = $_POST['id_pmb'];
                $jml_prd = $_POST['jml_prd'];
                $total_harga = $_POST['total_harga'];

                include("config.php");

                $result = mysqli_query($conn, "INSERT INTO transaksi(id_trs, id_prd, id_pmb, jml_prd, total_harga) 
                VALUES('', '$id_prd','$id_pmb','$jml_prd', '$total_harga')");
                
                echo "User added successfully. <a href='transaksi.php'>View Users</a>";
            }
        ?>
    </body>
    <br>
    <ul>
    <footer>
        <p>&copy; 2021 Sistem Basis Data, Teknik Informatika, Universitas Pelita Bangsa</p>
    </footer>
    </ul>
    <br>
</html>