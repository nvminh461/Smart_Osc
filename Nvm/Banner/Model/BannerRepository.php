<?php

declare(strict_types=1);

namespace Nvm\Banner\Model;

use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Nvm\Banner\Api\Data\NvmBannerInterface;
use Nvm\Banner\Api\NvmBannerRepositoryInterface;
use Nvm\Banner\Model\BannerFactory as ModelFactory;
use Nvm\Banner\Model\ResourceModel\Banner as ResourceModel;
use Psr\Log\LoggerInterface as PsrLoggerInterface;

/**
 * Class BannerRepository CRUD
 * @package Nvm\Banner\Model
 */
class BannerRepository implements NvmBannerRepositoryInterface
{
    /**
     * @var ResourceModel
     */
    protected ResourceModel $bannerResource;

    /**
     * @var ModelFactory
     */
    protected ModelFactory $bannerFactory;

    /**
     * @var PsrLoggerInterface
     */
    protected PsrLoggerInterface $_logger;

    /**
     * BannerRepository Constructor
     *
     * @param ResourceModel $bannerResource
     * @param ModelFactory $bannerFactory
     * @param PsrLoggerInterface $logger
     */
    public function __construct(
        ResourceModel     $bannerResource,
        ModelFactory      $bannerFactory,
        PsrLoggerInterface $logger
    ) {
        $this->bannerResource = $bannerResource;
        $this->bannerFactory = $bannerFactory;
        $this->_logger = $logger;
    }

    /**
     * Save Banner
     *
     * @param NvmBannerInterface $banner
     * @return NvmBannerInterface
     * @throws CouldNotSaveException
     */
    public function save(NvmBannerInterface $banner): NvmBannerInterface
    {
        try {
            $this->bannerResource->save($banner);
        } catch (Exception $exception) {
            throw new CouldNotSaveException(
                __('The banner was unable to be saved. %1', $exception->getMessage())
            );
        }

        return $banner;
    }

    /**
     * Get Banner
     * @param int $bannerId
     * @return NvmBannerInterface
     */
    public function get(int $bannerId): NvmBannerInterface
    {
        $banner = $this->bannerFactory->create();
        $this->bannerResource->load($banner, $bannerId);

        return $banner;
    }

    /**
     * Delete banner
     * @inheritDoc
     */
    public function delete(NvmBannerInterface $banner): NvmBannerInterface
    {
        try {
            $this->bannerResource->delete($banner);
        } catch (Exception $exception) {
            throw new CouldNotDeleteException(
                __('Unable to remove banner with id "%1"', $banner->getEntityId()),
                $exception
            );
        }

        return $banner;
    }
}
