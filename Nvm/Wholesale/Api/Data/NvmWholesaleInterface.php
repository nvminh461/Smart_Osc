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
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * Get Contact Id
     *
     * @return int
     */
    public function getContactId(): int;

    /**
     * Set Contact Id
     */
    public function setContactId(int $contactId): NvmWholesaleInterface;

    /**
     * Get Product Id
     *
     * @return int
     */
    public function getProductId(): int;

    /**
     * Set Product Id
     */
    public function setProductId(int $productId): NvmWholesaleInterface;

    /**
     * Get Product Name
     *
     * @return string
     */
    public function getProductName(): string;

    /**
     * Set Product Name
     */
    public function setProductName(string $productName): NvmWholesaleInterface;

    /**
     * Get Customer Id
     *
     * @return int
     */
    public function getCustomerId(): int;

    /**
     * Set Customer Id
     */
    public function setCustomerId(int $customerId): NvmWholesaleInterface;

    /**
     * Get Customer Name
     *
     * @return string
     */
    public function getCustomerName(): string;

    /**
     * Set Customer Name
     */
    public function setCustomerName(string $customerName): NvmWholesaleInterface;

    /**
     * Get Customer Email
     *
     * @return string
     */
    public function getCustomerEmail(): string;

    /**
     * Set Customer Email
     */
    public function setCustomerEmail(string $customerEmail): NvmWholesaleInterface;

    /**
     * Get Customer Phone
     *
     * @return string
     */
    public function getCustomerPhone(): string;

    /**
     * Set Customer Phone
     */
    public function setCustomerPhone(string $customerPhone): NvmWholesaleInterface;

    /**
     * Get Customer Message
     *
     * @return string
     */
    public function getCustomerMessage(): string;

    /**
     * Set Customer Message
     */
    public function setCustomerMessage(string $customerMessage): NvmWholesaleInterface;

    /**
     * Get Status
     *
     * @return int
     */
    public function getStatus(): int;

    /**
     * Set Status
     *
     * @param int $status
     * @return NvmWholesaleInterface
     */
    public function setStatus(int $status): NvmWholesaleInterface;

    /**
     * Get Editor
     *
     * @return string|null
     */
    public function getEditor(): ?string;

    /**
     * Set Editor
     *
     * @param string $editor
     * @return NvmWholesaleInterface
     */
    public function setEditor(string $editor): NvmWholesaleInterface;

    /**
     * Get Created At
     *
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * Set Created At
     *
     * @param string $createdAt
     * @return NvmWholesaleInterface
     */
    public function setCreatedAt(string $createdAt): NvmWholesaleInterface;

    /**
     * Get Updated At
     *
     * @return string
     */
    public function getUpdatedAt(): string;

    /**
     * Set Updated At
     *
     * @param string $updatedAt
     * @return NvmWholesaleInterface
     */
    public function setUpdatedAt(string $updatedAt): NvmWholesaleInterface;
}
