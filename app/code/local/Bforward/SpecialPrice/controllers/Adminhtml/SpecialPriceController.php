<?php

/**
 * @package    Bforward_SpecialPrice
 * @author     Bogdan Bakalov <bakalov.bogdan@gmail.com>
 */
class Bforward_SpecialPrice_Adminhtml_SpecialPriceController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Special Price Report'));
        $this->loadLayout();
        $this->_setActiveMenu('report/products');
        $this->_addContent($this->getLayout()->createBlock('bforward_special_price/adminhtml_report'));
        $this->renderLayout();
    }

    /**
     * Grid action
     *
     * @return null
     */
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('bforward_special_price/adminhtml_report_grid')->toHtml()
        );
    }
}