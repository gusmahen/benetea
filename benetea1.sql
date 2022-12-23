-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2022 pada 08.14
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benetea1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(2, 'mahen', 'mahen', 'mahen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `tarif` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Jakarta', 20000),
(2, 'Bandung', 15000),
(3, 'Bali', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(20) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(16, 'gei@gmail.com', 'gei', 'gei', '087858883163', 'Ubud, Gianyar, Bali'),
(17, 'mahol@unud.ac.id', 'mahol', 'mahol', '08123478678', 'Lombok'),
(19, 'jk97@gmail.com', '1234', 'jk', '087752049056', 'busan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` enum('Jakarta','Bandung','Bali','Lombok') NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`) VALUES
(69, 10, 3, '2022-11-22', 2910000, 'Jakarta', 10000, 'jimbaran'),
(70, 15, 3, '2022-11-22', 100000, 'Jakarta', 10000, 'jimbaran'),
(71, 16, 2, '2022-11-23', 60000, 'Jakarta', 30000, 'uhu'),
(72, 16, 2, '2022-11-23', 120000, 'Jakarta', 30000, 'Ubud, Gianyar, Bali (40571)'),
(73, 18, 3, '2022-12-01', 40000, 'Jakarta', 10000, 'jimbaran (83117)'),
(74, 19, 3, '2022-12-01', 40000, 'Jakarta', 10000, 'busan'),
(75, 19, 3, '2022-12-01', 160000, 'Jakarta', 10000, 'jimbaran'),
(76, 16, 2, '2022-12-19', 60000, 'Jakarta', 30000, 'assasa'),
(77, 16, 0, '2022-12-21', 30000, 'Jakarta', 0, ''),
(78, 16, 2, '2022-12-22', 60000, 'Jakarta', 30000, 'kkk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(15) NOT NULL,
  `subharga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(59, 57, 7, 1, 'parlent', 800000, 800000),
(60, 66, 9, 1, 'Parlent Gallant', 3000000, 3000000),
(61, 67, 9, 1, 'Parlent Gallant', 3000000, 3000000),
(62, 67, 11, 1, 'Parlent Royal', 2000000, 2000000),
(63, 68, 15, 1, 'Jam 1', 1000000, 1000000),
(64, 68, 16, 1, 'Jam 2', 900000, 900000),
(65, 69, 15, 2, 'Jam 1', 1000000, 2000000),
(66, 69, 16, 1, 'Jam 2', 900000, 900000),
(67, 70, 25, 2, 'Ageantea', 30000, 60000),
(68, 70, 26, 1, 'Clariontea', 30000, 30000),
(69, 71, 25, 1, 'Ageantea', 30000, 30000),
(70, 72, 25, 1, 'Ageantea', 30000, 30000),
(71, 72, 26, 1, 'Clariontea', 30000, 30000),
(72, 72, 27, 1, 'Rossetea', 30000, 30000),
(73, 73, 26, 1, 'Clariontea', 30000, 30000),
(74, 74, 25, 1, 'Ageantea', 30000, 30000),
(75, 75, 26, 1, 'Clariontea', 30000, 30000),
(76, 75, 28, 1, 'Beneteamblr', 120000, 120000),
(77, 76, 26, 1, 'Clariontea', 30000, 30000),
(78, 77, 25, 1, 'Ageantea', 30000, 30000),
(79, 78, 25, 1, 'Ageantea', 30000, 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `spesifikasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`, `spesifikasi`) VALUES
(25, 'Ageantea', 30000, 'agentea.png', '<h4><b>AEGENTEA</b></h4>\r\n\r\n<p style=\"text-align : justify\";>Aegentea merupakan teh herbal yang terbuat dari bahan organik pilihan yang berkualitas tinggi\r\n100% Asli dan Fresh tanpa campuran bahan kimia\r\nDikemas dengan paper zip lock yang memudahkan untuk membuka dan menutup kemasan serta menjamin produk tetap aman\r\nDi dalam satu kemasan terdapat 10 tea bag </p>\r\n\r\n\r\n\r\n\r\n\r\n<p><b>Bahan :</b></p>\r\n\r\n<li> 5 gr pucuk daun teh pilihan asli Indonesia </li>\r\n<li> 5 gr bunga telang kering berkualitas tinggi </li>\r\n\r\n<br>\r\n<p><b>Cara Penyimpanan :</b></p>\r\n<p style=\"text-align : justify\";>Untuk masa simpan yang lebih lama, simpan produk di dalam lemari es, jangan simpan di suhu ruang dan hindari dari paparan sinar matahari secara langsung dan hindari dari tempat lembab</p>\r\n', '<ul>\r\n	<li>Kapasitas = 280ml </li>\r\n	<li>Bahan = Stainless steel SUS304</li>\r\n	<li>Berat = 250 gram</li>\r\n	<li>BPA free, non toxic & food contact safe</li>\r\n	<li>Terbuat dari Stainless Steel SUS304 (kualitas terbaik)</li>\r\n	<li>Bagian tutup ada karetnya, anti bocor</li>\r\n	<li>Bagian tutup dilengkapi dengan handle tali terbuat dari kulit (dapat dilepas)</li>\r\n	<li>Double wall, vacuum insulated</li>\r\n	<li>Menjaga suhu panas/dingin lebih lama (12-18 jam)</li>\r\n	<li>Sangat cocok untuk membawa kopi, teh, susu maupun jus.</li>\r\n	<li>Terdapat saringan teh untuk termos kapasitas 450ml</li>\r\n	<li>Polos, cocok untuk souvenir perusahaan maupun kado</li>\r\n\r\n</ul>'),
(26, 'Clariontea', 30000, 'clariontea.png', '<h4><b>CLARIONTEA</b></h4>\r\n\r\n<p style=\"text-align : justify\";>Clariontea merupakan teh herbal yang terbuat dari bahan organik pilihan yang berkualitas tinggi\r\n100% Asli dan Fresh tanpa campuran bahan kimia\r\nDikemas dengan paper zip lock yang memudahkan untuk membuka dan menutup kemasan serta menjamin produk tetap aman\r\nDi dalam satu kemasan terdapat 10 tea bag </p>\r\n\r\n\r\n<p><b>Bahan :</b></p>\r\n\r\n<li> 5 gr pucuk daun teh pilihan asli Indonesia </li>\r\n<li> 5 gr bunga dandelion kering berkualitas tinggi </li>\r\n\r\n<br>\r\n<p><b>Cara Penyimpanan :</b></p>\r\n<p style=\"text-align : justify\";>Untuk masa simpan yang lebih lama, simpan produk di dalam lemari es, jangan simpan di suhu ruang dan hindari dari paparan sinar matahari secara langsung dan hindari dari tempat lembab</p>\r\n', '<p><b>Manfaat :</b></p>\r\n\r\n<p style=\"text-align : justify\";>Clariontea memberikan segudang manfaat bagi kesehatan jika dikonsumsi secara rutin, adapun manfaat yang akan anda peroleh yaitu</p>\r\n<li>Berguna untuk  menangkal radikal bebas </li>\r\n<li>Menurunkan kolesterol </li>\r\n<li> Mengatur gula darah </li>\r\n<li> Mengurangi peradangan </li>\r\n<li> Membantu menurunkan tekanan darah tinggi </li>\r\n<li> Membantu menurunkan berat badan </li>\r\n<li> Mengurangi resiko kanker </li>\r\n<li> Meningkatkan sistem kekebalan tubuh </li>\r\n<li> Melancarkan pencernaan </li>\r\n<li> Menjaga kesehatan kulit </li>\r\n<br>'),
(27, 'Rossetea', 30000, 'rossetea.png', '<h4><b>ROSSETEA</b></h4>\r\n\r\n<p style=\"text-align : justify\";>Rossetea merupakan teh herbal yang terbuat dari bahan organik pilihan yang berkualitas tinggi\r\n100% Asli dan Fresh tanpa campuran bahan kimia\r\nDikemas dengan paper zip lock yang memudahkan untuk membuka dan menutup kemasan serta menjamin produk tetap aman\r\nDi dalam satu kemasan terdapat 10 tea bag </p>\r\n\r\n\r\n<p><b>Bahan :</b></p>\r\n\r\n<li> 5 gr pucuk daun teh pilihan asli Indonesia </li>\r\n<li> 5 gr bunga rossela kering berkualitas tinggi </li>\r\n\r\n<br>\r\n<p><b>Cara Penyimpanan :</b></p>\r\n<p style=\"text-align : justify\";>Untuk masa simpan yang lebih lama, simpan produk di dalam lemari es, jangan simpan di suhu ruang dan hindari dari paparan sinar matahari secara langsung dan hindari dari tempat lembab</p>\r\n', '<p><b>Manfaat :</b></p>\r\n\r\n<p style=\"text-align : justify\";>Rossetea memberikan segudang manfaat bagi kesehatan jika dikonsumsi secara rutin, adapun manfaat yang akan anda peroleh yaitu</p>\r\n<ul>\r\n\r\n<li>Mencegah tumbuhnya sel kanker </li>\r\n<li>Mencegah berbagai penyakit infeksi bakteri</li>\r\n<li> kaya akan antidioksidan </li>\r\n<li> Mengurangi peradangan </li>\r\n<li> Membantu menurunkan tekanan darah tinggi </li>\r\n<li> Membantu menurunkan berat badan </li>\r\n<li> Menjaga gula dalam darah </li>\r\n<br>\r\n</ul>'),
(28, 'Beneteamblr', 120000, 'tumbler.png', '<h4><b>Beneteambler</b></h4>\r\n\r\n<p>Beneteambler merupakan tumbler yang dibuat dengan bahan premium yang dilengkapi dengan tombol untuk membukanya.\r\nTumbler ini dibuat dengan desain simple dan elegan untuk kaum milenial. Tumbler ini sangat cocok\r\nbagi anda yang menghargai rasa yang konsisten dari produk minuman teh Benetea untuk menjaga suhu tetap stabil.</p>\r\n\r\n<p>Tumbler terbuat dari bahan stainless steel 304 double wall yang membantu menghindarkan perpindahan panas/dingin\r\ndengan bantuan ruang vaccum antara dinding antara dinding dalam dan luarnya. Sementara lapisan foil yang menutupi dinding bagian dalam membantu memantulkan panas kembali ke dalam, menjadikan suhu di dalamnya tetap \r\nterjaga dengan stabil sekaligus sangat baik dalam menjaga retensi dingin. Tumbler ini mampu menjaga suhu minuman hingga jangka waktu 12 jam. </p>', '<ul>\r\n	<li>Kapasitas = 280ml </li>\r\n	<li>Bahan = Stainless steel SUS304</li>\r\n	<li>Berat = 250 gram</li>\r\n	<li>BPA free, non toxic & food contact safe</li>\r\n	<li>Terbuat dari Stainless Steel SUS304 (kualitas terbaik)</li>\r\n	<li>Bagian tutup ada karetnya, anti bocor</li>\r\n	<li>Bagian tutup dilengkapi dengan handle tali terbuat dari kulit (dapat dilepas)</li>\r\n	<li>Double wall, vacuum insulated</li>\r\n	<li>Menjaga suhu panas/dingin lebih lama (12-18 jam)</li>\r\n	<li>Sangat cocok untuk membawa kopi, teh, susu maupun jus.</li>\r\n	<li>Terdapat saringan teh untuk termos kapasitas 450ml</li>\r\n	<li>Polos, cocok untuk souvenir perusahaan maupun kado</li>\r\n\r\n</ul>'),
(29, 'Special Package', 200000, '3.png', '\r\n<h4><b>Special pakage</b></h4>\r\n\r\nBenetea hadir dalam special package yang lengkap dan lebih worth it untuk dibeli. Special pakage ini berisikan tiga varian lengkap dari Benetea yaitu Aegentea, Rossetea, dan Clariontea. Di special package ini juga berisi tumblr yang sangat cocok dipakai untuk menyimpan produk teh dari Benetea serta dilengkapi dengan totebag yang aeshetic.', '\r\n<li> Totebag ukuran: 33x13x38 cm</li>\r\n<li> Tumblr ukuran: 280 ml </li>\r\n<li> Tea product : Aegentea, Rossetea, dan Clariontea</li>\r\n\r\n'),
(30, 'Totebag BTBT', 30000, 'totbag.png', '<h4><b>AEGENTEA</b></h4>\r\n\r\nBaggy totebag dengan kanvas laminasi yang membuat tas ini tahan cipratan air cocok banget dipake pas musim hujan, jadi ngga akan khawatir kena basah. Tersedia dalam warna netral dengan desain yang simple dan elegan. Tas ini sangat aman dengan tambahan ressleting dan bahan yang waterproof.\r\n', '<ul>\r\n<p style=\"text-align : justify\";>Aegentea memberikan segudang manfaat bagi kesehatan jika dikonsumsi secara rutin, adapun manfaat yang akan anda peroleh yaitu</p>\r\n<li>Ukuran: 33x13x38 cm</li>\r\n<li>Bahan: canvas laminasi</li>\r\n<li>Penutup: zipper </li>\r\n<li>Waterproof : lebih tahan air</li>\r\n<li>Cocok dibawa ke kampus, kerja, hangout </li>\r\n<li>Stylist untuk OOTD </li>\r\n<li>Bahan super premium </li>\r\n</ul>');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
