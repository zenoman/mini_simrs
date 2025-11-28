-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 9.3.0 - Homebrew
-- OS Server:                    macos15.2
-- HeidiSQL Versi:               12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table mini_simrs.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.cache: ~0 rows (lebih kurang)
DELETE FROM `cache`;

-- membuang struktur untuk table mini_simrs.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.cache_locks: ~0 rows (lebih kurang)
DELETE FROM `cache_locks`;

-- membuang struktur untuk table mini_simrs.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.failed_jobs: ~0 rows (lebih kurang)
DELETE FROM `failed_jobs`;

-- membuang struktur untuk table mini_simrs.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.jobs: ~0 rows (lebih kurang)
DELETE FROM `jobs`;

-- membuang struktur untuk table mini_simrs.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.job_batches: ~0 rows (lebih kurang)
DELETE FROM `job_batches`;

-- membuang struktur untuk table mini_simrs.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.migrations: ~13 rows (lebih kurang)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_11_20_004029_rs_pasien', 1),
	(5, '2025_11_20_004048_rs_dokter', 1),
	(6, '2025_11_20_004055_rs_kunjungan', 2),
	(7, '2025_11_20_004103_rs_trx', 2),
	(8, '2025_11_20_004107_rs_detail_trx', 2),
	(9, '2025_11_20_004125_rs_poli', 2),
	(10, '2025_11_20_004138_rs_penjamin', 2),
	(11, '2025_11_20_032907_create_personal_access_tokens_table', 3),
	(12, '2025_11_23_003802_rs_jadwal_dokter', 3),
	(13, '2025_11_23_004041_rs_libur_dokter', 3),
	(14, '2025_11_25_065931_rs_asesmen_medis', 4),
	(15, '2025_11_25_071643_rs_gambar_gigi', 5);

-- membuang struktur untuk table mini_simrs.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.password_reset_tokens: ~0 rows (lebih kurang)
DELETE FROM `password_reset_tokens`;

-- membuang struktur untuk table mini_simrs.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.personal_access_tokens: ~0 rows (lebih kurang)
DELETE FROM `personal_access_tokens`;

-- membuang struktur untuk table mini_simrs.rs_asesmen_medis
CREATE TABLE IF NOT EXISTS `rs_asesmen_medis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_register` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `planning` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edukasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tkd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suhu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nadi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spo2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_gambar_gigi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oclusi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `torus_palatinus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `torus_mandibularis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `palatum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diastema` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diastema_ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_lain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_m_f` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jum_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_ot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jum_foto_rontgen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_ot_rg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil_odontogram` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_odontogram` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.rs_asesmen_medis: ~1 rows (lebih kurang)
DELETE FROM `rs_asesmen_medis`;
INSERT INTO `rs_asesmen_medis` (`id`, `no_register`, `tanggal`, `keluhan`, `diagnosa`, `planning`, `edukasi`, `tkd`, `suhu`, `nadi`, `spo2`, `kode_gambar_gigi`, `oclusi`, `torus_palatinus`, `torus_mandibularis`, `palatum`, `diastema`, `diastema_ket`, `ket_lain`, `d_m_f`, `jum_foto`, `foto_ot`, `jum_foto_rontgen`, `foto_ot_rg`, `hasil_odontogram`, `ket_odontogram`, `created_at`, `updated_at`) VALUES
	(1, 'KJ202511230001', '2025-11-28', 'iIi', 'i', 'i', 'i', 'i', 'i', 'i', 'i', 'GB202511280001', 'Normal Bite', 'Tidak Ada', 'Tidak Ada', 'Dalam', 'Tidak Ada', '', '-', '1|1|0', '', '-', '', '-', '{"teeth":[{"code":"UNE","pos":"12"},{"code":"NVT","pos":"14"},{"code":"CFR","pos":"44"},{"code":"MIS","pos":"42"}],"bridges":[{"name":"BRIDGE","startVert":[{"x":"746.25","y":"30"},{"x":"806.875","y":"90.625"}],"endVert":[{"x":"887.5","y":"30"},{"x":"948.125","y":"90.625"}],"options":{"strokeStyle":"#555"}}]}', '{"teeth_ket":[{"pos":"12","code":"UNE","keterangan":"une jk"},{"pos":"14","code":"NVT","keterangan":"nvt"},{"pos":"44","code":"CFR","keterangan":"frx"},{"pos":"42","code":"MIS","keterangan":"mis"},{"pos":"23","code":"FRM_ACR","keterangan":"frm"}],"bridge_ket":[{"pos":"23 bridge 25","pos1":"23","pos2":"25","name":"BRIDGE","keterangan":"porselen"}]}', '2025-11-27 20:22:59', '2025-11-27 20:22:59');

-- membuang struktur untuk table mini_simrs.rs_detail_trx
CREATE TABLE IF NOT EXISTS `rs_detail_trx` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_tindakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` decimal(8,2) NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.rs_detail_trx: ~2 rows (lebih kurang)
DELETE FROM `rs_detail_trx`;
INSERT INTO `rs_detail_trx` (`id`, `no_transaksi`, `nama_tindakan`, `harga`, `qty`, `subtotal`, `created_at`, `updated_at`) VALUES
	(3, 'TX202511200002', 'poli spesialis THT', '20000', 3.00, 60000.00, '2025-11-19 23:39:07', '2025-11-19 23:39:07');

