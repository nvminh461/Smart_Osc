<?php

declare(strict_types=1);

namespace Nvm\Banner\Block\Adminhtml\Banner\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class Delete Button
 * @package Nvm\Banner\Block\Adminhtml\Banner\Edit
 */
class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData(): array
    {
        $data = [];
        if ($this->getBannerId()) {
            $data = [
                'label' => __('Delete Banner'),
                'class' => 'action-secondary',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to do this?'
                ) . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     * Url to send delete requests to.
     *
     * @return string
     */
    public function getDeleteUrl(): string
    {
        return $this->getUrl('*/*/delete', ['id' => $this->getBannerId()]);
    }
}
