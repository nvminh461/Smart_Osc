<?php

declare(strict_types=1);

namespace Nvm\Banner\Controller\Adminhtml\Banner;

use Nvm\Banner\Model\Banner;
use Nvm\Banner\Model\BannerFactory;
use Nvm\Banner\Model\ResourceModel\Banner\CollectionFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Nvm\Banner\Api\NvmBannerRepositoryInterface;

/**
 * Class Edit Banner Controller
 * @package Ecip\M2SettingsManager\Controller\Adminhtml\EavAttribute
 */
class Edit extends \Nvm\Banner\Controller\Adminhtml\AbstractAction implements HttpGetActionInterface
{

    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Nvm_Banner::banner_edit';

    /**
     * @var Registry
     */
    protected Registry $_coreRegistry;

    /**
     * @var PageFactory
     */
    protected PageFactory $resultPageFactory;

    /**
     * @var BannerFactory
     */
    private BannerFactory $bannerFactory;

    /**
     * @var CollectionFactory
     */
    private CollectionFactory $extEavAttributeCollection;

    /**
     * @var ResourceConnection
     */
    private ResourceConnection $resourceConnection;

    /**
     * @var NvmBannerRepositoryInterface
     */
    protected NvmBannerRepositoryInterface $_nvmBannerRepository;

    /**
     * Banner Edit constructor
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param Registry $registry
     * @param BannerFactory $bannerFactory
     * @param CollectionFactory $bannerCollection
     * @param ResourceConnection $resourceConnection
     * @param NvmBannerRepositoryInterface $nvmBannerRepository
     */
    public function __construct(
        Context                 $context,
        PageFactory             $resultPageFactory,
        Registry                $registry,
        BannerFactory  $bannerFactory,
        CollectionFactory       $bannerCollection,
        ResourceConnection      $resourceConnection,
        NvmBannerRepositoryInterface $nvmBannerRepository,
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->bannerFactory = $bannerFactory;
        $this->bannerCollection = $bannerCollection;
        $this->resourceConnection = $resourceConnection;
        $this->_nvmBannerRepository = $nvmBannerRepository;
        parent::__construct($context);
    }

    /**
     * Eav Edit controller action
     *
     * @return Redirect|ResultInterface|Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $bannerId = (int)$this->getRequest()->getParam('id');

        if ($bannerId) {
            $banner = $this->_nvmBannerRepository->get($bannerId)->getData();
            if (!$banner) {
                $this->messageManager->addErrorMessage(__('The record you edit no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
            $this->_coreRegistry->register('banner', $banner);
        }

        $title = $bannerId ? __('Edit Banner Attribute') : __('New Banner Attribute');
        $this->initPage($resultPage)->addBreadcrumb($title, $title);
        $resultPage->getConfig()->getTitle()->prepend($title);

        return $resultPage;
    }
}
