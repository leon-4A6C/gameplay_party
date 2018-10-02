-- MySQL Script generated by MySQL Workbench
-- Tue 02 Oct 2018 04:21:54 PM CEST
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema gpp
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gpp
-- -----------------------------------------------------
-- CREATE SCHEMA IF NOT EXISTS `gpp` ;
-- USE `gpp` ;

-- -----------------------------------------------------
-- Table `bioscopen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bioscopen` ;

CREATE TABLE IF NOT EXISTS `bioscopen` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `bioscoop_naam` VARCHAR(100) NOT NULL,
  `straatnaam` VARCHAR(100) NOT NULL,
  `huisnummer` INT NOT NULL,
  `toevoeging` VARCHAR(10) NULL,
  `postcode` VARCHAR(6) NOT NULL,
  `woonplaats` VARCHAR(100) NOT NULL,
  `provincie` VARCHAR(100) NOT NULL,
  `rolstoeltoegankelijkheid` TEXT NULL,
  `voorwaarden` TEXT NULL,
  `beschrijving` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zalen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zalen` ;

CREATE TABLE IF NOT EXISTS `zalen` (
  `zaalnummer` INT UNSIGNED NOT NULL,
  `bioscopen_id` INT UNSIGNED NOT NULL,
  `aantal_stoelen` INT NOT NULL,
  `rolstoelplaatsen` INT NOT NULL DEFAULT 0,
  `schermgrootte` VARCHAR(45) NOT NULL,
  `faciliteiten` TEXT NULL,
  `versies` TEXT NULL,
  PRIMARY KEY (`zaalnummer`, `bioscopen_id`),
  INDEX `fk_zalen_bioscopen1_idx` (`bioscopen_id` ASC),
  CONSTRAINT `fk_zalen_bioscopen1`
    FOREIGN KEY (`bioscopen_id`)
    REFERENCES `bioscopen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reserveringen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reserveringen` ;

CREATE TABLE IF NOT EXISTS `reserveringen` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `geslacht` TINYINT(1) NOT NULL DEFAULT 0,
  `voornaam` VARCHAR(75) NOT NULL,
  `tussenvoegsel` VARCHAR(75) NULL,
  `achternaam` VARCHAR(75) NOT NULL,
  `straatnaam` VARCHAR(100) NOT NULL,
  `huisnummer` INT NOT NULL,
  `toevoeging` VARCHAR(10) NULL,
  `postcode` VARCHAR(6) NOT NULL,
  `woonplaats` VARCHAR(100) NOT NULL,
  `provincie` VARCHAR(100) NOT NULL,
  `telefoonnummer` VARCHAR(15) NOT NULL,
  `factuurdatum` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reserveringsdatum` DATETIME NOT NULL,
  `reserverings_begintijd` TIME NOT NULL,
  `reserverings_eindtijd` TIME NOT NULL,
  `zalen_zaalnummer` INT UNSIGNED NOT NULL,
  `bioscoop_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `zalen_zaalnummer`, `bioscoop_id`),
  INDEX `fk_reserveringen_zalen1_idx` (`zalen_zaalnummer` ASC, `bioscoop_id` ASC),
  CONSTRAINT `fk_reserveringen_zalen1`
    FOREIGN KEY (`zalen_zaalnummer` , `bioscoop_id`)
    REFERENCES `zalen` (`zaalnummer` , `bioscopen_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `betalingen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `betalingen` ;

CREATE TABLE IF NOT EXISTS `betalingen` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `reserveringen_id` INT UNSIGNED NOT NULL,
  `percentage_betaald` INT NOT NULL,
  `datum` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `betaalmethode` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`, `reserveringen_id`),
  INDEX `fk_betalingen_reserveringen_idx` (`reserveringen_id` ASC),
  CONSTRAINT `fk_betalingen_reserveringen`
    FOREIGN KEY (`reserveringen_id`)
    REFERENCES `reserveringen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tarieven`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tarieven` ;

CREATE TABLE IF NOT EXISTS `tarieven` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `bioscopen_id` INT UNSIGNED NOT NULL,
  `prijs` DECIMAL(9,2) NOT NULL,
  `naam` VARCHAR(45) NOT NULL,
  `toeslag` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`, `bioscopen_id`),
  INDEX `fk_tarieven_bioscopen1_idx` (`bioscopen_id` ASC),
  CONSTRAINT `fk_tarieven_bioscopen1`
    FOREIGN KEY (`bioscopen_id`)
    REFERENCES `bioscopen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `geselecteerde_tarieven`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geselecteerde_tarieven` ;

CREATE TABLE IF NOT EXISTS `geselecteerde_tarieven` (
  `reserveringen_id` INT UNSIGNED NOT NULL,
  `tarieven_id` INT UNSIGNED NOT NULL,
  `aantal_personen` INT NOT NULL,
  PRIMARY KEY (`reserveringen_id`, `tarieven_id`),
  INDEX `fk_reserveringen_has_tarieven_tarieven1_idx` (`tarieven_id` ASC),
  INDEX `fk_reserveringen_has_tarieven_reserveringen1_idx` (`reserveringen_id` ASC),
  CONSTRAINT `fk_reserveringen_has_tarieven_reserveringen1`
    FOREIGN KEY (`reserveringen_id`)
    REFERENCES `reserveringen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reserveringen_has_tarieven_tarieven1`
    FOREIGN KEY (`tarieven_id`)
    REFERENCES `tarieven` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `openingstijden`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `openingstijden` ;

CREATE TABLE IF NOT EXISTS `openingstijden` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `bioscopen_id` INT UNSIGNED NOT NULL,
  `dag` VARCHAR(45) NOT NULL,
  `begintijd` TIME NOT NULL,
  `eindtijd` TIME NOT NULL,
  PRIMARY KEY (`id`, `bioscopen_id`),
  INDEX `fk_openingstijden_bioscopen1_idx` (`bioscopen_id` ASC),
  CONSTRAINT `fk_openingstijden_bioscopen1`
    FOREIGN KEY (`bioscopen_id`)
    REFERENCES `bioscopen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bereikbaarheden`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bereikbaarheden` ;

CREATE TABLE IF NOT EXISTS `bereikbaarheden` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `bioscopen_id` INT UNSIGNED NOT NULL,
  `naam` VARCHAR(45) NOT NULL,
  `content` TEXT NOT NULL,
  PRIMARY KEY (`id`, `bioscopen_id`),
  INDEX `fk_bereikbaarheden_bioscopen1_idx` (`bioscopen_id` ASC),
  CONSTRAINT `fk_bereikbaarheden_bioscopen1`
    FOREIGN KEY (`bioscopen_id`)
    REFERENCES `bioscopen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
