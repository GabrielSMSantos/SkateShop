-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Fev-2019 às 21:23
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `christboardshop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nomeProduto` varchar(155) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `cor` varchar(55) NOT NULL,
  `tamanho` varchar(5) NOT NULL,
  `categoria` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subCategoria` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `marca` varchar(55) NOT NULL,
  `modelo` varchar(55) NOT NULL,
  `genero` varchar(12) NOT NULL,
  `imagem` varchar(155) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `promocao` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nomeProduto`, `preco`, `cor`, `tamanho`, `categoria`, `subCategoria`, `marca`, `modelo`, `genero`, `imagem`, `descricao`, `promocao`) VALUES
(12, 'Camiseta HIGH ML OUTLINE', '190.00', 'FFA200', 'GG', 'Roupas', 'Camiseta', 'High', 'ML OUTLINE', 'Masculino', 'media/images/produtos/camisetaHigh.jpg', 'Camiseta HIGH ML OUTLINE', '90.00'),
(13, 'CAMISETA DIAMOND VIEWPOINT', '129.00', '000', 'GG', 'Roupas', 'Camiseta', 'Diamond', 'VIEWPOINT', 'Masculino', 'media/images/produtos/viewpoint.jpg', 'CAMISETA DIAMOND VIEWPOINT', '0.00'),
(14, 'CAMISETA DIAMOND VIEWPOINT', '129.00', 'ed1c24', 'GG', 'Roupas', 'Camiseta', 'Diamond', 'VIEWPOINT', 'Masculino', 'media/images/produtos/diamond2.jpg', '', '0.00'),
(15, 'CAMISETA PRIMITIVE P CORE', '189.00', '000', 'GG', 'Roupas', 'Camiseta', 'Primitive', 'P CORE', 'Masculino', 'media/images/produtos/primitive.jpg', 'Produto4', '0.00'),
(16, 'CAMISETA PRIMITIVE P CORE', '189.00', 'fff', 'GG', 'Roupas', 'Camiseta', 'Primitive', 'P CORE', 'Masculino', 'media/images/produtos/primitive2.jpg', 'dasda', '0.00'),
(21, 'CAMISETA GRIZZLY TROLL OG', '129.00', 'fff', 'GG', 'Roupas', 'Camiseta', 'Grizzly', 'TROLL OG', 'Masculino', 'media/images/produtos/grizzlyTroll.jpg', 'CAMISETA GRIZZLY TROLL OG', '0.00'),
(26, 'Corrente', '1000.00', '000', 'none', 'Acessorios', 'Camiseta', 'Grizzly', 'dd', 'Masculino', 'media/images/produtos/corrente.jpg', 'Corrente', '0.00'),
(29, 'CAMISETA DGK ICE BREAKER', '149.00', 'ed1c24', 'GG', 'Roupas', 'Camiseta', 'DGK', 'ICE BREAKER', 'Masculino', 'media/images/produtos/dgk.jpg', 'sdas', '0.00'),
(30, 'CAMISETA DIAMOND RADIANT STONE CUT TEE', '129.00', 'fff', 'P', 'Roupas', 'Camiseta', 'Grizzly', 'RADIANT STONE CUT TEE', 'Masculino', 'media/images/produtos/diamond22.jpg', 'CAMISETA DIAMOND RADIANT STONE CUT TEE', '0.00'),
(31, 'CAMISETA DIAMOND SNAKE TEE', '129.00', '000', 'GG', 'Roupas', 'Camiseta', 'Diamond', 'SNAKE TEE', 'Masculino', 'media/images/produtos/diamond33.jpg', '', '0.00'),
(32, 'CAMISETA GRIZZLY LOWERCASE', '129.00', '000', 'GG', 'Roupas', 'Camiseta', 'Grizzly', 'LOWERCASE', 'Masculino', 'media/images/produtos/grizzly.jpg', '', '0.00'),
(33, 'Camiseta stussy tee', '150.00', '000', 'GG', 'Roupas', 'Camiseta', 'Stussy', 'tee', 'Masculino', 'media/images/produtos/stussy.jpg', 'dasda', '0.00'),
(34, 'camiseta huf Riot Box', '150.00', 'fff', 'GG', 'Roupas', 'Camiseta', 'Huf', 'Riot Box', 'Masculino', 'media/images/produtos/huf.jpg', 'sdas', '0.00'),
(37, 'TÃªnis Nike Air Huarache', '800.00', '000', '43', 'Calcados', 'TÃªnis', 'Nike', 'Air Huarache', 'Masculino', 'media/images/produtos/asd.jpg', 'Tï¿½nis Nike Air Huarache', '0.00'),
(38, 'CAMISETA HIGH WILD', '119.00', '00B04E', 'GG', 'Roupas', 'Camiseta', 'High', 'WILD', 'Masculino', 'media/images/produtos/highverde.jpg', '', '0.00'),
(40, 'CAMISETA HIGH WILD', '150.00', 'fff', 'GG', 'Roupas', 'Camiseta', 'High', 'WILD', 'Masculino', 'media/images/produtos/highbranco.jpg', '', '0.00'),
(47, 'Jaqueta DGK Corta Vento', '250.00', '00B04E', 'GG', 'Roupas', 'Jaqueta', 'DGK', 'Corta Vento', 'Masculino', 'media/images/produtos/cortaSipirit.png', 'Corta Vento DGK', '0.00'),
(48, 'TÃªnis VANS OLD SKOOL', '250.00', '000', '43', 'Calcados', 'TÃªnis', 'Vans', 'Baixo', 'Masculino', 'media/images/produtos/tenisVans.jpg', 'Tï¿½nis VANS OLD SKOOL', '0.00'),
(49, 'CAMISETA HIGH ML OUTLINE', '190.00', '2162EB', 'P', 'Roupas', 'Camiseta', 'High', 'ML OUTLINE', 'Masculino', 'media/images/produtos/high2.jpg', 'CAMISETA HIGH ML OUTLINE', '0.00'),
(50, 'CAMISETA HIGH FUEGO', '119.00', '2162EB', 'GG', 'Roupas', 'Camiseta', 'High', 'FUEGO', 'Masculino', 'media/images/produtos/highFuego.jpg', '', '0.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `style`
--

CREATE TABLE `style` (
  `id` int(11) NOT NULL,
  `corTopo` varchar(55) NOT NULL,
  `corMenu` varchar(55) NOT NULL,
  `corSecundaria` varchar(55) NOT NULL,
  `rodape` varchar(55) NOT NULL,
  `ativarSlide` int(2) NOT NULL,
  `favicon` varchar(155) NOT NULL,
  `logo` varchar(155) NOT NULL,
  `type` varchar(55) NOT NULL,
  `linkFonte` varchar(155) NOT NULL,
  `nomeFonte` varchar(55) NOT NULL,
  `tipoFonte` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `style`
--

INSERT INTO `style` (`id`, `corTopo`, `corMenu`, `corSecundaria`, `rodape`, `ativarSlide`, `favicon`, `logo`, `type`, `linkFonte`, `nomeFonte`, `tipoFonte`) VALUES
(1, '303030', '444343', 'ed1c24', '303030', 1, 'media/images/icons/favicon.png', 'media/images/logo.png', 'default3', 'https://fonts.googleapis.com/css?family=Oswald', 'Oswald', 'sans-serif');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `dataNascimento` varchar(10) NOT NULL,
  `cep` varchar(25) NOT NULL,
  `endereco` varchar(55) NOT NULL,
  `numero` int(10) NOT NULL,
  `complemento` varchar(25) NOT NULL,
  `bairro` varchar(55) NOT NULL,
  `cidade` varchar(55) NOT NULL,
  `estado` varchar(55) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `telefoneAlternativo` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(155) NOT NULL,
  `senha` varchar(155) NOT NULL,
  `permicao` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `dataNascimento`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `telefone`, `telefoneAlternativo`, `celular`, `email`, `senha`, `permicao`) VALUES
(1, 'asdas', 'gyu', 'gyu', 'gyuigyu', 'gyu', 2131, 'gyugyu', 'gyu', 'gyu', 'gyugyu', 'ygu', 'gyuy', 'gyu', 'gyugyu', 'c9e89035e8cac6b7b0b95a158361731e', 'FALSE'),
(2, 'dasd', 'h', 'h', 'hh', 'h', 1, 'h', 'h', 'hh', 'h', 'h', 'h', 'h', 'h', '2510c39011c5be704182423e3a695e91', 'FALSE'),
(3, 'Gabriel', 'gu', 'gyu', 'das', 'gug', 0, 'gyu', 'gyu', 'gyugyu', 'gyu', 'g', 'gyu', 'gyu', 'ugu', '413be1502217bf802b8a8de397d456c1', 'FALSE'),
(4, 'Gabriel Santos', '507.336.098-21', '15/11/2000', '07084-410', 'rua Luiz Coladello', 118, '', 'Parque Continental II', 'Guarulhos', 'SÃ£o Paulo', '5641565446', '5646456', '45565465', 'gabrielsaomartin@hotmail.com', '202cb962ac59075b964b07152d234b70', 'FALSE'),
(5, 'renan', 'uh', 'uhi', 'u', 'hui', 0, 'hui', 'hui', 'hu', 's', 'uoh', 'huihui', '123', 's', '202cb962ac59075b964b07152d234b70', 'FALSE'),
(7, 'Admin', 'g', 'gg', 'gg', 'g', 0, 'g', 'g', 'g', 'g', '(11) 5843-3164', 'g', '123', 'admin@admin.com', '202cb962ac59075b964b07152d234b70', 'TRUE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `style`
--
ALTER TABLE `style`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
