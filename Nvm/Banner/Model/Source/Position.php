<?php

declare(strict_types=1);

namespace Nvm\Banner\Model\Source;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class Banner Position Source Model
 * @package Nvm\Banner\Model\Source;
 */
class Position implements ArrayInterface
{
    /**
     * @return array[]
     */
    public function toOptionArray(): array
    {
        return [
            [
                'value' => 1,
                'label' => 'Top'
            ],
            [
                'value' => 2,
                'label' => 'Bottom'
            ],
            [
                'value' => 3,
                'label' => 'Left'
            ],
            [
                'value' => 4,
                'label' => 'Right'
            ],
        ];
    }
}
