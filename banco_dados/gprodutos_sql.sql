-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema gprodutos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gprodutos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gprodutos` DEFAULT CHARACTER SET utf8 ;
USE `gprodutos` ;

-- -----------------------------------------------------
-- Table `gprodutos`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gprodutos`.`users` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `matricula` VARCHAR(20) NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `nivel_acesso` VARCHAR(45) NOT NULL COMMENT '1 - Usuário\n2 - Gestor\n3 - Administrador',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `matricula_UNIQUE` (`matricula` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gprodutos`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gprodutos`.`produtos` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `tag_rfid` VARCHAR(255) NULL,
  `cod_barras` VARCHAR(255) NULL,
  `produto` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(255) NOT NULL,
  `quantidade` INT(10) NOT NULL,
  `users_id` BIGINT(20) NOT NULL,
  INDEX `fk_produtos_users1_idx` (`users_id` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `tag_rfid_UNIQUE` (`tag_rfid` ASC),
  UNIQUE INDEX `cod_barras_UNIQUE` (`cod_barras` ASC),
  CONSTRAINT `fk_produtos_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `gprodutos`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gprodutos`.`entrada_produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gprodutos`.`entrada_produtos` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `users_id` BIGINT(20) NOT NULL,
  `produtos_id` BIGINT(20) NOT NULL,
  `quantidade_entrada` INT(20) NOT NULL,
  `horas_entrada` DATETIME NOT NULL,
  PRIMARY KEY (`id`, `users_id`, `produtos_id`),
  INDEX `fk_users_has_produtos_produtos1_idx` (`produtos_id` ASC),
  INDEX `fk_users_has_produtos_users_idx` (`users_id` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  CONSTRAINT `fk_users_has_produtos_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `gprodutos`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_has_produtos_produtos1`
    FOREIGN KEY (`produtos_id`)
    REFERENCES `gprodutos`.`produtos` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gprodutos`.`saida_produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gprodutos`.`saida_produtos` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `users_id` BIGINT(20) NOT NULL,
  `produtos_id` BIGINT(20) NOT NULL,
  `quantidade_saida` INT(20) NOT NULL,
  `horas_saida` DATETIME NOT NULL,
  PRIMARY KEY (`id`, `users_id`, `produtos_id`),
  INDEX `fk_users_has_produtos_produtos1_idx` (`produtos_id` ASC),
  INDEX `fk_users_has_produtos_users_idx` (`users_id` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  CONSTRAINT `fk_users_has_produtos_users0`
    FOREIGN KEY (`users_id`)
    REFERENCES `gprodutos`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_has_produtos_produtos10`
    FOREIGN KEY (`produtos_id`)
    REFERENCES `gprodutos`.`produtos` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
