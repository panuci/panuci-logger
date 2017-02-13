<?php
 
class Panuci_Logger_Block_Adminhtml_Logger_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('panuci_logger_grid');
        $this->setDefaultSort('logger_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }
 
    protected function _prepareCollection()
    {

        $collection = Mage::getModel('logger/logger')->getCollection()->addFieldToSelect('product_id')->addFieldToSelect('field')->addFieldToSelect('oldValue')->addFieldToSelect('newValue')->addFieldToSelect('created_time')->addFieldToSelect('user');
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }
 
    protected function _prepareColumns()
    {
 
        $this->addColumn('product_id', array(
            'header' => 'Produto',
            'index'  => 'product_id',
            'renderer' => 'Panuci_Logger_Block_Adminhtml_Logger_Renderer_Product'
        ));       
 
        $this->addColumn('field', array(
            'header'  => 'Campo',
            'index'   => 'field'
        ));

        $this->addColumn('oldValue', array(
            'header'  => 'Valor Antigo',
            'index'   => 'oldValue'
        ));

        $this->addColumn('newValue', array(
            'header'  => 'Novo Valor',
            'index'   => 'newValue'
        ));

        $this->addColumn('created_time', array(
            'header'  => 'Alterado em',
            'index'   => 'created_time'
        ));

        $this->addColumn('user', array(
            'header'  => 'Alterado por',
            'index'   => 'user',
            'renderer' => 'Panuci_Logger_Block_Adminhtml_Logger_Renderer_User'
        ));
 
        return parent::_prepareColumns();
    }
 
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}