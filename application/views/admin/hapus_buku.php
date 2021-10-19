<?php
include 'koneksi.php';
if (isset($_GET['id_buku'])) {
    $dbh->exec("DELETE FROM buku WHERE id_buku = '$_GET[id_buku]'");
}
header("location:../homeadmin.php?app=data_buku")
?>