<?php

namespace Nvm\Wholesale\Controller\Customer;

use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\Forward;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Page;
use Magento\Review\Controller\Customer as CustomerController;
use Magento\Review\Model\ReviewFactory;
use Nvm\Wholesale\Model\ContactFactory;

class View extends CustomerController
{
    /**
     * @var ReviewFactory
     */
    protected $reviewFactory;

    /**
     * @param Context $context
     * @param CustomerSession $customerSession
     * @param ContactFactory $reviewFactory
     */
    public function __construct(
        Context         $context,
        CustomerSession $customerSession,
        ContactFactory  $wholesaleFactory
    ) {
        $this->wholesaleFactory = $wholesaleFactory;
        parent::__construct($context, $customerSession);
    }

    /**
     * Render review details
     *
     */
    public function execute()
    {
        $wholesale = $this->wholesaleFactory->create()->load($this->getRequest()->getParam('id'));
        if ($wholesale->getCustomerId() != $this->customerSession->getCustomerId()) {
            /** @var Forward $resultForward */
            $resultForward = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);
            $resultForward->forward('noroute');
            return $resultForward;
        }
        /** @var Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        if ($navigationBlock = $resultPage->getLayout()->getBlock('customer_account_navigation')) {
            $navigationBlock->setActive('wholesale/customer');
        }
        $resultPage->getConfig()->getTitle()->set(__('Wholesale Details'));
        return $resultPage;
    }
}
