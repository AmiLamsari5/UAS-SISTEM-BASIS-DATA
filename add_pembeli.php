<?php include('config.php');?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sistem Penjualan</title>
        <link rel="stylesheet" href="style2.css">
        <title><?= $title; ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <br>
    <body>
        <div id="container">
        <header>
            <h1><center>DATA PEMBELI</center></h1>
        </header>
        <ul>
            <nav>
                <a class="btn btn-info" href="produk.php">KEMBALI</a>
            </nav>
        <div class="main">
    <?php 
        include_once('config.php');
        if (isset($_POST['submit'])) {

            $id = $_POST['id_pmb'];
            $id_pmb = $_POST['id_pmb'];
            $nama_pmb = $_POST['nama_pmb'];
            $no_tlf = $_POST['no_tlf'];
            $alamat = $_POST['alamat'];
            
            $sql = 'INSERT INTO pembeli (id_pmb, nama_pmb, no_tlf, alamat)';
            $sql .= "VALUE ('{$id_pmb}', '{$nama_pmb}', '{$no_tlf}', '{$alamat}')";
            $result = mysqli_query($conn, $sql);
        
            echo $sql;
            header('location: index.php');
            echo "Data Berhasil Ditambahkan .<a href='index.php'>View </a>";
        }
        ?>

    <form action="add_pembeli.php" method="post">
        <table width="25%" border="0">
			<tr> 
				<td>ID Pembeli</td>
                <td></td>
				<td><input type="text" name="id_pmb"></td>
			</tr>
			<tr> 
				<td>Nama Pembeli</td>
                <td></td>
				<td><input type="text" name="nama_pmb"></td>
			</tr>
			<tr> 
				<td>No Telepon</td>
                <td></td>
				<td><input type="text" name="no_tlf"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
                <td></td>
				<td><input type="text" name="alamat"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input class="btn btn-info" type="submit" name="submit" value="Simpan"></td>
			</tr>
        </table>
    </form>
</body>
<br><br>
    <ul>
    <footer>
        <p>&copy; 2021 Sistem Basis Data, Teknik Informatika, Universitas Pelita Bangsa</p>
    </footer>
    </ul>
    <br>
</html>
</html>