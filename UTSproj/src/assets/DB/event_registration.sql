-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 06:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id_events` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `max_capacity` int(11) NOT NULL,
  `location` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id_events`, `event_name`, `date_time`, `max_capacity`, `location`, `description`, `photo`, `created_at`, `status`) VALUES
(14, 'ERIC CHOU', '2024-10-21 13:25:00', 100, 'Jakarta, Indonesia', 'AVAILABLE NOW!!!\r\n', 'assets/images/blog/eric-chou-instagram_ratio-16x9.jpg', '2024-10-21 06:26:00', 'closed'),
(18, 'JBL Festival', '2024-10-26 13:11:00', 200, 'ISTORA SENAYAN JAKARTA', '✨ Hanya tinggal beberapa hari lagi menuju JBL Festival 2024! 🎉\r\n\r\nSiapkan dirimu untuk pengalaman musik yang tak terlupakan! Saksikan penampilan luar biasa dari artis-artis terbaik tanah air seperti Tulus, Ari Lasso, Maliq & D’Essentials, Gigi, Kahitna, Mahalini, Lyodra, Project Pop, dan Eclat. Acara ini akan berlangsung pada tanggal 26-27 Oktober di ISTORA SENAYAN, JAKARTA.\r\n\r\n🎟️ Buruan beli tiketnya sekarang melalui www.jblfestival.com dan jangan lewatkan kesempatan untuk menikmati festival musik dengan lineup TER-asyik! Kami pastikan kamu akan merasakan suasana yang nyaman, dijamin tidak akan kepanasan selama festival berlangsung!\r\n\r\nDengan berbagai penampilan yang memukau dan atmosfer yang penuh semangat, JBL Festival 2024 adalah tempat yang tepat untuk merayakan cinta kita terhadap musik. Nikmati momen berharga bersama teman-teman dan keluarga, serta buat kenangan yang tak terlupakan!\r\n\r\n🔍 Untuk info lebih lanjut, kunjungi kami di @onestepforward.id. Pastikan kamu mengikuti semua update dan berita terkini seputar festival ini!\r\n\r\nMari kita bersenang-senang dan merayakan musik bersama di JBL Festival 2024! 🎶\r\n\r\n#JakartaKonser #JBLFestival2024 #JBLFestival #MusicExperience #festivalvibes', 'assets/images/blog/Screenshot 2024-10-22 110846.png', '2024-10-22 04:11:26', 'open'),
(19, 'Big Bang Festival', '2024-12-21 14:12:00', 300, 'JIEXPO Kemayoran', '🌟 Akhir Tahun ke Mana? 🌟\r\n\r\nTentu saja, kita akan merayakan akhir tahun di Pesta Cuci Gudang yang penuh warna dan kegembiraan, yaitu Big Bang Festival 2024! 🎉\r\n\r\nBersiaplah untuk pengalaman yang tak terlupakan, karena selama 12 hari penuh, kamu bisa menikmati suasana belanja yang meriah sekaligus menyaksikan konser spektakuler yang dihadirkan oleh berbagai artis hebat! ✨ Mulai dari pertunjukan musik yang menggugah semangat hingga penawaran menarik dari berbagai brand, Big Bang Festival 2024 adalah tempat yang tepat untuk menghabiskan waktu bersama orang-orang terkasih.\r\n\r\nSalah satu penampilan yang sangat ditunggu-tunggu adalah dari Whisnu Santika, yang akan menghibur kita pada tanggal 28 Desember 2024. Dengan suara khasnya dan penampilan yang energik, dia akan menambah kemeriahan festival ini! 🎶\r\n\r\nJangan lewatkan kesempatan untuk menikmati musik, belanja, dan bersenang-senang! Ajak teman, keluarga, dan orang-orang tersayangmu untuk ikut meramaikan Big Bang Festival 2024 yang akan berlangsung dari tanggal 21 Desember 2024 hingga 1 Januari 2025 di JIEXPO Kemayoran. Ini adalah kesempatan sempurna untuk menyambut tahun baru dengan penuh sukacita dan kebersamaan.\r\n\r\nPastikan kamu tidak melewatkan momen spesial ini! Catat tanggalnya dan siap-siap untuk bersenang-senang di Big Bang Festival 2024! 🎊\r\n\r\nIkuti terus informasi terbaru tentang acara ini, dan jangan ragu untuk membagikan kebahagiaan bersama kami!\r\n\r\n#JakartaKonser #BigBangFestival #BigBangStage #BigBangFest #BigBangFest2024 #AdaDibbo', 'assets/images/blog/Screenshot 2024-10-22 111154.png', '2024-10-22 04:13:13', 'open'),
(20, 'Shawn Mendes Tour 2024', '2024-12-27 19:25:00', 1000, 'ICE BSD', '🎤 Kabar Gembira untuk Para Fans Shawn Mendes! 🌟\r\n\r\nSiapkan dirimu untuk malam yang penuh dengan musik, emosi, dan kenangan tak terlupakan! Shawn Mendes akan menggelar konser spektakulernya di Indonesia dalam rangkaian Shawn Mendes World Tour 2024! 🎶\r\n\r\nBergabunglah dalam merayakan karya-karya luar biasa dari Shawn, mulai dari lagu-lagu hitnya seperti “Stitches,” “Treat You Better,” hingga “There’s Nothing Holdin’ Me Back.” Konser ini menjanjikan pengalaman yang intim dan penuh energi, di mana kamu bisa menyanyi bersama dan merasakan setiap lirik yang dihadirkannya. 🌈\r\n\r\nTiket sudah mulai dijual! Jangan sampai ketinggalan, karena tiket ini pasti akan terjual habis! 💥\r\n\r\nAjak teman-teman, keluarga, dan orang-orang tersayangmu untuk bersama-sama menikmati malam yang penuh pesona dan keajaiban ini. Saksikan Shawn Mendes menghipnotis kita dengan bakat dan karismanya di atas panggung!\r\n\r\nIkuti terus informasi terbaru mengenai acara ini dan persiapkan dirimu untuk pengalaman yang luar biasa! Jangan lupa gunakan hashtag #ShawnMendesIndonesia untuk berbagi momen-momen seru di konser nanti!\r\n\r\n💖 Kita jumpa di konser!\r\n\r\n#ShawnMendes #ShawnMendesWorldTour #JakartaKonser #MusicExperience', 'assets/images/blog/Screenshot 2024-10-22 111712.png', '2024-10-22 04:22:34', 'open'),
(21, 'Blackpink Tour 2024', '2024-11-26 11:27:00', 1500, 'ICE BSD', '💖 Kabar Gembira untuk Para Blinks! 💖\r\n\r\nSiapkan diri kalian untuk momen yang sangat ditunggu-tunggu! BLACKPINK akan kembali menggelar konser megah yang pasti akan memukau setiap penggemar di seluruh dunia! 🎤✨\r\n\r\nRasakan getaran luar biasa dari penampilan para anggota, yaitu Jisoo, Jennie, Rosé, dan Lisa, saat mereka membawakan lagu-lagu hits yang telah mendominasi tangga lagu internasional! Dari “DDU-DU DDU-DU” hingga “How You Like That,” konser ini akan dipenuhi dengan energi yang menggetarkan dan koreografi yang memukau. 🌟\r\n\r\nAjak teman-teman dan keluarga untuk menyaksikan aksi panggung yang luar biasa ini! Persiapkan diri kalian untuk merasakan kebersamaan dan cinta dari komunitas Blinks yang tak terhingga. Ini adalah kesempatan untuk menyanyi dan berdansa bersama, menciptakan kenangan yang akan dikenang selamanya! 🎉\r\n\r\nIkuti terus informasi terbaru seputar acara ini, dan jangan lupa untuk membagikan antusiasme kalian di media sosial dengan hashtag #BLACKPINKIndonesia. Kita siap merayakan cinta dan musik bersama!\r\n\r\n💖 Sampai jumpa di konser, Blinks!\r\n\r\n#BLACKPINK #BLACKPINKWorldTour #Blinks #KpopConcert #MusicExperience', 'assets/images/blog/Screenshot 2024-10-22 112342.png', '2024-10-22 04:25:15', 'canceled'),
(22, 'Rosie Solo Concert', '2024-10-19 14:26:00', 900, 'JIEXPO Kemayoran', 'Siapkan diri kalian untuk pengalaman luar biasa yang sangat ditunggu-tunggu! Rosé, anggota tercinta dari BLACKPINK, akan menggelar konser solonya yang pastinya akan menjadi momen tak terlupakan bagi semua penggemar! 🎤✨\r\n\r\nRasakan keindahan suara dan bakat luar biasa Rosé saat ia membawakan lagu-lagu hits dari album solo-nya, termasuk “On The Ground” dan “GONE.” Setiap penampilannya akan dipenuhi dengan emosi dan energi yang membuat kita semua terpesona. 🌟\r\n\r\nAjak teman-teman dan keluarga untuk merasakan suasana yang penuh cinta dan kebersamaan di konser ini! Bersiaplah untuk menyanyikan lagu-lagu favorit dan menikmati penampilan yang intim dan penuh semangat dari Rosé. Ini adalah kesempatan emas untuk melihat salah satu bintang terhebat dalam musik saat ini menampilkan kemampuannya di atas panggung!\r\n\r\nIkuti terus informasi terbaru mengenai konser ini, dan jangan lupa untuk berbagi kebahagiaan kalian di media sosial dengan hashtag #RoséSoloConcert. Mari kita dukung Rosé dan ciptakan kenangan yang tak terlupakan bersama!\r\n\r\n💖 Sampai jumpa di konser, fans Rosé!\r\n\r\n#Rosé #BLACKPINK #RoséSoloConcert #KpopConcert #MusicExperience', 'assets/images/blog/Screenshot 2024-10-22 112546.png', '2024-10-22 04:27:12', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `registration_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `tickets` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `foto` varchar(50) DEFAULT NULL,
  `id_events` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `username`, `password`, `role`, `foto`, `id_events`) VALUES
(1, 'admin@example.com', 'admin', '$2y$10$oV1xY7SBOUUgYxFIus6yL.EAl41qp2hiIMiYkJyam9pB6KaygsAMG', 'admin', NULL, NULL),
(5, 'gh3bonk008@gmail.com', 'Austin Gilbert ', '$2y$10$/Nid4zLYA.a9TyOrcfdWAOEmT5MGJCpyUaR1xm0RblUXywOarWGTm', 'user', '5fb0d460-8167-4f3a-8ef0-87654ebade7d.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_events`),
  ADD UNIQUE KEY `created_at` (`created_at`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_events` (`id_events`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_events` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id_events`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_events`) REFERENCES `events` (`id_events`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
