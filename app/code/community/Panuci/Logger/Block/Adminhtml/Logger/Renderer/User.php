<?php

class Panuci_Logger_Block_Adminhtml_Logger_Renderer_User extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{	

	public function render(Varien_Object $row)
	{
		$userId =  $row->getData($this->getColumn()->getIndex());
		$user = Mage::getModel('admin/user')->load($userId);		
		return $user->getUsername();
	}
}