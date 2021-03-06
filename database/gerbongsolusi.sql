-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 30 Jan 2020 pada 06.59
-- Versi Server: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gerbongsolusi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(2, 'Olahraga', '-'),
(3, 'Reuni', '-'),
(4, 'Perayaan', '-'),
(5, 'Travel', '-'),
(6, 'Motivasi', '-'),
(7, 'feature', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id`, `name`, `image`, `description`, `status`) VALUES
(1, 'PT. HM. Sampoerna Tbk', 'CLIENT__1580163284.png', '-', 1),
(2, 'PT. Nojorono (Class Mild & Jazy Mild)', 'CLIENT__1580163295.png', '-', 1),
(3, 'PT. Djarum', 'CLIENT__1580163307.png', '-', 1),
(4, 'Pemerintah Provinsi Sulawesi Tenggara', 'CLIENT__1580163317.png', '-', 1),
(5, 'Pemerintah Kota Kendari', 'CLIENT__1580163329.png', '-', 1),
(6, 'Pemerintah Kota Bau-bau', 'CLIENT__1580163341.png', '-', 1),
(7, 'Pemerintah Kabupaten Konawe Selatan', 'CLIENT__1580163352.png', '-', 1),
(8, 'Pemerintah Kabupaten Konawe', 'CLIENT__1580163366.png', '-', 1),
(9, 'Pemerintah Kabupaten Kolaka', 'CLIENT__1580163386.png', '-', 1),
(10, 'POLDA Sultra', 'CLIENT__1580163397.png', '-', 1),
(11, 'BANK Sultra', 'CLIENT__1579594442.png', '-', 1),
(12, 'PT. Dancow', 'CLIENT__1579594454.png', '-', 1),
(13, 'SHARP', 'CLIENT__1579594469.jpg', '-', 1),
(14, 'Kopi Kapal Api', 'CLIENT__1579594489.png', '-', 1),
(15, 'GoodDay', 'CLIENT__1579594509.png', '-', 1),
(16, 'Kopi ABC', 'CLIENT__1580163017.png', '-', 1),
(17, 'KPU Sultra', 'CLIENT__1579594548.jpg', '-', 1),
(18, 'Toyota', 'CLIENT__1579594560.png', '-', 1),
(19, 'Suzuki', 'CLIENT__1579594570.png', '-', 1),
(20, 'KIA', 'CLIENT__1579594581.png', '-', 1),
(21, 'Wuling Motor', 'CLIENT__1579594612.jpg', '-', 1),
(22, 'Mitsubishi Berlian Motor', 'CLIENT__1579594631.png', '-', 1),
(23, 'Astra Honda Motor', 'CLIENT__1579594641.png', '-', 1),
(24, 'Philips', 'CLIENT__1579594655.png', '-', 1),
(25, 'Unilever', 'CLIENT__1580163262.png', '-', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED DEFAULT NULL,
  `visitor_id` int(10) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`id`, `event_id`, `comment_id`, `visitor_id`, `message`, `timestamp`) VALUES
(1, 3, NULL, 1, 'First Comment', 1579662016),
(2, 3, 1, 2, 'second comment', 1579662277),
(4, 3, 1, 1, 'Second comment 2', 1579662306),
(5, 3, 2, 1, 'Third Comment', 1579670960),
(6, 3, NULL, 1, 'Pesan push', 1579672033),
(7, 3, NULL, 1, 'Pesan push', 1579672037),
(8, 3, NULL, 1, 'Komentar second comment', 1579675123),
(9, 3, 2, 1, 'Komentar second comment', 1579675153);

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `perspective` text,
  `objectif` text,
  `exist` date DEFAULT NULL,
  `address` text,
  `image` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`id`, `name`, `perspective`, `objectif`, `exist`, `address`, `image`, `description`) VALUES
(1, 'Gerbong Solusi Management', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa hic est voluptates, consequatur facere ducimus commodi incidunt consequuntur, optio neque voluptatibus sapiente nobis mollitia modi odio maiores rerum, numquam quam.', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa hic est voluptates, consequatur facere ducimus commodi incidunt consequuntur, optio neque voluptatibus sapiente nobis mollitia modi odio maiores rerum, numquam quam.', '1970-01-01', 'Jalan Mokodompit', 'logo_1579445125.png', 'COMPANY__.html');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon_id` int(10) UNSIGNED NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `icon_id`, `contact`) VALUES
(1, 4, 'https://www.gerbongsolusi.com/'),
(2, 3, 'https://www.facebook.com/gerbongsolusimanagementkendari/'),
(3, 7, 'https://www.instagram.com/gerbongsolusimanagementkendari/'),
(4, 8, 'mailto:gerbongsolusimanagementkendari@gmail.com'),
(5, 6, 'tel:0811-407-271'),
(6, 6, 'tel:0811-4033-666');

