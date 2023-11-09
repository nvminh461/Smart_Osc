<?php

declare(strict_types=1);

namespace Nvm\Wholesale\Block\Adminhtml\Contact\View;

use Magento\Backend\Block\Widget\Context;

/**
 * Class GenericButton
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected Context $context;

    /**
     * GenericButton constructor.
     *
     * @param Context $context
     */
    public function __construct(
        Context $context,
    ) {
        $this->context = $context;
    }

    /**
     * Get the URL for the given route and parameters
     *
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
