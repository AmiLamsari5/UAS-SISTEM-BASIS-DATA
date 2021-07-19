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
            <h1><center>DATA PEMBELI</center></h1>
        </header>
        <ul>
            <nav>
                <a class="btn btn-info" href="index.php">KEMBALI</a>
            </nav>
            <br>
            <table  class="table" >
                <thead>
                    <tr>
                        <th><center>ID Pembeli</center></th>
                        <th><center>Nama pembeli</center></th>
                        <th><center>No Ttelepon</center></th>
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
                            <a class="btn btn-danger" onclick="return confirm('Data akan dihapus?');" href="delete2.php?id=<?= $row['id_pmb']; ?>"> HAPUS</a>
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
            <h1><center>PENAMBAHAN DATA PEMBELI</center></h1>
        </header>
        <ul>
    <form action="" method="post">
			<tr> 
            <div class="input">
                <b>Nama Pembeli</b> <br> <input type="text" name="nama_pmb">
            </div>
			</tr>
			<tr> 
                <div class="input">
                    <b>No Telepon</b> <br> <input type="text" name="no_tlf">
                </div>    
			</tr>
			<tr> 
                <div class="input">
                    <b>Alamat</b> <br> <input type="text" name="alamat">
                </div>
			</tr>
			<tr> 
				<br> <input class="btn btn-info" type="submit" name="submit" value="Simpan">
			</tr>
    </form>
    <?php 
        include_once('config.php');
        if (isset($_POST['submit'])) {
            $nama_pmb = $_POST['nama_pmb'];
            $no_tlf = $_POST['no_tlf'];
            $alamat = $_POST['alamat'];
            
            $result = mysql_query($conn, "INSERT INTO pembeli (nama_pmb, no_tlf, alamat) 
            VALUES('$nama_pmb','$no_tlf','$alamat')");
            
            echo "Data Berhasil Ditambahkan .<a href='pembeli.php'>View Ussers</a>";
        }
    ?>
    <br>
    <ul>
    <footer>
        <p>&copy; 2021 Sistem Basis Data, Teknik Informatika, Universitas Pelita Bangsa</p>
    </footer>
    </ul>
    <br>
</html>