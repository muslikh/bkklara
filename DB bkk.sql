-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 02:05 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkk`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnis`
--

CREATE TABLE `alumnis` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_jurusan` int(10) UNSIGNED DEFAULT NULL,
  `role_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telepon` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_lahir` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tahun_lulus` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8_unicode_ci,
  `gambar` longtext COLLATE utf8_unicode_ci,
  `keahlian` text COLLATE utf8_unicode_ci,
  `tinggi` int(10) UNSIGNED DEFAULT NULL,
  `berat` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'belum_aktif',
  `keterangan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `alumnis`
--

INSERT INTO `alumnis` (`id`, `id_jurusan`, `role_id`, `nik`, `nama`, `email`, `telepon`, `password`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `tahun_lulus`, `status_user`, `alamat`, `gambar`, `keahlian`, `tinggi`, `berat`, `status`, `keterangan`, `updated_at`, `created_at`) VALUES
(1, 1, '1', '35100909', 'Khulaimi', 'khulaimi@gmail.com', '0343885332', '$2y$10$qniGjhCOrEtgOFDzrFbPMOvW1Rf0Tgt6GPclG/9Ha7M8V6JxXfUz.', 'Pasuruan', '2020-01-07', 'Laki-Laki', '2016', 'SANTUY', 'Jlan Jalan', '', 'kepo', 4, 0, 'aktif', 'Bekerja di Cv. Amanah Soft', '2020-12-16 22:37:26', '0000-00-00 00:00:00'),
(2, 2, '1', 'sd', 'sfd', 'smk@gmail.com', '0343165', '3', NULL, '27/1/2015', '1', '2016', 'SANTUY', 'ledug', '/image/default.png', 'administrator', 100, 50, 'aktif', NULL, '2020-09-04 23:14:53', '0000-00-00 00:00:00'),
(5, 4, '2', '3', 'Alumni2', 'alumni32@gmail.com', '0823456789', '3', 'Pasuruan', '19-6-2020', 'Laki - Laki', '2016', 'belum_bekerja', 'prigen', 'imageqatyjf2gayhf9eyh53qv.jpg', 'coding', 150, 50, 'belum_aktif', NULL, '2020-12-07 14:25:27', '0000-00-00 00:00:00'),
(6, NULL, NULL, NULL, 'AS', 'akubingunp255@gmail.com', 'a', '$2y$10$WPIqqOCC8zqEZonBKsSsUu0kLdxEDh.p8RpjN/3lykMzKeoCe3Khu', 'asd', 'asd', 'asd', NULL, 'kuliah', 'sdad', NULL, 'kepo', NULL, NULL, 'belum_aktif', 'Kuliah Di ITB', '2020-12-16 22:37:22', '2020-09-01 08:14:40'),
(7, 4, '3', '88', 'HaciBi', 'hc@gmail.com', '58', '8', 'Boyo', '05-08-2020', 'Laki - Laki', '2014', 'belum_bekerja', 'Ledug', 'imagef30r7d3f50apjb55qvte.jpg', 'Teknik Sepeda Motor', 157, 44, 'aktif', 'Bekerja di Cv. Amanah Soft', '2020-12-13 06:33:34', '0000-00-00 00:00:00'),
(76, NULL, NULL, NULL, '12', '12@a.a', '12', '$2y$10$OTtjFAO6qKQ1iv2M2yPKfeKHsGn.0S1BVJz2oRMVM4tpwH3ozAYsy', '12', '12', '12', NULL, NULL, '12', NULL, 'opo ae', NULL, NULL, 'aktif', NULL, '2020-12-16 22:37:30', '2020-12-11 22:32:06'),
(77, NULL, NULL, NULL, 'asd', 'asd@a.a', 'asd', '$2y$10$qniGjhCOrEtgOFDzrFbPMOvW1Rf0Tgt6GPclG/9Ha7M8V6JxXfUz.', 'asd', 'asd', 'asd', NULL, NULL, 'asd', NULL, 'iso kabeh', NULL, NULL, 'aktif', NULL, '2020-12-16 22:37:34', '2020-12-13 17:39:42'),
(78, NULL, NULL, NULL, 'joni', 'joni@gmail.com', NULL, '$2y$10$3QfmuzWLNnNWQH9yyMp.Ae1htN6ba92od/XNjUz1xsildrU7uVqKu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum_aktif', NULL, '2020-12-16 17:53:29', '2020-12-16 17:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `artikels`
--

CREATE TABLE `artikels` (
  `id` int(10) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `isi_artikel` text CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `penulis` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikels`
--

INSERT INTO `artikels` (`id`, `judul`, `isi_artikel`, `penulis`, `created_at`, `updated_at`) VALUES
(6, 'Belajar Kunci Sukses dari Orang Suksess', '<p><strong>Kunci Sukses Itu Berawal Dari Pikiran Anda</strong></p>\r\n\r\n<p><img alt=\"Bahagia Dulu Baru Sukses atau Sukses Dulu Baru Bahagia? - Kompasiana.com\" src=\"data:image/jpeg;base64,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\" /></p>\r\n\r\n<p><strong>Apa Kunci Abdurrahman bin &lsquo;Auf?</strong></p>\r\n\r\n<p>Saat saya sedang belajar kunci sukses, saya teringat sebuah perkataan salah satu sahabat Rasulullah saw yang paling kaya dan&nbsp; dijamin masuk syurga, yairu Abdurrahman bin &lsquo;Auf r.a. yang berkata</p>\r\n\r\n<p>&ldquo;<em>Hingga seandainya aku angkat sebuah batu, maka dibawahnya kudapati emas dan perak.</em>&rdquo; (<strong>Abdurrahman bin &lsquo;Auf r.a.</strong>)</p>\r\n\r\n<p>Mungkin untuk sebagian orang, perkataan ini sepertinya sebuah kesombongan. Namun tidak mungkin sahabat yang dijamin masuk syurga ini bermaksud sombong. Saya melihat perkataan ini sebagai bentuk sebuah keyakinan yang dimilikinya, bahwa jika beliau berusaha, maka beliau akan mendapatkan hasil.</p>\r\n\r\n<p>Jadi kuncinya adalah keyakinan yang ada dalam pikiran Anda. Jika Anda yakin, maka Anda tidak akan ragu untuk berusaha, untuk bertindak, dan mengambil resiko dalam berbisnis. Keyakinan akan membentuk tindakan Anda. Tindakan yang dilandasi keyakinan akan berbeda dengan tindakan tanpa keyakinan. Bahkan, jika tidak ada keyakinan sama sekali, kebanyakan orang diam, tidak pernah bertindak.</p>\r\n\r\n<p>Saat ada orang yang berkata bahwa kunci sukses itu adalah tindakan, pertanyaanya adalah tindakan seperti apa? Untuk menjadi sukses Anda memerlukan tindakan tertentu dan dengan cara tertentu. Dan tindakan yang akan membawa Anda kepada keberhasilan adalah tindakan yang dilandasi oleh keyakinan yang kuat.</p>\r\n\r\n<p>Keyakinan yang kuat akan menghasilkan tindakan yang kuat sehingga mampu menghadapi rintangan. Tindakan yang terarah sehingga efektif menuju tujuan. Berbeda dengan tindakan tanpa keyakinan yang biasanya mudah menyerah, bahkan dengan alasan sepele.</p>\r\n\r\n<p>Keyakinan membentuk tindakan, dan keyakinan ada di dalam pikiran Anda. Jadi, kunci sukses bukan pada tindakannya, tetapi pada pikiran Anda yang akan menghasilkan tindakan sukses.</p>\r\n\r\n<p><strong>Belajar dari Muhammad Al Fatih</strong></p>\r\n\r\n<p>Jika Anda belum mengetahui siapa Muhammad Al Fatih, saya sudah membahasnya pada artikel saya di Motivasi Islami, pada artikel tersebut sudah saya bahas bagaimana Muhammad Al Fatih bisa menaklukan Kota Konstantinopel. Ada satu hal penting yang perlu kita petik pelajarannya, bahwa sebelum beliau mempersiapkan pasuksan dan sebagainya, sejak kecil beliau selalu diyakinkan oleh para gurunya bahwa beliaulah sang penakluk itu sebagai mana dikatakan oleh Rasulullah saw dalam hadist berikut ini:</p>\r\n\r\n<p>&ldquo;<em>Kota Konstantinopel akan jatuh ke tangan Islam. Pemimpin yang menaklukkannya adalah sebaik-baik pemimpin dan pasukan yang berada di bawah komandonya adalah sebaik-baik pasukan</em>.&rdquo; [<strong>H.R. Ahmad bin Hanbal Al-Musnad 4/335</strong>]</p>\r\n\r\n<p>Syaikh Aaq Syamsuddin selalu menanamkan hal ini sejak Muhammad Fatih kecil.</p>\r\n\r\n<p>Dari keyakinan inilah Muhammad Al Fatih sangat ingin merealisasikan hadits Rasulullah saw tersebut.</p>\r\n\r\n<p>Tentu saja, seperti dijelaskan pada artikel tersebut, ada banyak tindakan yang dilakukan oleh Muhammad Al Fatih, tetapi semua tindakan itu dilandasi oleh pikirannya yang memiliki visi kuat tentang penaklukan itu. Sekali lagi, kunci sukses itu berawal dari pikiran.</p>\r\n\r\n<p><strong>Memiliki Visi Yang Kuat dan Keyakinan Untuk Meraihnya</strong></p>\r\n\r\n<p>Jika kita belajar kepada dua tokoh diatas, kita bisa melihat bahwa sebagian dari kunci sukses itu adalah memiliki visi yang kuat dan keyakinan untuk meraihnya. Saat seseorang yang sudah memiliki dua hal ini, maka dia akan bertindak dengan kualitas dan kuantitas yang cukup.</p>\r\n\r\n<p>Abdurrahman bin &lsquo;Auf tidak ragu untuk berdagang dan berinvestasi, bahkan saat beliau baru saja hijrah, meliau menolak pemberian kaum Anshar yang dipersaudarakan dengannya, tetapi lebih memilih untuk bertindak sendiri, yaitu dengan berdagang. Hal ini tidak mungkin dilakukan jika beliau tidak memiliki keyakinan yang kuat.</p>\r\n\r\n<p>Begitu juga dengan Muhammad Al Fatih, tidak ragu lagi untuk mempersiapkan segala aspek untuk menaklukan Kota Konstantinopel, mulai dari persiapan pasukan, pengadaan senjata, persiapan angkatan laut, persiapan membangun benteng, dan segalanya.</p>\r\n\r\n<p>Memang untuk sukses kita harus bertindak, tetapi bukan tindakan sembarangan. Sukses datang dari tindakan yang luar biasa, yang datang dari pikiran yang baik pula.Banyak orang yang mengatakan bahwa pikiran yang baik ini disebut dengan pikiran positif.</p>\r\n\r\n<p>Sekarang kita bisa menjawab, apakah sukses bisa dicapai dengan hanya berpikir positif?</p>\r\n\r\n<p>Jika seseorang berpikir positif, maka dia pasti melakukan tindakan. Kata &ldquo;hanya&rdquo; akan langsung gugur karena tidak mungkin ada istilah &ldquo;hanya berpikir positif&rdquo;. Berpikir positif akan selalu menghasilkan tindakan. Berpikir positif dan tindakan adalah satu kesatuan yang tidak bisa dipisahkan. Orang yang bertanya &ldquo;apakah bisa sukses hanya dengan berpikir positif&rdquo; adalah yang belum faham apa itu berpikir positif.</p>\r\n\r\n<p>Jika ada orang yang mengaku berpikir positif tetapi belum bertindak, dia hanya ngaku-ngaku saja. Sebenarnya dia belum berpikir positif, dia hanya merasa saja. Orang yang memiliki pikiran negatif akan diliputi oleh keraguan, malas, pesimis, dan selalu punya alasan untuk tidak bertindak. Salah satu ciri yang menonjol dari orang yang berpikir negatif adalah mengatakan &ldquo;tidak mungkin&rdquo; padahal sebenarnya mungkin.</p>\r\n\r\n<p>Dan, yang paling bahaya adalah, orang yang memiliki pikiran negatif kadang merasa sudah memiliki pikiran positif. Dia merasa baik-baik saja, dia merasa tidak perlu memperbaiki diri. Padahal jelas, jika ada perasaan ini pada diri Anda, artinya perlu perbaikan pada pikiran Anda.</p>\r\n\r\n<p>Nah, untuk memperbaiki dan meningkatkan mindset Anda menjadi mindset yang lebih sukses, saya sudah membuat ebook dan audio untuk membantu Anda. Terlepas sudah sejauh mana pikiran Anda, jika ingin meningkatkanya lagi, silahkan pelajari ebook dan Audio&nbsp;<a href=\"http://www.zonasukses.com/paket1.php\"><strong>Beautiful Mind Power yang bisa didapatkan disini</strong></a>. Anda akan menemukan kunci sukses pada ebook ini.</p>', 'Admin BKK', '2020-09-05 00:01:23', '2020-12-12 03:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id_jurusan` int(10) UNSIGNED NOT NULL,
  `jurusan` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id_jurusan`, `jurusan`) VALUES
(1, 'AKUNTANSI'),
(2, 'MULTIMEDIA'),
(3, 'PERHOTELAN'),
(4, 'TEKNIK KOMPUTER DAN JARINGAN'),
(5, 'TATA BOGA'),
(6, 'TEKNIK SEPEDA MOTOR');

-- --------------------------------------------------------

--
-- Table structure for table `keterserapan`
--

CREATE TABLE `keterserapan` (
  `id_keterserapan` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_industri` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `keterserapan`
--

INSERT INTO `keterserapan` (`id_keterserapan`, `id_user`, `id_industri`) VALUES
(1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lamarans`
--

CREATE TABLE `lamarans` (
  `id_lamaran` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_lowongan` int(10) NOT NULL,
  `status` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8_unicode_ci,
  `tanggal` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lamarans`
--

INSERT INTO `lamarans` (`id_lamaran`, `id_user`, `id_lowongan`, `status`, `pesan`, `tanggal`, `tanggal2`, `updated_at`, `created_at`) VALUES
(27, 1, 3, 'diterima', 'Selamat Kamu Sudah DI Terima, Silahkan Segera datang ke kantor ya', '08-08-2020', '08-08-2020', '2020-12-16 17:52:39', '0000-00-00 00:00:00.000000'),
(29, 2, 4, 'diproses', 'Data lamaranmu sedang kami proses ya', '08-08-2020', '08-08-2020', '2020-12-16 16:14:34', '0000-00-00 00:00:00.000000'),
(34, 74, 4, 'MENUNGGU', '', '15-08-2020', '', '2020-12-16 14:05:46', '0000-00-00 00:00:00.000000'),
(35, 74, 6, 'MENUNGGU', '', '15-08-2020', '', '2020-12-16 14:05:46', '0000-00-00 00:00:00.000000'),
(40, 5, 2, 'MENUNGGU', '', '20-08-2020', '', '2020-12-16 14:05:46', '0000-00-00 00:00:00.000000'),
(44, 1, 4, 'diproses', 'Data lamaranmu sedang kami proses ya', NULL, NULL, '2020-12-16 16:15:58', '2020-12-16 07:15:23.000000'),
(45, 1, 4, 'diproses', 'Data lamaranmu sedang kami proses ya', NULL, NULL, '2020-12-16 16:15:58', '2020-12-16 07:15:23.000000'),
(46, 1, 3, 'diterima', 'Selamat Kamu Sudah DI Terima, Silahkan Segera datang ke kantor ya', NULL, NULL, '2020-12-16 17:52:39', '2020-12-16 17:51:43.000000');

-- --------------------------------------------------------

--
-- Table structure for table `lowongans`
--

CREATE TABLE `lowongans` (
  `id_lowongan` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `id_industri` int(10) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `id_jurusan` int(100) NOT NULL,
  `buka` date NOT NULL,
  `tutup` date NOT NULL,
  `kualifikasi` longtext NOT NULL,
  `lain` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowongans`
--

INSERT INTO `lowongans` (`id_lowongan`, `user_id`, `id_industri`, `judul`, `deskripsi`, `id_jurusan`, `buka`, `tutup`, `kualifikasi`, `lain`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'asd', 'dfg', 6, '2020-09-02', '2020-09-02', 'dfg', 'sdfsdf', '2020-12-16 06:37:49', '2020-09-02 07:07:07'),
(2, 1, 2, 'sdf', 'sdf', 6, '2020-09-02', '2020-09-02', 'sdf', 'sdf', '2020-12-16 06:37:52', '2020-09-02 07:09:31'),
(3, NULL, 1, 'asd', 'sdf', 1, '2020-09-02', '2020-09-30', 'sdf', 'sdf', '2020-09-02 07:23:39', '2020-09-02 07:23:39'),
(4, NULL, 5, 'dhjghj', 'ghjghj', 1, '2020-09-06', '2020-09-30', 'ghjghj', 'ghjghj', '2020-09-06 00:06:33', '2020-09-06 00:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaans`
--

CREATE TABLE `pekerjaans` (
  `id_pekerjaan` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tempat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masuk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keluar` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pekerjaans`
--

INSERT INTO `pekerjaans` (`id_pekerjaan`, `user_id`, `tempat`, `masuk`, `keluar`) VALUES
(1, 1, 'PT. Manunggal Jaya', '2016', '2016'),
(2, 5, 'rwe', '4', '455'),
(6, 74, 'Waw', '2010', '2015'),
(7, 74, 'Wowoww', '2009', '2012'),
(11, 1, 'CV Maju Bersama', '2016', '2017'),
(12, 4, 'text', '1234', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikans`
--

CREATE TABLE `pendidikans` (
  `id_pendidikan` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tingkat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instansi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masuk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lulus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pendidikans`
--

INSERT INTO `pendidikans` (`id_pendidikan`, `user_id`, `tingkat`, `instansi`, `masuk`, `lulus`, `updated_at`, `created_at`) VALUES
(1, 1, 'SD', 'SDN 1 Ledug', '2003', '2009', '2020-12-16 23:29:04', NULL),
(14, 1, 'SMP', 'SMPN 1 Prigen', '2009', '2012', '2020-12-16 23:29:04', NULL),
(26, 5, 'FZGZ', 'Xyud', '868', '6838', '2020-12-16 23:29:04', NULL),
(27, 6, 'PRO', 'Gold', '2011', '2016', '2020-12-16 23:29:04', NULL),
(28, 7, 'WICKK', 'Ahay', '2016', '2019', '2020-12-16 23:29:04', NULL),
(30, 1, 'SMK', 'SMKN 1 PRIGEN', '2012', '2015', '2020-12-16 23:29:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(10) NOT NULL,
  `tgl_pengumuman` date NOT NULL,
  `judul_pengumuman` varchar(250) NOT NULL,
  `isi_pengumuman` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `tgl_pengumuman`, `judul_pengumuman`, `isi_pengumuman`, `created_at`, `updated_at`) VALUES
(1, '2020-12-17', 'pengumuman', 'isi pengumuman\r\n', '2020-12-13 14:00:08', '0000-00-00 00:00:00'),
(2, '2020-12-17', 'sdfsd', 'sdfsf', '2020-12-13 14:00:08', '0000-00-00 00:00:00'),
(3, '2020-12-13', 'asdpaspd', 'Vue.js is an open-source model–view–viewmodel front end JavaScript framework for building user interfaces and single-page applications. It was created by Evan You, and is maintained by him and the rest of the active core team members. Wikipedia', '2020-12-13 14:00:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaans`
--

CREATE TABLE `perusahaans` (
  `id_industri` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telepon` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8_unicode_ci,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gambar` longtext COLLATE utf8_unicode_ci,
  `status` varchar(200) COLLATE utf8_unicode_ci DEFAULT 'belum_aktif',
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `created_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `perusahaans`
--

INSERT INTO `perusahaans` (`id_industri`, `nama`, `email`, `password`, `telepon`, `alamat`, `website`, `gambar`, `status`, `updated_at`, `created_at`) VALUES
(1, 'PT. Penggali Kubur', 'penggaliankubur@gmail.com', '', '08080', 'Jl. Makam', 'www.penggaliankubur.com', 'kubur.jpg', 'aktif', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'PT. Sekar Jaya Makmur', 'sekarjaya23@gmail.com', '$2y$10$eprCQ.xiHeVYu1ayXpXieeGQW6QfTKBYeD5fHa42TFF2Iq.ykaa.e', '0808000000', 'Jl. Sedap Malam, Kec. Pandaan, Pasuruan, Jawa Timur 67156', 'www.sekarjaya23.com', 'sekarjaya.jpg', 'aktif', '2020-12-15 11:35:18.733580', '0000-00-00 00:00:00.000000'),
(3, 'Mr. Montir', 'jayamakmur@gmail.com', '$2y$10$eprCQ.xiHeVYu1ayXpXieeGQW6QfTKBYeD5fHa42TFF2Iq.ykaa.e', '080000000', 'Jl. Dusun Sekar Gadung, Sekar Gadung, Purworejo, Bakalan, Kec. Bugulkidul, Kota Pasuruan, Jawa Timur 67115\r\n', 'www.mrmontir.com', 'mrmontir.jpg', 'aktif', '2020-12-15 23:15:13.136287', '0000-00-00 00:00:00.000000'),
(4, 'Percetakan Hitam Putih', 'cetakhitamputih@gmail.com', '', '0343883605', 'Jl. A Yani No.22 Pandaan, Pasuruan-Jawa Timur ', 'www.cetakhitamputih.com', 'hitamputih.jpg', 'aktif', '2020-09-04 20:31:13.188856', '0000-00-00 00:00:00.000000'),
(5, 'PT. MATA CCTV', 'matacctv@gmail.com', '', '080000000', 'Jl. Rangkah II No. 95,\r\nSurabaya 60135', 'www.matacctv.com', 'mata_cctv.jpg', 'belum_aktif', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(6, 'General Hospital Wijaya', 'rsasiabunda2@gmai.com', '', '(031) 752308', 'Jl. Raya Menganti No.398, Wiyung, Kec. Wiyung, Kota SBY, Jawa Timur 60228', 'wijayahospital@gmai.com', 'wijayahospital.jpg', 'belum_aktif', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(7, 'Ares Hotel & Cottages ', 'areshotel@gmail.com', '', '(0343)883205', 'Jl Taman Wisata Prigen, Prigen, Pasuruan, Jawa Timur, Indonesia, 67157', 'wwww.areshotel.com', 'areshotel.jpg', 'belum_aktif', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Administrator sistem yang memiliki hak akses penuh sistem.', NULL, NULL),
(2, 'Alumni', 'Pengguna yang memiliki hak akses ke sistem.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_jurusan` int(10) UNSIGNED NOT NULL,
  `role_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telepon` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_lahir` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tahun_lulus` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `gambar` longtext COLLATE utf8_unicode_ci,
  `keahlian` text COLLATE utf8_unicode_ci NOT NULL,
  `tinggi` int(10) UNSIGNED NOT NULL,
  `berat` int(10) UNSIGNED NOT NULL,
  `remember_token` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_jurusan`, `role_id`, `username`, `nama`, `email`, `telepon`, `password`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `tahun_lulus`, `status_user`, `alamat`, `gambar`, `keahlian`, `tinggi`, `berat`, `remember_token`) VALUES
(1, 1, '1', 'admin', 'admin', 'bkk@smkn1prigen.sch.id', '0343885332', '$2y$10$eprCQ.xiHeVYu1ayXpXieeGQW6QfTKBYeD5fHa42TFF2Iq.ykaa.e', NULL, '2020-01-07', 'L', '', 'SANTUY', '', '', '', 4, 0, NULL),
(2, 2, '1', 'admin', 'admin', 'smk@gmail.com', '0343165', '3', NULL, '27/1/2015', '1', '2016', 'SANTUY', 'ledug', '/image/default.png', 'administrator', 100, 50, NULL),
(4, 2, '2', '2', 'Alumni', 'candrahabib0@gmail.com', '1234', '2', 'Pasuruan', '08-08-2020', 'Laki - Laki', '2019', 'KERJA', 'Ledug', 'imagewntw019wz973vv359ftj.jpg', 'Macul', 1234, 50, NULL),
(5, 4, '2', '3', 'Alumni2', 'alumni32@gmail.com', '0823456789', '3', 'Pasuruan', '19-6-2020', 'Laki - Laki', '2016', 'BELUM KERJA', 'prigen', 'imageqatyjf2gayhf9eyh53qv.jpg', 'coding', 150, 50, NULL),
(74, 4, '3', '88', 'HaciBi', 'hc@gmail.com', '58', '8', 'Boyo', '05-08-2020', 'Laki - Laki', '2014', 'BELUM KERJA', 'Ledug', 'imagef30r7d3f50apjb55qvte.jpg', 'Teknik Sepeda Motor', 157, 44, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnis`
--
ALTER TABLE `alumnis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`telepon`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `keterserapan`
--
ALTER TABLE `keterserapan`
  ADD PRIMARY KEY (`id_keterserapan`);

--
-- Indexes for table `lamarans`
--
ALTER TABLE `lamarans`
  ADD PRIMARY KEY (`id_lamaran`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_lowongan` (`id_lowongan`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `lowongans`
--
ALTER TABLE `lowongans`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pendidikans`
--
ALTER TABLE `pendidikans`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `perusahaans`
--
ALTER TABLE `perusahaans`
  ADD PRIMARY KEY (`id_industri`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`telepon`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnis`
--
ALTER TABLE `alumnis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id_jurusan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keterserapan`
--
ALTER TABLE `keterserapan`
  MODIFY `id_keterserapan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lamarans`
--
ALTER TABLE `lamarans`
  MODIFY `id_lamaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `lowongans`
--
ALTER TABLE `lowongans`
  MODIFY `id_lowongan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  MODIFY `id_pekerjaan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pendidikans`
--
ALTER TABLE `pendidikans`
  MODIFY `id_pendidikan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `perusahaans`
--
ALTER TABLE `perusahaans`
  MODIFY `id_industri` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusans` (`id_jurusan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
