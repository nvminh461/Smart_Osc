<?php

declare(strict_types=1);

namespace Nvm\Banner\Controller\Adminhtml\Banner;

use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Nvm\Banner\Api\NvmBannerRepositoryInterface;
use Psr\Log\LoggerInterface;

/**
 * Class Delete EavAttribute Controller
 * @package Nvm\Banner\Controller\Adminhtml\Banner
 */
class Delete extends \Nvm\Banner\Controller\Adminhtml\AbstractAction implements HttpGetActionInterface
{

    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Nvm_Banner::banner_delete';

    /**
     * @var NvmBannerRepositoryInterface
     */
    protected NvmBannerRepositoryInterface $_nvmBannerRepository;

    /**
     * @var LoggerInterface
     */
    protected $_logger;

    /**
     * Banner Delete constructor.
     * @param Context $context
     * @param NvmBannerRepositoryInterface $nvmBannerRepository
     * @param LoggerInterface $logger
     */
    public function __construct(
        Context                      $context,
        NvmBannerRepositoryInterface $nvmBannerRepository,
        LoggerInterface              $logger,
    ) {
        parent::__construct($context);
        $this->_nvmBannerRepository = $nvmBannerRepository;
        $this->_logger = $logger;
    }

    /**
     * Banner Delete controller action
     */
    public function execute()
    {
        $bannerId = (int)$this->getRequest()->getParam('id');
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($bannerId) {
            try {
                $banner = $this->_nvmBannerRepository->get($bannerId);
                if ($banner->getData()) {
                    $this->_nvmBannerRepository->delete($banner);
                    $this->messageManager->addSuccessMessage(__('You deleted the record.'));
                } else {
                    $this->messageManager->addErrorMessage(__('The record you delete no longer exists.'));
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->_logger->info(__('Something went wrong when deleting banner. Error: %1', $e->getMessage()));
                $this->messageManager->addErrorMessage(__('Something went wrong when deleting banner.'));
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->messageManager->addErrorMessage(__('We couldn\'t find any records.'));
        return $resultRedirect->setPath('*/*/');
    }
}
