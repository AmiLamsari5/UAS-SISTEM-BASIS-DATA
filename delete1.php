<?php
    include 'config.php';
    $id = $_GET['id'];

    $result = mysql_query($conn, "DELETE FROM produk WHERE id_prd = '{$id}'");
    header('location: index.php');   
?>