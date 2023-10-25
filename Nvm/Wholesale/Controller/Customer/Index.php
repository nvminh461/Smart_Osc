<?php

namespace Nvm\Wholesale\Controller\Customer;

use Magento\Framework\View\Result\Page;
use Nvm\Wholesale\Controller\Customer as CustomerController;
use Magento\Framework\Controller\ResultFactory;

class Index extends CustomerController
{
    /**
     * Render my product wholesale
     *
     * @return Page
     */
    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        if ($navigationBlock = $resultPage->getLayout()->getBlock('customer_account_navigation')) {
            $navigationBlock->setActive('wholesale/customer');
        }
        if ($block = $resultPage->getLayout()->getBlock('wholesale_customer_list')) {
            $block->setRefererUrl($this->_redirect->getRefererUrl());
        }
        $resultPage->getConfig()->getTitle()->set(__('My Product Wholesale'));
        return $resultPage;
    }
}
