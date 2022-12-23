<?php 
session_start();

include 'koneksi.php';
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>watch | Login</title>
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
	<div class="container">
		<div class="row" style="margin-top: 100px;">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title text-center"><label>
							Benetea | Login
						</label></div>
					</div>
					<div class="panel-body">
						<form method="POST" >
						<div class="form-group">
						<label>Email</label>
						<input type="" class="form-control" name="email">
					</div>

					<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password">
					</div>

					<button class="btn btn-primary btn-lg btn-block" name="login">Login</button><br>
					<p>Daftar Sebagai Pelanggan?<a href="daftar.php" style="text-decoration: none;"><b>Daftar</b></a></p>
				</form>

					<?php 
					if (isset($_POST['login'])){
						$email = $_POST['email'];
						$password = $_POST['password'];

						$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email' AND password_pelanggan = '$password'");

						$akun_cocok = $ambil->num_rows;

						if ($akun_cocok == 1) {
							$akun = $ambil->fetch_assoc();

							$_SESSION['pelanggan'] = $akun;
							echo "<div class= 'alert alert-success text-center'>Login Berhasil </div>";
							if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])) {
								echo "<meta http-equiv='refresh' content='1;url=checkout.php'>";
							} else{
								"<meta http-equiv='refresh' content='1;url=index.php'>";
							}
							echo "<meta http-equiv='refresh' content='1;url=checkout.php'>";

						}else {
							echo "<div class='alert alert-danger text-center'>Login Gagal, Silahkan Periksa Akun Anda</div>";
							echo "<meta http-equiv='refresh' content='1;url=login.php'>";
						}
					} ?>
				</div>
			</div>
		</div>
	</div>
 
 </body>
 </html>