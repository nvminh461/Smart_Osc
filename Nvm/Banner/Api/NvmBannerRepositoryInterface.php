<?php

declare(strict_types=1);

namespace Nvm\Banner\Api;

use Nvm\Banner\Api\Data\NvmBannerInterface;
use Nvm\Banner\Model\Banner;

/**
 * Nvm Banner CRUD Repository Interface
 * @package Nvm\Banner\Api
 */
interface NvmBannerRepositoryInterface
{
    /**
     * Save Ext Setting
     *
     * @param NvmBannerInterface $banner
     * @return NvmBannerInterface
     */
    public function save(NvmBannerInterface $banner): NvmBannerInterface;

    /**
     * Get Banner By Id
     * @param int $bannerId
     * @return NvmBannerInterface
     */
    public function get(int $bannerId): NvmBannerInterface;

    /**
     * Delete entity by id
     * @param NvmBannerInterface $banner
     * @return NvmBannerInterface
     */
    public function delete(NvmBannerInterface $banner): NvmBannerInterface;
}
