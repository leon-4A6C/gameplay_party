-- MySQL Script generated by MySQL Workbench
-- Wed 17 Oct 2018 10:43:50 AM CEST
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema gpp
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `gpp` ;

-- -----------------------------------------------------
-- Schema gpp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gpp` ;
USE `gpp` ;

-- -----------------------------------------------------
-- Table `gpp`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`roles` ;

CREATE TABLE IF NOT EXISTS `gpp`.`roles` (
  `role_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`role_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`users` ;

CREATE TABLE IF NOT EXISTS `gpp`.`users` (
  `user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(60) NOT NULL,
  `password` CHAR(60) NOT NULL,
  `role_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`),
  INDEX `fk_users_roles_idx` (`role_id` ASC),
  CONSTRAINT `fk_users_roles`
    FOREIGN KEY (`role_id`)
    REFERENCES `gpp`.`roles` (`role_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`cms`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`cms` ;

CREATE TABLE IF NOT EXISTS `gpp`.`cms` (
  `cms_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cms_content` TEXT NOT NULL,
  `cms_name` VARCHAR(45) NOT NULL,
  `cms_path` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`cms_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`klanten`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`klanten` ;

CREATE TABLE IF NOT EXISTS `gpp`.`klanten` (
  `klant_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `klant_geslacht` TINYINT NOT NULL,
  `klant_voorletter` VARCHAR(10) NOT NULL,
  `klant_achternaam` VARCHAR(100) NOT NULL,
  `klant_straatnaam` VARCHAR(100) NOT NULL,
  `klant_huisnummer` INT NOT NULL,
  `klant_toevoeging` VARCHAR(10) NULL,
  `klant_postcode` CHAR(6) NOT NULL,
  `klant_woonplaats` VARCHAR(100) NOT NULL,
  `klant_provincie` VARCHAR(100) NOT NULL,
  `klant_telefoonnummer` VARCHAR(25) NOT NULL,
  `klant_email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`klant_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`bioscopen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`bioscopen` ;

CREATE TABLE IF NOT EXISTS `gpp`.`bioscopen` (
  `bios_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `bios_naam` VARCHAR(45) NOT NULL,
  `bios_straatnaam` VARCHAR(100) NOT NULL,
  `bios_huisnummer` INT NOT NULL,
  `bios_toevoeging` VARCHAR(10) NULL,
  `bios_woonplaats` VARCHAR(100) NOT NULL,
  `bios_provincie` VARCHAR(100) NOT NULL,
  `bios_beschrijving` TEXT NOT NULL,
  `bios_voorwaarden` TEXT NULL,
  `bios_rolstoeltoegankelijkheid` TEXT NULL,
  `bios_postcode` CHAR(6) NOT NULL,
  `user_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`bios_id`),
  INDEX `fk_bioscopen_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_bioscopen_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `gpp`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`afbeeldingen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`afbeeldingen` ;

CREATE TABLE IF NOT EXISTS `gpp`.`afbeeldingen` (
  `afbeelding_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `afbeelding_path` VARCHAR(100) NOT NULL,
  `bios_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`afbeelding_id`),
  INDEX `fk_afbeeldingen_bioscopen1_idx` (`bios_id` ASC),
  CONSTRAINT `fk_afbeeldingen_bioscopen1`
    FOREIGN KEY (`bios_id`)
    REFERENCES `gpp`.`bioscopen` (`bios_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`zalen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`zalen` ;

CREATE TABLE IF NOT EXISTS `gpp`.`zalen` (
  `zaal_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `zaalnummer` INT NOT NULL,
  `aantal_stoelen` INT NOT NULL,
  `rolstoelplaatsen` INT NULL,
  `schermgrootte` VARCHAR(45) NULL,
  `faciliteiten` TEXT NULL,
  `versies` TEXT NULL,
  `bios_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`zaal_id`),
  INDEX `fk_zalen_bioscopen1_idx` (`bios_id` ASC),
  CONSTRAINT `fk_zalen_bioscopen1`
    FOREIGN KEY (`bios_id`)
    REFERENCES `gpp`.`bioscopen` (`bios_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`bereikbaarheid`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`bereikbaarheid` ;

CREATE TABLE IF NOT EXISTS `gpp`.`bereikbaarheid` (
  `bereikbaarheid_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `bereikbaarheid_naam` VARCHAR(45) NOT NULL,
  `bereikbaarheid_content` TEXT NOT NULL,
  `bios_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`bereikbaarheid_id`),
  INDEX `fk_bereikbaarheid_bioscopen1_idx` (`bios_id` ASC),
  CONSTRAINT `fk_bereikbaarheid_bioscopen1`
    FOREIGN KEY (`bios_id`)
    REFERENCES `gpp`.`bioscopen` (`bios_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`tijden`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`tijden` ;

CREATE TABLE IF NOT EXISTS `gpp`.`tijden` (
  `tijd_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `begindatum` DATETIME NOT NULL,
  `einddatum` DATETIME NOT NULL,
  `zaal_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`tijd_id`),
  INDEX `fk_tijden_zalen1_idx` (`zaal_id` ASC),
  CONSTRAINT `fk_tijden_zalen1`
    FOREIGN KEY (`zaal_id`)
    REFERENCES `gpp`.`zalen` (`zaal_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`tarieven`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`tarieven` ;

CREATE TABLE IF NOT EXISTS `gpp`.`tarieven` (
  `tarief_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `prijs` DECIMAL(9,2) NOT NULL,
  `naam` VARCHAR(45) NOT NULL,
  `toeslag` TINYINT NOT NULL,
  `bios_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`tarief_id`),
  INDEX `fk_tarieven_bioscopen1_idx` (`bios_id` ASC),
  CONSTRAINT `fk_tarieven_bioscopen1`
    FOREIGN KEY (`bios_id`)
    REFERENCES `gpp`.`bioscopen` (`bios_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`reservering`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`reservering` ;

CREATE TABLE IF NOT EXISTS `gpp`.`reservering` (
  `reservering_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `datum` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reservering_tijd` INT UNSIGNED NOT NULL,
  `klant_id` INT UNSIGNED NOT NULL,
  `zaal_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`reservering_id`),
  INDEX `fk_reservering_tijden1_idx` (`reservering_tijd` ASC),
  INDEX `fk_reservering_klanten1_idx` (`klant_id` ASC),
  INDEX `fk_reservering_zalen1_idx` (`zaal_id` ASC),
  CONSTRAINT `fk_reservering_tijden1`
    FOREIGN KEY (`reservering_tijd`)
    REFERENCES `gpp`.`tijden` (`tijd_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservering_klanten1`
    FOREIGN KEY (`klant_id`)
    REFERENCES `gpp`.`klanten` (`klant_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservering_zalen1`
    FOREIGN KEY (`zaal_id`)
    REFERENCES `gpp`.`zalen` (`zaal_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`reservering_tarieven`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`reservering_tarieven` ;

CREATE TABLE IF NOT EXISTS `gpp`.`reservering_tarieven` (
  `reservering_id` INT UNSIGNED NOT NULL,
  `tarief_id` INT UNSIGNED NOT NULL,
  `aantal_personen` INT NOT NULL,
  PRIMARY KEY (`reservering_id`, `tarief_id`),
  INDEX `fk_reservering_has_tarieven_tarieven1_idx` (`tarief_id` ASC),
  INDEX `fk_reservering_has_tarieven_reservering1_idx` (`reservering_id` ASC),
  CONSTRAINT `fk_reservering_has_tarieven_reservering1`
    FOREIGN KEY (`reservering_id`)
    REFERENCES `gpp`.`reservering` (`reservering_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservering_has_tarieven_tarieven1`
    FOREIGN KEY (`tarief_id`)
    REFERENCES `gpp`.`tarieven` (`tarief_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
