<?php

declare(strict_types=1);

namespace Nvm\Banner\Controller\Adminhtml\Banner;

use Magento\Framework\App\Action\HttpGetActionInterface;

/**
 * Class New Action
 * @package Nvm\Banner\Controller\Adminhtml\Banner
 */
class NewAction extends \Nvm\Banner\Controller\Adminhtml\AbstractAction implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = 'Dev_Banner::banner_edit';

    protected $resultForwardFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}
