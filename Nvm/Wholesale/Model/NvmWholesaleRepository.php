<?php

declare(strict_types=1);

namespace Nvm\Wholesale\Model;

use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Nvm\Wholesale\Api\Data\NvmWholesaleInterface;
use Nvm\Wholesale\Api\NvmWholesaleRepositoryInterface;
use Nvm\Wholesale\Model\ContactFactory as ModelFactory;
use Nvm\Wholesale\Model\ResourceModel\Contact as ResourceModel;
use Psr\Log\LoggerInterface as PsrLoggerInterface;

/**
 * Class NvmWholesaleRepository CRUD
 * @package Nvm\Wholesale\Model
 */
class NvmWholesaleRepository implements NvmWholesaleRepositoryInterface
{
    /**
     * @var ResourceModel
     */
    protected ResourceModel $contactResource;

    /**
     * @var ModelFactory
     */
    protected ModelFactory $contactFactory;

    /**
     * @var PsrLoggerInterface
     */
    protected PsrLoggerInterface $_logger;

    /**
     * NvmWholesaleRepository Constructor
     *
     * @param ResourceModel $contactResource
     * @param ModelFactory $contactFactory
     * @param PsrLoggerInterface $logger
     */
    public function __construct(
        ResourceModel     $contactResource,
        ModelFactory      $contactFactory,
        PsrLoggerInterface $logger
    ) {
        $this->contactResource = $contactResource;
        $this->contactFactory = $contactFactory;
        $this->_logger = $logger;
    }

    /**
     * Save Contact
     *
     * @param NvmWholesaleInterface $banner
     * @return NvmWholesaleInterface
     * @throws CouldNotSaveException
     */
    public function save(NvmWholesaleInterface $contact): NvmWholesaleInterface
    {
        try {
            $this->contactResource->save($contact);
        } catch (Exception $exception) {
            throw new CouldNotSaveException(
                __('The banner was unable to be saved. %1', $exception->getMessage())
            );
        }

        return $contact;
    }

    /**
     * Get Contact by id
     * @param $contactId
     * @return NvmWholesaleInterface
     */
    public function get($contactId): NvmWholesaleInterface
    {
        $contact = $this->contactFactory->create();
        $this->contactResource->load($contact, $contactId);

        return $contact;
    }

    /**
     * Delete contact
     * @inheritDoc
     */
    public function delete(NvmWholesaleInterface $contact): NvmWholesaleInterface
    {
        try {
            $this->contactResource->delete($contact);
        } catch (Exception $exception) {
            throw new CouldNotDeleteException(
                __('Unable to remove banner with id "%1"', $contact->getEntityId()),
                $exception
            );
        }

        return $contact;
    }
}
