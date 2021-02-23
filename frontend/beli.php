<?php

require '../models/barang.php';

session_start();

//mendapatkan id_produk dari url
$id_produk = $_GET['id'];
          $ambil = $conn->query("SELECT * FROM tb_barang WHERE id_barang='$id_produk'");
          $perbarang = $ambil->fetch_assoc();


if ($perbarang["quantity"] == 0) 
   {
               
       echo "<script> alert('Stok ".$perbarang["nama_barang"]." habis, pilih barang lain'); </script>";
       echo "<script> location='shop-category-left.php'</script>";

          return false;
   }
            


//menambahkan jumlah produk yang sama
if (isset($_SESSION['keranjang'][$id_produk])) 
{

	$_SESSION['keranjang'][$id_produk]+=1;
}
//jika produk belum terpilih
else
{
	$_SESSION['keranjang'][$id_produk]=1;
}


echo "<script>alert('item telah ditambahkan');</script>";
echo "<script>location='shop-category-left.php';</script>";

?>