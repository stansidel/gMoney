<?php

$sqltext = "-- -----------------------------------------------------
		-- Table `" . $prefix . "_income_categories`
		-- -----------------------------------------------------
		CREATE  TABLE IF NOT EXISTS `" . $prefix . "_income_categories` (
		  `id` INT NOT NULL AUTO_INCREMENT ,
		  `name` VARCHAR(100) NOT NULL ,
		  PRIMARY KEY (`id`) );

		CREATE UNIQUE INDEX `id_UNIQUE` ON `" . $prefix . "_income_categories` (`id` ASC) ;


		-- -----------------------------------------------------
		-- Table `" . $prefix . "_operations`
		-- -----------------------------------------------------
		CREATE  TABLE IF NOT EXISTS `" . $prefix . "_operations` (
		  `id` INT NOT NULL AUTO_INCREMENT ,
		  `date` DATETIME NOT NULL ,
		  `comment` VARCHAR(100) NULL ,
		  PRIMARY KEY (`id`) );

		CREATE UNIQUE INDEX `id_UNIQUE` ON `" . $prefix . "_operations` (`id` ASC) ;


		-- -----------------------------------------------------
		-- Table `" . $prefix . "_income_operations`
		-- -----------------------------------------------------
		CREATE  TABLE IF NOT EXISTS `" . $prefix . "_income_operations` (
		  `id` INT NOT NULL AUTO_INCREMENT ,
		  `category_id` INT NOT NULL ,
		  `operation_id` INT NOT NULL ,
		  `sum` MEDIUMTEXT NOT NULL ,
		  `period` DATETIME NOT NULL COMMENT 'Date of the operation. The duplication of the information is needed to calculate the turnovers quicker.' ,
		  PRIMARY KEY (`id`) ,
		  CONSTRAINT `fk_" . $prefix . "_income_operations_" . $prefix . "_income_categories`
			FOREIGN KEY (`category_id` )
			REFERENCES `" . $prefix . "_income_categories` (`id` )
			ON DELETE NO ACTION
			ON UPDATE NO ACTION,
		  CONSTRAINT `fk_" . $prefix . "_income_operations_" . $prefix . "_operations1`
			FOREIGN KEY (`operation_id` )
			REFERENCES `" . $prefix . "_operations` (`id` )
			ON DELETE NO ACTION
			ON UPDATE NO ACTION);

		CREATE UNIQUE INDEX `id_UNIQUE` ON `" . $prefix . "_income_operations` (`id` ASC) ;

		CREATE INDEX `fk_" . $prefix . "_income_operations_" . $prefix . "_income_categories` ON `" . $prefix . "_income_operations` (`category_id` ASC) ;

		CREATE INDEX `fk_" . $prefix . "_income_operations_" . $prefix . "_operations1` ON `" . $prefix . "_income_operations` (`operation_id` ASC) ;

		CREATE INDEX `period` ON `" . $prefix . "_income_operations` (`period` ASC) ;


		-- -----------------------------------------------------
		-- Table `" . $prefix . "_expense_categories`
		-- -----------------------------------------------------
		CREATE  TABLE IF NOT EXISTS `" . $prefix . "_expense_categories` (
		  `id` INT NOT NULL AUTO_INCREMENT ,
		  `name` VARCHAR(100) NOT NULL ,
		  PRIMARY KEY (`id`) );

		CREATE UNIQUE INDEX `id_UNIQUE` ON `" . $prefix . "_expense_categories` (`id` ASC) ;


		-- -----------------------------------------------------
		-- Table `" . $prefix . "_expense_operations`
		-- -----------------------------------------------------
		CREATE  TABLE IF NOT EXISTS `" . $prefix . "_expense_operations` (
		  `id` INT NOT NULL AUTO_INCREMENT ,
		  `category_id` INT NOT NULL ,
		  `operation_id` INT NOT NULL ,
		  `sum` MEDIUMTEXT NOT NULL ,
		  `period` DATETIME NOT NULL COMMENT 'Date of the operation. The duplication of the information is needed to calculate the turnovers quicker.' ,
		  PRIMARY KEY (`id`) ,
		  CONSTRAINT `fk_" . $prefix . "_expense_operations_" . $prefix . "_expense_category1`
			FOREIGN KEY (`category_id` )
			REFERENCES `" . $prefix . "_expense_categories` (`id` )
			ON DELETE NO ACTION
			ON UPDATE NO ACTION,
		  CONSTRAINT `fk_" . $prefix . "_expense_operations_" . $prefix . "_operations1`
			FOREIGN KEY (`operation_id` )
			REFERENCES `" . $prefix . "_operations` (`id` )
			ON DELETE NO ACTION
			ON UPDATE NO ACTION);

		CREATE UNIQUE INDEX `id_UNIQUE` ON `" . $prefix . "_expense_operations` (`id` ASC) ;

		CREATE INDEX `fk_" . $prefix . "_expense_operations_" . $prefix . "_expense_category1` ON `" . $prefix . "_expense_operations` (`category_id` ASC) ;

		CREATE INDEX `fk_" . $prefix . "_expense_operations_" . $prefix . "_operations1` ON `" . $prefix . "_expense_operations` (`operation_id` ASC) ;

		CREATE INDEX `period` ON `" . $prefix . "_expense_operations` (`period` ASC) ;


		-- -----------------------------------------------------
		-- Table `" . $prefix . "_accounts`
		-- -----------------------------------------------------
		CREATE  TABLE IF NOT EXISTS `" . $prefix . "_accounts` (
		  `id` INT NOT NULL AUTO_INCREMENT ,
		  `name` VARCHAR(100) NOT NULL ,
		  `start_amount` MEDIUMTEXT NULL ,
		  `date_open` DATETIME NULL ,
		  PRIMARY KEY (`id`) );

		CREATE UNIQUE INDEX `id_UNIQUE` ON `" . $prefix . "_accounts` (`id` ASC) ;


		-- -----------------------------------------------------
		-- Table `" . $prefix . "_accounts_operations`
		-- -----------------------------------------------------
		CREATE  TABLE IF NOT EXISTS `" . $prefix . "_accounts_operations` (
		  `id` INT NOT NULL AUTO_INCREMENT ,
		  `operation_id` INT NOT NULL ,
		  `account_id` INT NOT NULL ,
		  `sum` MEDIUMTEXT NOT NULL ,
		  PRIMARY KEY (`id`) ,
		  CONSTRAINT `fk_" . $prefix . "_accounts_operations_" . $prefix . "_operations1`
			FOREIGN KEY (`operation_id` )
			REFERENCES `" . $prefix . "_operations` (`id` )
			ON DELETE NO ACTION
			ON UPDATE NO ACTION,
		  CONSTRAINT `fk_" . $prefix . "_accounts_operations_" . $prefix . "_accounts1`
			FOREIGN KEY (`account_id` )
			REFERENCES `" . $prefix . "_accounts` (`id` )
			ON DELETE NO ACTION
			ON UPDATE NO ACTION);

		CREATE UNIQUE INDEX `id_UNIQUE` ON `" . $prefix . "_accounts_operations` (`id` ASC) ;

		CREATE INDEX `fk_" . $prefix . "_accounts_operations_" . $prefix . "_operations1` ON `" . $prefix . "_accounts_operations` (`operation_id` ASC) ;

		CREATE INDEX `fk_" . $prefix . "_accounts_operations_" . $prefix . "_accounts1` ON `" . $prefix . "_accounts_operations` (`account_id` ASC) ;


		-- -----------------------------------------------------
		-- Table `" . $prefix . "_accounts_totals`
		-- -----------------------------------------------------
		CREATE  TABLE IF NOT EXISTS `" . $prefix . "_accounts_totals` (
		  `id` INT NOT NULL AUTO_INCREMENT ,
		  `period` DATETIME NOT NULL ,
		  `sum` MEDIUMTEXT NOT NULL ,
		  `account_id` INT NOT NULL ,
		  PRIMARY KEY (`id`) ,
		  CONSTRAINT `fk_" . $prefix . "_accounts_totals_" . $prefix . "_accounts1`
			FOREIGN KEY (`account_id` )
			REFERENCES `" . $prefix . "_accounts` (`id` )
			ON DELETE NO ACTION
			ON UPDATE NO ACTION);

		CREATE UNIQUE INDEX `id_UNIQUE` ON `" . $prefix . "_accounts_totals` (`id` ASC) ;

		CREATE INDEX `fk_" . $prefix . "_accounts_totals_" . $prefix . "_accounts1` ON `" . $prefix . "_accounts_totals` (`account_id` ASC) ;


		-- -----------------------------------------------------
		-- Table `" . $prefix . "_tags`
		-- -----------------------------------------------------
		CREATE  TABLE IF NOT EXISTS `" . $prefix . "_tags` (
		  `id` INT NOT NULL AUTO_INCREMENT ,
		  `name` VARCHAR(100) NOT NULL ,
		  PRIMARY KEY (`id`) );

		CREATE UNIQUE INDEX `id_UNIQUE` ON `" . $prefix . "_tags` (`id` ASC) ;


		-- -----------------------------------------------------
		-- Table `" . $prefix . "_operations_tags`
		-- -----------------------------------------------------
		CREATE  TABLE IF NOT EXISTS `" . $prefix . "_operations_tags` (
		  `id` INT NOT NULL AUTO_INCREMENT ,
		  `tag_id` INT NOT NULL ,
		  `operation_id` INT NOT NULL ,
		  PRIMARY KEY (`id`) ,
		  CONSTRAINT `fk_" . $prefix . "_operations_tags_" . $prefix . "_tags1`
			FOREIGN KEY (`tag_id` )
			REFERENCES `" . $prefix . "_tags` (`id` )
			ON DELETE NO ACTION
			ON UPDATE NO ACTION,
		  CONSTRAINT `fk_" . $prefix . "_operations_tags_" . $prefix . "_operations1`
			FOREIGN KEY (`operation_id` )
			REFERENCES `" . $prefix . "_operations` (`id` )
			ON DELETE NO ACTION
			ON UPDATE NO ACTION);

		CREATE UNIQUE INDEX `id_UNIQUE` ON `" . $prefix . "_operations_tags` (`id` ASC) ;

		CREATE INDEX `fk_" . $prefix . "_operations_tags_" . $prefix . "_tags1` ON `" . $prefix . "_operations_tags` (`tag_id` ASC) ;

		CREATE INDEX `fk_" . $prefix . "_operations_tags_" . $prefix . "_operations1` ON `" . $prefix . "_operations_tags` (`operation_id` ASC) ;


		-- -----------------------------------------------------
		-- Table `" . $prefix . "_budgets`
		-- -----------------------------------------------------
		CREATE  TABLE IF NOT EXISTS `" . $prefix . "_budgets` (
		  `id` INT NOT NULL AUTO_INCREMENT ,
		  `periodStart` DATETIME NULL ,
		  `periodStop` DATETIME NULL ,
		  `comment` VARCHAR(100) NULL ,
		  PRIMARY KEY (`id`) );

		CREATE UNIQUE INDEX `id_UNIQUE` ON `" . $prefix . "_budgets` (`id` ASC) ;

		CREATE UNIQUE INDEX `periodStart_UNIQUE` ON `" . $prefix . "_budgets` (`periodStart` ASC) ;

		CREATE UNIQUE INDEX `periodStop_UNIQUE` ON `" . $prefix . "_budgets` (`periodStop` ASC) ;


		-- -----------------------------------------------------
		-- Table `" . $prefix . "_income_budgets`
		-- -----------------------------------------------------
		CREATE  TABLE IF NOT EXISTS `" . $prefix . "_income_budgets` (
		  `id` INT NOT NULL AUTO_INCREMENT ,
		  `category_id` INT NOT NULL ,
		  `budget_id` INT NOT NULL ,
		  PRIMARY KEY (`id`) ,
		  CONSTRAINT `fk_" . $prefix . "_income_budgets_" . $prefix . "_income_categories1`
			FOREIGN KEY (`category_id` )
			REFERENCES `" . $prefix . "_income_categories` (`id` )
			ON DELETE NO ACTION
			ON UPDATE NO ACTION,
		  CONSTRAINT `fk_" . $prefix . "_income_budgets_" . $prefix . "_budgets1`
			FOREIGN KEY (`budget_id` )
			REFERENCES `" . $prefix . "_budgets` (`id` )
			ON DELETE NO ACTION
			ON UPDATE NO ACTION);

		CREATE UNIQUE INDEX `id_UNIQUE` ON `" . $prefix . "_income_budgets` (`id` ASC) ;

		CREATE INDEX `fk_" . $prefix . "_income_budgets_" . $prefix . "_income_categories1` ON `" . $prefix . "_income_budgets` (`category_id` ASC) ;

		CREATE INDEX `fk_" . $prefix . "_income_budgets_" . $prefix . "_budgets1` ON `" . $prefix . "_income_budgets` (`budget_id` ASC) ;


		-- -----------------------------------------------------
		-- Table `" . $prefix . "_expense_budgets`
		-- -----------------------------------------------------
		CREATE  TABLE IF NOT EXISTS `" . $prefix . "_expense_budgets` (
		  `id` INT NOT NULL AUTO_INCREMENT ,
		  `category_id` INT NOT NULL ,
		  `budget_id` INT NOT NULL ,
		  PRIMARY KEY (`id`) ,
		  CONSTRAINT `fk_" . $prefix . "_expense_budgets_" . $prefix . "_expense_categories1`
			FOREIGN KEY (`category_id` )
			REFERENCES `" . $prefix . "_expense_categories` (`id` )
			ON DELETE NO ACTION
			ON UPDATE NO ACTION,
		  CONSTRAINT `fk_" . $prefix . "_expense_budgets_" . $prefix . "_budgets1`
			FOREIGN KEY (`budget_id` )
			REFERENCES `" . $prefix . "_budgets` (`id` )
			ON DELETE NO ACTION
			ON UPDATE NO ACTION);

		CREATE UNIQUE INDEX `id_UNIQUE` ON `" . $prefix . "_expense_budgets` (`id` ASC) ;

		CREATE INDEX `fk_" . $prefix . "_expense_budgets_" . $prefix . "_expense_categories1` ON `" . $prefix . "_expense_budgets` (`category_id` ASC) ;

		CREATE INDEX `fk_" . $prefix . "_expense_budgets_" . $prefix . "_budgets1` ON `" . $prefix . "_expense_budgets` (`budget_id` ASC) ;";

?>
