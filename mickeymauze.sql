-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2024 pada 18.50
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mickeymauze`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `IDbeli` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `pembeli` varchar(255) NOT NULL,
  `beli` char(10) DEFAULT NULL,
  `ulasan` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`IDbeli`, `id_produk`, `pembeli`, `beli`, `ulasan`, `rating`) VALUES
(22, 32, 'Jeremy', 'true', 'Games Keren', 5),
(23, 33, 'Jeremy', 'true', 'Nostalgia ', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(6) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `pic` char(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `pic`, `deskripsi`, `harga`) VALUES
(28, 'FIFA 22', 'fifa.jpg', 'Games Sepakbola Fifa', '500000.00'),
(29, 'GTA 5', 'gta.jpg', 'Games GTA V', '500000.00'),
(30, 'E-FOOTBALL PES 2021', 'pes.jpg', 'Games Sepakbola PES 2021', '350000.00'),
(32, 'GTA 4', 'gta4.jpeg', 'Games GTA 4', '500000.00'),
(33, 'GTA SAN ANDREAS', 'gtasa.jpg', 'Games GTA San Andreas', '200000.00'),
(34, 'RAINBOW SIX SIEGE', 'r6.jpeg', 'Games R6', '345000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `pass`) VALUES
(1, 'admin', '$2y$10$73s53ui31u6SjqpRa5r4MuOdt4ui4KCtbTtVwVisIpoKjv7SN9QiO'),
(2, 'rayhan', '$2y$10$54e39fQDNG97QPuVXdIHkeoLVUdQLBaNxYUWU54i8W7Sf.HswST0.'),
(3, 'kenny', '$2y$10$WgNuiMNZJG/SLYVHs19LW.6lofJil76CK2EgoAG7kfRWrfo1ZDViS'),
(4, 'juki', '$2y$10$iG86ipKQm57LEWeHOHwLyuIlrQAAKLUHctTaUqE6pYFZtAF/7onTC'),
(7, 'yusril', '$2y$10$ieQ0cWC5yrw2AFJRjkNbC.stUM3LJm0BymacO3QfpSDwNrZS0UUQG'),
(8, 'daffa', '$2y$10$EStBv1Dch9lqmSLmAxcrgO5CbW9Whw.PX7eKbAnKN7FfusnUEHwnm'),
(9, 'Jeremy', '$2y$10$5h0iZWnkKIvJsG74n943L.7mzjdv7PglhSrzAFkWT6gjM2sJzPKdG');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`IDbeli`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `IDbeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
