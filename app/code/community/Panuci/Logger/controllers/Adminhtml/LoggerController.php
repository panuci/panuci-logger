<?php
 
class Panuci_Logger_Adminhtml_LoggerController extends Mage_Adminhtml_Controller_Action
{

	public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('panuci_logger_tab');
        $this->_addContent($this->getLayout()->createBlock('panuci_logger/adminhtml_logger'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('panuci_logger/adminhtml_logger/grid')->toHtml()
        );
    }

    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('panuci_logger');
    }
}