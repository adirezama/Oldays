<?php 

require 'barang.php';

$id = $_GET["id"];
$barang = tampil("SELECT * FROM penjualan WHERE id_penjualan = ". $id)[0];


if( hapus_transaksi($id) > 0 ){

	echo "
		<script>
			alert('data berhasil di hapus!');
			document.location.href = '../tampilan/transaksi_petshop.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal di hapus!');
			document.location.href = '../tampilan/transaksi_petshop.php';
		</script>
	";
	}

 ?>
