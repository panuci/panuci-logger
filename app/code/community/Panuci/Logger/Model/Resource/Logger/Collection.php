<?php
class Panuci_Logger_Model_Resource_Logger_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {        
        $this->_init('logger/logger');
    }
}