<?php

declare(strict_types=1);

namespace Nvm\Wholesale\Api;

use Nvm\Wholesale\Api\Data\NvmWholesaleInterface;
use Nvm\Wholesale\Model\Contact;

/**
 * Nvm Wholesale CRUD Repository Interface
 * @package Nvm\Wholesale\Api
 */
interface NvmWholesaleRepositoryInterface
{
    /**
     * Save Ext Setting
     *
     * @param NvmWholesaleInterface $contact
     * @return NvmWholesaleInterface
     */
    public function save(NvmWholesaleInterface $contact): NvmWholesaleInterface;

    /**
     * Get Contact By Id
     * @param int $contactId
     * @return NvmWholesaleInterface
     */
    public function get(int $contactId): NvmWholesaleInterface;

    /**
     * Delete entity by id
     * @param NvmWholesaleInterface $contact
     * @return NvmWholesaleInterface
     */
    public function delete(NvmWholesaleInterface $contact): NvmWholesaleInterface;
}
