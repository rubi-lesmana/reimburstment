-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Agu 2023 pada 11.44
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reimburstment`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` char(7) NOT NULL,
  `nama_bank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`) VALUES
('BANK001', 'BRI'),
('BANK002', 'BCA'),
('BANK003', 'BNI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(7) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `satuan_id`, `jenis_id`) VALUES
('B000001', 'Lenovo Ideapad 1550', 15, 1, 3),
('B000002', 'Samsung Galaxy J1 Ace', 70, 1, 4),
('B000003', 'Aqua 1,5 Liter', 703, 3, 2),
('B000004', 'Mouse Wireless Logitech M220', 20, 1, 7),
('B000005', 'RAM 8 GB', 10, 1, 7),
('B000006', 'Tablet', 0, 1, 4),
('B000007', 'Kopi Kapal Api', 0, 2, 2),
('B000008', 'gula', 0, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` char(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Trigger `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `update_stok_keluar` BEFORE INSERT ON `barang_keluar` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` - NEW.jumlah_keluar WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` char(16) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Trigger `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `update_stok_masuk` BEFORE INSERT ON `barang_masuk` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` + NEW.jumlah_masuk WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cust`
--

CREATE TABLE `cust` (
  `id_customer` char(7) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `unit_id` char(7) NOT NULL,
  `warna_id` int(11) NOT NULL,
  `no_rangka` int(11) NOT NULL,
  `no_mesin` int(11) NOT NULL,
  `downpayment` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` char(7) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `unit_id` char(7) NOT NULL,
  `warna_id` int(11) NOT NULL,
  `no_rangka` int(11) NOT NULL,
  `no_mesin` int(11) NOT NULL,
  `downpayment` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat`, `no_telp`, `unit_id`, `warna_id`, `no_rangka`, `no_mesin`, `downpayment`, `status`) VALUES
('CUST001', 'Wiwi', 'Kranji', '08292', 'U000001', 2, 12345, 23457, 5000000, 0),
('CUST002', 'Robiatul', 'Bekasi', '12345', 'U000001', 1, 12345, 23456, 3000000, 0),
('CUST003', 'Leni Rosalina', 'Jl. Dewi Sartika Jakarta Timur', '12345', 'U000001', 1, 12345, 23456, 50000000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `departement`
--

CREATE TABLE `departement` (
  `id_departement` char(7) NOT NULL,
  `nama_departement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `departement`
--

INSERT INTO `departement` (`id_departement`, `nama_departement`) VALUES
('DEPT001', 'Maintenance'),
('DEPT002', 'Production'),
('DEPT003', 'QA/QC'),
('DEPT004', 'PPC'),
('DEPT005', 'Purchasing'),
('DEPT006', 'Marketing'),
('DEPT007', 'Finance/Accounting');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'IT'),
(2, 'Warehouse'),
(3, 'Accounting'),
(4, 'Produksi'),
(5, 'PPIC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` char(7) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
('J000001', 'Staf'),
('J000002', 'Supervisor'),
('J000003', 'Manajer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Snack'),
(2, 'Minuman'),
(3, 'Laptop'),
(4, 'Handphone'),
(5, 'Sepeda Motor'),
(6, 'Mobil'),
(7, 'Perangkat Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_klaim`
--

CREATE TABLE `jenis_klaim` (
  `id_jenis_klaim` char(7) NOT NULL,
  `nama_jenis_klaim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jenis_klaim`
--

INSERT INTO `jenis_klaim` (`id_jenis_klaim`, `nama_jenis_klaim`) VALUES
('JKL001', 'Menikah'),
('JKL002', 'Melahirkan'),
('JKL003', 'Meninggal'),
('JKL004', 'Kaca Mata');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klaim`
--

CREATE TABLE `klaim` (
  `id_klaim` char(7) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `departement_id` char(7) NOT NULL,
  `jabatan_id` char(7) NOT NULL,
  `jenis_klaim_id` char(7) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `klaim`
--

INSERT INTO `klaim` (`id_klaim`, `tanggal`, `nama`, `departement_id`, `jabatan_id`, `jenis_klaim_id`, `amount`, `status`) VALUES
('KLM001', '2023-08-30', 'Rubi', 'DEPT003', 'J000002', 'JKL001', 3000000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `leasing`
--

CREATE TABLE `leasing` (
  `id_leasing` char(7) NOT NULL,
  `nama_leasing` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `leasing`
--

INSERT INTO `leasing` (`id_leasing`, `nama_leasing`, `alamat`) VALUES
('L000001', 'PT. Suzuki Finance', 'Kalimalang'),
('L000002', 'Bca Finance', 'Wisma Indomobil'),
('L000003', 'PT. BRI Multifinance', 'Ruko Sentra Niaga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `leasing_number`
--

CREATE TABLE `leasing_number` (
  `id_ln` char(7) NOT NULL,
  `leasing_id` char(7) NOT NULL,
  `unit_id` char(7) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `leasing_number`
--

INSERT INTO `leasing_number` (`id_ln`, `leasing_id`, `unit_id`, `harga`) VALUES
('LN00001', 'L000001', 'U000001', 45000000),
('LN00002', 'L000002', 'U000001', 290000000),
('LN00003', 'L000001', 'U000002', 160000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id_po` char(7) NOT NULL,
  `ro_id` char(7) NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `quantity` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `requistion_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `purchase_order`
--

INSERT INTO `purchase_order` (`id_po`, `ro_id`, `divisi_id`, `barang_id`, `quantity`, `keterangan`, `requistion_id`, `supplier_id`, `harga`, `total`, `tanggal`, `status`) VALUES
('PO00004', 'RO00004', 1, 'B000003', 1, 'Bismillah', 12, 5, 15000, 15000, '2022-01-21', 1),
('PO00005', 'RO00003', 2, 'B000001', 2, 'Bismillah', 1, 2, 3000000, 6000000, '0000-00-00', 1),
('PO00006', 'RO00007', 7, 'B000005', 3, 'Bismillah', 9, 7, 500000, 1500000, '0000-00-00', 1),
('PO00007', 'RO00001', 1, 'B000003', 1, '', 12, 5, 15000, 15000, '2022-02-23', NULL),
('PO00008', 'RO00002', 2, 'B000002', 3, '', 7, 7, 1000000, 3000000, '2022-02-23', NULL),
('PO00009', 'RO00006', 2, 'B000003', 5, '', 12, 5, 15000, 75000, '2022-02-23', NULL),
('PO00010', 'RO00011', 1, 'B000001', 1, '', 6, 7, 3000000, 3000000, '2022-02-23', NULL);

--
-- Trigger `purchase_order`
--
DELIMITER $$
CREATE TRIGGER `Update_RO` AFTER INSERT ON `purchase_order` FOR EACH ROW BEGIN
 UPDATE request_order SET status=1 WHERE id_ro=new.ro_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_RO_Before_Delete` BEFORE DELETE ON `purchase_order` FOR EACH ROW BEGIN
 UPDATE request_order SET status=0 WHERE id_ro=old.ro_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reimburstment`
--

CREATE TABLE `reimburstment` (
  `id_reimburstment` char(7) NOT NULL,
  `tanggal` date NOT NULL,
  `acc_no` char(7) NOT NULL,
  `description` varchar(225) NOT NULL,
  `klaim_id` char(7) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank_id` char(7) NOT NULL,
  `no_rek` varchar(25) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` smallint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `reimburstment`
--

INSERT INTO `reimburstment` (`id_reimburstment`, `tanggal`, `acc_no`, `description`, `klaim_id`, `nama`, `bank_id`, `no_rek`, `amount`, `status`) VALUES
('RMBS001', '2023-08-30', 'ACC001', 'Bismillah', 'KLM001', 'Rubi', 'BANK001', '12345', 3000000, NULL);

--
-- Trigger `reimburstment`
--
DELIMITER $$
CREATE TRIGGER `update_req_before_delete` BEFORE DELETE ON `reimburstment` FOR EACH ROW BEGIN
	UPDATE request_reimburse SET status = 0 WHERE no_acc = old.acc_no;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_request` AFTER INSERT ON `reimburstment` FOR EACH ROW BEGIN
	UPDATE request_reimburse SET status = 1 WHERE no_acc = new.acc_no;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_order`
--

CREATE TABLE `request_order` (
  `id_ro` char(7) NOT NULL,
  `divisi_id` int(255) NOT NULL,
  `barang_id` char(16) NOT NULL,
  `quantity` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `request_order`
--

INSERT INTO `request_order` (`id_ro`, `divisi_id`, `barang_id`, `quantity`, `keterangan`, `tanggal`, `status`) VALUES
('RO00001', 1, 'B000003', 1, 'Bismillah', '2022-01-06', 1),
('RO00002', 2, 'B000002', 3, 'Bismillah', '2022-01-03', 1),
('RO00003', 1, 'B000001', 2, 'Bismillah', '2022-01-04', 1),
('RO00004', 2, 'B000003', 1, 'Bismillah', '2022-01-04', 1),
('RO00005', 2, 'B000002', 3, 'Bismillah', '2022-01-05', 0),
('RO00006', 2, 'B000003', 5, 'Bismillah', '2022-01-06', 1),
('RO00007', 1, 'B000005', 3, 'Bismillah', '2022-01-06', 1),
('RO00008', 2, 'B000001', 2, 'Bismillah', '2022-01-06', 0),
('RO00009', 3, 'B000004', 1, 'ppp', '2022-02-02', 0),
('RO00010', 5, 'B000008', 1, 'bismillah', '2022-02-23', 0),
('RO00011', 1, 'B000001', 1, 'bismillah', '2022-02-23', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_reimburse`
--

CREATE TABLE `request_reimburse` (
  `no_acc` char(7) NOT NULL,
  `tanggal` date NOT NULL,
  `description` varchar(225) NOT NULL,
  `klaim_id` char(7) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` smallint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `request_reimburse`
--

INSERT INTO `request_reimburse` (`no_acc`, `tanggal`, `description`, `klaim_id`, `nama`, `amount`, `status`) VALUES
('ACC001', '2023-08-30', 'Bismillah', 'KLM001', 'Rubi', 3000000, 1);

--
-- Trigger `request_reimburse`
--
DELIMITER $$
CREATE TRIGGER `update_klaim` AFTER INSERT ON `request_reimburse` FOR EACH ROW BEGIN
	UPDATE klaim SET status = 1 WHERE id_klaim = new.klaim_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_klaim_before_delete` BEFORE DELETE ON `request_reimburse` FOR EACH ROW BEGIN
 UPDATE klaim SET status=0 WHERE id_klaim=old.klaim_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Unit'),
(2, 'Pack'),
(3, 'Botol'),
(5, 'Pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `no_surat` char(7) NOT NULL,
  `customer_id` char(7) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `unit_id` char(7) NOT NULL,
  `downpayment` int(11) NOT NULL,
  `ln_id` char(7) NOT NULL,
  `leasing_id` char(7) NOT NULL,
  `harga` int(11) NOT NULL,
  `pelunasan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`no_surat`, `customer_id`, `nama_customer`, `unit_id`, `downpayment`, `ln_id`, `leasing_id`, `harga`, `pelunasan`, `tanggal`, `status`) VALUES
('SPP001', 'CUST001', 'Wiwi', 'U000001', 5000000, 'LN00001', 'L000001', 45000000, 40000000, '0000-00-00', 1),
('SPP002', 'CUST003', 'Leni Rosalina', 'U000001', 50000000, 'LN00002', 'L000002', 290000000, 240000000, '2022-10-29', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_telp`, `alamat`) VALUES
(1, 'PT. ATK', '085688772971', 'Kec. Cigudeg, Bogor - Jawa Barat'),
(2, 'PT. Digital', '081341879246', 'Kec. Ciampea, Bogor - Jawa Barat'),
(3, 'PT. Snack', '087728164328', 'Kec. Ciomas, Bogor - Jawa Barat'),
(5, 'PT. Maju Jaya', '021938848', 'Rawalumbu, Bekasi'),
(7, 'PT. Ruby Sukses', '021929923', 'Kuningan, Jawa barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_requistion`
--

CREATE TABLE `tb_requistion` (
  `id_requistion` int(16) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_requistion`
--

INSERT INTO `tb_requistion` (`id_requistion`, `supplier_id`, `barang_id`, `harga`) VALUES
(1, 2, 'B000001', 3000000),
(2, 2, 'B000005', 1000000),
(3, 2, 'B000006', 500000),
(4, 2, 'B000002', 1500000),
(5, 2, 'B000004', 2500000),
(6, 7, 'B000001', 3000000),
(7, 7, 'B000002', 1000000),
(8, 7, 'B000004', 50000),
(9, 7, 'B000005', 500000),
(10, 7, 'B000006', 3000000),
(11, 3, 'B000003', 20000),
(12, 5, 'B000003', 15000),
(13, 3, 'B000007', 10000),
(14, 5, 'B000007', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id_unit` char(7) NOT NULL,
  `nama_unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `nama_unit`) VALUES
('U000001', 'Baleno MT'),
('U000002', 'New carry PU'),
('U000003', 'Ignis GX'),
('U000004', 'XL7'),
('U000005', 'All New Ertiga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` enum('admin','karyawan','finance','hr') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `no_telp`, `role`, `password`, `created_at`, `foto`, `is_active`) VALUES
(19, 'Admin', 'Admin', 'admin@gmail.com', '08928283', 'admin', '$2y$10$0ZYP7rXOHVF1dgxOeBC7K.v1VVfhQ5GwUAfvGMnbN9vTtrh2qP8ou', 1642050302, 'user.png', 1),
(28, 'Finance', 'Finance', 'finance@gmail.com', '23456', 'finance', '$2y$10$jzIFCNideSJs1TRL9F1NSOGHB2YeMUhiR5SuKpVZ92be9.ySEz.8S', 1666434436, 'user.png', 1),
(31, 'Karyawan', 'Karyawan', 'karyawan@gmail.com', '01919192828', 'karyawan', '$2y$10$NiEM5UR/8Oy71TVifmCN9OfxNKpYqK59Sj0Mz0qlggaEmQ5gEyZDe', 1689559152, 'user.png', 1),
(33, 'HRGA', 'HRGA', 'hrga@gmail.com', '0193938', 'hr', '$2y$10$.nJq/rw/U23RU4H4KFLY1.FAiLA0X2Nv7mV/8CtLN89fwJtcFrgva', 1690364497, 'user.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `satuan_id` (`satuan_id`),
  ADD KEY `kategori_id` (`jenis_id`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `cust`
--
ALTER TABLE `cust`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `warna_id` (`warna_id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `warna_id` (`warna_id`);

--
-- Indeks untuk tabel `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `jenis_klaim`
--
ALTER TABLE `jenis_klaim`
  ADD PRIMARY KEY (`id_jenis_klaim`);

--
-- Indeks untuk tabel `klaim`
--
ALTER TABLE `klaim`
  ADD PRIMARY KEY (`id_klaim`),
  ADD KEY `ro_id` (`departement_id`),
  ADD KEY `unit_id` (`jabatan_id`),
  ADD KEY `jenis_klaim_id` (`jenis_klaim_id`);

--
-- Indeks untuk tabel `leasing`
--
ALTER TABLE `leasing`
  ADD PRIMARY KEY (`id_leasing`);

--
-- Indeks untuk tabel `leasing_number`
--
ALTER TABLE `leasing_number`
  ADD PRIMARY KEY (`id_ln`),
  ADD KEY `ro_id` (`leasing_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indeks untuk tabel `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id_po`),
  ADD KEY `barang_id` (`requistion_id`),
  ADD KEY `ro_id` (`ro_id`);

--
-- Indeks untuk tabel `reimburstment`
--
ALTER TABLE `reimburstment`
  ADD PRIMARY KEY (`id_reimburstment`),
  ADD KEY `ro_id` (`klaim_id`),
  ADD KEY `acc_no` (`acc_no`),
  ADD KEY `bank_id` (`bank_id`),
  ADD KEY `klaim_id` (`klaim_id`);

--
-- Indeks untuk tabel `request_order`
--
ALTER TABLE `request_order`
  ADD PRIMARY KEY (`id_ro`),
  ADD KEY `kategori_id` (`quantity`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `request_reimburse`
--
ALTER TABLE `request_reimburse`
  ADD PRIMARY KEY (`no_acc`),
  ADD KEY `ro_id` (`klaim_id`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`no_surat`),
  ADD KEY `barang_id` (`ln_id`),
  ADD KEY `ro_id` (`customer_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tb_requistion`
--
ALTER TABLE `tb_requistion`
  ADD PRIMARY KEY (`id_requistion`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_requistion`
--
ALTER TABLE `tb_requistion`
  MODIFY `id_requistion` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_3` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `klaim`
--
ALTER TABLE `klaim`
  ADD CONSTRAINT `klaim_ibfk_1` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id_departement`),
  ADD CONSTRAINT `klaim_ibfk_2` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id_jabatan`),
  ADD CONSTRAINT `klaim_ibfk_3` FOREIGN KEY (`jenis_klaim_id`) REFERENCES `jenis_klaim` (`id_jenis_klaim`);

--
-- Ketidakleluasaan untuk tabel `leasing_number`
--
ALTER TABLE `leasing_number`
  ADD CONSTRAINT `leasing_number_ibfk_1` FOREIGN KEY (`leasing_id`) REFERENCES `leasing` (`id_leasing`),
  ADD CONSTRAINT `leasing_number_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `purchase_order_ibfk_1` FOREIGN KEY (`ro_id`) REFERENCES `request_order` (`id_ro`),
  ADD CONSTRAINT `purchase_order_ibfk_2` FOREIGN KEY (`requistion_id`) REFERENCES `tb_requistion` (`id_requistion`);

--
-- Ketidakleluasaan untuk tabel `reimburstment`
--
ALTER TABLE `reimburstment`
  ADD CONSTRAINT `reimburstment_ibfk_2` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id_bank`),
  ADD CONSTRAINT `reimburstment_ibfk_3` FOREIGN KEY (`acc_no`) REFERENCES `request_reimburse` (`no_acc`);

--
-- Ketidakleluasaan untuk tabel `request_order`
--
ALTER TABLE `request_order`
  ADD CONSTRAINT `request_order_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `request_reimburse`
--
ALTER TABLE `request_reimburse`
  ADD CONSTRAINT `request_reimburse_ibfk_1` FOREIGN KEY (`klaim_id`) REFERENCES `klaim` (`id_klaim`);

--
-- Ketidakleluasaan untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `spp_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `spp_ibfk_2` FOREIGN KEY (`ln_id`) REFERENCES `leasing_number` (`id_ln`);

--
-- Ketidakleluasaan untuk tabel `tb_requistion`
--
ALTER TABLE `tb_requistion`
  ADD CONSTRAINT `tb_requistion_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `tb_requistion_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
