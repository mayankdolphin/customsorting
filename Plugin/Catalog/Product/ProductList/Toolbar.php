<?php

namespace Dolphin\CustomSorting\Plugin\Catalog\Product\ProductList;

use Dolphin\CustomSorting\Helper\Data;
use Magento\Framework\Registry;

class Toolbar
{
    public function __construct(
        Data $helperData,
        \Magento\Catalog\Model\Product\ProductList\Toolbar $toolbarModel,
        Registry $registry
    ) {
        $this->helperData = $helperData;
        $this->toolbarModel = $toolbarModel;
        $this->registry = $registry;
    }

    public function afterGetCurrentDirection($subject, $dir)
    {
        if($this->helperData->getModuleStatus() && $this->helperData->getOOSLastConfig() ){
            $defaultDir = $this->isDescDir($subject->getCurrentOrder()) ? 'desc' : 'asc';
            $subject->setDefaultDirection($defaultDir);

            if (!$this->toolbarModel->getDirection()
            ) {
                $dir = $defaultDir;
            }
        }
        return $dir;
    }

    private function isDescDir($order)
    {
        $attributeCodes = 'stock';

        if ($attributeCodes) {
            $shouldBeDesc = explode(',', $attributeCodes);
        }

        return in_array($order, $shouldBeDesc);
    }
}
