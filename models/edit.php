<?php 
require_once('../config/koneksi.php');
require_once('../models/database.php');
include "../models/barang.php";
$connection = new DataBase ($host, $user, $pass, $database);
$brg = new Barang ($connection);


$id_barang = $_POST['id_barang'];
$nama = $connection->conn->real_escape_string($_POST['nama']);
$stok = $connection->conn->real_escape_string($_POST['stok']);
$harga = $connection->conn->real_escape_string($_POST['harga']);

$pict = $_FILES['gbr_brg']['name'];
$extensi = explode(".", $_FILES['gbr_brg']['name']);
$gbr_brg = "brg-".round(microtime(true)).".".end($extensi);
$sumber = $_FILES['gbr_brg']['tmp_name'];

if($pict == ''){
	$brg->edit("UPDATE tb_barang SET nama_barang = '$nm_brg', harga_barang='$hrg_brg', stok_barang='$stok_brg' WHERE id_barang='$id_brg' ");
	echo "<script>window.location='?page=barang';</script>";
} else{
	$gbr_awal = $brg->tampil($id_barag)->fetch_object()->gbr_brg;
	unlink("../assets/img/barang/".$gbr_awal);

	$upload = move_uploaded_file($sumber, "../assets/img/barang/".$gbr_brg);
    if($upload){
        $brg->edit("UPDATE tb_barang SET nama_barang = '$nm_brg', harga_barang='$hrg_brg', stok_barang='$stok_brg', gambar_barang = '$gbr_brg' WHERE id_barang='$id_brg' ");
		echo "<script>window.location='?page=barang';</script>";
    } else{
        echo "<script>alert('upload gambar gagal!')</script>";
    }
}
?>