-- --------------------------------------------------------

--
-- Struktur dari tabel `division`
--

CREATE TABLE `division` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `division`
--

INSERT INTO `division` (`id`, `name`, `description`) VALUES
(1, 'Petinggi', '-'),
(2, 'Karyawan', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `position_id` int(10) UNSIGNED DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`id`, `division_id`, `position_id`, `position`, `name`, `image`, `description`) VALUES
(1, 1, NULL, 'CEO Gerbong Solusi Management', 'Pop Kendari', 'EMPLOYEE_DIVISION__1__1580296880.jpeg', '-'),
(5, 2, NULL, 'Production Backdrop & Special Design', 'Mansyur', 'EMPLOYEE_DIVISION__2__1580302622.jpeg', '-'),
(6, 2, NULL, 'Creative Design', 'Fadlurrahman', 'EMPLOYEE_DIVISION__2__1580302656.jpeg', '-'),
(7, 2, NULL, 'Admin', 'Rezky Ferina Andary', 'EMPLOYEE_DIVISION__2__1580302669.jpeg', '-'),
(8, 2, NULL, 'CO Project', 'Amnur', 'EMPLOYEE_DIVISION__2__1580302678.jpeg', '-'),
(9, 2, NULL, 'Project', 'Mahfud Jainuddin Jasma Jaya. SH.', 'EMPLOYEE_DIVISION__2__1580303234.jpeg', '-'),
(10, 2, NULL, 'Show & Talent Management', 'Muh. Faisal Aqsa Pahege', 'EMPLOYEE_DIVISION__2__1580302707.jpeg', '-'),
(11, 2, NULL, 'Logistic', 'Maman Syahbirin', 'EMPLOYEE_DIVISION__2__1580302714.jpeg', '-'),
(12, 2, NULL, 'Man Power Support', 'Fajar Ridwan', 'EMPLOYEE_DIVISION__2__1580302722.jpeg', '-'),
(13, 2, NULL, 'Management', 'Taufik Wijaya', 'EMPLOYEE_DIVISION__2__1580302730.jpeg', '-'),
(14, 2, NULL, 'Creative', 'Didin Romanzah Yamin', 'EMPLOYEE_DIVISION__2__1580302740.jpeg', '-'),
(17, 2, NULL, 'Rigging Stage Production', 'Yasir', 'EMPLOYEE_DIVISION__2__1580302765.jpeg', '-'),
(100, 2, NULL, 'Media & Relation', 'Rif\'an Muzakkir Mutti', 'EMPLOYEE_DIVISION__2__1580302752.jpeg', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL,
  `preview` varchar(255) NOT NULL,
  `file_content` text NOT NULL,
  `timestamp` int(11) NOT NULL,
  `hit` int(11) NOT NULL,
  `is_news` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `category_id`, `title`, `date`, `image`, `preview`, `file_content`, `timestamp`, `hit`, `is_news`) VALUES
