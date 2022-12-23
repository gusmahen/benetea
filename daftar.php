<?php include 'koneksi.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Benetea | Daftar</title>
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
	<?php include "header.php" ?>
	<div class="container" style="margin-top: 100px; ">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-center"><b>Benetea | Daftar Pelanggan</b></h3>
					</div>
					<div class="panel-body">
						<form method="POST" class="form-horizontal">
							<div class="form-group">
								<label class="col-md-3 control-label">Nama</label>
									<div class="col-md-6">
									<input type="text" class="form-control" name="nama" required></div>
								
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Email</label>
									<div class="col-md-6">
									<input type="email" class="form-control" name="email" required></div>
								
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Password</label>
									<div class="col-md-6">
									<input type="password" class="form-control" name="password" required></div>
								
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Konfirmasi Password</label>
									<div class="col-md-6">
									<input type="password" class="form-control" name="password2" required></div>
								
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Alamat</label>
									<div class="col-md-6">
										<textarea name="alamat" rows="2" class="form-control" style="resize: none;"required></textarea>
									</div>
								
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">No. Telepon</label>
									<div class="col-md-6">
									<input type="text" class="form-control" name="telepon"required></div>
								
							</div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
									<button class="btn btn-primary btn-block btn-lg" name="daftar">Daftar</button>
								</div>
							</div>

						</form>
						<?php 
						if (isset($_POST['daftar'])) {
						 	$nama = $_POST['nama'];
						 	$email = $_POST['email'];
						 	$password = $_POST['password'];
						 	$password2 = $_POST['password2'];
						 	$alamat = $_POST['alamat'];
						 	$telepon = $_POST['telepon'];

						 	// Cek apakah email sudah digunakan atau belum
						 	$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'");
						 	$cocok = $ambil->num_row;
						 	if ($cocok == 1) {
						 		echo "<script>alert('Pendaftaran Gagal, Email Sudah Digunakan');</script>";
						 		echo "<script>location='daftar.php';</script>";
						 	}elseif ($password != $password2) {
						 		echo "<script>alert('Konfirmasi Password Anda Tidak Cocok');</script>";
						 		echo "<script>location='daftar.php';</script>";
						 	} else {
						 		// Query Masukan kedalam database
						 		$koneksi->query("INSERT INTO pelanggan(email_pelanggan, password_pelanggan,nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES('$email', '$password', '$nama', '$telepon', '$alamat')");

						 		echo "<script>alert('Pendaftaran Berhasil, Silahkan Login');</script>";
						 		echo "<script>location='login.php';</script>";
						 	}
						 } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>