-- membuang struktur untuk table mini_simrs.rs_dokter
CREATE TABLE IF NOT EXISTS `rs_dokter` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_dokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rs_dokter_kode_dokter_unique` (`kode_dokter`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.rs_dokter: ~2 rows (lebih kurang)
DELETE FROM `rs_dokter`;
INSERT INTO `rs_dokter` (`id`, `kode_dokter`, `nama_dokter`, `created_at`, `updated_at`) VALUES
	(1, '001', 'Dr Akbar', NULL, NULL),
	(2, '002', 'dr sandi', NULL, NULL),
	(3, '003', 'dr hanafi', NULL, NULL);

-- membuang struktur untuk table mini_simrs.rs_gambar_gigi
CREATE TABLE IF NOT EXISTS `rs_gambar_gigi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_loc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SOU',
  `pos_loc_general` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_loc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.rs_gambar_gigi: ~7 rows (lebih kurang)
DELETE FROM `rs_gambar_gigi`;
INSERT INTO `rs_gambar_gigi` (`id`, `kode_gambar`, `code_loc`, `pos_loc_general`, `pos_loc`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 'KJ202511230001', 'BRIDGE', '23', '23', 'porselen', '2025-11-27 20:22:59', '2025-11-27 20:22:59'),
	(2, 'KJ202511230001', 'BRIDGE', '25', '25', 'porselen', '2025-11-27 20:22:59', '2025-11-27 20:22:59'),
	(3, 'KJ202511230001', 'UNE', '12', '12', 'une jk', '2025-11-27 20:22:59', '2025-11-27 20:22:59'),
	(4, 'KJ202511230001', 'NVT', '14', '14', 'nvt', '2025-11-27 20:22:59', '2025-11-27 20:22:59'),
	(5, 'KJ202511230001', 'CFR', '44', '44', 'frx', '2025-11-27 20:22:59', '2025-11-27 20:22:59'),
	(6, 'KJ202511230001', 'MIS', '42', '42', 'mis', '2025-11-27 20:22:59', '2025-11-27 20:22:59'),
	(7, 'KJ202511230001', 'FRM_ACR', '23', '23', 'frm', '2025-11-27 20:22:59', '2025-11-27 20:22:59');

