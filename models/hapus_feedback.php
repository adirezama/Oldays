<?php 

require 'barang.php';

$id = $_GET["id"];
$barang = tampil("SELECT * FROM feedback WHERE id_feedback = ". $id)[0];


if(hapus_feed($id) > 0 ){

	echo "
		<script>
			alert('data berhasil di hapus!');
			document.location.href = '../tampilan/tampil_feedback.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal di hapus!');
			document.location.href = '../tampilan/tampil_feedback.php';
		</script>
	";
	}

 ?>
