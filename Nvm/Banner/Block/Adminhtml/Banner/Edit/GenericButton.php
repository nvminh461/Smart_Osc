<?php

declare(strict_types=1);

namespace Nvm\Banner\Block\Adminhtml\Banner\Edit;

use Magento\Backend\Block\Widget\Context;

/**
 * Class GenericButton
 * @package Nvm\Banner\Block\Adminhtml\Banner\Edit
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected Context $context;

    /**
     * @param Context $context
     */
    public function __construct(
        Context $context,
    ) {
        $this->context = $context;
    }

    /**
     * @return mixed|null
     */
    public function getBannerId(): mixed
    {
        $bannerId = $this->context->getRequest()->getParam('id');
        if ($bannerId) {
            return $bannerId;
        }
        return null;
    }

    /**
     * @param $route
     * @param $params
     * @return string
     */
    public function getUrl($route = '', $params = []): string
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
