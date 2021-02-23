<?php 

require 'barang.php';

$id = $_GET["id"];
$barang = tampil("SELECT * FROM tb_tips WHERE id_tips = ". $id)[0];


if( hapus_tips($id) > 0 ){

	echo "
		<script>
			alert('data berhasil di hapus!');
			document.location.href = '../tampilan/tampil_blog.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal di hapus!');
			document.location.href = '../tampilan/tampil_blog.php';
		</script>
	";
	}

 ?>
