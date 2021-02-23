<?php
$conn = mysqli_connect("localhost", "root", "", "si_ternak");



function tampil($tampil) {

		global $conn;
		$result = mysqli_query($conn, $tampil);
		$rows = [];
		while( $row = mysqli_fetch_assoc($result) )  {
			$rows[] = $row;
		}
		return $rows;

}



function tambah($data){

//ambil data dari dalam form
	global $conn;
	$nama_barang = htmlspecialchars($data["nama_barang"]);
	$quantity = htmlspecialchars($data["quantity"]);
	$harga = htmlspecialchars($data["harga"]);
	$deskripsi_barang = htmlspecialchars($data["nama_barang"]);
	$kategori_barang = htmlspecialchars($data["kategori_barang"]);

	//upload gambar

	$gambar = upload();
	if( !$gambar) {
		return false;
	}

    //query insert data
	$tampil = "INSERT INTO tb_barang 
				VALUES
				('', '$nama_barang', '$quantity', '$harga', '$deskripsi_barang', '$kategori_barang', '$gambar')
	";
	mysqli_query($conn, $tampil);

	return mysqli_affected_rows($conn);

}

function upload() {
	$namaFile = $_FILES ['gambar']['name'];
	$ukuranFile = $_FILES ['gambar']['size'];
	$error = $_FILES ['gambar']['error'];
	$tmpName = $_FILES ['gambar']['tmp_name'];

	//cek gambar apakah ada yg di upload

	if ($error === 4 ) {
		echo "<script>
				alert('silahkan pilih gambar terlebih dahulu');
				</script>";
				return false;
	}

	//yg boleh di upload hanya gambar
	$ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower (end($ekstensiGambar));
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yg anda upload bukan gambar');
				</script>";
			return false;
	}
	//cek jika ukuran terlalu besar
	if ( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar');
				</script>";
			return false;

	}
	//jika gambar lolos pengecekan
	//random nama file foto

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;


	move_uploaded_file($tmpName, 'img/barang/' .$namaFileBaru);

	return $namaFileBaru;



}

function hapus_pemesanan($id) {

	global $conn;
	mysqli_query($conn, "DELETE FROM pemesanan WHERE id_pemesanan = $id ");

	return mysqli_affected_rows($conn);

}


function hapus($id) {

	global $conn;
	mysqli_query($conn, "DELETE FROM tb_barang WHERE id_barang = $id ");

	return mysqli_affected_rows($conn);

}
function hapus_transaksi($id) {

	global $conn;
	mysqli_query($conn, "DELETE FROM penjualan WHERE id_penjualan = $id ");

	return mysqli_affected_rows($conn);

}

function ubah($data)
{
	global $conn;

	$id = $data["id"];
	$nama_barang = htmlspecialchars($data["nama_barang"]);
	$quantity = htmlspecialchars($data["quantity"]);
	$harga = htmlspecialchars($data["harga"]);
	$deskripsi_barang = htmlspecialchars($data["deskripsi_barang"]);
	$kategori_barang = htmlspecialchars($data["id_kategori_barang"]);

	$gambarLama = htmlspecialchars($data['gambarLama']);


	 //cek apakah user pilih gambar baru atau ttdiak
	  if ( $_FILES ['gambar']['error'] === 4) {
	  	$gambar = $gambarLama;
	  } else {
	  	$gambar = upload();
	  }

    //query insert data
	$tampil = "UPDATE tb_barang SET
					nama_barang = '$nama_barang',
					quantity = '$quantity',
					harga = '$harga',
					gambar = '$gambar',
					deskripsi_barang = '$deskripsi_barang',
					id_kategori_barang = '$kategori_barang'

				WHERE id_barang = $id

	";
	mysqli_query($conn, $tampil);

	return mysqli_affected_rows($conn);

}

