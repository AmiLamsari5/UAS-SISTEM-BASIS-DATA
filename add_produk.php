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
        <header>
            <h1><center>DATA PRODUK</center></h1>
        </header>
        <ul>
            <nav>
                <a class="btn btn-info" href="produk.php">KEMBALI</a>
            </nav>
        <div class="main">
        <form action="add_produk.php" method="post" name="form1">
		    <table width="25%" border="0">
			<tr> 
				<td>ID Produk</td>
				<td><input type="text" name="id_prd"></td>
			</tr>
			<tr> 
				<td>Nama Produk</td>
				<td><input type="text" name="nama_prd"></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" name="harga_prd"></td>
			</tr>
            <tr>
				<td>Stok</td>
				<td><input type="text" name="stok_prd"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="TAMBAHKAN"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
 
	if(isset($_POST['Submit'])) {
		$id_prd = $_POST['id_prd'];
		$nama_prd = $_POST['nama_prd'];
		$harga_prd = $_POST['harga_prd'];
        $stok_prd = $_POST['stok_prd'];
		
		include("config.php");
		
		$result = mysqli_query($conn, "INSERT INTO produk(id_prd,nama_prd,harga_prd,stok_prd) 
		VALUES('$id_prd','$nama_prd','$harga_prd','$stok_prd')");
		
		echo "User added successfully. <a href='index.php'>View Users</a>";
	}
	?>
</body>
</html>