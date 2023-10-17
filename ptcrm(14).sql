-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 12:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptcrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT 0,
  `adrs_name` varchar(255) DEFAULT NULL,
  `adrs_slug` varchar(255) DEFAULT NULL,
  `adrs_type` varchar(255) DEFAULT NULL COMMENT 'adrs_city, adrs_country, adrs_region, adrs_district'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `parent_id`, `adrs_name`, `adrs_slug`, `adrs_type`) VALUES
(1, 0, 'Turkey', 'turkey', 'adrs_country'),
(2, 1, 'İstanbul', 'i̇stanbul', 'adrs_city'),
(3, 2, 'Şişli', 'şişli', 'adrs_region'),
(4, 3, 'Cumhuriyet', 'cumhuriyet', 'adrs_district'),
(5, 2, 'Bağcılar', 'bağcılar', 'adrs_region'),
(6, 5, 'Mahmutbey', 'mahmutbey', 'adrs_district'),
(7, 2, 'Kadıköy', 'kadıköy', 'adrs_region'),
(8, 7, 'Fikirtepe', 'fikirtepe', 'adrs_district'),
(9, 3, 'Paşa', 'paşa', 'adrs_district'),
(10, 2, 'Eyüpsultan', 'eyüpsultan', 'adrs_region'),
(11, 10, 'Çırçır', 'çırçır', 'adrs_district'),
(12, 10, 'Alibeyköy', 'alibeyköy', 'adrs_district'),
(13, 2, 'Ümraniye', 'ümraniye', 'adrs_region'),
(14, 13, 'Çamlık', 'çamlık', 'adrs_district'),
(15, 2, 'Maltepe', 'maltepe', 'adrs_region'),
(16, 15, 'Küçükyalı', 'küçükyalı', 'adrs_district'),
(17, 2, 'Sarıyer', 'sarıyer', 'adrs_region'),
(18, 17, 'Ayazağa', 'ayazağa', 'adrs_district'),
(19, 7, 'Göztepe', 'göztepe', 'adrs_district'),
(20, 5, 'Bağlar', 'bağlar', 'adrs_district'),
(21, 15, 'Yalı', 'yalı', 'adrs_district'),
(22, 3, 'İnönü', 'i̇nönü', 'adrs_district'),
(23, 2, 'Kartal', 'kartal', 'adrs_region'),
(24, 23, 'Topselvi', 'topselvi', 'adrs_district'),
(25, 2, 'Beyoğlu', 'beyoğlu', 'adrs_region'),
(26, 2, 'Sultangazi', 'sultangazi', 'adrs_region'),
(27, 17, 'Huzurmahale', 'huzurmahale', 'adrs_district'),
(28, 7, 'Osmanağa', 'osmanağa', 'adrs_district'),
(29, 2, 'Ataşehir', 'ataşehir', 'adrs_region'),
(30, 29, 'İçerenköy', 'i̇çerenköy', 'adrs_district'),
(31, 2, 'Bayrampaşa', 'bayrampaşa', 'adrs_region'),
(32, 31, 'Topçular', 'topçular', 'adrs_district'),
(33, 23, 'Petroliş', 'petroliş', 'adrs_district'),
(34, 2, 'Beylikdüzü', 'beylikdüzü', 'adrs_region'),
(35, 34, 'Kavaklı', 'kavaklı', 'adrs_district'),
(36, 7, 'Dumlupınar', 'dumlupınar', 'adrs_district'),
(37, 3, 'Feriköy', 'feriköy', 'adrs_district'),
(38, 5, '15 Temmuz', '15-temmuz', 'adrs_district'),
(39, 23, 'Orhantepe', 'orhantepe', 'adrs_district'),
(40, 10, 'Güzeltepe', 'güzeltepe', 'adrs_district'),
(41, 17, 'Rumeli Hisarı', 'rumeli-hisarı', 'adrs_district'),
(42, 15, 'Cevizli', 'cevizli', 'adrs_district'),
(43, 25, 'Çukur', 'çukur', 'adrs_district'),
(44, 17, 'Yeniköy Mh', 'yeniköy-mh', 'adrs_district'),
(45, 13, 'Armağan Evler', 'armağan-evler', 'adrs_district'),
(46, 2, 'Zeytinburnu', 'zeytinburnu', 'adrs_region'),
(47, 46, 'Kazlıçeşme', 'kazlıçeşme', 'adrs_district'),
(48, 17, 'Baltalimanı', 'baltalimanı', 'adrs_district'),
(49, 2, 'Fatih', 'fatih', 'adrs_region'),
(50, 49, 'Aksaray', 'aksaray', 'adrs_district'),
(51, 7, 'Erenköy', 'erenköy', 'adrs_district'),
(52, 7, 'Caddebostan', 'caddebostan', 'adrs_district'),
(53, 2, 'Bakırköy', 'bakırköy', 'adrs_region'),
(54, 53, 'Ataköy 2-5-6.', 'ataköy-2-5-6', 'adrs_district'),
(55, 49, 'Yavuz Sultan Selim', 'yavuz-sultan-selim', 'adrs_district'),
(56, 34, 'Barış', 'barış', 'adrs_district'),
(57, 2, 'Üsküdar', 'üsküdar', 'adrs_region'),
(58, 57, 'Bahçelievler', 'bahçelievler', 'adrs_district'),
(59, 3, 'Merkez', 'merkez', 'adrs_district'),
(60, 3, 'Teşvikiye , Nişantaşı', 'teşvikiye--nişantaşı', 'adrs_district'),
(61, 25, 'Pürtelaş Hasan Efendi', 'pürtelaş-hasan-efendi', 'adrs_district'),
(62, 15, 'Altayçeşme', 'altayçeşme', 'adrs_district'),
(63, 2, 'Başakşehir', 'başakşehir', 'adrs_region'),
(64, 49, 'Sofular', 'sofular', 'adrs_district'),
(65, 23, 'Esentepe', 'esentepe', 'adrs_district'),
(66, 49, 'Balat', 'balat', 'adrs_district'),
(67, 7, 'Eğitim', 'eğitim', 'adrs_district'),
(68, 2, 'Beykoz', 'beykoz', 'adrs_region'),
(69, 68, 'Anadolu Hisarı', 'anadolu-hisarı', 'adrs_district'),
(70, 15, 'Zümrütevler', 'zümrütevler', 'adrs_district'),
(71, 49, 'Ayvansaray', 'ayvansaray', 'adrs_district'),
(72, 49, 'Akşemsettin', 'akşemsettin', 'adrs_district'),
(73, 2, 'Silivri', 'silivri', 'adrs_region'),
(74, 73, 'Kavaklı Mh.', 'kavaklı-mh', 'adrs_district'),
(75, 2, 'Esenyurt', 'esenyurt', 'adrs_region'),
(76, 2, 'Beşiktaş', 'beşiktaş', 'adrs_region'),
(77, 76, 'Ortaköy', 'ortaköy', 'adrs_district'),
(78, 13, 'Çakmak', 'çakmak', 'adrs_district'),
(79, 2, 'Kâğıthane', 'kâğıthane', 'adrs_region'),
(80, 79, 'Talatpaşa', 'talatpaşa', 'adrs_district'),
(81, 34, 'Marmara', 'marmara', 'adrs_district'),
(82, 79, 'Hamidiye', 'hamidiye', 'adrs_district'),
(83, 79, 'Çeliktepe', 'çeliktepe', 'adrs_district'),
(84, 13, 'Site', 'site', 'adrs_district'),
(85, 7, 'Bostancı', 'bostancı', 'adrs_district'),
(86, 25, 'İstiklal', 'i̇stiklal', 'adrs_district'),
(87, 3, 'Eskişehir', 'eskişehir', 'adrs_district'),
(88, 75, 'Sanayi', 'sanayi', 'adrs_district'),
(89, 34, 'Dereağzı Mh.', 'dereağzı-mh', 'adrs_district'),
(90, 2, 'Büyükçekmece', 'büyükçekmece', 'adrs_region'),
(91, 90, 'Mimaroba', 'mimaroba', 'adrs_district'),
(92, 58, 'Kocasinan Merkez', 'kocasinan-merkez', 'adrs_district'),
(93, 2, 'Çekmeköy', 'çekmeköy', 'adrs_region'),
(94, 63, 'Bahçeşehir 2. Kısım', 'bahçeşehir-2-kısım', 'adrs_district'),
(95, 23, 'Yunus', 'yunus', 'adrs_district'),
(96, 25, 'Piri Paşa', 'piri-paşa', 'adrs_district'),
(97, 17, 'ayazağa mah', 'ayazağa-mah', 'adrs_district'),
(98, 57, 'Çengelköy', 'çengelköy', 'adrs_district'),
(99, 49, 'İskenderpaşa Mh.', 'i̇skenderpaşa-mh', 'adrs_district'),
(100, 2, 'Küçükçekmece', 'küçükçekmece', 'adrs_region'),
(101, 100, 'İstasyon', 'i̇stasyon', 'adrs_district'),
(102, 23, 'Karlıktepe', 'karlıktepe', 'adrs_district'),
(103, 25, 'Ömer Avni', 'ömer-avni', 'adrs_district'),
(104, 13, 'Tatlısu', 'tatlısu', 'adrs_district'),
(105, 25, 'Bülbül', 'bülbül', 'adrs_district'),
(106, 3, 'Teşvikiye', 'teşvikiye', 'adrs_district'),
(107, 49, 'Cevizlik', 'cevizlik', 'adrs_district'),
(108, 7, 'Sahrayı Cedit', 'sahrayı-cedit', 'adrs_district'),
(109, 3, 'H. Edip Adıvar Mahallesi', 'h-edip-adıvar-mahallesi', 'adrs_district'),
(110, 2, 'Avcilar', 'avcilar', 'adrs_region'),
(111, 110, 'Firuzkoy', 'firuzkoy', 'adrs_district'),
(112, 79, 'Hürriyet', 'hürriyet', 'adrs_district'),
(113, 1, 'Antalya', 'antalya', 'adrs_city'),
(114, 1, 'Fethiye', 'fethiye', 'adrs_city'),
(115, 1, 'Bodrum', 'bodrum', 'adrs_city'),
(116, 113, 'Yalikavak', 'yalikavak', 'adrs_region'),
(117, 2, 'Oludeniz', 'oludeniz', 'adrs_region'),
(118, 114, 'Ovacik', 'ovacik', 'adrs_region'),
(119, 1, 'Kalkan', 'kalkan', 'adrs_city'),
(120, 119, 'Kisla', 'kisla', 'adrs_region'),
(121, 1, 'Side', 'side', 'adrs_city'),
(122, 1, 'Kemer', 'kemer', 'adrs_city'),
(123, 115, 'Turkbuku', 'turkbuku', 'adrs_region'),
(124, 1, 'Kas', 'kas', 'adrs_city'),
(125, 119, 'Old Town', 'old-town', 'adrs_region'),
(126, 115, 'Torba', 'torba', 'adrs_region'),
(127, 115, 'Bodrum Town', 'bodrum-town', 'adrs_region'),
(128, 115, 'Bitez', 'bitez', 'adrs_region'),
(129, 115, 'Gumusluk', 'gumusluk', 'adrs_region'),
(130, 115, 'Ortakent', 'ortakent', 'adrs_region'),
(131, 1, 'Gocek', 'gocek', 'adrs_city'),
(132, 119, 'Komurluk', 'komurluk', 'adrs_region'),
(133, 114, 'Sovalye Island', 'sovalye-island', 'adrs_region'),
(134, 119, 'Kalamar', 'kalamar', 'adrs_region'),
(135, 119, 'Ortaalan', 'ortaalan', 'adrs_region'),
(136, 119, 'Kiziltas', 'kiziltas', 'adrs_region'),
(137, 115, 'Gumbet', 'gumbet', 'adrs_region'),
(138, 113, 'Lara', 'lara', 'adrs_region'),
(139, 115, 'Konacik', 'konacik', 'adrs_region'),
(140, 115, 'Kadikalesi', 'kadikalesi', 'adrs_region'),
(141, 114, 'Calis', 'calis', 'adrs_region'),
(142, 113, 'Konyaalti', 'konyaalti', 'adrs_region'),
(143, 114, 'Hisaronu', 'hisaronu', 'adrs_region'),
(144, 114, 'Fethiye Town', 'fethiye-town', 'adrs_region'),
(145, 115, 'Turgutreis', 'turgutreis', 'adrs_region'),
(146, 115, 'Gundogan', 'gundogan', 'adrs_region'),
(147, 1, 'Alanya', 'alanya', 'adrs_city'),
(148, 114, 'Uzumlu', 'uzumlu', 'adrs_region'),
(149, 114, 'Kayakoy', 'kayakoy', 'adrs_region'),
(150, 115, 'Gulluk', 'gulluk', 'adrs_region'),
(151, 114, 'Karagozler', 'karagozler', 'adrs_region'),
(152, 119, 'Patara', 'patara', 'adrs_region'),
(153, 1, 'Dalaman', 'dalaman', 'adrs_city'),
(154, 113, 'Kepez', 'kepez', 'adrs_region'),
(155, 1, 'Belek', 'belek', 'adrs_city'),
(156, 2, 'Bahcesehir', 'bahcesehir', 'adrs_region'),
(157, 1, 'Kusadasi', 'kusadasi', 'adrs_city'),
(158, 115, 'Yaliciftlik', 'yaliciftlik', 'adrs_region'),
(159, 113, 'Kaleici', 'kaleici', 'adrs_region'),
(160, 2, 'Tuzla Istanbul', 'tuzla-istanbul', 'adrs_region'),
(161, 119, 'Islamlar', 'islamlar', 'adrs_region'),
(162, 113, 'Dosemealti', 'dosemealti', 'adrs_region'),
(163, 1, 'Marmaris', 'marmaris', 'adrs_city'),
(164, 114, 'Seydikemer', 'seydikemer', 'adrs_region'),
(165, 1, 'Dalyan', 'dalyan', 'adrs_city'),
(166, 2, 'Gaziosmanpasa', 'gaziosmanpasa', 'adrs_region'),
(167, 1, 'Sakarya', 'sakarya', 'adrs_city'),
(168, 1, 'Alacati', 'alacati', 'adrs_city'),
(169, 1, 'Koycegiz', 'koycegiz', 'adrs_city'),
(170, 1, 'Cesme', 'cesme', 'adrs_city'),
(171, 2, 'Eyup', 'eyup', 'adrs_region'),
(172, 1, 'Bursa', 'bursa', 'adrs_city'),
(173, 1, 'Yalova', 'yalova', 'adrs_city'),
(174, 2, 'Sancaktepe', 'sancaktepe', 'adrs_region'),
(175, 1, 'Izmir', 'izmir', 'adrs_city'),
(176, 115, 'Adabuku', 'adabuku', 'adrs_region'),
(177, 115, 'Guvercinlik', 'guvercinlik', 'adrs_region'),
(178, 1, 'Bolu', 'bolu', 'adrs_city'),
(179, 1, 'Altinkum', 'altinkum', 'adrs_city'),
(180, 113, 'Kundu', 'kundu', 'adrs_region'),
(181, 1, 'Trabzon', 'trabzon', 'adrs_city'),
(182, 1, 'Didim', 'didim', 'adrs_city'),
(183, 0, 'North Cyprus', 'north-cyprus', 'adrs_country'),
(184, 183, 'Nicosia', 'nicosia', 'adrs_city'),
(185, 114, 'Faralya', 'faralya', 'adrs_region'),
(186, 2, 'Catalca', 'catalca', 'adrs_region'),
(187, 2, 'Sile', 'sile', 'adrs_region'),
(188, 183, 'Kyrenia', 'kyrenia', 'adrs_city'),
(189, 2, 'Pendik', 'pendik', 'adrs_region'),
(190, 115, 'Tuzla', 'tuzla', 'adrs_region'),
(191, 2, 'Arnavutkoy', 'arnavutkoy', 'adrs_region'),
(192, 2, 'Sultanbeyli', 'sultanbeyli', 'adrs_region'),
(193, 183, 'Bafra', 'bafra', 'adrs_city'),
(194, 113, 'Antalya Centre', 'antalya-centre', 'adrs_region'),
(195, 1, 'Ankara', 'ankara', 'adrs_city'),
(196, 1, 'Datca', 'datca', 'adrs_city'),
(197, 1, 'Ordu', 'ordu', 'adrs_city'),
(198, 183, 'Famagusta', 'famagusta', 'adrs_city'),
(199, 1, 'Kirklareli', 'kirklareli', 'adrs_city'),
(200, 113, 'Aksu', 'aksu', 'adrs_region'),
(201, 2, 'Gungoren', 'gungoren', 'adrs_region'),
(202, 175, 'Foca', 'foca', 'adrs_region'),
(203, 115, 'Bozbuk', 'bozbuk', 'adrs_region'),
(204, 1, 'Mersin', 'mersin', 'adrs_city'),
(205, 0, 'Türkiye', 'türkiye', 'adrs_country'),
(206, 205, 'Kocaeli', 'kocaeli', 'adrs_city'),
(207, 206, 'Kartepe', 'kartepe', 'adrs_region'),
(208, 207, '17 Ağustos Mahallesi', '17-ağustos-mahallesi', 'adrs_district'),
(209, 3, 'Halide Edip Adıvar', 'halide-edip-adıvar', 'adrs_district'),
(210, 90, 'Mimaroba Mh', 'mimaroba-mh', 'adrs_district'),
(211, 191, 'Karaburun', 'karaburun', 'adrs_district'),
(212, 63, 'Altınşehir', 'altınşehir', 'adrs_district'),
(213, 110, 'Cihangir', 'cihangir', 'adrs_district'),
(214, 79, 'Gürsel', 'gürsel', 'adrs_district'),
(215, 100, 'Tevfik Bey', 'tevfik-bey', 'adrs_district'),
(216, 100, 'Halkalı Merkez', 'halkalı-merkez', 'adrs_district'),
(217, 110, 'Üniversite', 'üniversite', 'adrs_district'),
(218, 100, 'Atakent', 'atakent', 'adrs_district'),
(219, 7, 'Merdivenköy', 'merdivenköy', 'adrs_district'),
(220, 90, 'Kumburgaz Mh', 'kumburgaz-mh', 'adrs_district'),
(221, 90, 'Sinanoba Mh.', 'sinanoba-mh', 'adrs_district'),
(222, 58, 'Yenibosna Merkez', 'yenibosna-merkez', 'adrs_district'),
(223, 23, 'Yakacık Yeni', 'yakacık-yeni', 'adrs_district'),
(224, 90, 'Celaliye Mh', 'celaliye-mh', 'adrs_district'),
(225, 68, 'Acarlar', 'acarlar', 'adrs_district'),
(226, 31, 'Kartaltepe', 'kartaltepe', 'adrs_district'),
(227, 79, 'Çağlayan', 'çağlayan', 'adrs_district'),
(228, 75, 'Yeşilkent', 'yeşilkent', 'adrs_district'),
(229, 189, 'Esenler', 'esenler', 'adrs_district'),
(230, 17, 'Maslak', 'maslak', 'adrs_district'),
(231, 29, 'Ataşehir Atatürk', 'ataşehir-atatürk', 'adrs_district'),
(232, 58, 'Bahçelievler Merkez', 'bahçelievler-merkez', 'adrs_district'),
(233, 17, 'Uskumruköy', 'uskumruköy', 'adrs_district'),
(234, 25, 'Gümüşsuyu', 'gümüşsuyu', 'adrs_district'),
(235, 110, 'Tahtakale', 'tahtakale', 'adrs_district'),
(236, 17, 'Ferahevler', 'ferahevler', 'adrs_district'),
(237, 90, 'Ekinoba', 'ekinoba', 'adrs_district'),
(238, 75, 'Namık Kemal', 'namık-kemal', 'adrs_district'),
(239, 46, 'Seyitnizam Mh.', 'seyitnizam-mh', 'adrs_district'),
(240, 23, 'Soğanlık Yeni', 'soğanlık-yeni', 'adrs_district'),
(241, 3, 'Fulya', 'fulya', 'adrs_district'),
(242, 63, 'Bahçeşehir 1. Kısım', 'bahçeşehir-1-kısım', 'adrs_district'),
(243, 29, 'Küçükbakkalköy', 'küçükbakkalköy', 'adrs_district'),
(244, 23, 'Çarşı', 'çarşı', 'adrs_district'),
(245, 174, 'Eyüp Sultan', 'eyüp-sultan', 'adrs_district'),
(246, 34, 'Yakuplu', 'yakuplu', 'adrs_district'),
(247, 46, 'Yenidoğan', 'yenidoğan', 'adrs_district'),
(248, 75, 'Akevler', 'akevler', 'adrs_district'),
(249, 23, 'Kordonboyu Mh', 'kordonboyu-mh', 'adrs_district'),
(250, 53, 'Ataköy 7-8-9-10', 'ataköy-7-8-9-10', 'adrs_district'),
(251, 63, 'Kayabaşı', 'kayabaşı', 'adrs_district'),
(252, 100, 'Yarımburgaz', 'yarımburgaz', 'adrs_district'),
(253, 13, 'Saray', 'saray', 'adrs_district'),
(254, 5, 'Mahmutbey Mh.', 'mahmutbey-mh', 'adrs_district'),
(255, 79, 'Yahyakemal', 'yahyakemal', 'adrs_district'),
(256, 5, 'Yıldıztepe', 'yıldıztepe', 'adrs_district'),
(257, 75, 'Güzelyurt', 'güzelyurt', 'adrs_district'),
(258, 57, 'Mimar Sinan', 'mimar-sinan', 'adrs_district'),
(259, 75, 'Esenkent', 'esenkent', 'adrs_district'),
(260, 189, 'Batı', 'batı', 'adrs_district'),
(261, 90, 'Bahçelievler Mh.', 'bahçelievler-mh', 'adrs_district'),
(262, 29, 'Barbaros', 'barbaros', 'adrs_district'),
(263, 53, 'Basınköy Mh', 'basınköy-mh', 'adrs_district'),
(264, 75, 'Mehterçeşme', 'mehterçeşme', 'adrs_district'),
(265, 25, 'Tomtom', 'tomtom', 'adrs_district'),
(266, 90, 'Atatürk', 'atatürk', 'adrs_district'),
(267, 201, 'Tozkoparan', 'tozkoparan', 'adrs_district'),
(268, 34, 'Sahil', 'sahil', 'adrs_district'),
(269, 79, 'Ortabayır', 'ortabayır', 'adrs_district'),
(270, 17, 'Maden', 'maden', 'adrs_district'),
(271, 10, 'Göktürk Merkez', 'göktürk-merkez', 'adrs_district'),
(272, 34, 'Gürpınar Mh.', 'gürpınar-mh', 'adrs_district'),
(273, 166, 'Sarıgöl', 'sarıgöl', 'adrs_district'),
(274, 76, 'Vişnezade', 'vişnezade', 'adrs_district'),
(275, 3, 'Gülbahar', 'gülbahar', 'adrs_district'),
(276, 79, 'Telsizler', 'telsizler', 'adrs_district'),
(277, 75, 'Saadetdere', 'saadetdere', 'adrs_district'),
(278, 90, 'Kumburgaz Mh.', 'kumburgaz-mh', 'adrs_district'),
(279, 110, 'Ambarlı', 'ambarlı', 'adrs_district'),
(280, 34, 'Adnan Kahveci', 'adnan-kahveci', 'adrs_district'),
(281, 3, 'Halaskargazi', 'halaskargazi', 'adrs_district'),
(282, 3, 'Meşrutiyet', 'meşrutiyet', 'adrs_district'),
(283, 189, 'Sülüntepe', 'sülüntepe', 'adrs_district'),
(284, 90, 'Kamiloba Mh', 'kamiloba-mh', 'adrs_district'),
(285, 34, 'Dereağzı Mh', 'dereağzı-mh', 'adrs_district'),
(286, 34, 'Dereağzı', 'dereağzı', 'adrs_district'),
(287, 75, 'Pınar', 'pınar', 'adrs_district'),
(288, 23, 'Orta', 'orta', 'adrs_district'),
(289, 53, 'Sakızağacı', 'sakızağacı', 'adrs_district'),
(290, 189, 'Ahmet Yesevi Mh.', 'ahmet-yesevi-mh', 'adrs_district'),
(291, 23, 'Gümüşpınar', 'gümüşpınar', 'adrs_district'),
(292, 206, 'Darıca', 'darıca', 'adrs_region'),
(293, 292, 'Piri Reis', 'piri-reis', 'adrs_district'),
(294, 13, 'Aşağı Dudullu', 'aşağı-dudullu', 'adrs_district'),
(295, 53, 'Şenlikköy', 'şenlikköy', 'adrs_district'),
(296, 49, 'Yedikule', 'yedikule', 'adrs_district'),
(297, 31, 'Altıntepsi', 'altıntepsi', 'adrs_district'),
(298, 90, 'Pınartepe', 'pınartepe', 'adrs_district'),
(299, 75, 'Örnek', 'örnek', 'adrs_district'),
(300, 75, 'Yenikent', 'yenikent', 'adrs_district'),
(301, 57, 'Ünalan', 'ünalan', 'adrs_district'),
(302, 75, 'İncirtepe', 'i̇ncirtepe', 'adrs_district'),
(303, 68, 'Soğuksu', 'soğuksu', 'adrs_district'),
(304, 90, 'Karaagaç', 'karaagaç', 'adrs_district'),
(305, 7, 'Suadiye', 'suadiye', 'adrs_district'),
(306, 201, 'Abdurrahman Nafiz Gürman', 'abdurrahman-nafiz-gürman', 'adrs_district'),
(307, 7, 'Fenerbahçe', 'fenerbahçe', 'adrs_district'),
(308, 57, 'Sultantepe', 'sultantepe', 'adrs_district'),
(309, 17, 'Poligon', 'poligon', 'adrs_district'),
(310, 76, 'Etiler', 'etiler', 'adrs_district'),
(311, 76, 'Gayrettepe', 'gayrettepe', 'adrs_district'),
(312, 76, 'Dikilitaş', 'dikilitaş', 'adrs_district'),
(313, 79, 'Seyrantepe', 'seyrantepe', 'adrs_district'),
(314, 57, 'Acıbadem', 'acıbadem', 'adrs_district'),
(315, 25, 'Hacıahmet', 'hacıahmet', 'adrs_district'),
(316, 166, 'Karayolları', 'karayolları', 'adrs_district'),
(317, 17, 'Reşitpaşa', 'reşitpaşa', 'adrs_district'),
(318, 13, 'Esenevler', 'esenevler', 'adrs_district'),
(319, 25, 'Kamer Hatun', 'kamer-hatun', 'adrs_district'),
(320, 75, 'Koza Mh', 'koza-mh', 'adrs_district'),
(321, 75, 'Orhangazi Mahallesi', 'orhangazi-mahallesi', 'adrs_district'),
(322, 75, 'Koza Mh.', 'koza-mh', 'adrs_district'),
(323, 23, 'Kordonboyu', 'kordonboyu', 'adrs_district'),
(324, 90, 'Alkent 2000', 'alkent-2000', 'adrs_district'),
(325, 172, 'Osmangazi', 'osmangazi', 'adrs_region'),
(326, 325, 'Demirtaş Cumhuriyet', 'demirtaş-cumhuriyet', 'adrs_district'),
(327, 174, 'Veysel Karani', 'veysel-karani', 'adrs_district'),
(328, 5, 'Fevziçakmak', 'fevziçakmak', 'adrs_district'),
(329, 195, 'Çankaya', 'çankaya', 'adrs_region'),
(330, 329, 'Yukarı Dikmen', 'yukarı-dikmen', 'adrs_district'),
(331, 174, 'Abdurrahmangazi', 'abdurrahmangazi', 'adrs_district'),
(332, 100, 'İstasyon Mh.', 'i̇stasyon-mh', 'adrs_district'),
(333, 15, 'İdealtepe', 'i̇dealtepe', 'adrs_district'),
(334, 100, 'Gültepe', 'gültepe', 'adrs_district'),
(335, 29, 'Yenişehir', 'yenişehir', 'adrs_district'),
(336, 46, 'Nuripaşa', 'nuripaşa', 'adrs_district'),
(337, 191, 'Hicret', 'hicret', 'adrs_district'),
(338, 166, 'Bağlarbaşı', 'bağlarbaşı', 'adrs_district'),
(339, 90, 'Fatih Mh', 'fatih-mh', 'adrs_district'),
(340, 5, 'Güneşli', 'güneşli', 'adrs_district'),
(341, 17, 'İstinye', 'i̇stinye', 'adrs_district'),
(342, 15, 'Çınar', 'çınar', 'adrs_district'),
(343, 57, 'Altunizade', 'altunizade', 'adrs_district'),
(344, 3, 'Kuştepe', 'kuştepe', 'adrs_district'),
(345, 100, 'Kemalpaşa', 'kemalpaşa', 'adrs_district'),
(346, 63, 'Bahçeşehir 1. Kısım Mh.', 'bahçeşehir-1-kısım-mh', 'adrs_district'),
(347, 10, 'Düğmeciler', 'düğmeciler', 'adrs_district'),
(348, 166, 'Yıldıztabya', 'yıldıztabya', 'adrs_district'),
(349, 34, 'Gürpınar', 'gürpınar', 'adrs_district'),
(350, 63, 'Ziya Gökalp', 'ziya-gökalp', 'adrs_district'),
(351, 76, 'Nisbetiye Mh.', 'nisbetiye-mh', 'adrs_district'),
(352, 190, 'İçmeler', 'i̇çmeler', 'adrs_district'),
(353, 15, 'Feyzullah', 'feyzullah', 'adrs_district'),
(354, 34, 'Cumhuriyet Mh', 'cumhuriyet-mh', 'adrs_district'),
(355, 76, 'Konaklar', 'konaklar', 'adrs_district'),
(356, 17, 'Zekeriyaköy', 'zekeriyaköy', 'adrs_district'),
(357, 10, 'Mithatpaşa', 'mithatpaşa', 'adrs_district'),
(358, 90, 'Yenimahalle Mh.', 'yenimahalle-mh', 'adrs_district'),
(359, 3, 'İzzetpaşa', 'i̇zzetpaşa', 'adrs_district'),
(360, 58, 'Bahçelievler Mh', 'bahçelievler-mh', 'adrs_district'),
(361, 63, 'Bahçeşehir 2. Kısım Mh.', 'bahçeşehir-2-kısım-mh', 'adrs_district'),
(362, 205, 'Muğla', 'muğla', 'adrs_city'),
(363, 93, 'Nişantepe', 'nişantepe', 'adrs_district'),
(364, 57, 'Kandilli', 'kandilli', 'adrs_district'),
(365, 10, 'YEŞİLPINAR MAH', 'yeşi̇lpinar-mah', 'adrs_district'),
(366, 174, 'Akpınar', 'akpınar', 'adrs_district'),
(367, 75, 'Ardıçlı', 'ardıçlı', 'adrs_district'),
(368, 26, 'Yunus Emre', 'yunus-emre', 'adrs_district'),
(369, 79, 'Seyrantepe Mahallesi', 'seyrantepe-mahallesi', 'adrs_district'),
(370, 10, 'Yeşilpınar', 'yeşilpınar', 'adrs_district'),
(371, 90, 'Sinanoba', 'sinanoba', 'adrs_district'),
(372, 15, 'Altıntepe', 'altıntepe', 'adrs_district'),
(373, 25, 'Sururi Mehmet Efendi', 'sururi-mehmet-efendi', 'adrs_district'),
(374, 31, 'Muratpaşa', 'muratpaşa', 'adrs_district'),
(375, 76, 'Türkali', 'türkali', 'adrs_district'),
(376, 23, 'Atalar', 'atalar', 'adrs_district'),
(377, 79, 'Nurtepe', 'nurtepe', 'adrs_district'),
(378, 189, 'Çınardere', 'çınardere', 'adrs_district'),
(379, 192, 'Hasanpaşa', 'hasanpaşa', 'adrs_district'),
(380, 57, 'Küçüksu', 'küçüksu', 'adrs_district'),
(381, 73, 'Piri Mehmet Paşa', 'piri-mehmet-paşa', 'adrs_district'),
(382, 3, 'Harbiye', 'harbiye', 'adrs_district'),
(383, 68, 'Kanlıca', 'kanlıca', 'adrs_district'),
(384, 3, 'Dervişali', 'dervişali', 'adrs_district'),
(385, 166, 'Fevzi Çakmak', 'fevzi-çakmak', 'adrs_district'),
(386, 75, 'Koza', 'koza', 'adrs_district'),
(387, 10, 'Karadolap', 'karadolap', 'adrs_district'),
(388, 34, 'Büyükşehir', 'büyükşehir', 'adrs_district'),
(389, 191, 'Hadımköy', 'hadımköy', 'adrs_district'),
(390, 13, 'Madenler', 'madenler', 'adrs_district'),
(391, 73, 'Mimarsinan Silivri', 'mimarsinan-silivri', 'adrs_district'),
(392, 201, 'Mehmet Nesih Özmen', 'mehmet-nesih-özmen', 'adrs_district'),
(393, 10, 'Alibeyköy Mh', 'alibeyköy-mh', 'adrs_district'),
(394, 167, 'Serdivan', 'serdivan', 'adrs_region'),
(395, 172, 'Mudanya', 'mudanya', 'adrs_region'),
(396, 100, 'Cennet', 'cennet', 'adrs_district'),
(397, 49, 'İskenderpaşa', 'i̇skenderpaşa', 'adrs_district'),
(398, 49, 'Karagümrük', 'karagümrük', 'adrs_district'),
(399, 7, 'Caferağa', 'caferağa', 'adrs_district'),
(400, 100, 'Atakent Mh.', 'atakent-mh', 'adrs_district'),
(401, 13, 'Esenşehir Mh', 'esenşehir-mh', 'adrs_district'),
(402, 49, 'Topkapı', 'topkapı', 'adrs_district'),
(403, 90, 'Mimarsinan', 'mimarsinan', 'adrs_district'),
(404, 76, 'Levazım', 'levazım', 'adrs_district'),
(405, 26, 'Uğur Mumcu', 'uğur-mumcu', 'adrs_district'),
(406, 57, 'Küçük Çamlıca', 'küçük-çamlıca', 'adrs_district'),
(407, 93, 'Ömerli', 'ömerli', 'adrs_district'),
(408, 190, 'Aydıntepe', 'aydıntepe', 'adrs_district'),
(409, 90, 'Pınartepe Mh', 'pınartepe-mh', 'adrs_district'),
(410, 46, 'Sümer', 'sümer', 'adrs_district'),
(411, 189, 'Çamçeşme', 'çamçeşme', 'adrs_district'),
(412, 90, 'Güzelce Mh.', 'güzelce-mh', 'adrs_district'),
(413, 25, 'Katip Mustafa Çelebi', 'katip-mustafa-çelebi', 'adrs_district'),
(414, 25, 'Keçeci Piri', 'keçeci-piri', 'adrs_district'),
(415, 76, 'Levent', 'levent', 'adrs_district'),
(416, 229, 'Oruçreis', 'oruçreis', 'adrs_district');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `book_arrivedate` datetime DEFAULT NULL,
  `book_current_stay` varchar(255) DEFAULT NULL COMMENT 'where the client stay',
  `book_meetperiod` tinyint(4) DEFAULT NULL COMMENT 'minutes up to 120 mins',
  `book_meetdate` datetime DEFAULT NULL,
  `book_meetplace` varchar(255) DEFAULT NULL,
  `stat_created` datetime NOT NULL DEFAULT current_timestamp(),
  `rec_state` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `sale_id`, `book_arrivedate`, `book_current_stay`, `book_meetperiod`, `book_meetdate`, `book_meetplace`, `stat_created`, `rec_state`) VALUES
