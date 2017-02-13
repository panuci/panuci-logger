<?php
class Panuci_Logger_Block_Adminhtml_Logger_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Init class
     */
    public function __construct()
    {  
        parent::__construct();
     
        $this->setId('panuci_logger_logger_form');
        $this->setTitle($this->__('Logger Information'));
    }  
     
    protected function _prepareForm()
    {  
        $model = Mage::registry('panuci_logger');
     
        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('logger_id'))),
            'method'    => 'post'
        ));
     
        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend'    => Mage::helper('checkout')->__('Logger Information'),
            'class'     => 'fieldset-wide',
        ));
     
        if ($model->getLoggerId()) {
            $fieldset->addField('logger_id', 'hidden', array(
                'name' => 'logger_id',
            ));
        }  
     
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
     
        return parent::_prepareForm();
    }  
}