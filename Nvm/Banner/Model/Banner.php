<?php

declare(strict_types=1);

namespace Nvm\Banner\Model;

use Nvm\Banner\Api\Data\NvmBannerInterface;
use Nvm\Banner\Model\ResourceModel\Banner as BannerResource;
use Magento\Framework\Model\AbstractExtensibleModel;

/**
 * Class Banner Model
 * @package Nvm\Banner\Model
 */
class Banner extends AbstractExtensibleModel implements NvmBannerInterface
{
    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(BannerResource::class);
    }

    /**
     * Get banner id
     * @return int
     */
    public function getBannerId(): int
    {
        return $this->getData(self::BANNER_ID);
    }

    /**
     * Set banner id
     * @param int $bannerId
     * @return $this
     */
    public function setBannerId(int $bannerId): Banner
    {
        $this->setData(self::BANNER_ID, $bannerId);
        return $this;
    }

    /**
     * Get banner name
     * @return string
     */
    public function getBannerName(): string
    {
        return $this->getData(self::BANNER_NAME);
    }

    /**
     * Set banner name
     * @param string $bannerName
     * @return $this
     */
    public function setBannerName(string $bannerName): Banner
    {
        $this->setData(self::BANNER_NAME, $bannerName);
        return $this;
    }

    /**
     * Get banner image
     * @return string
     */
    public function getBannerImage(): string
    {
        return $this->getData(self::BANNER_IMAGE);
    }

    /**
     * Set banner image
     * @param string $bannerImage
     * @return $this
     */
    public function setBannerImage(string $bannerImage): Banner
    {
        $this->setData(self::BANNER_IMAGE, $bannerImage);
        return $this;
    }

    /**
     * Get banner describe
     * @return string
     */
    public function getBannerDescribe(): string
    {
        return $this->getData(self::BANNER_DESCRIBE);
    }

    /**
     * Set banner describe
     * @param string $bannerDescribe
     * @return $this
     */
    public function setBannerDescribe(string $bannerDescribe): Banner
    {
        $this->setData(self::BANNER_DESCRIBE, $bannerDescribe);
        return $this;
    }

    /**
     * Get banner position
     * @return int
     */
    public function getBannerPosition(): int
    {
        return $this->getData(self::BANNER_POSITION);
    }

    /**
     * Set banner position
     * @param int $bannerPosition
     * @return $this
     */
    public function setBannerPosition(int $bannerPosition): Banner
    {
        $this->setData(self::BANNER_POSITION, $bannerPosition);
        return $this;
    }

    /**
     * Get status
     * @return int
     */
    public function getStatus(): int
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set status
     * @param int $status
     * @return $this
     */
    public function setStatus(int $status): Banner
    {
        $this->setData(self::STATUS, $status);
        return $this;
    }

    /**
     * Get banner editor
     * @return string
     */
    public function getEditor(): string
    {
        return $this->getData(self::EDITOR);
    }

    /**
     * Set is_delete
     * @param string $editor
     * @return $this
     */
    public function setEditor(string $editor): Banner
    {
        $this->setData(self::EDITOR, $editor);
        return $this;
    }

    /**
     * Get created_at
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set created_at
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt(string $createdAt): Banner
    {
        $this->setData(self::CREATED_AT, $createdAt);
        return $this;
    }

    /**
     * Get updated_at
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt(string $updatedAt): Banner
    {
        $this->setData(self::UPDATED_AT, $updatedAt);
        return $this;
    }
}
