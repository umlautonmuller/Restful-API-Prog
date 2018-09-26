SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `texto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `dt_criacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ind_categoria` (`id_categoria`);

ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `post`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;