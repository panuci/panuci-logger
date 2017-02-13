<?php 

class Panuci_Logger_Model_Observer {

    public function saveProductBefore(Varien_Event_Observer $observer) {
        try {
            $logs = $this->getChanges($observer);
            foreach ($logs as $log) {
                $model = Mage::getModel('logger/logger')->addData($log);
                $model->save();
            }	
    	}catch(Exception $e){
    		Mage::log($e->getMessage(), null, 'panuciLoggerErrors.log');
    	}
    }

    private function getChanges($observer){
		$newProduct = $observer->getProduct();
        $oldProduct = Mage::getModel('catalog/product')->load($newProduct->getId());
    	$user = Mage::getSingleton('admin/session')->getUser()->getUserId();
    	$created_time = Mage::getModel('core/date')->date('Y-m-d H:i:s');

        $laReturn = array();
        
        // Price
        if($oldProduct->getData('price') != $newProduct->getData('price')){
        	$laReturn[] = array(
        						'field' => 'price',
        						'product_id' => $oldProduct->getId(),
        						'oldValue' => floatval($oldProduct->getData('price')),
        						'newValue' => floatval($newProduct->getData('price')),
        						'created_time' => $created_time,
        						'user' => $user
        					);
        }

                
        // Stock
        $oldStock = Mage::getModel('cataloginventory/stock_item')->loadByProduct($newProduct);
        if(floatval($newProduct->getStockData()['qty']) != floatval($oldStock->getQty())){
        	$laReturn[] = array(
        						'field' => 'stockQty',
        						'product_id' => $oldProduct->getId(),
        						'oldValue' => floatval($oldStock->getQty()),
        						'newValue' => floatval($newProduct->getStockData()['qty']),
        						'created_time' => $created_time,
        						'user' => $user
        					);
        }

        return $laReturn;
    }
}