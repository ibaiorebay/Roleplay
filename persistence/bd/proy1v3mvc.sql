-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema proy1v3mvc
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `proy1v3mvc` ;

-- -----------------------------------------------------
-- Schema proy1v3mvc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `proy1v3mvc` DEFAULT CHARACTER SET utf8 ;
USE `proy1v3mvc` ;


-- -----------------------------------------------------
-- Table `proy1v3mvc`.`offers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proy1v3mvc`.`offers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `company` VARCHAR(200) CHARACTER SET 'utf8' NOT NULL,
  `position` VARCHAR(200) CHARACTER SET 'utf8' NOT NULL,
  `function` VARCHAR(300) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`id`))
  ENGINE = InnoDB
  AUTO_INCREMENT = 12
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `proy1v3mvc`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proy1v3mvc`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(50) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `password` VARCHAR(50) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
  ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
