<?php	
include '../models/barang.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>nota penjualan</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<section class="konten">
	<div class="container">
		
		<!-- copas pada detail.php admin -->
<h2> detail penjualan </h2>
<?php 
$ambil = $conn->query("SELECT * FROM penjualan JOIN pelanggan on penjualan.id_pelanggan=pelanggan.id_pelanggan WHERE penjualan.id_penjualan='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<div class="row-fluid">
	<div class="span4">
		<h3>penjualan</h3>
		<strong>No. penjualan : <?php echo $detail['id_penjualan']?></strong><br>
		Tanggal : <?php echo $detail['tanggal_penjualan'];?><br>
		Total : Rp. <?php echo number_format($detail['total_penjualan']) ?>
	</div>
	<div class="span4">
		<h3>PELANGGAN</h3>
		<strong><?php echo $detail['nama_user']; ?></strong> <br>
		<p>
			<?php echo $detail['no_hp']; ?> <br>
	 		<?php echo $detail['email']; ?>
		</p>
	</div>
	<div class="span4">
		<h3>PENGIRIMAN</h3>
		<strong><?php echo $detail['nama_kota'] ?></strong><br>
		Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']); ?><br>
		Alamat Pengiriman : <?php echo $detail['alamat_pengiriman']; ?>
	</div>
	<div class="col-md-4"></div>
</div>

<table class="table table-bordered">
	<thead>
	<tr>
		<th>no</th>
		<th>nama produk</th>
		<th>harga</th>
		<th>jumlah</th>
		<th>subtotal</th>
	</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$conn->query("SELECT * FROM penjualan_barang WHERE id_penjualan='$_GET[id]'"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_barang'];?></td>
			<td><?php echo $pecah['harga'];?></td>
			<td><?php echo $pecah['jumlah'];?></td>
			<td><?php echo $pecah['subharga'];?></td>
		</tr>
		<?php $nomor++ ?>
		<?php } ?>
	</tbody>
</table>
	</div>
</section>
</body>
</html>
                 
