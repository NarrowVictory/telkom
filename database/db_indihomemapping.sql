-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 05 Des 2021 pada 20.48
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_indihomemapping`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keluhan`
--

CREATE TABLE `tb_keluhan` (
  `id_tickets` varchar(50) NOT NULL DEFAULT '',
  `id_pelanggan` varchar(50) NOT NULL DEFAULT '',
  `no_hp` varchar(15) DEFAULT NULL,
  `topik_keluhan` varchar(50) DEFAULT NULL,
  `detail_keluhan` text,
  `alamat` text,
  `tgl_keluhan` datetime DEFAULT NULL,
  `id_teknisi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabel ini menyimpan pelaporan gangguan oleh pelanggan, lalu tanggal proses itu dikerjakan oleh teknisi dan supervisor';

--
-- Dumping data untuk tabel `tb_keluhan`
--

INSERT INTO `tb_keluhan` (`id_tickets`, `id_pelanggan`, `no_hp`, `topik_keluhan`, `detail_keluhan`, `alamat`, `tgl_keluhan`, `id_teknisi`) VALUES
('IN19630584', 'b7370bed-3186-434a-864e-94d15ce18da0', '081248142424', 'Internet Mati', 'Kabel Putus di landing', 'Alue Buket', '2021-12-03 07:02:50', NULL),
('IN46079315', '2c02621f-dc8f-4b06-a7b4-71689f0592ee', '081216221775', 'Jaringan Lelet', 'Ketika Main Internet, Sangat Lelet', 'Abeuk Leupon (Leupen)', '2021-12-05 02:27:30', NULL),
('IN53089726', 'b7370bed-3186-434a-864e-94d15ce18da0', '081248142424', 'Internet Mati', 'Lampu Tidak Nyala', 'Alue Buket', '2021-12-05 02:04:31', NULL),
('IN69582704', 'b7370bed-3186-434a-864e-94d15ce18da0', '081248142424', 'Internet Mati', 'Lampu Tidak Nyala', 'Alue Buket', '2021-12-05 02:03:57', NULL),
('IN70952483', 'b7370bed-3186-434a-864e-94d15ce18da0', '081248142424', 'Lampu Merah 2', '081248142424', 'Alue Buket', '2021-12-05 02:14:00', NULL),
('IN92845103', '2c02621f-dc8f-4b06-a7b4-71689f0592ee', '081216221775', 'Putus Kabel', 'Putus Kabel Tertimpa Pohon, Mohon Segera Diperbaiki', 'Abeuk Leupon (Leupen)', '2021-12-05 02:27:04', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL,
  `nm_paket` varchar(50) DEFAULT NULL,
  `spesifikasi` text,
  `harga` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `nm_paket`, `spesifikasi`, `harga`) VALUES
(1, 'Paket 10MBps', 'Bisa digunakan untuk 2-3 orang', '300000'),
(2, 'Paket 20MBps', 'Bisa digunakan untuk 3-5 orang', '350000'),
(3, 'Paket 30MBps', 'Bisa digunakan untuk 5-7 orang', '500000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(50) NOT NULL DEFAULT '0',
  `id_users` varchar(30) NOT NULL DEFAULT '0',
  `nomor_internet` varchar(50) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabel Ini berisi data Pelanggan dari indihome , beserta nomor internet dan lokasinya agar mudah dilakukan tracking dan pemetaan nantinya';

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `id_users`, `nomor_internet`, `id_paket`, `nama_pelanggan`, `alamat`, `no_hp`, `status`) VALUES
('13f47d17-d523-4b40-8b00-3ea2d1141d16', '1eb1b6c6-0d58-4bec-9a41-665af5', '111144102007', 2, 'Mukhlis Hadiningrat', 'Alue Eumpok', '081236736800', 'Active'),
('2c02621f-dc8f-4b06-a7b4-71689f0592ee', 'ebf3c019-b679-4a20-9079-a2364c', '111144102001', 1, 'Umah', 'Abeuk Leupon (Leupen)', '081216221775', 'Active'),
('361b55ad-cbdd-47b6-a3bd-3bd550c2c1c4', '112ee909-8dad-4e3a-9150-cb7a63', '111144102018', 1, 'M. Yusuf', 'Abeuk Leupon (Leupen)', '081267719305', 'Active'),
('3945ac05-7519-4843-b9e8-25adff603265', 'e3dbdf9f-ef4e-467f-a103-874e54', '111144102013', 1, 'Nurdiansyah', 'Alue Buket', '081250404690', 'Active'),
('4109367d-b120-4f29-a3e4-580eebd2441e', '2ae10b73-4f31-425e-88f2-1a7ee9', '111144102002', 1, 'Muhammad', 'Alue Abee', '081219496485', 'InActive'),
('507a262e-e0d2-48cb-b021-fa3bfcbe08e0', '40788bdf-078b-4cdd-bc28-6b875c', '111144102011', 3, 'Cut Nur Hasbi', 'Alue Buket', '081245760990', 'Active'),
('5f650e0f-a455-4ab4-84b4-750746ebfb07', 'd477628a-3c20-43b4-893f-24edb5', '111144102014', 1, 'Darmanita', 'Alue Buket', '081251100243', 'Active'),
('63f16e8e-3e7d-4661-9030-533c1e849074', 'c955172c-7d9b-4f6a-af94-6ea5fb', '111144102004', 1, 'Mawardi', 'Alue Buket', '081222483287', 'Active'),
('80226430-ffa4-49c3-9cda-16a275ae8058', 'af4ec6a3-5028-4169-84c8-e9cb6c', '111144102005', 1, 'Faisal', 'Alue Buket', '081222691989', 'Active'),
('828aab8f-3ed2-482d-b352-8fd042fb2441', '365c54bb-591f-4509-93b6-aea397', '111144102008', 3, 'Herman', 'Alue Abee', '081242947201', 'Active'),
('8c604ef8-5221-4bff-aec6-6e4492a0fa78', 'e9193cbe-32cd-4e3b-9491-e53f84', '111144102010', 1, 'Saifullah', 'Alue Buket', '081244186501', 'Active'),
('9281244f-ec28-43d4-8159-b932d47ea90b', 'a162a9bc-15e0-44dc-a412-b98448', '111144102020', 1, 'M. Jamil', 'Alue Buket', '081284753647', 'Active'),
('abec7e4c-27f1-42e7-a158-b0611cd0f219', '4b0ab20d-f168-437d-a245-cf046b', '111144102016', 1, 'Abdullah M. Yusuf', 'Abeuk Leupon (Leupen)', '081260217971', 'InActive'),
('b7370bed-3186-434a-864e-94d15ce18da0', '0dbc4231-c814-4c64-bd15-38abe3', '111144102012', 1, 'Arjuna', 'Alue Buket', '081248142424', 'Active'),
('bb1122fe-72a0-4099-82f2-7eb65daf1bef', '2cf090a6-3651-4c66-861d-fe8750', '111144102000', 1, 'Syarifuddin	', 'Abeuk Leupon (Leupen)', '081216318350', 'Active'),
('cbe13906-9a36-48ce-ab53-de358e29dea0', 'c877fcb6-df13-4d60-8103-38e853', '111144102019', 1, 'Armanda', 'Abeuk Leupon (Leupen)', '081268844251', 'Active'),
('d20df232-d29e-4b81-a686-6c13774bad2c', '18df9480-f443-4513-bf2b-efa790', '111144102015', 1, 'Suriadi', 'Alue Buket', '081254984974', 'Active'),
('d429b98b-7dc8-4990-a8e1-f1f9390e7548', 'e661c31a-1d13-49a2-bf1b-817d71', '111144102009', 1, 'Ismail Sulaiman', 'Alue Abee', '081243240735', 'Active'),
('db4c471d-cc65-49c2-bbe3-06e5e028e1e4', '988d5833-eded-4776-b3f1-1576ea', '111144102006', 1, 'Munawir', 'Alue Eumpok', '081232218510', 'Active'),
('e687657c-fbba-4c9e-a5d5-0b2c8ad73778', '9f390c6d-f9c8-4648-95db-d0551b', '111144102003', 1, 'M. Jamil', 'Alue Abee', '081219550857', 'Active'),
('ee0528be-849e-4de6-ae73-4cbbb9432a88', 'b94140a2-1889-4a7f-8d04-91f275', '111144102017', 1, 'Zulfadli', 'Abeuk Leupon (Leupen)', '081266816078', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perbaikan`
--

CREATE TABLE `tb_perbaikan` (
  `id_perbaikan` varchar(50) NOT NULL,
  `id_tickets` varchar(50) NOT NULL,
  `tgl_proses` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `status_keluhan` enum('Pending','On Proccess','Done') DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `id_teknisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_perbaikan`
--

INSERT INTO `tb_perbaikan` (`id_perbaikan`, `id_tickets`, `tgl_proses`, `tgl_selesai`, `status_keluhan`, `keterangan`, `id_teknisi`) VALUES
('00a876c8-5d28-4469-a50c-5166f6fefe6a', 'IN70952483', '2021-12-05 02:15:35', '2021-12-05 02:15:42', 'Done', NULL, '894ddb5d-739e-4485-a143-6bfe5c'),
('3b0e14d3-fca8-4934-a10b-bc16e4f84ef7', 'IN53089726', '2021-12-05 02:05:42', '2021-12-05 02:15:24', 'Done', NULL, '894ddb5d-739e-4485-a143-6bfe5c'),
('5751273d-fb47-4d0a-ba05-54a4403285e7', 'IN19630584', '2021-12-03 07:11:25', '2021-12-03 07:23:11', 'Done', NULL, '894ddb5d-739e-4485-a143-6bfe5c'),
('74cf38f5-7a1d-4b90-a6a1-2c7fc56096ca', 'IN92845103', '2021-12-05 02:28:02', '2021-12-05 03:33:51', 'Done', NULL, '8832591e-4b87-44e2-b2c3-d135fb'),
('961f9587-747d-47b4-9956-a0bdfc862233', 'IN46079315', NULL, NULL, 'Pending', NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_teknisi`
--

CREATE TABLE `tb_teknisi` (
  `id_teknisi` varchar(50) NOT NULL,
  `id_users` varchar(50) NOT NULL,
  `nm_teknisi` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_teknisi`
--

INSERT INTO `tb_teknisi` (`id_teknisi`, `id_users`, `nm_teknisi`, `email`, `no_hp`, `alamat`) VALUES
('7eddc076-6033-4440-8562-8acc343b2dcb', '8832591e-4b87-44e2-b2c3-d135fb19ffba', 'Rifki', 'rifki@gmail.com', '085273810221', 'Desa Kumbang Punteut'),
('b14c9707-8012-4109-b745-6fb527dcd79d', '946fa880-21fe-49e8-b1ba-08b95b', 'Bang Sayid', 'sayid123@gmail.com', '087836189301', 'Lhoksukon'),
('c61c48ab-e76d-47c5-8425-acecfc5249c5', '1fd58244-f7a0-46f3-9941-2a3b71', 'Pak Iqbal', 'iqbal@telkom.ac.id', '087635173913', 'Alue Buket'),
('d558bfc0-18cf-4fc0-8fa3-0e3d1abfa629', '894ddb5d-739e-4485-a143-6bfe5c', 'Anjasmara', 'anjasmara@gmail.com', '081254628103', 'Desa Alue Puteh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_users` varchar(30) NOT NULL DEFAULT '0',
  `email_users` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `level` enum('1','2','3') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `email_users`, `username`, `password`, `level`) VALUES
('0', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
('0dbc4231-c814-4c64-bd15-38abe3', NULL, '111144102012', '88de133e307a1e1e58c327b51369ebce', '3'),
('112ee909-8dad-4e3a-9150-cb7a63', NULL, '111144102018', '05e1195db0ee6cf50fdaec16e000ebaf', '3'),
('18df9480-f443-4513-bf2b-efa790', NULL, '111144102015', '81e9c57d795970ab2e8eba3a33696456', '3'),
('1eb1b6c6-0d58-4bec-9a41-665af5', NULL, '111144102007', '660d95c425b50d2b49eefc5f151a3f6e', '3'),
('1fd58244-f7a0-46f3-9941-2a3b71', NULL, 'iqbal123', '202cb962ac59075b964b07152d234b70', '2'),
('2ae10b73-4f31-425e-88f2-1a7ee9', NULL, '111144102002', '6db50fbf41fd74883bc1746a1704f183', '3'),
('2cf090a6-3651-4c66-861d-fe8750', NULL, '111144102000', '6ec91e2acef602619fe70be1a6933061', '3'),
('365c54bb-591f-4509-93b6-aea397', NULL, '111144102008', 'd80edf1d74355e24bbe6340069bd7e28', '3'),
('40788bdf-078b-4cdd-bc28-6b875c', NULL, '111144102011', '9cf054fddd00236f1d8dfaeee8dfdc5a', '3'),
('4b0ab20d-f168-437d-a245-cf046b', NULL, '111144102016', 'ef20891bc8924f7eb29f37a2c4823924', '3'),
('8832591e-4b87-44e2-b2c3-d135fb', NULL, 'rifki123', '7eb6fb982bdf46685e3083fcd42d8cf0', '2'),
('894ddb5d-739e-4485-a143-6bfe5c', NULL, 'anjasmara_tlk', 'e10adc3949ba59abbe56e057f20f883e', '2'),
('946fa880-21fe-49e8-b1ba-08b95b', NULL, 'sayid123', '283b2eb98dbf8619fbb7f286d9224013', '2'),
('988d5833-eded-4776-b3f1-1576ea', NULL, '111144102006', 'd393c78b42b4d17852f5d50fb3fd1c31', '3'),
('9f390c6d-f9c8-4648-95db-d0551b', NULL, '111144102003', 'b6b4dd61dadf9b3e26444092f3b83151', '3'),
('a162a9bc-15e0-44dc-a412-b98448', NULL, '111144102020', 'c21a9f144182454d6ad0e5eb38e85412', '3'),
('af4ec6a3-5028-4169-84c8-e9cb6c', NULL, '111144102005', '1d992792e2a1641726e0bf0bb41c4300', '3'),
('b94140a2-1889-4a7f-8d04-91f275', NULL, '111144102017', 'c5a01249a3d06abd2a4dde1d6eb34ff2', '3'),
('c877fcb6-df13-4d60-8103-38e853', NULL, '111144102019', 'ed8a7e444a8026f85ad50d1d51225c38', '3'),
('c955172c-7d9b-4f6a-af94-6ea5fb', NULL, '111144102004', 'aa285095db6a0035315e49f46e5cb30b', '3'),
('d477628a-3c20-43b4-893f-24edb5', NULL, '111144102014', '630242a117b13475679f04cb62f6106b', '3'),
('e3dbdf9f-ef4e-467f-a103-874e54', NULL, '111144102013', '64214797faf2d115805fdd65e883d133', '3'),
('e661c31a-1d13-49a2-bf1b-817d71', NULL, '111144102009', 'dd8f1a558212f56c082987cfbb80fc69', '3'),
('e9193cbe-32cd-4e3b-9491-e53f84', NULL, '111144102010', 'c880070ec5a66666d0d9f37153edcae9', '3'),
('ebf3c019-b679-4a20-9079-a2364c', NULL, '111144102001', '3fccad892d0c94d6be0fe38015a7ced0', '3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  ADD PRIMARY KEY (`id_tickets`),
  ADD KEY `FK_tb_keluhan_tb_pelanggan` (`id_pelanggan`),
  ADD KEY `id_teknisi` (`id_teknisi`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `nomor_internet` (`nomor_internet`),
  ADD KEY `FK_tb_pelanggan_tabel paket` (`id_paket`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `tb_perbaikan`
--
ALTER TABLE `tb_perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`),
  ADD KEY `id_tickets` (`id_tickets`);

--
-- Indeks untuk tabel `tb_teknisi`
--
ALTER TABLE `tb_teknisi`
  ADD PRIMARY KEY (`id_teknisi`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `email_users` (`email_users`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  ADD CONSTRAINT `FK_tb_keluhan_tb_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_keluhan_ibfk_1` FOREIGN KEY (`id_teknisi`) REFERENCES `tb_teknisi` (`id_teknisi`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD CONSTRAINT `FK_tb_pelanggan_tabel paket` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pelanggan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `tb_users` (`id_users`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_perbaikan`
--
ALTER TABLE `tb_perbaikan`
  ADD CONSTRAINT `tb_perbaikan_ibfk_1` FOREIGN KEY (`id_tickets`) REFERENCES `tb_keluhan` (`id_tickets`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
