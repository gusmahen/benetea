 <!-- Navbar -->
	<nav class="navbar navbar-default">
		<div class="container">
			<ul class="nav navbar-nav">
				<li><a href="index.php">HOME</a></li>
				<!-- <li><a href="Keranjang.php">Keranjang</a></li> -->
				<!-- Jika sudah login (ada session pelanggan) -->


				<?php if (isset($_SESSION['pelanggan'])): ?>
						<li><a href="logout.php"onclick="return confirm('Apakah anda yakin ingin Logout?')">Logout</a></a></li>
				<!-- Jika belum login (tidak ada session pelanggan) --><?php else: ?>
						<li><a href="daftar.php">Daftar</a></li>
						<li><a href="login.php">Login</a></li>
			<?php endif ?>
				<li><a href="checkout.php">CheckOut</a></li>

			</ul>
		</div>
	</nav>