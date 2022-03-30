<?php

namespace Amasty\MyModule\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

       public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig
    ){
       parent::__construct($context);
       $this->scopeConfig = $scopeConfig;
    }

    public function execute()
    {
        if($this->scopeConfig->isSetFlag('my_module_config/general/enabled')) {
            return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        } else {
            die("This page is disabled!");
        }
    }
}

