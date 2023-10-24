<?php

declare(strict_types=1);

namespace Nvm\Banner\Model\ResourceModel\Banner;

use Nvm\Banner\Model\Banner as BannerModel;
use Nvm\Banner\Model\ResourceModel\Banner as BannerResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection Banner
 * @package Ecip\M2SettingsManager\Model\ResourceModel\ExtSystemSettingField
 */
class Collection extends AbstractCollection
{
    /**
     * Initialize collection
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(BannerModel::class, BannerResource::class);
    }
}