(2, 2, 'Smanam Volley Ball Cup I', '2016-05-01', 'EVENT_Smanam_Volley_Ball_Cup_I_1579425545.png', '-', 'EVENT__1579425545.html', 1579425545, 0, 0),
(3, 5, 'Pule Payung Kulon Progo, Wisata Alam dengan Pemandangan Waduk Sermo. Cantik Banget Deh!', '2020-01-22', 'NEWS_Pule_Payung_Kulon_Progo,_Wisata_Alam_dengan_Pemandangan_Waduk_Sermo__Cantik_Banget_Deh!_1579529384.jpg', 'Cocok nih buat liburan di akhir pekan. Murah meriah dan pemandangannya juara!', 'NEWS__1579773124.html', 1579773124, 0, 1),
(4, 2, 'Tak Berhasil Meraih Pekerjaan Impian Tak Berarti Hidupmu Gagal. 6 Hal Ini yang Justru Kamu Dapatkan', '2020-09-19', 'NEWS_Tak_Berhasil_Meraih_Pekerjaan_Impian_Tak_Berarti_Hidupmu_Gagal__6_Hal_Ini_yang_Justru_Kamu_Dapatkan_1579533807.jpg', 'Jack Ma yang sekaya itu saja pernah puluhan kali ditolak kerja. Hidup tidak segampang itu gagal, kok.', 'NEWS__1579533866.html', 1579533866, 0, 1),
(5, 7, 'Kesetaraan Gender di Industri Film & Perempuan di Direksi BUMN: Erick Thohir hingga Mira Lesmana Berkisah di IMS 2020', '2020-01-27', 'NEWS_Kesetaraan_Gender_di_Industri_Film_Perempuan_di_Direksi_BUMN:_Erick_Thohir_hingga_Mira_Lesmana_Berkisah_di_IMS_2020_1579534164.jpg', 'Berbagai speaker di Indonesia Millennial Summit 2020 bahas posisi generasi muda dan perjalanan Indonesia menuju negara maju', 'NEWS__1579534164.html', 1579534164, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `thumbnail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `event_id`, `name`, `file`, `thumbnail`) VALUES
(1, 3, 'pule payung', 'GALLERY_EVENT_3__1579529441.jpg', 'Pule payung'),
(2, 3, 'cantik banget', 'GALLERY_EVENT_3__1579529470.jpg', 'spot foto keren'),
(3, 3, 'pemandangannya cantik', 'GALLERY_EVENT_3__1579529496.jpg', 'foto keluarga'),
(4, 3, 'Spot', 'GALLERY_EVENT_3__1579529522.jpg', 'spot foto keren'),
(5, 4, 'dok1', 'GALLERY_EVENT_4__1579534186.jpg', 'work'),
(6, 4, 'dok2', 'GALLERY_EVENT_4__1579534202.jpg', 'dok2'),
(7, 4, 'dok3', 'GALLERY_EVENT_4__1579534213.jpg', 'dok3'),
(8, 4, 'dok4', 'GALLERY_EVENT_4__1579534224.jpg', 'dok4'),
(9, 4, 'dok5', 'GALLERY_EVENT_4__1579534239.jpg', 'dok5'),
(10, 5, 'dok1', 'GALLERY_EVENT_5__1579534265.jpg', 'dok1'),
(11, 5, 'dok2', 'GALLERY_EVENT_5__1579534275.jpg', 'dok2'),
(12, 5, 'dok3', 'GALLERY_EVENT_5__1579534285.jpg', 'dok3'),
(13, 5, 'dok4', 'GALLERY_EVENT_5__1579534295.jpg', 'dok4'),
(14, 3, 'GALLERY_EVENT_3__1579579041.jpg', 'GALLERY_EVENT_3__1579579041.jpg', 'contoh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'uadmin', 'user admin'),
(3, 'user', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `icon`
--

CREATE TABLE `icon` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file` text NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `icon`
--

INSERT INTO `icon` (`id`, `name`, `description`, `file`, `icon`) VALUES
(3, 'facebook', 'Icon Facebook', 'facebook.png', 'tf-ion-social-facebook'),
(4, 'website', 'Icon Website', 'website.png', 'tf-ion-social-google-outline'),
(6, 'phone', 'Icon Telephone', 'phone.png', 'tf-ion-ios-telephone-outline'),
(7, 'instagram', 'Icon Instagram', 'instagram.png', 'tf-ion-social-instagram-outline'),
(8, 'gmail', 'Icon Gmail', 'gmail.png', 'tf-ion-ios-email-outline');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `map`
--

CREATE TABLE `map` (
  `id` int(10) UNSIGNED NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` varchar(50) NOT NULL,
  `link_visitor` varchar(255) DEFAULT NULL,
  `list_id` varchar(200) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `position` int(4) NOT NULL,
  `description` text NOT NULL,
  `for_visitor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `menu_id`, `name`, `link`, `link_visitor`, `list_id`, `icon`, `status`, `position`, `description`, `for_visitor`) VALUES
(101, 1, 'Beranda', 'admin/', NULL, 'home_index', 'home', 1, 1, '-', 0),
(102, 1, 'Group', 'admin/group', NULL, 'group_index', 'home', 1, 2, '-', 0),
(103, 1, 'Setting', 'admin/menus', NULL, '-', 'cogs', 1, 3, '-', 0),
(104, 1, 'User', 'admin/user_management', NULL, 'user_management_index', 'users', 1, 4, '-', 0),
(106, 103, 'Menu', 'admin/menus', NULL, 'menus_index', 'circle', 1, 1, '-', 0),
(107, 2, 'Beranda', 'user/home', NULL, 'home_index', 'home', 1, 1, '-', 0),
(108, 2, 'Pengguna', 'uadmin/users', NULL, 'users_index', 'home', 1, 2, '-', 0),
(110, 3, 'Beranda', 'user/home', 'visitor/home', 'home_index', 'home', 1, 1, '-', 1),
(111, 3, 'Profil', 'user/profil', 'visitor/profil', 'visitor_profil', 'home', 1, 1, '-', 1),
(112, 111, 'Tentang Kami', 'user/company', 'visitor/company', 'company_index', 'home', 1, 1, '-', 1),
(113, 111, 'Team', 'user/team', 'visitor/team', 'team_index', 'home', 1, 1, '-', 1),
(114, 3, 'Event', 'user/event', 'visitor/event', 'event_index', 'home', 1, 1, '-', 1),
(115, 3, 'Berita', 'user/news', 'visitor/news', 'news_index', 'home', 1, 1, '-', 1),
(116, 3, 'Kontak', 'user/contact', 'visitor/contact', 'contact_index', 'home', 1, 1, '-', 1),
(117, 3, 'Konfigurasi', 'user/config', '#', 'job_index', 'home', 1, 1, '-', 0),
(118, 117, 'Divisi', 'user/division', '#', 'division_index', 'home', 1, 1, '-', 0),
(119, 117, 'Jabatan', 'user/position', '#', 'position_index', 'home', 0, 1, '-', 0),
(120, 2, 'Konfigurasi', 'uadmin/configuration', '#', 'configuration_index', 'home', 1, 1, '-', 0),
(121, 117, 'Kategori Berita', 'user/category', '#', 'category_index', 'home', 1, 1, '-', 0),
(122, 111, 'Klien', 'user/client', '#', 'client_index', 'home', 1, 1, '-', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `position`
--

CREATE TABLE `position` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `position`
--

INSERT INTO `position` (`id`, `name`, `description`) VALUES
(4, 'Creative', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` text NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`, `image`, `address`) VALUES
(1, '127.0.0.1', 'admin@fixl.com', '$2y$12$XpBgMvQ5JzfvN3PTgf/tA.XwxbCOs3mO0a10oP9/11qi1NUpv46.u', 'admin@fixl.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1580296090, 1, 'Admin', 'istrator', '081342989185', 'USER_1_1571554027.jpeg', 'admin'),
(13, '::1', 'uadmin@gmail.com', '$2y$10$78SZyvKRKMU7nPCew9w4nOpEUmJ1SeTV4L4ZG2NXXSfbEaswqoepq', 'uadmin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568678256, 1580306858, 1, 'admin', 'Dinas', '00', 'USER_13_1568678463.jpg', 'jln mutiara no 8'),
(14, '::1', 'admin@gmail.com', '$2y$10$8TjuJ7IsmmJ2LPSduPfbfewkWKeNLkJmApEucnh69l/oodzA/n/3K', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1579356907, 1580307473, 1, 'Gerbong Solusi', 'Management', '081234567890', 'default.jpg', 'Jalan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(29, 13, 2),
(30, 14, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor`
--

CREATE TABLE `visitor` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `visitor`
--

INSERT INTO `visitor` (`id`, `username`, `image`) VALUES
(1, 'visitor 1', 'default.jpg'),
(2, 'visitor 2', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_ibfk_1` (`visitor_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `icon_id` (`icon_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icon`
--
ALTER TABLE `icon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `icon`
--
ALTER TABLE `icon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`visitor_id`) REFERENCES `visitor` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);

--
-- Ketidakleluasaan untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`icon_id`) REFERENCES `icon` (`id`);

--
-- Ketidakleluasaan untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
