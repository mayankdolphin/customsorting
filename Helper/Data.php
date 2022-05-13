<?php

namespace Dolphin\CustomSorting\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

class Data extends AbstractHelper
{
    const XML_PATH_MODULE_STATUS_CONFIG = 'customsorting/general/enable';
    const XML_PATH_MODULE_DEFAULT_CONFIG = 'customsorting/general/default';
    const XML_PATH_MODULE_OOSLAST_CONFIG = 'customsorting/general/ooslast';

    public $_storeManager;
    public function __construct(
        StoreManagerInterface $storeManager,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->_storeManager = $storeManager;
        $this->scopeConfig = $scopeConfig;
    }

    public function getStoreId()
    {
        return $this->_storeManager->getStore()->getId();
    }

    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $field,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    public function getModuleStatus($storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_MODULE_STATUS_CONFIG, $storeId);
    }

    public function getDefaultConfig($storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_MODULE_DEFAULT_CONFIG, $storeId);
    }

    public function getOOSLastConfig($storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_MODULE_OOSLAST_CONFIG, $storeId);
    }
}
