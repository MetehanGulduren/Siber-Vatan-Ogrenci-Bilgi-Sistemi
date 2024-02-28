-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Eki 2023, 14:40:03
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `school`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `AID` int(11) NOT NULL,
  `ANAME` varchar(150) NOT NULL,
  `APASS` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`AID`, `ANAME`, `APASS`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `class`
--

CREATE TABLE `class` (
  `CID` int(11) NOT NULL,
  `CNAME` varchar(150) NOT NULL,
  `CSEC` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `class`
--

INSERT INTO `class` (`CID`, `CNAME`, `CSEC`) VALUES
(24, 'YAVUZLAR 2023', ''),
(26, 'CUBERİUM 2023', ''),
(30, 'ZAYOTEM 2023', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `exam`
--

CREATE TABLE `exam` (
  `EID` int(11) NOT NULL,
  `ENAME` varchar(150) NOT NULL,
  `CLASS` varchar(150) NOT NULL,
  `SUB` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `exam`
--

INSERT INTO `exam` (`EID`, `ENAME`, `CLASS`, `SUB`) VALUES
(29, 'PHP SINAVI', 'YAVUZLAR 2023', 'PHP'),
(30, 'html', 'YAVUZLAR 2023', 'HTML-CSS-JAVASCRIPT'),
(31, 'phpa', 'ZAYOTEM 2023', 'PHP');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `exam_results`
--

CREATE TABLE `exam_results` (
  `ERID` int(11) NOT NULL,
  `EID` int(11) DEFAULT NULL,
  `ID` int(11) DEFAULT NULL,
  `SCORE` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `exam_results`
--

INSERT INTO `exam_results` (`ERID`, `EID`, `ID`, `SCORE`) VALUES
(8, 29, 11, 32),
(9, 29, 10, 54),
(10, 30, 11, 67),
(12, 31, 12, 96);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `staff`
--

CREATE TABLE `staff` (
  `TID` int(11) NOT NULL,
  `TNAME` varchar(150) NOT NULL,
  `TPASS` varchar(150) NOT NULL,
  `QUAL` varchar(150) NOT NULL,
  `SAL` varchar(150) NOT NULL,
  `PNO` varchar(150) NOT NULL,
  `MAIL` varchar(150) NOT NULL,
  `PADDR` text NOT NULL,
  `IMG` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `staff`
--

INSERT INTO `staff` (`TID`, `TNAME`, `TPASS`, `QUAL`, `SAL`, `PNO`, `MAIL`, `PADDR`, `IMG`) VALUES
(26, 'Selim', '$argon2id$v=19$m=65536,t=4,p=1$cFdpdkFyRzBudC5aRFdGSw$xVRiJI76zKLID+CcN6lS9s7wo7ZK1Un6sv6c/GbM+AI', 'YAVUZLAR 2023', 'Bartın', '', '', '', ''),
(34, 'İyad', '$argon2id$v=19$m=65536,t=4,p=1$RWZEQ0FiazV2QWE2ei94aw$Zghg0cLAS3aemOnbLniBXjgIZHR/GaFTDGoTn2pCj/E', 'YAVUZLAR 2023', 'Türkiye', '', '', '', ''),
(35, 'İsmail', '$argon2id$v=19$m=65536,t=4,p=1$R1JxUHpnbVlmYU5ueFpEeQ$Q7ffspV57rxnAdKsp3kQb/2b80irUjwNjarQpXp893o', 'ZAYOTEM 2023', 'Türkiye', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `RNO` varchar(150) NOT NULL,
  `NAME` varchar(150) NOT NULL,
  `SPASS` varchar(150) NOT NULL,
  `DOB` varchar(150) NOT NULL,
  `GEN` varchar(150) NOT NULL,
  `PHO` varchar(150) NOT NULL,
  `MAIL` varchar(150) NOT NULL,
  `ADDR` text NOT NULL,
  `SCLASS` varchar(150) NOT NULL,
  `SSEC` varchar(150) NOT NULL,
  `SIMG` varchar(150) NOT NULL,
  `TID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `student`
--

INSERT INTO `student` (`ID`, `RNO`, `NAME`, `SPASS`, `DOB`, `GEN`, `PHO`, `MAIL`, `ADDR`, `SCLASS`, `SSEC`, `SIMG`, `TID`) VALUES
(11, 'S105', 'Metehan', '$argon2id$v=19$m=65536,t=4,p=1$cVpnSEdLN2d3bjl4ZWNFcQ$P3tkljsnBrn9PvGSp3bA+rvniKQ1nD7Dhmi3VqjlDh4', '18-06-2003', 'Erkek', '5320626978', 'metegulduren@outlook.com', 'incivez', 'YAVUZLAR 2023', '', 'ogrenci/pexels-vlad-alexandru-popa-1402787.jpg', 26),
(12, 'S106', 'Nil', '$argon2id$v=19$m=65536,t=4,p=1$MU5SVHhZYkswa011VFlybg$K6f+Fu54MTVkhT6VRQ3M/d/9SWFbu+H5eBEw57+7MJk', '3-02-2003', 'Kadın', '5320626977', 'user@example.com', 'innnnn', 'ZAYOTEM 2023', '', 'ogrenci/1293302.jpg', 35);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sub`
--

CREATE TABLE `sub` (
  `SID` int(11) NOT NULL,
  `SNAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `sub`
--

INSERT INTO `sub` (`SID`, `SNAME`) VALUES
(7, 'PHP'),
(8, 'HTML-CSS-JAVASCRIPT');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`);

--
-- Tablo için indeksler `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`CID`);

--
-- Tablo için indeksler `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`EID`);

--
-- Tablo için indeksler `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`ERID`),
  ADD KEY `EID` (`EID`),
  ADD KEY `ID` (`ID`);

--
-- Tablo için indeksler `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`TID`);

--
-- Tablo için indeksler `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`SID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `class`
--
ALTER TABLE `class`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `exam`
--
ALTER TABLE `exam`
  MODIFY `EID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `ERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `staff`
--
ALTER TABLE `staff`
  MODIFY `TID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `sub`
--
ALTER TABLE `sub`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `exam_results`
--
ALTER TABLE `exam_results`
  ADD CONSTRAINT `exam_results_ibfk_1` FOREIGN KEY (`EID`) REFERENCES `exam` (`EID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
