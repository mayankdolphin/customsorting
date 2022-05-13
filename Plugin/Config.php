<?php

namespace Dolphin\CustomSorting\Plugin;

use Dolphin\CustomSorting\Helper\Data;

class Config
{
    public function __construct(
        Data $helperData
    )
    {
        $this->helperData = $helperData;
    }

    public function afterGetAttributeUsedForSortByArray(\Magento\Catalog\Model\Config $catalogConfig, $options)
    {
        if ($this->helperData->getModuleStatus()) {
            $newOptions = ['stock' => __('Out of Stock')];
            $options = array_merge($options, $newOptions);
        }
        return $options;
    }
}