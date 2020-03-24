-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 18-Abr-2019 às 23:04
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `pizzanet`
--
CREATE DATABASE IF NOT EXISTS `pizzanet` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pizzanet`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio`
--

CREATE TABLE IF NOT EXISTS `cardapio` (
  `id_cardapio` int(11) NOT NULL AUTO_INCREMENT,
  `pizza` varchar(50) NOT NULL,
  `ingredientes` varchar(300) NOT NULL,
  `preco` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cardapio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Extraindo dados da tabela `cardapio`
--

INSERT INTO `cardapio` (`id_cardapio`, `pizza`, `ingredientes`, `preco`) VALUES
(32, 'Frango Catupiry', 'mussarela, frango desfiado, catupiry e azeitona', '31,90'),
(33, 'Americana', 'mussarela, presunto, bacon, ovos e azeitona', '31,90'),
(34, 'Bacon', 'mussarela, tomate, bacon e azeitona', '28,90'),
(35, 'Brócolis', 'mussarela, brócolis, bacon e azeitona', '28,90'),
(36, 'Calabresa', 'mussarela, calabresa, cebola e azeitona', '28,90'),
(38, 'Cinco Queijos', 'mussarela, catupiry, provolone, cheedar, parmesão e azeitona', '31,90'),
(39, 'Escarola', 'mussarela, escarola, bacon e azeitona', '28,90'),
(40, 'Italiana', 'mussarela, salaminho, tomate e azeitona', '34,90'),
(41, 'Mussarela', 'mussarela, rodelas de tomate e azeitona', '28,90'),
(42, 'Portuguesa', 'mussarela, presunto, ovos, cebola, ervilha, palmito e azeitona', '31,90'),
(43, 'Quatro Queijos', 'mussarela, catupiry, parmesão, gorgonzola e azeitona', '31,90');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(50) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `cliente`, `data_nascimento`, `sexo`, `telefone`) VALUES
(45, 'Neymar da silva', '1995-10-11', 'Masc', '(11) 995543546'),
(47, 'Ana Maria Braga', '1977-11-11', 'Fem', '(11) 982656565'),
(49, 'Michael Jackson', '1973-06-01', 'Masc', '(16) 995734957'),
(50, 'Cristiano Ronaldo', '1985-04-02', 'Masc', '(11) 995269823'),
(52, 'Lionel Messi', '1988-01-01', 'Masc', '(11) 985150485'),
(53, 'Cliente 1', '2000-10-31', 'Masc', '(11) 99992222');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `funcionario` varchar(50) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `data_nascimento` date NOT NULL,
  `salario` varchar(50) NOT NULL,
  PRIMARY KEY (`id_funcionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `funcionario`, `sexo`, `data_nascimento`, `salario`) VALUES
(17, 'Mario', 'Masc', '1985-12-14', '2.000,00'),
(18, 'Maria', 'Fem', '1991-09-05', '2.000,00'),
(19, 'Jonas', 'Masc', '1988-04-03', '2.500,00'),
(20, 'Mariana', 'Fem', '1987-04-02', '2.300,00'),
(21, 'Cláudia', 'Fem', '1979-08-04', '2.000,00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE IF NOT EXISTS `pagamento` (
  `id_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `cod_pedido` int(11) NOT NULL,
  `data_pagamento` date NOT NULL,
  `bandeira_cartao` varchar(50) NOT NULL,
  `cartao_credito` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pagamento`),
  KEY `cod_pedido` (`data_pagamento`),
  KEY `data_pagamento` (`data_pagamento`),
  KEY `data_pagamento_2` (`data_pagamento`),
  KEY `bandeira_cartao` (`bandeira_cartao`),
  KEY `cod_pedido_2` (`cod_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`id_pagamento`, `cod_pedido`, `data_pagamento`, `bandeira_cartao`, `cartao_credito`) VALUES
