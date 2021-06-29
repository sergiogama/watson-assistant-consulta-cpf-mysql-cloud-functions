CREATE TABLE `compose`.`cliente` (
  `cpf` BIGINT NOT NULL,
  `nome` VARCHAR(50) NULL,
  PRIMARY KEY (`cpf`));

  USE dxc;
INSERT INTO `compose`.`cliente` (`cpf`, `nome`) VALUES (11122233345,'Sergio Gama');

INSERT INTO `compose`.`cliente` (`cpf`, `nome`) VALUES (99999999999,'Danielle');
