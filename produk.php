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
            <div id="container">
        
        <header>
            <h1><center>Data Produk di Gudang</center></h1>
        </header>
        <ul>
            <nav>
                <a class="btn btn-info" href="index.php">KEMBALI</a>
            </nav>
            <br>
            <table  class="table" >
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
                            <a class="btn btn-danger" onclick="return confirm('Data akan dihapus?');" href="delete1.php?id=<?= $row['id_prd']; ?>"> HAPUS</a>
                        </td>
                    </tr>
                </tbody>
                <?php 
                }
                ?>
            </table>
        </ul>
        <header>
            <h1><center>PENAMBAHAN DATA PRODUK</center></h1>
        </header>
            <form action="" method="post" name="form1">
                <table border = "0" >
                    <tr> 
                        <div class="input">
                            <b>Nama Produk</b> <br> <input type="text" name="nama_prd">
                        </div>
                    </tr>
                        <div class="input">
                            <b>Harga Produk</b> <br> <input type="text" name="harga_prd">
                            <td></td>
                            
                        </div>
                    </tr>
                        <div class="input">
                            <b>Stok Produk</b> <br> <input type="text" name="stok_prd">
                        </div>
                    </tr>
                    <br>
                    <tr> 
                        <input type="submit" class="btn btn-info" name="Submit" value="Tambah Produk">
                    </tr>
                </table>
            </form>
	<?php
 
        if(isset($_POST['Submit'])) {
            $nama_prd = $_POST['nama_prd'];
            $harga_prd = $_POST['harga_prd'];
            $stok_prd = $_POST['stok_prd'];
            
            include("config.php");
                    
            $result = mysqli_query($conn, "INSERT INTO produk(nama_prd, harga_prd, stok_prd) 
            VALUES('$nama_prd','$harga_prd','$stok_prd')");
            
            echo "User added successfully. <a href='produk.php'>View Users</a>";
        }
	?>
</body>
<body>
        <header>
            <h1><center>Trigger Update Stok</center></h1>
        </header>
        <ul>
            <table  class="table" >
                <thead>
                    <tr>
                        <th><center>ID</center></th>
                        <th><center>Nama produk</center></th>
                        <th><center>Stok Lama</center></th>
                        <th><center>Stok Baru</center></th>
                        <th><center>Waktu</center></th>
                    </tr>
                </thead>
                <?php
                include 'config.php';
                $sql = 'SELECT * FROM  log_produk';
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query))
                {
                    ?>
                <tbody>
                    <tr>
                        <td><center><?php echo $row['id_log']?></center></td>
                        <td><?php echo $row['nama_prd']?></td>
                        <td><center><?php echo $row['stok_lama']?></center></td>
                        <td><center><?php echo $row['stok_baru']?></center></td>
                        <td><center><?php echo $row['waktu']?></center></td>
                    </tr>
                </tbody>
                <?php 
                }
                ?>
            </table>
</body>
<br>
    <ul>
    <footer>
        <p>&copy; 2021 Sistem Basis Data, Teknik Informatika, Universitas Pelita Bangsa</p>
    </footer>
    </ul>
    <br>
</html>
</div>