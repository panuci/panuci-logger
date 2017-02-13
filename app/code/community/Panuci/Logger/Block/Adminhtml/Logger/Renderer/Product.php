<?php

class Panuci_Logger_Block_Adminhtml_Logger_Renderer_Product extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{	

	public function render(Varien_Object $row)
	{
		$productId =  $row->getData($this->getColumn()->getIndex());
		$product = Mage::getModel('catalog/product')->load($productId);		

		return $product->getName() . ' (Sku: ' . $product->getSku() . ')';
	}
}