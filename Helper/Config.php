<?php
namespace LsBr\MessageAdditionalSuccessPage\Helper;

use Exception;
use LsBr\MessageAdditionalSuccessPage as LogHelper;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class Config extends AbstractHelper
{

    const BASE_CONFIG = 'lsbrmessageadditional/general';
    const ENABLED = self::BASE_CONFIG . '/active';
    const MESSAGE = self::BASE_CONFIG . '/message';
    const STYLE = self::BASE_CONFIG . '/style';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    /**
     *
     * @param String $field
     * @param null $storeId
     * @return void
     * @throws Exception
     */
    public function getConfigValue(string $field, $storeId = null)
    {
        try {
            return $this->scopeConfig->getValue(
                $field,
                ScopeInterface::SCOPE_STORE,
                $storeId
            );
        } catch (Exception $e) {
            LogHelper::createLog($e->getMessage());
            throw $e;
        }
    }
}