function registrasi($data){

	global $conn;

    $nama_user = htmlspecialchars($data["nama_user"]);
	$username = strtolower(stripslashes($data["username"]));
	$email = htmlspecialchars($data["email"]);
	$gender = htmlspecialchars($data["gender"]);
	$tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$confirmpassword = mysqli_real_escape_string($conn, $data["confirmpassword"]);

	$cekUsername = mysqli_query($conn, "SELECT username FROM pelanggan WHERE  username = '$username'");
	$cekEmail = mysqli_query($conn, "SELECT email FROM pelanggan WHERE  email = '$email'");

	if (mysqli_fetch_assoc($cekUsername)) {
		echo "<script>
				alert('username sudah terdaftar!')
				</script>";
			return false;

	}

	if (mysqli_fetch_assoc($cekEmail)) {
		echo "<script>
				alert('Email anda sudah terdaftar!')
				</script>";
			return false;

	}


	if ($password !== $confirmpassword) {
		echo "<script>
			alert('Confirm Password Tidak sama!!');
			</script>";
		return false; 
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO pelanggan VALUES ('', '$nama_user', '$username', '$email', '$gender', '$tgl_lahir', '$alamat', '$no_hp', '$password')");

	return mysqli_affected_rows($conn);

}

function ubah_pemesanan($data)
{
	global $conn;

	$id = $data["id"];
	$email=$data['email'];
	$startdate=$data['startdate'];
	$tipekandang=$data['field_1'];
	$hargakandang=$data['field_2'];
	$jenis_hewan=$data['jenis_hewan'];
	$hari=$data['hari'];
	$total_harga=$data['totalharga'];
/*
$checkroom= "SELECT count(*) FROM kandang WHERE tipe_kandang='".$tipekandang."' ";
$check=mysqli_query($conn, $checkroom) or die (mysqli_error($conn));
$roomcount=mysqli_fetch_array($check);
 $checkcount=$roomcount[0];
if($checkcount>=3)
{
?> <script>alert("Maaf Kandang Penitipan Tidak Tersedia");</script> 
<?php 
} else {
// $s1="UPDATE pemesanan set email='".$email."',checkin='".$startdate."',tipe_kandang='".$tipekandang."',harga_kandang='".$hargakandang."',jenis_hewan='".$jenis_hewan."',hari='".$hari."',total_harga='".$total_harga."' where id_pemesanan='".$id."'";
*/

    //query insert data
	$pesanan = "UPDATE pemesanan SET
					email = '$email',
					checkin = '$startdate',
					tipe_kandang = '$tipekandang',
					harga_kandang = '$hargakandang',
					jenis_hewan = '$jenis_hewan',
					hari = '$hari',
					total_harga = '$total_harga'

				WHERE id_pemesanan = $id

	";

	mysqli_query($conn, $pesanan);

	return mysqli_affected_rows($conn);
//}
}

function bayar(){

	global $conn;

        $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
        $id_ongkir = $_POST["id_ongkir"];
        $tanggal_penjualan = date("Y-m-d H:i:s");
        $metode = $_POST['metode_pembayaran'];
        $alamat_pengiriman = $_POST['alamat_pengiriman'];

        $ambil = $conn->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
        $arayongkir = $ambil->fetch_assoc();
        $nama_kota = $arayongkir['nama_kota'];
        $tarif = $arayongkir['tarif'];
        $stat = $_POST["status"];
        $total_penjualan = $totalbelanja + $tarif;

// cek apakah barang Tersedia
         foreach ($_SESSION["keranjang"] as $id_barang => $jumlah){

          $ambil = $conn->query("SELECT * FROM tb_barang WHERE id_barang='$id_barang'");
          $perbarang = $ambil->fetch_assoc();

          $jumlah_barang = $_SESSION['keranjang'][$id_barang] ;

          // cek stok barang?

          if ($jumlah > $perbarang["quantity"]) 
   	      {
               
       echo "<script> alert('Untuk ".$perbarang["nama_barang"]." stok tinggal ".$perbarang["quantity"].", pilih barang lain atau Sesuaikan Dengan stok'); </script>";
       echo "<script> location='shop-keranjang.php'</script>";

          return false;
          }

        }

        //menyimpan data ke tabel penjualan
        $conn->query("INSERT INTO penjualan (id_pelanggan,id_ongkir,tanggal_penjualan,total_penjualan,nama_kota,tarif,status,metode_pembayaran,alamat_pengiriman)
          VALUES ('$id_pelanggan','$id_ongkir','$tanggal_penjualan','$total_penjualan','$nama_kota','$tarif','$stat','$metode','$alamat_pengiriman')
          ");

        //id_penjualan baru 
        $id_penjualan_baru  = $conn ->insert_id;

        foreach ($_SESSION["keranjang"] as $id_barang => $jumlah) 
        {

          //mendapatkan data barang berdasarkan id_barang
          $ambil = $conn->query("SELECT * FROM tb_barang WHERE id_barang='$id_barang'");
          $perbarang = $ambil->fetch_assoc();

          $nama_barang = $perbarang['nama_barang'];
          $harga = $perbarang['harga'];
          $subharga = $perbarang['harga']*$jumlah;
          $conn->query("INSERT INTO penjualan_barang (id_penjualan,id_barang,jumlah,nama_barang,harga,subharga) VALUES ('$id_penjualan_baru','$id_barang','$jumlah','$nama_barang','$harga','$subharga') ");

          $stok = $perbarang["quantity"] - $jumlah;
          

          mysqli_query($conn, "UPDATE tb_barang SET quantity = '$stok' WHERE id_barang = '$id_barang' ");
          
          //mengkosongkan keranjang
          unset($_SESSION["keranjang"]);

          //  tampilan dirubah ke halaman nota,     
          echo "<script>alert('beli sukses');</script>";
          echo "<script>location='nota_petshop.php?id=$id_penjualan_baru';</script>";
        }
      }

function ubah_profil($data){

	global $conn;
	$id = $data["id"];
    $nama_user = htmlspecialchars($data["nama_user"]);
	$username = strtolower(stripslashes($data["username"]));
	$email = htmlspecialchars($data["email"]);
	$gender = htmlspecialchars($data["gender"]);
	$tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$no_hp = htmlspecialchars($data["no_hp"]);


	$cekUsername = mysqli_query($conn, "SELECT username FROM pelanggan WHERE  username = '$username'");
	$cekEmail = mysqli_query($conn, "SELECT email FROM pelanggan WHERE  email = '$email'");

	if (mysqli_fetch_assoc($cekUsername)) {
		echo "<script>
				alert('username sudah terdaftar!')
				</script>";
			return false;

	}

	if (mysqli_fetch_assoc($cekEmail)) {
		echo "<script>
				alert('Email anda sudah terdaftar!')
				</script>";
			return false;

	}



    //query update
	$tampil = "UPDATE pelanggan SET
					nama_user = '$nama_user',
					username = '$username',
					email = '$email',
					gender = '$gender',
					tgl_lahir = '$tgl_lahir',
					alamat = '$alamat',
					no_hp = '$no_hp'

				WHERE id_pelanggan = $id

	";
	mysqli_query($conn, $tampil);

	return mysqli_affected_rows($conn);

}

function cek_stok(){

	global$conn;

	    foreach ($_SESSION["keranjang"] as $id_barang => $jumlah){

          $ambil = $conn->query("SELECT * FROM tb_barang WHERE id_barang='$id_barang'");
          $perbarang = $ambil->fetch_assoc();

          $jumlah_barang = $_SESSION['keranjang'][$id_barang] ;

          // cek stok barang?

          if ($jumlah > $perbarang["quantity"]) 
   	      {
               
       echo "<script> alert('Untuk ".$perbarang["nama_barang"]." stok tinggal ".$perbarang["quantity"].", pilih barang lain atau Sesuaikan Dengan stok'); </script>";
       echo "<script> location='shop-keranjang.php'</script>";

          return false;
          }


        }


        return mysqli_affected_rows($conn);
       

}

function inputfeedback($data){

	global$conn;

		date_default_timezone_set("Asia/Jakarta");
		$tanggal = date("Y-m-d H:i:s");
		$name_user = htmlspecialchars($data['name_user']);
		$email = htmlspecialchars($data['email']);
		$jenis_hewan = htmlspecialchars($data['jenis_hewan']);
		$subject = htmlspecialchars($data['subject']);
		$message = 	htmlspecialchars($data['message']);
		// Insert user data into table

	$tampil = "INSERT INTO feedback 
				VALUES
				('', '$tanggal', '$name_user', '$email', '$jenis_hewan', '$subject', '$message')
	";
	mysqli_query($conn, $tampil);

	return mysqli_affected_rows($conn);

	    

}

function postfeedback($data){

	global$conn;

		date_default_timezone_set("Asia/Jakarta");
		$tanggal = date("Y-m-d H:i:s");
		$name_user = htmlspecialchars($data['name_user']);
		$email = htmlspecialchars($data['email']);
		$jenis_hewan = htmlspecialchars($data['jenis_hewan']);
		$subject = htmlspecialchars($data['subject']);
		$message = 	htmlspecialchars($data['message']);
		// Insert user data into table

	$tampil = "INSERT INTO post_feedback 
				VALUES
				('', '$tanggal', '$name_user', '$email', '$jenis_hewan', '$subject', '$message')
	";
	mysqli_query($conn, $tampil);

	return mysqli_affected_rows($conn);

	    

}
// function ubah_password($data){

// 	global $conn
// 	$id_pelanggan = mysqli_real_escape_string($conn,$data['id_pelanggan']);
		
// 	$oldpassword = mysqli_real_escape_string($conn, $data["oldpassword"]);
// 	$passwordbaru = mysqli_real_escape_string($conn, $data["passwordbaru"]);
// 	$confirmpassword = mysqli_real_escape_string($conn, $data["confirmpassword"]);

// 	// $cekpassword = mysqli_query($conn, "SELECT count(password) ttl FROM pelanggan WHERE  password = '$oldpassword'");
// 	$pass = mysqli_fetch_assoc($cekpassword);

// 	if ($pass==0) {
// 		echo "<script>
// 				alert('Masukkan Password Lama yg Benar')
// 				</script>";
// 			return false;

// 	}
// 	else{
// 		if ($passwordbaru !== $confirmpassword) {
// 			echo "<script>
// 				alert('Confirm Password Tidak sama!!');
// 				</script>";
// 			return false; 
// 		}

// 		$passwordbaru = password_hash($passwordbaru, PASSWORD_DEFAULT);

// 		$tampil = "UPDATE pelanggan SET
// 						password = '$passwordbaru'

// 					WHERE id_pelanggan = $id

// 		";
// 		mysqli_query($conn, $tampil);

// 		return mysqli_affected_rows($conn);
// 	}



 ?>