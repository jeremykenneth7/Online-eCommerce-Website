-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2022 at 04:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

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
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `IDbeli` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `pembeli` varchar(255) NOT NULL,
  `beli` char(10) DEFAULT NULL,
  `ulasan` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`IDbeli`, `id_produk`, `pembeli`, `beli`, `ulasan`, `rating`) VALUES
(12, 17, 'rayhan', 'true', 'Gamenya keren dan bagus,tidak ada masalah sama sekali', 5),
(13, 9, 'kenny', 'true', 'Sering adanya error jadi tidak bisa maksimal', 3),
(14, 13, 'yusril', 'true', 'Video editor terbaik menurut saya', 5),
(15, 19, 'daffa', 'true', 'Barang bagus tetapi sedikit ribet dalam proses install', 4);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(6) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `pic` char(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `pic`, `deskripsi`, `harga`) VALUES
(1, 'KALI LINUX 2021.3 NEWEST UPDATE', 'linux.jpg', 'Kali Linux Download ISO adalah versi terbaru dari sistem operasi Kali Linux 2021.3 yang mana memiliki banyak fitur dibandingkan versi sebelumnya.', '100000.00'),
(5, 'GRAND THEFT AUTO GAMES WINDOWS', 'GTAV.jpg', 'Three iconic cities, three epic stories. Play the genre-defining classics of the original Grand Theft Auto Trilogy: Grand Theft Auto III, Grand Theft Auto: Vice City and Grand Theft Auto: San Andreas updated for a new generation', '500000.00'),
(6, 'DRIVERPACK SOLUTION 2022 FLASHDISK ', 'driver.png', 'DriverPack Solution Offline mudah digunakan, dan semua dalam satu solusi yang memungkinkan Anda menginstal semua driver untuk semua perangkat keras yang terpasang di komputer Anda dengan beberapa langkah mudah.', '80000.00'),
(7, 'WINDOWS 7 AND WINDOWS 10 FLASHDISK', 'windows.jpg', 'Seri terbaru dari windows paling lengkap, antara lain Windows 7 dan Windows 10 dalam satu ISO pertama. Di dalam paket ISO Windows 7, 10 AIO ini sudah termasuk update windows terbaru dan Build terbaru.', '95000.00'),
(8, 'COREL DRAW 2020 WINDOWS', 'corel.png', 'CorelDraw menjadi salah satu aplikasi design berbasis vektor yang banyak digunakan oleh para designer professional. Menjadi salah satu software terbaik dibidangnya, software design ini bersaing dengan beberapa program sejenisnya seperti Adobe Illustrator ', '150000.00'),
(9, 'AGE OF EMPIRES 2 GAMES WINDOWS', 'age.jpg', 'Age of Empires II: Definitive Edition celebrates the 20th anniversary of one of the most popular strategy games ever with stunning 4K Ultra HD graphics, a new and fully remastered soundtrack, and brand-new content, “The Last Khans” with 3 new campaigns', '350000.00'),
(11, 'ADOBE PHOTOSHOP 2020 WINDOWS', 'adobe.jpg', 'Photoshop sering dikenal sebagai aplikasi photo editing dengan segudang fungsi yang dapat kalian nikmati di berbagai device seperti komputer atau PC, iPad, hingga mobile phone. Tidak hanya itu, software ini juga sering diandalkan untuk urusan design seper', '150000.00'),
(13, 'MAGIX VEGAS PRO 18 WINDOWS', 'vegas.jpg', 'Magix terus mengembangkan aplikasi video editing ini agar dapat bersaing dengan Adobe Premiere Pro atau Da Vinci Resolve. Walaupun tidak sepamor kedua software video editor itu, Vegas tetap menjadi andalan untuk beberapa editor professional hingga youtube', '150000.00'),
(14, 'DAVINCI RESOLVE STUDIO 17', 'davinci.jpg', 'Merupakan software video editing dari Blackmagic Design. Dengan menggunakan DaVinci Resolve 17 free download kalian dapat menghasilkan karya video yang keren. Jika dilihat, Blackmagic sebagai perusahaan pembuat kamera video, sangat serius untuk menandingi', '150000.00'),
(16, 'CYBERPUNK 2077 GAMES WINDOWS', 'cyberpunk.jpeg', 'Cyberpunk 2077 is an action role-playing video game developed and published by CD Projekt. The story takes place in Night City, an open world set in the Cyberpunk universe. ', '500000.00'),
(17, 'FIFA 2019 GAMES WINDOWS', 'fifa.jpg', 'FIFA 19 is a football simulation video game developed by EA Vancouver and released by Electronic Arts on 28 September 2018 for PlayStation 3, PlayStation 4, Xbox 360, Xbox One, Nintendo Switch, and Microsoft Windows. It is the 26th installment in the FIFA', '500000.00'),
(18, 'ADOBE PREMIERE PRO 2020 WINDOWS', 'premierepro1.jpg', 'Dunia video editing mendapat kabar menggembirakan setelah melihat Adobe merilis versi terbarunya untuk 2020. Software video editor yang sudah banyak berpartisipasi dalam film hollywood ini memang dikenal sangat powerful.\r\n', '150000.00'),
(19, 'FILMORA VIDEO EDITOR WINDOWS', 'filmora.png', 'Wondershare Filmora is a simple video editor that empowers your stories. Download the latest version 11 to transform precious moments into stunning videos ', '150000.00'),
(20, 'HORIZON ZERO DOWN GAMES WINDOWS', 'horizon.jpg', 'Horizon Zero Dawn is a 2017 action role-playing game developed by Guerrilla Games and published by Sony Interactive Entertainment. The plot follows Aloy, a young huntress in a world overrun by machines, who sets out to uncover her past.', '300000.00'),
(21, 'RESIDENT EVIL VILLAGE GAMES WINDOWS', 'RE VILLAGE.png', 'Resident Evil Village is a 2021 survival horror game developed and published by Capcom. It is the sequel to Resident Evil 7: Biohazard. Players control Ethan Winters, who searches for his kidnapped daughter in a village filled with mutant creatures. ', '500000.00'),
(23, 'ADOBE MASTER COLLECTION WINDOWS', 'master.jpg', 'Versi All In One terbaru dari perangkat lunak Adobe Master Collection CC 2022. Perangkat lunak terbaru memiliki kinerja lebih cepat dari versi sebelumnya. Adobe Master Collection 2022 Full Version ini berisi koleksi lengkap, sehingga Anda tidak perlu meng', '500000.00'),
(24, 'FORMULA 1 2020 GAMES WINDOWS', 'f1.jpg', 'F1 2020 is the official video game of the 2020 Formula 1 and Formula 2 Championships developed and published by Codemasters. ', '500000.00'),
(25, 'CS GLOBAL OFFENSIFE GAMES WINDOWS', 'cs.jpg', 'Counter-Strike: Global Offensive is a 2012 multiplayer first-person shooter developed by Valve and Hidden Path Entertainment. It is the fourth game in the Counter-Strike series.', '300000.00'),
(26, 'FL STUDIO 20.8.3 WINDOWS', 'fl.jpg', 'FL Studio is a digital audio workstation developed by the Belgian company Image-Line. FL Studio features a graphical user interface with a pattern-based music sequencer. The program is available in four different editions for Microsoft Windows and macOS.', '300000.00'),
(27, 'FINAL CUT PRO X 2022 MAC OS', 'fc.jpg', 'Final Cut Pro, previously Final Cut Pro X, is professional non-linear video editing software published by Apple Inc. as part of their Pro Apps family of software programs. It was released on June 21, 2011 for sale in the Mac App Store. It is the successor', '150000.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`) VALUES
(1, 'admin', '$2y$10$73s53ui31u6SjqpRa5r4MuOdt4ui4KCtbTtVwVisIpoKjv7SN9QiO'),
(2, 'rayhan', '$2y$10$54e39fQDNG97QPuVXdIHkeoLVUdQLBaNxYUWU54i8W7Sf.HswST0.'),
(3, 'kenny', '$2y$10$WgNuiMNZJG/SLYVHs19LW.6lofJil76CK2EgoAG7kfRWrfo1ZDViS'),
(4, 'juki', '$2y$10$iG86ipKQm57LEWeHOHwLyuIlrQAAKLUHctTaUqE6pYFZtAF/7onTC'),
(7, 'yusril', '$2y$10$ieQ0cWC5yrw2AFJRjkNbC.stUM3LJm0BymacO3QfpSDwNrZS0UUQG'),
(8, 'daffa', '$2y$10$EStBv1Dch9lqmSLmAxcrgO5CbW9Whw.PX7eKbAnKN7FfusnUEHwnm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`IDbeli`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `IDbeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
