<?php
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
// return $ambil;
$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan = '$_GET[id]'");

echo "<script> location='index.php?halaman=pelanggan';</script>";
?>