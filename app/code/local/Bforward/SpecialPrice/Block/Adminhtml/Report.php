<?php
/**
 * @package    Bforward_SpecialPrice
 * @author     Bogdan Bakalov <bakalov.bogdan@gmail.com>
 */
class Bforward_SpecialPrice_Block_Adminhtml_Report extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Init grid container
     */
    public function __construct()
    {
        $this->_blockGroup = 'bforward_special_price';
        $this->_controller = 'adminhtml_report';
        $this->_headerText = Mage::helper('bforward_special_price')->__('Special Price Report');

        parent::__construct();
        $this->_removeButton('add');
    }
}