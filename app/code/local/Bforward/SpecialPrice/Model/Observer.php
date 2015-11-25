<?php
/**
 * @package    Bforward_SpecialPrice
 * @author     Bogdan Bakalov <bakalov.bogdan@gmail.com>
 */
class Bforward_SpecialPrice_Model_Observer
{
    public function addToTopmenu(Varien_Event_Observer $observer)
    {
        $configStatus = Mage::helper('bforward_special_price')->getExtensionStatus();
        if ($configStatus) {
            $fieldName = Mage::helper('bforward_special_price')->getItemName();
            $menu = $observer->getMenu();
            $tree = $menu->getTree();

            $node = new Varien_Data_Tree_Node(array(
                'name' => $fieldName,
                'id' => 'special_price',
                'url' => Mage::getUrl('special_price'),
            ), 'id', $tree, $menu);

            $menu->addChild($node);
        }
    }
}