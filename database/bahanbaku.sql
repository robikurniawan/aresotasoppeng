-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 28 Nov 2018 pada 20.44
-- Versi Server: 5.6.35
-- PHP Version: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bahanbaku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` enum('produksi','gudang','admin','pimpinan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Bagian Administrasi', 'admin'),
(2, 'produksi', 'edf3017a2946290b95c783bd1a7f0ba7', 'Bagian Produksi', 'produksi'),
(3, 'gudang', '202446dd1d6028084426867365b0c7a1', 'Bagian Gudang', 'gudang'),
(4, 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'Pimpinan', 'pimpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_aparat`
--

CREATE TABLE `tbl_aparat` (
  `id_aparat` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_aparat`
--

INSERT INTO `tbl_aparat` (`id_aparat`, `nip`, `nama`, `jabatan`, `foto`) VALUES
(9, '', 'H. MUKHLIS', 'Kepala Dusun Transari', ''),
(10, '', 'MUCHLIS', 'Kepala Dusun Kabubu', ''),
(11, '', 'SUGIONO', 'Kepala Dusun Mekar Sari', ''),
(12, '', 'SAHABU', 'Kepala Urusan Umum', ''),
(13, '', 'EKO PURDIYANTO', 'Kepala Urusan Keuangan', ''),
(14, '', 'NURROHMAN', 'Kepala Urusan Administrasi', ''),
(15, '', 'INDRASARI', 'Kepala Seksi KESRA', ''),
(16, '', 'NURDIN', 'Kepala Seksi Pembangunan', ''),
(17, '', 'KUSWANDI', 'Kepala Seksi Pemerintahan', ''),
(18, '', 'MUH. ARIFIN. As', 'Sekertaris Desa', ''),
(19, '', 'MARJUNI', 'Kepala Desa', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bahan`
--

CREATE TABLE `tbl_bahan` (
  `id_bahan` int(11) NOT NULL,
  `nm_bahan` varchar(100) NOT NULL,
  `supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_bahan`
--

INSERT INTO `tbl_bahan` (`id_bahan`, `nm_bahan`, `supplier`) VALUES
(7, 'Bahan 1 ', 3),
(8, 'Bahan 2', 2),
(9, 'Bahan 3', 1),
(10, 'Bahan 4', 3),
(12, 'Bahan 5', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bahan_baku`
--

CREATE TABLE `tbl_bahan_baku` (
  `id_bahan_baku` int(11) NOT NULL,
  `bahan` int(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `ket` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jenis_bahan` int(11) NOT NULL,
  `jenis` enum('permintaan','persediaan','pengiriman','preorder') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_bahan_baku`
--

INSERT INTO `tbl_bahan_baku` (`id_bahan_baku`, `bahan`, `qty`, `satuan`, `ket`, `tgl_masuk`, `jenis_bahan`, `jenis`) VALUES
(1, 0, 10, 'Kg', 'Testing Bahan 1', '2018-01-01', 2, 'permintaan'),
(2, 0, 90, 'Kg', 'Testing', '2018-02-01', 1, 'permintaan'),
(3, 123, 123, '13', 'xx', '2018-01-01', 3, 'permintaan'),
(4, 123, 123, '13', '123', '2018-01-01', 3, 'persediaan'),
(5, 10, 10, 'Kg', 'Tes', '2018-05-01', 3, 'pengiriman'),
(6, 12, 10, 'Kg', 'Tes', '2018-01-01', 2, 'permintaan'),
(7, 10, 90, 'Kg', 'Makas', '2022-01-01', 2, 'persediaan'),
(8, 9, 5, 'Kg', 'xx', '2018-01-01', 2, 'persediaan'),
(9, 10, 99, 'Kg', 'Ket', '2018-02-01', 1, 'persediaan'),
(10, 10, 10, 'Kg', 'xx', '2018-01-01', 2, 'preorder');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_bahan`
--

CREATE TABLE `tbl_jenis_bahan` (
  `id_jenis_bahan` int(11) NOT NULL,
  `nm_jenis_bahan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_jenis_bahan`
--

INSERT INTO `tbl_jenis_bahan` (`id_jenis_bahan`, `nm_jenis_bahan`) VALUES
(1, 'Jenis Bahan Baku 1'),
(2, 'Jenis Bahan Baku 2'),
(3, 'Jenis Bahan Baku 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nm_supplier` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `nm_supplier`, `alamat`) VALUES
(1, 'Supplier 1', 'Makassar'),
(2, 'Supplier 2', 'Makassar'),
(3, 'Supplier 3 ', 'Makassar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_aparat`
--
ALTER TABLE `tbl_aparat`
  ADD PRIMARY KEY (`id_aparat`);

--
-- Indexes for table `tbl_bahan`
--
ALTER TABLE `tbl_bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `tbl_bahan_baku`
--
ALTER TABLE `tbl_bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`);

--
-- Indexes for table `tbl_jenis_bahan`
--
ALTER TABLE `tbl_jenis_bahan`
  ADD PRIMARY KEY (`id_jenis_bahan`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_aparat`
--
ALTER TABLE `tbl_aparat`
  MODIFY `id_aparat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_bahan`
--
ALTER TABLE `tbl_bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_bahan_baku`
--
ALTER TABLE `tbl_bahan_baku`
  MODIFY `id_bahan_baku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_jenis_bahan`
--
ALTER TABLE `tbl_jenis_bahan`
  MODIFY `id_jenis_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
