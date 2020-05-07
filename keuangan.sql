-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Bulan Mei 2020 pada 23.23
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_groups`
--

CREATE TABLE `aauth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_groups`
--

INSERT INTO `aauth_groups` (`id`, `name`, `definition`) VALUES
(1, 'Admin', 'Super Admin Group'),
(2, 'Public', 'Public Access Group'),
(3, 'Default', 'Default Access Group');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_group_to_group`
--

CREATE TABLE `aauth_group_to_group` (
  `group_id` int(11) UNSIGNED NOT NULL,
  `subgroup_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_login_attempts`
--

CREATE TABLE `aauth_login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(39) DEFAULT '0',
  `timestamp` datetime DEFAULT NULL,
  `login_attempts` tinyint(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aauth_login_attempts`
--

INSERT INTO `aauth_login_attempts` (`id`, `ip_address`, `timestamp`, `login_attempts`) VALUES
(1, '::1', '2020-04-18 21:57:17', 2),
(3, '::1', '2020-04-19 15:54:59', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_perms`
--

CREATE TABLE `aauth_perms` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_perm_to_group`
--

CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_perm_to_user`
--

CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_pms`
--

CREATE TABLE `aauth_pms` (
  `id` int(11) UNSIGNED NOT NULL,
  `sender_id` int(11) UNSIGNED NOT NULL,
  `receiver_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL,
  `pm_deleted_sender` int(1) DEFAULT NULL,
  `pm_deleted_receiver` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_users`
--

CREATE TABLE `aauth_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `forgot_exp` text DEFAULT NULL,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text DEFAULT NULL,
  `verification_code` text DEFAULT NULL,
  `totp_secret` varchar(16) DEFAULT NULL,
  `ip_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_users`
--

INSERT INTO `aauth_users` (`id`, `email`, `pass`, `username`, `banned`, `last_login`, `last_activity`, `date_created`, `forgot_exp`, `remember_time`, `remember_exp`, `verification_code`, `totp_secret`, `ip_address`) VALUES
(1, 'admin@example.com', 'dd5073c93fb477a167fd69072e95455834acd93df8fed41a2c468c45b394bfe3', 'Admin', 0, '2020-05-05 19:34:06', '2020-05-05 19:34:06', NULL, NULL, '2020-05-08 00:00:00', 'F9feycW0lvJ6xXk1', NULL, NULL, '::1'),
(2, 'rootwritter@member.com', '1fe86e3bb3794628729468fe95c2684777bec5254665d96ec61d302cffbffb4c', 'memberss', 0, '2020-04-28 20:17:41', '2020-04-28 20:17:41', '2020-04-28 20:16:52', NULL, '2020-05-01 00:00:00', '12M3s4HYURZ5k7fj', NULL, NULL, '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_user_to_group`
--

CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_user_to_group`
--

INSERT INTO `aauth_user_to_group` (`user_id`, `group_id`) VALUES
(1, 1),
(1, 3),
(2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_user_variables`
--

CREATE TABLE `aauth_user_variables` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_kas`
--

CREATE TABLE `buku_kas` (
  `id_buku` int(11) NOT NULL,
  `nama_buku` varchar(128) NOT NULL,
  `desc_buku` text NOT NULL,
  `saldo_buku` double NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `update_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku_kas`
--

INSERT INTO `buku_kas` (`id_buku`, `nama_buku`, `desc_buku`, `saldo_buku`, `created_at`, `update_at`) VALUES
(1, 'Data buku 1', 'Coba', 10000, '12 April 2020', '12 April 2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(128) NOT NULL,
  `type_category` enum('pengeluaran','pemasukan','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `type_category`) VALUES
(1, 'Category', 'pemasukan'),
(3, 'bayar', 'pengeluaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`id`, `title`) VALUES
(1, 'Cash Managements');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `id_transcation` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `amount_transaction` double NOT NULL,
  `desc_transcation` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `type` enum('pemasukan','pengeluaran') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`id_transcation`, `id_category`, `amount_transaction`, `desc_transcation`, `date`, `type`) VALUES
(1, 1, 10000, 'test edit', '2020-04-19', 'pemasukan'),
(2, 1, 10000, 'test', '2020-04-19', 'pemasukan'),
(4, 3, 10000, 'EDIT SMM', '2020-04-22', 'pengeluaran'),
(5, 3, 10000, 'test', '2020-04-30', 'pengeluaran'),
(6, 3, 10000, 'asdadada', '2020-05-01', 'pengeluaran'),
(7, 3, 1000000, 'asdasddasd', '2020-05-01', 'pengeluaran'),
(8, 1, 1745343434, 'teestetsfsd', '2020-05-01', 'pemasukan'),
(10, 1, 100000, 'Utang Baru Kepada Client Test Client Dengan Copy Sejumlah Rp.100000', '2020-05-07', 'pemasukan'),
(11, 1, 50000, 'Utang Baru Kepada Client Test Client Sejumlah Rp.50000', '2020-05-07', 'pemasukan'),
(12, 0, 51000, 'Utang Baru Kepada Client Test Client tanpa copy Sejumlah Rp.51000', '2020-05-07', 'pemasukan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `utang`
--

CREATE TABLE `utang` (
  `id_utang` int(11) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `date_tempo` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `description` text NOT NULL,
  `client` varchar(150) NOT NULL,
  `status` enum('Terbayar','Belum Terbayar') NOT NULL,
  `type` enum('utang','piutang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `utang`
--

INSERT INTO `utang` (`id_utang`, `date_created`, `date_tempo`, `amount`, `description`, `client`, `status`, `type`) VALUES
(1, '2020-05-07', '2020-05-30', 5000000, 'Coba Tanpa Copy', '0', 'Belum Terbayar', 'utang'),
(2, '2020-05-07', '2020-05-31', 100000, 'Test Client Dengan Copy', '0', 'Belum Terbayar', 'utang'),
(3, '2020-05-07', '2020-05-07', 50000, 'Test Dengan copy', 'Test Client', 'Belum Terbayar', 'utang'),
(4, '2020-05-07', '2020-05-21', 51000, 'Test Client tanpa copy', 'Test Client tanpa copy', 'Belum Terbayar', 'utang'),
(5, '2020-05-07', '2020-05-30', 1773434, 'asdasdad', 'Test Client', 'Belum Terbayar', 'utang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aauth_groups`
--
ALTER TABLE `aauth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_group_to_group`
--
ALTER TABLE `aauth_group_to_group`
  ADD PRIMARY KEY (`group_id`,`subgroup_id`);

--
-- Indeks untuk tabel `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_perms`
--
ALTER TABLE `aauth_perms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_perm_to_group`
--
ALTER TABLE `aauth_perm_to_group`
  ADD PRIMARY KEY (`perm_id`,`group_id`);

--
-- Indeks untuk tabel `aauth_perm_to_user`
--
ALTER TABLE `aauth_perm_to_user`
  ADD PRIMARY KEY (`perm_id`,`user_id`);

--
-- Indeks untuk tabel `aauth_pms`
--
ALTER TABLE `aauth_pms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `full_index` (`id`,`sender_id`,`receiver_id`,`date_read`);

--
-- Indeks untuk tabel `aauth_users`
--
ALTER TABLE `aauth_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_user_to_group`
--
ALTER TABLE `aauth_user_to_group`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indeks untuk tabel `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_index` (`user_id`);

--
-- Indeks untuk tabel `buku_kas`
--
ALTER TABLE `buku_kas`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transcation`);

--
-- Indeks untuk tabel `utang`
--
ALTER TABLE `utang`
  ADD PRIMARY KEY (`id_utang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aauth_groups`
--
ALTER TABLE `aauth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `aauth_perms`
--
ALTER TABLE `aauth_perms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aauth_pms`
--
ALTER TABLE `aauth_pms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aauth_users`
--
ALTER TABLE `aauth_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `buku_kas`
--
ALTER TABLE `buku_kas`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transcation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `utang`
--
ALTER TABLE `utang`
  MODIFY `id_utang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
