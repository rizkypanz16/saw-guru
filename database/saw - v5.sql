-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Jun 2022 pada 08.06
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `saw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE IF NOT EXISTS `tb_guru` (
`id_guru` int(11) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nik`, `nama_guru`, `jabatan`, `kelas`) VALUES
(8, '001', 'Tien Agustiani, S.Pd, M.Pd', 6, 19),
(9, '002', 'Nani Rohaeni, S.Pd', 2, 15),
(10, '003', 'Irwan Mustofa', 5, 21),
(11, '004', 'Santi Yuniarti', 5, 13),
(12, '005', 'Kurniawati', 5, 22),
(13, '006', 'Tira Febrian', 5, 14),
(14, '007', 'Yana N', 5, 20),
(15, '008', 'Andika', 5, 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE IF NOT EXISTS `tb_jabatan` (
`id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(2, 'Guru Kelas'),
(5, 'Guru Honorer'),
(6, 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
`id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`) VALUES
(13, '4'),
(14, '5'),
(15, '1 DAN 6'),
(17, '3'),
(18, '6'),
(19, 'KEPALA SEKOLAH'),
(20, 'PJOK'),
(21, 'AGAMA'),
(22, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_matrik`
--

CREATE TABLE IF NOT EXISTS `tb_matrik` (
`id_matrik` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `guru` int(11) NOT NULL,
  `kriteria1` int(11) NOT NULL,
  `kriteria2` int(11) NOT NULL,
  `kriteria3` int(11) NOT NULL,
  `kriteria4` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `tb_matrik`
--

INSERT INTO `tb_matrik` (`id_matrik`, `periode`, `guru`, `kriteria1`, `kriteria2`, `kriteria3`, `kriteria4`) VALUES
(5, 4, 6, 70, 70, 70, 70),
(7, 4, 7, 80, 70, 70, 70),
(8, 4, 19, 80, 80, 80, 80),
(9, 4, 8, 90, 85, 92, 90),
(10, 4, 9, 80, 82, 78, 85),
(11, 4, 10, 78, 85, 83, 80),
(12, 4, 11, 86, 84, 84, 85),
(13, 4, 12, 85, 85, 80, 80),
(14, 4, 13, 80, 80, 86, 82),
(15, 4, 15, 78, 87, 86, 89),
(16, 4, 14, 78, 85, 80, 85);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_periode`
--

CREATE TABLE IF NOT EXISTS `tb_periode` (
`id_periode` int(11) NOT NULL,
  `nama_periode` varchar(50) NOT NULL,
  `tgl_periode` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tb_periode`
--

INSERT INTO `tb_periode` (`id_periode`, `nama_periode`, `tgl_periode`) VALUES
(4, 'PENILAIAN GURU SEMESTER 1', '2022-04-25 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE IF NOT EXISTS `tb_role` (
`id_role` int(11) NOT NULL,
  `nama_role` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `nama_role`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
`id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `password`, `role`) VALUES
(10, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
 ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
 ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
 ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_matrik`
--
ALTER TABLE `tb_matrik`
 ADD PRIMARY KEY (`id_matrik`);

--
-- Indexes for table `tb_periode`
--
ALTER TABLE `tb_periode`
 ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
 ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tb_matrik`
--
ALTER TABLE `tb_matrik`
MODIFY `id_matrik` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_periode`
--
ALTER TABLE `tb_periode`
MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
