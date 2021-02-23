<?php
header('location:../tampilan/tampil_feedback.php');
require '../models/barang.php';


//mendapatkan id_produk dari url
$id_feedback = $_GET['id'];
          $ambil = $conn->query("SELECT * FROM feedback WHERE id_feedback='$id_feedback'");
          $perbarang = $ambil->fetch_assoc();


		date_default_timezone_set("Asia/Jakarta");
		$tanggal = date("Y-m-d H:i:s");
		$name_user = htmlspecialchars($_POST['name_user']);
		$email = htmlspecialchars($_POST['email']);
		$jenis_hewan = htmlspecialchars($_POST['jenis_hewan']);
		$subject = htmlspecialchars($_POST['subject']);
		$message = 	htmlspecialchars($_POST['message']);
		// Insert user _POST into table

	$tampil = "INSERT INTO post_feedback 
				VALUES
				('', '$tanggal', '$name_user', '$email', '$jenis_hewan', '$subject', '$message')
	";
	mysqli_query($conn, $tampil);

	return mysqli_affected_rows($conn);

		echo "
		<script>
			alert('data berhasil post !');
			document.location.href = '../tampilan/tampil_feedback.php';
		</script>"


?>
