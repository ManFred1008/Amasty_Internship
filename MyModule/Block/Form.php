<?php

namespace Amasty\MyModule\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;

class Form extends Template
{
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    public function __construct(
        Template\Context $context,
        ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Returns action url for contact form
     *
     * @return string
     */

    public function getFormAction()
    {
        return $this->getUrl('andrewbar/index/addtocart', ['_secure' => true]);
    }

    public function getQty()
    {
        return ($this->scopeConfig->isSetFlag('my_module_config/qty_settings/qty_enabled')) ?: false;
    }

    public function getQtyValue()
    {
        return $this->scopeConfig->getValue('my_module_config/qty_settings/default_qty') ?: 0;
    }
}


