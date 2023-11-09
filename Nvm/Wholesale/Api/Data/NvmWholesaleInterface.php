<?php

declare(strict_types=1);

namespace Nvm\Wholesale\Api\Data;

/**
 * Interface NvmWholesaleInterface
 * @package Nvm\Wholesale\Api\Data
 */
interface NvmWholesaleInterface
{
    /**
     * Constants for keys of data array.
     */
    const CONTACT_ID = 'contact_id';
    const PRODUCT_ID = 'product_id';
    const PRODUCT_NAME = 'product_name';
    const CUSTOMER_ID = 'customer_id';
    const CUSTOMER_NAME = 'customer_name';
    const CUSTOMER_EMAIL = 'customer_email';
    const CUSTOMER_PHONE = 'customer_phone';
    const CUSTOMER_MESSAGE = 'customer_message';
    const STATUS = 'status';
    const EDITOR = 'editor';
    const ADMINMESSAGE = 'admin_message';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * Get Contact Id
     *
     */
    public function getContactId();

    /**
     * Set Contact Id
     */
    public function setContactId($contactId): NvmWholesaleInterface;

    /**
     * Get Product Id
     *
     */
    public function getProductId();

    /**
     * Set Product Id
     */
    public function setProductId($productId): NvmWholesaleInterface;

    /**
     * Get Product Name
     *
     */
    public function getProductName();

    /**
     * Set Product Name
     */
    public function setProductName($productName): NvmWholesaleInterface;

    /**
     * Get Customer Id
     *
     */
    public function getCustomerId();

    /**
     * Set Customer Id
     */
    public function setCustomerId($customerId): NvmWholesaleInterface;

    /**
     * Get Customer Name
     *
     */
    public function getCustomerName();

    /**
     * Set Customer Name
     */
    public function setCustomerName($customerName): NvmWholesaleInterface;

    /**
     * Get Customer Email
     *
     */
    public function getCustomerEmail();

    /**
     * Set Customer Email
     */
    public function setCustomerEmail($customerEmail): NvmWholesaleInterface;

    /**
     * Get Customer Phone
     *
     */
    public function getCustomerPhone();

    /**
     * Set Customer Phone
     */
    public function setCustomerPhone($customerPhone): NvmWholesaleInterface;

    /**
     * Get Customer Message
     *
     */
    public function getCustomerMessage();

    /**
     * Set Customer Message
     */
    public function setCustomerMessage($customerMessage): NvmWholesaleInterface;

    /**
     * Get Status
     *
     */
    public function getStatus();

    /**
     * Set Status
     *
     * @param int $status
     * @return NvmWholesaleInterface
     */
    public function setStatus($status): NvmWholesaleInterface;

    /**
     * Get Editor
     *
     */
    public function getEditor();

    /**
     * Set Editor
     *
     * @param string $editor
     * @return NvmWholesaleInterface
     */
    public function setEditor($editor): NvmWholesaleInterface;

    /**
     * Get Admin Message
     *
     */
    public function getAdminMess();

    /**
     * Set Admin Message
     *
     * @param string $adminMess
     * @return NvmWholesaleInterface
     */
    public function SetAdminMess($adminMess): NvmWholesaleInterface;

    /**
     * Get Created At
     *
     */
    public function getCreatedAt();

    /**
     * Set Created At
     *
     * @param string $createdAt
     * @return NvmWholesaleInterface
     */
    public function setCreatedAt($createdAt): NvmWholesaleInterface;

    /**
     * Get Updated At
     *
     */
    public function getUpdatedAt();

    /**
     * Set Updated At
     *
     * @param string $updatedAt
     * @return NvmWholesaleInterface
     */
    public function setUpdatedAt($updatedAt): NvmWholesaleInterface;
}
