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
        $data = $this->getRequest()->getParams();

        if(empty($data['sku']) || empty($data['qty'])) {
            $this->messageManager->addErrorMessage('Fill up the fields: SKU, QTY.');
            return $this->resultRedirectFactory->create()->setPath('andrewbar');
        }

        $quote = $this->checkoutSession->getQuote();

        if(!$quote->getId()) {
            $quote->save();
        }

        try {
            $product = $this->productRepository->get($data['sku']);
        } catch (\Exception $e) {
            if ($e->getCode() === 0) {
                $this->messageManager->addNoticeMessage('Wrong sku! Input right product-sku!');
                return $this->resultRedirectFactory->create()->setPath('andrewbar');
            }
        }

        if($product->getTypeId() != 'simple') {
            $this->messageManager->addNoticeMessage('The product is not simple! Please, choose simple product!');
            return $this->resultRedirectFactory->create()->setPath('andrewbar');
        }

        $stockItem = $product->getExtensionAttributes()->getStockItem();

        if ($stockItem->getQty() < $data['qty']) {
            $this->messageManager->addNoticeMessage('Please, choose quantity less than ' . $stockItem->getQty() );
            return $this->resultRedirectFactory->create()->setPath('andrewbar');
        }

        $quote->addProduct($product, $data['qty']);
        $quote->save();
        $this->messageManager->addSuccessMessage('The Product is added to cart!');
        return $this->resultRedirectFactory->create()->setPath('andrewbar');
    }

}
