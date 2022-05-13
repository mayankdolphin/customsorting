<?php

namespace Dolphin\CustomSorting\Model\Elasticsearch\Adapter\DataMapper;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;
use Dolphin\CustomSorting\Model\ResourceModel\Inventory;

class AttributesToSort
{
    private $inventory;
    private $storeManager;

    public function __construct(
        Inventory $inventory,
        StoreManagerInterface $storeManager
    ) {
        $this->inventory = $inventory;
        $this->storeManager = $storeManager;
    }

    public function map($entityId, $storeId)
    {
        $attrToSort = [];
        $sku = $this->inventory->getSkuRelation((int)$entityId);
        if ($sku) {
            $websiteCode = $this->storeManager->getStore($storeId)->getWebsite()->getCode();
            $attrToSort['stock'] = $this->inventory->getStockStatus($sku, $websiteCode);
        } else {
            $attrToSort['stock'] = 0;
        }

        return $attrToSort;
    }
}
