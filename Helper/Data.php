<?php
namespace MagePrashant\ShareButtons\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

/**
 * Class Data
 * @package MagePrashant\ShareButtons\Helper
 */
class Data extends AbstractHelper
{
    /**
     *
     */
    const CONFIG_IS_ENABLED = 'sharebuttons/config/is_enabled';

    /**
     * @var ScopeConfig
     */
    protected $_scopeConfig;

    /**
     * Data constructor.
     * @param Context $context
     * @param ScopeConfig $scopeConfig
     */
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
        $this->_scopeConfig = $context->getScopeConfig();
    }

    /**
     * @param $storePath
     * @return mixed
     */
    public function getStoreConfig($storePath)
    {
        return $this->_scopeConfig->getValue(
            $storePath,
            ScopeInterface::SCOPE_STORE
        );
    }
	
    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return self::getStoreConfig(self::CONFIG_IS_ENABLED);
    }
}
