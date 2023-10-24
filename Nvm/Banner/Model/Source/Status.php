<?php

declare(strict_types=1);

namespace Nvm\Banner\Model\Source;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class Banner Status Source Model
 * @package Nvm\Banner\Model\Source;
 */
class Status implements ArrayInterface
{
    /**
     * @return array[]
     */
    public function toOptionArray(): array
    {
        return [
            [
                'value' => 1,
                'label' => 'Active'
            ],
            [
                'value' => 0,
                'label' => 'Inactive'
            ]
        ];
    }
}
