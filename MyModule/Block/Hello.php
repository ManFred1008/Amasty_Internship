<?php

namespace Amasty\MyModule\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;

class Hello extends Template
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

    public function sayHello()
    {
        return 'Hello World!';
    }

    public function getWelcomeText()
    {
        return $this->scopeConfig->getValue('my_module_config/general/welcome_text') ?: 'Set welcome text.';
    }
}
