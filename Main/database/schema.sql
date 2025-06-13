CREATE DATABASE IF NOT EXISTS `loja_produtos` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci; --Criação do banco de forma automatica

USE `loja_produtos`;

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` TEXT,
  `preco` DECIMAL(10, 2) NOT NULL,
  `quantidade` INT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB; --criação de tabela

CREATE TABLE IF NOT EXISTS `historico_alteracoes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_produto` INT NOT NULL,
  `data_alteracao` DATETIME NOT NULL,
  `campo_alterado` VARCHAR(50) NOT NULL,
  `valor_antigo` TEXT,
  `valor_novo` TEXT,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_produto`) REFERENCES `produtos`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;
