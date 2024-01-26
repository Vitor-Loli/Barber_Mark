-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_BarberMark
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_BarberMark
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_BarberMark` DEFAULT CHARACTER SET utf8 ;
USE `db_BarberMark` ;

-- -----------------------------------------------------
-- Table `db_BarberMark`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_BarberMark`.`usuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NULL,
  `usuario` VARCHAR(255) NULL,
  `senha` VARCHAR(255) NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_BarberMark`.`agendamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_BarberMark`.`agendamentos` (
  `id_agendamento` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NULL,
  `telefone` VARCHAR(255) NULL,
  `procedimento` VARCHAR(255) NULL,
  `dia` DATE NULL,
  `hora` VARCHAR(45) NULL,
  PRIMARY KEY (`id_agendamento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_BarberMark`.`horarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_BarberMark`.`horarios` (
  `id_horario` INT NOT NULL AUTO_INCREMENT,
  `hora` VARCHAR(45) NULL,
  PRIMARY KEY (`id_horario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_BarberMark`.`feriados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_BarberMark`.`feriados` (
  `id_feriado` INT NOT NULL AUTO_INCREMENT,
  `dia` DATE NULL,
  PRIMARY KEY (`id_feriado`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


INSERT INTO `db_barbermark`.`usuarios` (`nome`, `usuario`, `senha`) VALUES ('admin', 'admin', '123');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('8:00');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('8:30');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('9:00');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('9:30');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('10:00');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('10:30');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('11:00');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('11:30');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('13:30');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('14:00');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('14:30');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('15:00');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('15:30');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('16:00');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('16:30');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('17:00');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('17:30');
INSERT INTO `db_barbermark`.`horarios` (`hora`) VALUES ('18:00');