-- membuang struktur untuk table mini_simrs.rs_jadwal_dokter
CREATE TABLE IF NOT EXISTS `rs_jadwal_dokter` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_dokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_poli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_mulai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_selesai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.rs_jadwal_dokter: ~21 rows (lebih kurang)
DELETE FROM `rs_jadwal_dokter`;
INSERT INTO `rs_jadwal_dokter` (`id`, `id_dokter`, `kode_poli`, `hari`, `jam_mulai`, `jam_selesai`, `created_at`, `updated_at`) VALUES
	(1, '001', 'THT', 'Senin', '08:00', '12:00', NULL, NULL),
	(2, '001', 'THT', 'Selasa', '08:00', '12:00', NULL, NULL),
	(3, '001', 'THT', 'Rabu', '08:00', '12:00', NULL, NULL),
	(4, '001', 'THT', 'Kamis', '08:00', '12:00', NULL, NULL),
	(5, '001', 'THT', 'Jumat', '08:00', '12:00', NULL, NULL),
	(6, '001', 'THT', 'Sabtu', '08:00', '12:00', NULL, NULL),
	(7, '001', 'THT', 'Minggu', '08:00', '12:00', NULL, NULL),
	(8, '002', 'KIA', 'Senin', '09:00', '13:00', NULL, NULL),
	(9, '002', 'KIA', 'Selasa', '09:00', '13:00', NULL, NULL),
	(10, '002', 'KIA', 'Rabu', '09:00', '13:00', NULL, NULL),
	(11, '002', 'KIA', 'Kamis', '09:00', '13:00', NULL, NULL),
	(12, '002', 'KIA', 'Jumat', '09:00', '13:00', NULL, NULL),
	(13, '002', 'KIA', 'Sabtu', '09:00', '13:00', NULL, NULL),
	(14, '002', 'KIA', 'Minggu', '09:00', '13:00', NULL, NULL),
	(15, '003', 'ANA', 'Senin', '13:00', '17:00', NULL, NULL),
	(16, '003', 'ANA', 'Selasa', '13:00', '17:00', NULL, NULL),
	(17, '003', 'ANA', 'Rabu', '13:00', '17:00', NULL, NULL),
	(18, '003', 'ANA', 'Kamis', '13:00', '17:00', NULL, NULL),
	(19, '003', 'ANA', 'Jumat', '13:00', '17:00', NULL, NULL),
	(20, '003', 'ANA', 'Sabtu', '13:00', '17:00', NULL, NULL),
	(21, '003', 'ANA', 'Minggu', '13:00', '17:00', NULL, NULL);

-- membuang struktur untuk table mini_simrs.rs_kunjungan
CREATE TABLE IF NOT EXISTS `rs_kunjungan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_registrasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_urut` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_rm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_kunjungan` date DEFAULT NULL,
  `kode_dokter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_poli` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instalasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penjamin_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validasi_antrian` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.rs_kunjungan: ~2 rows (lebih kurang)
DELETE FROM `rs_kunjungan`;
INSERT INTO `rs_kunjungan` (`id`, `no_registrasi`, `no_urut`, `no_rm`, `tanggal_kunjungan`, `kode_dokter`, `id_poli`, `instalasi`, `penjamin_id`, `validasi_antrian`, `created_at`, `updated_at`) VALUES
	(2, 'KJ202511200002', '001', '8', '2025-11-20', '002', 'THT', 'Rawat Jalan', 'ADMEDIKA', 'N', '2025-11-19 21:40:05', '2025-11-19 23:37:21'),
	(6, 'KJ202511230001', 'KJ202511230001', '8', '2021-11-23', '001', 'GIGI', 'Rawat Jalan', 'BPJS', 'N', '2025-11-22 23:51:58', '2025-11-22 23:51:58');

-- membuang struktur untuk table mini_simrs.rs_libur_dokter
CREATE TABLE IF NOT EXISTS `rs_libur_dokter` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_dokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_poli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_libur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.rs_libur_dokter: ~0 rows (lebih kurang)
DELETE FROM `rs_libur_dokter`;

