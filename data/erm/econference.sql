-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 04/08/2017 às 15:07
-- Versão do servidor: 5.7.18-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `econference`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `locais`
--

CREATE TABLE IF NOT EXISTS `locais` (
  `codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `nome` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `participantes`
--

CREATE TABLE IF NOT EXISTS `participantes` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `instituicao` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `passaporte` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Estrutura para tabela `sediadoras`
--

CREATE TABLE IF NOT EXISTS `sediadoras` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Estrutura para tabela `perfis`
--

CREATE TABLE IF NOT EXISTS `perfis` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Estrutura para tabela `permissoes`
--

CREATE TABLE IF NOT EXISTS `permissoes` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_perfil` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_trabalho` int(11) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `codigo_local` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `permissoes_perfil`
--

CREATE TABLE IF NOT EXISTS `permissoes_perfil` (
  `codigo_perfil` int(11) NOT NULL,
  `codigo_permissao` int(11) NOT NULL,
  PRIMARY KEY (`codigo_perfil`,`codigo_permissao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `trabalhos`
--

CREATE TABLE IF NOT EXISTS `trabalhos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `resumo` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_categoria` tinyint(4) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `credenciamentos`
--

CREATE TABLE `credenciamentos` (
  `codigo_participante` int(11) NOT NULL,
  `codigo_edicao` tinyint(4) NOT NULL,
  `credenciados` tinyint(1) NOT NULL,
  PRIMARY KEY (`codigo_participante`,`codigo_edicao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `edicoes`
--

CREATE TABLE IF NOT EXISTS `edicoes` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `edicao` tinyint(4) NOT NULL,
  `codigo_sediadora` tinyint(4) NOT NULL,
  `encerrada` tinyint(1) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
