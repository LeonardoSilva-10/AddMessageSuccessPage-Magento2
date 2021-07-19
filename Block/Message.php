<?php
namespace LsBr\MessageAdditionalSuccessPage\Block;

use Magento\Framework\View\Element\Template;
use LsBr\MessageAdditionalSuccessPage\Helper\Config as ConfigHelper;
use LsBr\MessageAdditionalSuccessPage\Helper\Log as LogHelper;

class Message extends Template
{

    /**
     * Message constructor.
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        if($this->getEnabled())
        {
            return ConfigHelper::MESSAGE;
        }
    }

    /**
     * @return string
     */
    public function getStyle(): string
    {
        if($this->getEnabled())
        {
            return ConfigHelper::STYLE;
        }
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        try {
            return $this->config->getConfigValue(Config::ENABLED);
        } catch (\Exception $e){
            LogHelper::createLog($e->getMessage());
        }
    }
}