-- membuang struktur untuk table mini_simrs.rs_pasien
CREATE TABLE IF NOT EXISTS `rs_pasien` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_rm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rs_pasien_no_rm_unique` (`no_rm`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.rs_pasien: ~7 rows (lebih kurang)
DELETE FROM `rs_pasien`;
INSERT INTO `rs_pasien` (`id`, `no_rm`, `nama_pasien`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `created_at`, `updated_at`) VALUES
	(5, '1', 'Bamukmin', '1998-09-09', 'L', 'jln Mauni kul', '2025-11-19 20:19:18', '2025-11-19 20:36:30'),
	(6, '8', 'Siswanti', '1992-09-09', 'L', 'jln mauni', '2025-11-19 20:28:53', '2025-11-19 20:28:53'),
	(7, '3', 'Muslimah', '1995-09-08', 'P', 'jln Kedaton', '2025-11-19 21:51:43', '2025-11-19 21:51:43'),
	(8, '4', 'Kariyono', '1992-09-09', 'L', 'jln mauni', '2025-11-19 23:21:08', '2025-11-19 23:21:08'),
	(9, '5', 'DWI AJENG NOVITASARI, A.md.Farm', '1998-09-09', 'P', 'jln manggis', '2025-11-19 23:21:30', '2025-11-19 23:21:30'),
	(10, '6', 'mifta', '1992-10-08', 'P', 'jln do', '2025-11-19 23:21:43', '2025-11-19 23:21:43');

-- membuang struktur untuk table mini_simrs.rs_penjamin
CREATE TABLE IF NOT EXISTS `rs_penjamin` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_penjamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.rs_penjamin: ~2 rows (lebih kurang)
DELETE FROM `rs_penjamin`;
INSERT INTO `rs_penjamin` (`id`, `id_penjamin`, `penjamin`, `created_at`, `updated_at`) VALUES
	(1, 'BPJS', 'BPJS', NULL, NULL),
	(2, 'ADMEDIKA', 'ADMEDIKA', NULL, NULL),
	(3, 'UMUM', 'UMUM', NULL, NULL);

-- membuang struktur untuk table mini_simrs.rs_poli
CREATE TABLE IF NOT EXISTS `rs_poli` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_poli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_poli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.rs_poli: ~2 rows (lebih kurang)
DELETE FROM `rs_poli`;
INSERT INTO `rs_poli` (`id`, `kode_poli`, `nama_poli`, `created_at`, `updated_at`) VALUES
	(1, 'THT', 'POLI THT', NULL, NULL),
	(2, 'KIA', 'POLI KIA', NULL, NULL),
	(3, 'ANA', 'POLI ANAK', NULL, NULL),
	(4, 'GIGI', 'POLI GIGI', NULL, NULL);

-- membuang struktur untuk table mini_simrs.rs_trx
CREATE TABLE IF NOT EXISTS `rs_trx` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_register` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.rs_trx: ~2 rows (lebih kurang)
DELETE FROM `rs_trx`;
INSERT INTO `rs_trx` (`id`, `no_transaksi`, `no_register`, `tanggal`, `total_harga`, `created_at`, `updated_at`) VALUES
	(4, 'TX202511200002', 'KJ202511200002', '2025-11-20', 60000.00, '2025-11-19 23:39:07', '2025-11-19 23:39:07');

-- membuang struktur untuk table mini_simrs.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.sessions: ~2 rows (lebih kurang)
DELETE FROM `sessions`;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('Nvi3Z0Va6zvJBqsPOiWnZLIM5Pjgvu2upRPJ5Zr2', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibmZLRmxqSTJqYnM5ZEJjZEd4MFgwTG5QMjJ1Njcyb284eWlWWTZiaCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hc2VzbWVuL2RldGFpbC1hc2VzbWVuL0tKMjAyNTExMjMwMDAxIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc2NDI3Nzg3Njt9fQ==', 1764304523);

-- membuang struktur untuk table mini_simrs.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel mini_simrs.users: ~0 rows (lebih kurang)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Moch Taufiq Perdana P', 'anakmbarep999@gmail.com', NULL, '$2y$12$RzSWoHh.d331n8pCSugIYuAEalVn36MEBPOukeIfW0h0WR6/rbw2q', NULL, '2025-11-19 18:27:00', '2025-11-19 18:27:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
