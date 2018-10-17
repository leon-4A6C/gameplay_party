-- MySQL Script generated by MySQL Workbench
-- Sun 14 Oct 2018 04:02:56 PM CEST
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
CREATE SCHEMA IF NOT EXISTS `gpp` ;
USE `gpp` ;

-- -----------------------------------------------------
-- Table `gpp`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`roles` ;

CREATE TABLE IF NOT EXISTS `gpp`.`roles` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`users` ;

CREATE TABLE IF NOT EXISTS `gpp`.`users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` INT UNSIGNED NOT NULL,
  `username` VARCHAR(60) NOT NULL,
  `password` CHAR(60) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_roles1_idx` (`role_id` ASC),
  CONSTRAINT `fk_users_roles1`
    FOREIGN KEY (`role_id`)
    REFERENCES `gpp`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`bioscopen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`bioscopen` ;

CREATE TABLE IF NOT EXISTS `gpp`.`bioscopen` (
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
  `users_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_bioscopen_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_bioscopen_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `gpp`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`zalen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`zalen` ;

CREATE TABLE IF NOT EXISTS `gpp`.`zalen` (
  `zaal_id` INT NOT NULL AUTO_INCREMENT,
  `zaalnummer` INT NOT NULL,
  `aantal_stoelen` INT NOT NULL,
  `rolstoelplaatsen` INT NOT NULL DEFAULT 0,
  `schermgrootte` VARCHAR(45) NOT NULL,
  `faciliteiten` TEXT NULL,
  `versies` TEXT NULL,
  `bioscopen_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`zaal_id`),
  INDEX `fk_zalen_bioscopen1_idx` (`bioscopen_id` ASC),
  CONSTRAINT `fk_zalen_bioscopen1`
    FOREIGN KEY (`bioscopen_id`)
    REFERENCES `gpp`.`bioscopen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`reserveringen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`reserveringen` ;

CREATE TABLE IF NOT EXISTS `gpp`.`reserveringen` (
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
  `zaal_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_reserveringen_zalen1_idx` (`zaal_id` ASC),
  CONSTRAINT `fk_reserveringen_zalen1`
    FOREIGN KEY (`zaal_id`)
    REFERENCES `gpp`.`zalen` (`zaal_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`betalingen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`betalingen` ;

CREATE TABLE IF NOT EXISTS `gpp`.`betalingen` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `reserveringen_id` INT UNSIGNED NOT NULL,
  `percentage_betaald` INT NOT NULL,
  `datum` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `betaalmethode` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_betalingen_reserveringen_idx` (`reserveringen_id` ASC),
  CONSTRAINT `fk_betalingen_reserveringen`
    FOREIGN KEY (`reserveringen_id`)
    REFERENCES `gpp`.`reserveringen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`tarieven`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`tarieven` ;

CREATE TABLE IF NOT EXISTS `gpp`.`tarieven` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `bioscopen_id` INT UNSIGNED NOT NULL,
  `prijs` DECIMAL(9,2) NOT NULL,
  `naam` VARCHAR(45) NOT NULL,
  `toeslag` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_tarieven_bioscopen1_idx` (`bioscopen_id` ASC),
  CONSTRAINT `fk_tarieven_bioscopen1`
    FOREIGN KEY (`bioscopen_id`)
    REFERENCES `gpp`.`bioscopen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`geselecteerde_tarieven`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`geselecteerde_tarieven` ;

CREATE TABLE IF NOT EXISTS `gpp`.`geselecteerde_tarieven` (
  `reserveringen_id` INT UNSIGNED NOT NULL,
  `tarieven_id` INT UNSIGNED NOT NULL,
  `aantal_personen` INT NOT NULL,
  PRIMARY KEY (`reserveringen_id`, `tarieven_id`),
  INDEX `fk_reserveringen_has_tarieven_tarieven1_idx` (`tarieven_id` ASC),
  INDEX `fk_reserveringen_has_tarieven_reserveringen1_idx` (`reserveringen_id` ASC),
  CONSTRAINT `fk_reserveringen_has_tarieven_reserveringen1`
    FOREIGN KEY (`reserveringen_id`)
    REFERENCES `gpp`.`reserveringen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reserveringen_has_tarieven_tarieven1`
    FOREIGN KEY (`tarieven_id`)
    REFERENCES `gpp`.`tarieven` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`bereikbaarheden`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`bereikbaarheden` ;

CREATE TABLE IF NOT EXISTS `gpp`.`bereikbaarheden` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `bioscopen_id` INT UNSIGNED NOT NULL,
  `naam` VARCHAR(45) NOT NULL,
  `content` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_bereikbaarheden_bioscopen1_idx` (`bioscopen_id` ASC),
  CONSTRAINT `fk_bereikbaarheden_bioscopen1`
    FOREIGN KEY (`bioscopen_id`)
    REFERENCES `gpp`.`bioscopen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`afbeeldingen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`afbeeldingen` ;

CREATE TABLE IF NOT EXISTS `gpp`.`afbeeldingen` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `path` VARCHAR(100) NOT NULL,
  `bioscopen_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_afbeeldingen_bioscopen1_idx` (`bioscopen_id` ASC),
  CONSTRAINT `fk_afbeeldingen_bioscopen1`
    FOREIGN KEY (`bioscopen_id`)
    REFERENCES `gpp`.`bioscopen` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpp`.`cms`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpp`.`cms` ;

CREATE TABLE IF NOT EXISTS `gpp`.`cms` (
  `path` VARCHAR(45) NOT NULL,
  `title` VARCHAR(45) NOT NULL,
  `content` TEXT NOT NULL,
  PRIMARY KEY (`path`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
