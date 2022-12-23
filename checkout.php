<?php 
session_start();
$koneksi = new mysqli("localhost", "root", "", "benetea1");
if (!isset($_SESSION['pelanggan'])) {
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script>";
}

if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
	echo "<script>alert('Produk kosong, silahkan belanja terlebih dahulu');</script>";
	echo "<script>location='index.php';</script>";
}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>BeneTea | checkout</title>
 	<link rel="stylesheet" type="text/css" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">



	 <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shop &mdash; Free Website Template, Free HTML5 Template by gettemplates.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />


  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
 </head>
 <body>

 	
  <?php include 'header.php'; ?>


	<section class="konten">
		<div class="container">
			 <br>
			<table class="table table-bordered text-center">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Produk</th>
						<th class="text-center">Harga</th>
						
						<th class="text-center">Jumlah</th>
						<th class="text-center">Subharga</th>
						
					</tr>
				</thead>
				<tbody>
					<?php $nomor = 1; ?>
					<?php $total_belanja = 0; ?>
					<?php foreach($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
					<?php 
					$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
					$pecah = $ambil->fetch_assoc();
					$subharga = $pecah['harga_produk']*$jumlah;
					
					 ?>
					
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['nama_produk']; ?></td>
						<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
						<td><?php echo $jumlah; ?></td>
						<td>Rp. <?php echo number_format($subharga); ?></td>
						
					</tr>
					<?php $nomor++; ?>
					<?php $total_belanja+=$subharga; ?>
				<?php endforeach; ?>
				</tbody>
				<tfoot>
					<th class="text-center "colspan="4">Total</th>
					<th class="text-center">Rp. <?php echo number_format($total_belanja); ?></th>
				</tfoot>
			</table>
			<form method="POST">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly class="form-control text-center" value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>">
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly class="form-control text-center" value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>">
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<select name="id_ongkir" class="form-control">
								<option value="">-- Pilih Ongkir --</option>
								<?php 
								$ambil = $koneksi->query("SELECT * FROM ongkir");
								while ($perongkir = $ambil->fetch_assoc()) {
								 	
								 ?>
								<option value="<?php echo $perongkir['id_ongkir'] ?>">
								<?php echo $perongkir['nama_kota'] ?> -
								Rp. <?php echo number_format($perongkir['tarif']) ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Alamat Pengiriman</label>
					<textarea name="alamat_pengiriman" rows="2" class="form-control" style="resize: none;" placeholder="Masukan Alamat Pengiriman Secara Lengkap (Termasuk Kode Pos)"></textarea>
				</div>
				<button class="btn btn-success" name="checkout">Checkout</button>
			</form>
			<?php 
			if (isset($_POST['checkout']))
			{
				$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
				$id_ongkir = $_POST['id_ongkir'];
				$tanggal_pembelian = date("Y-m-d");
				$alamat_pengiriman = $_POST['alamat_pengiriman'];

				$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
				$array_ongkir = $ambil->fetch_assoc();
				$nama_kota = $array_ongkir['nama_kota'];
				$tarif = $array_ongkir['tarif'];

				$total_pembelian = $total_belanja + $tarif; 
				//echo $nama_kota;



				// Menyimpan data ke tabel total_pembelian
			
				$koneksi->query("INSERT INTO pembelian(id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian,alamat_pengiriman,tarif)VALUES('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian','$alamat_pengiriman','$tarif')");
				$id_pembelian_barusan = $koneksi->insert_id;



				foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
					// Mendapatkan data produk berdasarkan id_produk
					$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
					$perproduk = $ambil->fetch_assoc();
					$nama = $perproduk['nama_produk'];
					$harga = $perproduk['harga_produk'];
					// $jumlah = $perproduk['jumlah'];

					$subharga = $perproduk['harga_produk'] * $jumlah;
					$subberat = $perproduk['berat_produk'] * $jumlah;
					$koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk,nama,harga,subharga,jumlah) VALUES (
						'$id_pembelian_barusan','$id_produk','$nama','$harga','$subharga','$jumlah')");

				}

				//Mengkosongkan kera
				
				unset($_SESSION['keranjang']);


                // Tampilan dialihkan ke nota, nota yang pembelian barusan
			    echo "<script>alert('Pembelian Sukses');</script>";
			    echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
			}
		
			?>
			<!-- <pre><?php print_r($_SESSION['keranjang']) ?></pre> -->
		</div>
		</section><br>
	</body>
	</html>
