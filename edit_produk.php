<?php include("config.php");?>
 <?php
if(isset($_POST['update']))
{	
	$id = $_POST['id_prd'];
	
    $id_prd = $_POST['id_prd'];
    $nama_prd = $_POST['nama_prd'];
	$harga_prd= $_POST['harga_prd'];
	$stok_prd= $_POST['stok_prd'];
		
	$result = mysqli_query($conn, 
	"UPDATE produk SET id_prd='$id_prd',nama_prd='$nama_prd', harga_prd='$harga_prd', stok_prd='$stok_prd' WHERE id_prd=$id");
	
	header("Location: index.php");
}
?>
<?php
$id = $_GET['id'];
 
$result = mysqli_query($conn, "SELECT * FROM produk WHERE id_prd=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $id_prd = $user_data['id_prd'];
    $nama_prd = $user_data['nama_prd'];
	$harga_prd= $user_data['harga_prd'];
	$stok_prd= $user_data['stok_prd'];
}
?>

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
            <h1><center>Data Produk</center></h1>
        </header>
        <ul>
            <nav>
                <a class="btn btn-info" href="produk.php">KEMBALI</a>
            </nav>
        <br>
	<form name="update_user" method="post" action="edit_produk.php">
		<table border="0">
            <tr> 
				<td><b>ID Produk</b></td>
				<td><input type="text" name="id_prd" value=<?php echo $id_prd;?>></td>
			</tr>
			<tr> 
				<td><b>Nama Produk</b></td>
				<td><input type="text" name="nama_prd" value=<?php echo $nama_prd;?>></td>
			</tr>
			<tr> 
				<td><b>Harga</b></td>
				<td><input type="text" name="harga_prd" value=<?php echo $harga_prd;?>></td>
			</tr>
			<tr> 
				<td><b>Stok</b></td>
				<td><input type="text" name="stok_prd" value=<?php echo $stok_prd;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input class="btn btn-info" type="submit" name="update" value="update"></td>
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