-- MySQL Script generated by MySQL Workbench
-- Fri Feb 16 09:58:59 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema groupe_wittgenstein
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema groupe_wittgenstein
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `groupe_wittgenstein` DEFAULT CHARACTER SET utf8 ;
USE `groupe_wittgenstein` ;

-- -----------------------------------------------------
-- Table `groupe_wittgenstein`.`personne`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `groupe_wittgenstein`.`personne` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL COMMENT '			',
  `prenom` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telephone` VARCHAR(30) NULL,
  `never_connected` TINYINT NULL DEFAULT 1,
  `nom_entreprise` VARCHAR(45) NULL,
  `ville_entreprise` VARCHAR(80) NULL,
  `lat_entreprise` VARCHAR(45) NULL,
  `lon_entreprise` VARCHAR(45) NULL,
  `description_projets` TEXT NULL,
  `active` TINYINT NOT NULL DEFAULT 1,
  `password` VARCHAR(45) NULL,
  `compte_admin` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `groupe_wittgenstein`.`competence`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `groupe_wittgenstein`.`competence` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NULL,
  `id_parent` INT UNSIGNED NULL,
  `actif` TINYINT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_competence_parent_idx` (`id_parent` ASC),
  CONSTRAINT `fk_competence_parent`
    FOREIGN KEY (`id_parent`)
    REFERENCES `groupe_wittgenstein`.`competence` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `groupe_wittgenstein`.`lien_personne_comptence`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `groupe_wittgenstein`.`lien_personne_comptence` (
  `id_personne` INT UNSIGNED NOT NULL,
  `id_competence` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_personne`, `id_competence`),
  INDEX `fk_competence_idx` (`id_competence` ASC),
  CONSTRAINT `fk_personne`
    FOREIGN KEY (`id_personne`)
    REFERENCES `groupe_wittgenstein`.`personne` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_competence`
    FOREIGN KEY (`id_competence`)
    REFERENCES `groupe_wittgenstein`.`competence` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `groupe_wittgenstein`.`reset_password`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `groupe_wittgenstein`.`reset_password` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `personne_email` VARCHAR(45) NOT NULL,
  `cle` TINYTEXT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
