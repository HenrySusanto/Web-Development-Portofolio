-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2020 pada 05.31
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `adminID` char(4) NOT NULL,
  `adminNAMA` varchar(30) NOT NULL,
  `adminEMAIL` varchar(60) NOT NULL,
  `adminPASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`adminID`, `adminNAMA`, `adminEMAIL`, `adminPASSWORD`) VALUES
('A001', 'Henry Susanto', 'UAS@YAHOO.COM', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `area`
--

CREATE TABLE `area` (
  `areaID` char(4) NOT NULL,
  `areanama` char(35) NOT NULL,
  `areawilayah` char(35) NOT NULL,
  `areaketerangan` varchar(255) NOT NULL,
  `povinsiID` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `area`
--

INSERT INTO `area` (`areaID`, `areanama`, `areawilayah`, `areaketerangan`, `povinsiID`) VALUES
('AR01', 'Bandungan', 'Kabupaten Semarang', 'Merupakan wilayah yang memeiliki banyak daerah tujuan', '10'),
('AR02', 'Kawasan Candi', 'Sleman', 'Merupakan daerah dengan peninggalan sejarah kerajaan', '10'),
('AR03', 'Bandungan Hilir', 'Gunung Kidul', 'Pantai yang sangat luas dan panjang dengan jumlah', '12'),
('AR04', 'Pantai Selatan Jawa', 'Gunung Kidul', 'Pantai yang sangat luas dan panjang dengan jumlah', '11'),
('AR05', 'Patuk', 'Gunung Kidul', 'Daerah perbukitan yang berada di luar kota kabupaten', '11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiID` char(5) NOT NULL,
  `destinasinama` varchar(35) NOT NULL,
  `destinasialamat` varchar(255) NOT NULL,
  `kategoriID` char(4) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `destinasi`
--

INSERT INTO `destinasi` (`destinasiID`, `destinasinama`, `destinasialamat`, `kategoriID`, `areaID`) VALUES
('WS01', 'Pantai Kukup', 'Jl. Pantai Selatan Jawa', 'KW03', 'AR04'),
('WS02', 'Pantai Indrayanti', 'Jl. Pantai Selatan Jawa', 'KW03', 'AR04'),
('WS05', 'Candi Prambanan', ' Jl Raya yogya-solo', 'KW02', 'AR03'),
('WS06', 'Candi Plaosan', 'Jl Desa Plaosan', 'KW02', 'AR02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotoID` char(5) NOT NULL,
  `fotonama` char(60) NOT NULL,
  `destinasiID` char(4) NOT NULL,
  `fotofile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotoID`, `fotonama`, `destinasiID`, `fotofile`) VALUES
('F001', 'Foto Wisata 1', 'WS01', 'gambar pemandangan 2.jpg'),
('F002', 'Foto Wisata 2', 'WS01', 'gambar pemandangan1.jpg'),
('F003', 'Foto Wisata 33', 'WS02', 'gambar pemandangan 2.jpg'),
('F004', 'Candi Prambanan', 'WS05', 'prambanan.jpg'),
('F005', 'Candi Plaosan', 'WS01', 'plaosan.jpg'),
('F006', 'Candi Borobudur', 'WS01', 'borobudur.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` char(4) NOT NULL,
  `hotelnama` char(30) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`hotelID`, `hotelnama`, `areaID`) VALUES
('HO01', 'Lorin Solo Hotel', 'AR01'),
('HO02', 'HARRIS Hotel & Conventions Sol', 'AR02'),
('HO03', 'Alila Solo', 'AR05'),
('RN01', 'Stupa Restaurant by plataran', 'AR05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategoriID` char(4) NOT NULL,
  `kategorinama` char(30) NOT NULL,
  `kategoriketerangan` varchar(255) NOT NULL,
  `kategorireferensi` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `kategorinama`, `kategoriketerangan`, `kategorireferensi`) VALUES
('KW01', 'Gunung', 'Wisata rohani', 'Buku'),
('KW02', 'Gunung', 'Merupakan destinasi ', 'Buku Sejarah'),
('KW03', 'Pantai Krakal', 'Destinasi wisata ', 'Buku Wisata'),
('KW04', 'Religi', 'Wisata rohani', 'Buku');

-- --------------------------------------------------------

--
-- Struktur dari tabel `objekwisata`
--

CREATE TABLE `objekwisata` (
  `objekID` char(4) NOT NULL,
  `objeknama` char(30) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `objekwisata`
--

INSERT INTO `objekwisata` (`objekID`, `objeknama`, `areaID`) VALUES
('OW01', 'Telaga Warna', 'AR03'),
('OW02', 'Candi Prambanan', 'AR02'),
('OW03', 'Candi Borobudur', 'AR02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `provinsiID` char(2) NOT NULL,
  `provinsinama` char(25) NOT NULL,
  `provinsitglberdiri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`provinsiID`, `provinsinama`, `provinsitglberdiri`) VALUES
('10', 'Jawa Barat', '1950-07-04'),
('11', 'Jawa Timur', '1945-10-12'),
('12', 'Jawa Tengah', '1950-08-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `restoran`
--

CREATE TABLE `restoran` (
  `restoID` char(4) NOT NULL,
  `restonama` char(30) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `restoran`
--

INSERT INTO `restoran` (`restoID`, `restonama`, `areaID`) VALUES
('RN01', 'Stupa Restaurant by plataran', 'AR05'),
('RN02', 'Amata Resto', 'AR03'),
('RN03', 'Bowery', 'AR02'),
('RN04', 'Kedai Beringin', 'AR04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indeks untuk tabel `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaID`);

--
-- Indeks untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiID`);

--
-- Indeks untuk tabel `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotoID`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indeks untuk tabel `objekwisata`
--
ALTER TABLE `objekwisata`
  ADD PRIMARY KEY (`objekID`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`provinsiID`);

--
-- Indeks untuk tabel `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`restoID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
