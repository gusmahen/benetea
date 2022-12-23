<h2 class="text-center">Detail Pembelian</h2>
<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'");
$detail = $ambil-> fetch_assoc();

 ?>



 <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>

 <p>
 	Telepon : <?php echo $detail['telepon_pelanggan']; ?><br>
 	Email &nbsp;&nbsp;&nbsp; : <?php echo $detail['email_pelanggan']; ?>
 </p>
 <p>
 	Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
 	Total &nbsp;&nbsp;&nbsp; : RP. <?php echo number_format( $detail['total_pembelian']); ?>
 </p>
 <p>
 	Alamat : <?php echo $detail['alamat_pengiriman']; ?><br>

 </p>

 <table class="table table-bordered text-center">
 	<thead>
 		<tr>
 			<th> No. </th>
 			<th> Nama Produk</th>
 			<th> Harga Produk</th>
 			<th> Jumlah</th>
 			<th> Subtotal</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor = 1; ?>
 		<?php $ambil = $koneksi-> query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk = produk.id_produk WHERE pembelian_produk.id_pembelian = '$_GET[id]'"); ?>
 		<?php while($pecah = $ambil-> fetch_assoc()) { ?>
 		<tr>
 			<td><?php echo $nomor; ?></td>
 			<td><?php echo $pecah['nama_produk']; ?></td>
 			<td><?php echo $pecah['harga_produk']; ?></td>
 			<td><?php echo $pecah['jumlah']; ?></td>
 			<td><?php echo $pecah['harga_produk'] * $pecah['jumlah']; ?></td>
 		</tr>
 		<?php $nomor++; ?>
 	<?php } ?>
 	</tbody>
 </table>