(24, 17, '2019-04-18', 'Visa', '5465 4635 1351 3544'),
(25, 18, '2019-04-18', 'Elo', '2534 4864 6884 6844'),
(26, 19, '2019-04-18', 'Visa', '1312 121'),
(27, 22, '2019-04-18', 'MasterCard', '4354 6843 5135 6876');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `data_realizado` date NOT NULL,
  `horario` varchar(10) NOT NULL,
  `cod_funcionario` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `cod_cardapio` int(11) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `cod_funcionario` (`cod_funcionario`),
  KEY `cod_cardapio` (`cod_cardapio`),
  KEY `cod_cliente` (`cod_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `data_realizado`, `horario`, `cod_funcionario`, `cod_cliente`, `cod_cardapio`) VALUES
(17, '2019-04-18', '21:00', 19, 50, 43),
(18, '2019-04-09', '22:22', 17, 52, 34),
(19, '2019-04-18', '22:31', 20, 50, 39),
(22, '2019-04-18', '19:40', 18, 47, 32),
(24, '2019-04-18', '20:03', 18, 45, 43);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `confirma` varchar(20) NOT NULL,
  `permissao` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `confirma`, `permissao`) VALUES
(4, 'Luis Miguel', 'miguel@ifsp.com', '1234567890', '1234567890', 0),
(5, 'Renato', 'renato@ifsp.com', '0987654321', '0987654321', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `visao_pagamento`
--
CREATE TABLE IF NOT EXISTS `visao_pagamento` (
`id_pagamento` int(11)
,`cod_pedido` int(11)
,`data_pagamento` date
,`cartao_credito` varchar(50)
,`bandeira_cartao` varchar(50)
,`preco` varchar(50)
,`cliente` varchar(50)
,`pizza` varchar(50)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `visao_pedido`
--
CREATE TABLE IF NOT EXISTS `visao_pedido` (
`id_pedido` int(11)
,`cliente` varchar(50)
,`funcionario` varchar(50)
,`pizza` varchar(50)
,`preco` varchar(50)
,`horario` varchar(10)
,`data_realizado` date
);
-- --------------------------------------------------------

--
-- Structure for view `visao_pagamento`
--
DROP TABLE IF EXISTS `visao_pagamento`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `visao_pagamento` AS select `pagamento`.`id_pagamento` AS `id_pagamento`,`pagamento`.`cod_pedido` AS `cod_pedido`,`pagamento`.`data_pagamento` AS `data_pagamento`,`pagamento`.`cartao_credito` AS `cartao_credito`,`pagamento`.`bandeira_cartao` AS `bandeira_cartao`,`cardapio`.`preco` AS `preco`,`cliente`.`cliente` AS `cliente`,`cardapio`.`pizza` AS `pizza` from (((`pagamento` join `pedido` on((`pedido`.`id_pedido` = `pagamento`.`cod_pedido`))) join `cliente` on((`cliente`.`id_cliente` = `pedido`.`cod_cliente`))) join `cardapio` on((`cardapio`.`id_cardapio` = `pedido`.`cod_cardapio`)));

-- --------------------------------------------------------

--
-- Structure for view `visao_pedido`
--
DROP TABLE IF EXISTS `visao_pedido`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `visao_pedido` AS select `pedido`.`id_pedido` AS `id_pedido`,`cliente`.`cliente` AS `cliente`,`funcionario`.`funcionario` AS `funcionario`,`cardapio`.`pizza` AS `pizza`,`cardapio`.`preco` AS `preco`,`pedido`.`horario` AS `horario`,`pedido`.`data_realizado` AS `data_realizado` from (((`pedido` join `cliente` on((`cliente`.`id_cliente` = `pedido`.`cod_cliente`))) join `funcionario` on((`funcionario`.`id_funcionario` = `pedido`.`cod_funcionario`))) join `cardapio` on((`cardapio`.`id_cardapio` = `pedido`.`cod_cardapio`)));

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_ibfk_3` FOREIGN KEY (`cod_pedido`) REFERENCES `pedido` (`id_pedido`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cod_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`cod_cardapio`) REFERENCES `cardapio` (`id_cardapio`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
