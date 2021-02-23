<?php
header('location:../tampilan/transaksi_shop.php');
require '../models/barang.php';


//mendapatkan id_produk dari url
$id_penjualan = $_GET['id'];
          $ambil = $conn->query("SELECT * FROM penjualan WHERE id_penjualan='$id_penjualan'");
          $perbarang = $ambil->fetch_assoc();


		// Insert user _POST into table

	$tampil = "UPDATE penjualan SET status = 'sudah bayar' WHERE penjualan.id_penjualan = $id_penjualan";

	mysqli_query($conn, $tampil);

	return mysqli_affected_rows($conn);


?>
