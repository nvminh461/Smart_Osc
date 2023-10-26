<?php

namespace Nvm\Wholesale\Controller\Adminhtml\Contact;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Nvm\Wholesale\Api\NvmWholesaleRepositoryInterface;

class View extends Action implements HttpGetActionInterface
{
    /**
     * @var Registry
     */
    protected Registry $_coreRegistry;

    /**
     * @var PageFactory
     */
    protected PageFactory $resultPageFactory;

    /**
     * @var NvmWholesaleRepositoryInterface
     */
    private NvmWholesaleRepositoryInterface $wholesaleRepository;
    /**
     * View constructor.
     *
     * @param Action\Context $context
     * @param PageFactory $resultPageFactory
     * @param Registry $registry
     * @param NvmWholesaleRepositoryInterface $wholesaleRepository
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        NvmWholesaleRepositoryInterface $wholesaleRepository,
        Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->wholesaleRepository = $wholesaleRepository;
        parent::__construct($context);
    }

    /**
     * Initialize action
     *
     */
    protected function _initAction()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magento_Customer::customer_manage');
        return $resultPage;
    }

    /**
     * Execute action
     *
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('contact_id');
        // 2. Initial checking
        if ($id) {
            $model = $this->wholesaleRepository->get($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This contact no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->_coreRegistry->register('contact', $model);

        $resultPage = $this->_initAction();
        $resultPage->getConfig()->getTitle()
            ->prepend(__('Contact Customer'));

        return $resultPage;
    }
}
