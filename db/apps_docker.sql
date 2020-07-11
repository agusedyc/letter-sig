<<<<<<< HEAD
-- Adminer 4.7.6 MySQL dump
=======
-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Jul 11, 2020 at 10:03 AM
-- Server version: 10.3.18-MariaDB-1:10.3.18+maria~bionic
-- PHP Version: 7.2.22
>>>>>>> 762687b064a1124cf31ddea44386f2f38f4d982f

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Administrator',	'2',	1594451741);

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*',	2,	NULL,	NULL,	NULL,	1594446673,	1594446673),
('Administrator',	1,	NULL,	NULL,	NULL,	1594446670,	1594446677),
('Pejabat',	1,	NULL,	NULL,	NULL,	1594446696,	1594446708);

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Administrator',	'/*'),
('Pejabat',	'/*');

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `disposisi`;
CREATE TABLE `disposisi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tgl_terima` int(11) NOT NULL,
  `tujuan_id` int(10) NOT NULL,
  `ringkas_dispo` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_keamanan` int(5) NOT NULL,
<<<<<<< HEAD
  `id_kecepatan` int(5) NOT NULL,
  `id_dispo` int(10) NOT NULL,
  PRIMARY KEY (`id`)
=======
  `id_kecepatan` int(5) NOT NULL
>>>>>>> 762687b064a1124cf31ddea44386f2f38f4d982f
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

<<<<<<< HEAD
=======
--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`) VALUES
(1, 'Nama Jabatan');

-- --------------------------------------------------------

--
-- Table structure for table `keamanan`
--
>>>>>>> 762687b064a1124cf31ddea44386f2f38f4d982f

DROP TABLE IF EXISTS `keamanan`;
CREATE TABLE `keamanan` (
<<<<<<< HEAD
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `keamanan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

=======
  `id` int(10) NOT NULL,
  `keamanan` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keamanan`
--

INSERT INTO `keamanan` (`id`, `keamanan`) VALUES
(1, 'Rahasia');

-- --------------------------------------------------------

--
-- Table structure for table `kecepatan`
--
>>>>>>> 762687b064a1124cf31ddea44386f2f38f4d982f

DROP TABLE IF EXISTS `kecepatan`;
CREATE TABLE `kecepatan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kecepatan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

<<<<<<< HEAD
=======
--
-- Dumping data for table `kecepatan`
--

INSERT INTO `kecepatan` (`id`, `kecepatan`) VALUES
(1, 'Segera');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--
>>>>>>> 762687b064a1124cf31ddea44386f2f38f4d982f

DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base',	1594446212),
('m140506_102106_rbac_init',	1594446339),
('m151024_072453_create_route_table',	1594446366),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id',	1594446340),
('m180523_151638_rbac_updates_indexes_without_prefix',	1594446341),
('m200409_110543_rbac_update_mssql_trigger',	1594446341);

DROP TABLE IF EXISTS `publickey`;
CREATE TABLE `publickey` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `pub_key` varchar(255) NOT NULL,
  `path_pubkey` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `route`;
CREATE TABLE `route` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `route` (`name`, `alias`, `type`, `status`) VALUES
('/*',	'*',	'',	1),
('/debug/*',	'*',	'debug',	1),
('/debug/default/*',	'*',	'debug/default',	1),
('/debug/default/db-explain',	'db-explain',	'debug/default',	1),
('/debug/default/download-mail',	'download-mail',	'debug/default',	1),
('/debug/default/index',	'index',	'debug/default',	1),
('/debug/default/toolbar',	'toolbar',	'debug/default',	1),
('/debug/default/view',	'view',	'debug/default',	1),
('/debug/user/*',	'*',	'debug/user',	1),
('/debug/user/reset-identity',	'reset-identity',	'debug/user',	1),
('/debug/user/set-identity',	'set-identity',	'debug/user',	1),
('/gii/*',	'*',	'gii',	1),
('/gii/default/*',	'*',	'gii/default',	1),
('/gii/default/action',	'action',	'gii/default',	1),
('/gii/default/diff',	'diff',	'gii/default',	1),
('/gii/default/index',	'index',	'gii/default',	1),
('/gii/default/preview',	'preview',	'gii/default',	1),
('/gii/default/view',	'view',	'gii/default',	1),
('/mimin/*',	'*',	'mimin',	1),
('/mimin/role/*',	'*',	'mimin/role',	1),
('/mimin/role/create',	'create',	'mimin/role',	1),
('/mimin/role/delete',	'delete',	'mimin/role',	1),
('/mimin/role/index',	'index',	'mimin/role',	1),
('/mimin/role/permission',	'permission',	'mimin/role',	1),
('/mimin/role/update',	'update',	'mimin/role',	1),
('/mimin/role/view',	'view',	'mimin/role',	1),
('/mimin/route/*',	'*',	'mimin/route',	1),
('/mimin/route/create',	'create',	'mimin/route',	1),
('/mimin/route/delete',	'delete',	'mimin/route',	1),
('/mimin/route/generate',	'generate',	'mimin/route',	1),
('/mimin/route/index',	'index',	'mimin/route',	1),
('/mimin/route/update',	'update',	'mimin/route',	1),
('/mimin/route/view',	'view',	'mimin/route',	1),
('/mimin/user/*',	'*',	'mimin/user',	1),
('/mimin/user/create',	'create',	'mimin/user',	1),
('/mimin/user/delete',	'delete',	'mimin/user',	1),
('/mimin/user/index',	'index',	'mimin/user',	1),
('/mimin/user/update',	'update',	'mimin/user',	1),
('/mimin/user/view',	'view',	'mimin/user',	1),
('/site/*',	'*',	'site',	1),
('/site/about',	'about',	'site',	1),
('/site/captcha',	'captcha',	'site',	1),
('/site/contact',	'contact',	'site',	1),
('/site/error',	'error',	'site',	1),
('/site/index',	'index',	'site',	1),
('/site/login',	'login',	'site',	1),
('/site/logout',	'logout',	'site',	1);

DROP TABLE IF EXISTS `surat_masuk`;
CREATE TABLE `surat_masuk` (
<<<<<<< HEAD
  `id` int(100) NOT NULL AUTO_INCREMENT,
=======
  `id` int(100) NOT NULL,
  `tujuan_dispo_id` int(100) NOT NULL DEFAULT 0,
>>>>>>> 762687b064a1124cf31ddea44386f2f38f4d982f
  `no_surat` int(100) NOT NULL,
  `asal_surat` varchar(100) NOT NULL,
  `ringkas_surat` varchar(300) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tgl_surat` varchar(50) NOT NULL,
  `tgl_terima` varchar(50) NOT NULL,
  `file` varchar(300) NOT NULL,
  `path_file` varchar(300) DEFAULT NULL,
  `id_keamanan` int(5) NOT NULL,
  `id_kecepatan` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `jabatan_id` int(20) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_user` int(1) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `last_login_at` int(11) DEFAULT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `jabatan_id`, `nama_lengkap`, `nip`, `username`, `password`, `level_user`, `status`, `last_login_at`, `auth_key`, `verification_token`, `created_at`, `updated_at`) VALUES
<<<<<<< HEAD
(2,	NULL,	'Admin',	'123456789123456789',	'admin',	'$2y$13$cQKBLC3TnMcAcNvc5VjA2egjaIBvh/VY4uscMS/HCWrm7mKveW4Ky',	NULL,	10,	NULL,	NULL,	NULL,	1594451736,	1594452624);
=======
(2, NULL, 'Nama Lengkap', '123456789123456789', 'admin', '$2y$13$ZlsGrxmMKYQ9EXUXO/8MEe5FGIkptdVAOQ4L7I1.m4Vp1L3cCN562', NULL, 10, NULL, NULL, NULL, 1594451736, 1594452624);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_disposisi_user` (`tujuan_id`),
  ADD KEY `FK_disposisi_keamanan` (`id_keamanan`),
  ADD KEY `FK_disposisi_kecepatan` (`id_kecepatan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keamanan`
--
ALTER TABLE `keamanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecepatan`
--
ALTER TABLE `kecepatan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `publickey`
--
ALTER TABLE `publickey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_surat_masuk_user` (`tujuan_dispo_id`),
  ADD KEY `FK_surat_masuk_keamanan` (`id_keamanan`),
  ADD KEY `FK_surat_masuk_kecepatan` (`id_kecepatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keamanan`
--
ALTER TABLE `keamanan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kecepatan`
--
ALTER TABLE `kecepatan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publickey`
--
ALTER TABLE `publickey`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `FK_disposisi_keamanan` FOREIGN KEY (`id_keamanan`) REFERENCES `keamanan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_disposisi_kecepatan` FOREIGN KEY (`id_kecepatan`) REFERENCES `kecepatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_disposisi_user` FOREIGN KEY (`tujuan_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `FK_surat_masuk_keamanan` FOREIGN KEY (`id_keamanan`) REFERENCES `keamanan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_surat_masuk_kecepatan` FOREIGN KEY (`id_kecepatan`) REFERENCES `kecepatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_surat_masuk_user` FOREIGN KEY (`tujuan_dispo_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;
COMMIT;
>>>>>>> 762687b064a1124cf31ddea44386f2f38f4d982f

-- 2020-07-11 12:31:57
