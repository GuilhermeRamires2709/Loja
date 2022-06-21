SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco`
--
CREATE DATABASE IF NOT EXISTS `banco` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `banco`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `idDoProduto` int(11) NOT NULL,
  `numeroDoPedido` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preço` float(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `liga`
--

CREATE TABLE `liga` (
  `id` int(11) NOT NULL,
  `nomeLiga` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `nPedido` int(11) NOT NULL,
  `cpfDoCliente` int(11) NOT NULL,
  `preçoFinal` int(11) NOT NULL,
  `data` varchar(200) NOT NULL,
  `endereço` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `idLiga` int(11) NOT NULL,
  `estoque` int(11) NOT NULL,
  `preço` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `nome` varchar(200) DEFAULT NULL,
  `sobrenome` varchar(200) DEFAULT NULL,
  `cpf` int(11) NOT NULL,
  `senha` bigint(20) NOT NULL,
  `endereço` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD KEY `idDoProduto` (`idDoProduto`),
  ADD KEY `numeroDoPedido` (`numeroDoPedido`);

--
-- Índices para tabela `liga`
--
ALTER TABLE `liga`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`nPedido`),
  ADD KEY `pedido` (`cpfDoCliente`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`),
  ADD KEY `produto` (`idLiga`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cpf`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho` FOREIGN KEY (`idDoProduto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`idDoProduto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`numeroDoPedido`) REFERENCES `pedido` (`nPedido`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido` FOREIGN KEY (`cpfDoCliente`) REFERENCES `usuario` (`cpf`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto` FOREIGN KEY (`idLiga`) REFERENCES `liga` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
