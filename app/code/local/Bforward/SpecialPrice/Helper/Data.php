<?php

/**
 * @package    Bforward_SpecialPrice
 * @author     Bogdan Bakalov <bakalov.bogdan@gmail.com>
 */
class Bforward_SpecialPrice_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Array of available orders to be used for sort by
     * @return array
     */
    public function getAvailableOrders()
    {
        return array(
            'position' => $this->__('Position'),
            'name' => $this->__('Name'),
            'price' => $this->__('Price')
        );
    }

    /**
     * Return product collection to displayed by our list block
     * @return mixed
     */
    public function getProductCollection()
    {
        $todayDate = Mage::app()->getLocale()->date()->toString(Varien_Date::DATETIME_INTERNAL_FORMAT);
        $tomorrow = mktime(0, 0, 0, date('m'), date('d') + 1, date('y'));
        $dateTomorrow = date('m/d/y', $tomorrow);

        $collection = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToFilter('special_price', array('gteq' => 0))
            ->addFieldToFilter('special_from_date', array('or' => array(
                0 => array('date' => true, 'to' => $todayDate),
                1 => array('is' => new Zend_Db_Expr('null'))),
            ), 'left')
            ->addFieldToFilter('special_to_date', array('or' => array(
                0 => array('date' => true, 'from' => $dateTomorrow),
                1 => array('is' => new Zend_Db_Expr('null'))),
            ), 'left')
            ->addAttributeToFilter(array(
                    array('attribute' => 'special_from_date', 'is' => new Zend_Db_Expr('not null')),
                    array('attribute' => 'special_to_date', 'is' => new Zend_Db_Expr('not null'))
                )
            )
            ->addAttributeToSelect(Mage::getSingleton('catalog/config')->getProductAttributes());

        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($collection);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($collection);

        return $collection;
    }

    /**
     * Get value from System->configuration->special price
     * @return mixed
     */
    public function getExtensionStatus()
    {
        return Mage::getStoreConfig('special_price/form/status');
    }

    /**
     * Get value from System->configuration->special price
     * @return mixed
     */
    public function getItemName()
    {
        return Mage::getStoreConfig('special_price/form/status');
    }
}