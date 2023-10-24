<?php

declare(strict_types=1);

namespace Nvm\Banner\Controller\Adminhtml\Banner;

use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Ui\Component\MassAction\Filter;
use Nvm\Banner\Api\NvmBannerRepositoryInterface;
use Nvm\Banner\Model\ResourceModel\Banner\CollectionFactory;

/**
 * Class MassDelete
 * @package Nvm\Banner\Controller\Adminhtml\Banner
 */
class MassDelete extends \Nvm\Banner\Controller\Adminhtml\AbstractAction implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Dev_Banner::banner_delete';

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var NvmBannerRepositoryInterface
     */
    protected $nvmBannerRepository;

    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param NvmBannerRepositoryInterface $nvmBannerRepository
     */
    public function __construct(Context $context, Filter $filter, CollectionFactory $collectionFactory, NvmBannerRepositoryInterface $nvmBannerRepository)
    {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->nvmBannerRepository = $nvmBannerRepository;
        parent::__construct($context);
    }

    /**
     * Execute action
     *
     * @return Redirect
     * @throws LocalizedException|\Exception
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();

        foreach ($collection as $banner) {
            try {
                $this->nvmBannerRepository->delete($banner);
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('An error occurred while deleting the banner.'));
            }
        }

        $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deleted.', $collectionSize));

        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        return $resultRedirect->setPath('*/*/');
    }
}
