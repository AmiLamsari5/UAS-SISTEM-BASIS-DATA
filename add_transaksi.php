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
            <h1><center>DATA TRANSAKSI</center></h1>
        </header>
        <ul>
            <nav>
                <a class="btn btn-info" onclick="return confirm('Batal menambahkan data?');" href="transaksi.php">KEMBALI</a>
            </nav>
        <div class="main">       
            <form action="add_transaksi.php" method="post" name="form1">
                <table border="0">
                    <tr> 
                        <div class="input">
                            <td><b>ID Transaksi</b></td>
                            <td></td>
                            <td><input type="text" name="id_trs"></td>
                        </div>
                    <tr>
                        <div class="input">
                            <td><b>ID Produk</b></td>
                            <td></td>
                            <td><input type="text" name="id_prd"></td>
                        </div>
                    </tr>
                        <div class="input">
                            <td><b>ID Pembeli</b></td>
                            <td></td>
                            <td><input type="text" name="id_pmb"></td>
                        </div>
                    </tr>
                        <div class="input">
                            <td><b>Jumlah Produk</b></td>
                            <td></td>
                            <td><input type="text" name="jml_prd"></td>
                        </div>
                    </tr>
                    <div class="input">
                            <td><b>Total harga</b></td>
                            <td></td>
                            <td><input type="text" name="total_harga"></td>
                        </div>
                    </tr>
                        <td><input type="submit" class="btn btn-info" name="Submit" value="TAMBAHKAN"></td>
                    </tr>
                </table>
            </form>
        </div>
        
        <?php
    
        // Check If form submitted, insert form data into users table.
        if(isset($_POST['Submit'])) {
            $id_trs = $_POST['id_trs'];
            $id_prd = $_POST['id_prd'];
            $id_pmb = $_POST['id_pmb'];
            $jml_prd = $_POST['jml_prd'];
            $total_harga = $_POST['total_harga'];
          
            // include database connection file
            include("config.php");
                    
            // Insert user data into table
            $result = mysqli_query($conn, "INSERT INTO transaksi(id_trs, id_prd, id_pmb, jml_prd,total_harga) 
            VALUES('$id_trs', '$id_prd','$id_pmb','$jml_prd','$total_harga')");
            
            // Show message when user added
            echo "User added successfully. <a href='index.php'>View Users</a>";
        }
        ?>
    </body>
<br><br>
    <ul>
    <footer>
        <p>&copy; 2021 Sistem Basis Data, Teknik Informatika, Universitas Pelita Bangsa</p>
    </footer>
    </ul>
    <br>
</html>