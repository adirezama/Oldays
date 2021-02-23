<?php 

require 'barang.php';

$id = $_GET["id"];
$barang = tampil("SELECT * FROM tb_barang WHERE id_barang = ". $id)[0];
$gambar = $barang['gambar'];


if( hapus($id) > 0 ){
	if ($gambar){
	unlink('img/barang/'.$gambar);
	echo "
		<script>
			alert('data berhasil di hapus!');
			document.location.href = '../tampilan/tables.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal di hapus!');
			document.location.href = '../tampilan/tables.php';
		</script>
	";
	}
}
 ?>
