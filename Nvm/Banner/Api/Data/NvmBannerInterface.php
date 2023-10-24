<?php

declare(strict_types=1);

namespace Nvm\Banner\Api\Data;

/**
 * Interface NvmBannerInterface
 * @package Nvm\Banner\Api\Data
 */
interface NvmBannerInterface
{
    /**
     * Constants for keys of data array.
     */
    const BANNER_ID = 'banner_id';
    const BANNER_NAME = 'banner_name';
    const BANNER_IMAGE = 'banner_image';
    const BANNER_DESCRIBE = 'banner_describe';
    const BANNER_POSITION = 'banner_position';
    const STATUS = 'status';
    const EDITOR = 'editor';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * Get Banner Id
     *
     * @return int
     */
    public function getBannerId(): int;

    /**
     * Get Banner Name
     *
     * @return string
     */
    public function getBannerName(): string;

    /**
     * Get Banner Image
     *
     * @return string
     */
    public function getBannerImage(): string;

    /**
     * Get Banner Describe
     *
     * @return string|null
     */
    public function getBannerDescribe(): ?string;

    /**
     * Get Banner Position
     *
     * @return int
     */
    public function getBannerPosition(): int;

    /**
     * Get Status
     *
     * @return int
     */
    public function getStatus(): int;

    /**
     * Get Editor
     *
     * @return string|null
     */
    public function getEditor(): ?string;

    /**
     * Get Created At
     *
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * Get Updated At
     *
     * @return string
     */
    public function getUpdatedAt(): string;

    /**
     * Set Banner Id
     *
     * @param int $bannerId
     * @return NvmBannerInterface
     */
    public function setBannerId(int $bannerId): NvmBannerInterface;

    /**
     * Set Banner Name
     *
     * @param string $bannerName
     * @return NvmBannerInterface
     */
    public function setBannerName(string $bannerName): NvmBannerInterface;

    /**
     * Set Banner Image
     *
     * @param string $bannerImage
     * @return NvmBannerInterface
     */
    public function setBannerImage(string $bannerImage): NvmBannerInterface;

    /**
     * Set Banner Describe
     *
     * @param string $bannerDescribe
     * @return NvmBannerInterface
     */
    public function setBannerDescribe(string $bannerDescribe): NvmBannerInterface;

    /**
     * Set Banner Position
     *
     * @param int $bannerPosition
     * @return NvmBannerInterface
     */
    public function setBannerPosition(int $bannerPosition): NvmBannerInterface;

    /**
     * Set Status
     *
     * @param int $status
     * @return NvmBannerInterface
     */
    public function setStatus(int $status): NvmBannerInterface;

    /**
     * Set Editor
     *
     * @param string $editor
     * @return NvmBannerInterface
     */
    public function setEditor(string $editor): NvmBannerInterface;

    /**
     * Set Created At
     *
     * @param string $createdAt
     * @return NvmBannerInterface
     */
    public function setCreatedAt(string $createdAt): NvmBannerInterface;

    /**
     * Set Updated At
     *
     * @param string $updatedAt
     * @return NvmBannerInterface
     */
    public function setUpdatedAt(string $updatedAt): NvmBannerInterface;
}
