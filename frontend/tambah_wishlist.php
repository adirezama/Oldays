

<?php 

session_start();
include '../models/barang.php'; 
//proteksi checkout bila belum login
$id_barang = $_GET['id'];

if (!isset($_SESSION["pelanggan"])) 
{
  echo "<script>alert('silahkan login terlebih dahulu');</script>";
  echo "<script>location='shop-detail.php?id=$id_barang';</script>";
          
}

          $ambil = $conn->query("SELECT * FROM tb_barang WHERE id_barang='$id_barang'");

          $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
          $id_barang = $_GET["id"];
          $tanggal = date("Y-m-d H:i:s");

	$cekWishlist = mysqli_query($conn, "SELECT id_barang FROM wishlist WHERE  id_barang = '$id_barang'");

		if (mysqli_fetch_assoc($cekWishlist)) {
		echo "<script>
				alert('wishlist Sudah ada!')
				</script>";
		          echo "<script>location='shop-detail.php?id=$id_barang';</script>";

		return false;

		}
        //menyimpan data ke tabel penjualan
          $conn->query("INSERT INTO wishlist (id_pelanggan,id_barang,tanggal)
          VALUES ('$id_pelanggan','$id_barang','$tanggal')
          ");



          //  tampilan dirubah ke halaman nota,     
          echo "<script>alert('wishlist sukses di tambah');</script>";
          echo "<script>location='shop-detail.php?id=$id_barang';</script>";


        

      
    ?>
