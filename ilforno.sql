-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Set-2022 às 23:58
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ilforno`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartoes`
--

CREATE TABLE `cartoes` (
  `id` int(11) NOT NULL,
  `titular` varchar(255) NOT NULL,
  `bandeira` varchar(255) NOT NULL,
  `expiracao` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `cvv` varchar(255) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cartoes`
--

INSERT INTO `cartoes` (`id`, `titular`, `bandeira`, `expiracao`, `numero`, `cvv`, `usuario_id`) VALUES
(1, 'Armando Victor Pereira', 'MASTERCARD', '10/29', '5502090508108563', '10/29', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `fontFamily` varchar(255) NOT NULL,
  `backgroundImage` varchar(255) NOT NULL,
  `backgroundColor` varchar(255) NOT NULL,
  `titulo_id` int(11) NOT NULL,
  `subtitulo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `fontFamily`, `backgroundImage`, `backgroundColor`, `titulo_id`, `subtitulo_id`) VALUES
(1, 'Satisfy', '../../../assets/images/categories/hamburguer.png', 'c96c3e', 1, 1),
(2, 'Satisfy', '../../../assets/images/categories/pastel.png', 'aaaaad', 2, 2),
(3, 'Satisfy', '../../../assets/images/categories/hotdog.png', 'cf3917', 3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `logradouro`, `numero`, `bairro`, `cep`, `cidade`, `estado`, `complemento`, `usuario_id`) VALUES
(1, 'Luiz Rubino', '165', 'Wilma Flor', '08473-440', 'São Paulo', 'São Paulo', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'fJo*Fzs!FClL', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lojas`
--

CREATE TABLE `lojas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lojas`
--

INSERT INTO `lojas` (`id`, `nome`, `logradouro`, `numero`, `bairro`, `cep`, `cidade`, `estado`, `complemento`) VALUES
(1, 'Seu Zé', 'Luiz Rubino', '165', 'Wilma Flor', '08473-440', 'São Paulo', 'São Paulo', ''),
(2, 'Dona Maria', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesas`
--

CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `numero_de_cadeiras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mesas`
--

INSERT INTO `mesas` (`id`, `numero_de_cadeiras`) VALUES
(1, 2),
(2, 4),
(3, 6),
(4, 8),
(5, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `total` float NOT NULL,
  `status` varchar(255) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `total`, `status`, `usuario_id`) VALUES
(1, 33.5, 'EM ANDAMENTO', 1),
(2, 22, 'EM ANDAMENTO', 6),
(3, 28.5, 'EM ANDAMENTO', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `preco` float NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `imagem`, `preco`, `quantidade`, `descricao`, `categoria_id`) VALUES
(1, 'Hamburguer de Frango', '../../../assets/images/categories/hamburguer-frango.png', 7.5, 0, 'Hambúrguer de frango, com pão artesanal, alface, tomate e queijo.', 1),
(2, 'Pastel de Carne', '../../../assets/images/categories/pastel-carne.png', 5.5, 0, 'Pastel de carne com queijo, massa recheada com carne temperada com alho, tomate, cheiro verde e azeitona.', 2),
(3, 'Hot Dog Simples', '../../../assets/images/categories/hotdog.png', 9, 0, 'Hot Dog, temperado alho , sazon, tomate, coloral e cheiro verde', 3),
(4, 'Hamburguer de Carne', '../../../assets/images/categories/hamburguer.png', 7.5, 0, 'Hambúrguer, com pão artesanal, alface, tomate e queijo.', 1),
(5, 'Pastel de Frango', '../../../assets/images/categories/pastel-frango.png', 4.5, 0, 'Pastel de frango, temperado alho , sazon, tomate, coloral e cheiro verde', 2),
(6, 'Pastel de Queijo', '../../../assets/images/categories/pastel-queijo.png', 8.5, 0, 'Pastel de queijo, temperado alho , sazon, tomate, coloral e cheiro verde', 2),
(7, 'Hot Dog 2 Salsichas', '../../../assets/images/categories/hotdog-2.png', 10, 0, 'Hot Dog, temperado alho , sazon, tomate, coloral e cheiro verde', 3),
(8, 'Hot Dog Prensado', '../../../assets/images/categories/hotdog-prensado.png', 12, 0, 'Hot Dog Prensado, temperado alho , sazon, tomate, coloral e cheiro verde', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_pedido`
--

CREATE TABLE `produtos_pedido` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos_pedido`
--

INSERT INTO `produtos_pedido` (`id`, `produto_id`, `pedido_id`) VALUES
(1, 1, 1),
(8, 1, 2),
(9, 2, 2),
(10, 3, 2),
(11, 1, 3),
(12, 3, 3),
(13, 8, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `subtitulos`
--

CREATE TABLE `subtitulos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fontSize` varchar(255) NOT NULL,
  `textAlign` varchar(255) NOT NULL,
  `textDecoration` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `subtitulos`
--

INSERT INTO `subtitulos` (`id`, `name`, `fontSize`, `textAlign`, `textDecoration`, `color`, `categoria_id`) VALUES
(1, 'Hamburguers', '20px', 'center', 'none', 'black', 1),
(2, 'Pastelaria', '20px', 'center', 'none', 'black', 2),
(3, 'Hot Dog', '20px', 'center', 'none', 'black', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `titulos`
--

CREATE TABLE `titulos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fontSize` varchar(255) NOT NULL,
  `textAlign` varchar(255) NOT NULL,
  `textDecoration` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `titulos`
--

INSERT INTO `titulos` (`id`, `name`, `fontSize`, `textAlign`, `textDecoration`, `color`, `categoria_id`) VALUES
(1, 'Seu Zé', '30px', 'center', 'underline', 'black', 1),
(2, 'Seu Zé', '30px', 'center', 'underline', 'black', 2),
(3, 'Seu Zé', '30px', 'center', 'underline', 'black', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `token` varchar(150) NOT NULL,
  `expira` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tokens`
--

INSERT INTO `tokens` (`id`, `usuario_id`, `token`, `expira`) VALUES
(103, 15, 'f4d88bcbc8f86c0177e36bf9e241204b', '2022-09-19 07:48:57'),
(104, 16, '990dc89804c883f4f4154b16a0e697a6', '2022-09-19 07:49:46'),
(105, 17, 'eee10267204be13536ad2ee7bf25e072', '2022-09-19 07:50:58'),
(106, 18, 'd9c7d977df25db89b3bf3460d6058341', '2022-09-20 04:13:12'),
(107, 19, '08226e0506e6e2c1080587999407a19b', '2022-09-20 04:14:50'),
(108, 20, 'da45f1fb32f13377a4c8826aa461b558', '2022-09-20 04:19:34'),
(109, 21, 'd28e78f2dd618fff502b9e902b901b64', '2022-09-20 04:20:57'),
(110, 22, '88594070874f8a49b40cb53fbb474fdc', '2022-09-20 04:23:38'),
(111, 23, '122d3387fe2f7bbc797267ca9ccb4bf8', '2022-09-20 04:23:54'),
(112, 24, 'c277dff53f184ebe7c49daf4e3768ecb', '2022-09-20 04:43:46'),
(113, 25, 'e418955408f9b230c5fff4bcff8b1937', '2022-09-20 04:45:18'),
(114, 26, 'a484cce35734da012c86d7cc697d593d', '2022-09-20 04:45:46'),
(115, 27, '1133119d99120818fcd8beb931fb97d4', '2022-09-20 04:57:43'),
(116, 28, 'bae8876d1c1e761ff4299ae7751ccec2', '2022-09-20 05:06:40'),
(117, 29, 'bae7c208a94e2da238c90b7bf9ddd2ce', '2022-09-20 05:47:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `quantidade_de_pessoas` int(11) NOT NULL,
  `mais_cadeiras` int(11) NOT NULL,
  `mesa_id` int(11) NOT NULL,
  `data_nascimento` varchar(255) NOT NULL,
  `email` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `quantidade_de_pessoas`, `mais_cadeiras`, `mesa_id`, `data_nascimento`, `email`) VALUES
(1, 'Armando', 2, 0, 1, '', 0),
(7, 'Armando', 2, 0, 1, '', 0),
(8, 'Armando', 2, 0, 1, '', 0),
(9, 'Armando', 2, 0, 1, '', 0),
(10, 'Armando', 2, 0, 1, '', 0),
(11, 'Armando', 2, 0, 1, '', 0),
(12, 'Armando', 2, 0, 1, '', 0),
(13, 'Armando', 2, 0, 1, '', 0),
(14, 'Armando', 2, 0, 1, '', 0),
(15, 'Armando', 2, 0, 1, '', 0),
(16, 'Armando', 2, 0, 1, '', 0),
(17, 'Armando', 2, 0, 1, '', 0),
(18, 'Armando Pereira', 2, 0, 2, '', 0),
(19, 'Armando Pereira', 2, 0, 2, '', 0),
(20, 'asdassad', 2, 0, 1, '', 0),
(21, 'asdasd', 2, 0, 2, '', 0),
(22, 'asdasd', 2, 0, 2, '', 0),
(23, 'asdasd', 1, 0, 1, '', 0),
(24, 'asdasd', 1, 0, 2, '', 0),
(25, 'asdasdasd', 1, 0, 1, '', 0),
(26, 'asdasdas', 1, 0, 2, '', 0),
(27, 'sdadasd', 1, 0, 1, '', 0),
(28, 'Armando Pereira', 1, 0, 4, '', 0),
(29, 'Armando Pereira', 3, 0, 2, '', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cartoes`
--
ALTER TABLE `cartoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id_fk_cartoes` (`usuario_id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id_fk` (`usuario_id`);

--
-- Índices para tabela `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lojas`
--
ALTER TABLE `lojas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos_pedido`
--
ALTER TABLE `produtos_pedido`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `subtitulos`
--
ALTER TABLE `subtitulos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `titulos`
--
ALTER TABLE `titulos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cartoes`
--
ALTER TABLE `cartoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `lojas`
--
ALTER TABLE `lojas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `produtos_pedido`
--
ALTER TABLE `produtos_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `subtitulos`
--
ALTER TABLE `subtitulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `titulos`
--
ALTER TABLE `titulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cartoes`
--
ALTER TABLE `cartoes`
  ADD CONSTRAINT `usuario_id_fk_cartoes` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `usuario_id_fk` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
