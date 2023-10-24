<?php

declare(strict_types=1);

namespace Nvm\Banner\Controller\Adminhtml\Banner;

use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Nvm\Banner\Api\NvmBannerRepositoryInterface;
use Nvm\Banner\Model\ResourceModel\Banner\CollectionFactory;

/**
 * Class MassDisable
 * @package Nvm\Banner\Controller\Adminhtml\Banner
 */
class MassDisable extends \Nvm\Banner\Controller\Adminhtml\AbstractAction implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Dev_Banner::banner_edit';

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
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        NvmBannerRepositoryInterface $nvmBannerRepository
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->nvmBannerRepository = $nvmBannerRepository;
        parent::__construct($context);
    }

    /**
     * Execute action
     *
     * @return Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());

        foreach ($collection as $item) {
            $item->setStatus(0);
            $this->nvmBannerRepository->save($item);
        }

        $this->messageManager->addSuccessMessage(
            __('A total of %1 record(s) have been hidden.', $collection->getSize())
        );

        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}
