SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `gmoney` DEFAULT CHARACTER SET utf8 ;
USE `gmoney` ;

-- -----------------------------------------------------
-- Table `gmoney`.`tbl_users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gmoney`.`tbl_users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `pass` VARCHAR(45) NOT NULL COMMENT 'Password hash' ,
  `tbl_prefix` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  UNIQUE INDEX `tbl_prefix_UNIQUE` (`tbl_prefix` ASC) )
ENGINE = InnoDB
COMMENT = 'The description of all users registered in the system. It in' /* comment truncated */;


-- -----------------------------------------------------
-- Table `gmoney`.`prefix_income_categories`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gmoney`.`prefix_income_categories` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gmoney`.`prefix_operations`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gmoney`.`prefix_operations` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `date` DATETIME NOT NULL ,
  `comment` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gmoney`.`prefix_income_operations`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gmoney`.`prefix_income_operations` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `category_id` INT NOT NULL ,
  `operation_id` INT NOT NULL ,
  `sum` MEDIUMTEXT NOT NULL ,
  `period` DATETIME NOT NULL COMMENT 'Date of the operation. The duplication of the information is needed to calculate the turnovers quicker.' ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_prefix_income_operations_prefix_income_categories` (`category_id` ASC) ,
  INDEX `fk_prefix_income_operations_prefix_operations1` (`operation_id` ASC) ,
  INDEX `period` (`period` ASC) ,
  CONSTRAINT `fk_prefix_income_operations_prefix_income_categories`
    FOREIGN KEY (`category_id` )
    REFERENCES `gmoney`.`prefix_income_categories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prefix_income_operations_prefix_operations1`
    FOREIGN KEY (`operation_id` )
    REFERENCES `gmoney`.`prefix_operations` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gmoney`.`prefix_expense_categories`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gmoney`.`prefix_expense_categories` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gmoney`.`prefix_expense_operations`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gmoney`.`prefix_expense_operations` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `category_id` INT NOT NULL ,
  `operation_id` INT NOT NULL ,
  `sum` MEDIUMTEXT NOT NULL ,
  `period` DATETIME NOT NULL COMMENT 'Date of the operation. The duplication of the information is needed to calculate the turnovers quicker.' ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_prefix_expense_operations_prefix_expense_category1` (`category_id` ASC) ,
  INDEX `fk_prefix_expense_operations_prefix_operations1` (`operation_id` ASC) ,
  INDEX `period` (`period` ASC) ,
  CONSTRAINT `fk_prefix_expense_operations_prefix_expense_category1`
    FOREIGN KEY (`category_id` )
    REFERENCES `gmoney`.`prefix_expense_categories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prefix_expense_operations_prefix_operations1`
    FOREIGN KEY (`operation_id` )
    REFERENCES `gmoney`.`prefix_operations` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gmoney`.`prefix_accounts`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gmoney`.`prefix_accounts` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `start_amount` MEDIUMTEXT NULL ,
  `date_open` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gmoney`.`prefix_accounts_operations`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gmoney`.`prefix_accounts_operations` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `operation_id` INT NOT NULL ,
  `account_id` INT NOT NULL ,
  `sum` MEDIUMTEXT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_prefix_accounts_operations_prefix_operations1` (`operation_id` ASC) ,
  INDEX `fk_prefix_accounts_operations_prefix_accounts1` (`account_id` ASC) ,
  CONSTRAINT `fk_prefix_accounts_operations_prefix_operations1`
    FOREIGN KEY (`operation_id` )
    REFERENCES `gmoney`.`prefix_operations` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prefix_accounts_operations_prefix_accounts1`
    FOREIGN KEY (`account_id` )
    REFERENCES `gmoney`.`prefix_accounts` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gmoney`.`prefix_accounts_totals`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gmoney`.`prefix_accounts_totals` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `period` DATETIME NOT NULL ,
  `sum` MEDIUMTEXT NOT NULL ,
  `account_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_prefix_accounts_totals_prefix_accounts1` (`account_id` ASC) ,
  CONSTRAINT `fk_prefix_accounts_totals_prefix_accounts1`
    FOREIGN KEY (`account_id` )
    REFERENCES `gmoney`.`prefix_accounts` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gmoney`.`prefix_tags`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gmoney`.`prefix_tags` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gmoney`.`prefix_operations_tags`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gmoney`.`prefix_operations_tags` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tag_id` INT NOT NULL ,
  `operation_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_prefix_operations_tags_prefix_tags1` (`tag_id` ASC) ,
  INDEX `fk_prefix_operations_tags_prefix_operations1` (`operation_id` ASC) ,
  CONSTRAINT `fk_prefix_operations_tags_prefix_tags1`
    FOREIGN KEY (`tag_id` )
    REFERENCES `gmoney`.`prefix_tags` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prefix_operations_tags_prefix_operations1`
    FOREIGN KEY (`operation_id` )
    REFERENCES `gmoney`.`prefix_operations` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gmoney`.`tbl_families`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gmoney`.`tbl_families` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gmoney`.`tbl_users_families`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gmoney`.`tbl_users_families` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tbl_families_id` INT NOT NULL ,
  `tbl_users_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_tbl_users_families_tbl_families1` (`tbl_families_id` ASC) ,
  INDEX `fk_tbl_users_families_tbl_users1` (`tbl_users_id` ASC) ,
  CONSTRAINT `fk_tbl_users_families_tbl_families1`
    FOREIGN KEY (`tbl_families_id` )
    REFERENCES `gmoney`.`tbl_families` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_users_families_tbl_users1`
    FOREIGN KEY (`tbl_users_id` )
    REFERENCES `gmoney`.`tbl_users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gmoney`.`prefix_budgets`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gmoney`.`prefix_budgets` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `periodStart` DATETIME NULL ,
  `periodStop` DATETIME NULL ,
  `comment` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  UNIQUE INDEX `periodStart_UNIQUE` (`periodStart` ASC) ,
  UNIQUE INDEX `periodStop_UNIQUE` (`periodStop` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gmoney`.`prefix_income_budgets`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gmoney`.`prefix_income_budgets` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `category_id` INT NOT NULL ,
  `budget_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_prefix_income_budgets_prefix_income_categories1` (`category_id` ASC) ,
  INDEX `fk_prefix_income_budgets_prefix_budgets1` (`budget_id` ASC) ,
  CONSTRAINT `fk_prefix_income_budgets_prefix_income_categories1`
    FOREIGN KEY (`category_id` )
    REFERENCES `gmoney`.`prefix_income_categories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prefix_income_budgets_prefix_budgets1`
    FOREIGN KEY (`budget_id` )
    REFERENCES `gmoney`.`prefix_budgets` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gmoney`.`prefix_expense_budget`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gmoney`.`prefix_expense_budget` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `category_id` INT NOT NULL ,
  `budget_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_prefix_expense_budget_prefix_expense_categories1` (`category_id` ASC) ,
  INDEX `fk_prefix_expense_budget_prefix_budgets1` (`budget_id` ASC) ,
  CONSTRAINT `fk_prefix_expense_budget_prefix_expense_categories1`
    FOREIGN KEY (`category_id` )
    REFERENCES `gmoney`.`prefix_expense_categories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prefix_expense_budget_prefix_budgets1`
    FOREIGN KEY (`budget_id` )
    REFERENCES `gmoney`.`prefix_budgets` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
