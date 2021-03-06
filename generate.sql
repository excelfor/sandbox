-- MySQL Script generated by MySQL Workbench
-- 04/24/15 12:36:47
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- -----------------------------------------------------
-- Schema excelforDev
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema excelforDev
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `excelforDev` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `excelforDev` ;

-- -----------------------------------------------------
-- Table `excelforDev`.`query_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `excelforDev`.`query_types` ;

CREATE TABLE IF NOT EXISTS `excelforDev`.`query_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `excelforDev`.`entities`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `excelforDev`.`entities` ;

CREATE TABLE IF NOT EXISTS `excelforDev`.`entities` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
   `local` VARCHAR(100) NULL,
   `hidden` CHAR(1) DEFAULT 0,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

INSERT INTO `entities` (`id`, `name`, `local`, `hidden`, `created`, `modified`) VALUES
(1, 'Excel Formação', 'Lisboa', '1', '2015-04-24 13:21:55', '2015-04-24 13:21:55');


-- -----------------------------------------------------
-- Table `excelforDev`.`projects`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `excelforDev`.`projects` ;

CREATE TABLE IF NOT EXISTS `excelforDev`.`projects` (
  `id` INT NOT NULL  AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `entity_id` INT NOT NULL,
  `startdate` DATE NULL,
  `active` CHAR(1) NULL DEFAULT 0,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`, `entity_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `excelforDev`.`groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `excelforDev`.`groups` ;

CREATE TABLE IF NOT EXISTS `excelforDev`.`groups` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(60) NULL,
  `project_id` INT NOT NULL,
  `sort_order` TINYINT(2) NULL,
  `weight` DECIMAL(5,2) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`, `project_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `excelforDev`.`categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `excelforDev`.`categories` ;

CREATE TABLE IF NOT EXISTS `excelforDev`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `group_id` INT NOT NULL,
  `weight` DECIMAL(5,2) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`, `group_id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `excelforDev`.`tokens`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `excelforDev`.`tokens` ;

CREATE TABLE IF NOT EXISTS `excelforDev`.`tokens` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `project_id` INT NOT NULL,
  `effect` DECIMAL(4,2) NULL,
  `cell_position` TINYINT(1) NULL,
  `created` DATETIME NULL,
  PRIMARY KEY (`id`, `project_id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `excelforDev`.`queries`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `excelforDev`.`queries` ;

CREATE TABLE IF NOT EXISTS `excelforDev`.`queries` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  `project_id` INT NOT NULL,
  `sort_order` SMALLINT(3) NULL,
  `query_type_id` INT NOT NULL,
  `category_id` INT NOT NULL,
  `token_id` INT NOT NULL,
  `group_id` INT NOT NULL,
  `attachement` VARCHAR(80) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`, `project_id`, `query_type_id`, `category_id`, `token_id`, `group_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `excelforDev`.`user_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `excelforDev`.`user_types` ;

CREATE TABLE IF NOT EXISTS `excelforDev`.`user_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `user_level` TINYINT(1) NULL,
  `hidden` CHAR(1) NULL DEFAULT 0,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = MyISAM;

INSERT INTO `user_types` (`id`, `name`, `user_level`, `hidden`, `created`, `modified`) VALUES
(1, 'Manutenção do Sistema', 99, '1', '2015-04-24 13:21:55', '2015-04-24 13:21:55');


-- -----------------------------------------------------
-- Table `excelforDev`.`Departments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `excelforDev`.`Departments` ;

CREATE TABLE IF NOT EXISTS `excelforDev`.`Departments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `entity_id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `local` VARCHAR(100) NULL,
  `hidden` CHAR(1) NULL DEFAULT 0,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`, `entity_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = MyISAM;

INSERT INTO `departments` (`id`, `entity_id`, `name`, `local`, `hidden`, `created`, `modified`) VALUES
(1, 1, 'Gestor Sistema', NULL, '1', '2015-04-24 13:21:55', '2015-04-24 13:21:55');


-- -----------------------------------------------------
-- Table `excelforDev`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `excelforDev`.`users` ;

CREATE TABLE IF NOT EXISTS `excelforDev`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `telef` CHAR(12) NULL,
  `entity_id` INT NOT NULL,
  `department_id` INT NOT NULL,
  `user_type` INT NOT NULL,
  `funcao` VARCHAR(100) NULL,
  `loginid` VARCHAR(18) NULL,
  `pass` VARCHAR(12) NULL,
  `hidden` TINYINT(1) NULL DEFAULT 0,
  `status` TINYINT(1) NULL DEFAULT 0,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`, `entity_id`, `department_id`, `user_type`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

INSERT INTO `users` (`id`, `name`, `email`, `telef`, `entity_id`, `department_id`, `user_type`, `loginid`, `pass`, `hidden`, `status`, `created`, `modified`) VALUES
(1, 'Admn. Sistema', 'geral@excelformacao.pt', '', 1, 1, 1, 'admin', 'admin!123', 1, 1, '2015-04-24 13:21:55', '2015-04-24 13:21:55');


-- -----------------------------------------------------
-- Table `excelforDev`.`answers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `excelforDev`.`answers` ;

CREATE TABLE IF NOT EXISTS `excelforDev`.`answers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `project_id` INT NOT NULL,
  `query_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `value` TINYINT(1) NULL,
  `sort_order` CHAR(2) NULL,
  `ans_str` VARCHAR(20) NULL,
  `created` DATETIME NULL,
  PRIMARY KEY (`id`, `project_id`, `query_id`, `user_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `excelforDev`.`assessments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `excelforDev`.`assessments`;

CREATE TABLE IF NOT EXISTS `excelforDev`.`assessments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `project_id` INT NOT NULL,
  `answer_id` INT NOT NULL,
  `key` INT NULL,
  `group_impact` TINYINT(1) NULL,
  `sort_order` CHAR(2) NULL,
  `ans_str` VARCHAR(20) NULL,
  `comment` VARCHAR(255) NULL,
  `user_id` INT NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`, `project_id`, `answer_id`, `user_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = MyISAM;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
