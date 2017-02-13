<?php
class Foo_Bar_Block_Adminhtml_Baz_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {  
        $this->_blockGroup = 'panuci_logger';
        $this->_controller = 'adminhtml_logger';
     
        parent::__construct();
    }  
     
    /**
     * Get Header text
     *
     * @return string
     */
    public function getHeaderText()
    {  
        if (Mage::registry('panuci_logger')->getId()) {
            return $this->__('Edit Baz');
        }  
        else {
            return $this->__('New Baz');
        }  
    }  
}