(1, 73, '2023-08-16 00:00:00', 'dasdas', 5, NULL, 'sdfsdf', '2023-08-15 17:20:15', 1),
(4, 68, NULL, NULL, NULL, NULL, NULL, '2023-08-21 10:02:23', 1),
(5, 68, '2023-08-21 13:16:38', NULL, NULL, NULL, NULL, '2023-08-21 10:16:38', 1),
(6, 138, NULL, 'Avcılar', 3, '2023-08-21 13:04:43', 'Şişli', '2023-08-21 10:24:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `category_name` varchar(255) NOT NULL,
  `category_params` varchar(255) NOT NULL DEFAULT '{"icon":"", "link":"", "isProtected":"0"}',
  `category_priority` tinyint(4) NOT NULL DEFAULT 99,
  `rec_state` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `language_id`, `parent_id`, `category_name`, `category_params`, `category_priority`, `rec_state`) VALUES
(28, 0, 0, 'pool', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(32, 2, 126, 'Farsi', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(33, 2, 0, 'sources', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(34, 2, 33, 'Youtube', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(36, 2, 33, 'Instagram', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(37, 0, 0, 'categories', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(40, 0, 0, 'Tags', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(46, 2, 37, 'Second Home Buyer', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(48, 3, 28, 'Russian', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(49, 2, 68, 'Farsi', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(53, 2, 73, 'Report Type', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(60, 0, 53, 'Note', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(61, 0, 53, 'Emphaty', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(73, 0, 0, 'Status(Report)', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(74, 2, 73, 'isNew', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(75, 2, 73, 'isCalled', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(76, 2, 73, 'isSpoken', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(77, 2, 73, 'isMessaged', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(78, 2, 73, 'isWhatsapped', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(79, 2, 73, 'noSale', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(80, 2, 73, 'cancelled', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(81, 2, 37, 'First Home Buyer', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(114, 2, 40, 'tag2', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(123, 2, 33, 'Twitter', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(131, 2, 33, 'Facebook', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(145, 2, 28, 'Farsi', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(146, 2, 28, 'Iranian', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(157, 2, 40, 'Tag1', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(158, 2, 40, 'Tag3', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(159, 2, 0, 'Property Type', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(160, 2, 159, 'Villa', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(161, 2, 159, 'Apartment', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(162, 2, 53, 'Reservation', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(163, 2, 0, 'noSale', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(164, 2, 163, 'Financially not ready', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(165, 2, 163, 'No suitable matching', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(166, 2, 163, 'Client got better offer', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(167, 2, 163, 'Technical issues', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(168, 2, 163, 'Personal conflict', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(169, 0, 53, 'Profile ', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(170, 0, 0, 'Buyer Persona', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(171, 0, 170, 'Looker', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(172, 0, 170, 'Bargain hunter', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(173, 0, 170, 'Impulsive buyer', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(174, 0, 170, 'Need-based customer', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(175, 0, 170, 'New Customer', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(176, 0, 170, 'Dissatisfied customer', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(177, 0, 170, 'Loyal customer', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(178, 0, 0, 'Social Style Model', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(179, 0, 171, 'Analytical ', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(180, 0, 171, 'Driver ', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(181, 0, 171, 'Amiable ', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(182, 0, 171, 'Expressive ', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(183, 0, 0, 'Beds(SaleSpecs-Minumum of Bed)', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(184, 0, 183, '1+1', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(185, 0, 0, 'Finance', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(186, 0, 0, 'Currency', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(187, 0, 185, 'Finances in Place', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(188, 0, 185, 'All cash payment', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(189, 0, 185, 'Ready to buy now', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(190, 0, 185, 'Decision maker is present', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(191, 0, 183, '1+2', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(192, 0, 183, '1+3', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(193, 0, 183, '1+4', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(194, 0, 186, 'fas-dollar', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(195, 0, 186, 'fas-euro', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(196, 0, 186, 'fas-try', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(197, 0, 186, 'fas-lira-sign', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(198, 0, 0, 'Payment Type', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(199, 0, 198, 'Installment', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(200, 0, 198, 'Cash', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(201, 0, 61, 'Empathy1', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(202, 0, 61, 'Empathy2', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(203, 0, 61, 'Emphaty3', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1),
(204, 0, 61, 'Emphaty4', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"0\"}', 99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `source_id` int(11) DEFAULT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_phone` varchar(255) DEFAULT NULL,
  `client_mobile` varchar(255) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `client_address` varchar(255) DEFAULT NULL,
  `client_nationality` varchar(255) DEFAULT NULL,
  `client_configs` text DEFAULT NULL,
  `adrs_country` int(11) DEFAULT NULL,
  `adrs_city` int(11) DEFAULT NULL,
  `adrs_region` int(11) DEFAULT NULL,
  `stat_created` datetime NOT NULL,
  `rec_state` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `source_id`, `client_name`, `client_phone`, `client_mobile`, `client_email`, `client_address`, `client_nationality`, `client_configs`, `adrs_country`, `adrs_city`, `adrs_region`, `stat_created`, `rec_state`) VALUES
(1, 123, 'Lara Alev', '', '+90 533 679 9721', 'laraalev01@gmail.com', '123 Main St.', 'Turkey', '', 1, 8, 10, '2023-09-22 10:57:07', 1),
(2, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(3, NULL, 'Osama Qassar', '', '+90 555 555 5555', 'osama@gmail.com', '125 Main St.', 'Syrian', '', 1, 8, 10, '2023-09-22 11:12:12', 1),
(53, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(54, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(55, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(56, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(57, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(58, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(59, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(60, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(61, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(62, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(63, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(64, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(65, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(66, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(67, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(68, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(69, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(70, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(71, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(72, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(73, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(74, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(75, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(76, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(77, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(78, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(79, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(80, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(81, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(82, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(83, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(84, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(85, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(86, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(87, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(88, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(89, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(90, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(91, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(92, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(93, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(94, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(95, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(96, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(97, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(98, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(99, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(100, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(101, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(102, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(103, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(104, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(105, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(106, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(107, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(108, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(109, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(110, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(111, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(112, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(113, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(114, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(115, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(116, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(117, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(118, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(119, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(120, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(121, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(122, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(123, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(124, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(125, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(126, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(127, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(128, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(129, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(130, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(131, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(132, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(133, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(134, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(135, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(136, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(137, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(138, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(139, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(140, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(141, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(142, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(143, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(144, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(145, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(146, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(147, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(148, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(149, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(150, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(151, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(152, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(153, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(154, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(155, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(156, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(157, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(158, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(159, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(160, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(161, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(162, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(163, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(164, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(165, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(166, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(167, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(168, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(169, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(170, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(171, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(172, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(173, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(174, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(175, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(176, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(177, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(178, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1),
(179, 131, 'Ahmed Aktaaa', '', '+90 539 571 73 36', 'amd@gmail.com', '124 Main St.', 'Syrian', '', 2, 8, 10, '2023-09-22 11:09:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` int(11) NOT NULL,
  `config_key` varchar(255) NOT NULL,
  `config_value` text DEFAULT NULL,
  `stat_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `langauge_id` int(11) NOT NULL DEFAULT 1,
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `country_configs` varchar(255) DEFAULT NULL,
  `rec_state` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquires`
--

CREATE TABLE `enquires` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `enquiry_message` varchar(255) NOT NULL,
  `enquiry_ipaddress` varchar(255) DEFAULT NULL,
  `enquiry_lastpage` varchar(255) DEFAULT NULL,
  `seo_keywords` varchar(255) NOT NULL,
  `seo_host` int(11) NOT NULL,
  `isindex` tinyint(4) NOT NULL DEFAULT 0,
  `stat_created` datetime NOT NULL DEFAULT current_timestamp(),
  `stat_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `log_url` varchar(255) NOT NULL COMMENT 'Ex: ["","","","","http//:localhost/ptpms/admin/offices/save/7","Offices","save","7"]',
  `log_changes` mediumtext DEFAULT NULL COMMENT 'Ex: [{"before":null}, {"after":"new val"}]',
  `stat_created` datetime NOT NULL DEFAULT current_timestamp(),
  `rec_state` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=unread, 2=read'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `log_url`, `log_changes`, `stat_created`, `rec_state`) VALUES
(1, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-09-25 08:10:46', 1),
(2, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/-1\",\"Clients\",\"save_new\",\"-1\"]', '[{\"id\":-1}]', '2023-09-25 08:43:45', 1),
(3, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-09-29 10:50:51', 1),
(4, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-09-27 08:34:36', 1),
(5, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/-1\",\"Clients\",\"save_new\",\"-1\"]', '[{\"id\":-1}]', '2023-09-27 14:20:35', 1),
(6, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/-1\",\"Clients\",\"save_new\",\"-1\"]', '[{\"id\":-1}]', '2023-09-27 14:24:06', 1),
(7, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/-1\",\"Clients\",\"save_new\",\"-1\"]', '[{\"id\":-1}]', '2023-09-27 14:41:43', 1),
(8, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/-1\",\"Clients\",\"save_new\",\"-1\"]', '[{\"id\":-1}]', '2023-09-27 14:42:06', 1),
(9, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/-1\",\"Clients\",\"save_new\",\"-1\"]', '[{\"id\":-1}]', '2023-09-27 14:42:18', 1),
(10, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/-1\",\"Clients\",\"save_new\",\"-1\"]', '[{\"id\":-1}]', '2023-09-27 15:05:27', 1),
(11, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/-1\",\"Clients\",\"save_new\",\"-1\"]', '[{\"id\":-1}]', '2023-09-27 15:07:57', 1),
(12, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/-1\",\"Clients\",\"save_new\",\"-1\"]', '[{\"id\":-1}]', '2023-09-27 15:09:59', 1),
(13, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-09-28 08:05:19', 1),
(14, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/-1\",\"Clients\",\"save_new\",\"-1\"]', '[{\"id\":-1}]', '2023-09-28 09:48:44', 1),
(15, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/-1\",\"Clients\",\"save_new\",\"-1\"]', '[{\"id\":-1}]', '2023-09-28 10:02:13', 1),
(16, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/-1\",\"Clients\",\"save_new\",\"-1\"]', '[{\"id\":-1}]', '2023-09-28 10:02:31', 1),
(17, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/2\",\"Clients\",\"update\",\"2\"]', '[{\"reports\":\"object\"}, {\"reports\":\"object\"}]', '2023-09-28 10:30:37', 1),
(18, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/2\",\"Clients\",\"update\",\"2\"]', '[{\"reports\":\"object\"}, {\"reports\":\"object\"}]', '2023-09-28 10:32:02', 1),
(19, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/2\",\"Clients\",\"update\",\"2\"]', '[{\"client_mobile\":\"+90 539 571 73 36\",\"reports\":\"object\"}, {\"client_mobile\":\"+90 539 571 444473 36\",\"reports\":\"object\"}]', '2023-09-28 10:32:29', 1),
(20, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/2\",\"Clients\",\"update\",\"2\"]', '[{\"reports\":\"object\"}, {\"reports\":\"object\"}]', '2023-09-28 10:57:58', 1),
(21, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/2\",\"Clients\",\"update\",\"2\"]', '[{\"source_id\":123,\"reports\":\"object\"}, {\"source_id\":\"36\",\"reports\":\"object\"}]', '2023-09-28 11:04:14', 1),
(22, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/2\",\"Clients\",\"update\",\"2\"]', '[{\"adrs_country\":1,\"reports\":\"object\"}, {\"adrs_country\":\"2\",\"reports\":\"object\"}]', '2023-09-28 11:05:32', 1),
(23, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/2\",\"Clients\",\"update\",\"2\"]', '[{\"client_email\":\"ahmed@gmail.com\",\"reports\":\"object\"}, {\"client_email\":\"amd@gmail.com\",\"reports\":\"object\"}]', '2023-09-28 11:06:13', 1),
(24, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/2\",\"Clients\",\"update\",\"2\"]', '[{\"source_id\":36,\"reports\":\"object\"}, {\"source_id\":\"131\",\"reports\":\"object\"}]', '2023-09-28 11:18:15', 1),
(25, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/2\",\"Clients\",\"update\",\"2\"]', '[{\"client_name\":\"Ahmed Akta\",\"reports\":\"object\"}, {\"client_name\":\"Ahmed Aktaaa\",\"reports\":\"object\"}]', '2023-09-28 12:22:15', 1),
(26, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/clients/save/2\",\"Clients\",\"update\",\"2\"]', '[{\"client_mobile\":\"+90 539 571 444473 36\",\"reports\":\"object\"}, {\"client_mobile\":\"+90 539 571 73 36\",\"reports\":\"object\"}]', '2023-09-28 13:56:35', 1),
(27, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-02 12:28:36', 1),
(28, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-03 07:40:19', 1),
(29, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":24}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"1\",\"id\":\"138\"}]', '2023-10-03 09:05:38', 1),
(30, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":25}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"1\",\"id\":\"138\"}]', '2023-10-03 09:05:57', 1),
(31, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":26}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"1\",\"id\":\"138\"}]', '2023-10-03 09:06:05', 1),
(32, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":27}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"1\",\"id\":\"138\"}]', '2023-10-03 09:06:14', 1),
(33, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":28}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"1\",\"id\":\"138\"}]', '2023-10-03 09:06:26', 1),
(34, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":29}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"1\",\"id\":\"138\"}]', '2023-10-03 09:06:37', 1),
(35, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":30}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"1\",\"id\":\"138\"}]', '2023-10-03 09:07:14', 1),
(36, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":31}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"1\",\"id\":\"138\"}]', '2023-10-03 09:07:29', 1),
(37, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":32}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"1\",\"id\":\"138\"}]', '2023-10-03 09:07:46', 1),
(38, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":33}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":2,\"id\":\"138\"}]', '2023-10-03 09:29:29', 1),
(39, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":34}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-03 09:34:20', 1),
(40, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":35}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-03 09:36:00', 1),
(41, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":36}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-03 09:36:28', 1),
(42, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":37}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-03 09:37:07', 1),
(43, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":38}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-03 09:37:09', 1),
(44, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":39}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-03 09:37:45', 1),
(45, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":40}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-03 09:38:03', 1),
(46, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":41}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-03 09:38:27', 1),
(47, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":42}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-03 09:38:54', 1),
(48, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":43}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-03 09:39:07', 1),
(49, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":44}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-03 09:58:10', 1),
(50, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":45}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-03 09:58:30', 1),
(51, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":46}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-03 09:58:44', 1),
(52, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":47}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-03 10:04:49', 1),
(53, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":48}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-03 10:05:07', 1),
(54, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-03 14:27:05', 1),
(55, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":49}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-03 14:32:32', 1),
(56, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":50}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-03 15:09:40', 1),
(57, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 07:44:57', 1),
(58, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":51}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 07:48:41', 1),
(59, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":52}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 07:49:02', 1),
(60, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":53}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 07:49:27', 1),
(61, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 08:05:01', 1),
(62, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 08:09:02', 1),
(63, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 08:10:33', 1),
(64, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 08:11:09', 1),
(65, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 08:29:23', 1),
(66, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 08:32:18', 1),
(67, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 08:33:05', 1),
(68, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 08:45:26', 1),
(69, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 08:51:23', 1),
(70, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 08:53:04', 1),
(71, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 08:53:56', 1),
(72, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 08:54:57', 1),
(73, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 09:38:16', 1),
(74, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 09:39:16', 1),
(75, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 09:39:41', 1),
(76, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 09:40:12', 1),
(77, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 09:50:03', 1),
(78, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-04 09:52:28', 1),
(79, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":54}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 09:58:52', 1),
(80, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":55}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:36:03', 1),
(81, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":56}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:36:38', 1),
(82, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":57}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:31', 1),
(83, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":58}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:31', 1),
(84, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":59}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:32', 1),
(85, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":60}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:32', 1),
(86, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":61}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:32', 1),
(87, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":62}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:32', 1),
(88, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":63}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:32', 1),
(89, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":64}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:32', 1),
(90, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":65}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:32', 1),
(91, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":66}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:32', 1),
(92, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":67}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:32', 1),
(93, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":68}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:33', 1),
(94, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":69}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:33', 1),
(95, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":70}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:33', 1),
(96, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":71}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:33', 1),
(97, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":72}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:33', 1),
(98, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":73}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:33', 1);
INSERT INTO `logs` (`id`, `user_id`, `log_url`, `log_changes`, `stat_created`, `rec_state`) VALUES
(99, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":74}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:33', 1),
(100, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":75}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:33', 1),
(101, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":76}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:33', 1),
(102, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":77}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:34', 1),
(103, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":78}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:34', 1),
(104, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":79}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:34', 1),
(105, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":80}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:34', 1),
(106, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":81}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:34', 1),
(107, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":82}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:34', 1),
(108, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":83}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:34', 1),
(109, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":84}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:34', 1),
(110, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":85}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:34', 1),
(111, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":86}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:35', 1),
(112, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":87}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:35', 1),
(113, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":88}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:35', 1),
(114, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":89}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:35', 1),
(115, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":90}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:35', 1),
(116, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":91}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:35', 1),
(117, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":92}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:35', 1),
(118, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":93}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:35', 1),
(119, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":94}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:35', 1),
(120, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":95}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:36', 1),
(121, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":96}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:36', 1),
(122, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":97}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:36', 1),
(123, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":98}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:36', 1),
(124, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":99}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:36', 1),
(125, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":100}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:36', 1),
(126, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":101}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:36', 1),
(127, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":102}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:36', 1),
(128, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":103}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:36', 1),
(129, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":104}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:37', 1),
(130, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":105}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:37', 1),
(131, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":106}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:37', 1),
(132, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":107}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:37', 1),
(133, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":108}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:37', 1),
(134, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":109}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:37', 1),
(135, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":110}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:37', 1),
(136, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":111}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:37', 1),
(137, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":112}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:37', 1),
(138, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":113}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:38', 1),
(139, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":114}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:38', 1),
(140, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":115}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:38', 1),
(141, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":116}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:38', 1),
(142, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":117}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:38', 1),
(143, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":118}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:38', 1),
(144, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":119}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:38', 1),
(145, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":120}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:38', 1),
(146, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":121}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:39', 1),
(147, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":122}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:39', 1),
(148, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":123}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:39', 1),
(149, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":124}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:39', 1),
(150, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":125}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:39', 1),
(151, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":126}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:39', 1),
(152, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":127}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:39', 1),
(153, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":128}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:39', 1),
(154, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":129}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:39', 1),
(155, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":130}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:40', 1),
(156, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":131}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:40', 1),
(157, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":132}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:40', 1),
(158, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":133}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:40', 1),
(159, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":134}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:40', 1);
INSERT INTO `logs` (`id`, `user_id`, `log_url`, `log_changes`, `stat_created`, `rec_state`) VALUES
(160, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":135}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:40', 1),
(161, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":136}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:40', 1),
(162, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":137}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:40', 1),
(163, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":138}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:40', 1),
(164, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":139}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:40', 1),
(165, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":140}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:41', 1),
(166, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":141}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:41', 1),
(167, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":142}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:41', 1),
(168, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":143}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:41', 1),
(169, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":144}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:41', 1),
(170, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":145}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:41', 1),
(171, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":146}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:41', 1),
(172, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":147}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:41', 1),
(173, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":148}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:41', 1),
(174, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":149}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:42', 1),
(175, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":150}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:42', 1),
(176, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":151}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:42', 1),
(177, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":152}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:42', 1),
(178, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":153}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:42', 1),
(179, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":154}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:42', 1),
(180, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":155}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:42', 1),
(181, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":156}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:42', 1),
(182, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":157}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:42', 1),
(183, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":158}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:43', 1),
(184, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":159}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:43', 1),
(185, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":160}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:43', 1),
(186, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":161}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:43', 1),
(187, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":162}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:43', 1),
(188, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":163}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:43', 1),
(189, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":164}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:43', 1),
(190, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":165}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:43', 1),
(191, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":166}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:43', 1),
(192, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":167}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:44', 1),
(193, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":168}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:44', 1),
(194, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":169}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:44', 1),
(195, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":170}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:44', 1),
(196, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":171}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:44', 1),
(197, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":172}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:44', 1),
(198, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":173}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:44', 1),
(199, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":174}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:44', 1),
(200, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":175}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:44', 1),
(201, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":176}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:44', 1),
(202, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":177}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:37:53', 1),
(203, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":178}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:41:50', 1),
(204, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/admin/sales/save/138\",\"Sales\",\"update\",\"138\"]', '[{\"source_id\":131,\"client_name\":\"Ahmed Aktaaa\",\"client_phone\":\"\",\"client_mobile\":\"+90 539 571 73 36\",\"client_email\":\"amd@gmail.com\",\"client_address\":\"124 Main St.\",\"client_nationality\":\"Syrian\",\"client_configs\":\"\",\"adrs_country\":2,\"adrs_city\":8,\"adrs_region\":10,\"stat_created\":\"object\",\"rec_state\":1,\"id\":179}, {\"source_id\":\"36\",\"client_name\":\"\",\"client_phone\":\"\",\"client_mobile\":\"\",\"client_email\":\"\",\"client_address\":\"\",\"client_nationality\":\"\",\"client_configs\":\"\",\"adrs_country\":\"\",\"adrs_city\":\"\",\"adrs_region\":\"\",\"stat_created\":\"2023-09-08 07:45:46\",\"rec_state\":\"2\",\"id\":\"138\"}]', '2023-10-04 12:42:51', 1),
(205, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-05 07:13:05', 1),
(206, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-05 09:48:44', 1),
(207, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-05 09:52:27', 1),
(208, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-05 09:52:42', 1),
(209, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-05 09:59:30', 1),
(210, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-05 10:00:01', 1),
(211, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-05 10:00:57', 1),
(212, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-05 10:02:35', 1),
(213, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-05 10:04:24', 1),
(214, 1, '[\"\",\"\",\"\",\"\",\"http//:localhost/crm/login\",\"Users\",\"login\",\"\"]', '[{\"user_fullname\":\"admin\",\"user_role\":\"admin.root\"}]', '2023-10-05 10:16:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `offer_desc` text DEFAULT NULL,
  `stat_created` datetime NOT NULL DEFAULT current_timestamp(),
  `stat_updated` datetime DEFAULT NULL,
  `isinterested` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `sale_id`, `property_id`, `offer_desc`, `stat_created`, `stat_updated`, `isinterested`) VALUES
(1, 138, 12, 'Lorem impus lorem impusfsdfgsagdsdfafasdgsadfg', '2023-09-25 14:12:43', NULL, 1),
(2, 138, 11, 'sdflksalkdfhjlsşadhbvjs bvjshdf jshfdsdajdafhs dfsdjfhsadjfh ', '2023-09-25 14:23:21', NULL, 1),
(3, 138, 4325345, 'xgfxzcvxzcv', '2023-10-03 10:08:31', NULL, 1),
(6, 138, 2147483647, 'sdafsadfsadfsdaf', '2023-10-03 10:11:43', NULL, 1),
(7, 138, 234234234, 'sdafsadfsdfsdf111111111', '2023-10-03 13:17:09', NULL, 0),
(8, 138, 324234324, 'dfsagdfsgfdgfdsg', '2023-10-03 13:17:46', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission_role` varchar(255) NOT NULL DEFAULT 'admin.root',
  `permission_module` varchar(255) NOT NULL COMMENT ' target table (leads, clients, etc) ',
  `permission_c` tinyint(4) NOT NULL DEFAULT 0,
  `permission_r` tinyint(4) NOT NULL DEFAULT 0,
  `permission_u` tinyint(4) NOT NULL DEFAULT 0,
  `permission_d` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `reminder_nextcall` datetime NOT NULL,
  `reminder_desc` text NOT NULL,
  `stat_created` datetime NOT NULL DEFAULT current_timestamp(),
  `stat_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tar_id` int(11) NOT NULL COMMENT 'target id (record id)',
  `tar_tbl` varchar(255) NOT NULL COMMENT 'target table (leads, clients, book, etc)',
  `status_id` int(11) NOT NULL COMMENT 'isNew, isCalled, isSpoken, isMessaged, isWhatsapped, noSale, cancelled, etc..',
  `report_type` int(11) DEFAULT NULL COMMENT 'category.id empathy, Ideal prospects, etc',
  `report_priority` tinyint(4) NOT NULL DEFAULT 5 COMMENT '1=top, 5=normal, 10=last',
  `report_text` text NOT NULL,
  `iscalled` tinyint(4) NOT NULL DEFAULT 0,
  `isspoken` tinyint(4) NOT NULL DEFAULT 0,
  `stat_created` datetime NOT NULL,
  `rec_state` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `tar_id`, `tar_tbl`, `status_id`, `report_type`, `report_priority`, `report_text`, `iscalled`, `isspoken`, `stat_created`, `rec_state`) VALUES
(1, 1, 138, 'Sales', 1, 60, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing o laboris nisi ut aliquip ex ea commodo consequat. voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 0, 0, '2023-09-25 14:36:07', 1),
(2, 1, 138, 'Sales', 1, 204, 5, 'text for verbal expressions lorem ipsum text text some texts', 0, 0, '2023-09-25 15:45:35', 1),
(3, 1, 138, 'Sales', 2, 169, 5, 'Report for client profile...', 0, 0, '2023-09-27 11:29:17', 1),
(4, 0, 138, 'Sales', 62, 60, 5, 'dsfdsfsdfsdf121212', 0, 0, '2023-09-28 14:20:50', 1),
(5, 0, 138, 'Sales', 76, 169, 5, 'noten oesrjfkhsdkjfkjsdhfkj', 0, 0, '2023-09-28 14:22:56', 1),
(7, 0, 138, 'Sales', 1, 203, 5, 'sdkkfjksdajfklsdajfksadjflşksadf', 0, 0, '2023-10-02 17:12:54', 1),
(8, 1, 138, 'Sales', 1, 202, 5, 'Text text lalalala', 0, 0, '2023-10-02 17:48:00', 1),
(9, 1, 138, 'Sales', 10, 201, 5, 'FALALALALALAL', 0, 0, '2023-10-02 17:48:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `reservation_amount` int(11) NOT NULL COMMENT 'just to hold the property (its cancellable) ',
  `reservation_price` int(11) DEFAULT NULL,
  `reservation_currency` tinyint(4) DEFAULT NULL,
  `reservation_usdprice` int(11) DEFAULT NULL,
  `reservation_paytype` int(11) DEFAULT NULL COMMENT 'installment, cash, etc',
  `reservation_downpayment_date` datetime DEFAULT NULL,
  `reservation_downpayment` int(11) DEFAULT NULL,
  `reservation_isinvoice_sent` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=not, 1=yes',
  `reservation_invoice_date` datetime DEFAULT NULL,
  `reservation_comission` int(11) NOT NULL,
  `reservation_usdcomission` int(11) NOT NULL,
  `stat_created` datetime NOT NULL,
  `stat_updated` datetime DEFAULT NULL,
  `rec_state` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `sale_id`, `reservation_amount`, `reservation_price`, `reservation_currency`, `reservation_usdprice`, `reservation_paytype`, `reservation_downpayment_date`, `reservation_downpayment`, `reservation_isinvoice_sent`, `reservation_invoice_date`, `reservation_comission`, `reservation_usdcomission`, `stat_created`, `stat_updated`, `rec_state`) VALUES
(1, 138, 100000, 10000, NULL, NULL, 200, '2023-09-21 13:02:53', 5003330, 0, NULL, 23, 23, '2023-09-26 11:48:28', NULL, 1),
(2, 0, 0, NULL, NULL, NULL, 199, NULL, NULL, 0, NULL, 0, 0, '2023-10-03 10:31:39', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `source_id` int(11) DEFAULT NULL COMMENT 'socialmedia, website, etc',
  `category_id` int(11) DEFAULT NULL COMMENT 'invest, second hand, life style, etc',
  `pool_id` int(11) DEFAULT NULL COMMENT 'Russian, Farsi, etc.',
  `sale_priority` tinyint(4) DEFAULT 5 COMMENT '1=top, 10=last',
  `sale_finance` int(11) DEFAULT NULL,
  `sale_current_stage` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=source, 2=cc supervisor, 3=cc, 4=field supervisor, 5=field, 6=accountant, 7=aftersale',
  `sale_tags` text DEFAULT NULL,
  `sale_budget` int(11) DEFAULT NULL,
  `sale_commission` int(11) DEFAULT NULL,
  `sale_units` int(11) DEFAULT NULL,
  `sale_shared_roles` varchar(255) DEFAULT NULL,
  `stat_created` datetime NOT NULL,
  `stat_updated` timestamp NULL DEFAULT NULL,
  `rec_state` tinyint(4) NOT NULL DEFAULT 1 COMMENT '2=[1=new, 2=nosale(archived)], \r\n3=[1=new, 2=ongoing, 3=nosale],\r\n4=[1=new, 2=nosale],\r\n5=[1=new, 2=ongoing, 3=nosale],\r\n6=[1=new, 2=deposit, 3=invoiced, 4=commission collected]\r\n7=[1=new, 2=ongoing]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `client_id`, `source_id`, `category_id`, `pool_id`, `sale_priority`, `sale_finance`, `sale_current_stage`, `sale_tags`, `sale_budget`, `sale_commission`, `sale_units`, `sale_shared_roles`, `stat_created`, `stat_updated`, `rec_state`) VALUES
(131, 1, 36, 46, 146, 10, 190, 2, '[{\"text\":\"tag2\",\"value\":\"114\"},{\"text\":\"Osamna34\",\"value\":\"41\"}]', 100000, NULL, NULL, NULL, '2023-09-01 13:51:51', NULL, 1),
(132, 1, 123, 46, 145, 10, 187, 2, '[{\"text\":\"tag2\",\"value\":\"114\"},{\"text\":\"Osamna34\",\"value\":\"41\"}]', 100000, NULL, NULL, NULL, '2023-09-01 13:55:17', NULL, 1),
(133, 2, 131, 46, 145, 10, 188, 2, '[{\"text\":\"tag2\",\"value\":\"114\"},{\"text\":\"Osamna34\",\"value\":\"41\"},{\"text\":\"Tag1\",\"value\":\"157\"},{\"text\":\"Tag3\",\"value\":\"158\"}]', 100000, NULL, NULL, NULL, '2023-09-01 13:55:37', NULL, 1),
(134, 3, 34, 81, 48, 5, 190, 2, '[{\"text\":\"tag2\",\"value\":\"114\"}]', 1212, NULL, NULL, NULL, '2023-09-04 08:07:12', NULL, 1),
(136, 3, 131, 46, 48, 10, 188, 4, '[{\"text\":\"tag2\",\"value\":\"114\"},{\"text\":\"Osamna34\",\"value\":\"41\"},{\"text\":\"Tag1\",\"value\":\"157\"}]', 500000, NULL, NULL, NULL, '2023-09-06 13:03:48', NULL, 1),
(137, 1, 123, 46, 145, 10, 187, 3, '[{\"text\":\"Tag1\",\"value\":\"157\"},{\"text\":\"Tag3\",\"value\":\"158\"}]', 22222222, NULL, NULL, NULL, '2023-09-07 09:25:54', NULL, 1),
(138, 179, 36, 46, 145, 4, 189, 2, '[{\"text\":\"Tag1\",\"value\":\"157\"},{\"text\":\"Tag3\",\"value\":\"158\"}]', 5234234, NULL, NULL, NULL, '2023-09-08 07:45:46', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sale_specs`
--

CREATE TABLE `sale_specs` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `salespec_current_location` varchar(255) DEFAULT NULL COMMENT 'where the client exist currently ',
  `salespec_propertytype` varchar(255) DEFAULT NULL COMMENT 'villa, apartment, etc',
  `salespec_currency` int(11) DEFAULT NULL,
  `salespec_buyerpersona` int(11) DEFAULT NULL,
  `salespec_socialstyle` int(11) DEFAULT NULL,
  `salespec_beds` varchar(255) DEFAULT NULL COMMENT 'number if rooms',
  `salespec_loction_target` varchar(255) DEFAULT NULL COMMENT 'sisli, asian side, etc',
  `salespec_isowner` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'is decision maker',
  `salespec_isready` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'is ready to buy',
  `salespec_saved` tinyint(4) DEFAULT NULL,
  `salespec_configs` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_specs`
--

INSERT INTO `sale_specs` (`id`, `sale_id`, `salespec_current_location`, `salespec_propertytype`, `salespec_currency`, `salespec_buyerpersona`, `salespec_socialstyle`, `salespec_beds`, `salespec_loction_target`, `salespec_isowner`, `salespec_isready`, `salespec_saved`, `salespec_configs`) VALUES
(2, 138, 'sdfsdf', '[{\"text\":\"Villa\",\"value\":\"160\"},{\"text\":\"Apartment\",\"value\":\"161\"}]', 194, 171, 181, '[{\"text\":\"1+1\",\"value\":\"184\"},{\"text\":\"1+4\",\"value\":\"193\"},{\"text\":\"1+3\",\"value\":\"192\"}]', 'Western', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_token` varchar(255) DEFAULT NULL,
  `user_configs` varchar(255) NOT NULL DEFAULT '{"mobile":"", "address":""}',
  `stat_lastlogin` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stat_created` datetime NOT NULL,
  `stat_logins` int(11) NOT NULL DEFAULT 0,
  `stat_ip` varchar(255) DEFAULT NULL,
  `rec_state` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_fullname`, `email`, `password`, `user_role`, `user_token`, `user_configs`, `stat_lastlogin`, `stat_created`, `stat_logins`, `stat_ip`, `rec_state`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$iLiy64VgN.bXPhnXY.HhPe7FZ8nO9akhwLhgWNTYm2T4zbmWjSwKu', 'admin.root', '1', '', '2023-10-05 10:16:37', '2021-06-28 11:16:18', 141, '::1', 1),
(5, 'Lara Alev', 'laralev84@gmail.com', '$2y$10$1Fbjh.eUyOcWPOb2Au6Jk./2Y7dRWL0F4Ulp3GvvBIO5rAikR2Ys6', 'admin.root', NULL, '{\"mobile\":\"5666544545\"}', '2023-09-11 12:37:27', '2023-09-07 09:50:07', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_sale`
--

CREATE TABLE `user_sale` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `user_lead_configs` text DEFAULT NULL,
  `stat_created` datetime DEFAULT NULL,
  `rec_state` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=not active, 1=active, 2=pass to another stage'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sale`
--

INSERT INTO `user_sale` (`id`, `user_id`, `lead_id`, `user_lead_configs`, `stat_created`, `rec_state`) VALUES
(1, 1, 138, NULL, '2023-10-02 16:04:29', 1),
(2, 0, 138, NULL, '2023-10-03 10:00:48', 1),
(3, 1, 138, NULL, '2023-10-03 10:00:55', 1),
(4, 1, 138, NULL, '2023-10-03 10:01:19', 1),
(5, 5, 138, NULL, '2023-10-03 10:01:51', 1),
(6, 1, 138, NULL, '2023-10-03 10:02:08', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquires`
--
ALTER TABLE `enquires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_specs`
--
ALTER TABLE `sale_specs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sale`
--
ALTER TABLE `user_sale`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=417;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquires`
--
ALTER TABLE `enquires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `sale_specs`
--
ALTER TABLE `sale_specs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sale`
--
ALTER TABLE `user_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
