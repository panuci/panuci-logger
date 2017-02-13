<?php

$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer->startSetup();
  
$installer->run("
  
-- DROP TABLE IF EXISTS panuci_logger;
CREATE TABLE panuci_logger (
  `logger_id` int(11) unsigned NOT NULL auto_increment,
  `field` varchar(255) NOT NULL default '',
  `product_id` varchar(255) NOT NULL default '',
  `oldValue` text NOT NULL default '',
  `newValue` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `user` int(11) NULL,
  PRIMARY KEY (`logger_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
    ");
  
$installer->endSetup(); 