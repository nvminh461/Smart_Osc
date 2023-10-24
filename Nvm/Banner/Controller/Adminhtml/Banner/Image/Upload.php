<?php

declare(strict_types=1);

namespace Nvm\Banner\Controller\Adminhtml\Banner\Image;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Nvm\Banner\Helper\ImageUploader;

/**
 * Class upload banner
 * @package Nvm\Banner\Controller\Adminhtml\Banner\Image
 */
class Upload extends \Nvm\Banner\Controller\Adminhtml\AbstractAction implements HttpPostActionInterface
{
    /**
     * @var ImageUploader
     */
    protected ImageUploader $imageUploader;

    /**
     * @param Context $context
     * @param ImageUploader $imageUploader
     */
    public function __construct(
        Context $context,
        ImageUploader    $imageUploader
    ) {
        parent::__construct($context);
        $this->imageUploader = $imageUploader;
    }

    /**
     * @return bool
     */
    protected function _isAllowed(): bool
    {
        return $this->_authorization->isAllowed('Dev_Banner::banner_edit');
    }

    /**
     * @return ResponseInterface|Json|(Json&ResultInterface)|ResultInterface
     */
    public function execute()
    {
        $imageId = $this->_request->getParam('param_name', 'image');
        try {
            $result = $this->imageUploader->saveFileToTmpDir($imageId);
        } catch (\Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}
