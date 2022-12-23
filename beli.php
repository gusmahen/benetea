<?php 
session_start();
 // Mendapatkan id_produk dari URL
$id_produk = $_GET['id'];

// Jika produk itu sudah ada di kranjang, Maka produk itu ditambah 1
if (isset($_SESSION['keranjang'][$id_produk])) {
	$_SESSION['keranjang'][$id_produk] += 1;

}else {
// Selain itu (Belum ada di keranjang), Maka produk itu dianggap dibeli 1
	$_SESSION['keranjang'][$id_produk] = 1; 
}





// Hubungkan ke keranjang.php
echo "<script>alert('Produk telah masuk ke dalam keranjang belanja');</script>";
echo "<script>location='keranjang.php';</script>"; 


  ?>