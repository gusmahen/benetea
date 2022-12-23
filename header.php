

<nav class="fh5co-nav" role="navigation">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-xs-2">
						<div id="fh5co-logo"><a href="index.php">Benetea</a></div>
					</div>
					<div class="col-md-6 col-xs-6 text-center menu-1">
						<ul>
							<li class="has-dropdown">
								<a href="produk.php">Shop</a>
							</li>
							<li>
								<a href="about.php">About</a>
								
							</li>
							<?php if (isset($_SESSION['pelanggan'])): ?>
						<li><a href="logout.php"onclick="return confirm('Apakah anda yakin ingin Logout?')">Logout</a></a></li>
						<!-- Jika belum login (tidak ada session pelanggan) --><?php else: ?>
							<li class="has-dropdown">
								<a href="#">User</a>
								<ul class="dropdown">
									<li><a href="login.php">Login</a></li>
									<li><a href="daftar.php">Register</a></li>
								</ul>
							</li>

							<?php endif ?>
							<li><a href="checkout.php">Check Out</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
						<ul>
							
							<li class="shopping-cart"><a href="keranjang.php" class="cart"><span><i class="icon-shopping-cart"></i></span></a></li>
							
					
						</ul>
					</div>
				</div>
				
			</div>
</nav>
	

