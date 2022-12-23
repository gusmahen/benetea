<?php 
session_start();
include 'koneksi.php';
// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";
if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
	echo "<script>alert('Produk Kosong, Silahkan Belanja Terlebih Dahulu');</script>";
	echo "<script>location='index.php';</script>";
}



 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>EasyShops | Keranjang</title>
 	
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
		<div class="container"><br>
			<h1>Keranjang Belanja</h1> <br>
			<table class="table table-bordered text-center">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Produk</th>
						<th class="text-center">Harga</th>
						<th class="text-center">Jumlah</th>
						<th class="text-center">Subharga</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor = 1; ?>
		
					
					<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
					<?php 
					$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
					$pecah = $ambil->fetch_assoc();
					$subharga = $pecah['harga_produk'] * $jumlah;
					
					 ?>
					
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['nama_produk']; ?></td>
						<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
						<td><?php echo $jumlah; ?></td>
						<td>Rp. <?php echo number_format($subharga); ?></td>
						<td>
							<a href="hapus_keranjang.php?id=<?php echo $id_produk; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus produk ini?')">Hapus</a>
						</td>
					</tr>
					<?php $nomor++; ?>
				<?php endforeach; ?>
				</tbody>
			</table>
			<a href="index.php" class="btn btn-default"> Lanjutkan Belanja</a>
			<a href="checkout.php" class="btn btn-success"> Checkout</a>
		</div>
	</section>


 
 </body>
 </html>