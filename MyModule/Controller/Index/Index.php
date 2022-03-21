<?php

namespace Amasty\MyModule\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    public function execute()
    {
//        die('Hello!');
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}

//__________________________________________________________
// class Index extends \Magento\Framework\App\Action\Action {

//    protected $resultPageFactory;
//    protected $request;

//  public function __construct(
//    \Magento\Framework\App\Action\Context $context,
//    \Magento\Framework\App\Request\Http $request,
//   \Magento\Framework\View\Result\PageFactory $resultPageFactory)
//    {

//        $this->resultPageFactory = $resultPageFactory;
//        $this->request = $request;

//        parent::__construct($context);
//    }

//    public function execute()
//    {
//        $fullActionName= $this->request->getFullActionName();
//        $resultPage = $this->resultPageFactory->create();
//        $resultPage->getConfig()->getTitle()->prepend(__($fullActionName.'test example'));
//        return $resultPage;
//    }
// }

//---------------------------------------------------------------


//-----------------------------------------------------------------------------
// use Magento\Framework\App\ActionInterface;
// use Magento\Framework\Controller\ResultFactory;
//
// class Index implements ActionInterface
// {
//    /**
//     * @var ResultFactory
//     */
//    private $resultFactory;
//
//    public function __construct(
//       ResultFactory $resultFactory
//    )
//    {
//       $this->resultFactory = $resultFactory;
//    }
//
//    public function execute()
//    {
//       // die("Hello!");
//       return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
//    }
// }
