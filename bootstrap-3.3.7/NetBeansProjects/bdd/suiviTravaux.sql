SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `Suivi_travauxdb` ;
CREATE SCHEMA IF NOT EXISTS `Suivi_travauxdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `Suivi_travauxdb` ;

-- -----------------------------------------------------
-- Table `Suivi_travauxdb`.`Dpt`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suivi_travauxdb`.`Dpt` (
  `idDpt` INT NOT NULL ,
  `designation` VARCHAR(200) NULL ,
  `login` VARCHAR(10) NULL ,
  `pass` VARCHAR(45) NULL ,
  PRIMARY KEY (`idDpt`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suivi_travauxdb`.`Etudiant`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suivi_travauxdb`.`Etudiant` (
  `idEtudiant` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(45) NULL ,
  `postnom` VARCHAR(45) NULL ,
  `sexe` VARCHAR(1) NULL ,
  `adresse` TINYTEXT NULL ,
  `telephone` VARCHAR(16) NULL ,
  `email` VARCHAR(145) NULL ,
  `login` VARCHAR(10) NULL ,
  `pass` VARCHAR(10) NULL ,
  `Dpt_idDpt` INT NOT NULL ,
  PRIMARY KEY (`idEtudiant`, `Dpt_idDpt`) ,
  INDEX `fk_Etudiant_Dpt1` (`Dpt_idDpt` ASC) ,
  CONSTRAINT `fk_Etudiant_Dpt1`
    FOREIGN KEY (`Dpt_idDpt` )
    REFERENCES `Suivi_travauxdb`.`Dpt` (`idDpt` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suivi_travauxdb`.`Enseignant`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suivi_travauxdb`.`Enseignant` (
  `idEnseignant` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(45) NULL ,
  `postnom` VARCHAR(45) NULL ,
  `sexe` VARCHAR(1) NULL ,
  `grade` VARCHAR(45) NULL ,
  `adresse` VARCHAR(45) NULL ,
  `Enseignantcol` TINYTEXT NULL ,
  `phone` VARCHAR(16) NULL ,
  `email` VARCHAR(145) NULL ,
  `login` VARCHAR(10) NULL ,
  `pass` VARCHAR(10) NULL ,
  `Dpt_idDpt` INT NOT NULL ,
  PRIMARY KEY (`idEnseignant`, `Dpt_idDpt`) ,
  INDEX `fk_Enseignant_Dpt1` (`Dpt_idDpt` ASC) ,
  CONSTRAINT `fk_Enseignant_Dpt1`
    FOREIGN KEY (`Dpt_idDpt` )
    REFERENCES `Suivi_travauxdb`.`Dpt` (`idDpt` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suivi_travauxdb`.`Proposition`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suivi_travauxdb`.`Proposition` (
  `idProposition` INT NOT NULL AUTO_INCREMENT ,
  `sujet1` TINYTEXT NULL ,
  `sujet2` TINYTEXT NULL ,
  `idpEnseignant` INT NOT NULL ,
  `idpEtudiant` INT NOT NULL ,
  `idpEnseignant2` INT NULL ,
  `idpDpt` INT NOT NULL ,
  PRIMARY KEY (`idProposition`, `idpEnseignant`, `idpEtudiant`, `idpEnseignant2`, `idpDpt`) ,
  INDEX `indProposition_Enseignant` (`idpEnseignant` ASC) ,
  INDEX `indProposition_Etudiant1` (`idpEtudiant` ASC) ,
  INDEX `indProposition_Enseignant1` (`idpEnseignant2` ASC, `idpDpt` ASC) ,
  CONSTRAINT `fk_Proposition_Enseignant`
    FOREIGN KEY (`idpEnseignant` )
    REFERENCES `Suivi_travauxdb`.`Enseignant` (`idEnseignant` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Proposition_Etudiant1`
    FOREIGN KEY (`idpEtudiant` )
    REFERENCES `Suivi_travauxdb`.`Etudiant` (`idEtudiant` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Proposition_Enseignant1`
    FOREIGN KEY (`idpEnseignant2` , `idpDpt` )
    REFERENCES `Suivi_travauxdb`.`Enseignant` (`idEnseignant` , `Dpt_idDpt` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
