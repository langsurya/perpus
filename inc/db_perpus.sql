-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 05 Nov 2016 pada 06.27
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `nim` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `thn_masuk` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`nim`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `prodi`, `thn_masuk`) VALUES
(21394, 'Ria Putri', 'Gorontalo', '2005-10-04', 'P', 'Sistem Informasi', '2012'),
(201238, 'Lala', 'Pamulang', '2000-11-03', 'P', 'Managemen', '2015'),
(201328, 'Cristine', 'Manado', '1994-10-01', 'P', 'Teknik Informatika', '2013'),
(210234, 'maratus', 'pamulang', '1999-12-30', 'P', 'Sistem Informasi', '2011'),
(213834, 'Fariz', 'Tangerang', '2009-02-02', 'P', 'Managemen', '2010'),
(2015804045, 'Wewen', 'Indramayu', '2015-11-02', 'P', 'Komputer Akuntansi', '2014'),
(2015804065, 'Iqbal Rizqi Purnama', 'Ciamis', '1996-05-03', 'L', 'Sistem Informasi', '2015');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id` int(5) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(150) NOT NULL,
  `thn_terbit` varchar(4) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `jumlah_buku` int(3) NOT NULL,
  `lokasi` enum('rak1','rak2','rak3') NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`id`, `judul`, `pengarang`, `penerbit`, `thn_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tgl_input`) VALUES
(23, 'Matematika', 'Asepudin', 'Gramedial', '2015', '4871847h', 5, 'rak2', '0000-00-00 00:00:00'),
(24, 'Dasar PHP', 'Solihin', 'Toko bukbek', '2010', '943823jc4', 4, 'rak2', '0000-00-00 00:00:00'),
(25, 'Pintar CSS', 'Jack', 'Media Suar', '2012', '934748', 8, 'rak1', '0000-00-00 00:00:00'),
(26, 'Bahasa Arab', 'Soleh', 'Muslim post', '2015', '923847', 4, 'rak1', '0000-00-00 00:00:00'),
(29, 'Angular js', 'anggul', 'Raja Program', '2016', '943823jc4', 3, 'rak2', '0000-00-00 00:00:00'),
(30, 'Mahir MySQL', 'April', 'Megatama', '2014', '1234', 2, 'rak1', '2016-10-31 03:03:43'),
(31, 'Mahir PHP', 'Julian', 'Jorge', '2016', '4325', 1, 'rak3', '2016-10-31 09:06:05'),
(33, 'test', 'lala', 'lalala', '2014', '4871847h', 5, 'rak2', '2016-10-31 22:03:44'),
(34, 'HTML Untuk Pemula', 'Surya', 'Penerbit 1', '2014', '2345', 5, 'rak1', '2016-11-05 12:16:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id` int(5) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_pinjam` varchar(15) NOT NULL,
  `tgl_kembali` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `ket` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id`, `judul`, `nim`, `nama`, `tgl_pinjam`, `tgl_kembali`, `status`, `ket`) VALUES
(7, 'matematika', 2015804045, 'Wewen Nurwendi', '01-11-2015', '08-11-2015', 'Kembali', ''),
(9, 'PHP Dasar', 2015804065, 'Iqbal Rizqi Purnama', '24-10-2016', '07-11-2016', 'Kembali', ''),
(11, 'matematika', 2011140204, 'Erlang', '28-10-2016', '09-11-2016', 'perpanjang', 'pinjem lagi'),
(12, 'PHP Dasar', 2015804045, 'Wewen', '28-10-2016', '04-11-2016', 'Pinjam', ''),
(13, 'Samudra PHP', 210234, 'maratus', '28-10-2016', '04-11-2016', 'Pinjam', 'lope'),
(15, 'Pintar CSS', 210234, 'maratus', '04-11-2016', '11-11-2016', 'Kembali', 'pintar'),
(19, 'Mahir MySQL', 213834, 'Fariz', '04-11-2016', '25-11-2016', 'Pinjam', 'daspd'),
(20, 'Pintar CSS', 201328, 'Cristine', '04-11-2016', '11-11-2016', 'perpanjang', ''),
(21, 'Pintar CSS', 201328, 'Cristine', '04-11-2016', '11-11-2016', 'Kembali', ''),
(22, 'Pintar CSS', 201328, 'Cristine', '30-11-2016', '09-11-2016', 'Pinjam', ''),
(23, 'Angular js', 201238, 'Lala', '04-11-2016', '11-11-2016', 'Pinjam', 'sdad'),
(24, 'Mahir PHP', 201238, 'Lala', '05-11-2016', '12-11-2016', 'Pinjam', 'lal'),
(25, 'Matematika', 21394, 'Ria Putri', '05-11-2016', '12-11-2016', 'Kembali', 'lalsd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(3) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `username`, `password`, `email`, `foto`, `level`) VALUES
(1, 'Elang Surya', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'elank37@gmail.com', 'avatar5.png', 'admin'),
(2, 'Wewen Nurwendi', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'wewen@gmail.com', 'avatar5.png', 'user'),
(6, 'Elang Surya', 'erlang', '622c84b69ee448a07d80de5cbeb13e3d', 'elank76@gmail.com', 'm3.jpg', 'user'),
(7, 'Maratus Solihkah', 'ikha', '622c84b69ee448a07d80de5cbeb13e3d', 'ikhaa@gmail.com', '847531.jpg', 'user'),
(8, 'Tiara sandi', 'tiara', 'd41d8cd98f00b204e9800998ecf8427e', 'tiara14@gmail.com', '761462.jpeg', 'user'),
(9, 'Dinda', 'dinda', '594280c6ddc94399a392934cac9d80d5', 'dinda@gmail.com', '827898.jpg', 'admin'),
(10, 'Ayana', 'ayana', '9570d238a935f4bad98ed85dac7659e9', 'ayana14@gmail.com', '909429.jpg', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
