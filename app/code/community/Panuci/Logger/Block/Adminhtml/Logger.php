<?php
class Panuci_Logger_Block_Adminhtml_Logger extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'panuci_logger';
        $this->_controller = 'adminhtml_logger';
        $this->_headerText = 'Logger List';
         
        parent::__construct();
        $this->_removeButton('add');
    }
}