-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Abr-2023 às 14:43
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_utdshop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id_product` int(6) NOT NULL,
  `product_name` varchar(40) DEFAULT NULL,
  `product_code` varchar(12) DEFAULT NULL,
  `product_price` float(6,2) DEFAULT NULL,
  `product_stock` int(4) DEFAULT NULL,
  `product_created_in` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id_product`, `product_name`, `product_code`, `product_price`, `product_stock`, `product_created_in`) VALUES
(1, 'Biscoito Rechado Morango', '000000000001', 2.99, 100, '2023-04-02 22:59:50'),
(2, 'Biscoito Rechado Chocolate', '000000000002', 2.99, 100, '2023-04-02 22:59:50'),
(3, 'Biscoito Rechado Escureto', '000000000003', 2.99, 100, '2023-04-02 22:59:50'),
(4, 'Refrigerante Coca Cola Lata', '000000000004', 3.99, 100, '2023-04-02 22:59:50'),
(5, 'Refrigerante Fanta Uva Lata', '000000000005', 3.59, 100, '2023-04-02 22:59:50'),
(6, 'Refrigerante Fanta Laranja Lata', '000000000006', 3.59, 100, '2023-04-02 22:59:50'),
(7, 'Salgadinho Cheetos Onda Requeijao P', '000000000007', 1.99, 100, '2023-04-02 22:59:50'),
(8, 'Salgadinho Cheetos Lua Requeijao P', '000000000008', 1.99, 100, '2023-04-02 22:59:50'),
(9, 'Ref São Geraldo 2lt', '000000000009', 8.99, 100, '2023-04-02 22:59:50'),
(10, 'Salgadinho Fandangos Presunto P', '000000000010', 1.99, 100, '2023-04-02 22:59:50'),
(11, 'teste', '010001', 50.00, 20, '2023-04-14 01:11:08'),
(13, 'rrrr', '333333', 3.00, 3, '2023-04-17 20:24:27'),
(14, 'tt', '55', 5.00, 5, '2023-04-17 20:49:18'),
(15, 'mmmjdhskdskdhK', '098765432100', 9999.99, 2333, '2023-04-17 22:37:26'),
(17, 'gghhhhh', '34242', 332.00, 33, '2023-04-17 22:49:11'),
(20, 'rr', '3', 3.00, 3, '2023-04-17 23:17:55'),
(21, 'teste', '22', 3.00, 3, '2023-04-18 22:06:04'),
(22, 'mmmmm', '999999', 9.00, 9, '2023-04-18 22:14:26'),
(23, 'novo', '9999', 7.00, 8, '2023-04-18 22:15:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categories`
--

CREATE TABLE `tb_categories` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_categories`
--

INSERT INTO `tb_categories` (`id_category`, `category_name`) VALUES
(1, 'Bebidas'),
(3, 'Biscoitos'),
(4, 'Bijoteris'),
(6, 'lctcios'),
(7, 'fein'),
(8, 'ffyyyyyyy'),
(9, 'vv'),
(10, 'rr'),
(11, 'sss'),
(12, 'Biscoitos4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_products`
--

CREATE TABLE `tb_products` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product _stock` tinyint(1) NOT NULL DEFAULT 1,
  `product_created_in` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_profiles`
--

CREATE TABLE `tb_profiles` (
  `id_profile` int(3) UNSIGNED ZEROFILL NOT NULL,
  `profile_name` varchar(50) NOT NULL,
  `profile_page` varchar(50) NOT NULL,
  `profile_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_profiles`
--

INSERT INTO `tb_profiles` (`id_profile`, `profile_name`, `profile_page`, `profile_desc`) VALUES
(001, 'Administrador', 'admin.php', 'Administrador da Poha Toda'),
(002, 'Funcionario', 'func.php', 'Faz o que eu mandar !!!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_promos`
--

CREATE TABLE `tb_promos` (
  `id_promo` int(11) NOT NULL,
  `promo_price` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `promo_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_subcategories`
--

CREATE TABLE `tb_subcategories` (
  `id_subcategory` int(11) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_subcategories`
--

INSERT INTO `tb_subcategories` (`id_subcategory`, `subcategory_name`, `category_id`) VALUES
(2, 'Bebidas Quentes', 1),
(7, 'Bebidas Geladas', 1),
(13, 'xuxu', 1),
(14, 'susu', 1),
(18, 'xx', 4),
(22, 'ff', 1),
(23, 'dd', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipopg`
--

CREATE TABLE `tb_tipopg` (
  `id_tipopg` tinyint(2) NOT NULL,
  `tipopg_codigo` tinyint(2) NOT NULL,
  `tipopg_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_tipopg`
--

INSERT INTO `tb_tipopg` (`id_tipopg`, `tipopg_codigo`, `tipopg_name`) VALUES
(1, 1, 'Dinheiro'),
(2, 2, 'Cartao Debito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_unmd`
--

CREATE TABLE `tb_unmd` (
  `id_unmd` int(5) NOT NULL,
  `unmd_codigo` varchar(5) NOT NULL,
  `unmd_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_unmd`
--

INSERT INTO `tb_unmd` (`id_unmd`, `unmd_codigo`, `unmd_name`) VALUES
(1, 'und', 'unid@de'),
(2, 'klg', 'kilogr@m@'),
(3, 'pct', 'p@cote');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_cpf` varchar(50) DEFAULT NULL,
  `user_birth` date DEFAULT NULL,
  `user_phone` varchar(25) DEFAULT NULL,
  `user_cellphone` varchar(25) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_created_in` timestamp NULL DEFAULT current_timestamp(),
  `profile_id` int(3) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `user_name`, `user_email`, `user_password`, `user_cpf`, `user_birth`, `user_phone`, `user_cellphone`, `user_address`, `user_image`, `user_created_in`, `profile_id`) VALUES
(1, 'Anthony Jefferson', 'berim@berim', '123', '603.935.073-35', '1993-12-04', '(85) 99954-4262', '(85) 99954-4262', 'Rua Jonas Bezerra, 38B, Barroso 1\\r\\n', 'user.png', '2019-08-28 12:47:18', 001),
(2, 'bello', 'bello@bello', '123', '22222222222', '1966-09-28', '8599999999', '8599999999', 'r. bbb', '2022-12-14 (4).png', '2023-04-15 13:11:33', 001),
(4, 'ee', 'e@e', '444', '22222222223', '2022-09-28', '8599999999', '8599999999', 'r. bbb', '2022-12-14 (4).png', '2023-04-17 21:57:31', 001);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Índices para tabela `tb_categories`
--
ALTER TABLE `tb_categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Índices para tabela `tb_products`
--
ALTER TABLE `tb_products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Índices para tabela `tb_profiles`
--
ALTER TABLE `tb_profiles`
  ADD PRIMARY KEY (`id_profile`);

--
-- Índices para tabela `tb_promos`
--
ALTER TABLE `tb_promos`
  ADD PRIMARY KEY (`id_promo`),
  ADD KEY `product_id` (`product_id`);

--
-- Índices para tabela `tb_subcategories`
--
ALTER TABLE `tb_subcategories`
  ADD PRIMARY KEY (`id_subcategory`),
  ADD KEY `category_id` (`category_id`);

--
-- Índices para tabela `tb_tipopg`
--
ALTER TABLE `tb_tipopg`
  ADD PRIMARY KEY (`id_tipopg`);

--
-- Índices para tabela `tb_unmd`
--
ALTER TABLE `tb_unmd`
  ADD PRIMARY KEY (`id_unmd`);

--
-- Índices para tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_cpf` (`user_cpf`),
  ADD KEY `profile_id` (`profile_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tb_categories`
--
ALTER TABLE `tb_categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_products`
--
ALTER TABLE `tb_products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_profiles`
--
ALTER TABLE `tb_profiles`
  MODIFY `id_profile` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_promos`
--
ALTER TABLE `tb_promos`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_subcategories`
--
ALTER TABLE `tb_subcategories`
  MODIFY `id_subcategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tb_tipopg`
--
ALTER TABLE `tb_tipopg`
  MODIFY `id_tipopg` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_unmd`
--
ALTER TABLE `tb_unmd`
  MODIFY `id_unmd` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_products`
--
ALTER TABLE `tb_products`
  ADD CONSTRAINT `tb_products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tb_categories` (`id_category`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_subcategories`
--
ALTER TABLE `tb_subcategories`
  ADD CONSTRAINT `tb_subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tb_categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `tb_profiles` (`id_profile`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
