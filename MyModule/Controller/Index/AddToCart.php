<?php

namespace Amasty\MyModule\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class AddToCart extends Action
{

//    /**
//     * @var NoSuchEntityException
//     */
//    protected $exception;

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;

    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    protected $productRepository;

    public function __construct(
        Context $context,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
    ){
        parent::__construct($context);
        $this->checkoutSession = $checkoutSession;
        $this->productRepository = $productRepository;
    }

    public function execute()
    {
        if(empty($_POST['sku']) || empty($_POST['qty'])) {
            die('<a href="http://localhost/magento/andrewbar">Fill up the fields: sku, qty.</a>');
        }
        $quote = $this->checkoutSession->getQuote();

        if(!$quote->getId()) {
            $quote->save();
        }

        try {
            $product = $this->productRepository->get($_POST['sku']);
        } catch (\Exception $e) {
            if ($e->getCode() === 0) die('Wrong sku! <a href="http://localhost/magento/andrewbar">Input right product-sku!</a>');
        }

        if($product->getTypeId() != 'simple') die('The product is not simple! Please, <a href="http://localhost/magento/andrewbar">Choose simple product!</a>');

        $stockItem = $product->getExtensionAttributes()->getStockItem();

        if ($stockItem->getQty() < $_POST['qty']) die('There is not enough of the product quantity. Please, <a href="http://localhost/magento/andrewbar">Choose the quantity less than '. $stockItem->getQty() .'</a>');

//        die('prod');
        $quote->addProduct($product, $_POST['qty']);
        $quote->save();
        $this->_redirect('andrewbar');
    }
}
