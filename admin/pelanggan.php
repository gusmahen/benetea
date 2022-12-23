<h2 class="text-center"> Data Pelanggan</h2><br>
<table class="table table-bordered text-center">
	<thead>
		<tr>

			<th> id</th>
			<th> Email </th>
			<th> Password </th>
			<th> Nama</th>
			<th> Telepon Pelanggan</th>
			<th> Alamat </th>
			<th> Aksi</th>
			
			
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM pelanggan"); ?>
		<?php while ($pecah = $ambil-> fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td><!-- id_pelanggan -->
			<td><?php echo $pecah ['email_pelanggan']; ?></td>
			<td><?php echo $pecah ['password_pelanggan']; ?></td>
			<td><?php echo $pecah ['nama_pelanggan']; ?></td>
			<td><?php echo $pecah ['telepon_pelanggan']; ?></td>
			<td><?php echo $pecah ['alamat_pelanggan']; ?></td>
			<td>
				<a href="index.php?halaman=hapus_pelanggan&id=<?php echo $pecah['id_pelanggan']?>"
				onclick="return confirm('apakah anda yakin ingin menghapus data ini ?')"
				class="btn btn-danger"> Hapus </a>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>