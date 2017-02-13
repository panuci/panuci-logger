<?php
  
class Panuci_Logger_Model_Resource_Logger extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {  
        $this->_init('logger/logger', 'logger_id');
    }
} 