-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 03/12/2013 às 04:29
-- Versão do servidor: 5.5.16
-- Versão do PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `radar_criminal`
--
CREATE DATABASE IF NOT EXISTS `radar_criminal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `radar_criminal`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `crime`
--

CREATE TABLE IF NOT EXISTS `crime` (
  `id_crime` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `regiao_administrativa_id_regiao_administrativa` int(10) unsigned NOT NULL,
  `tempo_id_tempo` int(10) unsigned NOT NULL,
  `natureza_id_natureza` int(10) unsigned NOT NULL,
  `quantidade` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_crime`),
  KEY `crime_FKIndex1` (`natureza_id_natureza`),
  KEY `crime_FKIndex4` (`tempo_id_tempo`),
  KEY `crime_FKIndex3` (`regiao_administrativa_id_regiao_administrativa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `natureza`
--

CREATE TABLE IF NOT EXISTS `natureza` (
  `id_natureza` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria_id_categoria` int(10) unsigned NOT NULL,
  `natureza` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_natureza`),
  KEY `natureza_FKIndex1` (`categoria_id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `regiao_administrativa`
--

CREATE TABLE IF NOT EXISTS `regiao_administrativa` (
  `id_regiao_administrativa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_regiao_administrativa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tempo`
--

CREATE TABLE IF NOT EXISTS `tempo` (
  `id_tempo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intervalo` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_tempo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
