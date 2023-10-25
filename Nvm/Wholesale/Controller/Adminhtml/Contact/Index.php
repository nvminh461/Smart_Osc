<?php

namespace Dev\Wholesale\Controller\Adminhtml\Contact;

use Magento\Backend\App\Action;

class Index extends Action
{

    protected $resultPageFactory;


    /**
     * Index constructor.
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context        $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }


    /**
     * Execute action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magento_Customer::customer_manage');
        $resultPage->getConfig()->getTitle()->prepend(__('Contact Manager'));

        return $resultPage;
    }
}
