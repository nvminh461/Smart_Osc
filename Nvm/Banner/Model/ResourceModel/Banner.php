<?php

declare(strict_types=1);

namespace Nvm\Banner\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Banner Resource Model
 * @package Ecip\M2SettingsManager\Model\ResourceModel
 */
class Banner extends AbstractDb
{
    public const MAIN_TABLE = 'nvm_banner';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(self::MAIN_TABLE, 'banner_id');
    }
}
