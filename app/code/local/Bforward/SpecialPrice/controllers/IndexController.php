<?php

/**
 * @package    Bforward_SpecialPrice
 * @author     Bogdan Bakalov <bakalov.bogdan@gmail.com>
 */
class Bforward_SpecialPrice_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $configStatus = Mage::helper('bforward_special_price')->getExtensionStatus();
        if ($configStatus) {
            $this->loadLayout();
            $this->renderLayout();
        } else {
            $this->norouteAction();
        }
    }
}