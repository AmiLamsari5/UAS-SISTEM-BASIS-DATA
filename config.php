<?php 
    $host = "localhost"; 
    $user = "root"; 
    $pass = ""; 
    $db = "amilamsari_311910534"; 

    $conn = mysqli_connect($host, $user, $pass, $db); 
    if ($conn == false) 
    {echo "Koneksi ke server gagal."; 
        die(); 
        } else 
?>