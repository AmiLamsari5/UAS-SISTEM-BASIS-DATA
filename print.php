<?php include("config.php");?>
<!DOCTYPE html>
<html>
	<head>
		<title>Laporan</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"><meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
    <br>
		<header>
    <h1><center>Data pembayaran pembeli</center></h1>
    <p>&nbsp;</p>
		</header>
    <div class='panel-body'>
							<center>
								<h3></h3>
								<h3>Laporan Data Transaksi</h3>
								<p>&nbsp;</p>
							</center>

							<table class="table table-hover table-bordered">
							  <thead>
								<tr>
								  <th><center>ID transaksi</center></th>
								  <th><center>Nama Produk</center></th>
								  <th><center>Harga Produk</center></th>
                  <th><center>Nama Pembeli</center></th>
								  <th><center>Jumlah</center></th>
                  <th><center>Total Harga</center></th>
								</tr>
							  </thead>
							  <tbody> 
                  <?php
                    include 'config.php';
                    $sql = 'SELECT * FROM  transaksi
                  CROSS JOIN pembeli ON transaksi.id_pmb=pembeli.id_pmb
                  CROSS JOIN produk ON transaksi.id_prd=produk.id_prd';
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($query))
                    {
                        ?>
                    <tbody>
                        <tr>
                            <td><center><?php echo $row['id_trs']?></center></td>
                            <td><center><?php echo $row['nama_prd']?></center></td>
                            <td><center><?php echo $row['harga_prd']?></center></td>
                            <td><center><?php echo $row['nama_pmb']?></center></td>
                            <td><center><?php echo $row['jml_prd']?></center></td>
                            <td><center><?php echo $row['total_harga']?></center></td>
                        </tr>
                    </tbody>
                    <?php 
                    }
                  ?>
                </tbody>
              </table>
                          <div class='pull-right'>
                          <br><br><br>
                            Cikarang Utara, 18 Juli 2021 <br>
                            <b><center>Manager</center></b>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                                          <p>&nbsp;</p>
                            <b><center>AMI LAMSARI</center></b>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                      window.print();
                    </script>
        </div>
    </body>
</html>