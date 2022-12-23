<h2 class="text-center"> Tambah Produk</h2>


<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="Nama"> Nama </label>
		<input type="text" class="form-control" name="nama">
	</div>

	<div class="form-group">
		<label for="Harga"> Harga (Rp) </label>
		<input type="number" class="form-control" name="harga">
	</div>



	<div class="form-group">
		<label for="Deskripsi"> Deskripsi </label>
		<textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"></textarea>
	</div>

	<div class="form-group">
		<label for="Foto"> Foto </label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
	<a href="index.php?halaman=produk" class="btn btn-warning"> Kembali </a>

</form>


<?php 
if (isset($_POST['save'])){
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name']; 
	move_uploaded_file($lokasi, "./foto_produk/". $nama);
	$koneksi->query("INSERT INTO produk(nama_produk, harga_produk, foto_produk, deskripsi_produk) VALUES('$_POST[nama]', '$_POST[harga]' , '$nama' , '$_POST[deskripsi]')");

	echo "<br> <div class='alert alert-success text-center'> Data berhasil Disimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";

} 
?>




