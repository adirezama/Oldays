<?php
session_start();
$id_barang=$_GET["id"];
unset($_SESSION["keranjang"][$id_barang]);

echo "<script>alert('produk telah terhapus');</script>";
echo "<script>location='shop-keranjang.php';</script>";

?>