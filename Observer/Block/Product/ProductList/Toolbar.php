<?php

namespace Dolphin\CustomSorting\Observer\Block\Product\ProductList;

use Magento\Catalog\Helper\Product\ProductList;
use Magento\Catalog\Model\Product\ProductList\Toolbar as ToolbarModel;
use Magento\Catalog\Model\Product\ProductList\ToolbarMemorizer;
use Magento\Framework\App\ObjectManager;
use Dolphin\CustomSorting\Helper\Data;

class Toolbar extends \Magento\Catalog\Block\Product\ProductList\Toolbar
{

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\Session $catalogSession,
        \Magento\Catalog\Model\Config $catalogConfig,
        ToolbarModel $toolbarModel,
        \Magento\Framework\Url\EncoderInterface $urlEncoder,
        ProductList $productListHelper,
        \Magento\Framework\Data\Helper\PostHelper $postDataHelper,
        Data $helperData,
        array $data = [],
        ToolbarMemorizer $toolbarMemorizer = null,
        \Magento\Framework\App\Http\Context $httpContext = null,
        \Magento\Framework\Data\Form\FormKey $formKey = null
    ) {
        parent::__construct(
            $context, 
            $catalogSession,
            $catalogConfig, 
            $toolbarModel, 
            $urlEncoder, 
            $productListHelper, 
            $postDataHelper,
            $data,
            $toolbarMemorizer, 
            $httpContext, 
            $formKey
        );
        $this->helperData = $helperData;
    }

    protected function getOrderField()
    {
        if ($this->helperData->getModuleStatus() && $this->helperData->getDefaultConfig()) {
            return 'stock';
        } else {
            if ($this->_orderField === null) {
                $this->_orderField = $this->_productListHelper->getDefaultSortField();
            }
            return $this->_orderField;
        }
    }
}
