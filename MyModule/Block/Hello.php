<?php

namespace Amasty\MyModule\Block;

use Magento\Framework\View\Element\Template;

class Hello extends Template
{
    public function sayHello()
    {
        return 'Hello World!';
    }
}
