-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2021 pada 00.29
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amilamsari_311910534`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_pembeli`
--

CREATE TABLE `log_pembeli` (
  `id_log` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat_lama` varchar(100) DEFAULT NULL,
  `alamat_baru` varchar(100) DEFAULT NULL,
  `waktu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_pembeli`
--

INSERT INTO `log_pembeli` (`id_log`, `nama`, `alamat_lama`, `alamat_baru`, `waktu`) VALUES
(1, 'Aisyah', 'Jl. Jalak No 9', 'Jl.', '2021-07-19'),
(2, 'Rasya', 'Jl. Sukaraya 7 No 2', 'Jl.sukaraya', '2021-07-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_produk`
--

CREATE TABLE `log_produk` (
  `id_log` int(11) NOT NULL,
  `nama_prd` varchar(30) DEFAULT NULL,
  `stok_lama` int(11) DEFAULT NULL,
  `stok_baru` int(11) DEFAULT NULL,
  `waktu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_produk`
--

INSERT INTO `log_produk` (`id_log`, `nama_prd`, `stok_lama`, `stok_baru`, `waktu`) VALUES
(1, 'Pulpen', 100, 300, '2021-07-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` int(11) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `kelas` varchar(6) DEFAULT NULL,
  `jurusan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pmb` int(11) NOT NULL,
  `nama_pmb` varchar(30) DEFAULT NULL,
  `no_tlf` int(12) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pmb`, `nama_pmb`, `no_tlf`, `alamat`) VALUES
(13, 'jannah', 2147483647, 'jl.mekarmukti'),
(22, 'Rasya', 2147483647, 'Jl.sukaraya'),
(23, 'Lala', 2147483647, 'Jl. Mawar No 10');

--
-- Trigger `pembeli`
--
DELIMITER $$
CREATE TRIGGER `update_alamat` BEFORE UPDATE ON `pembeli` FOR EACH ROW BEGIN
INSERT INTO log_pembeli
SET nama = OLD.nama_pmb,
alamat_lama = OLD.alamat,
alamat_baru = NEW.alamat,
waktu = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perpustakaan`
--

CREATE TABLE `perpustakaan` (
  `id` int(11) NOT NULL,
  `kode` varchar(6) DEFAULT NULL,
  `buku` varchar(30) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perpustakaan`
--

INSERT INTO `perpustakaan` (`id`, `kode`, `buku`, `tanggal`) VALUES
(90, 'D907', 'Masakan Padang', '2021-06-01'),
(98, 'C870', 'Belajar PHP Dasar', '2021-05-08'),
(99, 'B908', 'Sejarah Matematika', '2021-03-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_prd` int(11) NOT NULL,
  `kode_prd` varchar(30) DEFAULT NULL,
  `nama_prd` varchar(30) DEFAULT NULL,
  `harga_prd` int(11) DEFAULT NULL,
  `stok_prd` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_prd`, `kode_prd`, `nama_prd`, `harga_prd`, `stok_prd`) VALUES
(10, NULL, 'Penghapus', 1000, 100),
(13, NULL, 'roko', 200000, 34),
(60, 'C10', 'Pulpen', 2500, 300);

--
-- Trigger `produk`
--
DELIMITER $$
CREATE TRIGGER `update_produk` BEFORE UPDATE ON `produk` FOR EACH ROW BEGIN
INSERT INTO log_produk
set nama_prd = OLD.nama_prd,
stok_lama=OLD.stok_prd,
stok_baru=NEW.stok_prd,
waktu=NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trs` int(11) NOT NULL,
  `id_prd` int(11) DEFAULT NULL,
  `id_pmb` int(11) DEFAULT NULL,
  `jml_prd` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_trs`, `id_prd`, `id_pmb`, `jml_prd`, `total_harga`) VALUES
(12, 10, 22, 10, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(11, 'Ami Lamsari', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log_pembeli`
--
ALTER TABLE `log_pembeli`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `log_produk`
--
ALTER TABLE `log_produk`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pmb`);

--
-- Indeks untuk tabel `perpustakaan`
--
ALTER TABLE `perpustakaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_prd`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trs`),
  ADD KEY `id_prd` (`id_prd`),
  ADD KEY `id_pmb` (`id_pmb`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_pembeli`
--
ALTER TABLE `log_pembeli`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `log_produk`
--
ALTER TABLE `log_produk`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perpustakaan`
--
ALTER TABLE `perpustakaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_prd`) REFERENCES `produk` (`id_prd`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pmb`) REFERENCES `pembeli` (`id_pmb`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
