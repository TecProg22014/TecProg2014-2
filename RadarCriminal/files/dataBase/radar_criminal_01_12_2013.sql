-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 01/12/2013 às 22h25min
-- Versão do Servidor: 5.5.16
-- Versão do PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `radar_criminal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=54 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome_categoria`) VALUES
(1, 'Criminalidade'),
(2, 'AÃ§Ã£o Policial'),
(3, 'TrÃ¢nsito'),
(52, 'teste'),
(53, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `crime`
--

CREATE TABLE IF NOT EXISTS `crime` (
  `id_crime` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tempo_id_tempo` int(10) unsigned NOT NULL,
  `natureza_id_natureza` int(10) unsigned NOT NULL,
  `quantidade` int(10) unsigned DEFAULT NULL,
  `regiao_administrativa_id_regiao_administrativa` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_crime`),
  KEY `crime_FKIndex1` (`natureza_id_natureza`),
  KEY `crime_FKIndex4` (`tempo_id_tempo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=478 ;

--
-- Extraindo dados da tabela `crime`
--

INSERT INTO `crime` (`id_crime`, `tempo_id_tempo`, `natureza_id_natureza`, `quantidade`, `regiao_administrativa_id_regiao_administrativa`) VALUES
(1, 1, 1, 540, 32),
(2, 2, 1, 497, 32),
(3, 3, 1, 586, 32),
(4, 4, 1, 553, 32),
(5, 5, 1, 512, 32),
(6, 6, 1, 539, 32),
(7, 7, 1, 567, 32),
(8, 8, 1, 651, 32),
(9, 9, 1, 756, 32),
(10, 10, 1, 638, 32),
(11, 11, 1, 722, 32),
(12, 1, 2, 821, 32),
(13, 2, 2, 789, 32),
(14, 3, 2, 801, 32),
(15, 4, 2, 873, 32),
(16, 5, 2, 790, 32),
(17, 6, 2, 890, 32),
(18, 7, 2, 911, 32),
(19, 8, 2, 1002, 32),
(20, 9, 2, 1114, 32),
(21, 10, 2, 1018, 32),
(22, 11, 2, 1191, 32),
(23, 1, 3, 12230, 32),
(24, 2, 3, 13191, 32),
(25, 3, 3, 12592, 32),
(26, 4, 3, 12619, 32),
(27, 5, 3, 13715, 32),
(28, 6, 3, 13176, 32),
(29, 7, 3, 11544, 32),
(30, 8, 3, 10847, 32),
(31, 9, 3, 11053, 32),
(32, 10, 3, 10838, 32),
(33, 11, 3, 10081, 32),
(34, 1, 4, 84, 32),
(35, 2, 4, 52, 32),
(36, 3, 4, 69, 32),
(37, 4, 4, 62, 32),
(38, 5, 4, 51, 32),
(39, 6, 4, 55, 32),
(40, 7, 4, 49, 32),
(41, 8, 4, 60, 32),
(42, 9, 4, 52, 32),
(43, 10, 4, 42, 32),
(44, 11, 4, 49, 32),
(45, 1, 5, 111, 32),
(46, 2, 5, 115, 32),
(47, 3, 5, 163, 32),
(48, 4, 5, 148, 32),
(49, 5, 5, 147, 32),
(50, 6, 5, 176, 32),
(51, 7, 5, 166, 32),
(52, 8, 5, 181, 32),
(53, 9, 5, 195, 32),
(54, 10, 5, 170, 32),
(55, 11, 5, 190, 32),
(56, 1, 6, 89, 32),
(57, 2, 6, 91, 32),
(58, 3, 6, 236, 32),
(59, 4, 6, 409, 32),
(60, 5, 6, 411, 32),
(61, 6, 6, 378, 32),
(62, 7, 6, 410, 32),
(63, 8, 6, 533, 32),
(64, 9, 6, 618, 32),
(65, 10, 6, 504, 32),
(66, 11, 6, 675, 32),
(67, 1, 7, 95, 32),
(68, 2, 7, 62, 32),
(69, 3, 7, 107, 32),
(70, 4, 7, 116, 32),
(71, 5, 7, 82, 32),
(72, 6, 7, 68, 32),
(73, 7, 7, 46, 32),
(74, 8, 7, 60, 32),
(75, 9, 7, 48, 32),
(76, 10, 7, 30, 32),
(77, 11, 7, 22, 32),
(78, 1, 8, 35, 32),
(79, 2, 8, 32, 32),
(80, 3, 8, 21, 32),
(81, 4, 8, 49, 32),
(82, 5, 8, 32, 32),
(83, 6, 8, 9, 32),
(84, 7, 8, 5, 32),
(85, 8, 8, 1, 32),
(86, 9, 8, 11, 32),
(87, 10, 8, 16, 32),
(88, 11, 8, 12, 32),
(89, 1, 9, 1443, 32),
(90, 2, 9, 1145, 32),
(91, 3, 9, 1215, 32),
(92, 4, 9, 1135, 32),
(93, 5, 9, 648, 32),
(94, 6, 9, 581, 32),
(95, 7, 9, 613, 32),
(96, 8, 9, 1076, 32),
(97, 9, 9, 1599, 32),
(98, 10, 9, 1453, 32),
(99, 11, 9, 1164, 32),
(100, 1, 10, 357, 32),
(101, 2, 10, 223, 32),
(102, 3, 10, 401, 32),
(103, 4, 10, 474, 32),
(104, 5, 10, 513, 32),
(105, 6, 10, 536, 32),
(106, 7, 10, 356, 32),
(107, 8, 10, 284, 32),
(108, 9, 10, 0, 32),
(109, 10, 10, 0, 32),
(110, 11, 10, 0, 32),
(111, 1, 11, 18, 32),
(112, 2, 11, 5, 32),
(113, 3, 11, 16, 32),
(114, 4, 11, 4, 32),
(115, 5, 11, 3, 32),
(116, 6, 11, 1, 32),
(117, 7, 11, 1, 32),
(118, 8, 11, 0, 32),
(119, 9, 11, 7, 32),
(120, 10, 11, 1, 32),
(121, 11, 11, 0, 32),
(122, 1, 12, 31, 32),
(123, 2, 12, 33, 32),
(124, 3, 12, 32, 32),
(125, 4, 12, 28, 32),
(126, 5, 12, 16, 32),
(127, 6, 12, 15, 32),
(128, 7, 12, 5, 32),
(129, 8, 12, 9, 32),
(130, 9, 12, 27, 32),
(131, 10, 12, 27, 32),
(132, 11, 12, 6, 32),
(133, 1, 13, 1803, 32),
(134, 2, 13, 1799, 32),
(135, 3, 13, 2030, 32),
(136, 4, 13, 1926, 32),
(137, 5, 13, 1617, 32),
(138, 6, 13, 1769, 32),
(139, 7, 13, 1922, 32),
(140, 8, 13, 2490, 32),
(141, 9, 13, 2375, 32),
(142, 10, 13, 2036, 32),
(143, 11, 13, 2016, 32),
(144, 1, 14, 455, 32),
(145, 2, 14, 461, 32),
(146, 3, 14, 553, 32),
(147, 4, 14, 592, 32),
(148, 5, 14, 607, 32),
(149, 6, 14, 526, 32),
(150, 7, 14, 418, 32),
(151, 8, 14, 410, 32),
(152, 9, 14, 581, 32),
(153, 10, 14, 429, 32),
(154, 11, 14, 350, 32),
(155, 1, 15, 340, 32),
(156, 2, 15, 131, 32),
(157, 3, 15, 182, 32),
(158, 4, 15, 87, 32),
(159, 5, 15, 69, 32),
(160, 6, 15, 56, 32),
(161, 7, 15, 24, 32),
(162, 8, 15, 66, 32),
(163, 9, 15, 72, 32),
(164, 10, 15, 51, 32),
(165, 11, 15, 15, 32),
(166, 1, 16, 1098, 32),
(167, 2, 16, 1015, 32),
(168, 3, 16, 994, 32),
(169, 4, 16, 910, 32),
(170, 5, 16, 437, 32),
(171, 6, 16, 661, 32),
(172, 7, 16, 663, 32),
(173, 8, 16, 907, 32),
(174, 9, 16, 885, 32),
(175, 10, 16, 773, 32),
(176, 11, 16, 761, 32),
(177, 1, 17, 15030, 32),
(178, 2, 17, 17191, 32),
(179, 3, 17, 21804, 32),
(180, 4, 17, 21549, 32),
(181, 5, 17, 20596, 32),
(182, 6, 17, 21692, 32),
(183, 7, 17, 20491, 32),
(184, 8, 17, 21758, 32),
(185, 9, 17, 22714, 32),
(186, 10, 17, 18414, 32),
(187, 11, 17, 16505, 32),
(188, 1, 18, 2038, 32),
(189, 2, 18, 1570, 32),
(190, 3, 18, 1740, 32),
(191, 4, 18, 1859, 32),
(192, 5, 18, 1491, 32),
(193, 6, 18, 1596, 32),
(194, 7, 18, 1574, 32),
(195, 8, 18, 2135, 32),
(196, 9, 18, 2957, 32),
(197, 10, 18, 2854, 32),
(198, 11, 18, 2823, 32),
(199, 1, 19, 6901, 32),
(200, 2, 19, 6341, 32),
(201, 3, 19, 7045, 32),
(202, 4, 19, 7134, 32),
(203, 5, 19, 7046, 32),
(204, 6, 19, 8141, 32),
(205, 7, 19, 7643, 32),
(206, 8, 19, 7979, 32),
(207, 9, 19, 7825, 32),
(208, 10, 19, 6438, 32),
(209, 11, 19, 6162, 32),
(210, 1, 20, 6548, 32),
(211, 2, 20, 6740, 32),
(212, 3, 20, 8329, 32),
(213, 4, 20, 8568, 32),
(214, 5, 20, 9229, 32),
(215, 6, 20, 9534, 32),
(216, 7, 20, 8585, 32),
(217, 8, 20, 8102, 32),
(218, 9, 20, 7645, 32),
(219, 10, 20, 7273, 32),
(220, 11, 20, 6649, 32),
(221, 1, 21, 2319, 32),
(222, 2, 21, 2434, 32),
(223, 3, 21, 2910, 32),
(224, 4, 21, 2938, 32),
(225, 5, 21, 3178, 32),
(226, 6, 21, 3366, 32),
(227, 7, 21, 3508, 32),
(228, 8, 21, 3585, 32),
(229, 9, 21, 3993, 32),
(230, 10, 21, 3408, 32),
(231, 11, 21, 3390, 32),
(232, 1, 22, 12933, 32),
(233, 2, 22, 13418, 32),
(234, 3, 22, 16269, 32),
(235, 4, 22, 15454, 32),
(236, 5, 22, 14215, 32),
(237, 6, 22, 12386, 32),
(238, 7, 22, 10621, 32),
(239, 8, 22, 11559, 32),
(240, 9, 22, 10636, 32),
(241, 10, 22, 10536, 32),
(242, 11, 22, 11128, 32),
(243, 1, 23, 25359, 32),
(244, 2, 23, 32082, 32),
(245, 3, 23, 39436, 32),
(246, 4, 23, 37834, 32),
(247, 5, 23, 36059, 32),
(248, 6, 23, 41432, 32),
(249, 7, 23, 38661, 32),
(250, 8, 23, 36996, 32),
(251, 9, 23, 34792, 32),
(252, 10, 23, 36304, 32),
(253, 11, 23, 38689, 32),
(254, 1, 24, 740, 32),
(255, 2, 24, 687, 32),
(256, 3, 24, 590, 32),
(257, 4, 24, 516, 32),
(258, 5, 24, 605, 32),
(259, 6, 24, 529, 32),
(260, 7, 24, 537, 32),
(261, 8, 24, 504, 32),
(262, 9, 24, 601, 32),
(263, 10, 24, 585, 32),
(264, 11, 24, 739, 32),
(265, 1, 25, 63, 32),
(266, 2, 25, 79, 32),
(267, 3, 25, 59, 32),
(268, 4, 25, 77, 32),
(269, 5, 25, 65, 32),
(270, 6, 25, 65, 32),
(271, 7, 25, 43, 32),
(272, 8, 25, 45, 32),
(273, 9, 25, 41, 32),
(274, 10, 25, 62, 32),
(275, 11, 25, 84, 32),
(276, 1, 26, 665, 32),
(277, 2, 26, 681, 32),
(278, 3, 26, 620, 32),
(279, 4, 26, 685, 32),
(280, 5, 26, 691, 32),
(281, 6, 26, 817, 32),
(282, 7, 26, 1002, 32),
(283, 8, 26, 1022, 32),
(284, 9, 26, 1153, 32),
(285, 10, 26, 1559, 32),
(286, 11, 26, 2077, 32),
(287, 1, 27, 1195, 32),
(288, 2, 27, 1470, 32),
(289, 3, 27, 1361, 32),
(290, 4, 27, 1673, 32),
(291, 5, 27, 1760, 32),
(292, 6, 27, 2175, 32),
(293, 7, 27, 2758, 32),
(294, 8, 27, 2716, 32),
(295, 9, 27, 2968, 32),
(296, 10, 27, 3446, 32),
(297, 11, 27, 4152, 32),
(298, 1, 28, 1550, 32),
(299, 2, 28, 1533, 32),
(300, 3, 28, 1625, 32),
(301, 4, 28, 1674, 32),
(302, 5, 28, 1375, 32),
(303, 6, 28, 1332, 32),
(304, 7, 28, 1205, 32),
(305, 8, 28, 1272, 32),
(306, 9, 28, 1509, 32),
(307, 10, 28, 1366, 32),
(308, 11, 28, 1286, 32),
(309, 1, 29, 5458, 32),
(310, 2, 29, 4807, 32),
(311, 3, 29, 5142, 32),
(312, 4, 29, 5473, 32),
(313, 5, 29, 5111, 32),
(314, 6, 29, 5321, 32),
(315, 7, 29, 5343, 32),
(316, 8, 29, 5650, 32),
(317, 9, 29, 6240, 32),
(318, 10, 29, 5300, 32),
(319, 11, 29, 5046, 32),
(320, 1, 30, 6941, 32),
(321, 2, 30, 7561, 32),
(322, 3, 30, 7665, 32),
(323, 4, 30, 7919, 32),
(324, 5, 30, 8369, 32),
(325, 6, 30, 8659, 32),
(326, 7, 30, 9584, 32),
(327, 8, 30, 9443, 32),
(328, 9, 30, 9203, 32),
(329, 10, 30, 9328, 32),
(330, 11, 30, 8858, 32),
(331, 1, 31, 371, 32),
(332, 2, 31, 393, 32),
(333, 3, 31, 440, 32),
(334, 4, 31, 338, 32),
(335, 5, 31, 357, 32),
(336, 6, 31, 331, 32),
(337, 7, 31, 337, 32),
(338, 8, 31, 341, 32),
(339, 9, 31, 306, 32),
(340, 10, 31, 373, 32),
(341, 11, 31, 350, 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `natureza`
--

CREATE TABLE IF NOT EXISTS `natureza` (
  `id_natureza` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria_id_categoria` int(10) unsigned NOT NULL,
  `natureza` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_natureza`),
  KEY `natureza_FKIndex1` (`categoria_id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=113 ;

--
-- Extraindo dados da tabela `natureza`
--

INSERT INTO `natureza` (`id_natureza`, `categoria_id_categoria`, `natureza`) VALUES
(1, 1, 'HomicÃ­dio'),
(2, 1, 'Tentativa de HomicÃ­dio'),
(3, 1, 'LesÃ£o Corporal'),
(4, 1, 'LatrocÃ­nio'),
(5, 1, 'Tentativa de LatrocÃ­nio'),
(6, 1, 'Roubo RestriÃ§Ã£o de Liberdade'),
(7, 1, 'Roubo com ExtorsÃ£o'),
(8, 1, 'Roubo de Carga'),
(9, 1, 'Roubo em Coletivo'),
(10, 1, 'Roubo Transporte Alternativo'),
(11, 1, 'Roubo a Banco'),
(12, 1, 'Roubo a Casa LotÃ©rica'),
(13, 1, 'Roubo em ComÃ©rcio'),
(14, 1, 'Roubo em ResidÃªncia'),
(15, 1, 'Roubo CaminhÃ£o Bebidas'),
(16, 1, 'Roubo Posto de Gasolina'),
(17, 1, 'Roubo Transeunte'),
(18, 1, 'Roubo de VeÃ­culo'),
(19, 1, 'Furto de VeÃ­culo'),
(20, 1, 'Furto em ResidÃªncia'),
(21, 1, 'Furto em ComÃ©rcio'),
(22, 1, 'Furto em VeÃ­culo'),
(23, 1, 'Furtos Diversos'),
(24, 1, 'Estupro'),
(25, 1, 'Tentativa de Estupro'),
(26, 2, 'TrÃ¡fico de Drogas'),
(27, 2, 'Uso e Porte de Drogas'),
(28, 2, 'Porte de Arma'),
(29, 2, 'LocalizaÃ§Ã£o de VeÃ­culo'),
(30, 3, 'LesÃ£o Corporal Culposa'),
(31, 3, 'HomicÃ­dio Culposo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `regiao_administrativa`
--

CREATE TABLE IF NOT EXISTS `regiao_administrativa` (
  `id_regiao_administrativa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_regiao_administrativa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tempo`
--

CREATE TABLE IF NOT EXISTS `tempo` (
  `id_tempo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intervalo` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_tempo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=33 ;

--
-- Extraindo dados da tabela `tempo`
--

INSERT INTO `tempo` (`id_tempo`, `intervalo`) VALUES
(1, 2001),
(2, 2002),
(3, 2003),
(4, 2004),
(5, 2005),
(6, 2006),
(7, 2007),
(8, 2008),
(9, 2009),
(10, 2010),
(11, 2011);

-- --------------------------------------------------------

--
-- Estrutura stand-in para visualizar `totalgeralcrimes`
--
CREATE TABLE IF NOT EXISTS `totalgeralcrimes` (
`total` decimal(32,0)
);
-- --------------------------------------------------------

--
-- Estrutura para visualizar `totalgeralcrimes`
--
DROP TABLE IF EXISTS `totalgeralcrimes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalgeralcrimes` AS select sum(`c`.`quantidade`) AS `total` from (`crime` `c` join `natureza` `n`) where ((`c`.`natureza_id_natureza` = `n`.`id_natureza`) and (`n`.`id_natureza` = 1)) union select sum(`c`.`quantidade`) AS `total` from (`crime` `c` join `natureza` `n`) where (`c`.`natureza_id_natureza` = (`n`.`id_natureza` between 1 and 3)) union select sum(`c`.`quantidade`) AS `total` from (`crime` `c` join `natureza` `n`) where ((`c`.`natureza_id_natureza` = `n`.`id_natureza`) = (`n`.`id_natureza` between 6 and 18)) union select sum(`c`.`quantidade`) AS `total` from (`crime` `c` join `natureza` `n`) where ((`c`.`natureza_id_natureza` = `n`.`id_natureza`) and (`n`.`id_natureza` between 19 and 23)) union select sum(`c`.`quantidade`) AS `total` from (`crime` `c` join `natureza` `n`) where ((`c`.`natureza_id_natureza` = `n`.`id_natureza`) and (`n`.`id_natureza` = 3)) union select sum(`c`.`quantidade`) AS `total` from (`crime` `c` join `natureza` `n`) where ((`c`.`natureza_id_natureza` = `n`.`id_natureza`) and (`n`.`id_natureza` = 2)) union select sum(`c`.`quantidade`) AS `total` from (`crime` `c` join `natureza` `n`) where ((`c`.`natureza_id_natureza` = `n`.`id_natureza`) and (`n`.`id_natureza` between 24 and 25)) union select sum(`c`.`quantidade`) AS `total` from (`crime` `c` join `natureza` `n`) where ((`c`.`natureza_id_natureza` = `n`.`id_natureza`) and (`n`.`id_natureza` between 26 and 29)) union select sum(`c`.`quantidade`) AS `total` from (`crime` `c` join `natureza` `n`) where ((`c`.`natureza_id_natureza` = `n`.`id_natureza`) and (`n`.`id_natureza` between 30 and 31));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
