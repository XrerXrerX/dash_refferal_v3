-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 04:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mitra`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_l21`
--

CREATE TABLE `admin_l21` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `kontak` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_l21`
--

INSERT INTO `admin_l21` (`id`, `nama_admin`, `kontak`, `created_at`, `updated_at`) VALUES
(1, 'toni', '6282168891682', '2023-07-30 11:36:39', '2023-07-30 11:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `data_kasbon`
--

CREATE TABLE `data_kasbon` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `nominal` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kasbon`
--

INSERT INTO `data_kasbon` (`id`, `userid`, `nominal`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 'poorgas', '1000000', '2023-07-28', '2023-07-30 11:36:52', '2023-07-30 11:36:52'),
(2, 'poorgas', '500000', '2023-07-28', '2023-07-30 11:36:52', '2023-07-30 11:36:52'),
(3, 'bandot88', '500000', '2023-07-28', '2023-07-30 11:36:52', '2023-07-30 11:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `data_popup`
--

CREATE TABLE `data_popup` (
  `id` int(11) NOT NULL,
  `judul_event` varchar(100) NOT NULL,
  `desk_event` varchar(1000) NOT NULL,
  `gambar_event` varchar(1000) NOT NULL,
  `switch_desk` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_popup`
--

INSERT INTO `data_popup` (`id`, `judul_event`, `desk_event`, `gambar_event`, `switch_desk`, `created_at`, `updated_at`) VALUES
(1, 'PENCARI REFFERAL', 'ABCDE', 'Datapopup_img/tJbTOIzBXUfeG1uItnev96Z24gWLC3QXZoHjV0Wk.png', 1, '2023-07-31 09:34:51', '2023-08-01 02:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `gaji_refferal`
--

CREATE TABLE `gaji_refferal` (
  `id` int(11) NOT NULL,
  `member_aktif` double NOT NULL,
  `gaji_bulan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gaji_refferal`
--

INSERT INTO `gaji_refferal` (`id`, `member_aktif`, `gaji_bulan`, `created_at`, `updated_at`) VALUES
(18, 10, '500000', '2023-07-30 11:37:04', '2023-07-30 11:37:04'),
(19, 15, '750000', '2023-07-30 11:37:04', '2023-07-30 11:37:04'),
(20, 25, '1250000', '2023-07-30 11:37:04', '2023-07-30 11:37:04'),
(21, 50, '2500000', '2023-07-30 11:37:04', '2023-07-30 11:37:04'),
(22, 75, '3750000', '2023-07-30 11:37:04', '2023-07-30 11:37:04'),
(23, 100, '5000000', '2023-07-30 11:37:04', '2023-07-30 11:37:04'),
(24, 150, '7500000', '2023-07-30 11:37:04', '2023-07-30 11:37:04'),
(25, 200, '10000000', '2023-07-30 11:37:04', '2023-07-30 11:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `links_shorten`
--

CREATE TABLE `links_shorten` (
  `id` int(11) NOT NULL,
  `username_shorten` varchar(100) NOT NULL,
  `link_awal` varchar(1000) NOT NULL,
  `link_hasil` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `links_shorten`
--

INSERT INTO `links_shorten` (`id`, `username_shorten`, `link_awal`, `link_hasil`, `created_at`, `updated_at`) VALUES
(36, 'rangga', 'https://id-id.facebook.com/', 'wZCVKpe1', '2023-07-30 11:36:12', '2023-07-30 05:23:57'),
(37, 'rangga', 'https://wa.me/6282174887653', 'muc0cEuj', '2023-07-30 11:36:12', '2023-07-30 05:22:25'),
(38, 'rangga', 'https://web.telegram.org/', 'UIlas37c', '2023-07-30 11:36:12', '2023-07-30 11:36:12'),
(39, 'rangga', 'https://line.me/id/', 'jaetr4W5', '2023-07-30 11:36:12', '2023-07-30 11:36:12'),
(40, 'rangga', 'https://www.instagram.com/', 'UeyGHSXP', '2023-07-30 11:36:12', '2023-07-30 11:36:12'),
(41, 'rangga', 'https://twitter.com/i/flow/login?redirect_after_login=%2F%3Flang%3Did', 'uDx6A0U9', '2023-07-30 11:36:12', '2023-07-30 11:36:12'),
(42, 'rangga', 'https://www.youtube.com/', 'ZsThdiKR', '2023-07-30 11:36:12', '2023-07-30 11:36:12'),
(43, 'rangga', 'https://t.me/ROMA4DOFFICIAL', 'EKxeMXbQ', '2023-07-30 11:36:12', '2023-07-30 11:36:12'),
(44, 'rangga', 'https://demos.pixinvent.com/vuexy-vuejs-admin-template/demo-4/pages/authentication/login-v1', 'LGKvOc15', '2023-07-30 11:36:12', '2023-07-30 11:36:12'),
(47, 'rangga', 'https://id-id.facebook.com/1', 'lWUeJQfL', '2023-07-30 11:36:12', '2023-07-30 11:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `pencari_refferal`
--

CREATE TABLE `pencari_refferal` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `refferal` varchar(100) NOT NULL,
  `downline_aktif` float NOT NULL,
  `level_mitra` tinyint(1) DEFAULT 0,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pencari_refferal`
--

INSERT INTO `pencari_refferal` (`id`, `userid`, `refferal`, `downline_aktif`, `level_mitra`, `tanggal`, `created_at`, `updated_at`) VALUES
(5, 'jugong', '1371', 6, 1, '2023-07-28', '2023-07-30 07:59:49', '2023-08-03 05:42:44'),
(6, 'jugong2', '42', 0, 1, '2023-07-28', '2023-07-30 07:59:49', '2023-08-03 05:42:47'),
(7, 'melvy', '339', 0, 0, '2023-07-28', '2023-07-30 07:59:49', '2023-08-03 05:42:50'),
(8, 'pastiwd88', '192', 0, 0, '2023-07-28', '2023-07-30 07:59:49', '2023-08-03 05:42:59'),
(9, 'rapika', '37', 3, 0, '2023-07-28', '2023-07-30 07:59:49', '2023-08-03 05:43:01'),
(10, 'pesawat123', '538', 0, 0, '2023-07-28', '2023-07-30 07:59:49', '2023-08-03 05:43:02'),
(11, 'ARTA08', '227', 0, 0, '2023-07-28', '2023-07-30 07:59:49', '2023-08-03 05:43:05'),
(12, 'wahyu1', '1081', 0, 0, '2023-07-28', '2023-07-30 07:59:49', '2023-08-03 05:43:09'),
(13, 'setiawan1', '902', 0, 0, '2023-07-28', '2023-07-30 07:59:49', '2023-08-03 05:43:11'),
(14, 'arisan01', '1064', 0, 0, '2023-07-28', '2023-07-30 07:59:49', '2023-08-03 05:43:12'),
(15, 'bebeh212', '768', 0, 0, '2023-07-28', '2023-07-30 07:59:49', '2023-08-03 05:43:14'),
(16, 'budiredwine', '859', 0, 0, '2023-07-28', '2023-07-30 07:59:49', '2023-08-03 05:43:15'),
(17, 'colokbebas', '518', 0, 0, '2023-07-28', '2023-07-30 07:59:49', '2023-08-03 05:43:17'),
(18, 'septi77', '1044', 0, 0, '2023-07-28', '2023-07-30 07:59:49', '2023-08-03 05:43:18'),
(20, 'rapunsel', '1970', 0, 0, '2023-07-28', '2023-07-30 07:59:49', '2023-08-03 05:43:20'),
(22, 'poorgas', '256', 59, 0, '2023-07-28', '2023-07-30 07:59:49', '2023-08-03 05:43:22'),
(24, 'wantos', '0', 0, 0, '2023-07-28', '2023-07-30 01:00:23', '2023-08-03 05:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `syarat_ketentuan`
--

CREATE TABLE `syarat_ketentuan` (
  `id` int(11) NOT NULL,
  `type_aturan` varchar(100) NOT NULL,
  `icon_syarat` varchar(1000) NOT NULL,
  `desk_syarat` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `syarat_ketentuan`
--

INSERT INTO `syarat_ketentuan` (`id`, `type_aturan`, `icon_syarat`, `desk_syarat`, `created_at`, `updated_at`) VALUES
(12, 'ketentuan', '<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon icon-tabler icon-tabler-mood-plus\" width=\"44\" height=\"44\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"#00bfd8\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\r\n  <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/>\r\n  <path d=\"M20.985 12.528a9 9 0 1 0 -8.45 8.456\" />\r\n  <path d=\"M16 19h6\" />\r\n  <path d=\"M19 16v6\" />\r\n  <path d=\"M9 10h.01\" />\r\n  <path d=\"M15 10h.01\" />\r\n  <path d=\"M9.5 15c.658 .64 1.56 1 2.5 1s1.842 -.36 2.5 -1\" />\r\n</svg>', 'Penambahan new deposit setiap bulannya minimal 15 member.', '2023-07-30 11:37:47', '2023-07-30 11:37:48'),
(13, 'ketentuan', '<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon icon-tabler icon-tabler-trending-down\" width=\"44\" height=\"44\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"#00bfd8\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\r\n  <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/>\r\n  <path d=\"M3 7l6 6l4 -4l8 8\" />\r\n  <path d=\"M21 10l0 7l-7 0\" />\r\n</svg>', 'Jika target yang tercapai di bawah 10 member aktif,  maka pihak Lotto21Group akan memberikan kebijikan tertentu kepada pencari refferal.', '2023-07-30 11:37:47', '2023-07-30 11:37:48'),
(14, 'ketentuan', '<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon icon-tabler icon-tabler-user-plus\" width=\"44\" height=\"44\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"#00bfd8\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\r\n  <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/>\r\n  <path d=\"M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0\" />\r\n  <path d=\"M16 19h6\" />\r\n  <path d=\"M19 16v6\" />\r\n  <path d=\"M6 21v-2a4 4 0 0 1 4 -4h4\" />\r\n</svg>', 'Penambahan member aktif / referral harus signifikan setiap bulan nya.', '2023-07-30 11:37:47', '2023-07-30 11:37:48'),
(15, 'ketentuan', '<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon icon-tabler icon-tabler-wallet\" width=\"44\" height=\"44\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"#00bfd8\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\r\n  <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/>\r\n  <path d=\"M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12\" />\r\n  <path d=\"M20 12v4h-4a2 2 0 0 1 0 -4h4\" />\r\n</svg>', 'Gaji pencari refferal di bagikan setiap tanggal 1 dengan catatan target telah tercapai.', '2023-07-30 11:37:47', '2023-07-30 11:37:48'),
(16, 'ketentuan', '<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon icon-tabler icon-tabler-user-check\" width=\"44\" height=\"44\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"#00bfd8\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\r\n  <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/>\r\n  <path d=\"M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0\" />\r\n  <path d=\"M6 21v-2a4 4 0 0 1 4 -4h4\" />\r\n  <path d=\"M15 19l2 2l4 -4\" />\r\n</svg>', 'Member aktif terhitung apabila bonus referral yang masuk ke akun refferal anda minimal Rp 2.000 setiap member nya (bulan).', '2023-07-30 11:37:47', '2023-07-30 11:37:48'),
(17, 'syarat', '<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon icon-tabler icon-tabler-focus-centered\" width=\"44\" height=\"44\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"#00bfd8\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\r\n  <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/>\r\n  <path d=\"M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0\" />\r\n  <path d=\"M4 8v-2a2 2 0 0 1 2 -2h2\" />\r\n  <path d=\"M4 16v2a2 2 0 0 0 2 2h2\" />\r\n  <path d=\"M16 4h2a2 2 0 0 1 2 2v2\" />\r\n  <path d=\"M16 20h2a2 2 0 0 0 2 -2v-2\" />\r\n</svg>', 'Tidak memiliki kesibukan utama lainnya. Fokus sebagai MITRA PENCARI REFFERAL LOTTO21GROUP.', '2023-07-30 11:37:47', '2023-07-30 11:37:48'),
(18, 'syarat', '<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon icon-tabler icon-tabler-network-off\" width=\"44\" height=\"44\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"#00bfd8\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\r\n  <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/>\r\n  <path d=\"M6.537 6.516a6 6 0 0 0 7.932 7.954m2.246 -1.76a6 6 0 0 0 -8.415 -8.433\" />\r\n  <path d=\"M12 3c1.333 .333 2 2.333 2 6c0 .348 0 .681 -.018 1m-.545 3.43c-.332 .89 -.811 1.414 -1.437 1.57\" />\r\n  <path d=\"M12 3c-.938 .234 -1.547 1.295 -1.825 3.182m-.156 3.837c.117 3.02 .777 4.68 1.981 4.981\" />\r\n  <path d=\"M6 9h3m4 0h5\" />\r\n  <path d=\"M3 19h7\" />\r\n  <path d=\"M14 19h5\" />\r\n  <path d=\"M12 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0\" />\r\n  <path d=\"M12 15v2\" />\r\n  <path d=\"M3 3l18 18\" />\r\n</svg>', 'Tidak sedang terikat kontrak kerja dengan situs lain.', '2023-07-30 11:37:47', '2023-07-30 11:37:48'),
(19, 'syarat', '<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon icon-tabler icon-tabler-users-group\" width=\"44\" height=\"44\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"#00bfd8\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\r\n  <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/>\r\n  <path d=\"M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0\" />\r\n  <path d=\"M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1\" />\r\n  <path d=\"M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0\" />\r\n  <path d=\"M17 10h2a2 2 0 0 1 2 2v1\" />\r\n  <path d=\"M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0\" />\r\n  <path d=\"M3 13v-1a2 2 0 0 1 2 -2h2\" />\r\n</svg>', 'Mempunyai Group Whatsapp aktif sebagai wadah informasi kepada setiap downline yang anda miliki.', '2023-07-30 11:37:47', '2023-07-30 11:37:48'),
(20, 'syarat', '<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon icon-tabler icon-tabler-brand-meta\" width=\"44\" height=\"44\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"#00bfd8\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\r\n  <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/>\r\n  <path d=\"M12 10.174c1.766 -2.784 3.315 -4.174 4.648 -4.174c2 0 3.263 2.213 4 5.217c.704 2.869 .5 6.783 -2 6.783c-1.114 0 -2.648 -1.565 -4.148 -3.652a27.627 27.627 0 0 1 -2.5 -4.174z\" />\r\n  <path d=\"M12 10.174c-1.766 -2.784 -3.315 -4.174 -4.648 -4.174c-2 0 -3.263 2.213 -4 5.217c-.704 2.869 -.5 6.783 2 6.783c1.114 0 2.648 -1.565 4.148 -3.652c1 -1.391 1.833 -2.783 2.5 -4.174z\" />\r\n</svg>', 'Mempunyai akun Facebook (Wajib), Telegram, Instagram, Twitter, atau akun media sosial aktif lainnya sebagai media Promosi.', '2023-07-30 11:37:47', '2023-07-30 11:37:48'),
(21, 'syarat', '<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon icon-tabler icon-tabler-ux-circle\" width=\"44\" height=\"44\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"#00bfd8\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\r\n  <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/>\r\n  <path d=\"M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0\" />\r\n  <path d=\"M7 10v2a2 2 0 1 0 4 0v-2\" />\r\n  <path d=\"M14 10l3 4\" />\r\n  <path d=\"M14 14l3 -4\" />\r\n</svg>', 'Memiliki pengalaman sebagai pencari referral.', '2023-07-30 11:37:47', '2023-07-30 11:37:48'),
(22, 'syarat', '<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon icon-tabler icon-tabler-user-heart\" width=\"44\" height=\"44\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"#00bfd8\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\r\n  <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/>\r\n  <path d=\"M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0\" />\r\n  <path d=\"M6 21v-2a4 4 0 0 1 4 -4h.5\" />\r\n  <path d=\"M18 22l3.35 -3.284a2.143 2.143 0 0 0 .005 -3.071a2.242 2.242 0 0 0 -3.129 -.006l-.224 .22l-.223 -.22a2.242 2.242 0 0 0 -3.128 -.006a2.143 2.143 0 0 0 -.006 3.071l3.355 3.296z\" />\r\n</svg>', 'Memiliki kemauan yang kuat untuk menjadi MITRA PENCARI REFFERAL PROFESIONAL LOTTO21GROUP.', '2023-07-30 11:37:47', '2023-07-30 11:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_downline`
--

CREATE TABLE `tabel_downline` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `userid_downline` varchar(100) NOT NULL,
  `bonus` float NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_downline`
--

INSERT INTO `tabel_downline` (`id`, `userid`, `userid_downline`, `bonus`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 'poorgas', 'abangarwana', 1670.95, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(2, 'poorgas', 'akunhoki88', 887.55, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(3, 'poorgas', 'alvanghava', 336.4, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(4, 'poorgas', 'anen47', 1128.8, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(5, 'poorgas', 'arnetha89', 1376.55, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(6, 'poorgas', 'arwanadana10', 105.55, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(7, 'poorgas', 'arwanahoky', 1467.8, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(8, 'poorgas', 'asepependi', 306.4, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(9, 'poorgas', 'bahaya12', 356.18, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(10, 'poorgas', 'bianka', 1613.24, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(11, 'poorgas', 'bondonekat46', 1009.68, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(12, 'poorgas', 'fuckboy', 375.6, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(13, 'poorgas', 'g0nd0l', 0, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(14, 'poorgas', 'ganja', 114.27, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(15, 'poorgas', 'ghava26', 974.6, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(16, 'poorgas', 'gontal', 1421.9, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(17, 'poorgas', 'gundek89', 408.5, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(18, 'poorgas', 'idoy95', 72, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(19, 'poorgas', 'intiparih13', 500, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(20, 'poorgas', 'kakekgacor05', 139.4, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(21, 'poorgas', 'kenajackpot', 329.03, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(22, 'poorgas', 'kuya1011', 200, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(23, 'poorgas', 'lawan', 100, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(24, 'poorgas', 'maulana01', 446.62, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(25, 'poorgas', 'menot666', 806.56, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(26, 'poorgas', 'neo11', 6.03, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(27, 'poorgas', 'omboy95', 773, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(28, 'poorgas', 'omyoyo', 15.3, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(29, 'poorgas', 'panatas79', 376, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(30, 'poorgas', 'rsi188', 537, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(31, 'poorgas', 'rumheti', 19.96, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(32, 'poorgas', 'simbolon236', 1000, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(33, 'poorgas', 'totolato', 300, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(34, 'poorgas', 'vioo', 1559.9, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(35, 'poorgas', 'zabenk', 659.3, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(36, 'poorgas', 'zuna212', 1067.16, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(37, 'poorgas', '4fif07', 3625.5, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(38, 'poorgas', 'alfariz73', 78516.3, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(39, 'poorgas', 'anggi7878', 7809, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(40, 'poorgas', 'antigalau', 2060.75, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(41, 'poorgas', 'ardi99', 35761.6, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(42, 'poorgas', 'arn188', 8926.8, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(43, 'poorgas', 'astikahoki', 40847.3, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(44, 'poorgas', 'atang14', 50716.5, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(45, 'poorgas', 'awang03', 63220.1, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(46, 'poorgas', 'bangbed', 3892.2, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(47, 'poorgas', 'borju666', 3146, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(48, 'poorgas', 'bud321', 2406.8, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(49, 'poorgas', 'cahngarit19', 7592.4, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(50, 'poorgas', 'cair666', 8956.42, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(51, 'poorgas', 'cecep123', 50980.9, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(52, 'poorgas', 'colojitu', 144597, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(53, 'poorgas', 'danatopup', 39292.2, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(54, 'poorgas', 'deadsquad', 18360.4, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(55, 'poorgas', 'dewi8877', 18178, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(56, 'poorgas', 'dewiku', 887128, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(57, 'poorgas', 'dickhamb57', 319567, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(58, 'poorgas', 'dms123', 6198, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(59, 'poorgas', 'egonrr', 14790.5, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(60, 'poorgas', 'indrajaya123', 2290.9, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(61, 'poorgas', 'itok05', 11432.7, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(62, 'poorgas', 'jandapirang2', 9908, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(63, 'poorgas', 'jayabaya90', 6636.5, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(64, 'poorgas', 'jodi11', 4605.8, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(65, 'poorgas', 'jossterus', 2940.49, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(66, 'poorgas', 'jpterus79', 9867, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(67, 'poorgas', 'julyastawa', 79808.4, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(68, 'poorgas', 'kagungan2', 4607.7, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(69, 'poorgas', 'kawatkusut', 18585.8, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(70, 'poorgas', 'kokonao00', 5245.7, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(71, 'poorgas', 'lanonkk', 2106.58, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(72, 'poorgas', 'mamajid', 2639.55, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(73, 'poorgas', 'marsyafa10', 26928.5, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(74, 'poorgas', 'mawar86', 109905, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(75, 'poorgas', 'maya10', 14119.9, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(76, 'poorgas', 'menangan', 4008.8, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(77, 'poorgas', 'nadwa1992', 2293.6, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(78, 'poorgas', 'ohel05', 6583.19, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(79, 'poorgas', 'ombewok', 34967, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(80, 'poorgas', 'paijo22', 19165.4, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(81, 'poorgas', 'pait22', 3703.12, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(82, 'poorgas', 'paito77', 35908.2, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(83, 'poorgas', 'rajasurga', 3784.8, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(84, 'poorgas', 'raska17', 2157.8, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(85, 'poorgas', 'restu00', 16743.1, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(86, 'poorgas', 'rojak12345', 21173, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(87, 'poorgas', 'rujit', 18592.6, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(88, 'poorgas', 'safwa17', 6223.3, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(89, 'poorgas', 'saleho86', 10332.2, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(90, 'poorgas', 'shezolam', 6637.37, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(91, 'poorgas', 'slam3et028', 103895, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(92, 'poorgas', 'thakin85', 74836.4, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(93, 'poorgas', 'tikus777', 2695.96, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(94, 'poorgas', 'topanifk09', 3129.84, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(95, 'poorgas', 'walang09', 30413.3, '2023-07-28', '2023-07-30 11:37:57', '2023-07-30 11:37:57'),
(144, 'arisan01', 'abangarwana', 1670.95, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(145, 'arisan01', 'akunhoki88', 887.55, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(146, 'arisan01', 'alvanghava', 336.4, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(147, 'arisan01', 'anen47', 1128.8, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(148, 'arisan01', 'arnetha89', 1376.55, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(149, 'arisan01', 'arwanadana10', 105.55, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(150, 'arisan01', 'arwanahoky', 1467.8, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(151, 'arisan01', 'asepependi', 306.4, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(152, 'arisan01', 'bahaya12', 356.18, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(153, 'arisan01', 'bianka', 1613.24, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(154, 'arisan01', 'bondonekat46', 1009.68, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(155, 'arisan01', 'fuckboy', 375.6, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(156, 'arisan01', 'g0nd0l', 0, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(157, 'arisan01', 'ganja', 114.27, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(158, 'arisan01', 'ghava26', 974.6, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(159, 'arisan01', 'gontal', 1421.9, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(160, 'arisan01', 'gundek89', 408.5, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(161, 'arisan01', 'idoy95', 72, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(162, 'arisan01', 'intiparih13', 500, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(163, 'arisan01', 'kakekgacor05', 139.4, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(164, 'arisan01', 'kenajackpot', 329.03, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(165, 'arisan01', 'kuya1011', 200, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(166, 'arisan01', 'lawan', 100, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(167, 'arisan01', 'maulana01', 446.62, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(168, 'arisan01', 'menot666', 806.56, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(169, 'arisan01', 'neo11', 6.03, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(170, 'arisan01', 'omboy95', 773, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(171, 'arisan01', 'omyoyo', 15.3, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(172, 'arisan01', 'panatas79', 376, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(173, 'arisan01', 'rsi188', 537, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(174, 'arisan01', 'rumheti', 19.96, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(175, 'arisan01', 'simbolon236', 1000, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(176, 'arisan01', 'totolato', 300, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(177, 'arisan01', 'vioo', 1559.9, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(178, 'arisan01', 'zabenk', 659.3, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(179, 'arisan01', 'zuna212', 1067.16, '2023-08-03', '2023-08-02 22:27:13', '2023-08-02 22:27:13'),
(180, 'wantos', 'abangarwana', 1670.95, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(181, 'wantos', 'akunhoki88', 887.55, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(182, 'wantos', 'alvanghava', 336.4, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(183, 'wantos', 'anen47', 1128.8, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(184, 'wantos', 'arnetha89', 1376.55, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(185, 'wantos', 'arwanadana10', 105.55, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(186, 'wantos', 'arwanahoky', 1467.8, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(187, 'wantos', 'asepependi', 306.4, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(188, 'wantos', 'bahaya12', 356.18, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(189, 'wantos', 'bianka', 1613.24, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(190, 'wantos', 'bondonekat46', 1009.68, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(191, 'wantos', 'fuckboy', 375.6, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(192, 'wantos', 'g0nd0l', 0, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(193, 'wantos', 'ganja', 114.27, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(194, 'wantos', 'ghava26', 974.6, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(195, 'wantos', 'gontal', 1421.9, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(196, 'wantos', 'gundek89', 408.5, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(197, 'wantos', 'idoy95', 72, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(198, 'wantos', 'intiparih13', 2000, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(199, 'wantos', 'kakekgacor05', 139.4, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(200, 'wantos', 'kenajackpot', 329.03, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(201, 'wantos', 'kuya1011', 200, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(202, 'wantos', 'lawan', 100, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(203, 'wantos', 'maulana01', 446.62, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(204, 'wantos', 'menot666', 806.56, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(205, 'wantos', 'neo11', 6.03, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(206, 'wantos', 'omboy95', 773, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(207, 'wantos', 'omyoyo', 15.3, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(208, 'wantos', 'panatas79', 376, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(209, 'wantos', 'rsi188', 537, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(210, 'wantos', 'rumheti', 19.96, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(211, 'wantos', 'simbolon236', 1000, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(212, 'wantos', 'totolato', 300, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(213, 'wantos', 'vioo', 1559.9, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(214, 'wantos', 'zabenk', 659.3, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(215, 'wantos', 'zuna212', 1067.16, '2023-08-03', '2023-08-02 22:28:13', '2023-08-02 22:28:13'),
(216, 'poorgas', 'bondonekat46', 1009.68, '2023-08-03', '2023-08-02 22:33:03', '2023-08-02 22:33:03'),
(217, 'poorgas', 'arnetha89', 1376.55, '2023-08-03', '2023-08-02 22:33:03', '2023-08-02 22:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_newmember`
--

CREATE TABLE `tabel_newmember` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `userid_downline` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_newmember`
--

INSERT INTO `tabel_newmember` (`id`, `userid`, `userid_downline`, `status`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 'poorgas', 'ajaib27', 'sudah depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(2, 'poorgas', 'amew01', 'sudah depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(3, 'poorgas', 'budi81', 'sudah depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(4, 'poorgas', 'ewokbojo', 'sudah depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(5, 'poorgas', 'kiranhoki', 'sudah depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(6, 'poorgas', 'labold32', 'sudah depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(7, 'poorgas', 'nalista123', 'sudah depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(8, 'poorgas', 'nasib77', 'sudah depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(9, 'poorgas', 'pioneer', 'sudah depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(10, 'poorgas', 'pitak26', 'sudah depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(11, 'poorgas', 'rbt111', 'sudah depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(12, 'poorgas', 'rizky44', 'sudah depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(13, 'poorgas', 'ryansetyawan', 'sudah depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(14, 'poorgas', 'santi2020', 'sudah depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(15, 'poorgas', 'zare', 'sudah depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(16, 'poorgas', '0001', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(17, 'poorgas', '00112', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(18, 'poorgas', '001f4nd1', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(19, 'poorgas', '001rajawali', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(20, 'poorgas', '003bawan', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(21, 'poorgas', '0063438490', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(22, 'poorgas', '007james12', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(23, 'poorgas', '0093747816', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(24, 'poorgas', '00997ashin', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(25, 'poorgas', '009zw', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(26, 'poorgas', '00bewok', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(27, 'poorgas', '00budi', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(28, 'poorgas', '00jelasjp', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(29, 'poorgas', '010114', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(30, 'poorgas', '012345', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(31, 'poorgas', '0123456', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(32, 'poorgas', '0123456789', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(33, 'poorgas', '012ama', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(34, 'poorgas', '01andika', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(35, 'poorgas', '01budi', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(36, 'poorgas', '01ipau', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(37, 'poorgas', '01irwan', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(38, 'poorgas', '01luckygirl', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(39, 'poorgas', '01mamah', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(40, 'poorgas', '01manto88', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(41, 'poorgas', '01rajawali', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(42, 'poorgas', '020214', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(43, 'poorgas', '0202ani', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(44, 'poorgas', '028darshow', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(45, 'poorgas', '02botel02', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(46, 'poorgas', '02hoki02', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(47, 'poorgas', '03021977', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(48, 'poorgas', '030705', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(49, 'poorgas', '0401markus', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(50, 'poorgas', '0404ellocho', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(51, 'poorgas', '04051990', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(52, 'poorgas', '04april', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(53, 'poorgas', '04ernawat', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(54, 'poorgas', '050501bojo', 'belum depo', '2023-07-29', '2023-07-30 11:38:30', '2023-07-30 11:38:30'),
(57, 'wantos', 'ajaib27', 'sudah depo', '2023-08-03', '2023-08-02 20:36:35', '2023-08-02 20:36:35'),
(58, 'wantos', 'amew01', 'sudah depo', '2023-08-03', '2023-08-02 20:36:35', '2023-08-02 20:36:35'),
(59, 'wantos', 'budi81', 'sudah depo', '2023-08-03', '2023-08-02 20:36:35', '2023-08-02 20:36:35'),
(60, 'wantos', 'ewokbojo', 'sudah depo', '2023-08-03', '2023-08-02 20:36:35', '2023-08-02 20:36:35'),
(61, 'wantos', 'kiranhoki', 'sudah depo', '2023-08-03', '2023-08-02 20:36:35', '2023-08-02 20:36:35'),
(62, 'wantos', 'labold32', 'sudah depo', '2023-08-03', '2023-08-02 20:36:35', '2023-08-02 20:36:35'),
(63, 'wantos', 'nalista123', 'sudah depo', '2023-08-03', '2023-08-02 20:36:35', '2023-08-02 20:36:35'),
(64, 'wantos', 'nasib77', 'sudah depo', '2023-08-03', '2023-08-02 20:36:35', '2023-08-02 20:36:35'),
(65, 'wantos', 'pioneer', 'sudah depo', '2023-08-03', '2023-08-02 20:36:35', '2023-08-02 20:36:35'),
(66, 'wantos', 'pitak26', 'sudah depo', '2023-08-03', '2023-08-02 20:36:35', '2023-08-02 20:36:35'),
(67, 'wantos', 'rbt111', 'sudah depo', '2023-08-03', '2023-08-02 20:36:35', '2023-08-02 20:36:35'),
(68, 'wantos', 'rizky44', 'sudah depo', '2023-08-03', '2023-08-02 20:36:35', '2023-08-02 20:36:35'),
(69, 'wantos', 'ryansetyawan', 'sudah depo', '2023-08-03', '2023-08-02 20:36:35', '2023-08-02 20:36:35'),
(70, 'wantos', 'santi2020', 'sudah depo', '2023-08-03', '2023-08-02 20:36:35', '2023-08-02 20:36:35'),
(71, 'wantos', 'zare', 'sudah depo', '2023-08-03', '2023-08-02 20:36:36', '2023-08-02 20:36:36'),
(72, 'wantos', 'ajaib27', 'belum depo', '2023-08-03', '2023-08-02 20:36:36', '2023-08-02 20:36:36'),
(73, 'wantos', 'amew01', 'belum depo', '2023-08-03', '2023-08-02 20:36:36', '2023-08-02 20:36:36'),
(74, 'wantos', 'budi81', 'belum depo', '2023-08-03', '2023-08-02 20:36:36', '2023-08-02 20:36:36'),
(75, 'wantos', 'ewokbojo', 'belum depo', '2023-08-03', '2023-08-02 20:36:36', '2023-08-02 20:36:36'),
(76, 'wantos', 'kiranhoki', 'belum depo', '2023-08-03', '2023-08-02 20:36:36', '2023-08-02 20:36:36'),
(77, 'wantos', 'labold32', 'belum depo', '2023-08-03', '2023-08-02 20:36:36', '2023-08-02 20:36:36'),
(78, 'wantos', 'nalista123', 'belum depo', '2023-08-03', '2023-08-02 20:36:36', '2023-08-02 20:36:36'),
(79, 'wantos', 'nasib77', 'belum depo', '2023-08-03', '2023-08-02 20:36:36', '2023-08-02 20:36:36'),
(80, 'wantos', 'pioneer', 'belum depo', '2023-08-03', '2023-08-02 20:36:36', '2023-08-02 20:36:36'),
(81, 'wantos', 'pitak26', 'belum depo', '2023-08-03', '2023-08-02 20:36:36', '2023-08-02 20:36:36'),
(82, 'wantos', 'rbt111', 'belum depo', '2023-08-03', '2023-08-02 20:36:36', '2023-08-02 20:36:36'),
(83, 'wantos', 'rizky44', 'belum depo', '2023-08-03', '2023-08-02 20:36:36', '2023-08-02 20:36:36'),
(84, 'wantos', 'ryansetyawan', 'belum depo', '2023-08-03', '2023-08-02 20:36:36', '2023-08-02 20:36:36'),
(85, 'wantos', 'santi2020', 'belum depo', '2023-08-03', '2023-08-02 20:36:36', '2023-08-02 20:36:36'),
(86, 'wantos', 'zare', 'belum depo', '2023-08-03', '2023-08-02 20:36:36', '2023-08-02 20:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `divisi`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'carvi', 'carvi', 'superadmin', '$2y$10$TV99F4MLC9Nv3KI4MhdCHeQ09dqyePZoUMEo9/61QWLgDXOqCf4rC', NULL, '2023-05-15 11:03:08', '2023-05-15 11:03:08'),
(7, 'wantos', 'wantos', 'superadmin', '$2y$10$dNILsCp9psW5oxlYBvXZ1e4z5CpxcSP48OBEIotREe2dG.qLFVNc2', NULL, '2023-05-15 11:04:17', '2023-05-15 11:04:17'),
(9, 'xerxes', 'xerxes', 'superadmin', '$2y$10$r07Fz8lmVnkY6uW2buclO.dGT5HVe1fOMuDaL1.JZQreL51cFRrDi', NULL, '2023-05-15 11:06:44', '2023-05-15 11:06:44'),
(10, 'mr88', 'bosrangga', 'superadmin', '$2y$10$3qIdlaEv98btrmvPaFxrT.66U8KUYh1WIDVlckWg/v5lJWq62GBZu', NULL, '2023-05-15 11:08:22', '2023-05-15 11:08:22'),
(11, 'Abey', 'boswaaa1', 'superadmin', '$2y$10$LnW0m.eC9pFtezquFiYKs.XOQivVwlu3jZOoVTkQKxSjei5CEK4ni', NULL, '2023-05-15 11:08:46', '2023-05-15 11:08:46'),
(12, 'SyairMaintenance', 'syair88', 'syair', '$2y$10$TBi038hTvKyg7v8w07buyu1VhPe55MWZ9Q.qFcM513L9jC.31ZkCa', NULL, '2023-05-15 11:12:34', '2023-05-15 11:12:34'),
(14, 'RTPMaintenance', 'rtp88', 'rtp', '$2y$10$fS8aVbMJIgDs7vM2K2V72O4UsT1l2CGpe0uQUJmaOt1wpwKC2EHk.', NULL, '2023-05-15 11:15:50', '2023-05-15 11:15:50'),
(15, 'PaitoMaintenance', 'paito88', 'paito', '$2y$10$cyQEyraUAUHaoAut12uu.Oxl9b89gVNy1PHtnjAyiJsr4mVfKW7iS', NULL, '2023-05-15 11:16:09', '2023-05-15 11:16:09'),
(16, 'rian', 'bosrian', 'superadmin', '$2y$10$kX.9OZD.bvRNrU9kDztVueczZGBnaHXyiwdq0gGvDjJ6mmzcRp33q', NULL, '2023-05-15 15:02:04', '2023-05-15 15:02:04'),
(17, 'apk88', 'apk88', 'apk', '$2y$10$L2p1i.5IOEJFBPDEhcpq0uGF9wWx5TXMIJaXkF7T57BvlVzYSZ97G', NULL, '2023-05-16 13:28:45', '2023-05-16 13:28:45'),
(18, 'web88', 'web88', 'web', '$2y$10$Cyqjq1ArvcZYNXKhf1xKp.83.hdO1khTyqivhNvInqSGJYg7EpMc.', NULL, '2023-05-16 13:29:00', '2023-05-16 13:29:00'),
(19, 'WS', 'boswaa02', 'superadmin', '$2y$10$49sVnYE6UDxBgKm1A3xsXOgCEnkdHL/srvuCOLv3EP3LkDc0Wa43.', NULL, '2023-05-19 07:46:45', '2023-05-19 07:46:45'),
(20, 'CB', 'boswaa03', 'superadmin', '$2y$10$F0dmvNahmeZC4mLaTV/gqev/X1XbhaXTRhfl8L0q8vb9E6kx1dpXi', NULL, '2023-05-19 07:49:47', '2023-05-19 07:49:47'),
(21, 'spinner', 'spin88', 'spinner', '$2y$10$RiNS.URx0lGaekp6TJK4IOpw6kEfVFke2BK5ktEkLeuCGNVnjzhgK', NULL, '2023-05-21 10:55:27', '2023-05-21 10:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `users_refferal`
--

CREATE TABLE `users_refferal` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `userid_refferal` varchar(100) NOT NULL,
  `login_token` varchar(1000) NOT NULL,
  `mitra_baru` tinyint(1) NOT NULL,
  `gambar_profil` varchar(1000) NOT NULL,
  `website` varchar(50) NOT NULL,
  `namapage` varchar(100) NOT NULL,
  `whatsapp` varchar(500) NOT NULL,
  `facebook` varchar(1000) NOT NULL,
  `bg_page` varchar(100) NOT NULL,
  `color_page` varchar(100) NOT NULL,
  `text_page` varchar(105) NOT NULL,
  `btn_daftar_color` varchar(100) NOT NULL,
  `btn_login_color` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_refferal`
--

INSERT INTO `users_refferal` (`id`, `username`, `password`, `userid_refferal`, `login_token`, `mitra_baru`, `gambar_profil`, `website`, `namapage`, `whatsapp`, `facebook`, `bg_page`, `color_page`, `text_page`, `btn_daftar_color`, `btn_login_color`, `created_at`, `updated_at`) VALUES
(1, 'rangga', '5983e6299511d49115e906b3a9de6fc3', 'poorgas', '79672e479fc2fe12f79f44d48821fbb1', 0, 'mediagalleryfoto-img/fOmZPKD7iVWLx5mCuJFZYOQRLaSjKq6sIZRzLBti.png', 'duogaming', 'jancok', '82174887653', 'https://www.facebook.com/profile.php?id=100008388875871', 'mediagalleryfoto-img/mKXOAEmAGX9ybC3bJuzuxfzRz5PeJzjfidWxCWD1.jpg', 'prfcto1', 'MITRA TERPERCAYA', 'btncto4', 'btncto2', '2023-07-30 11:38:52', '2023-08-01 02:00:51'),
(3, 'bandot88', '79672e479fc2fe12f79f44d48821fbb1', 'bandot88', '', 0, 'messageImage_1686976579320.jpg', 'neon4d', 'wakjon', '81388369866', 'https://www.facebook.com/profile.php?id=100067925963597&mibextid=ZbWKwL', 'dark1.png', 'prfcto1', 'MITRA TERPERCAYA', 'btncto1', 'btncto2', '2023-07-30 11:38:52', '2023-07-30 11:38:52'),
(4, 'memberpro', '79672e479fc2fe12f79f44d48821fbb1', 'memberpro', '', 0, 'messageImage_1686976673481.jpg', 'neon4d', 'memberpro', '81369595529', 'https://www.facebook.com/revanove', 'dark1.png', 'prfcto1', 'MITRA TERPERCAYA', 'btncto1', 'btncto2', '2023-07-30 11:38:52', '2023-07-30 11:38:52'),
(5, 'melvy', '79672e479fc2fe12f79f44d48821fbb1', 'melvy', '', 0, 'messageImage_1686976786742.jpg', 'doyantoto', 'melvy', '87708952939', 'https://www.facebook.com/profile.php?id=100072050083780&mibextid=ZbWKwL', 'dark1.png', 'prfcto1', 'MITRA TERPERCAYA', 'btncto1', 'btncto2', '2023-07-30 11:38:52', '2023-07-30 11:38:52'),
(6, 'pastiwd88', '79672e479fc2fe12f79f44d48821fbb1', 'pastiwd88', '', 0, 'messageImage_1686976862025.jpg', 'arta4d', 'pastiwd88', '82185593839', 'https://www.facebook.com/profile.php?id=100090657667136', 'dark1.png', 'prfcto1', 'MITRA TERPERCAYA', 'btncto1', 'btncto2', '2023-07-30 11:38:52', '2023-07-30 11:38:52'),
(7, 'rapika', '79672e479fc2fe12f79f44d48821fbb1', 'rapika', '', 0, 'messageImage_1686976896901.jpg', 'doyantoto', 'rapika', '82169767286', 'https://www.facebook.com/markpolo.markpolo.73?mibextid=ZbWKwL', 'dark1.png', 'prfcto1', 'MITRA TERPERCAYA', 'btncto1', 'btncto2', '2023-07-30 11:38:52', '2023-07-30 11:38:52'),
(8, 'pesawat123', '79672e479fc2fe12f79f44d48821fbb1', 'pesawat123', '', 0, 'messageImage_1686977066460.jpg', 'doyantoto', 'pesawat123', '82310491099', 'https://www.facebook.com/sikin.sgp.9?mibextid=ZbWKwL', 'dark1.png', 'prfcto1', 'MITRA TERPERCAYA', 'btncto1', 'btncto2', '2023-07-30 11:38:52', '2023-07-30 11:38:52'),
(9, 'ARTA08', '79672e479fc2fe12f79f44d48821fbb1', 'ARTA08', '', 0, 'messageImage_1686977102423.jpg', 'arta4d', 'ajeng', '87880020008', 'https://www.facebook.com/profile.php?id=100063631264307&mibextid=ZbWKwL', 'dark1.png', 'prfcto1', 'MITRA TERPERCAYA', 'btncto1', 'btncto2', '2023-07-30 11:38:52', '2023-07-30 11:38:52'),
(10, 'wahyu1', '79672e479fc2fe12f79f44d48821fbb1', 'wahyu1', '', 0, 'messageImage_1686977157946.jpg', 'arwanatoto', 'wahyu1', '82148255130', 'https://www.facebook.com/profile.php?id=100063458014526&mibextid=ZbWKwL', 'dark1.png', 'prfcto1', 'MITRA TERPERCAYA', 'btncto1', 'btncto2', '2023-07-30 11:38:52', '2023-07-30 11:38:52'),
(11, 'setiawan1', '79672e479fc2fe12f79f44d48821fbb1', 'setiawan1', '', 0, 'messageImage_1686977439378.jpg', 'arwanatoto', 'setiawan1', '82131849400', 'https://www.facebook.com/azara.azara.3511041?mibextid=ZbWKwL', 'dark1.png', 'prfcto1', 'MITRA TERPERCAYA', 'btncto1', 'btncto2', '2023-07-30 11:38:52', '2023-07-30 11:38:52'),
(12, 'arisan01', '79672e479fc2fe12f79f44d48821fbb1', 'arisan01', '', 0, 'messageImage_1686979891722.jpg', 'arwanatoto', 'arisan01', '6282168891682', '#', '', '', '', '', '', '2023-07-30 11:38:52', '2023-07-30 11:38:52'),
(13, 'bebeh212', '79672e479fc2fe12f79f44d48821fbb1', 'bebeh212', '', 0, 'messageImage_1686979954732.jpg', 'arwanatoto', 'bebeh212', '87800047879', 'https://www.facebook.com/profile.php?id=100087091953352', 'dark1.png', 'prfcto1', 'MITRA TERPERCAYA', 'btncto1', 'btncto2', '2023-07-30 11:38:52', '2023-07-30 11:38:52'),
(14, 'budiredwine', '79672e479fc2fe12f79f44d48821fbb1', 'budiredwine', '', 0, 'messageImage_1686985698979.jpg', 'arwanatoto', 'budiredwine', '88989983056', 'https://www.facebook.com/khusnul.fatimah.988373?mibextid=ZbWKwL', 'dark1.png', 'prfcto1', 'MITRA TERPERCAYA', 'btncto1', 'btncto2', '2023-07-30 11:38:52', '2023-07-30 11:38:52'),
(15, 'colokbebas', '79672e479fc2fe12f79f44d48821fbb1', 'colokbebas', '', 0, 'messageImage_1686985779911.jpg', 'arwanatoto', 'colokbebas', '8990978699', 'https://www.facebook.com/dika.apriyadi.77?mibextid=ZbWKwL', 'dark1.png', 'prfcto1', 'MITRA TERPERCAYA', 'btncto1', 'btncto2', '2023-07-30 11:38:52', '2023-07-30 11:38:52'),
(16, 'septi77', '79672e479fc2fe12f79f44d48821fbb1', 'septi77', '', 0, 'messageImage_1686985801837.jpg', 'arwanatoto', 'septi77', '82299036445', 'https://www.facebook.com/iyan.s.902819', 'dark1.png', 'prfcto1', 'MITRA TERPERCAYA', 'btncto1', 'btncto2', '2023-07-30 11:38:52', '2023-07-30 11:38:52'),
(18, 'rapunsel', '79672e479fc2fe12f79f44d48821fbb1', 'rapunsel', '', 0, 'profile_1690361479_rapunsel_1690361478971_rapunsel21.png', 'arwanatoto', 'rapunsel', '81229638506', 'https://www.facebook.com/profile.php?id=100088692025291&mibextid=ZbWKwL', 'dark1.png', 'prfcto1', 'MITRA TERPERCAYA', 'btncto1', 'btncto2', '2023-07-30 11:38:52', '2023-07-30 11:38:52'),
(27, 'wantos', 'b898d6ae54ef870c8d5517f367a4779e', 'wantos', 'wantos', 1, 'user_refferal_img/ck4fS6EKFaFveZDtawHOeyOH54camzU0ZPH2BMLz.png', 'arwanatoto', 'wantos', 'wantos', 'wantos', 'user_refferal_img/LwAqaiPFPzIpWbVNBNCuvWsAltE2I8F6Ga7g0L6q.png', 'wantos', 'wantos', 'wantos', 'wantos', '2023-08-01 04:25:51', '2023-08-01 04:25:51'),
(28, 'result.errors', '40fdaea60980a7f0cb6e762dc5184765', 'result.errors', 'result.errors', 1, 'user_refferal_img/t2ZxUlRXbqHdN0xur7kyyG6gZjZwpWFhFUgL4C2R.png', 'arwanatoto', 'result.errors', 'result.errors', 'result.errors', 'user_refferal_img/18IxgUrsrIUA6eGGzZjcerJdkC6TZkrt5RGYK8lY.png', 'result.errors', 'result.errors', 'result.errors', 'result.errors', '2023-08-01 04:46:23', '2023-08-01 04:46:23'),
(29, 'wantos', 'ed07c5c79f1f440cf24f901fad447997', 'dasdsadasd', 'asdasdsada', 1, 'user_refferal_img/9CwzZOqBxo6yKGURoBVrkvKewQSnN3dacrUlA5Xt.png', 'arwanatoto', 'asdasdasd', 'asdasdasd', 'asdasdas', 'user_refferal_img/WCrcipBNtJ33PmZECnZmuSiYmMWnLYMd3vjwMCdT.png', 'asdsad', 'asdasd', 'asdasd', 'asdasd', '2023-08-01 04:59:56', '2023-08-01 22:15:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_l21`
--
ALTER TABLE `admin_l21`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kasbon`
--
ALTER TABLE `data_kasbon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_popup`
--
ALTER TABLE `data_popup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gaji_refferal`
--
ALTER TABLE `gaji_refferal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links_shorten`
--
ALTER TABLE `links_shorten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pencari_refferal`
--
ALTER TABLE `pencari_refferal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syarat_ketentuan`
--
ALTER TABLE `syarat_ketentuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_downline`
--
ALTER TABLE `tabel_downline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_newmember`
--
ALTER TABLE `tabel_newmember`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `users_refferal`
--
ALTER TABLE `users_refferal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_l21`
--
ALTER TABLE `admin_l21`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_kasbon`
--
ALTER TABLE `data_kasbon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_popup`
--
ALTER TABLE `data_popup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gaji_refferal`
--
ALTER TABLE `gaji_refferal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `links_shorten`
--
ALTER TABLE `links_shorten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `pencari_refferal`
--
ALTER TABLE `pencari_refferal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `syarat_ketentuan`
--
ALTER TABLE `syarat_ketentuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tabel_downline`
--
ALTER TABLE `tabel_downline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `tabel_newmember`
--
ALTER TABLE `tabel_newmember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users_refferal`
--
ALTER TABLE `users_refferal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
