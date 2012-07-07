SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


-- -----------------------------------------------------
-- Table `saferlanes`.`driver`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `saferlanes`.`driver` ;

CREATE  TABLE IF NOT EXISTS `saferlanes`.`driver` (
  `plate` VARCHAR(7) NOT NULL ,
  `timestamp` INT NULL ,
  `plus` INT NULL DEFAULT 0 ,
  `minus` INT NULL DEFAULT 0 ,
  PRIMARY KEY (`plate`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
