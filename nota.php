<?php
include 'koneksi.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>BeneTea | Nota</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<?php include 'menu.php'; ?>
<section class="konten">
	<div class="container">
		<h2>Nota Pembelian</h2>
<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'");
$detail = $ambil-> fetch_assoc();

 ?>

<!-- <pre><?php print_r($detail); ?></pre> -->


<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>

		<strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
		Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
		Total : Rp. <?php echo number_format($detail['total_pembelian']); ?>
	</div>


	<div class="col-md-4">
	<h3>Pelanggan</h3>		
	<strong>Nama : <?php echo $detail['nama_pelanggan']; ?></strong><p>
 	Telepon : <?php echo $detail['telepon_pelanggan']; ?><br>
 	Email : <?php echo $detail['email_pelanggan']; ?>
	</div>
	

	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong>Kab. / Kota : <?php echo $detail['nama_kota']; ?> </strong><br>
		Ongkir : <?php echo $detail['tarif']; ?><br>
		Alamat : <?php echo $detail['alamat_pengiriman']; ?>
	</div>

</div>
 <table class="table table-bordered text-center">
 	<thead>
 		<tr>
 			<th class="text-center"> No. </th>
 			<th class="text-center"> Nama Produk</th>
 			<th class="text-center"> Harga Produk</th>
 			<th class="text-center"> Jumlah</th>
 			<th class="text-center"> Subharga</th>

 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor = 1; ?>
 		<?php $ambil = $koneksi-> query("SELECT * FROM pembelian_produk WHERE id_pembelian = '$_GET[id]'"); ?>
 		<?php while($pecah = $ambil-> fetch_assoc()) { ?>
 		<tr>
 			<td><?php echo $nomor; ?></td>
 			<td><?php echo $pecah['nama']; ?></td>
 			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
 			<td><?php echo $pecah['jumlah']; ?></td>
 			<td><?php echo number_format($pecah['subharga']); ?></td>

 		</tr>
 		<?php $nomor++; ?>
 	<?php } ?>
 	</tbody>
 </table>
 <div class="row">
 	<div class="col-md-6 alert alert-success">
 		<p>Silahkan lakukan pembayaran RP. <?php echo number_format( $detail['total_pembelian']); ?> ke <br>
 			<strong>BANK BNI 12155519273 AN  PERUSAHAAN TEH BENETEA</strong>
 		</p> 		</p> 
 	</div>
 </div>

	</div>
</section>

</body>
</html>