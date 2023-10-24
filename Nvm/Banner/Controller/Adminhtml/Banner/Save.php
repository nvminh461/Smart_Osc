<?php

declare(strict_types=1);

namespace Nvm\Banner\Controller\Adminhtml\Banner;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Backend\Model\Auth\Session as AuthSession;
use Nvm\Banner\Api\NvmBannerRepositoryInterface;
use Nvm\Banner\Helper\ImageUploader;

/**
 * Class Save Banner
 * @package Nvm\Banner\Controller\Adminhtml\Banner
 */
class Save extends \Nvm\Banner\Controller\Adminhtml\AbstractAction
{
    const ADMIN_RESOURCE = 'Dev_Banner::banner_edit';

    /**
     * @var AuthSession
     */
    protected $authSession;

    /**
     * @var NvmBannerRepositoryInterface
     */
    protected NvmBannerRepositoryInterface $bannerRepository;

    /**
     * @var ImageUploader
     */
    protected ImageUploader $imageUploader;

    /**
     * @param Context $context
     * @param AuthSession $authSession
     * @param NvmBannerRepositoryInterface $bannerRepository
     * @param ImageUploader $imageUploader
     */
    public function __construct(
        Action\Context $context,
        AuthSession $authSession,
        NvmBannerRepositoryInterface $bannerRepository,
        ImageUploader    $imageUploader
    ) {
        $this->bannerRepository = $bannerRepository;
        $this->authSession = $authSession;
        $this->imageUploader = $imageUploader;
        parent::__construct($context);
    }


    public function execute()
    {
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $currentUser = $this->authSession->getUser();
        $data = $this->getRequest()->getPostValue();

        if ($data) {
            if (empty($data['banner_id'])) {
                $data['banner_id'] = null;
            }

            $banner = $this->bannerRepository->get((int)$data['banner_id']);
            $data['banner_image'] = $data['imageField'][0]['name'];
            $data['editor'] = $currentUser->getData('username');
            $banner->setData($data);

            try {
                $this->bannerRepository->save($banner);
                $this->imageUploader->copyImageToBannerDirectory($banner['banner_image']);
                $this->messageManager->addSuccess(__('You saved the banner.'));
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $banner->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the banner.'));
            }

            return $resultRedirect->setPath('*/*/edit', ['id' => (int)$data['banner_id']]);
        }

        return $resultRedirect->setPath('*/*/');
    }
}
