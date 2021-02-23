<?php 

require 'barang.php';

$id = $_GET["id"];
$barang = tampil("SELECT * FROM pemesanan WHERE id_pemesanan = ". $id)[0];


if( hapus_pemesanan($id) > 0 ){

	echo "
		<script>
			alert('data berhasil di hapus!');
			document.location.href = '../tampilan/tampil_booking.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal di hapus!');
			document.location.href = '../tampilan/tampil_booking.php';
		</script>
	";
	}

 ?>
