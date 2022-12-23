<?php
session_start();
 include 'koneksi.php'; 
 ?>

<?php 
	$id_produk = $_GET['id'];
	$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
	$detail = $ambil->fetch_assoc();
	// var_dump($detail);die;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mahen Watch | Detail</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">



</head>
<body>	
	<?php include 'menu.php'; ?>
	<section class="konten">
		<div class="container">
			<h1>Detail Produk</h1><br>

			<div class="about-content">
				<div class="row animate-box">
					<div class="col-md-6">
						<div class="desc">
						
							<p><?=$detail['deskripsi_produk']; ?></p>
						</div>
					</div>

					<div class="col-md-6">
						<div class="spesifikasi">
						
							<p><?=$detail['spesifikasi']; ?></p>


						</div>
					</div>
					<div class="col-md-6">

						<img class="img-responsive" src="foto_produk/<?=$detail['foto_produk']; ?>" alt="about">
					</div>
				</div>
			</div>


			

			 	
			 		<a href="index.php" class="btn btn-warning">Kembali</a>
			 	</div>
			 </div> 
		</div>
	</section><br><br>
</body>
</html>